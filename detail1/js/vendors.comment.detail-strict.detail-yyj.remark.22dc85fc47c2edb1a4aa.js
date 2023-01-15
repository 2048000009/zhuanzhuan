(window.webpackJsonp = window.webpackJsonp || []).push([
    [1], {
        1180: function(e, t, n) {
            var r;
            ! function(o) {
                "use strict";
                var c = o.URL || o.webkitURL;

                function f(e) {
                    return !!c && c.createObjectURL(e)
                }

                function l(e) {
                    return !!c && c.revokeObjectURL(e)
                }

                function d(e, t) {
                    !e || "blob:" !== e.slice(0, 5) || t && t.noRevoke || l(e)
                }

                function h(e, t, n, r) {
                    if (!o.FileReader) return !1;
                    var c = new FileReader;
                    c.onload = function() {
                        t.call(c, this.result)
                    }, n && (c.onabort = c.onerror = function() {
                        n.call(c, this.error)
                    });
                    var f = c[r || "readAsDataURL"];
                    return f ? (f.call(c, e), c) : void 0
                }

                function m(e, t) {
                    return Object.prototype.toString.call(t) === "[object " + e + "]"
                }

                function y(e, t, n) {
                    function r(t, r) {
                        var c, img = document.createElement("img");

                        function l(img, data) {
                            t !== r ? img instanceof Error ? r(img) : ((data = data || {}).image = img, t(data)) : t && t(img, data)
                        }

                        function A(t, r) {
                            r && o.console && console.log(r), t && m("Blob", t) ? c = f(e = t) : (c = e, n && n.crossOrigin && (img.crossOrigin = n.crossOrigin)), img.src = c
                        }
                        return img.onerror = function(e) {
                            d(c, n), r && r.call(img, e)
                        }, img.onload = function() {
                            d(c, n);
                            var data = {
                                originalWidth: img.naturalWidth || img.width,
                                originalHeight: img.naturalHeight || img.height
                            };
                            try {
                                y.transform(img, n, l, e, data)
                            } catch (e) {
                                r && r(e)
                            }
                        }, "string" == typeof e ? (y.requiresMetaData(n) ? y.fetchBlob(e, A, n) : A(), img) : m("Blob", e) || m("File", e) ? (c = f(e)) ? (img.src = c, img) : h(e, (function(e) {
                            img.src = e
                        }), r) : void 0
                    }
                    return o.Promise && "function" != typeof t ? (n = t, new Promise(r)) : r(t, t)
                }
                y.requiresMetaData = function(e) {
                    return e && e.meta
                }, y.fetchBlob = function(e, t) {
                    t()
                }, y.transform = function(img, e, t, n, data) {
                    t(img, data)
                }, y.global = o, y.readFile = h, y.isInstanceOf = m, y.createObjectURL = f, y.revokeObjectURL = l, void 0 === (r = function() {
                    return y
                }.call(t, n, t, e)) || (e.exports = r)
            }("undefined" != typeof window && window || this)
        },
        1305: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.global,
                        n = e.transform,
                        r = t.Blob && (Blob.prototype.slice || Blob.prototype.webkitSlice || Blob.prototype.mozSlice),
                        o = t.ArrayBuffer && ArrayBuffer.prototype.slice || function(e, t) {
                            t = t || this.byteLength - e;
                            var n = new Uint8Array(this, e, t),
                                r = new Uint8Array(t);
                            return r.set(n), r.buffer
                        },
                        c = {
                            jpeg: {
                                65505: [],
                                65517: []
                            }
                        };

                    function f(n, f, l, data) {
                        var d = this;

                        function h(f, h) {
                            if (!(t.DataView && r && n && n.size >= 12 && "image/jpeg" === n.type)) return f(data);
                            var m = l.maxMetaDataSize || 262144;
                            e.readFile(r.call(n, 0, m), (function(e) {
                                var t = new DataView(e);
                                if (65496 !== t.getUint16(0)) return h(new Error("Invalid JPEG file: Missing JPEG marker."));
                                for (var n, r, m, i, y = 2, A = t.byteLength - 4, v = y; y < A && ((n = t.getUint16(y)) >= 65504 && n <= 65519 || 65534 === n);) {
                                    if (y + (r = t.getUint16(y + 2) + 2) > t.byteLength) {
                                        console.log("Invalid JPEG metadata: Invalid segment size.");
                                        break
                                    }
                                    if ((m = c.jpeg[n]) && !l.disableMetaDataParsers)
                                        for (i = 0; i < m.length; i += 1) m[i].call(d, t, y, r, data, l);
                                    v = y += r
                                }!l.disableImageHead && v > 6 && (data.imageHead = o.call(e, 0, v)), f(data)
                            }), h, "readAsArrayBuffer") || f(data)
                        }
                        return l = l || {}, t.Promise && "function" != typeof f ? (data = l = f || {}, new Promise(h)) : (data = data || {}, h(f, f))
                    }

                    function l(e, t, n) {
                        return e && t && n ? new Blob([n, r.call(e, t.byteLength)], {
                            type: "image/jpeg"
                        }) : null
                    }
                    e.transform = function(img, r, o, c, data) {
                        e.requiresMetaData(r) ? f(c, (function(f) {
                            f !== data && (t.console && console.log(f), f = data), n.call(e, img, r, o, c, f)
                        }), r, data = data || {}) : n.apply(e, arguments)
                    }, e.blobSlice = r, e.bufferSlice = o, e.replaceHead = function(e, head, n) {
                        var r = {
                            maxMetaDataSize: 256,
                            disableMetaDataParsers: !0
                        };
                        if (!n && t.Promise) return f(e, r).then((function(data) {
                            return l(e, data.imageHead, head)
                        }));
                        f(e, (function(data) {
                            n(l(e, data.imageHead, head))
                        }), r)
                    }, e.parseMetaData = f, e.metaDataParsers = c
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1563: function(e, t, n) {
            "use strict";
            e.exports = n(1758)
        },
        1591: function(e, t, n) {
            e.exports = n(1180), n(1592), n(1305), n(1870), n(1593), n(1871), n(1594), n(1872), n(1873)
        },
        1592: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.transform;
                    e.createCanvas = function(t, n, r) {
                        if (r && e.global.OffscreenCanvas) return new OffscreenCanvas(t, n);
                        var canvas = document.createElement("canvas");
                        return canvas.width = t, canvas.height = n, canvas
                    }, e.transform = function(img, n, r, o, data) {
                        t.call(e, e.scale(img, n, data), n, r, o, data)
                    }, e.transformCoordinates = function() {}, e.getTransformedOptions = function(img, e) {
                        var t, i, n, r, o = e.aspectRatio;
                        if (!o) return e;
                        for (i in t = {}, e) Object.prototype.hasOwnProperty.call(e, i) && (t[i] = e[i]);
                        return t.crop = !0, (n = img.naturalWidth || img.width) / (r = img.naturalHeight || img.height) > o ? (t.maxWidth = r * o, t.maxHeight = r) : (t.maxWidth = n, t.maxHeight = n / o), t
                    }, e.drawImage = function(img, canvas, e, t, n, r, o, c, f) {
                        var l = canvas.getContext("2d");
                        return !1 === f.imageSmoothingEnabled ? (l.msImageSmoothingEnabled = !1, l.imageSmoothingEnabled = !1) : f.imageSmoothingQuality && (l.imageSmoothingQuality = f.imageSmoothingQuality), l.drawImage(img, e, t, n, r, 0, 0, o, c), l
                    }, e.requiresCanvas = function(e) {
                        return e.canvas || e.crop || !!e.aspectRatio
                    }, e.scale = function(img, t, data) {
                        t = t || {}, data = data || {};
                        var n, r, o, c, f, l, d, h, m, y, A, canvas, v = img.getContext || e.requiresCanvas(t) && !!e.global.HTMLCanvasElement,
                            S = img.naturalWidth || img.width,
                            w = img.naturalHeight || img.height,
                            x = S,
                            C = w;

                        function E() {
                            var e = Math.max((o || x) / x, (c || C) / C);
                            e > 1 && (x *= e, C *= e)
                        }

                        function P() {
                            var e = Math.min((n || x) / x, (r || C) / C);
                            e < 1 && (x *= e, C *= e)
                        }
                        if (v && (d = (t = e.getTransformedOptions(img, t, data)).left || 0, h = t.top || 0, t.sourceWidth ? (f = t.sourceWidth, void 0 !== t.right && void 0 === t.left && (d = S - f - t.right)) : f = S - d - (t.right || 0), t.sourceHeight ? (l = t.sourceHeight, void 0 !== t.bottom && void 0 === t.top && (h = w - l - t.bottom)) : l = w - h - (t.bottom || 0), x = f, C = l), n = t.maxWidth, r = t.maxHeight, o = t.minWidth, c = t.minHeight, v && n && r && t.crop ? (x = n, C = r, (A = f / l - n / r) < 0 ? (l = r * f / n, void 0 === t.top && void 0 === t.bottom && (h = (w - l) / 2)) : A > 0 && (f = n * l / r, void 0 === t.left && void 0 === t.right && (d = (S - f) / 2))) : ((t.contain || t.cover) && (o = n = n || o, c = r = r || c), t.cover ? (P(), E()) : (E(), P())), v) {
                            if ((m = t.pixelRatio) > 1 && (!img.style.width || Math.floor(parseFloat(img.style.width, 10)) !== Math.floor(S / m)) && (x *= m, C *= m), e.orientationCropBug && !img.getContext && (d || h || f !== S || l !== w) && (A = img, img = e.createCanvas(S, w, !0), e.drawImage(A, img, 0, 0, S, w, S, w, t)), (y = t.downsamplingRatio) > 0 && y < 1 && x < f && C < l)
                                for (; f * y > x;) canvas = e.createCanvas(f * y, l * y, !0), e.drawImage(img, canvas, d, h, f, l, canvas.width, canvas.height, t), d = 0, h = 0, f = canvas.width, l = canvas.height, img = canvas;
                            return canvas = e.createCanvas(x, C), e.transformCoordinates(canvas, t, data), m > 1 && (canvas.style.width = canvas.width / m + "px"), e.drawImage(img, canvas, d, h, f, l, x, C, t).setTransform(1, 0, 0, 1, 0, 0), canvas
                        }
                        return img.width = x, img.height = C, img
                    }
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1593: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180), n(1305)], void 0 === (c = "function" == typeof(r = function(e) {
                    function t(e) {
                        e && (Object.defineProperty(this, "map", {
                            value: this.ifds[e].map
                        }), Object.defineProperty(this, "tags", {
                            value: this.tags && this.tags[e] || {}
                        }))
                    }
                    t.prototype.map = {
                        Orientation: 274,
                        Thumbnail: "ifd1",
                        Blob: 513,
                        Exif: 34665,
                        GPSInfo: 34853,
                        Interoperability: 40965
                    }, t.prototype.ifds = {
                        ifd1: {
                            name: "Thumbnail",
                            map: t.prototype.map
                        },
                        34665: {
                            name: "Exif",
                            map: {}
                        },
                        34853: {
                            name: "GPSInfo",
                            map: {}
                        },
                        40965: {
                            name: "Interoperability",
                            map: {}
                        }
                    }, t.prototype.get = function(e) {
                        return this[e] || this[this.map[e]]
                    };
                    var n = {
                        1: {
                            getValue: function(e, t) {
                                return e.getUint8(t)
                            },
                            size: 1
                        },
                        2: {
                            getValue: function(e, t) {
                                return String.fromCharCode(e.getUint8(t))
                            },
                            size: 1,
                            ascii: !0
                        },
                        3: {
                            getValue: function(e, t, n) {
                                return e.getUint16(t, n)
                            },
                            size: 2
                        },
                        4: {
                            getValue: function(e, t, n) {
                                return e.getUint32(t, n)
                            },
                            size: 4
                        },
                        5: {
                            getValue: function(e, t, n) {
                                return e.getUint32(t, n) / e.getUint32(t + 4, n)
                            },
                            size: 8
                        },
                        9: {
                            getValue: function(e, t, n) {
                                return e.getInt32(t, n)
                            },
                            size: 4
                        },
                        10: {
                            getValue: function(e, t, n) {
                                return e.getInt32(t, n) / e.getInt32(t + 4, n)
                            },
                            size: 8
                        }
                    };

                    function r(e, t, r, o, c, f) {
                        var l, d, h, i, m, y, A = n[o];
                        if (A) {
                            if (!((d = (l = A.size * c) > 4 ? t + e.getUint32(r + 8, f) : r + 8) + l > e.byteLength)) {
                                if (1 === c) return A.getValue(e, d, f);
                                for (h = [], i = 0; i < c; i += 1) h[i] = A.getValue(e, d + i * A.size, f);
                                if (A.ascii) {
                                    for (m = "", i = 0; i < h.length && "\0" !== (y = h[i]); i += 1) m += y;
                                    return m
                                }
                                return h
                            }
                            console.log("Invalid Exif data: Invalid data offset.")
                        } else console.log("Invalid Exif data: Invalid tag type.")
                    }

                    function o(e, t, n) {
                        return (!e || e[n]) && (!t || !0 !== t[n])
                    }

                    function c(e, t, n, c, f, l, d, h) {
                        var m, y, i, A, v, S;
                        if (n + 6 > e.byteLength) console.log("Invalid Exif data: Invalid directory offset.");
                        else {
                            if (!((y = n + 2 + 12 * (m = e.getUint16(n, c))) + 4 > e.byteLength)) {
                                for (i = 0; i < m; i += 1) A = n + 2 + 12 * i, o(d, h, v = e.getUint16(A, c)) && (S = r(e, t, A, e.getUint16(A + 2, c), e.getUint32(A + 4, c), c), f[v] = S, l && (l[v] = A));
                                return e.getUint32(y, c)
                            }
                            console.log("Invalid Exif data: Invalid directory size.")
                        }
                    }
                    n[7] = n[1], e.parseExifData = function(n, r, f, data, l) {
                        if (!l.disableExif) {
                            var d, h, m, y = l.includeExifTags,
                                A = l.excludeExifTags || {
                                    34665: {
                                        37500: !0
                                    }
                                },
                                v = r + 10;
                            if (1165519206 === n.getUint32(r + 4))
                                if (v + 8 > n.byteLength) console.log("Invalid Exif data: Invalid segment size.");
                                else if (0 === n.getUint16(r + 8)) {
                                switch (n.getUint16(v)) {
                                    case 18761:
                                        d = !0;
                                        break;
                                    case 19789:
                                        d = !1;
                                        break;
                                    default:
                                        return void console.log("Invalid Exif data: Invalid byte alignment marker.")
                                }
                                42 === n.getUint16(v + 2, d) ? (h = n.getUint32(v + 4, d), data.exif = new t, l.disableExifOffsets || (data.exifOffsets = new t, data.exifTiffOffset = v, data.exifLittleEndian = d), (h = c(n, v, v + h, d, data.exif, data.exifOffsets, y, A)) && o(y, A, "ifd1") && (data.exif.ifd1 = h, data.exifOffsets && (data.exifOffsets.ifd1 = v + h)), Object.keys(data.exif.ifds).forEach((function(e) {
                                    ! function(data, e, n, r, o, f, l) {
                                        var d = data.exif[e];
                                        d && (data.exif[e] = new t(e), data.exifOffsets && (data.exifOffsets[e] = new t(e)), c(n, r, r + d, o, data.exif[e], data.exifOffsets && data.exifOffsets[e], f && f[e], l && l[e]))
                                    }(data, e, n, v, d, y, A)
                                })), (m = data.exif.ifd1) && m[513] && (m[513] = function(t, n, r) {
                                    if (r) {
                                        if (!(n + r > t.byteLength)) return new Blob([e.bufferSlice.call(t.buffer, n, n + r)], {
                                            type: "image/jpeg"
                                        });
                                        console.log("Invalid Exif data: Invalid thumbnail data.")
                                    }
                                }(n, v + m[513], m[514]))) : console.log("Invalid Exif data: Missing TIFF marker.")
                            } else console.log("Invalid Exif data: Missing byte alignment offset.")
                        }
                    }, e.metaDataParsers.jpeg[65505].push(e.parseExifData), e.exifWriters = {
                        274: function(e, data, t) {
                            var n = data.exifOffsets[274];
                            return n ? (new DataView(e, n + 8, 2).setUint16(0, t, data.exifLittleEndian), e) : e
                        }
                    }, e.writeExifData = function(t, data, n, r) {
                        return e.exifWriters[data.exif.map[n]](t, data, r)
                    }, e.ExifMap = t
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1594: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180), n(1305)], void 0 === (c = "function" == typeof(r = function(e) {
                    function t() {}

                    function n(e, map, t, n, r) {
                        return "binary" === map.types[e] ? new Blob([t.buffer.slice(n, n + r)]) : "Uint16" === map.types[e] ? t.getUint16(n) : function(e, t, n) {
                            for (var r = "", o = t + n, c = t; c < o; c += 1) r += String.fromCharCode(e.getUint8(c));
                            return r
                        }(t, n, r)
                    }

                    function r(e, t) {
                        return void 0 === e ? t : e instanceof Array ? (e.push(t), e) : [e, t]
                    }

                    function o(e, t, o, data, c, f) {
                        for (var l, d, h, m = t + o, y = t; y < m;) 28 === e.getUint8(y) && 2 === e.getUint8(y + 1) && (h = e.getUint8(y + 2), c && !c[h] || f && f[h] || (d = e.getInt16(y + 3), l = n(h, data.iptc, e, y + 5, d), data.iptc[h] = r(data.iptc[h], l), data.iptcOffsets && (data.iptcOffsets[h] = y))), y += 1
                    }

                    function c(e, t) {
                        return 943868237 === e.getUint32(t) && 1028 === e.getUint16(t + 4)
                    }

                    function f(e, t) {
                        var n = e.getUint8(t + 7);
                        return n % 2 != 0 && (n += 1), 0 === n && (n = 4), n
                    }
                    t.prototype.map = {
                        ObjectName: 5
                    }, t.prototype.types = {
                        0: "Uint16",
                        200: "Uint16",
                        201: "Uint16",
                        202: "binary"
                    }, t.prototype.get = function(e) {
                        return this[e] || this[this.map[e]]
                    }, e.parseIptcData = function(e, n, r, data, l) {
                        if (!l.disableIptc)
                            for (var d = n + r; n + 8 < d;) {
                                if (c(e, n)) {
                                    var h = f(e, n),
                                        m = n + 8 + h;
                                    if (m > d) {
                                        console.log("Invalid IPTC data: Invalid segment offset.");
                                        break
                                    }
                                    var y = e.getUint16(n + 6 + h);
                                    if (n + y > d) {
                                        console.log("Invalid IPTC data: Invalid segment size.");
                                        break
                                    }
                                    return data.iptc = new t, l.disableIptcOffsets || (data.iptcOffsets = new t), void o(e, m, y, data, l.includeIptcTags, l.excludeIptcTags || {
                                        202: !0
                                    })
                                }
                                n += 1
                            }
                    }, e.metaDataParsers.jpeg[65517].push(e.parseIptcData), e.IptcMap = t
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1758: function(e, t, n) {
            "use strict";
            var r = n(1759);
            n(1760), n(1771), n(1772), n(1773), n(1774), n(1775), n(1776), n(1777), n(1778), n(1779), n(1780), n(1782), n(1783), n(1784), n(1785), n(1787), n(1807), Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var o = r(n(1809)),
                c = r(n(524)),
                f = r(n(1810)),
                l = r(n(1828)),
                d = r(n(766));

            function h(object, e) {
                var t = Object.keys(object);
                if (Object.getOwnPropertySymbols) {
                    var n = Object.getOwnPropertySymbols(object);
                    e && (n = n.filter((function(e) {
                        return Object.getOwnPropertyDescriptor(object, e).enumerable
                    }))), t.push.apply(t, n)
                }
                return t
            }

            function m(e) {
                for (var i = 1; i < arguments.length; i++) {
                    var source = null != arguments[i] ? arguments[i] : {};
                    i % 2 ? h(Object(source), !0).forEach((function(t) {
                        (0, o.default)(e, t, source[t])
                    })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(source)) : h(Object(source)).forEach((function(t) {
                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(source, t))
                    }))
                }
                return e
            }
            var y = "application/x-www-form-urlencoded",
                A = {
                    method: "get",
                    responseType: "json",
                    timeout: 0,
                    withCredentials: !0,
                    maxContentLength: 2e3,
                    transformRequest: [function(data) {
                        return data
                    }],
                    transformResponse: [function(data) {
                        return data
                    }],
                    headers: {
                        "Content-Type": y
                    }
                },
                v = [],
                S = 1,
                w = f.default.CancelToken,
                x = !0;

            function C(e, t) {
                if (e) {
                    var n = e.url + JSON.stringify(e.params),
                        r = v.findIndex((function(i) {
                            return i.url === n
                        }));
                    0 === S ? r > -1 ? t ? t("数据请求中，请稍候") : v.splice(r, 1) : t && v.push({
                        url: n,
                        c: t
                    }) : 1 === S && (r > -1 && (t && v[r].c("数据请求中，请稍候"), v.splice(r, 1)), t && v.push({
                        url: n,
                        c: t
                    }))
                }
            }
            f.default.interceptors.request.use((function(e) {
                return [0, 1].includes(S) && (e.cancelToken = new w((function(t) {
                    C(e, t)
                }))), x && (e.headers["Csrf-Token"] = c.default.getPPU().TT || ""), e
            }), (function(e) {
                return Promise.reject(e)
            })), f.default.interceptors.response.use((function(e) {
                return C(e.config), e
            }), (function(e) {
                return "数据请求中，请稍候" !== e.message ? v.splice(0, v.length) : e.type = "Cancel", Promise.reject(e)
            }));
            var E = function(e) {
                var t = e || {},
                    n = t.method;
                if (!t.url) throw new Error("error，请检查入参url");
                return n && "jsonp" === n.toLowerCase() ? function(e) {
                    var t = e.url,
                        n = e.params,
                        r = void 0 === n ? {} : n,
                        o = -1 === t.indexOf("?") ? "?" : "&";
                    return o += Object.keys(r).map((function(e) {
                        return "".concat(e, "=").concat(encodeURIComponent(r[e]))
                    })).join("&"), new Promise((function(n, r) {
                        (0, l.default)("".concat(t).concat(o), {
                            timeout: e.timeout || 0,
                            name: e.callback,
                            prefix: e.prefix
                        }, (function(e, t) {
                            if (e) r(e);
                            else {
                                var data = t;
                                "string" == typeof data && 0 === data.indexOf("{") && (data = JSON.parse(data)), n(data)
                            }
                        }))
                    }))
                }(e) : function(e) {
                    var t = e.method && "post" === e.method.toLowerCase(),
                        n = e.params || {},
                        r = e.format || y,
                        o = r === y,
                        c = "application/json" === r;
                    return S = void 0 === e.cancelType ? S : e.cancelType, x = void 0 === e.csrfToken ? x : e.csrfToken, new Promise((function(l, h) {
                        (0, f.default)(Object.assign({}, A, m(m({}, e), {}, {
                            params: t ? {} : n,
                            data: t ? o ? (0, d.default)(n) : c ? JSON.stringify(n) : n : {},
                            headers: m(m({}, e.headers), {}, {
                                "Content-Type": r || y
                            })
                        }))).then((function(e) {
                            var data = e.data || {};
                            "string" == typeof data && 0 === data.indexOf("{") && (data = JSON.parse(data)), l(data)
                        })).catch((function(e) {
                            h(e)
                        }))
                    }))
                }(e)
            };
            t.default = E
        },
        1828: function(e, t, n) {
            var r = n(1829)("jsonp");
            e.exports = function(e, t, n) {
                "function" == typeof t && (n = t, t = {});
                t || (t = {});
                var script, f, l = t.prefix || "__jp",
                    d = t.name || l + o++,
                    param = t.param || "callback",
                    h = null != t.timeout ? t.timeout : 6e4,
                    m = encodeURIComponent,
                    y = document.getElementsByTagName("script")[0] || document.head;
                h && (f = setTimeout((function() {
                    A(), n && n(new Error("Timeout"))
                }), h));

                function A() {
                    script.parentNode && script.parentNode.removeChild(script), window[d] = c, f && clearTimeout(f)
                }
                return window[d] = function(data) {
                        r("jsonp got", data), A(), n && n(null, data)
                    }, e = (e += (~e.indexOf("?") ? "&" : "?") + param + "=" + m(d)).replace("?&", "?"), r('jsonp req "%s"', e), (script = document.createElement("script")).src = e, y.parentNode.insertBefore(script, y),
                    function() {
                        window[d] && A()
                    }
            };
            var o = 0;

            function c() {}
        },
        1829: function(e, t, n) {
            (function(r) {
                function o() {
                    var e;
                    try {
                        e = t.storage.debug
                    } catch (e) {}
                    return !e && void 0 !== r && "env" in r && (e = r.env.DEBUG), e
                }(t = e.exports = n(1830)).log = function() {
                    return "object" == typeof console && console.log && Function.prototype.apply.call(console.log, console, arguments)
                }, t.formatArgs = function(e) {
                    var n = this.useColors;
                    if (e[0] = (n ? "%c" : "") + this.namespace + (n ? " %c" : " ") + e[0] + (n ? "%c " : " ") + "+" + t.humanize(this.diff), !n) return;
                    var r = "color: " + this.color;
                    e.splice(1, 0, r, "color: inherit");
                    var o = 0,
                        c = 0;
                    e[0].replace(/%[a-zA-Z%]/g, (function(e) {
                        "%%" !== e && (o++, "%c" === e && (c = o))
                    })), e.splice(c, 0, r)
                }, t.save = function(e) {
                    try {
                        null == e ? t.storage.removeItem("debug") : t.storage.debug = e
                    } catch (e) {}
                }, t.load = o, t.useColors = function() {
                    if ("undefined" != typeof window && window.process && "renderer" === window.process.type) return !0;
                    return "undefined" != typeof document && document.documentElement && document.documentElement.style && document.documentElement.style.WebkitAppearance || "undefined" != typeof window && window.console && (window.console.firebug || window.console.exception && window.console.table) || "undefined" != typeof navigator && navigator.userAgent && navigator.userAgent.toLowerCase().match(/firefox\/(\d+)/) && parseInt(RegExp.$1, 10) >= 31 || "undefined" != typeof navigator && navigator.userAgent && navigator.userAgent.toLowerCase().match(/applewebkit\/(\d+)/)
                }, t.storage = "undefined" != typeof chrome && void 0 !== chrome.storage ? chrome.storage.local : function() {
                    try {
                        return window.localStorage
                    } catch (e) {}
                }(), t.colors = ["lightseagreen", "forestgreen", "goldenrod", "dodgerblue", "darkorchid", "crimson"], t.formatters.j = function(e) {
                    try {
                        return JSON.stringify(e)
                    } catch (e) {
                        return "[UnexpectedJSONParseError]: " + e.message
                    }
                }, t.enable(o())
            }).call(this, n(378))
        },
        1830: function(e, t, n) {
            var r;

            function o(e) {
                function n() {
                    if (n.enabled) {
                        var e = n,
                            o = +new Date,
                            c = o - (r || o);
                        e.diff = c, e.prev = r, e.curr = o, r = o;
                        for (var f = new Array(arguments.length), i = 0; i < f.length; i++) f[i] = arguments[i];
                        f[0] = t.coerce(f[0]), "string" != typeof f[0] && f.unshift("%O");
                        var l = 0;
                        f[0] = f[0].replace(/%([a-zA-Z%])/g, (function(n, r) {
                            if ("%%" === n) return n;
                            l++;
                            var o = t.formatters[r];
                            if ("function" == typeof o) {
                                var c = f[l];
                                n = o.call(e, c), f.splice(l, 1), l--
                            }
                            return n
                        })), t.formatArgs.call(e, f);
                        var d = n.log || t.log || console.log.bind(console);
                        d.apply(e, f)
                    }
                }
                return n.namespace = e, n.enabled = t.enabled(e), n.useColors = t.useColors(), n.color = function(e) {
                    var i, n = 0;
                    for (i in e) n = (n << 5) - n + e.charCodeAt(i), n |= 0;
                    return t.colors[Math.abs(n) % t.colors.length]
                }(e), "function" == typeof t.init && t.init(n), n
            }(t = e.exports = o.debug = o.default = o).coerce = function(e) {
                return e instanceof Error ? e.stack || e.message : e
            }, t.disable = function() {
                t.enable("")
            }, t.enable = function(e) {
                t.save(e), t.names = [], t.skips = [];
                for (var n = ("string" == typeof e ? e : "").split(/[\s,]+/), r = n.length, i = 0; i < r; i++) n[i] && ("-" === (e = n[i].replace(/\*/g, ".*?"))[0] ? t.skips.push(new RegExp("^" + e.substr(1) + "$")) : t.names.push(new RegExp("^" + e + "$")))
            }, t.enabled = function(e) {
                var i, n;
                for (i = 0, n = t.skips.length; i < n; i++)
                    if (t.skips[i].test(e)) return !1;
                for (i = 0, n = t.names.length; i < n; i++)
                    if (t.names[i].test(e)) return !0;
                return !1
            }, t.humanize = n(1831), t.names = [], t.skips = [], t.formatters = {}
        },
        1831: function(e, t) {
            var s = 1e3,
                n = 6e4,
                r = 60 * n,
                o = 24 * r;

            function c(e, t, n) {
                if (!(e < t)) return e < 1.5 * t ? Math.floor(e / t) + " " + n : Math.ceil(e / t) + " " + n + "s"
            }
            e.exports = function(e, t) {
                t = t || {};
                var f, l = typeof e;
                if ("string" === l && e.length > 0) return function(e) {
                    if ((e = String(e)).length > 100) return;
                    var t = /^((?:\d+)?\.?\d+) *(milliseconds?|msecs?|ms|seconds?|secs?|s|minutes?|mins?|m|hours?|hrs?|h|days?|d|years?|yrs?|y)?$/i.exec(e);
                    if (!t) return;
                    var c = parseFloat(t[1]);
                    switch ((t[2] || "ms").toLowerCase()) {
                        case "years":
                        case "year":
                        case "yrs":
                        case "yr":
                        case "y":
                            return 315576e5 * c;
                        case "days":
                        case "day":
                        case "d":
                            return c * o;
                        case "hours":
                        case "hour":
                        case "hrs":
                        case "hr":
                        case "h":
                            return c * r;
                        case "minutes":
                        case "minute":
                        case "mins":
                        case "min":
                        case "m":
                            return c * n;
                        case "seconds":
                        case "second":
                        case "secs":
                        case "sec":
                        case "s":
                            return c * s;
                        case "milliseconds":
                        case "millisecond":
                        case "msecs":
                        case "msec":
                        case "ms":
                            return c;
                        default:
                            return
                    }
                }(e);
                if ("number" === l && !1 === isNaN(e)) return t.long ? c(f = e, o, "day") || c(f, r, "hour") || c(f, n, "minute") || c(f, s, "second") || f + " ms" : function(e) {
                    if (e >= o) return Math.round(e / o) + "d";
                    if (e >= r) return Math.round(e / r) + "h";
                    if (e >= n) return Math.round(e / n) + "m";
                    if (e >= s) return Math.round(e / s) + "s";
                    return e + "ms"
                }(e);
                throw new Error("val is not a non-empty string or a valid number. val=" + JSON.stringify(e))
            }
        },
        1870: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.global;
                    t.fetch && t.Request && t.Response && t.Response.prototype.blob ? e.fetchBlob = function(e, n, r) {
                        function o(e) {
                            return e.blob()
                        }
                        if (t.Promise && "function" != typeof n) return fetch(new Request(e, n)).then(o);
                        fetch(new Request(e, r)).then(o).then(n).catch((function(e) {
                            n(null, e)
                        }))
                    } : t.XMLHttpRequest && "" === (new XMLHttpRequest).responseType && (e.fetchBlob = function(e, n, r) {
                        function o(t, n) {
                            r = r || {};
                            var o = new XMLHttpRequest;
                            o.open(r.method || "GET", e), r.headers && Object.keys(r.headers).forEach((function(e) {
                                o.setRequestHeader(e, r.headers[e])
                            })), o.withCredentials = "include" === r.credentials, o.responseType = "blob", o.onload = function() {
                                t(o.response)
                            }, o.onerror = o.onabort = o.ontimeout = function(e) {
                                t === n ? n(null, e) : n(e)
                            }, o.send(r.body)
                        }
                        return t.Promise && "function" != typeof n ? (r = n, new Promise(o)) : o(n, n)
                    })
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1871: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180), n(1593)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.ExifMap.prototype;
                    t.tags = {
                            256: "ImageWidth",
                            257: "ImageHeight",
                            258: "BitsPerSample",
                            259: "Compression",
                            262: "PhotometricInterpretation",
                            274: "Orientation",
                            277: "SamplesPerPixel",
                            284: "PlanarConfiguration",
                            530: "YCbCrSubSampling",
                            531: "YCbCrPositioning",
                            282: "XResolution",
                            283: "YResolution",
                            296: "ResolutionUnit",
                            273: "StripOffsets",
                            278: "RowsPerStrip",
                            279: "StripByteCounts",
                            513: "JPEGInterchangeFormat",
                            514: "JPEGInterchangeFormatLength",
                            301: "TransferFunction",
                            318: "WhitePoint",
                            319: "PrimaryChromaticities",
                            529: "YCbCrCoefficients",
                            532: "ReferenceBlackWhite",
                            306: "DateTime",
                            270: "ImageDescription",
                            271: "Make",
                            272: "Model",
                            305: "Software",
                            315: "Artist",
                            33432: "Copyright",
                            34665: {
                                36864: "ExifVersion",
                                40960: "FlashpixVersion",
                                40961: "ColorSpace",
                                40962: "PixelXDimension",
                                40963: "PixelYDimension",
                                42240: "Gamma",
                                37121: "ComponentsConfiguration",
                                37122: "CompressedBitsPerPixel",
                                37500: "MakerNote",
                                37510: "UserComment",
                                40964: "RelatedSoundFile",
                                36867: "DateTimeOriginal",
                                36868: "DateTimeDigitized",
                                36880: "OffsetTime",
                                36881: "OffsetTimeOriginal",
                                36882: "OffsetTimeDigitized",
                                37520: "SubSecTime",
                                37521: "SubSecTimeOriginal",
                                37522: "SubSecTimeDigitized",
                                33434: "ExposureTime",
                                33437: "FNumber",
                                34850: "ExposureProgram",
                                34852: "SpectralSensitivity",
                                34855: "PhotographicSensitivity",
                                34856: "OECF",
                                34864: "SensitivityType",
                                34865: "StandardOutputSensitivity",
                                34866: "RecommendedExposureIndex",
                                34867: "ISOSpeed",
                                34868: "ISOSpeedLatitudeyyy",
                                34869: "ISOSpeedLatitudezzz",
                                37377: "ShutterSpeedValue",
                                37378: "ApertureValue",
                                37379: "BrightnessValue",
                                37380: "ExposureBias",
                                37381: "MaxApertureValue",
                                37382: "SubjectDistance",
                                37383: "MeteringMode",
                                37384: "LightSource",
                                37385: "Flash",
                                37396: "SubjectArea",
                                37386: "FocalLength",
                                41483: "FlashEnergy",
                                41484: "SpatialFrequencyResponse",
                                41486: "FocalPlaneXResolution",
                                41487: "FocalPlaneYResolution",
                                41488: "FocalPlaneResolutionUnit",
                                41492: "SubjectLocation",
                                41493: "ExposureIndex",
                                41495: "SensingMethod",
                                41728: "FileSource",
                                41729: "SceneType",
                                41730: "CFAPattern",
                                41985: "CustomRendered",
                                41986: "ExposureMode",
                                41987: "WhiteBalance",
                                41988: "DigitalZoomRatio",
                                41989: "FocalLengthIn35mmFilm",
                                41990: "SceneCaptureType",
                                41991: "GainControl",
                                41992: "Contrast",
                                41993: "Saturation",
                                41994: "Sharpness",
                                41995: "DeviceSettingDescription",
                                41996: "SubjectDistanceRange",
                                42016: "ImageUniqueID",
                                42032: "CameraOwnerName",
                                42033: "BodySerialNumber",
                                42034: "LensSpecification",
                                42035: "LensMake",
                                42036: "LensModel",
                                42037: "LensSerialNumber"
                            },
                            34853: {
                                0: "GPSVersionID",
                                1: "GPSLatitudeRef",
                                2: "GPSLatitude",
                                3: "GPSLongitudeRef",
                                4: "GPSLongitude",
                                5: "GPSAltitudeRef",
                                6: "GPSAltitude",
                                7: "GPSTimeStamp",
                                8: "GPSSatellites",
                                9: "GPSStatus",
                                10: "GPSMeasureMode",
                                11: "GPSDOP",
                                12: "GPSSpeedRef",
                                13: "GPSSpeed",
                                14: "GPSTrackRef",
                                15: "GPSTrack",
                                16: "GPSImgDirectionRef",
                                17: "GPSImgDirection",
                                18: "GPSMapDatum",
                                19: "GPSDestLatitudeRef",
                                20: "GPSDestLatitude",
                                21: "GPSDestLongitudeRef",
                                22: "GPSDestLongitude",
                                23: "GPSDestBearingRef",
                                24: "GPSDestBearing",
                                25: "GPSDestDistanceRef",
                                26: "GPSDestDistance",
                                27: "GPSProcessingMethod",
                                28: "GPSAreaInformation",
                                29: "GPSDateStamp",
                                30: "GPSDifferential",
                                31: "GPSHPositioningError"
                            },
                            40965: {
                                1: "InteroperabilityIndex"
                            }
                        }, t.tags.ifd1 = t.tags, t.stringValues = {
                            ExposureProgram: {
                                0: "Undefined",
                                1: "Manual",
                                2: "Normal program",
                                3: "Aperture priority",
                                4: "Shutter priority",
                                5: "Creative program",
                                6: "Action program",
                                7: "Portrait mode",
                                8: "Landscape mode"
                            },
                            MeteringMode: {
                                0: "Unknown",
                                1: "Average",
                                2: "CenterWeightedAverage",
                                3: "Spot",
                                4: "MultiSpot",
                                5: "Pattern",
                                6: "Partial",
                                255: "Other"
                            },
                            LightSource: {
                                0: "Unknown",
                                1: "Daylight",
                                2: "Fluorescent",
                                3: "Tungsten (incandescent light)",
                                4: "Flash",
                                9: "Fine weather",
                                10: "Cloudy weather",
                                11: "Shade",
                                12: "Daylight fluorescent (D 5700 - 7100K)",
                                13: "Day white fluorescent (N 4600 - 5400K)",
                                14: "Cool white fluorescent (W 3900 - 4500K)",
                                15: "White fluorescent (WW 3200 - 3700K)",
                                17: "Standard light A",
                                18: "Standard light B",
                                19: "Standard light C",
                                20: "D55",
                                21: "D65",
                                22: "D75",
                                23: "D50",
                                24: "ISO studio tungsten",
                                255: "Other"
                            },
                            Flash: {
                                0: "Flash did not fire",
                                1: "Flash fired",
                                5: "Strobe return light not detected",
                                7: "Strobe return light detected",
                                9: "Flash fired, compulsory flash mode",
                                13: "Flash fired, compulsory flash mode, return light not detected",
                                15: "Flash fired, compulsory flash mode, return light detected",
                                16: "Flash did not fire, compulsory flash mode",
                                24: "Flash did not fire, auto mode",
                                25: "Flash fired, auto mode",
                                29: "Flash fired, auto mode, return light not detected",
                                31: "Flash fired, auto mode, return light detected",
                                32: "No flash function",
                                65: "Flash fired, red-eye reduction mode",
                                69: "Flash fired, red-eye reduction mode, return light not detected",
                                71: "Flash fired, red-eye reduction mode, return light detected",
                                73: "Flash fired, compulsory flash mode, red-eye reduction mode",
                                77: "Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected",
                                79: "Flash fired, compulsory flash mode, red-eye reduction mode, return light detected",
                                89: "Flash fired, auto mode, red-eye reduction mode",
                                93: "Flash fired, auto mode, return light not detected, red-eye reduction mode",
                                95: "Flash fired, auto mode, return light detected, red-eye reduction mode"
                            },
                            SensingMethod: {
                                1: "Undefined",
                                2: "One-chip color area sensor",
                                3: "Two-chip color area sensor",
                                4: "Three-chip color area sensor",
                                5: "Color sequential area sensor",
                                7: "Trilinear sensor",
                                8: "Color sequential linear sensor"
                            },
                            SceneCaptureType: {
                                0: "Standard",
                                1: "Landscape",
                                2: "Portrait",
                                3: "Night scene"
                            },
                            SceneType: {
                                1: "Directly photographed"
                            },
                            CustomRendered: {
                                0: "Normal process",
                                1: "Custom process"
                            },
                            WhiteBalance: {
                                0: "Auto white balance",
                                1: "Manual white balance"
                            },
                            GainControl: {
                                0: "None",
                                1: "Low gain up",
                                2: "High gain up",
                                3: "Low gain down",
                                4: "High gain down"
                            },
                            Contrast: {
                                0: "Normal",
                                1: "Soft",
                                2: "Hard"
                            },
                            Saturation: {
                                0: "Normal",
                                1: "Low saturation",
                                2: "High saturation"
                            },
                            Sharpness: {
                                0: "Normal",
                                1: "Soft",
                                2: "Hard"
                            },
                            SubjectDistanceRange: {
                                0: "Unknown",
                                1: "Macro",
                                2: "Close view",
                                3: "Distant view"
                            },
                            FileSource: {
                                3: "DSC"
                            },
                            ComponentsConfiguration: {
                                0: "",
                                1: "Y",
                                2: "Cb",
                                3: "Cr",
                                4: "R",
                                5: "G",
                                6: "B"
                            },
                            Orientation: {
                                1: "Original",
                                2: "Horizontal flip",
                                3: "Rotate 180° CCW",
                                4: "Vertical flip",
                                5: "Vertical flip + Rotate 90° CW",
                                6: "Rotate 90° CW",
                                7: "Horizontal flip + Rotate 90° CW",
                                8: "Rotate 90° CCW"
                            }
                        }, t.getText = function(e) {
                            var t = this.get(e);
                            switch (e) {
                                case "LightSource":
                                case "Flash":
                                case "MeteringMode":
                                case "ExposureProgram":
                                case "SensingMethod":
                                case "SceneCaptureType":
                                case "SceneType":
                                case "CustomRendered":
                                case "WhiteBalance":
                                case "GainControl":
                                case "Contrast":
                                case "Saturation":
                                case "Sharpness":
                                case "SubjectDistanceRange":
                                case "FileSource":
                                case "Orientation":
                                    return this.stringValues[e][t];
                                case "ExifVersion":
                                case "FlashpixVersion":
                                    if (!t) return;
                                    return String.fromCharCode(t[0], t[1], t[2], t[3]);
                                case "ComponentsConfiguration":
                                    if (!t) return;
                                    return this.stringValues[e][t[0]] + this.stringValues[e][t[1]] + this.stringValues[e][t[2]] + this.stringValues[e][t[3]];
                                case "GPSVersionID":
                                    if (!t) return;
                                    return t[0] + "." + t[1] + "." + t[2] + "." + t[3]
                            }
                            return String(t)
                        }, t.getAll = function() {
                            var e, t, n, map = {};
                            for (e in this) Object.prototype.hasOwnProperty.call(this, e) && ((t = this[e]) && t.getAll ? map[this.ifds[e].name] = t.getAll() : (n = this.tags[e]) && (map[n] = this.getText(n)));
                            return map
                        }, t.getName = function(e) {
                            var t = this.tags[e];
                            return "object" == typeof t ? this.ifds[e].name : t
                        },
                        function() {
                            var e, n, r, o = t.tags;
                            for (e in o)
                                if (Object.prototype.hasOwnProperty.call(o, e))
                                    if (n = t.ifds[e])
                                        for (e in r = o[e]) Object.prototype.hasOwnProperty.call(r, e) && (n.map[r[e]] = Number(e));
                                    else t.map[o[e]] = Number(e)
                        }()
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1872: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180), n(1594)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.IptcMap.prototype;
                    t.tags = {
                            0: "ApplicationRecordVersion",
                            3: "ObjectTypeReference",
                            4: "ObjectAttributeReference",
                            5: "ObjectName",
                            7: "EditStatus",
                            8: "EditorialUpdate",
                            10: "Urgency",
                            12: "SubjectReference",
                            15: "Category",
                            20: "SupplementalCategories",
                            22: "FixtureIdentifier",
                            25: "Keywords",
                            26: "ContentLocationCode",
                            27: "ContentLocationName",
                            30: "ReleaseDate",
                            35: "ReleaseTime",
                            37: "ExpirationDate",
                            38: "ExpirationTime",
                            40: "SpecialInstructions",
                            42: "ActionAdvised",
                            45: "ReferenceService",
                            47: "ReferenceDate",
                            50: "ReferenceNumber",
                            55: "DateCreated",
                            60: "TimeCreated",
                            62: "DigitalCreationDate",
                            63: "DigitalCreationTime",
                            65: "OriginatingProgram",
                            70: "ProgramVersion",
                            75: "ObjectCycle",
                            80: "Byline",
                            85: "BylineTitle",
                            90: "City",
                            92: "Sublocation",
                            95: "State",
                            100: "CountryCode",
                            101: "Country",
                            103: "OriginalTransmissionReference",
                            105: "Headline",
                            110: "Credit",
                            115: "Source",
                            116: "CopyrightNotice",
                            118: "Contact",
                            120: "Caption",
                            121: "LocalCaption",
                            122: "Writer",
                            125: "RasterizedCaption",
                            130: "ImageType",
                            131: "ImageOrientation",
                            135: "LanguageIdentifier",
                            150: "AudioType",
                            151: "AudioSamplingRate",
                            152: "AudioSamplingResolution",
                            153: "AudioDuration",
                            154: "AudioOutcue",
                            184: "JobID",
                            185: "MasterDocumentID",
                            186: "ShortDocumentID",
                            187: "UniqueDocumentID",
                            188: "OwnerID",
                            200: "ObjectPreviewFileFormat",
                            201: "ObjectPreviewFileVersion",
                            202: "ObjectPreviewData",
                            221: "Prefs",
                            225: "ClassifyState",
                            228: "SimilarityIndex",
                            230: "DocumentNotes",
                            231: "DocumentHistory",
                            232: "ExifCameraInfo",
                            255: "CatalogSets"
                        }, t.stringValues = {
                            10: {
                                0: "0 (reserved)",
                                1: "1 (most urgent)",
                                2: "2",
                                3: "3",
                                4: "4",
                                5: "5 (normal urgency)",
                                6: "6",
                                7: "7",
                                8: "8 (least urgent)",
                                9: "9 (user-defined priority)"
                            },
                            75: {
                                a: "Morning",
                                b: "Both Morning and Evening",
                                p: "Evening"
                            },
                            131: {
                                L: "Landscape",
                                P: "Portrait",
                                S: "Square"
                            }
                        }, t.getText = function(e) {
                            var t = this.get(e),
                                n = this.map[e],
                                r = this.stringValues[n];
                            return r ? r[t] : String(t)
                        }, t.getAll = function() {
                            var e, t, map = {};
                            for (e in this) Object.prototype.hasOwnProperty.call(this, e) && (t = this.tags[e]) && (map[t] = this.getText(t));
                            return map
                        }, t.getName = function(e) {
                            return this.tags[e]
                        },
                        function() {
                            var e, n = t.tags,
                                map = t.map || {};
                            for (e in n) Object.prototype.hasOwnProperty.call(n, e) && (map[n[e]] = Number(e))
                        }()
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        },
        1873: function(e, t, n) {
            var r, o, c;
            ! function(f) {
                "use strict";
                o = [n(1180), n(1592), n(1305)], void 0 === (c = "function" == typeof(r = function(e) {
                    var t = e.transform,
                        n = e.requiresCanvas,
                        r = e.requiresMetaData,
                        o = e.transformCoordinates,
                        c = e.getTransformedOptions;

                    function f(t, n) {
                        var r = t && t.orientation;
                        return !0 === r && !e.orientation || 1 === r && e.orientation || (!n || e.orientation) && r > 1 && r < 9
                    }

                    function l(e, t) {
                        return e !== t && (1 === e && t > 1 && t < 9 || e > 1 && e < 9)
                    }

                    function d(e, t) {
                        if (t > 1 && t < 9) switch (e) {
                            case 2:
                            case 4:
                                return t > 4;
                            case 5:
                            case 7:
                                return t % 2 == 0;
                            case 6:
                            case 8:
                                return 2 === t || 4 === t || 5 === t || 7 === t
                        }
                        return !1
                    }(function(e) {
                        if (e.global.document) {
                            var img = document.createElement("img");
                            img.onload = function() {
                                if (e.orientation = 2 === img.width && 3 === img.height, e.orientation) {
                                    var t = e.createCanvas(1, 1, !0).getContext("2d");
                                    t.drawImage(img, 1, 1, 1, 1, 0, 0, 1, 1), e.orientationCropBug = "255,255,255,255" !== t.getImageData(0, 0, 1, 1).data.toString()
                                }
                            }, img.src = "data:image/jpeg;base64,/9j/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAYAAAAAAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAIAAwMBEQACEQEDEQH/xABRAAEAAAAAAAAAAAAAAAAAAAAKEAEBAQADAQEAAAAAAAAAAAAGBQQDCAkCBwEBAAAAAAAAAAAAAAAAAAAAABEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AG8T9NfSMEVMhQvoP3fFiRZ+MTHDifa/95OFSZU5OzRzxkyejv8ciEfhSceSXGjS8eSdLnZc2HDm4M3BxcXwH/9k="
                        }
                    })(e), e.requiresCanvas = function(t) {
                        return f(t) || n.call(e, t)
                    }, e.requiresMetaData = function(t) {
                        return f(t, !0) || r.call(e, t)
                    }, e.transform = function(img, n, r, o, data) {
                        t.call(e, img, n, (function(img, data) {
                            if (data) {
                                var t = e.orientation && data.exif && data.exif.get("Orientation");
                                if (t > 4 && t < 9) {
                                    var n = data.originalWidth,
                                        o = data.originalHeight;
                                    data.originalWidth = o, data.originalHeight = n
                                }
                            }
                            r(img, data)
                        }), o, data)
                    }, e.getTransformedOptions = function(img, t, data) {
                        var n = c.call(e, img, t),
                            r = data.exif && data.exif.get("Orientation"),
                            o = n.orientation,
                            f = e.orientation && r;
                        if (!0 === o && (o = r), !l(o, f)) return n;
                        var h = n.top,
                            m = n.right,
                            y = n.bottom,
                            A = n.left,
                            v = {};
                        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (v[i] = n[i]);
                        if (v.orientation = o, (o > 4 && !(f > 4) || o < 5 && f > 4) && (v.maxWidth = n.maxHeight, v.maxHeight = n.maxWidth, v.minWidth = n.minHeight, v.minHeight = n.minWidth, v.sourceWidth = n.sourceHeight, v.sourceHeight = n.sourceWidth), f > 1) {
                            switch (f) {
                                case 2:
                                    m = n.left, A = n.right;
                                    break;
                                case 3:
                                    h = n.bottom, m = n.left, y = n.top, A = n.right;
                                    break;
                                case 4:
                                    h = n.bottom, y = n.top;
                                    break;
                                case 5:
                                    h = n.left, m = n.bottom, y = n.right, A = n.top;
                                    break;
                                case 6:
                                    h = n.left, m = n.top, y = n.right, A = n.bottom;
                                    break;
                                case 7:
                                    h = n.right, m = n.top, y = n.left, A = n.bottom;
                                    break;
                                case 8:
                                    h = n.right, m = n.bottom, y = n.left, A = n.top
                            }
                            if (d(o, f)) {
                                var S = h,
                                    w = m;
                                h = y, m = A, y = S, A = w
                            }
                        }
                        switch (v.top = h, v.right = m, v.bottom = y, v.left = A, o) {
                            case 2:
                                v.right = A, v.left = m;
                                break;
                            case 3:
                                v.top = y, v.right = A, v.bottom = h, v.left = m;
                                break;
                            case 4:
                                v.top = y, v.bottom = h;
                                break;
                            case 5:
                                v.top = A, v.right = y, v.bottom = m, v.left = h;
                                break;
                            case 6:
                                v.top = m, v.right = y, v.bottom = A, v.left = h;
                                break;
                            case 7:
                                v.top = m, v.right = h, v.bottom = A, v.left = y;
                                break;
                            case 8:
                                v.top = A, v.right = h, v.bottom = m, v.left = y
                        }
                        return v
                    }, e.transformCoordinates = function(canvas, t, data) {
                        o.call(e, canvas, t, data);
                        var n = t.orientation,
                            r = e.orientation && data.exif && data.exif.get("Orientation");
                        if (l(n, r)) {
                            var c = canvas.getContext("2d"),
                                f = canvas.width,
                                h = canvas.height,
                                m = f,
                                y = h;
                            switch ((n > 4 && !(r > 4) || n < 5 && r > 4) && (canvas.width = h, canvas.height = f), n > 4 && (m = h, y = f), r) {
                                case 2:
                                    c.translate(m, 0), c.scale(-1, 1);
                                    break;
                                case 3:
                                    c.translate(m, y), c.rotate(Math.PI);
                                    break;
                                case 4:
                                    c.translate(0, y), c.scale(1, -1);
                                    break;
                                case 5:
                                    c.rotate(-.5 * Math.PI), c.scale(-1, 1);
                                    break;
                                case 6:
                                    c.rotate(-.5 * Math.PI), c.translate(-m, 0);
                                    break;
                                case 7:
                                    c.rotate(-.5 * Math.PI), c.translate(-m, y), c.scale(1, -1);
                                    break;
                                case 8:
                                    c.rotate(.5 * Math.PI), c.translate(0, -y)
                            }
                            switch (d(n, r) && (c.translate(m, y), c.rotate(Math.PI)), n) {
                                case 2:
                                    c.translate(f, 0), c.scale(-1, 1);
                                    break;
                                case 3:
                                    c.translate(f, h), c.rotate(Math.PI);
                                    break;
                                case 4:
                                    c.translate(0, h), c.scale(1, -1);
                                    break;
                                case 5:
                                    c.rotate(.5 * Math.PI), c.scale(1, -1);
                                    break;
                                case 6:
                                    c.rotate(.5 * Math.PI), c.translate(0, -h);
                                    break;
                                case 7:
                                    c.rotate(.5 * Math.PI), c.translate(f, -h), c.scale(-1, 1);
                                    break;
                                case 8:
                                    c.rotate(-.5 * Math.PI), c.translate(-f, 0)
                            }
                        }
                    }
                }) ? r.apply(t, o) : r) || (e.exports = c)
            }()
        }
    }
]);