(window["webpackJsonp"] = window["webpackJsonp"] || []).push([
    ["chunk-42a09bce", "chunk-28601d6e"], {
        "07be": function(t, e, i) {
            "use strict";
            var a = i("087a"),
                n = i.n(a);
            n.a
        },
        "087a": function(t, e, i) {},
        "0b0a": function(t, e, i) {
            "use strict";
            var a = i("a3ab"),
                n = i.n(a);
            n.a
        },
        "1dc1": function(t, e, i) {
            "use strict";
            var a = i("a158"),
                n = i.n(a);
            n.a
        },
        "1e0f": function(t, e, i) {},
        2493: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("article", [t.isShowService && t.isValidateAccount ? i("service-var") : t._e(), t.isValidateAccount ? i("article", {
                        staticClass: "lease-validate-report"
                    }, [i("section", {
                        staticClass: "title"
                    }, [i("div", {
                        staticClass: "right",
                        on: {
                            click: t.openReport
                        }
                    }, [t._v("查看全部报告"), i("span", {
                        staticClass: "arrow"
                    })]), i("div", {
                        staticClass: "point"
                    }), i("div", {
                        staticClass: "detail"
                    }, [t._v("智能验号报告")])]), t.infoParams.length ? i("section", {
                        staticClass: "lease-validate-report-param"
                    }, [i("ul", {
                        staticClass: "lease-validate-report-param-tags"
                    }, t._l(t.tags, function(e) {
                        return i("li", {
                            staticClass: "tag-wrap"
                        }, [i("div", {
                            staticClass: "tag"
                        }, [t._v(t._s(e))])])
                    }), 0), i("ul", {
                        staticClass: "lease-validate-report-param-items"
                    }, t._l(t.infoParams, function(e, a) {
                        return i("li", {
                            key: a,
                            staticClass: "lease-validate-report-param-item"
                        }, [i("p", {
                            staticClass: "lease-validate-report-param-key"
                        }, [t._v(t._s(e.paramKey))]), i("p", {
                            staticClass: "lease-validate-report-param-value"
                        }, [t._v(t._s(e.paramValue))])])
                    }), 0)]) : t._e(), i("validate-account-info", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: t.showAccountInfo,
                            expression: "showAccountInfo"
                        }],
                        attrs: {
                            hero: t.hero,
                            skin: t.skin,
                            "hero-count": t.heroCount,
                            "skin-count": t.skinCount,
                            closeHandle: t.closeHandle
                        }
                    })], 1) : t._e()], 1)
                },
                n = [],
                s = i("c926"),
                o = i("5fa0"),
                r = i("b383"),
                c = i.n(r);

            function l(t) {
                return f(t) || d(t) || u()
            }

            function u() {
                throw new TypeError("Invalid attempt to spread non-iterable instance")
            }

            function d(t) {
                if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) return Array.from(t)
            }

            function f(t) {
                if (Array.isArray(t)) {
                    for (var e = 0, i = new Array(t.length); e < t.length; e++) i[e] = t[e];
                    return i
                }
            }
            var h = {
                    data: function() {
                        return {
                            showAccountInfo: !1,
                            infoId: c.a.parse(location.search.split("?")[1]).infoId,
                            tags: [],
                            hero: [],
                            skin: [],
                            heroCount: "",
                            skinCount: "",
                            invalidateParams: []
                        }
                    },
                    props: {
                        GoodsInfo: {
                            default: function() {
                                return {}
                            }
                        },
                        leaseParam: {
                            default: function() {
                                return []
                            }
                        },
                        isShowService: {
                            type: Boolean,
                            default: !0
                        }
                    },
                    computed: {
                        infoParams: function() {
                            var t = this,
                                e = this.GoodsInfo.infoParams || [];
                            return e = [].concat(l(e), l(this.invalidateParams)), e = e.filter(function(e) {
                                return t.leaseParam.includes(e.paramKey)
                            }), e
                        },
                        isValidateAccount: function() {
                            return !!this.heroCount && !!this.skinCount
                        }
                    },
                    methods: {
                        closeHandle: function() {
                            this.showAccountInfo = !1
                        },
                        openReport: function() {
                            this.showAccountInfo = !0, this.$log("openReport")
                        },
                        getProductAllTypelnfo: function() {
                            var t = this;
                            return this.$http.get("/zzopen/workroom/getProductAllTypelnfo", {
                                productId: this.infoId
                            }).then(function(e) {
                                var i = parseInt(e.data.respCode),
                                    a = e.data.respData;
                                0 === i && t.dealProductAllTypeInfo(a)
                            })
                        },
                        dealProductAllTypeInfo: function(t) {
                            for (var e in t) this.invalidateParams.push({
                                paramKey: e,
                                paramValue: t[e] ? t[e].join(",") : ""
                            }), this.getSpecialSkin(e, t[e]), this.getHero(e, t[e]), this.getSkin(e, t[e]), this.getHeroCount(e, t[e]), this.getSkinCount(e, t[e])
                        },
                        getSpecialSkin: function(t, e) {
                            "特色标签" === t && (this.tags = e)
                        },
                        getHero: function(t, e) {
                            "英雄" === t && (this.hero = e.reduce(function(t, e) {
                                var i = e ? e.split("#") : ["", ""];
                                return t.push({
                                    role: i[0],
                                    data: i[1].split("|")
                                }), t
                            }, []))
                        },
                        getSkin: function(t, e) {
                            "皮肤" === t && (this.skin = e.reduce(function(t, e) {
                                var i = e ? e.split("#") : ["", ""];
                                return t.push({
                                    role: i[0],
                                    data: i[1].split("|")
                                }), t
                            }, []))
                        },
                        getHeroCount: function(t, e) {
                            "英雄数" === t && (this.heroCount = e ? e.join(",") : "")
                        },
                        getSkinCount: function(t, e) {
                            "皮肤数" === t && (this.skinCount = e ? e.join(",") : "")
                        }
                    },
                    created: function() {
                        this.getProductAllTypelnfo()
                    },
                    components: {
                        ValidateAccountInfo: s["a"],
                        ServiceVar: o["a"]
                    }
                },
                p = h,
                v = (i("7da7"), i("2877")),
                m = Object(v["a"])(p, a, n, !1, null, "4292c6f4", null);
            e["a"] = m.exports
        },
        "352c": function(t, e, i) {
            "use strict";
            var a = {
                mounted: function() {
                    this.$log("ALLGAME", "ALLGAME")
                }
            };
            e["a"] = a
        },
        "3db3": function(t, e, i) {},
        "4a1c": function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("article", {
                        staticClass: "detail-title"
                    }, [i("section", {
                        staticClass: "title-wrap"
                    }, [i("div", {
                        staticClass: "title"
                    }, [t._v(t._s(t.title))])])])
                },
                n = [],
                s = {
                    props: {
                        title: {
                            default: ""
                        }
                    },
                    computed: {}
                },
                o = s,
                r = (i("9747"), i("2877")),
                c = Object(r["a"])(o, a, n, !1, null, "4820bdac", null);
            e["a"] = c.exports
        },
        "524c": function(t, e, i) {},
        "537b": function(t, e, i) {
            "use strict";
            var a = i("d79e"),
                n = i("b769");

            function s(t) {
                return c(t) || r(t) || o()
            }

            function o() {
                throw new TypeError("Invalid attempt to spread non-iterable instance")
            }

            function r(t) {
                if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) return Array.from(t)
            }

            function c(t) {
                if (Array.isArray(t)) {
                    for (var e = 0, i = new Array(t.length); e < t.length; e++) i[e] = t[e];
                    return i
                }
            }

            function l(t, e, i) {
                var o = i.value;
                i.value = function() {
                    var t = this,
                        e = arguments;
                    return Object(a["a"])() ? o.call.apply(o, [this].concat(Array.prototype.slice.call(arguments))) : n["a"].login(function(i) {
                        0 === parseInt(i.code) && o.call.apply(o, [t].concat(s(e)))
                    }), i
                }
            }
            e["a"] = l
        },
        5729: function(t, e, i) {
            "use strict";
            var a = i("dd90"),
                n = i.n(a);
            n.a
        },
        "5fa0": function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement;
                    t._self._c;
                    return t._m(0)
                },
                n = [function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("article", {
                        staticClass: "cash-deposit"
                    }, [i("section", {
                        staticClass: "cash-deposit-wrap"
                    }, [i("div", {
                        staticClass: "cash-deposit-title"
                    }, [i("span", {
                        staticClass: "title"
                    }, [t._v("服务")]), i("span", {
                        staticClass: "detail"
                    }, [t._v("已通过转转官方验号")])]), i("div", {
                        staticClass: "cash-deposit-arrow"
                    })])])
                }],
                s = i("a36e"),
                o = i.n(s),
                r = (i("2ec8"), i("de78"), i("537b"), i("b769"), i("240e"), {
                    data: function() {
                        return {}
                    },
                    props: {},
                    computed: {},
                    methods: {},
                    components: {
                        Alert: o.a
                    },
                    watch: {},
                    created: function() {}
                }),
                c = r,
                l = (i("90c2"), i("2877")),
                u = Object(l["a"])(c, a, n, !1, null, "1c129f34", null);
            e["a"] = u.exports
        },
        6220: function(t, e, i) {
            "use strict";
            var a = i("7577"),
                n = i.n(a);
            n.a
        },
        "699a": function(t, e, i) {
            "use strict";
            var a, n = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("fix-bottom", {
                        staticClass: "zz-detail-bottom"
                    }, [i("div", {
                        staticClass: "zz-detail-bottom-collect"
                    }, [i("div", {
                        staticClass: "zz-detail-bottom-collect-item",
                        on: {
                            click: t.gotoMyWantList
                        }
                    }, [i("i", {
                        staticClass: "icon-mark"
                    }), i("span", [t._v("收藏夹")])]), i("div", {
                        staticClass: "zz-detail-bottom-collect-item",
                        on: {
                            click: t.handlerWant
                        }
                    }, [i("i", {
                        staticClass: "icon-heart",
                        class: {
                            active: t.isWanted
                        }
                    }), i("span", [t._v("收藏")])])]), i("div", {
                        staticClass: "zz-detail-bottom-handle"
                    }, [t._t("left-button", [i("div", {
                        staticClass: "zz-detail-bottom-handle-button zz-detail-bottom-handle-chat",
                        on: {
                            click: t.gotoChat
                        }
                    }, [t._v("\n        买前聊一聊\n      ")])]), t._t("right-button", [i("div", {
                        staticClass: "zz-detail-bottom-handle-button zz-detail-bottom-handle-buy",
                        on: {
                            click: t.createOrder
                        }
                    }, [t._v("\n        马上买\n      ")])])], 2), t._t("default")], 2)
                },
                s = [],
                o = i("a34a"),
                r = i.n(o),
                c = i("d939"),
                l = i("537b"),
                u = i("240e");

            function d(t, e, i, a, n, s, o) {
                try {
                    var r = t[s](o),
                        c = r.value
                } catch (l) {
                    return void i(l)
                }
                r.done ? e(c) : Promise.resolve(c).then(a, n)
            }

            function f(t) {
                return function() {
                    var e = this,
                        i = arguments;
                    return new Promise(function(a, n) {
                        var s = t.apply(e, i);

                        function o(t) {
                            d(s, a, n, o, r, "next", t)
                        }

                        function r(t) {
                            d(s, a, n, o, r, "throw", t)
                        }
                        o(void 0)
                    })
                }
            }

            function h(t, e, i, a, n) {
                var s = {};
                return Object.keys(a).forEach(function(t) {
                    s[t] = a[t]
                }), s.enumerable = !!s.enumerable, s.configurable = !!s.configurable, ("value" in s || s.initializer) && (s.writable = !0), s = i.slice().reverse().reduce(function(i, a) {
                    return a(t, e, i) || i
                }, s), n && void 0 !== s.initializer && (s.value = s.initializer ? s.initializer.call(n) : void 0, s.initializer = void 0), void 0 === s.initializer && (Object.defineProperty(t, e, s), s = null), s
            }
            var p = !0,
                v = {
                    props: {
                        info: {
                            type: Object,
                            default: function() {
                                return {}
                            }
                        }
                    },
                    components: {
                        FixBottom: c["a"]
                    },
                    data: function() {
                        return {
                            isWanted: !1
                        }
                    },
                    watch: {
                        "info.isCollected": function(t) {
                            this.isWanted = !!parseInt(t)
                        }
                    },
                    methods: (a = {
                        gotoMyWantList: function() {
                            this.$log("toMyWantList"), u["a"] && this.$jump("zhuanzhuan://jump/core/myWantList/jump?sourceType=1&tab=valid")
                        },
                        gotoChat: function() {
                            this.$log("askclick"), this.info.infoId && this.$ZZAPP.enterChat({
                                uid: this.info.uid,
                                infoId: this.info.infoId,
                                metric: this.$route.query.metric
                            })
                        },
                        createOrder: function() {
                            this.info.infoId && (this.$log("createOrder"), this.$ZZAPP.enterConfirmOrder({
                                infoId: this.info.infoId,
                                metric: this.$route.query.metric
                            }))
                        },
                        handlerWant: function() {
                            var t = f(r.a.mark(function t() {
                                var e, i, a, n;
                                return r.a.wrap(function(t) {
                                    while (1) switch (t.prev = t.next) {
                                        case 0:
                                            if (this.$log("wantclick"), p) {
                                                t.next = 3;
                                                break
                                            }
                                            return t.abrupt("return");
                                        case 3:
                                            return p = !1, e = this.isWanted ? "https://app.zhuanzhuan.com/zz/transfer/delLoveInfo" : "https://app.zhuanzhuan.com/zz/transfer/addLoveInfo", i = {
                                                infoId: this.info.infoId,
                                                metric: this.$route.query.metric
                                            }, t.next = 8, this.$http.post(e, i);
                                        case 8:
                                            a = t.sent, n = a.data.respCode, p = !0, 0 == n && (this.isWanted = !this.isWanted);
                                        case 12:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t, this)
                            }));

                            function e() {
                                return t.apply(this, arguments)
                            }
                            return e
                        }()
                    }, h(a, "gotoMyWantList", [l["a"]], Object.getOwnPropertyDescriptor(a, "gotoMyWantList"), a), h(a, "gotoChat", [l["a"]], Object.getOwnPropertyDescriptor(a, "gotoChat"), a), h(a, "createOrder", [l["a"]], Object.getOwnPropertyDescriptor(a, "createOrder"), a), h(a, "handlerWant", [l["a"]], Object.getOwnPropertyDescriptor(a, "handlerWant"), a), a)
                },
                m = v,
                g = (i("9782"), i("2877")),
                C = Object(g["a"])(m, n, s, !1, null, "d1d10a2a", null);
            e["a"] = C.exports
        },
        7535: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "human-auth"
                    }, [i("alert", {
                        attrs: {
                            options: t.alertOpts
                        }
                    })], 1)
                },
                n = [],
                s = i("00a0"),
                o = i.n(s),
                r = i("b383"),
                c = i.n(r),
                l = {
                    props: {
                        callback: {
                            type: Function
                        }
                    },
                    data: function() {
                        return {
                            infoId: c.a.parse(location.search.split("?")[1]).infoId,
                            alertOpts: {
                                show: !1,
                                closeShow: !1,
                                title: "",
                                content: "",
                                buttons: []
                            },
                            spamData: {}
                        }
                    },
                    components: {
                        Alert: o.a
                    },
                    methods: {
                        createOrderCheckSpam: function() {
                            var t = this;
                            this.$http.get("/zzopen/gameAccount/createOrderCheckSpam", {
                                infoId: this.infoId || ""
                            }).then(function(e) {
                                var i = e.data;
                                if (0 == i.respCode) {
                                    var a = i.respData;
                                    if (0 == a.isPop) return void(t.callback && t.callback());
                                    t.$log("show-auth"), Object.assign(t.alertOpts, {
                                        show: !(1 != a.isPop),
                                        title: a.popTitle,
                                        content: a.popContent,
                                        height: 480,
                                        buttons: 1 == a.isForbid ? [{
                                            name: "知道了，去认证",
                                            click: function() {
                                                t.$log("hard-auth"), t.alertOpts.show = !1, t.$jump(a.jumpUrl)
                                            }
                                        }] : [{
                                            name: "先不认证",
                                            click: function() {
                                                t.$log("not-auth"), t.alertOpts.show = !1, t.callback && t.callback()
                                            }
                                        }, {
                                            name: "去认证",
                                            click: function() {
                                                t.$log("soft-auth"), t.alertOpts.show = !1, t.$jump(a.jumpUrl)
                                            }
                                        }]
                                    })
                                } else window.eventHub.$emit("toast", i.errorMsg || "请稍后重试")
                            })
                        }
                    },
                    created: function() {
                        var t = this;
                        window.eventHub.$on("startCheck", function() {
                            t.createOrderCheckSpam()
                        })
                    },
                    mounted: function() {
                        document.body.appendChild(this.$el)
                    }
                },
                u = l,
                d = i("2877"),
                f = Object(d["a"])(u, a, n, !1, null, null, null);
            e["a"] = f.exports
        },
        7540: function(t, e, i) {
            "use strict";
            var a = i("b045"),
                n = i.n(a);
            n.a
        },
        7577: function(t, e, i) {},
        7596: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("div", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: t.value,
                            expression: "value"
                        }],
                        staticClass: "mask-wrap",
                        style: {
                            backgroundColor: t.backgroundColor,
                            zIndex: t.zIndex
                        },
                        on: {
                            touchmove: function(t) {
                                t.preventDefault(), t.stopPropagation()
                            },
                            click: function(e) {
                                if (e.target !== e.currentTarget) return null;
                                t.clickClose && (t.show = !1)
                            }
                        }
                    }, [t._t("default")], 2)
                },
                n = [],
                s = {
                    props: {
                        value: {
                            type: Boolean,
                            default: !1
                        },
                        clickClose: {
                            type: Boolean,
                            default: !1
                        },
                        backgroundColor: {
                            type: String,
                            default: "rgba(0, 0, 0, .7)"
                        },
                        zIndex: {
                            type: [String, Number],
                            default: "999"
                        }
                    },
                    data: function() {
                        return {
                            show: this.value
                        }
                    },
                    watch: {
                        value: function(t) {
                            this.show = t
                        },
                        show: function(t) {
                            this.$emit("input", t)
                        }
                    }
                },
                o = s,
                r = (i("f569"), i("2877")),
                c = Object(r["a"])(o, a, n, !1, null, "7a60825a", null);
            e["a"] = c.exports
        },
        "7da7": function(t, e, i) {
            "use strict";
            var a = i("d91e"),
                n = i.n(a);
            n.a
        },
        "85d5": function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "goods-info"
                    }, [i("section", {
                        staticClass: "title"
                    }, [t._v("\n    商品详情\n  ")]), t.priceList.length ? i("section", {
                        staticClass: "rent-time"
                    }, [i("div", {
                        staticClass: "rent-time-wrap"
                    }, [i("table", {
                        staticClass: "table"
                    }, [i("tr", t._l(t.priceList, function(e) {
                        return i("td", {
                            staticClass: "rent-time-item"
                        }, [t._v("\n            " + t._s(e.paramKey) + "\n          ")])
                    }), 0), i("tr", t._l(t.priceList, function(e) {
                        return i("td", {
                            staticClass: "rent-time-item"
                        }, [t._v("\n            " + t._s(e.paramValue) + "元\n          ")])
                    }), 0)])])]) : t._e(), t.infoParams.length ? i("section", {
                        staticClass: "goods-info-param"
                    }, t._l(t.infoParams, function(e, a) {
                        return i("div", {
                            key: a,
                            staticClass: "goods-info-param-item"
                        }, [i("span", {
                            staticClass: "goods-info-param-key"
                        }, [t._v(t._s(e.paramKey.indexOf("登录需要令牌") >= 0 ? "登录需要令牌" : e.paramKey) + "：")]), i("span", {
                            staticClass: "goods-info-param-value"
                        }, [t._v(t._s(e.paramValue))])])
                    }), 0) : t._e(), t.isWZRYKind && t.paramsContent ? i("section", {
                        staticClass: "goods-info-pcontent"
                    }, [i("div", [t._v(t._s(t.paramsContent))])]) : t._e(), i("section", {
                        class: ["goods-detail", t.isOversize ? "ellipsis" : ""]
                    }, [t._v("\n    " + t._s(t.goodsContent) + "\n    "), t.isOversize ? i("span", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: t.isShowMore,
                            expression: "isShowMore"
                        }],
                        staticClass: "goods-detail-more",
                        on: {
                            click: t.showMore
                        }
                    }, [t._v("展开")]) : t._e()]), i("section", {
                        staticClass: "goods-img"
                    }, t._l(t.otherPics, function(e, a) {
                        return i("img", {
                            key: a,
                            staticClass: "good-img-item",
                            attrs: {
                                src: e,
                                alt: ""
                            },
                            on: {
                                click: t.enlargeImage
                            }
                        })
                    }), 0), i("section", {
                        staticClass: "line"
                    }), t.isAccount ? i("section", {
                        staticClass: "buy-flow"
                    }, [i("div", {
                        staticClass: "buy-flow-title"
                    }, [t._v("购买流程")]), i("img", {
                        attrs: {
                            src: "https://pic3.zhuanstatic.com/zhuanzh/n_v2b2ea97efd8ea4da5a6a6f8db11489bf8.png"
                        }
                    }), i("section", {
                        staticClass: "line"
                    })]) : t._e(), i("section", {
                        staticClass: "safeguard"
                    }, [i("div", {
                        ref: "guideAnchor",
                        staticClass: "detail-guarantee",
                        on: {
                            click: t.knowMore
                        }
                    }, [i("div", {
                        staticClass: "detail-guarantee-title"
                    }, [t._v("游戏交易保障")]), t._m(0)])]), i("section", {
                        staticClass: "random-banner",
                        on: {
                            click: function(e) {
                                return t.$jump("https://m.zhuanzhuan.com/open/ZZOpenBusiness/index.html#/game-points/index", "goGameCenter")
                            }
                        }
                    }, [i("img", {
                        attrs: {
                            src: "https://pic3.zhuanstatic.com/zhuanzh/n_v25124e6b242db4e79ab7ea9e863e571fe.png"
                        }
                    }), i("p", [t._v("来把你的积分换q币/话费卡吧！")])])])
                },
                n = [function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("div", {
                        staticClass: "detail-guarantee-detail"
                    }, [i("div", {
                        staticClass: "detail-guarantee-detail-item"
                    }, [i("span", {
                        staticClass: "kefu"
                    }), i("p", {
                        staticClass: "h5"
                    }, [t._v("客服全程协助"), i("br"), t._v("（50元以上商品）")])]), i("div", {
                        staticClass: "detail-guarantee-detail-item"
                    }, [i("span", {
                        staticClass: "currency"
                    }), i("p", {
                        staticClass: "h5"
                    }, [t._v("付款担保")])]), i("div", {
                        staticClass: "detail-guarantee-detail-item"
                    }, [i("span", {
                        staticClass: "identity"
                    }), i("p", {
                        staticClass: "h5"
                    }, [t._v("卖家身份认证")])])])
                }],
                s = i("2ec8"),
                o = i("b769"),
                r = i("0d6d"),
                c = {
                    data: function() {
                        return {
                            isOversize: !1,
                            isShowMore: !1,
                            otherPics: [],
                            isWZRYKind: !1,
                            isAccount: !1
                        }
                    },
                    props: {
                        goodsInfo: {
                            default: function() {
                                return {}
                            }
                        }
                    },
                    computed: {
                        priceList: function() {
                            var t = this.goodsInfo.infoParams,
                                e = void 0 === t ? [] : t;
                            return e.filter(function(t) {
                                var e = t.paramKey;
                                return !!~e.indexOf("价格")
                            }).map(function(t) {
                                var e = t.paramKey,
                                    i = t.paramValue;
                                return {
                                    paramKey: e.replace(/(优惠)?价格/g, ""),
                                    paramValue: i
                                }
                            })
                        },
                        infoParams: function() {
                            var t = this.goodsInfo.infoParams,
                                e = void 0 === t ? [] : t;
                            return e.filter(function(t) {
                                var e = t.paramKey;
                                return !~e.indexOf("价格")
                            })
                        },
                        paramsContent: function() {
                            var t, e = this.goodsInfo.content;
                            if (!e) return "";
                            var i = e.indexOf("\n"); - 1 === i && (i = 0), e = null === (t = e.slice(0, i)) || void 0 === t ? void 0 : t.split("|");
                            var a = e.filter(function(t) {
                                    return /特色英雄|星元皮肤|荣耀典藏|限定皮肤/.exec(t)
                                }),
                                n = [];
                            return a.forEach(function(t) {
                                t = t.trim();
                                var e = t.split(":");
                                e[1] && "无" != e[1].trim() && n.push(e[1].replace(/&/gi, "/"))
                            }), n.join("/")
                        },
                        goodsContent: function() {
                            var t = this.goodsInfo.content;
                            if (!t) return "";
                            var e = t.indexOf("\n");
                            return -1 === e && (e = 0), this.isOversize ? (this.isShowMore = !0, this.cutstr(t.slice(e), 120)) : (this.isShowMore = !1, t.slice(e))
                        }
                    },
                    methods: {
                        showMore: function() {
                            this.isOversize = !1
                        },
                        strLength: function(t) {
                            for (var e = 0, i = t.length, a = -1, n = 0; n < i; n++) a = t.charCodeAt(n), e += a >= 0 && a <= 128 ? 1 : 2;
                            return e
                        },
                        cutstr: function(t, e) {
                            var i = 0,
                                a = 0,
                                n = new String;
                            a = t.length;
                            for (var s = 0; s < a; s++) {
                                var o = t.charAt(s);
                                if (i++, escape(o).length > 4 && i++, n = n.concat(o), i >= e) return n = n.concat("..."), n
                            }
                            if (i < e) return t
                        },
                        knowMore: function() {
                            var t = this.goodsInfo.uid,
                                e = s["a"].get("uid") === t ? 1 : 2;
                            this.$jump("https://m.zhuanzhuan.com/open/ZZOpenBusiness/index.html?userType=".concat(e, "#/trade-desc"))
                        },
                        enlargeImage: function() {
                            o["a"].enlargeImage({
                                imgUrls: this.otherPics.join("|"),
                                selectedIndex: 0
                            })
                        }
                    },
                    watch: {
                        goodsInfo: {
                            immediate: !0,
                            handler: function(t) {
                                if (t.content) {
                                    var e = t.content.indexOf("\n"); - 1 === e && (e = 0), this.isOversize = this.strLength(t.content.slice(e)) > 120
                                }
                                if (t.pics) {
                                    var i = t.pics.split("|");
                                    this.otherPics = i.map(function(t) {
                                        return r["a"].handleSingle(t)
                                    })
                                }
                                if (t.infoParams) {
                                    var a = t.infoParams.filter(function(t) {
                                            return "账号类型" == t.paramKey && "成品号" == t.paramValue
                                        }),
                                        n = !!a.length;
                                    this.isWZRYKind = "2123001001" == t.cateId && n
                                }
                                t.cateId && (this.isAccount = t.cateId.includes("2123001"))
                            }
                        }
                    }
                },
                l = c,
                u = (i("a1fe"), i("2877")),
                d = Object(u["a"])(l, a, n, !1, null, "e5a352ca", null);
            e["a"] = d.exports
        },
        8652: function(t, e, i) {},
        "8f81": function(t, e, i) {
            "use strict";
            var a = i("e470"),
                n = i.n(a);
            n.a
        },
        "8fda": function(t, e, i) {
            "use strict";
            e["a"] = {
                methods: {
                    detailCommonLog: function(t) {
                        this.$log(t, "MGAME-DETAIL-COMMON-LOG")
                    },
                    sendBrowseCount: function() {
                        var t = this.$route.query.infoId;
                        t && this.$http.post("https://app.zhuanzhuan.com/zzopen/gameAccount/browseCount", {
                            pid: t
                        })
                    }
                },
                mounted: function() {
                    var t = this.$route.query.infoId;
                    this.$log("MGAMEDETAILCOMMONLOG", "MGAME-DETAIL-COMMON-LOG", {
                        infoId: t
                    }), this.sendBrowseCount()
                }
            }
        },
        "90c2": function(t, e, i) {
            "use strict";
            var a = i("8652"),
                n = i.n(a);
            n.a
        },
        "94db": function(t, e, i) {
            "use strict";
            var a = i("1e0f"),
                n = i.n(a);
            n.a
        },
        9747: function(t, e, i) {
            "use strict";
            var a = i("3db3"),
                n = i.n(a);
            n.a
        },
        9782: function(t, e, i) {
            "use strict";
            var a = i("bcda"),
                n = i.n(a);
            n.a
        },
        "994bb": function(t, e, i) {},
        "9b13": function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "detail-head"
                    }, [i("div", {
                        staticClass: "detail-head-user"
                    }, [i("div", {
                        staticClass: "detail-head-user-info"
                    }, [t.info.portrait ? i("div", {
                        staticClass: "detail-head-user-info-portrait",
                        style: {
                            backgroundImage: "url(" + t.info.portrait + ")"
                        }
                    }) : t._e(), t._v("\n      " + t._s(t.info.nickName) + "\n      "), t.gradeIcon ? i("img", {
                        staticClass: "detail-head-user-info-grade",
                        attrs: {
                            src: t.gradeIcon
                        }
                    }) : t._e()]), i("div", {
                        staticClass: "detail-head-user-since"
                    }, [t._v("\n      " + t._s(t.info.updateTimeDiff) + "\n    ")])]), i("div", {
                        staticClass: "detail-head-price"
                    }, [t._v("\n    ￥"), i("span", {
                        staticClass: "detail-head-price-main"
                    }, [t._v(t._s(t.priceInt))]), t._v("." + t._s(t.priceFractional)), t.isHourPrice ? i("span", [t._v("元/小时")]) : t._e()]), i("div", {
                        staticClass: "detail-head-title"
                    }, [t._v("\n    " + t._s(t.info.title) + "\n  ")]), t.sellerAgreement ? i("div", {
                        staticClass: "detail-head-agreement"
                    }, [i("img", {
                        attrs: {
                            src: "https://pic5.zhuanstatic.com/zhuanzh/n_v263b176f4d2774b7488b58506580502e3.png"
                        }
                    }), t._v("\n    已签账号转让协议\n  ")]) : i("div", {
                        staticClass: "detail-head-tags"
                    }, t._l(t.tags, function(e) {
                        return i("div", {
                            staticClass: "detail-head-tags-item"
                        }, [t._v("\n      " + t._s(e) + "\n    ")])
                    }), 0)])
                },
                n = [],
                s = {
                    props: {
                        price: {
                            default: 0
                        },
                        info: {
                            type: Object
                        },
                        tags: {
                            default: function() {
                                return []
                            }
                        },
                        isHourPrice: {
                            type: Boolean,
                            default: !1
                        },
                        sellerAgreement: {
                            type: Boolean,
                            default: !1
                        },
                        gradeIcon: {
                            type: String
                        }
                    },
                    computed: {
                        priceInt: function() {
                            return parseInt(this.price / 100)
                        },
                        priceFractional: function() {
                            var t = parseInt(this.price - 100 * this.priceInt);
                            return t >= 10 ? t : "0" + t
                        }
                    }
                },
                o = s,
                r = (i("8f81"), i("2877")),
                c = Object(r["a"])(o, a, n, !1, null, "9a7b9916", null);
            e["a"] = c.exports
        },
        a158: function(t, e, i) {},
        a1fe: function(t, e, i) {
            "use strict";
            var a = i("cebe"),
                n = i.n(a);
            n.a
        },
        a3ab: function(t, e, i) {},
        ac95: function(t, e, i) {
            "use strict";
            var a = i("994bb"),
                n = i.n(a);
            n.a
        },
        b045: function(t, e, i) {},
        b742: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "detail-user"
                    }, [i("div", {
                        staticClass: "detail-user-title"
                    }, [t._v("\n    关于卖家\n  ")]), i("div", {
                        staticClass: "detail-user-info",
                        on: {
                            click: function(e) {
                                t.opts.show = !0
                            }
                        }
                    }, [i("div", {
                        staticClass: "detail-user-info-avater",
                        style: {
                            "background-image": "url(" + t.avater + ")"
                        }
                    }, [i("span", {
                        staticClass: "detail-user-info-avater-vip"
                    })]), i("div", {
                        staticClass: "detail-user-info-detail"
                    }, [i("div", {
                        staticClass: "detail-user-info-detail-nickname"
                    }, [t._v("\n        " + t._s(t.goodsdetailextrainfo.nickName)), t.gradeIcon ? i("img", {
                        attrs: {
                            src: t.gradeIcon
                        }
                    }) : t._e()]), i("div", {
                        staticClass: "detail-user-info-detail-other"
                    }, [t._v(t._s(t.goodsdetailextrainfo.updateTime))])]), i("i", {
                        staticClass: "iconfont icon-arrow-right"
                    })]), i("div", {
                        staticClass: "detail-user-level"
                    }, [i("div", {
                        staticClass: "detail-user-level-cate"
                    }, [i("p", {
                        staticClass: "detail-user-level-cate-value"
                    }, [t._v(t._s(t.goodsdetailextrainfo.sellingCount))]), i("p", {
                        staticClass: "detail-user-level-cate-desc"
                    }, [t._v("在售宝贝")])]), i("div", {
                        staticClass: "detail-user-level-cate"
                    }, [i("p", {
                        staticClass: "detail-user-level-cate-value"
                    }, [t._v(t._s(t.goodsdetailextrainfo.totalCount))]), i("p", {
                        staticClass: "detail-user-level-cate-desc"
                    }, [t._v("累计交易")])]), i("div", {
                        staticClass: "detail-user-level-cate"
                    }, [i("p", {
                        staticClass: "detail-user-level-cate-value"
                    }, [t._v(t._s(t.goodsdetailextrainfo.replyRate || 0))]), i("p", {
                        staticClass: "detail-user-level-cate-desc"
                    }, [t._v("回复率")])])]), t.swipeList && t.swipeList.length ? i("div", {
                        directives: [{
                            name: "touch",
                            rawName: "v-touch:swipeleft",
                            value: t.swipeleftHandler,
                            expression: "swipeleftHandler",
                            arg: "swipeleft"
                        }, {
                            name: "touch",
                            rawName: "v-touch:swiperight",
                            value: t.swiperightHandler,
                            expression: "swiperightHandler",
                            arg: "swiperight"
                        }],
                        staticClass: "cate"
                    }, [i("div", {
                        staticClass: "cate-list",
                        style: t.listStyle
                    }, t._l(t.swipeList, function(e, a) {
                        return i("div", {
                            staticClass: "cate-list-part"
                        }, [t._l(e, function(e, a) {
                            return i("div", {
                                staticClass: "cate-list-part-item",
                                style: {
                                    backgroundImage: "url(" + t.handleSingle(e.picUrl, 155, 155) + ")"
                                },
                                on: {
                                    click: function(i) {
                                        return t.goProductList(e)
                                    }
                                }
                            }, [i("div", {
                                staticClass: "cate-list-part-item-price"
                            }, [t._v("￥" + t._s(t._f("filterPrice")(e.nowPrice_f)))])])
                        }), t.showMore && 2 == a ? i("div", {
                            staticClass: "cate-list-part-item more",
                            on: {
                                click: function(e) {
                                    t.opts.show = !0
                                }
                            }
                        }, [i("div", {
                            staticClass: "text"
                        }, [t._v("查看更多")])]) : t._e()], 2)
                    }), 0), t.swipeLength > 1 ? i("div", {
                        staticClass: "cate-dot"
                    }, t._l(t.swipeLength, function(e) {
                        return i("div", {
                            staticClass: "cate-dot-item",
                            class: {
                                active: e - 1 == t.swipeIndex
                            }
                        })
                    }), 0) : t._e()]) : t._e(), i("alert", {
                        attrs: {
                            options: t.opts
                        }
                    })], 1)
                },
                n = [],
                s = i("00a0"),
                o = i.n(s),
                r = i("b769"),
                c = i("0d6d"),
                l = 686,
                u = {
                    components: {
                        Alert: o.a
                    },
                    data: function() {
                        var t = this;
                        return {
                            opts: {
                                show: !1,
                                height: 750,
                                title: "关于账号用户分",
                                contentFontAlign: "left",
                                content: "1.账号用户分分为买家分与卖家分。<br>2.买家初始分3分，卖家初始分4分。<br>3.因买家原因或卖家原因取消订单都会被扣1分，成交加1分。<br>4.分值为0，将禁止在游戏分类购买或出售。<br>关于卖家等级：<br>0-3分内：较差 <br>4-8分：一般 <br>9-20分：较好 <br>21-50分：极好 <br>51分以上：非常好",
                                buttons: [{
                                    name: "知道了",
                                    click: function() {
                                        t.opts.show = !1, t.enterProfile()
                                    }
                                }]
                            },
                            goodsdetailextrainfo: {},
                            swipeIndex: 0,
                            swipeLength: 0,
                            swipeList: [],
                            showMore: !1
                        }
                    },
                    props: {
                        infoId: {
                            type: String,
                            default: ""
                        },
                        gradeIcon: {
                            type: String
                        }
                    },
                    computed: {
                        avater: function() {
                            return this.goodsdetailextrainfo ? c["a"].handleSingle(this.goodsdetailextrainfo.portrait, 92, 92) : ""
                        },
                        listStyle: function() {
                            return {
                                webkitTransform: "translateX(".concat(-this.getRealPX(l) * this.swipeIndex, "px)"),
                                transform: "translateX(".concat(-this.getRealPX(l) * this.swipeIndex, "px)")
                            }
                        },
                        rem2px: function() {
                            return document.documentElement.clientWidth / 320 * 16
                        }
                    },
                    methods: {
                        handleSingle: function(t, e, i) {
                            return c["a"].handleSingle(t, e, i)
                        },
                        getRealPX: function(t) {
                            return 320 * t / 750 / 16 * 1 * this.rem2px
                        },
                        goProductList: function(t) {
                            r["a"].enterDetail({
                                infoId: t.infoId,
                                metric: t.metric
                            })
                        },
                        enterProfile: function() {
                            this.$log("enterhomepageclick"), r["a"].enterProfile({
                                userId: this.goodsdetailextrainfo.uid
                            })
                        },
                        swipeleftHandler: function() {
                            this.swipeIndex < this.swipeLength - 1 && this.swipeIndex++
                        },
                        swiperightHandler: function() {
                            this.swipeIndex > 0 && this.swipeIndex--
                        },
                        getgoodsdetailextrainfo: function() {
                            var t = this;
                            this.$http.get("/zz/transfer/getgoodsdetailextrainfo", {
                                infoId: this.infoId
                            }).then(function(e) {
                                if (0 == e.data.respCode && e.data.respData) {
                                    var i;
                                    t.goodsdetailextrainfo = e.data.respData;
                                    var a = null === (i = t.goodsdetailextrainfo.myInfos) || void 0 === i ? void 0 : i.slice(0, 11);
                                    while (a && a.length > 0) t.swipeList.push(a.splice(0, 4));
                                    t.swipeLength = t.swipeList.length, t.showMore = t.goodsdetailextrainfo.sellingCount > 11
                                }
                            })
                        }
                    },
                    created: function() {
                        this.getgoodsdetailextrainfo()
                    }
                },
                d = u,
                f = (i("ac95"), i("2877")),
                h = Object(f["a"])(d, a, n, !1, null, "0abcc5fb", null);
            e["a"] = h.exports
        },
        bcda: function(t, e, i) {},
        c09e: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "detail-question"
                    }, [i("section", {
                        staticClass: "title"
                    }, [t._v("\n    互动\n  ")]), i("section", {
                        staticClass: "content"
                    }, [t._v("\n    暂无更多问题\n  ")]), i("section", {
                        staticClass: "question"
                    }, [i("div", {
                        staticClass: "question-head"
                    }, [t._v("\n      大家都想问(" + t._s(t.question.length) + ")\n    ")]), i("div", {
                        staticClass: "question-list"
                    }, t._l(t.question, function(e) {
                        return i("div", {
                            staticClass: "question-list-item"
                        }, [i("i", [t._v("问")]), i("div", {
                            staticClass: "question-list-item-title"
                        }, [t._v("\n          " + t._s(e.title) + "\n        ")]), i("div", {
                            staticClass: "question-list-item-answer"
                        }, [t._v("\n          " + t._s(e.answer) + "\n        ")])])
                    }), 0)])])
                },
                n = [],
                s = {
                    props: {
                        question: {
                            type: Array,
                            default: function() {
                                return []
                            }
                        }
                    }
                },
                o = s,
                r = (i("1dc1"), i("2877")),
                c = Object(r["a"])(o, a, n, !1, null, "29ac97f4", null);
            e["a"] = c.exports
        },
        c926: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("article", {
                        staticClass: "account-info"
                    }, [i("section", {
                        staticClass: "account-info-mask",
                        on: {
                            touchmove: t.touchForbidden
                        }
                    }), i("section", {
                        staticClass: "account-info-panel",
                        on: {
                            touchstart: t.touchstart,
                            touchmove: t.touchmove
                        }
                    }, [i("section", {
                        staticClass: "account-info-close",
                        on: {
                            click: t.closePanel
                        }
                    }), t._m(0), i("section", {
                        ref: "scroll",
                        staticClass: "account-info-scroll"
                    }, [i("section", {
                        staticClass: "account-info-wrap"
                    }, [i("div", {
                        staticClass: "title"
                    }, [t._v(t._s(t.title.hero ? t.title.hero : "英雄") + "(" + t._s(t.heroCount) + "个)")]), t._l(t.hero, function(e) {
                        return i("div", {
                            staticClass: "wraps"
                        }, [i("div", {
                            staticClass: "left"
                        }, [t._v(t._s(e.role) + ":")]), i("div", {
                            staticClass: "right"
                        }, [t._v(t._s(e.data.join("，")))])])
                    })], 2), i("section", {
                        staticClass: "account-info-wrap"
                    }, [i("div", {
                        staticClass: "title"
                    }, [t._v(t._s(t.title.skin ? t.title.skin : "稀有皮肤"))]), t._l(t.skin, function(e) {
                        return i("div", {
                            staticClass: "wraps"
                        }, [i("div", {
                            staticClass: "left"
                        }, [t._v(t._s(e.role) + ":")]), i("div", {
                            staticClass: "right"
                        }, [t._v(t._s(e.data.join("，")))])])
                    })], 2)])])])
                },
                n = [function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "account-info-title"
                    }, [i("p", [t._v("验号信息")])])
                }],
                s = {
                    data: function() {
                        return {
                            lastY: 0
                        }
                    },
                    props: {
                        hero: {
                            default: function() {
                                return []
                            }
                        },
                        skin: {
                            default: function() {
                                return []
                            }
                        },
                        heroCount: {
                            default: ""
                        },
                        skinCount: {
                            default: ""
                        },
                        closeHandle: {
                            default: function() {}
                        },
                        title: {
                            default: function() {
                                return {}
                            }
                        }
                    },
                    computed: {},
                    methods: {
                        closePanel: function() {
                            this.closeHandle && this.closeHandle()
                        },
                        touchForbidden: function(t) {
                            t.preventDefault(), t.stopPropagation()
                        },
                        touchstart: function(t) {
                            this.lastY = t.targetTouches[0].clientY
                        },
                        touchmove: function(t) {
                            var e = t.targetTouches[0].clientY,
                                i = this.lastY - e,
                                a = this.$refs["scroll"],
                                n = a.scrollTop,
                                s = a.scrollHeight,
                                o = a.clientHeight;
                            return i < 0 && 0 === n ? (this.touchForbidden(t), !1) : i > 0 && n + o === s ? (this.touchForbidden(t), !1) : void 0
                        }
                    }
                },
                o = s,
                r = (i("7540"), i("2877")),
                c = Object(r["a"])(o, a, n, !1, null, "d0d6eaaa", null);
            e["a"] = c.exports
        },
        cebe: function(t, e, i) {},
        d91e: function(t, e, i) {},
        d939: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "fix-bottom",
                        style: {
                            paddingBottom: t.paddingBottom
                        }
                    }, [t._t("default")], 2)
                },
                n = [],
                s = i("903c"),
                o = i.n(s),
                r = {
                    props: {
                        placeholder: {
                            type: Boolean,
                            default: !0
                        }
                    },
                    data: function() {
                        return {
                            isIphoneX: o.a.isIphoneX()
                        }
                    },
                    computed: {
                        paddingBottom: function() {
                            return this.isIphoneX ? "25px" : "0"
                        }
                    },
                    mounted: function() {
                        this.placeholder && this.$el.parentElement && (this.$el.parentElement.style["padding-bottom"] = this.$el.offsetHeight + "px")
                    }
                },
                c = r,
                l = (i("94db"), i("2877")),
                u = Object(l["a"])(c, a, n, !1, null, "8526d880", null);
            e["a"] = u.exports
        },
        dd90: function(t, e, i) {},
        e01c: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", [i("mask-wrap", {
                        model: {
                            value: t.errorStatus,
                            callback: function(e) {
                                t.errorStatus = e
                            },
                            expression: "errorStatus"
                        }
                    }, [i("section", {
                        staticClass: "error-status"
                    }, [i("div", {
                        staticClass: "error-status-title"
                    }, [t._v("\n        提示\n      ")]), i("div", {
                        staticClass: "error-status-content"
                    }, [t._v("\n        该商品暂不可用，请浏览其他商品\n      ")]), i("div", {
                        staticClass: "error-status-button",
                        on: {
                            click: function(e) {
                                return t.$jump("https://m.zhuanzhuan.com/open/ZZOpenBusiness/index.html#/game-home/game-index")
                            }
                        }
                    }, [t._v("\n        去首页\n      ")])])]), i("mask-wrap", {
                        attrs: {
                            "click-close": !0
                        },
                        model: {
                            value: t.leadShow,
                            callback: function(e) {
                                t.leadShow = e
                            },
                            expression: "leadShow"
                        }
                    }, [i("section", {
                        staticClass: "lead-alert"
                    }, [i("i", {
                        staticClass: "lead-alert-close",
                        on: {
                            click: function(e) {
                                t.leadShow = !1
                            }
                        }
                    }), i("div", {
                        staticClass: "lead-alert-btn",
                        on: {
                            click: t.clickLead
                        }
                    })])])], 1)
                },
                n = [],
                s = i("a34a"),
                o = i.n(s),
                r = i("7596");

            function c(t, e, i, a, n, s, o) {
                try {
                    var r = t[s](o),
                        c = r.value
                } catch (l) {
                    return void i(l)
                }
                r.done ? e(c) : Promise.resolve(c).then(a, n)
            }

            function l(t) {
                return function() {
                    var e = this,
                        i = arguments;
                    return new Promise(function(a, n) {
                        var s = t.apply(e, i);

                        function o(t) {
                            c(s, a, n, o, r, "next", t)
                        }

                        function r(t) {
                            c(s, a, n, o, r, "throw", t)
                        }
                        o(void 0)
                    })
                }
            }
            var u = {
                    props: ["info"],
                    components: {
                        MaskWrap: r["a"]
                    },
                    data: function() {
                        return {
                            errorStatus: !1,
                            leadShow: !1
                        }
                    },
                    methods: {
                        initStatus: function() {
                            if ("1" !== this.info.status) return this.errorStatus = !0, !0
                        },
                        initLead: function() {
                            var t, e, i, a = null === (t = localStorage) || void 0 === t ? void 0 : t.getItem("game-index-lead"),
                                n = null === (e = localStorage) || void 0 === e ? void 0 : e.getItem("game-detail-alert"),
                                s = Date.now();
                            if ((!a || s - a > 6048e4) && (!n || s - n >= 864e5)) return this.$log("showLead", "MGAME_DETAIL"), null === (i = localStorage) || void 0 === i || i.setItem("game-detail-alert", String(s)), this.leadShow = !0, !0
                        },
                        clickLead: function() {
                            Math.random() > .5 ? (this.$log("clickLead", "MGAME_DETAIL", {
                                type: 1
                            }), this.$jump("https://m.zhuanzhuan.com/open/ZZOpenBusiness/index.html?channle=lead#/game-home/game-index")) : (this.$log("clickLead", "MGAME_DETAIL", {
                                type: 2
                            }), this.$jump("https://m.zhuanzhuan.com/Mzhuanzhuan/zhuanzhuan/zzactivity/magic/5d79eca30eacf80894c4bb2e/index.html?pageid=1342256897"))
                        }
                    },
                    created: function() {
                        var t = l(o.a.mark(function t() {
                            var e, i, a;
                            return o.a.wrap(function(t) {
                                while (1) switch (t.prev = t.next) {
                                    case 0:
                                        e = [this.initStatus, this.initLead], i = 0;
                                    case 2:
                                        if (!(i < e.length)) {
                                            t.next = 14;
                                            break
                                        }
                                        if (a = e[i], t.t0 = "function" === typeof a, !t.t0) {
                                            t.next = 9;
                                            break
                                        }
                                        return t.next = 8, a();
                                    case 8:
                                        t.t0 = t.sent;
                                    case 9:
                                        if (!t.t0) {
                                            t.next = 11;
                                            break
                                        }
                                        return t.abrupt("break", 14);
                                    case 11:
                                        i++, t.next = 2;
                                        break;
                                    case 14:
                                    case "end":
                                        return t.stop()
                                }
                            }, t, this)
                        }));

                        function e() {
                            return t.apply(this, arguments)
                        }
                        return e
                    }()
                },
                d = u,
                f = (i("0b0a"), i("2877")),
                h = Object(f["a"])(d, a, n, !1, null, "5e4cc613", null);
            e["a"] = h.exports
        },
        e470: function(t, e, i) {},
        e718: function(t, e, i) {
            "use strict";
            i.r(e);
            var a, n = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return t.isDataReady ? i("section", {
                        staticClass: "detail"
                    }, [i("detail-head", {
                        attrs: {
                            info: t.goodsInfo,
                            price: t.nowPrice_f,
                            "grade-icon": t.gradeIcon,
                            sellerAgreement: t.sellerAgreement,
                            tags: t.tags
                        }
                    }), t.insuranceFlag ? i("article", {
                        staticClass: "cash-deposit"
                    }, [t._m(0)]) : t._e(), 2123001001 === parseInt(t.goodsInfo.cateId) ? i("lease-validate-report", {
                        attrs: {
                            "goods-info": t.goodsInfo,
                            "lease-param": t.leaseParam
                        }
                    }) : t._e(), 2123001003 === parseInt(t.goodsInfo.cateId) ? i("lease-validate-report-qzwz", {
                        attrs: {
                            "goods-info": t.goodsInfo,
                            "lease-param": t.leaseParam
                        }
                    }) : t._e(), i("goods-info", {
                        attrs: {
                            "goods-info": t.goodsInfo
                        }
                    }), i("user-info", {
                        attrs: {
                            "info-id": t.infoId,
                            "grade-icon": t.gradeIcon
                        }
                    }), i("detail-question", {
                        attrs: {
                            question: t.question
                        }
                    }), i("detail-recommend", {
                        attrs: {
                            infoid: t.infoId,
                            "is-jdqs": !0
                        }
                    }), i("detail-button", {
                        attrs: {
                            info: t.goodsInfo,
                            "is-seller": t.isSeller,
                            "event-hub": t.eventHub,
                            "product-status": t.goodsInfo.status,
                            "is-activity-product": t.isActivityProduct
                        }
                    }), i("detail-alert", {
                        attrs: {
                            info: t.goodsInfo
                        }
                    })], 1) : t._e()
                },
                s = [function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("section", {
                        staticClass: "cash-deposit-wrap"
                    }, [i("div", {
                        staticClass: "cash-deposit-title"
                    }, [i("span", {
                        staticClass: "title"
                    }, [t._v("包赔服务")]), i("span", {
                        staticClass: "detail"
                    }, [t._v("购买时选择包赔服务即可获赠交易安全险保障")])]), i("div", {
                        staticClass: "cash-deposit-arrow"
                    })])
                }],
                o = i("a34a"),
                r = i.n(o),
                c = i("a026"),
                l = i("2ec8"),
                u = i("352c"),
                d = i("8fda"),
                f = i("6253"),
                h = i("b742"),
                p = i("c09e"),
                v = i("9b13"),
                m = i("4a1c"),
                g = i("85d5"),
                C = i("e01c"),
                b = i("2493"),
                _ = i("ed2f"),
                I = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("div", [i("detail-button", {
                        attrs: {
                            info: t.info
                        },
                        scopedSlots: t._u([t.isSeller ? {
                            key: "left-button",
                            fn: function() {
                                return [i("button", {
                                    staticClass: "left-button",
                                    on: {
                                        click: t.deleteInfo
                                    }
                                }, [t._v("删除")])]
                            },
                            proxy: !0
                        } : null, t.isSeller ? {
                            key: "right-button",
                            fn: function() {
                                return [i("button", {
                                    staticClass: "right-button",
                                    on: {
                                        click: t.editInfo
                                    }
                                }, [t._v("编辑")])]
                            },
                            proxy: !0
                        } : {
                            key: "right-button",
                            fn: function() {
                                return [i("button", {
                                    staticClass: "right-button",
                                    on: {
                                        click: t.preCreateOrder
                                    }
                                }, [t._v("\n        立即购买\n        "), i("i", {
                                    staticClass: "button-bubble"
                                }, [t._v("请确保您已年满18周岁或在监护人同意并指导下购买")])])]
                            },
                            proxy: !0
                        }], null, !0)
                    }), i("human-authentication", {
                        attrs: {
                            callback: t.createOrder
                        }
                    })], 1)
                },
                w = [],
                y = i("537b"),
                k = i("699a"),
                z = i("7535");

            function P(t, e, i, a, n) {
                var s = {};
                return Object.keys(a).forEach(function(t) {
                    s[t] = a[t]
                }), s.enumerable = !!s.enumerable, s.configurable = !!s.configurable, ("value" in s || s.initializer) && (s.writable = !0), s = i.slice().reverse().reduce(function(i, a) {
                    return a(t, e, i) || i
                }, s), n && void 0 !== s.initializer && (s.value = s.initializer ? s.initializer.call(n) : void 0, s.initializer = void 0), void 0 === s.initializer && (Object.defineProperty(t, e, s), s = null), s
            }
            var A = {
                    props: ["info", "isSeller", "eventHub", "productStatus", "isActivityProduct"],
                    components: {
                        DetailButton: k["a"],
                        HumanAuthentication: z["a"]
                    },
                    data: function() {
                        return {}
                    },
                    methods: (a = {
                        preCreateOrder: function() {
                            window.eventHub.$emit("startCheck")
                        },
                        createOrder: function() {
                            var t = this;
                            return this.$log("buyclick"), this.$log("buyclick", "MGAME-DETAIL-COMMON-LOG", {
                                infoId: this.info.infoId
                            }), "1" !== this.productStatus ? this.$ZZAPP.toast({
                                msg: "该商品未在售"
                            }) : this.info.status && "1" !== this.info.status ? this.$ZZAPP.toast({
                                msg: "商品状态异常"
                            }) : void(this.isActivityProduct ? this.$http.get("https://app.zhuanzhuan.com/zzopen/gameAccount/createGameOrder", {
                                arg: JSON.stringify({
                                    productId: this.info.infoId,
                                    metric: this.$route.query.metric
                                })
                            }).then(function(e) {
                                var i = e.data,
                                    a = i.respCode,
                                    n = i.respData,
                                    s = i.errorMsg;
                                0 == a ? t.$ZZAPP.enterOrderDetail({
                                    orderId: n.orderId,
                                    metric: t.$route.query.metric
                                }) : t.$ZZAPP.toast({
                                    msg: s
                                })
                            }) : this.$ZZAPP.enterConfirmOrder({
                                infoId: this.info.infoId,
                                from: "m",
                                metric: this.$route.query.metric
                            }))
                        },
                        deleteInfo: function() {
                            var t = this;
                            this.$http.post("https://app.zhuanzhuan.com/zz/transfer/delInfo", {
                                infoId: this.info.infoId,
                                identity: 1
                            }).then(function(e) {
                                0 == e.data.respCode ? t.$ZZAPP.toast({
                                    msg: "商品下架成功！"
                                }) : t.$ZZAPP.toast({
                                    msg: e.data.errMsg
                                })
                            })
                        },
                        editInfo: function() {
                            this.$ZZAPP.editPublish({
                                infoId: this.info.infoId
                            })
                        }
                    }, P(a, "preCreateOrder", [y["a"]], Object.getOwnPropertyDescriptor(a, "preCreateOrder"), a), a)
                },
                x = A,
                O = (i("5729"), i("2877")),
                $ = Object(O["a"])(x, I, w, !1, null, "127e6322", null),
                S = $.exports;

            function j(t, e, i, a, n, s, o) {
                try {
                    var r = t[s](o),
                        c = r.value
                } catch (l) {
                    return void i(l)
                }
                r.done ? e(c) : Promise.resolve(c).then(a, n)
            }

            function L(t) {
                return function() {
                    var e = this,
                        i = arguments;
                    return new Promise(function(a, n) {
                        var s = t.apply(e, i);

                        function o(t) {
                            j(s, a, n, o, r, "next", t)
                        }

                        function r(t) {
                            j(s, a, n, o, r, "throw", t)
                        }
                        o(void 0)
                    })
                }
            }
            var E = {
                    mixins: [u["a"], d["a"]],
                    data: function() {
                        return {
                            eventHub: new c["default"],
                            goodsInfo: {},
                            infoId: this.$route.query.infoId,
                            metric: this.$route.query.metric,
                            isDataReady: !1,
                            browserUid: l["a"].getUID(),
                            insuranceFlag: !1,
                            sellerAgreement: !1,
                            verifiedStatus: !1,
                            auditStatus: !1,
                            transactionNum: "",
                            sellerGrade: "",
                            isActivityProduct: !1,
                            activityPrice: 0,
                            question: [{
                                title: "有卖家要加我q交易，会不会是骗子？",
                                answer: "答：双方沟通必须转转消息沟通。如果使用QQ、微信等其它聊天工具进行交易，平台将不作为交易依据，您的交易将得不到基本的保障"
                            }, {
                                title: "交易过程中，卖家让我支付押金，要给他吗？",
                                answer: "答：如遇交易中让缴纳钱款的请立即举报"
                            }, {
                                title: "怎么买号啊，一脸懵逼？",
                                answer: "答：当订单金额小于50元时：\n第一步：卖家订单中点击“开始交易”发号；\n第二步：买家验证游戏和安全信息；\n温馨提示：此类交易卖家发货后买家无法直接取消订单和申请退款，如果遇到卖家账号存在问题且不配合的情况下可联系“人工客服”为您进行处理，如果卖家发货7天后才联系我们，将不再受理此问题。 \n        当订单金额大于50元时：\n第一步：卖家订单中点击“开始交易”发送账号密码；\n第二步：买家验证结果；\n第三步：联系客服换绑；\n温馨提示：订单发货后，订单将在7天自动完成交易，交完成后再进行提现，期间内账号出现问题请联系我们进行处理。    提现时间为：7天，放心买专区4天。"
                            }]
                        }
                    },
                    computed: {
                        isSeller: function() {
                            return this.browserUid && this.browserUid === this.goodsInfo.uid
                        },
                        nowPrice_f: function() {
                            return this.activityPrice || this.goodsInfo.nowPrice_f || "0"
                        },
                        tags: function() {
                            var t = [];
                            return this.isActivityProduct && t.push("限时活动价"), this.auditStatus && t.push("真实地址"), this.verifiedStatus && t.push("已实名"), this.transactionNum && t.push("已成交".concat(this.transactionNum, "次")), t.length < 3 && this.insuranceFlag && t.push("支持包赔服务"), t
                        },
                        leaseParam: function() {
                            var t = {
                                    2123001003: ["英雄武器数", "排位等级", "角色数", "最短租期", "客户端类型", "是否使用上号器（仅安卓QQ）"],
                                    2123001001: ["信誉分", "英雄数", "皮肤数", "最短租期", "客户端类型", "段位"]
                                },
                                e = [];
                            return this.goodsInfo.cateId && (e = t[this.goodsInfo.cateId]), e
                        },
                        gradeIcon: function() {
                            if ("number" === typeof this.sellerGrade) return this.sellerGrade > 50 ? "https://pic1.zhuanstatic.com/zhuanzh/n_v2ad6e9859b2d24e1dbe4c778c8fd43be5.png" : this.sellerGrade > 20 ? "https://pic2.zhuanstatic.com/zhuanzh/n_v25bdc4f972f694b02875b1969039e2274.png" : this.sellerGrade > 8 ? "https://pic3.zhuanstatic.com/zhuanzh/n_v2246f05c618aa473e85af84e35fec1125.png" : this.sellerGrade > 3 ? "https://pic4.zhuanstatic.com/zhuanzh/n_v2f7e8cc0256c642d699b6fb6a760264ba.png" : "https://pic5.zhuanstatic.com/zhuanzh/n_v2740344822220444697ab6defaabcbbfe.png"
                        }
                    },
                    created: function() {
                        this.$ZZAPP.setTitle({
                            title: "商品详情"
                        }), this.$log("view"), this.init()
                    },
                    methods: {
                        init: function() {
                            var t = L(r.a.mark(function t() {
                                return r.a.wrap(function(t) {
                                    while (1) switch (t.prev = t.next) {
                                        case 0:
                                            return this.getAuctionInfoById(), this.getIsActivityProduct(), t.next = 4, Promise.all([this.getInfoById(), this.getInfoDetail()]);
                                        case 4:
                                            this.isDataReady = !0;
                                        case 5:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t, this)
                            }));

                            function e() {
                                return t.apply(this, arguments)
                            }
                            return e
                        }(),
                        getInfoById: function() {
                            var t = this;
                            if (this.infoId) return this.$http.get("https://app.zhuanzhuan.com/zz/transfer/getInfoById", {
                                infoId: this.infoId,
                                metric: this.metric,
                                getParams: !0
                            }).then(function(e) {
                                var i = e.data,
                                    a = i.respCode,
                                    n = i.respData;
                                0 == a && n && (t.goodsInfo = n)
                            })
                        },
                        getInfoDetail: function() {
                            var t = this;
                            return this.$http.get("/zzopen/gameAccount/getInfoDetail", {
                                params: {
                                    productId: this.infoId
                                }
                            }).then(function(e) {
                                var i = parseInt(e.data.respCode),
                                    a = e.data.respData;
                                0 === i && (t.sellerGrade = a.sellerGrade, t.insuranceFlag = 1 === a.insuranceFlag, t.sellerAgreement = 1 === a.sellerAgreement, t.verifiedStatus = 1 === a.verifiedStatus, t.auditStatus = 1 === a.auditStatus, t.transactionNum = a.transactionNum > 0 ? a.transactionNum : "")
                            })
                        },
                        getAuctionInfoById: function() {
                            var t = this;
                            if (this.infoId) return this.$http.get("https://app.zhuanzhuan.com/zz/transfer/getAuctionInfoById", {
                                infoId: this.infoId
                            }).then(function(e) {
                                if (0 == e.data.respCode) {
                                    var i = "https://m.zhuanzhuan.com/open/ZZOpenBusiness/index.html?saleGoBack=1&infoId=".concat(t.infoId, "&productId=").concat(t.infoId, "&metric=").concat(t.metric, "&account=true#/game-account/sale-detail");
                                    location.replace(i)
                                }
                            })
                        },
                        getIsActivityProduct: function() {
                            var t = this;
                            if (this.infoId) return this.$http.get("https://app.zhuanzhuan.com/zzopen/gameactive/isProductInSelfpayActivity", {
                                productId: this.infoId
                            }).then(function(e) {
                                var i = e.data,
                                    a = i.respCode,
                                    n = i.respData;
                                if (0 == a) {
                                    var s = n.isActivityProduct,
                                        o = n.activityPrice;
                                    t.isActivityProduct = !!s, t.activityPrice = o
                                }
                            })
                        }
                    },
                    components: {
                        DetailButton: S,
                        DetailRecommend: f["a"],
                        UserInfo: h["a"],
                        DetailHead: v["a"],
                        DetailTitle: m["a"],
                        GoodsInfo: g["a"],
                        LeaseValidateReport: b["a"],
                        DetailQuestion: p["a"],
                        DetailAlert: C["a"],
                        "lease-validate-report-qzwz": _["a"]
                    }
                },
                M = E,
                D = (i("6220"), Object(O["a"])(M, n, s, !1, null, "70d74cbd", null));
            e["default"] = D.exports
        },
        ed2f: function(t, e, i) {
            "use strict";
            var a = function() {
                    var t = this,
                        e = t.$createElement,
                        i = t._self._c || e;
                    return i("article", [t.isShowService && t.isValidateAccount ? i("service-var") : t._e(), t.isValidateAccount ? i("article", {
                        staticClass: "lease-validate-report"
                    }, [i("section", {
                        staticClass: "title"
                    }, [i("div", {
                        staticClass: "right",
                        on: {
                            click: t.openReport
                        }
                    }, [t._v("查看全部报告"), i("span", {
                        staticClass: "arrow"
                    })]), i("div", {
                        staticClass: "point"
                    }), i("div", {
                        staticClass: "detail"
                    }, [t._v("智能验号报告")])]), t.infoParams.length ? i("section", {
                        staticClass: "lease-validate-report-param"
                    }, [i("ul", {
                        staticClass: "lease-validate-report-param-tags"
                    }, t._l(t.tags, function(e) {
                        return i("li", {
                            staticClass: "tag-wrap"
                        }, [i("div", {
                            staticClass: "tag"
                        }, [t._v(t._s(e))])])
                    }), 0), i("ul", {
                        staticClass: "lease-validate-report-param-items"
                    }, t._l(t.infoParams, function(e, a) {
                        return i("li", {
                            key: a,
                            staticClass: "lease-validate-report-param-item"
                        }, [i("p", {
                            staticClass: "lease-validate-report-param-key"
                        }, [t._v(t._s(e.paramKey))]), i("p", {
                            staticClass: "lease-validate-report-param-value"
                        }, [t._v(t._s(e.paramValue))])])
                    }), 0)]) : t._e(), i("validate-account-info", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: t.showAccountInfo,
                            expression: "showAccountInfo"
                        }],
                        attrs: {
                            hero: t.hero,
                            skin: t.skin,
                            title: t.title,
                            "hero-count": t.heroCount,
                            "skin-count": t.skinCount,
                            closeHandle: t.closeHandle
                        }
                    })], 1) : t._e()], 1)
                },
                n = [],
                s = i("c926"),
                o = i("5fa0"),
                r = i("b383"),
                c = i.n(r);

            function l(t) {
                return f(t) || d(t) || u()
            }

            function u() {
                throw new TypeError("Invalid attempt to spread non-iterable instance")
            }

            function d(t) {
                if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) return Array.from(t)
            }

            function f(t) {
                if (Array.isArray(t)) {
                    for (var e = 0, i = new Array(t.length); e < t.length; e++) i[e] = t[e];
                    return i
                }
            }
            var h = {
                    data: function() {
                        return {
                            showAccountInfo: !1,
                            infoId: c.a.parse(location.search.split("?")[1]).infoId,
                            tags: [],
                            hero: [],
                            skin: [],
                            heroCount: "",
                            skinCount: "",
                            invalidateParams: [],
                            title: {
                                hero: "武器",
                                skin: "角色"
                            }
                        }
                    },
                    props: {
                        GoodsInfo: {
                            default: function() {
                                return {}
                            }
                        },
                        leaseParam: {
                            default: function() {
                                return []
                            }
                        },
                        isShowService: {
                            type: Boolean,
                            default: !0
                        }
                    },
                    computed: {
                        infoParams: function() {
                            var t = this,
                                e = this.GoodsInfo.infoParams || [];
                            return e = [].concat(l(e), l(this.invalidateParams)), e = e.filter(function(e) {
                                return t.leaseParam.includes(e.paramKey)
                            }), e
                        },
                        isValidateAccount: function() {
                            return !!this.heroCount && !!this.skinCount
                        }
                    },
                    methods: {
                        closeHandle: function() {
                            this.showAccountInfo = !1, document.documentElement.style.position = ""
                        },
                        openReport: function() {
                            this.showAccountInfo = !0, this.$log("openReport"), document.documentElement.style.position = "fixed"
                        },
                        getProductAllTypelnfo: function() {
                            var t = this;
                            return this.$http.get("/zzopen/workroom/getProductAllTypelnfo", {
                                productId: this.infoId
                            }).then(function(e) {
                                var i = parseInt(e.data.respCode),
                                    a = e.data.respData;
                                0 === i && t.dealProductAllTypeInfo(a)
                            })
                        },
                        dealProductAllTypeInfo: function(t) {
                            for (var e in t) this.invalidateParams.push({
                                paramKey: e,
                                paramValue: t[e] ? t[e].join(",") : ""
                            }), this.getSpecialSkin(e, t[e]), this.getHero(e, t[e]), this.getSkin(e, t[e]), this.getHeroCount(e, t[e]), this.getSkinCount(e, t[e])
                        },
                        getSpecialSkin: function(t, e) {
                            "特色标签" === t && (this.tags = e)
                        },
                        getHero: function(t, e) {
                            "武器" === t && (this.hero = e.reduce(function(t, e) {
                                var i = e ? e.split("#") : ["", ""];
                                return t.push({
                                    role: i[0],
                                    data: i[1].split("|")
                                }), t
                            }, []))
                        },
                        getSkin: function(t, e) {
                            "角色" === t && (this.skin = e.reduce(function(t, e) {
                                var i = e ? e.split("#") : ["", ""];
                                return t.push({
                                    role: i[0],
                                    data: i[1].split("|")
                                }), t
                            }, []))
                        },
                        getHeroCount: function(t, e) {
                            "武器数" === t && (this.heroCount = e ? e.join(",") : "")
                        },
                        getSkinCount: function(t, e) {
                            "角色数" === t && (this.skinCount = e ? e.join(",") : "")
                        }
                    },
                    created: function() {
                        this.getProductAllTypelnfo()
                    },
                    components: {
                        ValidateAccountInfo: s["a"],
                        ServiceVar: o["a"]
                    }
                },
                p = h,
                v = (i("07be"), i("2877")),
                m = Object(v["a"])(p, a, n, !1, null, "1c43ef02", null);
            e["a"] = m.exports
        },
        f569: function(t, e, i) {
            "use strict";
            var a = i("524c"),
                n = i.n(a);
            n.a
        }
    }
]);
//# sourceMappingURL=chunk-42a09bce.cca8d63d.js.map