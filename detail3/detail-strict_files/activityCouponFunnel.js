var coupon = {
  couponData: {},
  couponDetailData: [],
  clickFrom: '',
  disable: false,
  jsonp: function(options) {
    options = options || {};
    if (!options.url || !options.callback) {
      throw new Error("参数不合法");
    }
    var callbackName = ("jsonp_" + Math.random()).replace(".", "");
    var oHead = document.getElementsByTagName("head")[0];
    options.data[options.callback] = callbackName;
    var arr = [];
    for (var name in options.data) {
      arr.push(
        encodeURIComponent(name) + "=" + encodeURIComponent(options.data[name])
      );
    }
    var params = arr.join("&");
    var oS = document.createElement("script");
    oHead.appendChild(oS);
    window[callbackName] = function(json) {
      oHead.removeChild(oS);
      clearTimeout(oS.timer);
      window[callbackName] = null;
      options.success && options.success(json);
    };
    oS.src = options.url + "?" + params;
    if (options.time) {
      oS.timer = setTimeout(function() {
        window[callbackName] = null;
        oHead.removeChild(oS);
        options.fail &&
          options.fail({
            message: "超时"
          });
      }, time);
    }
  },
  addUrlParam: function (url, name, value) {
    url += url.indexOf("?") == -1 ? '?' :'&';
    name = decodeURIComponent(name);
    value = decodeURIComponent(value);
    url += encodeURIComponent(name) + '=' + encodeURIComponent(value);

    return url;
  },
  get: function(options) {
    var request = new XMLHttpRequest();
    request.withCredentials = true;
    options = options || {};
    if (!options.url || !options.callback) {
      throw new Error("参数不合法");
    }
    for (var name in options.data) {
      options.url = this.addUrlParam(options.url, name, options.data[name])
    }
    request.open("GET", options.url);
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        options.success(JSON.parse(request.responseText));
      }
    };
    request.send(null);
  },
  getCookie: function(name, str) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    var j = 0;
    while (i < clen) {
      j = i + alen;
      if (document.cookie.substring(i, j) == arg) {
        var endstr = document.cookie.indexOf(";", j);
        if (endstr == -1) {
          endstr = document.cookie.length;
        }
        if (str == false) return document.cookie.substring(j, endstr);
        else return unescape(document.cookie.substring(j, endstr))
      }
      i = document.cookie.indexOf(" ", i) + 1;
      if (i == 0) break;
    }
    return null;
  },
  // 埋点 
  clickLog: function(actiontype, keywords, client) {
    var id58 = this.getCookie('idzz');
    var paramObj = {
      pagetype: "ZHUANZHUANM",
      appid: "ZHUANZHUAN",
      cookieid: id58
    };
    var backup = {
      clickFrom: keywords,
      platform: client
    };
    paramObj.actiontype = actiontype;
    paramObj.backup = JSON.stringify(backup);
    this.jsonp({
      url: "https://lego.zhuanzhuan.com/page/mark",
      data: paramObj,
      callback: "callback",
      success: function(data) {
        console.log(data);
      }
    });
  },
  formatSearch: function() {
    var search = window.location.search;
    var result = {};
    if (!search) return result;

    var str = search.split("?")[1];
    var arr = str && str.split("&");
    arr && arr.forEach(function (item) {
      var eArr = item.split("=");
      var k = eArr[0];
      var v = eArr[1];
      result[k] = v;
    });
    return result;
  },
  getRequiredParams: function() {
    var result = this.formatSearch();
    if (result.infoId) return {infoId: result.infoId};
    if (result.filter) return {filter: result.filter};
    if (result.cateId) return {cateId: result.cateId}

    return {};
  },
  getCouponInfo: function() {
    if (!native.isLogin() || !native.in('zz'))
      return;
    var _this = this;
    var params = _this.getRequiredParams();
    for (var name in params) {
      _this.clickFrom = params[name]
    }

    this.get({
      url:
        "https://youpinapi.zhuanzhuan.com/goods/mall/activity/redPack/planInfo",
      data: params,
      callback: "callback",
      success: function(res) {
        var data = res.data || res.respData;
        if (!data || JSON.stringify(data) === "{}") return;
        _this.couponData = data;
        _this.createCouponModal();
        _this.clickLog('COUPON-MODAL', _this.clickFrom, native.client);
      }
    });
  },
  createCouponModal: function() {
    var _this = this;
    var bodyElement = document.getElementsByTagName("body")[0];
    var topImg = document.createElement("img");
    topImg.src =
      "https://pic3.zhuanstatic.com/zhuanzh/n_v2680cdcccd03f417abb87679ba3b9bbc0.png";
    topImg.style.cssText = "width: 82.1vw;height: 11.5vw;";
    var couponWrap = document.createElement("div");
    couponWrap.style.cssText =
      "display:flex;justify-content:center;align-items:center;flex-direction:column;z-index:99;position: fixed;bottom: 0;left: 0;right: 0;top: 0;width: 100vw;height: 100vh;background: rgba(0,0,0,0.7);";
    couponWrap.className = "coupon-wrap";
    couponWrap.onclick = function(e) {
      couponWrap.style.cssText = "display: none;";
    };
    couponWrap.addEventListener('touchmove',function(e){
      e.preventDefault();
    },false);

    topImg.onclick = function(e) {
      e.stopPropagation();
    };

    var coupon = _this.getCouponContent();

    var close = document.createElement("img");
    close.src =
      "https://pic2.zhuanstatic.com/zhuanzh/n_v2ae8e919716f74d7182168279c81b2dbb.png";
    close.style.cssText = 'width: 9.6vw;height: 9.6vw;'
    close.className = 'close';
    close.onclick = function(e) {
      couponWrap.style.cssText = "display: none;";
    };

    couponWrap.appendChild(topImg);
    couponWrap.appendChild(coupon);
    couponWrap.appendChild(close);
    bodyElement.appendChild(couponWrap);
  },
  // 红包领取成功dom
  getDetail: function() {
    var _this = this;
    var couponDetail = document.createElement("div");
    couponDetail.className = "coupon-detail";
    couponDetail.style.cssText =
      "position: relative;display:flex;align-items:center;justify-content:center;flex-direction: column;width: 82.1vw;box-sizing: border-box;background-image: linear-gradient(134deg, #FD9E7E 0%, #E50B30 47%, #951ECD 100%);box-shadow: inset 0 0 32px 0 #B03716;border-radius: 5vw;padding: 9vw 8.9vw;margin-bottom: 9.2vw;";

    couponDetail.onclick = function(e) {
      e.stopPropagation();
    };

    [
      this.getDetailTitle,
      this.getCoupons,
      this.getDetailDesc,
      this.getDetailBtn
    ].forEach(function(callback) {
      couponDetail.appendChild(callback.call(_this));
    });

    console.log(couponDetail);

    return couponDetail;
  },
  getDetailTitle: function() {
    var _this = this;
    var title = document.createElement("p");
    title.textContent = _this.couponData.detailTitle;
    title.style.cssText =
      "text-overflow: ellipsis;overflow: hidden;white-space: no-wrap;font-family: font-weight: bolder;font-size: 5.3vw;color: #FFE7A9;margin-bottom: 5.3vw;";

    return title;
  },
  getCoupons: function() {
    var _this = this;
    var wrap = document.createElement("div");
    this.couponDetailData.map(function(data) {
      wrap.appendChild(_this.getCouponItem(data || {}));
    });
    return wrap;
  },
  getCouponItem: function(data) {
    var couponItem = document.createElement("div");
    couponItem.style.cssText =
      "display:flex;align-items:center;width: 71.5vw;height: 17.6vw;border-radius: 3.3vw;background: url('https://pic5.zhuanstatic.com/zhuanzh/n_v2a0d84c0713924e288d4782fd03406a1e.png');background-size:100%; margin-bottom:2.7vw;";

    var amountWrap = document.createElement("div");
    amountWrap.style.cssText = 'display: flex;align-items: baseline;justify-content: center;min-width: 21.6vw;text-align:center;font-family: Arial-BoldMT;font-size: 9.6vw;color: #FF4343;'
    var dollar = document.createElement("span");
    dollar.innerHTML = '&yen;'
    dollar.style.cssText = 'font-size: 4vw';
    var amount = document.createElement("p");
    amount.textContent = data.discountMoneyCent && data.discountMoneyCent / 100;

    amountWrap.appendChild(dollar);
    amountWrap.appendChild(amount);

    var desc = document.createElement("div");
    desc.style.cssText =
      "text-overflow: ellipsis;overflow: hidden;white-space: no-wrap;flex:1;font-size: 3.5vw;color: #FF4343;";

    var title = document.createElement("h4");
    title.textContent = data.text;
    title.style.cssText =
      "text-overflow: ellipsis;overflow: hidden;white-space: nowrap;font-family: PingFangSC-Medium;";
    var limit = document.createElement("h5");
    limit.style.cssText =
      "text-overflow: ellipsis;overflow: hidden;white-space: nowrap;font-size: 2.93vw;";
    limit.textContent = data.limitDesc;

    desc.appendChild(title);
    desc.appendChild(limit);

    var btn = document.createElement("div");
    btn.style.cssText =
      "margin: 0 3.7vw;width: 14.5vw;height: 5.8vw;line-height:5.8vw;font-size: 2.93vw;color:#fff;text-align:center;background-image: linear-gradient(135deg, #FE9465 0%, #BE3FE8 100%);box-shadow: 0 4px 10px 0 rgba(196,121,196,0.40);border-radius: 22px;";
    btn.textContent = "去使用";
    btn.onclick = function() {
      if (!data.appUseURL) return;
      native.skipToUrl({targetUrl: decodeURIComponent(data.appUseURL)});
    };

    couponItem.appendChild(amountWrap);
    couponItem.appendChild(desc);
    couponItem.appendChild(btn);

    return couponItem;
  },
  getDetailDesc: function() {
    var _this = this;
    var desc = document.createElement("p");
    desc.textContent = _this.couponData.detailSubTitle;
    desc.style.cssText =
      "font-size: 3.5vw;color: #FFFFFF;margin: 2.6vw 0 5.3vw;";

    return desc;
  },
  getDetailBtn: function() {
    var _this = this;
    var btn = document.createElement("div");
    btn.textContent = "先去逛逛";
    var couponWrap = document.getElementsByClassName("coupon-wrap")[0];
    btn.onclick = function(e) {
      couponWrap.style.cssText = "display: none;";
      _this.clickLog('GO-TO-USE', _this.clickFrom, native.client);
    };
    btn.style.cssText =
      "text-align:center;background-image: linear-gradient(0deg, rgba(255, 186, 119, 1) 0%, rgba(255, 228, 192, 1) 100%), linear-gradient(rgba(255, 75, 76, 1), rgba(255, 75, 76, 1));background-blend-mode: normal, normal;border-radius: 5.3vw;width: 48vw;height: 11vw;line-height:11vw;font-weight: bolder;font-size: 5vw;color: rgba(210, 64, 0, 1);";

    return btn;
  },
  // 红包未领取
  getCouponContent: function() {
    var _this = this;
    var couponContent = document.createElement("div");
    couponContent.className = "coupon-content";
    couponContent.style.cssText =
      "position: relative;display:flex;align-items:center;justify-content:center;flex-direction: column;width: 82.1vw;box-sizing: border-box;background-image: linear-gradient(134deg, #FD9E7E 0%, #E50B30 47%, #951ECD 100%);box-shadow: inset 0 0 32px 0 #B03716;border-radius: 5vw;padding: 9vw 43px;margin-bottom: 9.2vw;";

    couponContent.onclick = function(e) {
      e.stopPropagation();
    };

    console.log([this.getTag]);

    [
      this.getTag,
      this.getSubTitle,
      this.getTitle,
      this.getAmount,
      this.getDesc,
      this.getBtn
    ].forEach(function(callback) {
      couponContent.appendChild(callback.call(_this));
    });
    return couponContent;
  },
  getTag: function() {
    var tag = document.createElement("div");
    tag.style.cssText =
      "position: absolute;left: -1.3vw;top: 4.5vw;box-sizing: border-box;min-width: 18.7vw;height: 5.3vw;line-height: 5.3vw;padding: 0 1.5vw;font-size: 2.9vw;color: rgba(255, 231, 169, 1);background-color: rgba(158, 35, 209, 1);border-radius: 0 2.7vw 2.7vw 0;";
    tag.textContent = "每日仅" + this.couponData.num + "份";

    return tag;
  },
  getSubTitle: function() {
    var subTitle = document.createElement("p");
    subTitle.textContent = "恭喜！运气太好啦";
    subTitle.style.cssText =
      "font-weight: bolder;;font-size: 4vw;color: #fff;margin-bottom: 3vw;";

    return subTitle;
  },
  getTitle: function() {
    var title = document.createElement("p");
    title.textContent = this.couponData.title;
    title.style.cssText =
      "text-overflow: ellipsis;overflow: hidden;white-space: no-wrap;color:#fff;font-size: 6vw;font-weight: 500;font-stretch: normal;line-height: 6vw;margin-bottom: 8vw;";

    return title;
  },
  getAmount: function() {
    var amountWrap = document.createElement("div");
    amountWrap.style.cssText = 'display: flex;align-items: baseline;justify-content: center;font-family:Akrobat;font-size: 21.3vw;font-weight: normal;font-stretch: normal;letter-spacing: 0vw;color: rgba(255, 231, 169, 1);margin-bottom: 8vw;'
    var dollar = document.createElement("span");
    dollar.innerHTML = '&yen;'
    dollar.style.cssText = 'font-size: 8vw';
    var amount = document.createElement("p");
    amount.textContent = this.couponData.totalAmount;
    amount.style.cssText = 'line-height: 15.2vw';

    amountWrap.appendChild(dollar);
    amountWrap.appendChild(amount);

    return amountWrap;
  },
  getDesc: function() {
    var desc = document.createElement("p");
    desc.textContent = this.couponData.subTitle;
    desc.style.cssText =
      "max-width: 62.1vw;color:#fff;font-size: 3.5vw;line-height: 5vw;text-align:center;margin-bottom: 8vw;display: -webkit-box;display: box;-webkit-line-clamp: 3;line-clamp: 3;-webkit-box-orient: vertical;box-orient: vertical;";

    return desc;
  },
  getBtn: function() {
    var _this = this;
    var btn = document.createElement("div");
    btn.textContent = "立即收下";
    btn.style.cssText =
      "text-align:center;background-image: linear-gradient(0deg, rgba(255, 186, 119, 1) 0%, rgba(255, 228, 192, 1) 100%), linear-gradient(rgba(255, 75, 76, 1), rgba(255, 75, 76, 1));background-blend-mode: normal, normal;border-radius: 5.3vw;width: 48vw;height: 11vw;line-height:11vw;font-size: 5vw;font-weight: bolder;color: rgba(210, 64, 0, 1);";

    btn.onclick = function() {
      if (_this.disable) return;
      _this.disable = true;
      _this.clickLog('RECEIVE-COUPON', _this.clickFrom, native.client);
      _this.get({
        url: "https://youpinapi.zhuanzhuan.com/goods/mall/activity/giveCoupon",
        data: {
          planId: _this.couponData.planId
        },
        callback: "callback",
        success: function(res) {
          var data = res.data || res.respData;
          if (!data || data.code !== 1) {
            native.toast({msg: '领取失败'});
            _this.disable = false;
            return;
          }
          _this.getDetailInfo();
        }
      });
    };

    return btn;
  },
  getDetailInfo: function() {
    var _this = this;
    this.get({
      url:
        "https://youpinapi.zhuanzhuan.com/goods/mall/activity/redPack/planDetail",
      data: {
        planId: _this.couponData.planId
      },
      callback: "callback",
      success: function(res) {
        var data = res.data || res.respData;
        
        if (!data || JSON.stringify(data) === "{}") return;
        _this.couponDetailData = data;
        var couponWrap =
          document.getElementsByClassName("coupon-wrap")[0];
        var couponContent =
          document.getElementsByClassName("coupon-content")[0];
        couponContent.style.display = "none";
        var close = document.getElementsByClassName("close")[0];
        var couponDetail = _this.getDetail();
        couponWrap.insertBefore(couponDetail, close);
        _this.disable = false;
      }
    });
  },
  init: function() {
    var _this = this;
    if (!!window.native) {
      _this.getCouponInfo();
    } else {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "https://s1.zhuanstatic.com/common/trade/@zz-common:native-adapter@3.2.1-beta.2.index.min.js";

      document.body.appendChild(script);
      script.onload = function() {
        _this.getCouponInfo();
      };
    }
    var link = document.createElement('link');
    link.setAttribute('rel', 'stylesheet');
    link.setAttribute('type', 'text/css');
    link.setAttribute('href', 'https://s1.zhuanstatic.com/common/u/css/activity-funnel-font.css');
    document.head.appendChild(link);
  }
};

coupon.init();
