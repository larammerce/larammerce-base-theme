if(window.currentPage==="product-single")
require(['jquery'], function ($) {
    var jQuery = $;
    var viewer, templateSlideOwl;
    (function (n, t, i) {
        "use strict";

        function s(n, t, i, r) {
            return n /= r, n--, -i * (n * n * n * n - 1) + t
        }

        function v(n) {
            return n.complete && (typeof n.naturalWidth == "undefined" || n.naturalWidth !== 0)
        }

        function e(n, t) {
            this.container = n;
            this.onStart = t.onStart || o;
            this.onMove = t.onMove || o;
            this.onEnd = t.onEnd || o;
            this.sliderId = t.sliderId || "slider" + Math.ceil(Math.random() * 1e6)
        }

        function f(t, i) {
            var r = this;
            t.is("#iv-container") && (r._fullPage = !0);
            r.container = t;
            i = r.options = n.extend({}, f.defaults, i);
            r.zoomValue = 100;
            !t.find(".snap-view").length;
            t.addClass("iv-container");
            t.css("position") == "static" && t.css("position", "relative");
            r.snapView = t.find(".iv-snap-view");
            r.snapImageWrap = t.find(".iv-snap-image-wrap");
            r.imageWrap = t.find(".iv-image-wrap");
            r.snapHandle = t.find(".iv-snap-handle");
            r.zoomHandle = t.find(".iv-zoom-handle");
            r._viewerId = "iv" + Math.floor(Math.random() * 1e6)
        }

        var o = function () {
        }, u = n("body"), h = n(t), r = n(i), l = 15, a = 5, c;
        (function () {
            for (var r = 0, i = ["ms", "moz", "webkit", "o"], n = 0; n < i.length && !t.requestAnimationFrame; ++n) t.requestAnimationFrame = t[i[n] + "RequestAnimationFrame"], t.cancelAnimationFrame = t[i[n] + "CancelAnimationFrame"] || t[i[n] + "CancelRequestAnimationFrame"];
            t.requestAnimationFrame || (t.requestAnimationFrame = function (n) {
                var i = (new Date).getTime(), u = Math.max(0, 16 - (i - r)), f = t.setTimeout(function () {
                    n(i + u)
                }, u);
                return r = i + u, f
            });
            t.cancelAnimationFrame || (t.cancelAnimationFrame = function (n) {
                clearTimeout(n)
            })
        })();
        c = '<div class="iv-loader"><\/div> <div class="iv-snap-view"><div class="iv-snap-image-wrap"><div class="iv-snap-handle"><\/div><\/div><div class="iv-zoom-slider"><div class="iv-zoom-handle"><\/div><\/div><\/div><div class="iv-image-view" ><div class="iv-image-wrap" ><\/div><\/div>';
        n(function () {
            u.length || (u = n("body"));
            u.append('<div id="iv-container">' + c + '<div class="iv-close"><\/div><a class="iv-next hidden"><\/a><a class="iv-prev hidden"><\/a><div>')
        });
        e.prototype.init = function () {
            var t = this, i = this.container, n = "." + this.sliderId;
            this.container.on("touchstart" + n + " mousedown" + n, function (i) {
                var f, e;
                i.preventDefault();
                var o = (i.type == "touchstart" ? "touchmove" : "mousemove") + n,
                    s = (i.type == "touchstart" ? "touchend" : "mouseup") + n, u = i.originalEvent,
                    h = u.clientX || u.touches[0].clientX, c = u.clientY || u.touches[0].clientY,
                    l = t.onStart(i, {x: h, y: c});
                if (l !== !1) {
                    f = function (n) {
                        n.preventDefault();
                        u = n.originalEvent;
                        var i = u.clientX || u.touches[0].clientX, r = u.clientY || u.touches[0].clientY;
                        t.onMove(n, {dx: i - h, dy: r - c, mx: i, my: r})
                    };
                    e = function () {
                        r.off(o, f);
                        r.off(s, e);
                        t.onEnd()
                    };
                    r.on(o, f);
                    r.on(s, e)
                }
            });
            return this
        };
        f.prototype = {
            constructor: f, _init: function () {
                function p() {
                    u.snapView && (y || n.zoomValue <= 100 || !n.loaded || (clearTimeout(rt), y = !0, n.snapView.css("opacity", 1)))
                }

                var n = this, u = n.options, o = !1, v = this.container, t = "." + n._viewerId, nt = this.snapHandle,
                    b = this.snapImageWrap, c = this.imageWrap, i = new e(b, {
                        sliderId: n._viewerId, onStart: function () {
                            if (!n.loaded) return !1;
                            var t = nt[0].style;
                            this.curHandleTop = parseFloat(t.top);
                            this.curHandleLeft = parseFloat(t.left);
                            this.handleWidth = parseFloat(t.width);
                            this.handleHeight = parseFloat(t.height);
                            this.width = b.width();
                            this.height = b.height();
                            clearInterval(tt.slideMomentumCheck);
                            cancelAnimationFrame(tt.sliderMomentumFrame)
                        }, onMove: function (t, i) {
                            var r = this.curHandleLeft + i.dx * 100 / this.width,
                                u = this.curHandleTop + i.dy * 100 / this.height;
                            r = Math.max(0, r);
                            r = Math.min(100 - this.handleWidth, r);
                            u = Math.max(0, u);
                            u = Math.min(100 - this.handleHeight, u);
                            var f = n.containerDim, e = n.imageDim.w * (n.zoomValue / 100),
                                o = n.imageDim.h * (n.zoomValue / 100), s = e < f.w ? (f.w - e) / 2 : -e * r / 100,
                                h = o < f.h ? (f.h - o) / 2 : -o * u / 100;
                            nt.css({top: u + "%", left: r + "%"});
                            n.currentImg.css({left: s, top: h})
                        }
                    }).init(), tt = n._imageSlider = new e(c, {
                        sliderId: n._viewerId, onStart: function (t, r) {
                            if (!n.loaded) return !1;
                            if (!o) {
                                var u = this;
                                i.onStart();
                                u.imgWidth = n.imageDim.w * n.zoomValue / 100;
                                u.imgHeight = n.imageDim.h * n.zoomValue / 100;
                                u.positions = [r, r];
                                u.startPosition = r;
                                n._clearFrames();
                                u.slideMomentumCheck = setInterval(function () {
                                    u.currentPos && (u.positions.shift(), u.positions.push({
                                        x: u.currentPos.mx,
                                        y: u.currentPos.my
                                    }))
                                }, 50)
                            }
                        }, onMove: function (n, t) {
                            if (!o) {
                                this.currentPos = t;
                                i.onMove(n, {dx: -t.dx * i.width / this.imgWidth, dy: -t.dy * i.height / this.imgHeight})
                            }
                        }, onEnd: function () {
                            function h() {
                                t <= 60 && (n.sliderMomentumFrame = requestAnimationFrame(h));
                                f = f + s(t, r / 3, -r / 3, 60);
                                e = e + s(t, u / 3, -u / 3, 60);
                                i.onMove(null, {dx: -(f * i.width / n.imgWidth), dy: -(e * i.height / n.imgHeight)});
                                t++
                            }

                            if (!o) {
                                var n = this, r = this.positions[1].x - this.positions[0].x,
                                    u = this.positions[1].y - this.positions[0].y;
                                if (Math.abs(r) > 30 || Math.abs(u) > 30) {
                                    var t = 1, f = n.currentPos.dx, e = n.currentPos.dy;
                                    h()
                                }
                            }
                        }
                    }).init(), k = 0, f, d, g, it, rt, y, w;
                c.on("mousewheel" + t + " DOMMouseScroll" + t, function (t) {
                    var r, i;
                    if (u.zoomOnMouseWheel && n.loaded && (n._clearFrames(), r = Math.max(-1, Math.min(1, t.originalEvent.wheelDelta || -t.originalEvent.detail)), i = n.zoomValue * (100 + r * l) / 100, i >= 100 && i <= u.maxZoom ? k = 0 : k += Math.abs(r), !(k > a))) {
                        t.preventDefault();
                        var f = v.offset(), e = (t.pageX || t.originalEvent.pageX) - f.left,
                            o = (t.pageY || t.originalEvent.pageY) - f.top;
                        n.zoom(i, {x: e, y: o});
                        p()
                    }
                });
                c.on("touchstart" + t, function (t) {
                    var i, u;
                    if (n.loaded && (i = t.originalEvent.touches[0], u = t.originalEvent.touches[1], i && u)) {
                        o = !0;
                        var f = v.offset(),
                            h = Math.sqrt(Math.pow(u.pageX - i.pageX, 2) + Math.pow(u.pageY - i.pageY, 2)),
                            c = n.zoomValue,
                            l = {x: (u.pageX + i.pageX) / 2 - f.left, y: (u.pageY + i.pageY) / 2 - f.top},
                            e = function (t) {
                                t.preventDefault();
                                var i = t.originalEvent.touches[0], r = t.originalEvent.touches[1],
                                    u = Math.sqrt(Math.pow(r.pageX - i.pageX, 2) + Math.pow(r.pageY - i.pageY, 2)),
                                    f = c + (u - h) / 2;
                                n.zoom(f, l)
                            }, s = function () {
                                r.off("touchmove", e);
                                r.off("touchend", s);
                                o = !1
                            };
                        r.on("touchmove", e);
                        r.on("touchend", s)
                    }
                });
                f = 0;
                c.on("click" + t, function (t) {
                    f == 0 ? (f = Date.now(), d = {
                        x: t.pageX,
                        y: t.pageY
                    }) : Date.now() - f < 500 && Math.abs(t.pageX - d.x) < 50 && Math.abs(t.pageY - d.y) < 50 ? (n.zoomValue == u.zoomValue ? n.zoom(200) : n.resetZoom(), f = 0) : f = 0
                });
                g = n.snapView.find(".iv-zoom-slider");
                it = new e(g, {
                    sliderId: n._viewerId, onStart: function (t) {
                        if (!n.loaded) return !1;
                        this.leftOffset = g.offset().left;
                        this.handleWidth = n.zoomHandle.width();
                        this.onMove(t)
                    }, onMove: function (t) {
                        var i = (t.pageX || t.originalEvent.touches[0].pageX) - this.leftOffset - this.handleWidth / 2,
                            r;
                        i = Math.max(0, i);
                        i = Math.min(n._zoomSliderLength, i);
                        r = 100 + (u.maxZoom - 100) * i / n._zoomSliderLength;
                        n.zoom(r)
                    }
                }).init();
                c.on("touchmove" + t + " mousemove" + t, function () {
                    p()
                });
                w = {};
                w["mouseenter" + t + " touchstart" + t] = function () {
                    y = !1;
                    p(!0)
                };
                w["mouseleave" + t + " touchend" + t] = function () {
                    y = !1;
                    p()
                };
                n.snapView.on(w);
                if (u.refreshOnResize) h.on("resize" + t, function () {
                    n.refresh()
                });
                if (n._fullPage) {
                    v.on("touchmove" + t + " mousewheel" + t + " DOMMouseScroll" + t, function (n) {
                        n.preventDefault()
                    });
                    v.find(".iv-close").on("click" + t, function () {
                        n.hide()
                    })
                }
            }, zoom: function (n, t) {
                function v() {
                    e++;
                    e < 20 && (i._zoomFrame = requestAnimationFrame(v));
                    var b = s(e, u, n - u, 20), g = b / u, k = i.imageDim.w * b / 100, d = i.imageDim.h * b / 100,
                        r = -((t.x - p) * g - t.x), o = -((t.y - w) * g - t.y);
                    r = Math.min(r, h);
                    o = Math.min(o, c);
                    r + k < l && (r = l - k);
                    o + d < a && (o = a - d);
                    f.css({height: d + "px", width: k + "px", left: r + "px", top: o + "px"});
                    i.zoomValue = b;
                    i._resizeHandle(k, d, r, o);
                    i.zoomHandle.css("left", (b - 80) * i._zoomSliderLength / (y + 100) + "px")
                }

                n = Math.round(Math.max(100, n));
                n = Math.min(this.options.maxZoom, n);
                t = t || {x: this.containerDim.w / 2, y: this.containerDim.h / 2};
                var i = this, y = this.options.maxZoom, u = this.zoomValue, f = this.currentImg, r = this.containerDim,
                    p = parseFloat(f.css("left")), w = parseFloat(f.css("top"));
                i._clearFrames();
                var e = 0, r = i.containerDim, o = i.imageDim, h = (r.w - o.w) / 2, c = (r.h - o.h) / 2, l = r.w - h,
                    a = r.h - c;
                v()
            }, _clearFrames: function () {
                clearInterval(this._imageSlider.slideMomentumCheck);
                cancelAnimationFrame(this._imageSlider.sliderMomentumFrame);
                cancelAnimationFrame(this._zoomFrame)
            }, resetZoom: function () {
                this.zoom(this.options.zoomValue)
            }, _calculateDimensions: function () {
                var n = this, e = n.currentImg, c = n.container, l = n.snapView, a = e.width(), v = e.height(),
                    r = c.width(), u = c.height(), o = l.innerWidth(), y = l.innerHeight(), t, i, f, s, h;
                n.containerDim = {w: r, h: u};
                f = a / v;
                t = a > v && u >= r || f * u > r ? r : f * u;
                i = t / f;
                n.imageDim = {w: t, h: i};
                e.css({
                    width: t + "px",
                    height: i + "px",
                    left: (r - t) / 2 + "px",
                    top: (u - i) / 2 + "px",
                    "max-width": "none",
                    "max-height": "none"
                });
                s = t > i ? o : t * y / i;
                h = i > t ? y : i * o / t;
                n.snapImageDim = {w: s, h: h};
                n.snapImg.css({width: s, height: h});
                n._zoomSliderLength = o - n.zoomHandle.outerWidth()
            }, refresh: function () {
                this.loaded && (this._calculateDimensions(), this.resetZoom())
            }, _resizeHandle: function (n, t, i, r) {
                var u = this.currentImg, f = n || this.imageDim.w * this.zoomValue / 100,
                    e = t || this.imageDim.h * this.zoomValue / 100,
                    o = Math.max(-(i || parseFloat(u.css("left"))) * 100 / f, 0),
                    s = Math.max(-(r || parseFloat(u.css("top"))) * 100 / e, 0),
                    h = Math.min(this.containerDim.w * 100 / f, 100), c = Math.min(this.containerDim.h * 100 / e, 100);
                this.snapHandle.css({top: s + "%", left: o + "%", width: h + "%", height: c + "%"})
            }, show: function (n, t, i) {
                this._fullPage && (u.addClass("remove-scrollbar"), this.container.show(), n && this.load(n, t, i))
            }, hide: function () {
                this._fullPage && (u.removeClass("remove-scrollbar"), this.container.hide())
            }, options: function (n, t) {
                if (!t) return this.options[n];
                this.options[n] = t
            }, destroy: function () {
                var n = "." + this._viewerId;
                return this._fullPage ? (container.off(n), container.find('[class^="iv"]').off(n)) : this.container.remove('[class^="iv"]'), h.off(n), null
            }, play: function (n) {
                this._fullPage && (u.addClass("remove-scrollbar"), this.container.show(), n && this.loadVideo(n))
            }, loadVideo: function (n) {
                function f() {
                    t.loaded = !0;
                    t.zoomValue = 100;
                    r.show();
                    t.snapImg.show();
                    t.refresh();
                    t.resetZoom();
                    i.find(".iv-loader").hide()
                }

                var t = this, i = this.container;
                t.snapView.hide();
                i.find(".iv-snap-image,.iv-large-image").remove();
                var e = this.container.find(".iv-snap-image-wrap"), u = this.container.find(".iv-image-wrap"),
                    r = this.currentImg = this.container.find(".iv-large-image");
                u.prepend('<video loop autoplay class="iv-large-image full-size-video"><source src="' + n + '"><\/video>');
                this.snapImg = this.container.find(".iv-snap-image");
                t.loaded = !1;
                i.find(".iv-loader").show();
                r.hide();
                t.snapImg.hide();
                f()
            }, load: function (t, i, r) {
                function s() {
                    u.loaded = !0;
                    u.zoomValue = 100;
                    f.show();
                    u.snapImg.show();
                    u.refresh();
                    u.resetZoom();
                    e.find(".iv-loader").hide()
                }

                var u = this, e = this.container, o, f;
                if (u.snapView.show(), e.find(".iv-snap-image,.iv-large-image").remove(), o = this.container.find(".iv-snap-image-wrap"), o.prepend('<img class="iv-snap-image" src="' + t + '" />'), this.imageWrap.prepend('<img class="iv-large-image" src="' + t + '" />'), i && this.imageWrap.append('<img class="iv-large-image" src="' + i + '" alt="' + r + '" />'), f = this.currentImg = this.container.find(".iv-large-image"), this.snapImg = this.container.find(".iv-snap-image"), u.loaded = !1, e.find(".iv-loader").show(), f.hide(), u.snapImg.hide(), v(f[0])) s(); else n(f[0]).on("load", s)
            }
        };
        f.defaults = {zoomValue: 100, snapView: !0, maxZoom: 500, refreshOnResize: !0, zoomOnMouseWheel: !0};
        t.ImageViewer = function (t, i) {
            var r, u, o, e;
            return t && (typeof t == "string" || t instanceof Element || t[0] instanceof Element) || (i = t, t = n("#iv-container")), t = n(t), t.is("img") ? (r = t, u = r[0].src, o = r.attr("high-res-src") || r.attr("data-high-res-src"), t = r.wrap('<div class="iv-container" style="display:inline-block; overflow:hidden"><\/div>').parent(), r.css({
                opacity: 0,
                position: "relative",
                zIndex: -1
            })) : (u = t.attr("src") || t.attr("data-src"), o = t.attr("high-res-src") || t.attr("data-high-res-src")), e = new f(t, i), e._init(), u && e.load(u, o), e
        };
        n.fn.ImageViewer = function (i) {
            return this.each(function () {
                var r = n(this), u = t.ImageViewer(r, i);
                r.data("ImageViewer", u)
            })
        }
    })(window.jQuery, window, document),
        function () {
            "use strict";

            function e(n) {
                n.fn.swiper = function (i) {
                    var r;
                    return n(this).each(function () {
                        var n = new t(this, i);
                        r || (r = n)
                    }), r
                }
            }

            var n, t = function (r, u) {
                function d(n) {
                    return Math.floor(n)
                }

                function ot() {
                    f.autoplayTimeoutId = setTimeout(function () {
                        f.params.loop ? (f.fixLoop(), f._slideNext(), f.emit("onAutoplay", f)) : f.isEnd ? u.autoplayStopOnLast ? f.stopAutoplay() : (f._slideTo(0), f.emit("onAutoplay", f)) : (f._slideNext(), f.emit("onAutoplay", f))
                    }, f.params.autoplay)
                }

                function st(t, i) {
                    var r = n(t.target), u;
                    if (!r.is(i)) if (typeof i == "string") r = r.parents(i); else if (i.nodeType) return r.parents().each(function (n, t) {
                        t === i && (u = i)
                    }), u ? i : undefined;
                    return r.length === 0 ? undefined : r[0]
                }

                function lt(n, t) {
                    t = t || {};
                    var r = window.MutationObserver || window.WebkitMutationObserver, i = new r(function (n) {
                        n.forEach(function (n) {
                            f.onResize(!0);
                            f.emit("onObserverUpdate", f, n)
                        })
                    });
                    i.observe(n, {
                        attributes: typeof t.attributes == "undefined" ? !0 : t.attributes,
                        childList: typeof t.childList == "undefined" ? !0 : t.childList,
                        characterData: typeof t.characterData == "undefined" ? !0 : t.characterData
                    });
                    f.observers.push(i)
                }

                function wt(n) {
                    var t, o, s, e, r;
                    if ((n.originalEvent && (n = n.originalEvent), t = n.keyCode || n.charCode, !f.params.allowSwipeToNext && (f.isHorizontal() && t === 39 || !f.isHorizontal() && t === 40)) || !f.params.allowSwipeToPrev && (f.isHorizontal() && t === 37 || !f.isHorizontal() && t === 38)) return !1;
                    if (!n.shiftKey && !n.altKey && !n.ctrlKey && !n.metaKey && (!document.activeElement || !document.activeElement.nodeName || document.activeElement.nodeName.toLowerCase() !== "input" && document.activeElement.nodeName.toLowerCase() !== "textarea")) {
                        if (t === 37 || t === 39 || t === 38 || t === 40) {
                            if (o = !1, f.container.parents(".swiper-slide").length > 0 && f.container.parents(".swiper-slide-active").length === 0) return;
                            var u = {left: window.pageXOffset, top: window.pageYOffset}, h = window.innerWidth,
                                c = window.innerHeight, i = f.container.offset();
                            for (f.rtl && (i.left = i.left - f.container[0].scrollLeft), s = [[i.left, i.top], [i.left + f.width, i.top], [i.left, i.top + f.height], [i.left + f.width, i.top + f.height]], e = 0; e < s.length; e++) r = s[e], r[0] >= u.left && r[0] <= u.left + h && r[1] >= u.top && r[1] <= u.top + c && (o = !0);
                            if (!o) return
                        }
                        f.isHorizontal() ? ((t === 37 || t === 39) && (n.preventDefault ? n.preventDefault() : n.returnValue = !1), (t === 39 && !f.rtl || t === 37 && f.rtl) && f.slideNext(), (t === 37 && !f.rtl || t === 39 && f.rtl) && f.slidePrev()) : ((t === 38 || t === 40) && (n.preventDefault ? n.preventDefault() : n.returnValue = !1), t === 40 && f.slideNext(), t === 38 && f.slidePrev())
                    }
                }

                function bt(n) {
                    n.originalEvent && (n = n.originalEvent);
                    var u = f.mousewheel.event, t = 0, r = f.rtl ? -1 : 1;
                    if (u === "mousewheel") if (f.params.mousewheelForceToAxis) if (f.isHorizontal()) if (Math.abs(n.wheelDeltaX) > Math.abs(n.wheelDeltaY)) t = n.wheelDeltaX * r; else return; else if (Math.abs(n.wheelDeltaY) > Math.abs(n.wheelDeltaX)) t = n.wheelDeltaY; else return; else t = Math.abs(n.wheelDeltaX) > Math.abs(n.wheelDeltaY) ? -n.wheelDeltaX * r : -n.wheelDeltaY; else if (u === "DOMMouseScroll") t = -n.detail; else if (u === "wheel") if (f.params.mousewheelForceToAxis) if (f.isHorizontal()) if (Math.abs(n.deltaX) > Math.abs(n.deltaY)) t = -n.deltaX * r; else return; else if (Math.abs(n.deltaY) > Math.abs(n.deltaX)) t = -n.deltaY; else return; else t = Math.abs(n.deltaX) > Math.abs(n.deltaY) ? -n.deltaX * r : -n.deltaY;
                    if (t !== 0) {
                        if (f.params.mousewheelInvert && (t = -t), f.params.freeMode) {
                            var i = f.getWrapperTranslate() + t * f.params.mousewheelSensitivity, e = f.isBeginning,
                                o = f.isEnd;
                            if (i >= f.minTranslate() && (i = f.minTranslate()), i <= f.maxTranslate() && (i = f.maxTranslate()), f.setWrapperTransition(0), f.setWrapperTranslate(i), f.updateProgress(), f.updateActiveIndex(), (!e && f.isBeginning || !o && f.isEnd) && f.updateClasses(), f.params.freeModeSticky ? (clearTimeout(f.mousewheel.timeout), f.mousewheel.timeout = setTimeout(function () {
                                    f.slideReset()
                                }, 300)) : f.params.lazyLoading && f.lazy && f.lazy.load(), i === 0 || i === f.maxTranslate()) return
                        } else {
                            if ((new window.Date).getTime() - f.mousewheel.lastScrollTime > 60) if (t < 0) if (f.isEnd && !f.params.loop || f.animating) {
                                if (f.params.mousewheelReleaseOnEdges) return !0
                            } else f.slideNext(); else if (f.isBeginning && !f.params.loop || f.animating) {
                                if (f.params.mousewheelReleaseOnEdges) return !0
                            } else f.slidePrev();
                            f.mousewheel.lastScrollTime = (new window.Date).getTime()
                        }
                        return f.params.autoplay && f.stopAutoplay(), n.preventDefault ? n.preventDefault() : n.returnValue = !1, !1
                    }
                }

                function kt(t, i) {
                    t = n(t);
                    var e, r, u, o = f.rtl ? -1 : 1;
                    e = t.attr("data-swiper-parallax") || "0";
                    r = t.attr("data-swiper-parallax-x");
                    u = t.attr("data-swiper-parallax-y");
                    r || u ? (r = r || "0", u = u || "0") : f.isHorizontal() ? (r = e, u = "0") : (u = e, r = "0");
                    r = r.indexOf("%") >= 0 ? parseInt(r, 10) * i * o + "%" : r * i * o + "px";
                    u = u.indexOf("%") >= 0 ? parseInt(u, 10) * i + "%" : u * i + "px";
                    t.transform("translate3d(" + r + ", " + u + ",0px)")
                }

                function yt(n) {
                    return n.indexOf("on") !== 0 && (n = n[0] !== n[0].toUpperCase() ? "on" + n[0].toUpperCase() + n.substring(1) : "on" + n), n
                }

                var y, pt, p, o, ft, h, k, f, et, v, rt, ut, at, vt;
                if (!(this instanceof t)) return new t(r, u);
                y = {
                    direction: "horizontal",
                    touchEventsTarget: "container",
                    initialSlide: 0,
                    speed: 300,
                    autoplay: !1,
                    autoplayDisableOnInteraction: !0,
                    autoplayStopOnLast: !1,
                    iOSEdgeSwipeDetection: !1,
                    iOSEdgeSwipeThreshold: 20,
                    freeMode: !1,
                    freeModeMomentum: !0,
                    freeModeMomentumRatio: 1,
                    freeModeMomentumBounce: !0,
                    freeModeMomentumBounceRatio: 1,
                    freeModeSticky: !1,
                    freeModeMinimumVelocity: .02,
                    autoHeight: !1,
                    setWrapperSize: !1,
                    virtualTranslate: !1,
                    effect: "slide",
                    coverflow: {rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: !0},
                    flip: {slideShadows: !0, limitRotation: !0},
                    cube: {slideShadows: !0, shadow: !0, shadowOffset: 20, shadowScale: .94},
                    fade: {crossFade: !1},
                    parallax: !1,
                    scrollbar: null,
                    scrollbarHide: !0,
                    scrollbarDraggable: !1,
                    scrollbarSnapOnRelease: !1,
                    keyboardControl: !1,
                    mousewheelControl: !1,
                    mousewheelReleaseOnEdges: !1,
                    mousewheelInvert: !1,
                    mousewheelForceToAxis: !1,
                    mousewheelSensitivity: 1,
                    hashnav: !1,
                    breakpoints: undefined,
                    spaceBetween: 0,
                    slidesPerView: 1,
                    slidesPerColumn: 1,
                    slidesPerColumnFill: "column",
                    slidesPerGroup: 1,
                    centeredSlides: !1,
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                    roundLengths: !1,
                    touchRatio: 1,
                    touchAngle: 45,
                    simulateTouch: !0,
                    shortSwipes: !0,
                    longSwipes: !0,
                    longSwipesRatio: .5,
                    longSwipesMs: 300,
                    followFinger: !0,
                    onlyExternal: !1,
                    threshold: 0,
                    touchMoveStopPropagation: !0,
                    uniqueNavElements: !0,
                    pagination: null,
                    paginationElement: "span",
                    paginationClickable: !1,
                    paginationHide: !1,
                    paginationBulletRender: null,
                    paginationProgressRender: null,
                    paginationFractionRender: null,
                    paginationCustomRender: null,
                    paginationType: "bullets",
                    resistance: !0,
                    resistanceRatio: .85,
                    nextButton: null,
                    prevButton: null,
                    watchSlidesProgress: !1,
                    watchSlidesVisibility: !1,
                    grabCursor: !1,
                    preventClicks: !0,
                    preventClicksPropagation: !0,
                    slideToClickedSlide: !1,
                    lazyLoading: !1,
                    lazyLoadingInPrevNext: !1,
                    lazyLoadingInPrevNextAmount: 1,
                    lazyLoadingOnTransitionStart: !1,
                    preloadImages: !0,
                    updateOnImagesReady: !0,
                    loop: !1,
                    loopAdditionalSlides: 0,
                    loopedSlides: null,
                    control: undefined,
                    controlInverse: !1,
                    controlBy: "slide",
                    allowSwipeToPrev: !0,
                    allowSwipeToNext: !0,
                    swipeHandler: null,
                    noSwiping: !0,
                    noSwipingClass: "swiper-no-swiping",
                    slideClass: "swiper-slide",
                    slideActiveClass: "swiper-slide-active",
                    slideVisibleClass: "swiper-slide-visible",
                    slideDuplicateClass: "swiper-slide-duplicate",
                    slideNextClass: "swiper-slide-next",
                    slidePrevClass: "swiper-slide-prev",
                    wrapperClass: "swiper-wrapper",
                    bulletClass: "swiper-pagination-bullet",
                    bulletActiveClass: "swiper-pagination-bullet-active",
                    buttonDisabledClass: "swiper-button-disabled",
                    paginationCurrentClass: "swiper-pagination-current",
                    paginationTotalClass: "swiper-pagination-total",
                    paginationHiddenClass: "swiper-pagination-hidden",
                    paginationProgressbarClass: "swiper-pagination-progressbar",
                    observer: !1,
                    observeParents: !1,
                    a11y: !1,
                    prevSlideMessage: "Previous slide",
                    nextSlideMessage: "Next slide",
                    firstSlideMessage: "This is the first slide",
                    lastSlideMessage: "This is the last slide",
                    paginationBulletMessage: "Go to slide {{index}}",
                    runCallbacksOnInit: !0
                };
                pt = u && u.virtualTranslate;
                u = u || {};
                p = {};
                for (o in u) if (typeof u[o] != "object" || u[o] === null || u[o].nodeType || u[o] === window || u[o] === document || typeof i != "undefined" && u[o] instanceof i || typeof jQuery != "undefined" && u[o] instanceof jQuery) p[o] = u[o]; else {
                    p[o] = {};
                    for (ft in u[o]) p[o][ft] = u[o][ft]
                }
                for (h in y) if (typeof u[h] == "undefined") u[h] = y[h]; else if (typeof u[h] == "object") for (k in y[h]) typeof u[h][k] == "undefined" && (u[h][k] = y[h][k]);
                if ((f = this, f.params = u, f.originalParams = p, f.classNames = [], typeof n != "undefined" && typeof i != "undefined" && (n = i), typeof n != "undefined" || (n = typeof i == "undefined" ? window.Dom7 || window.Zepto || window.jQuery : i, n)) && (f.$ = n, f.currentBreakpoint = undefined, f.getActiveBreakpoint = function () {
                        var i, t, n, r;
                        if (!f.params.breakpoints) return !1;
                        i = !1;
                        t = [];
                        for (n in f.params.breakpoints) f.params.breakpoints.hasOwnProperty(n) && t.push(n);
                        for (t.sort(function (n, t) {
                            return parseInt(n, 10) > parseInt(t, 10)
                        }), r = 0; r < t.length; r++) n = t[r], n >= window.innerWidth && !i && (i = n);
                        return i || "max"
                    }, f.setBreakpoint = function () {
                        var n = f.getActiveBreakpoint(), t, r, i;
                        if (n && f.currentBreakpoint !== n) {
                            t = n in f.params.breakpoints ? f.params.breakpoints[n] : f.originalParams;
                            r = f.params.loop && t.slidesPerView !== f.params.slidesPerView;
                            for (i in t) f.params[i] = t[i];
                            f.currentBreakpoint = n;
                            r && f.destroyLoop && f.reLoop(!0)
                        }
                    }, f.params.breakpoints && f.setBreakpoint(), f.container = n(r), f.container.length !== 0)) {
                    if (f.container.length > 1) return et = [], f.container.each(function () {
                        var n = this;
                        et.push(new t(this, u))
                    }), et;
                    f.container[0].swiper = f;
                    f.container.data("swiper", f);
                    f.classNames.push("swiper-container-" + f.params.direction);
                    f.params.freeMode && f.classNames.push("swiper-container-free-mode");
                    f.support.flexbox || (f.classNames.push("swiper-container-no-flexbox"), f.params.slidesPerColumn = 1);
                    f.params.autoHeight && f.classNames.push("swiper-container-autoheight");
                    (f.params.parallax || f.params.watchSlidesVisibility) && (f.params.watchSlidesProgress = !0);
                    ["cube", "coverflow", "flip"].indexOf(f.params.effect) >= 0 && (f.support.transforms3d ? (f.params.watchSlidesProgress = !0, f.classNames.push("swiper-container-3d")) : f.params.effect = "slide");
                    f.params.effect !== "slide" && f.classNames.push("swiper-container-" + f.params.effect);
                    f.params.effect === "cube" && (f.params.resistanceRatio = 0, f.params.slidesPerView = 1, f.params.slidesPerColumn = 1, f.params.slidesPerGroup = 1, f.params.centeredSlides = !1, f.params.spaceBetween = 0, f.params.virtualTranslate = !0, f.params.setWrapperSize = !1);
                    (f.params.effect === "fade" || f.params.effect === "flip") && (f.params.slidesPerView = 1, f.params.slidesPerColumn = 1, f.params.slidesPerGroup = 1, f.params.watchSlidesProgress = !0, f.params.spaceBetween = 0, f.params.setWrapperSize = !1, typeof pt == "undefined" && (f.params.virtualTranslate = !0));
                    f.params.grabCursor && f.support.touch && (f.params.grabCursor = !1);
                    f.wrapper = f.container.children("." + f.params.wrapperClass);
                    f.params.pagination && (f.paginationContainer = n(f.params.pagination), f.params.uniqueNavElements && typeof f.params.pagination == "string" && f.paginationContainer.length > 1 && f.container.find(f.params.pagination).length === 1 && (f.paginationContainer = f.container.find(f.params.pagination)), f.params.paginationType === "bullets" && f.params.paginationClickable ? f.paginationContainer.addClass("swiper-pagination-clickable") : f.params.paginationClickable = !1, f.paginationContainer.addClass("swiper-pagination-" + f.params.paginationType));
                    (f.params.nextButton || f.params.prevButton) && (f.params.nextButton && (f.nextButton = n(f.params.nextButton), f.params.uniqueNavElements && typeof f.params.nextButton == "string" && f.nextButton.length > 1 && f.container.find(f.params.nextButton).length === 1 && (f.nextButton = f.container.find(f.params.nextButton))), f.params.prevButton && (f.prevButton = n(f.params.prevButton), f.params.uniqueNavElements && typeof f.params.prevButton == "string" && f.prevButton.length > 1 && f.container.find(f.params.prevButton).length === 1 && (f.prevButton = f.container.find(f.params.prevButton))));
                    f.isHorizontal = function () {
                        return f.params.direction === "horizontal"
                    };
                    f.rtl = f.isHorizontal() && (f.container[0].dir.toLowerCase() === "rtl" || f.container.css("direction") === "rtl");
                    f.rtl && f.classNames.push("swiper-container-rtl");
                    f.rtl && (f.wrongRTL = f.wrapper.css("display") === "-webkit-box");
                    f.params.slidesPerColumn > 1 && f.classNames.push("swiper-container-multirow");
                    f.device.android && f.classNames.push("swiper-container-android");
                    f.container.addClass(f.classNames.join(" "));
                    f.translate = 0;
                    f.progress = 0;
                    f.velocity = 0;
                    f.lockSwipeToNext = function () {
                        f.params.allowSwipeToNext = !1
                    };
                    f.lockSwipeToPrev = function () {
                        f.params.allowSwipeToPrev = !1
                    };
                    f.lockSwipes = function () {
                        f.params.allowSwipeToNext = f.params.allowSwipeToPrev = !1
                    };
                    f.unlockSwipeToNext = function () {
                        f.params.allowSwipeToNext = !0
                    };
                    f.unlockSwipeToPrev = function () {
                        f.params.allowSwipeToPrev = !0
                    };
                    f.unlockSwipes = function () {
                        f.params.allowSwipeToNext = f.params.allowSwipeToPrev = !0
                    };
                    f.params.grabCursor && (f.container[0].style.cursor = "move", f.container[0].style.cursor = "-webkit-grab", f.container[0].style.cursor = "-moz-grab", f.container[0].style.cursor = "grab");
                    f.imagesToLoad = [];
                    f.imagesLoaded = 0;
                    f.loadImage = function (n, t, i, r, u) {
                        function e() {
                            u && u()
                        }

                        var f;
                        n.complete && r ? e() : t ? (f = new window.Image, f.onload = e, f.onerror = e, i && (f.srcset = i), t && (f.src = t)) : e()
                    };
                    f.preloadImages = function () {
                        function t() {
                            typeof f != "undefined" && f !== null && (f.imagesLoaded !== undefined && f.imagesLoaded++, f.imagesLoaded === f.imagesToLoad.length && (f.params.updateOnImagesReady && f.update(), f.emit("onImagesReady", f)))
                        }

                        f.imagesToLoad = f.container.find("img");
                        for (var n = 0; n < f.imagesToLoad.length; n++) f.loadImage(f.imagesToLoad[n], f.imagesToLoad[n].currentSrc || f.imagesToLoad[n].getAttribute("src"), f.imagesToLoad[n].srcset || f.imagesToLoad[n].getAttribute("srcset"), !0, t)
                    };
                    f.autoplayTimeoutId = undefined;
                    f.autoplaying = !1;
                    f.autoplayPaused = !1;
                    f.startAutoplay = function () {
                        if (typeof f.autoplayTimeoutId != "undefined" || !f.params.autoplay || f.autoplaying) return !1;
                        f.autoplaying = !0;
                        f.emit("onAutoplayStart", f);
                        ot()
                    };
                    f.stopAutoplay = function () {
                        f.autoplayTimeoutId && (f.autoplayTimeoutId && clearTimeout(f.autoplayTimeoutId), f.autoplaying = !1, f.autoplayTimeoutId = undefined, f.emit("onAutoplayStop", f))
                    };
                    f.pauseAutoplay = function (n) {
                        f.autoplayPaused || (f.autoplayTimeoutId && clearTimeout(f.autoplayTimeoutId), f.autoplayPaused = !0, n === 0 ? (f.autoplayPaused = !1, ot()) : f.wrapper.transitionEnd(function () {
                            f && (f.autoplayPaused = !1, f.autoplaying ? ot() : f.stopAutoplay())
                        }))
                    };
                    f.minTranslate = function () {
                        return -f.snapGrid[0]
                    };
                    f.maxTranslate = function () {
                        return -f.snapGrid[f.snapGrid.length - 1]
                    };
                    f.updateAutoHeight = function () {
                        var t = f.slides.eq(f.activeIndex)[0], n;
                        typeof t != "undefined" && (n = t.offsetHeight, n && f.wrapper.css("height", n + "px"))
                    };
                    f.updateContainerSize = function () {
                        var n, t;
                        (n = typeof f.params.width != "undefined" ? f.params.width : f.container[0].clientWidth, t = typeof f.params.height != "undefined" ? f.params.height : f.container[0].clientHeight, (n !== 0 || !f.isHorizontal()) && (t !== 0 || f.isHorizontal())) && (n = n - parseInt(f.container.css("padding-left"), 10) - parseInt(f.container.css("padding-right"), 10), t = t - parseInt(f.container.css("padding-top"), 10) - parseInt(f.container.css("padding-bottom"), 10), f.width = n, f.height = t, f.size = f.isHorizontal() ? f.width : f.height)
                    };
                    f.updateSlidesSize = function () {
                        var o, h, c, e, u, l;
                        f.slides = f.wrapper.children("." + f.params.slideClass);
                        f.snapGrid = [];
                        f.slidesGrid = [];
                        f.slidesSizesGrid = [];
                        var i = f.params.spaceBetween, r = -f.params.slidesOffsetBefore, n, y = 0, v = 0;
                        if (typeof f.size != "undefined") {
                            typeof i == "string" && i.indexOf("%") >= 0 && (i = parseFloat(i.replace("%", "")) / 100 * f.size);
                            f.virtualSize = -i;
                            f.rtl ? f.slides.css({marginLeft: "", marginTop: ""}) : f.slides.css({
                                marginRight: "",
                                marginBottom: ""
                            });
                            f.params.slidesPerColumn > 1 && (o = Math.floor(f.slides.length / f.params.slidesPerColumn) === f.slides.length / f.params.slidesPerColumn ? f.slides.length : Math.ceil(f.slides.length / f.params.slidesPerColumn) * f.params.slidesPerColumn, f.params.slidesPerView !== "auto" && f.params.slidesPerColumnFill === "row" && (o = Math.max(o, f.params.slidesPerView * f.params.slidesPerColumn)));
                            var t, s = f.params.slidesPerColumn, a = o / s,
                                p = a - (f.params.slidesPerColumn * a - f.slides.length);
                            for (n = 0; n < f.slides.length; n++) (t = 0, h = f.slides.eq(n), f.params.slidesPerColumn > 1 && (f.params.slidesPerColumnFill === "column" ? (e = Math.floor(n / s), u = n - e * s, (e > p || e === p && u === s - 1) && ++u >= s && (u = 0, e++), c = e + u * o / s, h.css({
                                "-webkit-box-ordinal-group": c,
                                "-moz-box-ordinal-group": c,
                                "-ms-flex-order": c,
                                "-webkit-order": c,
                                order: c
                            })) : (u = Math.floor(n / a), e = n - u * a), h.css({"margin-top": u !== 0 && f.params.spaceBetween && f.params.spaceBetween + "px"}).attr("data-swiper-column", e).attr("data-swiper-row", u)), h.css("display") !== "none") && (f.params.slidesPerView === "auto" ? (t = f.isHorizontal() ? h.outerWidth(!0) : h.outerHeight(!0), f.params.roundLengths && (t = d(t))) : (t = (f.size - (f.params.slidesPerView - 1) * i) / f.params.slidesPerView, f.params.roundLengths && (t = d(t)), f.isHorizontal() ? f.slides[n].style.width = t + "px" : f.slides[n].style.height = t + "px"), f.slides[n].swiperSlideSize = t, f.slidesSizesGrid.push(t), f.params.centeredSlides ? (r = r + t / 2 + y / 2 + i, n === 0 && (r = r - f.size / 2 - i), Math.abs(r) < 1 / 1e3 && (r = 0), v % f.params.slidesPerGroup == 0 && f.snapGrid.push(r), f.slidesGrid.push(r)) : (v % f.params.slidesPerGroup == 0 && f.snapGrid.push(r), f.slidesGrid.push(r), r = r + t + i), f.virtualSize += t + i, y = t, v++);
                            if (f.virtualSize = Math.max(f.virtualSize, f.size) + f.params.slidesOffsetAfter, f.rtl && f.wrongRTL && (f.params.effect === "slide" || f.params.effect === "coverflow") && f.wrapper.css({width: f.virtualSize + f.params.spaceBetween + "px"}), (!f.support.flexbox || f.params.setWrapperSize) && (f.isHorizontal() ? f.wrapper.css({width: f.virtualSize + f.params.spaceBetween + "px"}) : f.wrapper.css({height: f.virtualSize + f.params.spaceBetween + "px"})), f.params.slidesPerColumn > 1 && (f.virtualSize = (t + f.params.spaceBetween) * o, f.virtualSize = Math.ceil(f.virtualSize / f.params.slidesPerColumn) - f.params.spaceBetween, f.wrapper.css({width: f.virtualSize + f.params.spaceBetween + "px"}), f.params.centeredSlides)) {
                                for (l = [], n = 0; n < f.snapGrid.length; n++) f.snapGrid[n] < f.virtualSize + f.snapGrid[0] && l.push(f.snapGrid[n]);
                                f.snapGrid = l
                            }
                            if (!f.params.centeredSlides) {
                                for (l = [], n = 0; n < f.snapGrid.length; n++) f.snapGrid[n] <= f.virtualSize - f.size && l.push(f.snapGrid[n]);
                                f.snapGrid = l;
                                Math.floor(f.virtualSize - f.size) - Math.floor(f.snapGrid[f.snapGrid.length - 1]) > 1 && f.snapGrid.push(f.virtualSize - f.size)
                            }
                            f.snapGrid.length === 0 && (f.snapGrid = [0]);
                            f.params.spaceBetween !== 0 && (f.isHorizontal() ? f.rtl ? f.slides.css({marginLeft: i + "px"}) : f.slides.css({marginRight: i + "px"}) : f.slides.css({marginBottom: i + "px"}));
                            f.params.watchSlidesProgress && f.updateSlidesOffset()
                        }
                    };
                    f.updateSlidesOffset = function () {
                        for (var n = 0; n < f.slides.length; n++) f.slides[n].swiperSlideOffset = f.isHorizontal() ? f.slides[n].offsetLeft : f.slides[n].offsetTop
                    };
                    f.updateSlidesProgress = function (n) {
                        var r, t, i, e;
                        if (typeof n == "undefined" && (n = f.translate || 0), f.slides.length !== 0) for (typeof f.slides[0].swiperSlideOffset == "undefined" && f.updateSlidesOffset(), r = -n, f.rtl && (r = n), f.slides.removeClass(f.params.slideVisibleClass), t = 0; t < f.slides.length; t++) {
                            if (i = f.slides[t], e = (r - i.swiperSlideOffset) / (i.swiperSlideSize + f.params.spaceBetween), f.params.watchSlidesVisibility) {
                                var u = -(r - i.swiperSlideOffset), o = u + f.slidesSizesGrid[t],
                                    s = u >= 0 && u < f.size || o > 0 && o <= f.size || u <= 0 && o >= f.size;
                                s && f.slides.eq(t).addClass(f.params.slideVisibleClass)
                            }
                            i.progress = f.rtl ? -e : e
                        }
                    };
                    f.updateProgress = function (n) {
                        typeof n == "undefined" && (n = f.translate || 0);
                        var t = f.maxTranslate() - f.minTranslate(), i = f.isBeginning, r = f.isEnd;
                        t === 0 ? (f.progress = 0, f.isBeginning = f.isEnd = !0) : (f.progress = (n - f.minTranslate()) / t, f.isBeginning = f.progress <= 0, f.isEnd = f.progress >= 1);
                        f.isBeginning && !i && f.emit("onReachBeginning", f);
                        f.isEnd && !r && f.emit("onReachEnd", f);
                        f.params.watchSlidesProgress && f.updateSlidesProgress(n);
                        f.emit("onProgress", f, f.progress)
                    };
                    f.updateActiveIndex = function () {
                        for (var i = f.rtl ? f.translate : -f.translate, t, r, n = 0; n < f.slidesGrid.length; n++) typeof f.slidesGrid[n + 1] != "undefined" ? i >= f.slidesGrid[n] && i < f.slidesGrid[n + 1] - (f.slidesGrid[n + 1] - f.slidesGrid[n]) / 2 ? t = n : i >= f.slidesGrid[n] && i < f.slidesGrid[n + 1] && (t = n + 1) : i >= f.slidesGrid[n] && (t = n);
                        ((t < 0 || typeof t == "undefined") && (t = 0), r = Math.floor(t / f.params.slidesPerGroup), r >= f.snapGrid.length && (r = f.snapGrid.length - 1), t !== f.activeIndex) && (f.snapIndex = r, f.previousIndex = f.activeIndex, f.activeIndex = t, f.updateClasses())
                    };
                    f.updateClasses = function () {
                        var r, u, e, t, i;
                        if (f.slides.removeClass(f.params.slideActiveClass + " " + f.params.slideNextClass + " " + f.params.slidePrevClass), r = f.slides.eq(f.activeIndex), r.addClass(f.params.slideActiveClass), u = r.next("." + f.params.slideClass).addClass(f.params.slideNextClass), f.params.loop && u.length === 0 && f.slides.eq(0).addClass(f.params.slideNextClass), e = r.prev("." + f.params.slideClass).addClass(f.params.slidePrevClass), f.params.loop && e.length === 0 && f.slides.eq(-1).addClass(f.params.slidePrevClass), f.paginationContainer && f.paginationContainer.length > 0) {
                            if (i = f.params.loop ? Math.ceil((f.slides.length - f.loopedSlides * 2) / f.params.slidesPerGroup) : f.snapGrid.length, f.params.loop ? (t = Math.ceil((f.activeIndex - f.loopedSlides) / f.params.slidesPerGroup), t > f.slides.length - 1 - f.loopedSlides * 2 && (t = t - (f.slides.length - f.loopedSlides * 2)), t > i - 1 && (t = t - i), t < 0 && f.params.paginationType !== "bullets" && (t = i + t)) : t = typeof f.snapIndex != "undefined" ? f.snapIndex : f.activeIndex || 0, f.params.paginationType === "bullets" && f.bullets && f.bullets.length > 0 && (f.bullets.removeClass(f.params.bulletActiveClass), f.paginationContainer.length > 1 ? f.bullets.each(function () {
                                    n(this).index() === t && n(this).addClass(f.params.bulletActiveClass)
                                }) : f.bullets.eq(t).addClass(f.params.bulletActiveClass)), f.params.paginationType === "fraction" && (f.paginationContainer.find("." + f.params.paginationCurrentClass).text(t + 1), f.paginationContainer.find("." + f.params.paginationTotalClass).text(i)), f.params.paginationType === "progress") {
                                var o = (t + 1) / i, s = o, h = 1;
                                f.isHorizontal() || (h = o, s = 1);
                                f.paginationContainer.find("." + f.params.paginationProgressbarClass).transform("translate3d(0,0,0) scaleX(" + s + ") scaleY(" + h + ")").transition(f.params.speed)
                            }
                            f.params.paginationType === "custom" && f.params.paginationCustomRender && (f.paginationContainer.html(f.params.paginationCustomRender(f, t + 1, i)), f.emit("onPaginationRendered", f, f.paginationContainer[0]))
                        }
                        f.params.loop || (f.params.prevButton && f.prevButton && f.prevButton.length > 0 && (f.isBeginning ? (f.prevButton.addClass(f.params.buttonDisabledClass), f.params.a11y && f.a11y && f.a11y.disable(f.prevButton)) : (f.prevButton.removeClass(f.params.buttonDisabledClass), f.params.a11y && f.a11y && f.a11y.enable(f.prevButton))), f.params.nextButton && f.nextButton && f.nextButton.length > 0 && (f.isEnd ? (f.nextButton.addClass(f.params.buttonDisabledClass), f.params.a11y && f.a11y && f.a11y.disable(f.nextButton)) : (f.nextButton.removeClass(f.params.buttonDisabledClass), f.params.a11y && f.a11y && f.a11y.enable(f.nextButton))))
                    };
                    f.updatePagination = function () {
                        var n, i, t;
                        if (f.params.pagination && f.paginationContainer && f.paginationContainer.length > 0) {
                            if (n = "", f.params.paginationType === "bullets") {
                                for (i = f.params.loop ? Math.ceil((f.slides.length - f.loopedSlides * 2) / f.params.slidesPerGroup) : f.snapGrid.length, t = 0; t < i; t++) n += f.params.paginationBulletRender ? f.params.paginationBulletRender(t, f.params.bulletClass) : "<" + f.params.paginationElement + ' class="' + f.params.bulletClass + '"><\/' + f.params.paginationElement + ">";
                                f.paginationContainer.html(n);
                                f.bullets = f.paginationContainer.find("." + f.params.bulletClass);
                                f.params.paginationClickable && f.params.a11y && f.a11y && f.a11y.initPagination()
                            }
                            f.params.paginationType === "fraction" && (n = f.params.paginationFractionRender ? f.params.paginationFractionRender(f, f.params.paginationCurrentClass, f.params.paginationTotalClass) : '<span class="' + f.params.paginationCurrentClass + '"><\/span> / <span class="' + f.params.paginationTotalClass + '"><\/span>', f.paginationContainer.html(n));
                            f.params.paginationType === "progress" && (n = f.params.paginationProgressRender ? f.params.paginationProgressRender(f, f.params.paginationProgressbarClass) : '<span class="' + f.params.paginationProgressbarClass + '"><\/span>', f.paginationContainer.html(n));
                            f.params.paginationType !== "custom" && f.emit("onPaginationRendered", f, f.paginationContainer[0])
                        }
                    };
                    f.update = function (n) {
                        function t() {
                            r = Math.min(Math.max(f.translate, f.maxTranslate()), f.minTranslate());
                            f.setWrapperTranslate(r);
                            f.updateActiveIndex();
                            f.updateClasses()
                        }

                        if (f.updateContainerSize(), f.updateSlidesSize(), f.updateProgress(), f.updatePagination(), f.updateClasses(), f.params.scrollbar && f.scrollbar && f.scrollbar.set(), n) {
                            var i, r;
                            f.controller && f.controller.spline && (f.controller.spline = undefined);
                            f.params.freeMode ? (t(), f.params.autoHeight && f.updateAutoHeight()) : (i = (f.params.slidesPerView === "auto" || f.params.slidesPerView > 1) && f.isEnd && !f.params.centeredSlides ? f.slideTo(f.slides.length - 1, 0, !1, !0) : f.slideTo(f.activeIndex, 0, !1, !0), i || t())
                        } else f.params.autoHeight && f.updateAutoHeight()
                    };
                    f.onResize = function (n) {
                        var i, r, t, u;
                        f.params.breakpoints && f.setBreakpoint();
                        i = f.params.allowSwipeToPrev;
                        r = f.params.allowSwipeToNext;
                        f.params.allowSwipeToPrev = f.params.allowSwipeToNext = !0;
                        f.updateContainerSize();
                        f.updateSlidesSize();
                        (f.params.slidesPerView === "auto" || f.params.freeMode || n) && f.updatePagination();
                        f.params.scrollbar && f.scrollbar && f.scrollbar.set();
                        f.controller && f.controller.spline && (f.controller.spline = undefined);
                        t = !1;
                        f.params.freeMode ? (u = Math.min(Math.max(f.translate, f.maxTranslate()), f.minTranslate()), f.setWrapperTranslate(u), f.updateActiveIndex(), f.updateClasses(), f.params.autoHeight && f.updateAutoHeight()) : (f.updateClasses(), t = (f.params.slidesPerView === "auto" || f.params.slidesPerView > 1) && f.isEnd && !f.params.centeredSlides ? f.slideTo(f.slides.length - 1, 0, !1, !0) : f.slideTo(f.activeIndex, 0, !1, !0));
                        f.params.lazyLoading && !t && f.lazy && f.lazy.load();
                        f.params.allowSwipeToPrev = i;
                        f.params.allowSwipeToNext = r
                    };
                    v = ["mousedown", "mousemove", "mouseup"];
                    window.navigator.pointerEnabled ? v = ["pointerdown", "pointermove", "pointerup"] : window.navigator.msPointerEnabled && (v = ["MSPointerDown", "MSPointerMove", "MSPointerUp"]);
                    f.touchEvents = {
                        start: f.support.touch || !f.params.simulateTouch ? "touchstart" : v[0],
                        move: f.support.touch || !f.params.simulateTouch ? "touchmove" : v[1],
                        end: f.support.touch || !f.params.simulateTouch ? "touchend" : v[2]
                    };
                    (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) && (f.params.touchEventsTarget === "container" ? f.container : f.wrapper).addClass("swiper-wp8-" + f.params.direction);
                    f.initEvents = function (n) {
                        var r = n ? "off" : "on", t = n ? "removeEventListener" : "addEventListener",
                            i = f.params.touchEventsTarget === "container" ? f.container[0] : f.wrapper[0],
                            o = f.support.touch ? i : document, e = f.params.nested ? !0 : !1;
                        f.browser.ie ? (i[t](f.touchEvents.start, f.onTouchStart, !1), o[t](f.touchEvents.move, f.onTouchMove, e), o[t](f.touchEvents.end, f.onTouchEnd, !1)) : (f.support.touch && (i[t](f.touchEvents.start, f.onTouchStart, !1), i[t](f.touchEvents.move, f.onTouchMove, e), i[t](f.touchEvents.end, f.onTouchEnd, !1)), !u.simulateTouch || f.device.ios || f.device.android || (i[t]("mousedown", f.onTouchStart, !1), document[t]("mousemove", f.onTouchMove, e), document[t]("mouseup", f.onTouchEnd, !1)));
                        window[t]("resize", f.onResize);
                        f.params.nextButton && f.nextButton && f.nextButton.length > 0 && (f.nextButton[r]("click", f.onClickNext), f.params.a11y && f.a11y && f.nextButton[r]("keydown", f.a11y.onEnterKey));
                        f.params.prevButton && f.prevButton && f.prevButton.length > 0 && (f.prevButton[r]("click", f.onClickPrev), f.params.a11y && f.a11y && f.prevButton[r]("keydown", f.a11y.onEnterKey));
                        f.params.pagination && f.params.paginationClickable && (f.paginationContainer[r]("click", "." + f.params.bulletClass, f.onClickIndex), f.params.a11y && f.a11y && f.paginationContainer[r]("keydown", "." + f.params.bulletClass, f.a11y.onEnterKey));
                        (f.params.preventClicks || f.params.preventClicksPropagation) && i[t]("click", f.preventClicks, !0)
                    };
                    f.attachEvents = function () {
                        f.initEvents()
                    };
                    f.detachEvents = function () {
                        f.initEvents(!0)
                    };
                    f.allowClick = !0;
                    f.preventClicks = function (n) {
                        f.allowClick || (f.params.preventClicks && n.preventDefault(), f.params.preventClicksPropagation && f.animating && (n.stopPropagation(), n.stopImmediatePropagation()))
                    };
                    f.onClickNext = function (n) {
                        (n.preventDefault(), !f.isEnd || f.params.loop) && f.slideNext()
                    };
                    f.onClickPrev = function (n) {
                        (n.preventDefault(), !f.isBeginning || f.params.loop) && f.slidePrev()
                    };
                    f.onClickIndex = function (t) {
                        t.preventDefault();
                        var i = n(this).index() * f.params.slidesPerGroup;
                        f.params.loop && (i = i + f.loopedSlides);
                        f.slideTo(i)
                    };
                    f.updateClickedSlide = function (t) {
                        var r = st(t, "." + f.params.slideClass), o = !1, u, i, e;
                        if (r) for (u = 0; u < f.slides.length; u++) f.slides[u] === r && (o = !0);
                        if (r && o) f.clickedSlide = r, f.clickedIndex = n(r).index(); else {
                            f.clickedSlide = undefined;
                            f.clickedIndex = undefined;
                            return
                        }
                        if (f.params.slideToClickedSlide && f.clickedIndex !== undefined && f.clickedIndex !== f.activeIndex) if (i = f.clickedIndex, f.params.loop) {
                            if (f.animating) return;
                            e = n(f.clickedSlide).attr("data-swiper-slide-index");
                            f.params.centeredSlides ? i < f.loopedSlides - f.params.slidesPerView / 2 || i > f.slides.length - f.loopedSlides + f.params.slidesPerView / 2 ? (f.fixLoop(), i = f.wrapper.children("." + f.params.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function () {
                                f.slideTo(i)
                            }, 0)) : f.slideTo(i) : i > f.slides.length - f.params.slidesPerView ? (f.fixLoop(), i = f.wrapper.children("." + f.params.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function () {
                                f.slideTo(i)
                            }, 0)) : f.slideTo(i)
                        } else f.slideTo(i)
                    };
                    var c, l, g, nt, w, e, s, tt, ht = "input, select, textarea, button", ct = Date.now(), b, a = [],
                        it;
                    if (f.animating = !1, f.touches = {
                            startX: 0,
                            startY: 0,
                            currentX: 0,
                            currentY: 0,
                            diff: 0
                        }, f.onTouchStart = function (t) {
                            var i, u, r;
                            if (t.originalEvent && (t = t.originalEvent), rt = t.type === "touchstart", rt || !("which" in t) || t.which !== 3) {
                                if (f.params.noSwiping && st(t, "." + f.params.noSwipingClass)) {
                                    f.allowClick = !0;
                                    return
                                }
                                (!f.params.swipeHandler || st(t, f.params.swipeHandler)) && ((i = f.touches.currentX = t.type === "touchstart" ? t.targetTouches[0].pageX : t.pageX, u = f.touches.currentY = t.type === "touchstart" ? t.targetTouches[0].pageY : t.pageY, f.device.ios && f.params.iOSEdgeSwipeDetection && i <= f.params.iOSEdgeSwipeThreshold) || (c = !0, l = !1, g = !0, w = undefined, ut = undefined, f.touches.startX = i, f.touches.startY = u, nt = Date.now(), f.allowClick = !0, f.updateContainerSize(), f.swipeDirection = undefined, f.params.threshold > 0 && (tt = !1), t.type !== "touchstart" && (r = !0, n(t.target).is(ht) && (r = !1), document.activeElement && n(document.activeElement).is(ht) && document.activeElement.blur(), r && t.preventDefault()), f.emit("onTouchStart", f, t)))
                            }
                        }, f.onTouchMove = function (t) {
                            var o, i, r;
                            if (t.originalEvent && (t = t.originalEvent), !rt || t.type !== "mousemove") {
                                if (t.preventedByNestedSwiper) {
                                    f.touches.startX = t.type === "touchmove" ? t.targetTouches[0].pageX : t.pageX;
                                    f.touches.startY = t.type === "touchmove" ? t.targetTouches[0].pageY : t.pageY;
                                    return
                                }
                                if (f.params.onlyExternal) {
                                    f.allowClick = !1;
                                    c && (f.touches.startX = f.touches.currentX = t.type === "touchmove" ? t.targetTouches[0].pageX : t.pageX, f.touches.startY = f.touches.currentY = t.type === "touchmove" ? t.targetTouches[0].pageY : t.pageY, nt = Date.now());
                                    return
                                }
                                if (rt && document.activeElement && t.target === document.activeElement && n(t.target).is(ht)) {
                                    l = !0;
                                    f.allowClick = !1;
                                    return
                                }
                                if ((g && f.emit("onTouchMove", f, t), !t.targetTouches || !(t.targetTouches.length > 1)) && (f.touches.currentX = t.type === "touchmove" ? t.targetTouches[0].pageX : t.pageX, f.touches.currentY = t.type === "touchmove" ? t.targetTouches[0].pageY : t.pageY, typeof w == "undefined" && (o = Math.atan2(Math.abs(f.touches.currentY - f.touches.startY), Math.abs(f.touches.currentX - f.touches.startX)) * 180 / Math.PI, w = f.isHorizontal() ? o > f.params.touchAngle : 90 - o > f.params.touchAngle), w && f.emit("onTouchMoveOpposite", f, t), typeof ut == "undefined" && f.browser.ieTouch && (f.touches.currentX !== f.touches.startX || f.touches.currentY !== f.touches.startY) && (ut = !0), c)) {
                                    if (w) {
                                        c = !1;
                                        return
                                    }
                                    if ((ut || !f.browser.ieTouch) && (f.allowClick = !1, f.emit("onSliderMove", f, t), t.preventDefault(), f.params.touchMoveStopPropagation && !f.params.nested && t.stopPropagation(), l || (u.loop && f.fixLoop(), s = f.getWrapperTranslate(), f.setWrapperTransition(0), f.animating && f.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"), f.params.autoplay && f.autoplaying && (f.params.autoplayDisableOnInteraction ? f.stopAutoplay() : f.pauseAutoplay()), it = !1, f.params.grabCursor && (f.container[0].style.cursor = "move", f.container[0].style.cursor = "-webkit-grabbing", f.container[0].style.cursor = "-moz-grabbin", f.container[0].style.cursor = "grabbing")), l = !0, i = f.touches.diff = f.isHorizontal() ? f.touches.currentX - f.touches.startX : f.touches.currentY - f.touches.startY, i = i * f.params.touchRatio, f.rtl && (i = -i), f.swipeDirection = i > 0 ? "prev" : "next", e = i + s, r = !0, i > 0 && e > f.minTranslate() ? (r = !1, f.params.resistance && (e = f.minTranslate() - 1 + Math.pow(-f.minTranslate() + s + i, f.params.resistanceRatio))) : i < 0 && e < f.maxTranslate() && (r = !1, f.params.resistance && (e = f.maxTranslate() + 1 - Math.pow(f.maxTranslate() - s - i, f.params.resistanceRatio))), r && (t.preventedByNestedSwiper = !0), !f.params.allowSwipeToNext && f.swipeDirection === "next" && e < s && (e = s), !f.params.allowSwipeToPrev && f.swipeDirection === "prev" && e > s && (e = s), f.params.followFinger)) {
                                        if (f.params.threshold > 0) if (Math.abs(i) > f.params.threshold || tt) {
                                            if (!tt) {
                                                tt = !0;
                                                f.touches.startX = f.touches.currentX;
                                                f.touches.startY = f.touches.currentY;
                                                e = s;
                                                f.touches.diff = f.isHorizontal() ? f.touches.currentX - f.touches.startX : f.touches.currentY - f.touches.startY;
                                                return
                                            }
                                        } else {
                                            e = s;
                                            return
                                        }
                                        (f.params.freeMode || f.params.watchSlidesProgress) && f.updateActiveIndex();
                                        f.params.freeMode && (a.length === 0 && a.push({
                                            position: f.touches[f.isHorizontal() ? "startX" : "startY"],
                                            time: nt
                                        }), a.push({
                                            position: f.touches[f.isHorizontal() ? "currentX" : "currentY"],
                                            time: (new window.Date).getTime()
                                        }));
                                        f.updateProgress(e);
                                        f.setWrapperTranslate(e)
                                    }
                                }
                            }
                        }, f.onTouchEnd = function (t) {
                            var w, v, o, d, tt, y, h, p, r, u, rt, ft;
                            if (t.originalEvent && (t = t.originalEvent), g && f.emit("onTouchEnd", f, t), g = !1, c) {
                                if (f.params.grabCursor && l && c && (f.container[0].style.cursor = "move", f.container[0].style.cursor = "-webkit-grab", f.container[0].style.cursor = "-moz-grab", f.container[0].style.cursor = "grab"), w = Date.now(), v = w - nt, f.allowClick && (f.updateClickedSlide(t), f.emit("onTap", f, t), v < 300 && w - ct > 300 && (b && clearTimeout(b), b = setTimeout(function () {
                                        f && (f.params.paginationHide && f.paginationContainer.length > 0 && !n(t.target).hasClass(f.params.bulletClass) && f.paginationContainer.toggleClass(f.params.paginationHiddenClass), f.emit("onClick", f, t))
                                    }, 300)), v < 300 && w - ct < 300 && (b && clearTimeout(b), f.emit("onDoubleTap", f, t))), ct = Date.now(), setTimeout(function () {
                                        f && (f.allowClick = !0)
                                    }, 0), !c || !l || !f.swipeDirection || f.touches.diff === 0 || e === s) {
                                    c = l = !1;
                                    return
                                }
                                if (c = l = !1, o = f.params.followFinger ? f.rtl ? f.translate : -f.translate : -e, f.params.freeMode) {
                                    if (o < -f.minTranslate()) {
                                        f.slideTo(f.activeIndex);
                                        return
                                    }
                                    if (o > -f.maxTranslate()) {
                                        f.slides.length < f.snapGrid.length ? f.slideTo(f.snapGrid.length - 1) : f.slideTo(f.slides.length - 1);
                                        return
                                    }
                                    if (f.params.freeModeMomentum) {
                                        if (a.length > 1) {
                                            var ut = a.pop(), et = a.pop(), st = ut.position - et.position,
                                                ot = ut.time - et.time;
                                            f.velocity = st / ot;
                                            f.velocity = f.velocity / 2;
                                            Math.abs(f.velocity) < f.params.freeModeMinimumVelocity && (f.velocity = 0);
                                            (ot > 150 || (new window.Date).getTime() - ut.time > 300) && (f.velocity = 0)
                                        } else f.velocity = 0;
                                        a.length = 0;
                                        var k = 1e3 * f.params.freeModeMomentumRatio, ht = f.velocity * k,
                                            i = f.translate + ht;
                                        if (f.rtl && (i = -i), d = !1, y = Math.abs(f.velocity) * 20 * f.params.freeModeMomentumBounceRatio, i < f.maxTranslate()) f.params.freeModeMomentumBounce ? (i + f.maxTranslate() < -y && (i = f.maxTranslate() - y), tt = f.maxTranslate(), d = !0, it = !0) : i = f.maxTranslate(); else if (i > f.minTranslate()) f.params.freeModeMomentumBounce ? (i - f.minTranslate() > y && (i = f.minTranslate() + y), tt = f.minTranslate(), d = !0, it = !0) : i = f.minTranslate(); else if (f.params.freeModeSticky) {
                                            for (h = 0, h = 0; h < f.snapGrid.length; h += 1) if (f.snapGrid[h] > -i) {
                                                p = h;
                                                break
                                            }
                                            i = Math.abs(f.snapGrid[p] - i) < Math.abs(f.snapGrid[p - 1] - i) || f.swipeDirection === "next" ? f.snapGrid[p] : f.snapGrid[p - 1];
                                            f.rtl || (i = -i)
                                        }
                                        if (f.velocity !== 0) k = f.rtl ? Math.abs((-i - f.translate) / f.velocity) : Math.abs((i - f.translate) / f.velocity); else if (f.params.freeModeSticky) {
                                            f.slideReset();
                                            return
                                        }
                                        f.params.freeModeMomentumBounce && d ? (f.updateProgress(tt), f.setWrapperTransition(k), f.setWrapperTranslate(i), f.onTransitionStart(), f.animating = !0, f.wrapper.transitionEnd(function () {
                                            f && it && (f.emit("onMomentumBounce", f), f.setWrapperTransition(f.params.speed), f.setWrapperTranslate(tt), f.wrapper.transitionEnd(function () {
                                                f && f.onTransitionEnd()
                                            }))
                                        })) : f.velocity ? (f.updateProgress(i), f.setWrapperTransition(k), f.setWrapperTranslate(i), f.onTransitionStart(), f.animating || (f.animating = !0, f.wrapper.transitionEnd(function () {
                                            f && f.onTransitionEnd()
                                        }))) : f.updateProgress(i);
                                        f.updateActiveIndex()
                                    }
                                    (!f.params.freeModeMomentum || v >= f.params.longSwipesMs) && (f.updateProgress(), f.updateActiveIndex());
                                    return
                                }
                                for (u = 0, rt = f.slidesSizesGrid[0], r = 0; r < f.slidesGrid.length; r += f.params.slidesPerGroup) typeof f.slidesGrid[r + f.params.slidesPerGroup] != "undefined" ? o >= f.slidesGrid[r] && o < f.slidesGrid[r + f.params.slidesPerGroup] && (u = r, rt = f.slidesGrid[r + f.params.slidesPerGroup] - f.slidesGrid[r]) : o >= f.slidesGrid[r] && (u = r, rt = f.slidesGrid[f.slidesGrid.length - 1] - f.slidesGrid[f.slidesGrid.length - 2]);
                                if (ft = (o - f.slidesGrid[u]) / rt, v > f.params.longSwipesMs) {
                                    if (!f.params.longSwipes) {
                                        f.slideTo(f.activeIndex);
                                        return
                                    }
                                    f.swipeDirection === "next" && (ft >= f.params.longSwipesRatio ? f.slideTo(u + f.params.slidesPerGroup) : f.slideTo(u));
                                    f.swipeDirection === "prev" && (ft > 1 - f.params.longSwipesRatio ? f.slideTo(u + f.params.slidesPerGroup) : f.slideTo(u))
                                } else {
                                    if (!f.params.shortSwipes) {
                                        f.slideTo(f.activeIndex);
                                        return
                                    }
                                    f.swipeDirection === "next" && f.slideTo(u + f.params.slidesPerGroup);
                                    f.swipeDirection === "prev" && f.slideTo(u)
                                }
                            }
                        }, f._slideTo = function (n, t) {
                            return f.slideTo(n, t, !0, !0)
                        }, f.slideTo = function (n, t, i, r) {
                            var u, e;
                            for (typeof i == "undefined" && (i = !0), typeof n == "undefined" && (n = 0), n < 0 && (n = 0), f.snapIndex = Math.floor(n / f.params.slidesPerGroup), f.snapIndex >= f.snapGrid.length && (f.snapIndex = f.snapGrid.length - 1), u = -f.snapGrid[f.snapIndex], f.params.autoplay && f.autoplaying && (r || !f.params.autoplayDisableOnInteraction ? f.pauseAutoplay(t) : f.stopAutoplay()), f.updateProgress(u), e = 0; e < f.slidesGrid.length; e++) -Math.floor(u * 100) >= Math.floor(f.slidesGrid[e] * 100) && (n = e);
                            if (!f.params.allowSwipeToNext && u < f.translate && u < f.minTranslate() || !f.params.allowSwipeToPrev && u > f.translate && u > f.maxTranslate() && (f.activeIndex || 0) !== n) return !1;
                            if (typeof t == "undefined" && (t = f.params.speed), f.previousIndex = f.activeIndex || 0, f.activeIndex = n, f.rtl && -u === f.translate || !f.rtl && u === f.translate) return f.params.autoHeight && f.updateAutoHeight(), f.updateClasses(), f.params.effect !== "slide" && f.setWrapperTranslate(u), !1;
                            f.updateClasses();
                            f.onTransitionStart(i);
                            if (t === 0) {
                                f.setWrapperTranslate(u);
                                f.setWrapperTransition(0);
                                f.onTransitionEnd(i)
                            } else f.setWrapperTranslate(u), f.setWrapperTransition(t), f.animating || (f.animating = !0, f.wrapper.transitionEnd(function () {
                                if (f) f.onTransitionEnd(i)
                            }));
                            return !0
                        }, f.onTransitionStart = function (n) {
                            typeof n == "undefined" && (n = !0);
                            f.params.autoHeight && f.updateAutoHeight();
                            f.lazy && f.lazy.onTransitionStart();
                            n && (f.emit("onTransitionStart", f), f.activeIndex !== f.previousIndex && (f.emit("onSlideChangeStart", f), f.activeIndex > f.previousIndex ? f.emit("onSlideNextStart", f) : f.emit("onSlidePrevStart", f)))
                        }, f.onTransitionEnd = function (n) {
                            f.animating = !1;
                            f.setWrapperTransition(0);
                            typeof n == "undefined" && (n = !0);
                            f.lazy && f.lazy.onTransitionEnd();
                            n && (f.emit("onTransitionEnd", f), f.activeIndex !== f.previousIndex && (f.emit("onSlideChangeEnd", f), f.activeIndex > f.previousIndex ? f.emit("onSlideNextEnd", f) : f.emit("onSlidePrevEnd", f)));
                            f.params.hashnav && f.hashnav && f.hashnav.setHash()
                        }, f.slideNext = function (n, t, i) {
                            if (f.params.loop) {
                                if (f.animating) return !1;
                                f.fixLoop();
                                var r = f.container[0].clientLeft;
                                return f.slideTo(f.activeIndex + f.params.slidesPerGroup, t, n, i)
                            }
                            return f.slideTo(f.activeIndex + f.params.slidesPerGroup, t, n, i)
                        }, f._slideNext = function (n) {
                            return f.slideNext(!0, n, !0)
                        }, f.slidePrev = function (n, t, i) {
                            if (f.params.loop) {
                                if (f.animating) return !1;
                                f.fixLoop();
                                var r = f.container[0].clientLeft;
                                return f.slideTo(f.activeIndex - 1, t, n, i)
                            }
                            return f.slideTo(f.activeIndex - 1, t, n, i)
                        }, f._slidePrev = function (n) {
                            return f.slidePrev(!0, n, !0)
                        }, f.slideReset = function (n, t) {
                            return f.slideTo(f.activeIndex, t, n)
                        }, f.setWrapperTransition = function (n, t) {
                            f.wrapper.transition(n);
                            f.params.effect !== "slide" && f.effects[f.params.effect] && f.effects[f.params.effect].setTransition(n);
                            f.params.parallax && f.parallax && f.parallax.setTransition(n);
                            f.params.scrollbar && f.scrollbar && f.scrollbar.setTransition(n);
                            f.params.control && f.controller && f.controller.setTransition(n, t);
                            f.emit("onSetTransition", f, n)
                        }, f.setWrapperTranslate = function (n, t, i) {
                            var r = 0, u = 0, o, e;
                            f.isHorizontal() ? r = f.rtl ? -n : n : u = n;
                            f.params.roundLengths && (r = d(r), u = d(u));
                            f.params.virtualTranslate || (f.support.transforms3d ? f.wrapper.transform("translate3d(" + r + "px, " + u + "px, 0px)") : f.wrapper.transform("translate(" + r + "px, " + u + "px)"));
                            f.translate = f.isHorizontal() ? r : u;
                            e = f.maxTranslate() - f.minTranslate();
                            o = e === 0 ? 0 : (n - f.minTranslate()) / e;
                            o !== f.progress && f.updateProgress(n);
                            t && f.updateActiveIndex();
                            f.params.effect !== "slide" && f.effects[f.params.effect] && f.effects[f.params.effect].setTranslate(f.translate);
                            f.params.parallax && f.parallax && f.parallax.setTranslate(f.translate);
                            f.params.scrollbar && f.scrollbar && f.scrollbar.setTranslate(f.translate);
                            f.params.control && f.controller && f.controller.setTranslate(f.translate, i);
                            f.emit("onSetTranslate", f, f.translate)
                        }, f.getTranslate = function (n, t) {
                            var u, i, r, e;
                            return (typeof t == "undefined" && (t = "x"), f.params.virtualTranslate) ? f.rtl ? -f.translate : f.translate : (r = window.getComputedStyle(n, null), window.WebKitCSSMatrix ? (i = r.transform || r.webkitTransform, i.split(",").length > 6 && (i = i.split(", ").map(function (n) {
                                return n.replace(",", ".")
                            }).join(", ")), e = new window.WebKitCSSMatrix(i === "none" ? "" : i)) : (e = r.MozTransform || r.OTransform || r.MsTransform || r.msTransform || r.transform || r.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), u = e.toString().split(",")), t === "x" && (i = window.WebKitCSSMatrix ? e.m41 : u.length === 16 ? parseFloat(u[12]) : parseFloat(u[4])), t === "y" && (i = window.WebKitCSSMatrix ? e.m42 : u.length === 16 ? parseFloat(u[13]) : parseFloat(u[5])), f.rtl && i && (i = -i), i || 0)
                        }, f.getWrapperTranslate = function (n) {
                            return typeof n == "undefined" && (n = f.isHorizontal() ? "x" : "y"), f.getTranslate(f.wrapper[0], n)
                        }, f.observers = [], f.initObservers = function () {
                            var t, n;
                            if (f.params.observeParents) for (t = f.container.parents(), n = 0; n < t.length; n++) lt(t[n]);
                            lt(f.container[0], {childList: !1});
                            lt(f.wrapper[0], {attributes: !1})
                        }, f.disconnectObservers = function () {
                            for (var n = 0; n < f.observers.length; n++) f.observers[n].disconnect();
                            f.observers = []
                        }, f.createLoop = function () {
                            var i, r, u, t;
                            for (f.wrapper.children("." + f.params.slideClass + "." + f.params.slideDuplicateClass).remove(), i = f.wrapper.children("." + f.params.slideClass), f.params.slidesPerView !== "auto" || f.params.loopedSlides || (f.params.loopedSlides = i.length), f.loopedSlides = parseInt(f.params.loopedSlides || f.params.slidesPerView, 10), f.loopedSlides = f.loopedSlides + f.params.loopAdditionalSlides, f.loopedSlides > i.length && (f.loopedSlides = i.length), r = [], u = [], i.each(function (t, e) {
                                var o = n(this);
                                t < f.loopedSlides && u.push(e);
                                t < i.length && t >= i.length - f.loopedSlides && r.push(e);
                                o.attr("data-swiper-slide-index", t)
                            }), t = 0; t < u.length; t++) f.wrapper.append(n(u[t].cloneNode(!0)).addClass(f.params.slideDuplicateClass));
                            for (t = r.length - 1; t >= 0; t--) f.wrapper.prepend(n(r[t].cloneNode(!0)).addClass(f.params.slideDuplicateClass))
                        }, f.destroyLoop = function () {
                            f.wrapper.children("." + f.params.slideClass + "." + f.params.slideDuplicateClass).remove();
                            f.slides.removeAttr("data-swiper-slide-index")
                        }, f.reLoop = function (n) {
                            var t = f.activeIndex - f.loopedSlides;
                            f.destroyLoop();
                            f.createLoop();
                            f.updateSlidesSize();
                            n && f.slideTo(t + f.loopedSlides, 0, !1)
                        }, f.fixLoop = function () {
                            var n;
                            f.activeIndex < f.loopedSlides ? (n = f.slides.length - f.loopedSlides * 3 + f.activeIndex, n = n + f.loopedSlides, f.slideTo(n, 0, !1, !0)) : (f.params.slidesPerView === "auto" && f.activeIndex >= f.loopedSlides * 2 || f.activeIndex > f.slides.length - f.params.slidesPerView * 2) && (n = -f.slides.length + f.activeIndex + f.loopedSlides, n = n + f.loopedSlides, f.slideTo(n, 0, !1, !0))
                        }, f.appendSlide = function (n) {
                            if (f.params.loop && f.destroyLoop(), typeof n == "object" && n.length) for (var t = 0; t < n.length; t++) n[t] && f.wrapper.append(n[t]); else f.wrapper.append(n);
                            f.params.loop && f.createLoop();
                            f.params.observer && f.support.observer || f.update(!0)
                        }, f.prependSlide = function (n) {
                            var i, t;
                            if (f.params.loop && f.destroyLoop(), i = f.activeIndex + 1, typeof n == "object" && n.length) {
                                for (t = 0; t < n.length; t++) n[t] && f.wrapper.prepend(n[t]);
                                i = f.activeIndex + n.length
                            } else f.wrapper.prepend(n);
                            f.params.loop && f.createLoop();
                            f.params.observer && f.support.observer || f.update(!0);
                            f.slideTo(i, 0, !1)
                        }, f.removeSlide = function (n) {
                            var t, i, r;
                            if (f.params.loop && (f.destroyLoop(), f.slides = f.wrapper.children("." + f.params.slideClass)), t = f.activeIndex, typeof n == "object" && n.length) {
                                for (r = 0; r < n.length; r++) i = n[r], f.slides[i] && f.slides.eq(i).remove(), i < t && t--;
                                t = Math.max(t, 0)
                            } else i = n, f.slides[i] && f.slides.eq(i).remove(), i < t && t--, t = Math.max(t, 0);
                            f.params.loop && f.createLoop();
                            f.params.observer && f.support.observer || f.update(!0);
                            f.params.loop ? f.slideTo(t + f.loopedSlides, 0, !1) : f.slideTo(t, 0, !1)
                        }, f.removeAllSlides = function () {
                            for (var t = [], n = 0; n < f.slides.length; n++) t.push(n);
                            f.removeSlide(t)
                        }, f.effects = {
                            fade: {
                                setTranslate: function () {
                                    for (var r, u, t = 0; t < f.slides.length; t++) {
                                        var i = f.slides.eq(t), e = i[0].swiperSlideOffset, n = -e;
                                        f.params.virtualTranslate || (n = n - f.translate);
                                        r = 0;
                                        f.isHorizontal() || (r = n, n = 0);
                                        u = f.params.fade.crossFade ? Math.max(1 - Math.abs(i[0].progress), 0) : 1 + Math.min(Math.max(i[0].progress, -1), 0);
                                        i.css({opacity: u}).transform("translate3d(" + n + "px, " + r + "px, 0px)")
                                    }
                                }, setTransition: function (n) {
                                    if (f.slides.transition(n), f.params.virtualTranslate && n !== 0) {
                                        var t = !1;
                                        f.slides.transitionEnd(function () {
                                            var i, n;
                                            if (!t && f) for (t = !0, f.animating = !1, i = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], n = 0; n < i.length; n++) f.wrapper.trigger(i[n])
                                        })
                                    }
                                }
                            }, flip: {
                                setTranslate: function () {
                                    for (var t, i, r, u, o = 0; o < f.slides.length; o++) {
                                        t = f.slides.eq(o);
                                        i = t[0].progress;
                                        f.params.flip.limitRotation && (i = Math.max(Math.min(t[0].progress, 1), -1));
                                        var l = t[0].swiperSlideOffset, a = -180 * i, e = a, h = 0, s = -l, c = 0;
                                        f.isHorizontal() ? f.rtl && (e = -e) : (c = s, s = 0, h = -e, e = 0);
                                        t[0].style.zIndex = -Math.abs(Math.round(i)) + f.slides.length;
                                        f.params.flip.slideShadows && (r = f.isHorizontal() ? t.find(".swiper-slide-shadow-left") : t.find(".swiper-slide-shadow-top"), u = f.isHorizontal() ? t.find(".swiper-slide-shadow-right") : t.find(".swiper-slide-shadow-bottom"), r.length === 0 && (r = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "left" : "top") + '"><\/div>'), t.append(r)), u.length === 0 && (u = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "right" : "bottom") + '"><\/div>'), t.append(u)), r.length && (r[0].style.opacity = Math.max(-i, 0)), u.length && (u[0].style.opacity = Math.max(i, 0)));
                                        t.transform("translate3d(" + s + "px, " + c + "px, 0px) rotateX(" + h + "deg) rotateY(" + e + "deg)")
                                    }
                                }, setTransition: function (t) {
                                    if (f.slides.transition(t).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(t), f.params.virtualTranslate && t !== 0) {
                                        var i = !1;
                                        f.slides.eq(f.activeIndex).transitionEnd(function () {
                                            var r, t;
                                            if (!i && f && n(this).hasClass(f.params.slideActiveClass)) for (i = !0, f.animating = !1, r = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], t = 0; t < r.length; t++) f.wrapper.trigger(r[t])
                                        })
                                    }
                                }
                            }, cube: {
                                setTranslate: function () {
                                    var e = 0, t, i, y, h, c, b;
                                    for (f.params.cube.shadow && (f.isHorizontal() ? (t = f.wrapper.find(".swiper-cube-shadow"), t.length === 0 && (t = n('<div class="swiper-cube-shadow"><\/div>'), f.wrapper.append(t)), t.css({height: f.width + "px"})) : (t = f.container.find(".swiper-cube-shadow"), t.length === 0 && (t = n('<div class="swiper-cube-shadow"><\/div>'), f.container.append(t)))), i = 0; i < f.slides.length; i++) {
                                        var u = f.slides.eq(i), o = i * 90, l = Math.floor(o / 360);
                                        f.rtl && (o = -o, l = Math.floor(-o / 360));
                                        var s = Math.max(Math.min(u[0].progress, 1), -1), r = 0, v = 0, a = 0;
                                        i % 4 == 0 ? (r = -l * 4 * f.size, a = 0) : (i - 1) % 4 == 0 ? (r = 0, a = -l * 4 * f.size) : (i - 2) % 4 == 0 ? (r = f.size + l * 4 * f.size, a = f.size) : (i - 3) % 4 == 0 && (r = -f.size, a = 3 * f.size + f.size * 4 * l);
                                        f.rtl && (r = -r);
                                        f.isHorizontal() || (v = r, r = 0);
                                        y = "rotateX(" + (f.isHorizontal() ? 0 : -o) + "deg) rotateY(" + (f.isHorizontal() ? o : 0) + "deg) translate3d(" + r + "px, " + v + "px, " + a + "px)";
                                        s <= 1 && s > -1 && (e = i * 90 + s * 90, f.rtl && (e = -i * 90 - s * 90));
                                        u.transform(y);
                                        f.params.cube.slideShadows && (h = f.isHorizontal() ? u.find(".swiper-slide-shadow-left") : u.find(".swiper-slide-shadow-top"), c = f.isHorizontal() ? u.find(".swiper-slide-shadow-right") : u.find(".swiper-slide-shadow-bottom"), h.length === 0 && (h = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "left" : "top") + '"><\/div>'), u.append(h)), c.length === 0 && (c = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "right" : "bottom") + '"><\/div>'), u.append(c)), h.length && (h[0].style.opacity = Math.max(-s, 0)), c.length && (c[0].style.opacity = Math.max(s, 0)))
                                    }
                                    if (f.wrapper.css({
                                            "-webkit-transform-origin": "50% 50% -" + f.size / 2 + "px",
                                            "-moz-transform-origin": "50% 50% -" + f.size / 2 + "px",
                                            "-ms-transform-origin": "50% 50% -" + f.size / 2 + "px",
                                            "transform-origin": "50% 50% -" + f.size / 2 + "px"
                                        }), f.params.cube.shadow) if (f.isHorizontal()) t.transform("translate3d(0px, " + (f.width / 2 + f.params.cube.shadowOffset) + "px, " + -f.width / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + f.params.cube.shadowScale + ")"); else {
                                        var p = Math.abs(e) - Math.floor(Math.abs(e) / 90) * 90,
                                            k = 1.5 - (Math.sin(p * 2 * Math.PI / 360) / 2 + Math.cos(p * 2 * Math.PI / 360) / 2),
                                            d = f.params.cube.shadowScale, w = f.params.cube.shadowScale / k,
                                            g = f.params.cube.shadowOffset;
                                        t.transform("scale3d(" + d + ", 1, " + w + ") translate3d(0px, " + (f.height / 2 + g) + "px, " + -f.height / 2 / w + "px) rotateX(-90deg)")
                                    }
                                    b = f.isSafari || f.isUiWebView ? -f.size / 2 : 0;
                                    f.wrapper.transform("translate3d(0px,0," + b + "px) rotateX(" + (f.isHorizontal() ? 0 : e) + "deg) rotateY(" + (f.isHorizontal() ? -e : 0) + "deg)")
                                }, setTransition: function (n) {
                                    f.slides.transition(n).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(n);
                                    f.params.cube.shadow && !f.isHorizontal() && f.container.find(".swiper-cube-shadow").transition(n)
                                }
                            }, coverflow: {
                                setTranslate: function () {
                                    for (var w, r, u, b, a = f.translate, v = f.isHorizontal() ? -a + f.width / 2 : -a + f.height / 2, y = f.isHorizontal() ? f.params.coverflow.rotate : -f.params.coverflow.rotate, k = f.params.coverflow.depth, e = 0, d = f.slides.length; e < d; e++) {
                                        var i = f.slides.eq(e), p = f.slidesSizesGrid[e], g = i[0].swiperSlideOffset,
                                            t = (v - g - p / 2) / p * f.params.coverflow.modifier,
                                            o = f.isHorizontal() ? y * t : 0, s = f.isHorizontal() ? 0 : y * t,
                                            h = -k * Math.abs(t),
                                            c = f.isHorizontal() ? 0 : f.params.coverflow.stretch * t,
                                            l = f.isHorizontal() ? f.params.coverflow.stretch * t : 0;
                                        Math.abs(l) < .001 && (l = 0);
                                        Math.abs(c) < .001 && (c = 0);
                                        Math.abs(h) < .001 && (h = 0);
                                        Math.abs(o) < .001 && (o = 0);
                                        Math.abs(s) < .001 && (s = 0);
                                        w = "translate3d(" + l + "px," + c + "px," + h + "px)  rotateX(" + s + "deg) rotateY(" + o + "deg)";
                                        i.transform(w);
                                        i[0].style.zIndex = -Math.abs(Math.round(t)) + 1;
                                        f.params.coverflow.slideShadows && (r = f.isHorizontal() ? i.find(".swiper-slide-shadow-left") : i.find(".swiper-slide-shadow-top"), u = f.isHorizontal() ? i.find(".swiper-slide-shadow-right") : i.find(".swiper-slide-shadow-bottom"), r.length === 0 && (r = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "left" : "top") + '"><\/div>'), i.append(r)), u.length === 0 && (u = n('<div class="swiper-slide-shadow-' + (f.isHorizontal() ? "right" : "bottom") + '"><\/div>'), i.append(u)), r.length && (r[0].style.opacity = t > 0 ? t : 0), u.length && (u[0].style.opacity = -t > 0 ? -t : 0))
                                    }
                                    f.browser.ie && (b = f.wrapper[0].style, b.perspectiveOrigin = v + "px 50%")
                                }, setTransition: function (n) {
                                    f.slides.transition(n).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(n)
                                }
                            }
                        }, f.lazy = {
                            initialImageLoaded: !1, loadImageInSlide: function (t, i) {
                                if (typeof t != "undefined" && (typeof i == "undefined" && (i = !0), f.slides.length !== 0)) {
                                    var r = f.slides.eq(t),
                                        u = r.find(".swiper-lazy:not(.swiper-lazy-loaded):not(.swiper-lazy-loading)");
                                    (!r.hasClass("swiper-lazy") || r.hasClass("swiper-lazy-loaded") || r.hasClass("swiper-lazy-loading") || (u = u.add(r[0])), u.length !== 0) && u.each(function () {
                                        var t = n(this);
                                        t.addClass("swiper-lazy-loading");
                                        var u = t.attr("data-background"), e = t.attr("data-src"),
                                            o = t.attr("data-srcset");
                                        f.loadImage(t[0], e || u, o, !1, function () {
                                            var n, s, h;
                                            u ? (t.css("background-image", 'url("' + u + '")'), t.removeAttr("data-background")) : (o && (t.attr("srcset", o), t.removeAttr("data-srcset")), e && (t.attr("src", e), t.removeAttr("data-src")));
                                            t.addClass("swiper-lazy-loaded").removeClass("swiper-lazy-loading");
                                            r.find(".swiper-lazy-preloader, .preloader").remove();
                                            f.params.loop && i && (n = r.attr("data-swiper-slide-index"), r.hasClass(f.params.slideDuplicateClass) ? (s = f.wrapper.children('[data-swiper-slide-index="' + n + '"]:not(.' + f.params.slideDuplicateClass + ")"), f.lazy.loadImageInSlide(s.index(), !1)) : (h = f.wrapper.children("." + f.params.slideDuplicateClass + '[data-swiper-slide-index="' + n + '"]'), f.lazy.loadImageInSlide(h.index(), !1)));
                                            f.emit("onLazyImageReady", f, r[0], t[0])
                                        });
                                        f.emit("onLazyImageLoad", f, r[0], t[0])
                                    })
                                }
                            }, load: function () {
                                var t, r, u;
                                if (f.params.watchSlidesVisibility) f.wrapper.children("." + f.params.slideVisibleClass).each(function () {
                                    f.lazy.loadImageInSlide(n(this).index())
                                }); else if (f.params.slidesPerView > 1) for (t = f.activeIndex; t < f.activeIndex + f.params.slidesPerView; t++) f.slides[t] && f.lazy.loadImageInSlide(t); else f.lazy.loadImageInSlide(f.activeIndex);
                                if (f.params.lazyLoadingInPrevNext) if (f.params.slidesPerView > 1 || f.params.lazyLoadingInPrevNextAmount && f.params.lazyLoadingInPrevNextAmount > 1) {
                                    var e = f.params.lazyLoadingInPrevNextAmount, i = f.params.slidesPerView,
                                        o = Math.min(f.activeIndex + i + Math.max(e, i), f.slides.length),
                                        s = Math.max(f.activeIndex - Math.max(i, e), 0);
                                    for (t = f.activeIndex + f.params.slidesPerView; t < o; t++) f.slides[t] && f.lazy.loadImageInSlide(t);
                                    for (t = s; t < f.activeIndex; t++) f.slides[t] && f.lazy.loadImageInSlide(t)
                                } else r = f.wrapper.children("." + f.params.slideNextClass), r.length > 0 && f.lazy.loadImageInSlide(r.index()), u = f.wrapper.children("." + f.params.slidePrevClass), u.length > 0 && f.lazy.loadImageInSlide(u.index())
                            }, onTransitionStart: function () {
                                f.params.lazyLoading && (!f.params.lazyLoadingOnTransitionStart && (f.params.lazyLoadingOnTransitionStart || f.lazy.initialImageLoaded) || f.lazy.load())
                            }, onTransitionEnd: function () {
                                f.params.lazyLoading && !f.params.lazyLoadingOnTransitionStart && f.lazy.load()
                            }
                        }, f.scrollbar = {
                            isTouched: !1, setDragPosition: function (n) {
                                var i = f.scrollbar,
                                    e = f.isHorizontal() ? n.type === "touchstart" || n.type === "touchmove" ? n.targetTouches[0].pageX : n.pageX || n.clientX : n.type === "touchstart" || n.type === "touchmove" ? n.targetTouches[0].pageY : n.pageY || n.clientY,
                                    t = e - i.track.offset()[f.isHorizontal() ? "left" : "top"] - i.dragSize / 2,
                                    r = -f.minTranslate() * i.moveDivider, u = -f.maxTranslate() * i.moveDivider;
                                t < r ? t = r : t > u && (t = u);
                                t = -t / i.moveDivider;
                                f.updateProgress(t);
                                f.setWrapperTranslate(t, !0)
                            }, dragStart: function (n) {
                                var t = f.scrollbar;
                                t.isTouched = !0;
                                n.preventDefault();
                                n.stopPropagation();
                                t.setDragPosition(n);
                                clearTimeout(t.dragTimeout);
                                t.track.transition(0);
                                f.params.scrollbarHide && t.track.css("opacity", 1);
                                f.wrapper.transition(100);
                                t.drag.transition(100);
                                f.emit("onScrollbarDragStart", f)
                            }, dragMove: function (n) {
                                var t = f.scrollbar;
                                t.isTouched && (n.preventDefault ? n.preventDefault() : n.returnValue = !1, t.setDragPosition(n), f.wrapper.transition(0), t.track.transition(0), t.drag.transition(0), f.emit("onScrollbarDragMove", f))
                            }, dragEnd: function () {
                                var n = f.scrollbar;
                                n.isTouched && (n.isTouched = !1, f.params.scrollbarHide && (clearTimeout(n.dragTimeout), n.dragTimeout = setTimeout(function () {
                                    n.track.css("opacity", 0);
                                    n.track.transition(400)
                                }, 1e3)), f.emit("onScrollbarDragEnd", f), f.params.scrollbarSnapOnRelease && f.slideReset())
                            }, enableDraggable: function () {
                                var t = f.scrollbar, i = f.support.touch ? t.track : document;
                                n(t.track).on(f.touchEvents.start, t.dragStart);
                                n(i).on(f.touchEvents.move, t.dragMove);
                                n(i).on(f.touchEvents.end, t.dragEnd)
                            }, disableDraggable: function () {
                                var t = f.scrollbar, i = f.support.touch ? t.track : document;
                                n(t.track).off(f.touchEvents.start, t.dragStart);
                                n(i).off(f.touchEvents.move, t.dragMove);
                                n(i).off(f.touchEvents.end, t.dragEnd)
                            }, set: function () {
                                if (f.params.scrollbar) {
                                    var t = f.scrollbar;
                                    t.track = n(f.params.scrollbar);
                                    f.params.uniqueNavElements && typeof f.params.scrollbar == "string" && t.track.length > 1 && f.container.find(f.params.scrollbar).length === 1 && (t.track = f.container.find(f.params.scrollbar));
                                    t.drag = t.track.find(".swiper-scrollbar-drag");
                                    t.drag.length === 0 && (t.drag = n('<div class="swiper-scrollbar-drag"><\/div>'), t.track.append(t.drag));
                                    t.drag[0].style.width = "";
                                    t.drag[0].style.height = "";
                                    t.trackSize = f.isHorizontal() ? t.track[0].offsetWidth : t.track[0].offsetHeight;
                                    t.divider = f.size / f.virtualSize;
                                    t.moveDivider = t.divider * (t.trackSize / f.size);
                                    t.dragSize = t.trackSize * t.divider;
                                    f.isHorizontal() ? t.drag[0].style.width = t.dragSize + "px" : t.drag[0].style.height = t.dragSize + "px";
                                    t.track[0].style.display = t.divider >= 1 ? "none" : "";
                                    f.params.scrollbarHide && (t.track[0].style.opacity = 0)
                                }
                            }, setTranslate: function () {
                                if (f.params.scrollbar) {
                                    var n = f.scrollbar, r = f.translate || 0, t, i = n.dragSize;
                                    t = (n.trackSize - n.dragSize) * f.progress;
                                    f.rtl && f.isHorizontal() ? (t = -t, t > 0 ? (i = n.dragSize - t, t = 0) : -t + n.dragSize > n.trackSize && (i = n.trackSize + t)) : t < 0 ? (i = n.dragSize + t, t = 0) : t + n.dragSize > n.trackSize && (i = n.trackSize - t);
                                    f.isHorizontal() ? (f.support.transforms3d ? n.drag.transform("translate3d(" + t + "px, 0, 0)") : n.drag.transform("translateX(" + t + "px)"), n.drag[0].style.width = i + "px") : (f.support.transforms3d ? n.drag.transform("translate3d(0px, " + t + "px, 0)") : n.drag.transform("translateY(" + t + "px)"), n.drag[0].style.height = i + "px");
                                    f.params.scrollbarHide && (clearTimeout(n.timeout), n.track[0].style.opacity = 1, n.timeout = setTimeout(function () {
                                        n.track[0].style.opacity = 0;
                                        n.track.transition(400)
                                    }, 1e3))
                                }
                            }, setTransition: function (n) {
                                f.params.scrollbar && f.scrollbar.drag.transition(n)
                            }
                        }, f.controller = {
                            LinearSpline: function (n, t) {
                                var i, r, f, u;
                                this.x = n;
                                this.y = t;
                                this.lastIndex = n.length - 1;
                                f = this.x.length;
                                this.interpolate = function (n) {
                                    return n ? (r = u(this.x, n), i = r - 1, (n - this.x[i]) * (this.y[r] - this.y[i]) / (this.x[r] - this.x[i]) + this.y[i]) : 0
                                };
                                u = function () {
                                    var n, t, i;
                                    return function (r, u) {
                                        for (t = -1, n = r.length; n - t > 1;) r[i = n + t >> 1] <= u ? t = i : n = i;
                                        return n
                                    }
                                }()
                            }, getInterpolateFunction: function (n) {
                                f.controller.spline || (f.controller.spline = f.params.loop ? new f.controller.LinearSpline(f.slidesGrid, n.slidesGrid) : new f.controller.LinearSpline(f.snapGrid, n.snapGrid))
                            }, setTranslate: function (n, i) {
                                function s(t) {
                                    n = t.rtl && t.params.direction === "horizontal" ? -f.translate : f.translate;
                                    f.params.controlBy === "slide" && (f.controller.getInterpolateFunction(t), u = -f.controller.spline.interpolate(-n));
                                    u && f.params.controlBy !== "container" || (o = (t.maxTranslate() - t.minTranslate()) / (f.maxTranslate() - f.minTranslate()), u = (n - f.minTranslate()) * o + t.minTranslate());
                                    f.params.controlInverse && (u = t.maxTranslate() - u);
                                    t.updateProgress(u);
                                    t.setWrapperTranslate(u, !1, f);
                                    t.updateActiveIndex()
                                }

                                var r = f.params.control, o, u, e;
                                if (f.isArray(r)) for (e = 0; e < r.length; e++) r[e] !== i && r[e] instanceof t && s(r[e]); else r instanceof t && i !== r && s(r)
                            }, setTransition: function (n, i) {
                                function e(t) {
                                    t.setWrapperTransition(n, f);
                                    n !== 0 && (t.onTransitionStart(), t.wrapper.transitionEnd(function () {
                                        r && (t.params.loop && f.params.controlBy === "slide" && t.fixLoop(), t.onTransitionEnd())
                                    }))
                                }

                                var r = f.params.control, u;
                                if (f.isArray(r)) for (u = 0; u < r.length; u++) r[u] !== i && r[u] instanceof t && e(r[u]); else r instanceof t && i !== r && e(r)
                            }
                        }, f.hashnav = {
                            init: function () {
                                var i, r, n, u, t, e, o;
                                if (f.params.hashnav && (f.hashnav.initialized = !0, i = document.location.hash.replace("#", ""), i)) for (r = 0, n = 0, u = f.slides.length; n < u; n++) t = f.slides.eq(n), e = t.attr("data-hash"), e !== i || t.hasClass(f.params.slideDuplicateClass) || (o = t.index(), f.slideTo(o, r, f.params.runCallbacksOnInit, !0))
                            }, setHash: function () {
                                f.hashnav.initialized && f.params.hashnav && (document.location.hash = f.slides.eq(f.activeIndex).attr("data-hash") || "")
                            }
                        }, f.disableKeyboardControl = function () {
                            f.params.keyboardControl = !1;
                            n(document).off("keydown", wt)
                        }, f.enableKeyboardControl = function () {
                            f.params.keyboardControl = !0;
                            n(document).on("keydown", wt)
                        }, f.mousewheel = {
                            event: !1,
                            lastScrollTime: (new window.Date).getTime()
                        }, f.params.mousewheelControl) {
                        try {
                            new window.WheelEvent("wheel");
                            f.mousewheel.event = "wheel"
                        } catch (dt) {
                            (window.WheelEvent || f.container[0] && "wheel" in f.container[0]) && (f.mousewheel.event = "wheel")
                        }
                        !f.mousewheel.event && window.WheelEvent;
                        f.mousewheel.event || document.onmousewheel === undefined || (f.mousewheel.event = "mousewheel");
                        f.mousewheel.event || (f.mousewheel.event = "DOMMouseScroll")
                    }
                    f.disableMousewheelControl = function () {
                        return f.mousewheel.event ? (f.container.off(f.mousewheel.event, bt), !0) : !1
                    };
                    f.enableMousewheelControl = function () {
                        if (!f.mousewheel.event) return !1;
                        f.container.on(f.mousewheel.event, bt);
                        return !0
                    };
                    f.parallax = {
                        setTranslate: function () {
                            f.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                                kt(this, f.progress)
                            });
                            f.slides.each(function () {
                                var t = n(this);
                                t.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                                    var n = Math.min(Math.max(t[0].progress, -1), 1);
                                    kt(this, n)
                                })
                            })
                        }, setTransition: function (t) {
                            typeof t == "undefined" && (t = f.params.speed);
                            f.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                                var i = n(this), r = parseInt(i.attr("data-swiper-parallax-duration"), 10) || t;
                                t === 0 && (r = 0);
                                i.transition(r)
                            })
                        }
                    };
                    f._plugins = [];
                    for (at in f.plugins) vt = f.plugins[at](f, f.params[at]), vt && f._plugins.push(vt);
                    return f.callPlugins = function (n) {
                        for (var t = 0; t < f._plugins.length; t++) n in f._plugins[t] && f._plugins[t][n](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
                    }, f.emitterEventListeners = {}, f.emit = function (n) {
                        f.params[n] && f.params[n](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                        var t;
                        if (f.emitterEventListeners[n]) for (t = 0; t < f.emitterEventListeners[n].length; t++) f.emitterEventListeners[n][t](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                        f.callPlugins && f.callPlugins(n, arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
                    }, f.on = function (n, t) {
                        return n = yt(n), f.emitterEventListeners[n] || (f.emitterEventListeners[n] = []), f.emitterEventListeners[n].push(t), f
                    }, f.off = function (n, t) {
                        var i;
                        if (n = yt(n), typeof t == "undefined") return f.emitterEventListeners[n] = [], f;
                        if (f.emitterEventListeners[n] && f.emitterEventListeners[n].length !== 0) {
                            for (i = 0; i < f.emitterEventListeners[n].length; i++) f.emitterEventListeners[n][i] === t && f.emitterEventListeners[n].splice(i, 1);
                            return f
                        }
                    }, f.once = function (n, t) {
                        n = yt(n);
                        var i = function () {
                            t(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]);
                            f.off(n, i)
                        };
                        f.on(n, i);
                        return f
                    }, f.a11y = {
                        makeFocusable: function (n) {
                            return n.attr("tabIndex", "0"), n
                        },
                        addRole: function (n, t) {
                            return n.attr("role", t), n
                        },
                        addLabel: function (n, t) {
                            return n.attr("aria-label", t), n
                        },
                        disable: function (n) {
                            return n.attr("aria-disabled", !0), n
                        },
                        enable: function (n) {
                            return n.attr("aria-disabled", !1), n
                        },
                        onEnterKey: function (t) {
                            if (t.keyCode === 13) {
                                if (n(t.target).is(f.params.nextButton)) {
                                    f.onClickNext(t);
                                    f.isEnd ? f.a11y.notify(f.params.lastSlideMessage) : f.a11y.notify(f.params.nextSlideMessage)
                                } else if (n(t.target).is(f.params.prevButton)) {
                                    f.onClickPrev(t);
                                    f.isBeginning ? f.a11y.notify(f.params.firstSlideMessage) : f.a11y.notify(f.params.prevSlideMessage)
                                }
                                n(t.target).is("." + f.params.bulletClass) && n(t.target)[0].click()
                            }
                        },
                        liveRegion: n('<span class="swiper-notification" aria-live="assertive" aria-atomic="true"><\/span>'),
                        notify: function (n) {
                            var t = f.a11y.liveRegion;
                            t.length !== 0 && (t.html(""), t.html(n))
                        },
                        init: function () {
                            f.params.nextButton && f.nextButton && f.nextButton.length > 0 && (f.a11y.makeFocusable(f.nextButton), f.a11y.addRole(f.nextButton, "button"), f.a11y.addLabel(f.nextButton, f.params.nextSlideMessage));
                            f.params.prevButton && f.prevButton && f.prevButton.length > 0 && (f.a11y.makeFocusable(f.prevButton), f.a11y.addRole(f.prevButton, "button"), f.a11y.addLabel(f.prevButton, f.params.prevSlideMessage));
                            n(f.container).append(f.a11y.liveRegion)
                        },
                        initPagination: function () {
                            f.params.pagination && f.params.paginationClickable && f.bullets && f.bullets.length && f.bullets.each(function () {
                                var t = n(this);
                                f.a11y.makeFocusable(t);
                                f.a11y.addRole(t, "button");
                                f.a11y.addLabel(t, f.params.paginationBulletMessage.replace(/{{index}}/, t.index() + 1))
                            })
                        },
                        destroy: function () {
                            f.a11y.liveRegion && f.a11y.liveRegion.length > 0 && f.a11y.liveRegion.remove()
                        }
                    }, f.init = function () {
                        f.params.loop && f.createLoop();
                        f.updateContainerSize();
                        f.updateSlidesSize();
                        f.updatePagination();
                        f.params.scrollbar && f.scrollbar && (f.scrollbar.set(), f.params.scrollbarDraggable && f.scrollbar.enableDraggable());
                        f.params.effect !== "slide" && f.effects[f.params.effect] && (f.params.loop || f.updateProgress(), f.effects[f.params.effect].setTranslate());
                        f.params.loop ? f.slideTo(f.params.initialSlide + f.loopedSlides, 0, f.params.runCallbacksOnInit) : (f.slideTo(f.params.initialSlide, 0, f.params.runCallbacksOnInit), f.params.initialSlide === 0 && (f.parallax && f.params.parallax && f.parallax.setTranslate(), f.lazy && f.params.lazyLoading && (f.lazy.load(), f.lazy.initialImageLoaded = !0)));
                        f.attachEvents();
                        f.params.observer && f.support.observer && f.initObservers();
                        f.params.preloadImages && !f.params.lazyLoading && f.preloadImages();
                        f.params.autoplay && f.startAutoplay();
                        f.params.keyboardControl && f.enableKeyboardControl && f.enableKeyboardControl();
                        f.params.mousewheelControl && f.enableMousewheelControl && f.enableMousewheelControl();
                        f.params.hashnav && f.hashnav && f.hashnav.init();
                        f.params.a11y && f.a11y && f.a11y.init();
                        f.emit("onInit", f)
                    }, f.cleanupStyles = function () {
                        f.container.removeClass(f.classNames.join(" ")).removeAttr("style");
                        f.wrapper.removeAttr("style");
                        f.slides && f.slides.length && f.slides.removeClass([f.params.slideVisibleClass, f.params.slideActiveClass, f.params.slideNextClass, f.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row");
                        f.paginationContainer && f.paginationContainer.length && f.paginationContainer.removeClass(f.params.paginationHiddenClass);
                        f.bullets && f.bullets.length && f.bullets.removeClass(f.params.bulletActiveClass);
                        f.params.prevButton && n(f.params.prevButton).removeClass(f.params.buttonDisabledClass);
                        f.params.nextButton && n(f.params.nextButton).removeClass(f.params.buttonDisabledClass);
                        f.params.scrollbar && f.scrollbar && (f.scrollbar.track && f.scrollbar.track.length && f.scrollbar.track.removeAttr("style"), f.scrollbar.drag && f.scrollbar.drag.length && f.scrollbar.drag.removeAttr("style"))
                    }, f.destroy = function (n, t) {
                        f.detachEvents();
                        f.stopAutoplay();
                        f.params.scrollbar && f.scrollbar && f.params.scrollbarDraggable && f.scrollbar.disableDraggable();
                        f.params.loop && f.destroyLoop();
                        t && f.cleanupStyles();
                        f.disconnectObservers();
                        f.params.keyboardControl && f.disableKeyboardControl && f.disableKeyboardControl();
                        f.params.mousewheelControl && f.disableMousewheelControl && f.disableMousewheelControl();
                        f.params.a11y && f.a11y && f.a11y.destroy();
                        f.emit("onDestroy");
                        n !== !1 && (f = null)
                    }, f.init(), f
                }
            }, i, f, u, r;
            for (t.prototype = {
                isSafari: function () {
                    var n = navigator.userAgent.toLowerCase();
                    return n.indexOf("safari") >= 0 && n.indexOf("chrome") < 0 && n.indexOf("android") < 0
                }(),
                isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent),
                isArray: function (n) {
                    return Object.prototype.toString.apply(n) === "[object Array]"
                },
                browser: {
                    ie: window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
                    ieTouch: window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 1 || window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 1
                },
                device: function () {
                    var n = navigator.userAgent, i = n.match(/(Android);?[\s\/]+([\d.]+)?/),
                        t = n.match(/(iPad).*OS\s([\d_]+)/), r = n.match(/(iPod)(.*OS\s([\d_]+))?/),
                        u = !t && n.match(/(iPhone\sOS)\s([\d_]+)/);
                    return {ios: t || u || r, android: i}
                }(),
                support: {
                    touch: window.Modernizr && Modernizr.touch === !0 || function () {
                        return !!("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)
                    }(), transforms3d: window.Modernizr && Modernizr.csstransforms3d === !0 || function () {
                        var n = document.createElement("div").style;
                        return "webkitPerspective" in n || "MozPerspective" in n || "OPerspective" in n || "MsPerspective" in n || "perspective" in n
                    }(), flexbox: function () {
                        for (var i = document.createElement("div").style, t = "alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "), n = 0; n < t.length; n++) if (t[n] in i) return !0
                    }(), observer: function () {
                        return "MutationObserver" in window || "WebkitMutationObserver" in window
                    }()
                },
                plugins: {}
            }, i = function () {
                var n = function (n) {
                    for (var i = this, t = 0, t = 0; t < n.length; t++) i[t] = n[t];
                    return i.length = n.length, this
                }, t = function (t, i) {
                    var e = [], r = 0, o, s, u, f;
                    if (t && !i && t instanceof n) return t;
                    if (t) if (typeof t == "string") if (u = t.trim(), u.indexOf("<") >= 0 && u.indexOf(">") >= 0) for (f = "div", u.indexOf("<li") === 0 && (f = "ul"), u.indexOf("<tr") === 0 && (f = "tbody"), (u.indexOf("<td") === 0 || u.indexOf("<th") === 0) && (f = "tr"), u.indexOf("<tbody") === 0 && (f = "table"), u.indexOf("<option") === 0 && (f = "select"), s = document.createElement(f), s.innerHTML = t, r = 0; r < s.childNodes.length; r++) e.push(s.childNodes[r]); else for (o = i || t[0] !== "#" || t.match(/[ .<>:~]/) ? (i || document).querySelectorAll(t) : [document.getElementById(t.split("#")[1])], r = 0; r < o.length; r++) o[r] && e.push(o[r]); else if (t.nodeType || t === window || t === document) e.push(t); else if (t.length > 0 && t[0].nodeType) for (r = 0; r < t.length; r++) e.push(t[r]);
                    return new n(e)
                };
                return n.prototype = {
                    addClass: function (n) {
                        var r, t, i;
                        if (typeof n == "undefined") return this;
                        for (r = n.split(" "), t = 0; t < r.length; t++) for (i = 0; i < this.length; i++) this[i].classList.add(r[t]);
                        return this
                    }, removeClass: function (n) {
                        for (var t, r = n.split(" "), i = 0; i < r.length; i++) for (t = 0; t < this.length; t++) this[t].classList.remove(r[i]);
                        return this
                    }, hasClass: function (n) {
                        return this[0] ? this[0].classList.contains(n) : !1
                    }, toggleClass: function (n) {
                        for (var t, r = n.split(" "), i = 0; i < r.length; i++) for (t = 0; t < this.length; t++) this[t].classList.toggle(r[i]);
                        return this
                    }, attr: function (n, t) {
                        var i, r;
                        if (arguments.length === 1 && typeof n == "string") return this[0] ? this[0].getAttribute(n) : undefined;
                        for (i = 0; i < this.length; i++) if (arguments.length === 2) this[i].setAttribute(n, t); else for (r in n) this[i][r] = n[r], this[i].setAttribute(r, n[r]);
                        return this
                    }, removeAttr: function (n) {
                        for (var t = 0; t < this.length; t++) this[t].removeAttribute(n);
                        return this
                    }, data: function (n, t) {
                        var u, i, r;
                        if (typeof t == "undefined") return this[0] ? (u = this[0].getAttribute("data-" + n), u ? u : this[0].dom7ElementDataStorage && n in this[0].dom7ElementDataStorage ? this[0].dom7ElementDataStorage[n] : undefined) : undefined;
                        for (i = 0; i < this.length; i++) r = this[i], r.dom7ElementDataStorage || (r.dom7ElementDataStorage = {}), r.dom7ElementDataStorage[n] = t;
                        return this
                    }, transform: function (n) {
                        for (var t, i = 0; i < this.length; i++) t = this[i].style, t.webkitTransform = t.MsTransform = t.msTransform = t.MozTransform = t.OTransform = t.transform = n;
                        return this
                    }, transition: function (n) {
                        var i, t;
                        for (typeof n != "string" && (n = n + "ms"), i = 0; i < this.length; i++) t = this[i].style, t.webkitTransitionDuration = t.MsTransitionDuration = t.msTransitionDuration = t.MozTransitionDuration = t.OTransitionDuration = t.transitionDuration = n;
                        return this
                    }, on: function (n, i, r, u) {
                        function s(n) {
                            var e = n.target, f, u;
                            if (t(e).is(i)) r.call(e, n); else for (f = t(e).parents(), u = 0; u < f.length; u++) t(f[u]).is(i) && r.call(f[u], n)
                        }

                        for (var o = n.split(" "), e, f = 0; f < this.length; f++) if (typeof i == "function" || i === !1) for (typeof i == "function" && (r = arguments[1], u = arguments[2] || !1), e = 0; e < o.length; e++) this[f].addEventListener(o[e], r, u); else for (e = 0; e < o.length; e++) this[f].dom7LiveListeners || (this[f].dom7LiveListeners = []), this[f].dom7LiveListeners.push({
                            listener: r,
                            liveListener: s
                        }), this[f].addEventListener(o[e], s, u);
                        return this
                    }, off: function (n, t, i, r) {
                        for (var u, f, o = n.split(" "), e = 0; e < o.length; e++) for (u = 0; u < this.length; u++) if (typeof t == "function" || t === !1) typeof t == "function" && (i = arguments[1], r = arguments[2] || !1), this[u].removeEventListener(o[e], i, r); else if (this[u].dom7LiveListeners) for (f = 0; f < this[u].dom7LiveListeners.length; f++) this[u].dom7LiveListeners[f].listener === i && this[u].removeEventListener(o[e], this[u].dom7LiveListeners[f].liveListener, r);
                        return this
                    }, once: function (n, t, i, r) {
                        function f(e) {
                            i(e);
                            u.off(n, t, f, r)
                        }

                        var u = this;
                        typeof t == "function" && (t = !1, i = arguments[1], r = arguments[2]);
                        u.on(n, t, f, r)
                    }, trigger: function (n, t) {
                        for (var i, r = 0; r < this.length; r++) {
                            try {
                                i = new window.CustomEvent(n, {detail: t, bubbles: !0, cancelable: !0})
                            } catch (u) {
                                i = document.createEvent("Event");
                                i.initEvent(n, !0, !0);
                                i.detail = t
                            }
                            this[r].dispatchEvent(i)
                        }
                        return this
                    }, transitionEnd: function (n) {
                        function u(f) {
                            if (f.target === this) for (n.call(this, f), t = 0; t < i.length; t++) r.off(i[t], u)
                        }

                        var i = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
                            t, r = this;
                        if (n) for (t = 0; t < i.length; t++) r.on(i[t], u);
                        return this
                    }, width: function () {
                        return this[0] === window ? window.innerWidth : this.length > 0 ? parseFloat(this.css("width")) : null
                    }, outerWidth: function (n) {
                        return this.length > 0 ? n ? this[0].offsetWidth + parseFloat(this.css("margin-right")) + parseFloat(this.css("margin-left")) : this[0].offsetWidth : null
                    }, height: function () {
                        return this[0] === window ? window.innerHeight : this.length > 0 ? parseFloat(this.css("height")) : null
                    }, outerHeight: function (n) {
                        return this.length > 0 ? n ? this[0].offsetHeight + parseFloat(this.css("margin-top")) + parseFloat(this.css("margin-bottom")) : this[0].offsetHeight : null
                    }, offset: function () {
                        if (this.length > 0) {
                            var n = this[0], t = n.getBoundingClientRect(), i = document.body,
                                r = n.clientTop || i.clientTop || 0, u = n.clientLeft || i.clientLeft || 0,
                                f = window.pageYOffset || n.scrollTop, e = window.pageXOffset || n.scrollLeft;
                            return {top: t.top + f - r, left: t.left + e - u}
                        }
                        return null
                    }, css: function (n, t) {
                        var i, r;
                        if (arguments.length === 1) if (typeof n == "string") {
                            if (this[0]) return window.getComputedStyle(this[0], null).getPropertyValue(n)
                        } else {
                            for (i = 0; i < this.length; i++) for (r in n) this[i].style[r] = n[r];
                            return this
                        }
                        if (arguments.length === 2 && typeof n == "string") {
                            for (i = 0; i < this.length; i++) this[i].style[n] = t;
                            return this
                        }
                        return this
                    }, each: function (n) {
                        for (var t = 0; t < this.length; t++) n.call(this[t], t, this[t]);
                        return this
                    }, html: function (n) {
                        if (typeof n == "undefined") return this[0] ? this[0].innerHTML : undefined;
                        for (var t = 0; t < this.length; t++) this[t].innerHTML = n;
                        return this
                    }, text: function (n) {
                        if (typeof n == "undefined") return this[0] ? this[0].textContent.trim() : null;
                        for (var t = 0; t < this.length; t++) this[t].textContent = n;
                        return this
                    }, is: function (i) {
                        var f, u, r;
                        if (!this[0]) return !1;
                        if (typeof i == "string") {
                            if (r = this[0], r === document) return i === document;
                            if (r === window) return i === window;
                            if (r.matches) return r.matches(i);
                            if (r.webkitMatchesSelector) return r.webkitMatchesSelector(i);
                            if (r.mozMatchesSelector) return r.mozMatchesSelector(i);
                            if (r.msMatchesSelector) return r.msMatchesSelector(i);
                            for (f = t(i), u = 0; u < f.length; u++) if (f[u] === this[0]) return !0;
                            return !1
                        }
                        if (i === document) return this[0] === document;
                        if (i === window) return this[0] === window;
                        if (i.nodeType || i instanceof n) {
                            for (f = i.nodeType ? [i] : i, u = 0; u < f.length; u++) if (f[u] === this[0]) return !0;
                            return !1
                        }
                        return !1
                    }, index: function () {
                        if (this[0]) {
                            for (var n = this[0], t = 0; (n = n.previousSibling) !== null;) n.nodeType === 1 && t++;
                            return t
                        }
                        return undefined
                    }, eq: function (t) {
                        if (typeof t == "undefined") return this;
                        var r = this.length, i;
                        return t > r - 1 ? new n([]) : t < 0 ? (i = r + t, i < 0 ? new n([]) : new n([this[i]])) : new n([this[t]])
                    }, append: function (t) {
                        for (var r, u, i = 0; i < this.length; i++) if (typeof t == "string") for (u = document.createElement("div"), u.innerHTML = t; u.firstChild;) this[i].appendChild(u.firstChild); else if (t instanceof n) for (r = 0; r < t.length; r++) this[i].appendChild(t[r]); else this[i].appendChild(t);
                        return this
                    }, prepend: function (t) {
                        for (var r, u, i = 0; i < this.length; i++) if (typeof t == "string") for (u = document.createElement("div"), u.innerHTML = t, r = u.childNodes.length - 1; r >= 0; r--) this[i].insertBefore(u.childNodes[r], this[i].childNodes[0]); else if (t instanceof n) for (r = 0; r < t.length; r++) this[i].insertBefore(t[r], this[i].childNodes[0]); else this[i].insertBefore(t, this[i].childNodes[0]);
                        return this
                    }, insertBefore: function (n) {
                        for (var r, i = t(n), u = 0; u < this.length; u++) if (i.length === 1) i[0].parentNode.insertBefore(this[u], i[0]); else if (i.length > 1) for (r = 0; r < i.length; r++) i[r].parentNode.insertBefore(this[u].cloneNode(!0), i[r])
                    }, insertAfter: function (n) {
                        for (var r, i = t(n), u = 0; u < this.length; u++) if (i.length === 1) i[0].parentNode.insertBefore(this[u], i[0].nextSibling); else if (i.length > 1) for (r = 0; r < i.length; r++) i[r].parentNode.insertBefore(this[u].cloneNode(!0), i[r].nextSibling)
                    }, next: function (i) {
                        return this.length > 0 ? i ? this[0].nextElementSibling && t(this[0].nextElementSibling).is(i) ? new n([this[0].nextElementSibling]) : new n([]) : this[0].nextElementSibling ? new n([this[0].nextElementSibling]) : new n([]) : new n([])
                    }, nextAll: function (i) {
                        var f = [], u = this[0], r;
                        if (!u) return new n([]);
                        while (u.nextElementSibling) r = u.nextElementSibling, i ? t(r).is(i) && f.push(r) : f.push(r), u = r;
                        return new n(f)
                    }, prev: function (i) {
                        return this.length > 0 ? i ? this[0].previousElementSibling && t(this[0].previousElementSibling).is(i) ? new n([this[0].previousElementSibling]) : new n([]) : this[0].previousElementSibling ? new n([this[0].previousElementSibling]) : new n([]) : new n([])
                    }, prevAll: function (i) {
                        var f = [], u = this[0], r;
                        if (!u) return new n([]);
                        while (u.previousElementSibling) r = u.previousElementSibling, i ? t(r).is(i) && f.push(r) : f.push(r), u = r;
                        return new n(f)
                    }, parent: function (n) {
                        for (var r = [], i = 0; i < this.length; i++) n ? t(this[i].parentNode).is(n) && r.push(this[i].parentNode) : r.push(this[i].parentNode);
                        return t(t.unique(r))
                    }, parents: function (n) {
                        for (var i, r = [], u = 0; u < this.length; u++) for (i = this[u].parentNode; i;) n ? t(i).is(n) && r.push(i) : r.push(i), i = i.parentNode;
                        return t(t.unique(r))
                    }, find: function (t) {
                        for (var u, i, f = [], r = 0; r < this.length; r++) for (u = this[r].querySelectorAll(t), i = 0; i < u.length; i++) f.push(u[i]);
                        return new n(f)
                    }, children: function (i) {
                        for (var u, r, f = [], e = 0; e < this.length; e++) for (u = this[e].childNodes, r = 0; r < u.length; r++) i ? u[r].nodeType === 1 && t(u[r]).is(i) && f.push(u[r]) : u[r].nodeType === 1 && f.push(u[r]);
                        return new n(t.unique(f))
                    }, remove: function () {
                        for (var n = 0; n < this.length; n++) this[n].parentNode && this[n].parentNode.removeChild(this[n]);
                        return this
                    }, add: function () {
                        for (var n = this, r, u, i = 0; i < arguments.length; i++) for (u = t(arguments[i]), r = 0; r < u.length; r++) n[n.length] = u[r], n.length++;
                        return n
                    }
                }, t.fn = n.prototype, t.unique = function (n) {
                    for (var i = [], t = 0; t < n.length; t++) i.indexOf(n[t]) === -1 && i.push(n[t]);
                    return i
                }, t
            }(), f = ["jQuery", "Zepto", "Dom7"], u = 0; u < f.length; u++) window[f[u]] && e(window[f[u]]);
            r = typeof i == "undefined" ? window.Dom7 || window.Zepto || window.jQuery : i;
            r && ("transitionEnd" in r.fn || (r.fn.transitionEnd = function (n) {
                function u(f) {
                    if (f.target === this) for (n.call(this, f), t = 0; t < i.length; t++) r.off(i[t], u)
                }

                var i = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
                    t,
                    r = this;
                if (n) for (t = 0; t < i.length; t++) r.on(i[t], u);
                return this
            }), "transform" in r.fn || (r.fn.transform = function (n) {
                for (var t, i = 0; i < this.length; i++) t = this[i].style, t.webkitTransform = t.MsTransform = t.msTransform = t.MozTransform = t.OTransform = t.transform = n;
                return this
            }), "transition" in r.fn || (r.fn.transition = function (n) {
                var i, t;
                for (typeof n != "string" && (n = n + "ms"), i = 0; i < this.length; i++) t = this[i].style, t.webkitTransitionDuration = t.MsTransitionDuration = t.msTransitionDuration = t.MozTransitionDuration = t.OTransitionDuration = t.transitionDuration = n;
                return this
            }));
            window.Swiper = t
        }();
    typeof module != "undefined" ? module.exports = window.Swiper : typeof define == "function" && define.amd && define([],
        function () {
            "use strict";
            return window.Swiper
        }), function (n) {
        var Zoomify = function (t, i) {
            var r = this;
            this._zooming = !1;
            this._zoomed = !1;
            this._timeout = null;
            this.$shadow = null;
            this.$image = n(t).addClass("zoomify");
            this.options = n.extend({}, Zoomify.DEFAULTS, this.$image.data(), i);
            this.$image.on("click", function () {
                r.zoom()
            });
            n(window).on("resize", function () {
                r.reposition()
            });
            n(document).on("scroll", function () {
                r.reposition()
            })
        };
        Zoomify.DEFAULTS = {duration: 200, easing: "linear", scale: .9};
        Zoomify.prototype.transition = function (n, t) {
            n.css({
                "-webkit-transition": t,
                "-moz-transition": t,
                "-ms-transition": t,
                "-o-transition": t,
                transition: t
            })
        };
        Zoomify.prototype.addTransition = function (n) {
            this.transition(n, "all " + this.options.duration + "ms " + this.options.easing)
        };
        Zoomify.prototype.removeTransition = function (t, i) {
            var r = this;
            clearTimeout(this._timeout);
            this._timeout = setTimeout(function () {
                r.transition(t, "");
                n.isFunction(i) && i.call(r)
            }, this.options.duration)
        };
        Zoomify.prototype.transform = function (n) {
            this.$image.css({
                "-webkit-transform": n,
                "-moz-transform": n,
                "-ms-transform": n,
                "-o-transform": n,
                transform: n
            })
        };
        Zoomify.prototype.transformScaleAndTranslate = function (n, t, i, r) {
            this.addTransition(this.$image);
            this.transform("scale(" + n + ") translate(" + t + "px, " + i + "px)");
            this.removeTransition(this.$image, r)
        };
        Zoomify.prototype.zoom = function () {
            this._zooming || (this._zoomed ? this.zoomOut() : this.zoomIn())
        };
        Zoomify.prototype.zoomIn = function () {
            var t = this, s = this.$image.css("transform");
            this.transition(this.$image, "none");
            this.transform("none");
            var r = this.$image.offset(), u = this.$image.outerWidth(), f = this.$image.outerHeight(),
                h = this.$image[0].naturalWidth || +Infinity, c = this.$image[0].naturalHeight || +Infinity,
                e = n(window).width(), o = n(window).height(), l = Math.min(h, e * this.options.scale) / u,
                a = Math.min(c, o * this.options.scale) / f, i = Math.min(l, a), v = (-r.left + (e - u) / 2) / i,
                y = (-r.top + (o - f) / 2 + n(document).scrollTop()) / i;
            this.transform(s);
            this._zooming = !0;
            this.$image.addClass("zoomed").trigger("zoom-in.zoomify");
            setTimeout(function () {
                t.addShadow();
                t.transformScaleAndTranslate(i, v, y, function () {
                    t._zooming = !1;
                    t.$image.trigger("zoom-in-complete.zoomify")
                });
                t._zoomed = !0
            })
        };
        Zoomify.prototype.zoomOut = function () {
            var n = this;
            this._zooming = !0;
            this.$image.trigger("zoom-out.zoomify");
            this.transformScaleAndTranslate(1, 0, 0, function () {
                n._zooming = !1;
                n.$image.removeClass("zoomed").trigger("zoom-out-complete.zoomify")
            });
            this.removeShadow();
            this._zoomed = !1
        };
        Zoomify.prototype.reposition = function () {
            this._zoomed && (this.transition(this.$image, "none"), this.zoomIn())
        };
        Zoomify.prototype.addShadow = function () {
            var t = this;
            if (!this._zoomed) {
                t.$shadow && t.$shadow.remove();
                this.$shadow = n('<div class="zoomify-shadow"><\/div>');
                n("body").append(this.$shadow);
                this.addTransition(this.$shadow);
                this.$shadow.on("click", function () {
                    t.zoomOut()
                });
                setTimeout(function () {
                    t.$shadow.addClass("zoomed")
                }, 10)
            }
        };
        Zoomify.prototype.removeShadow = function () {
            var n = this;
            if (this.$shadow) {
                this.addTransition(this.$shadow);
                this.$shadow.removeClass("zoomed");
                this.$image.one("zoom-out-complete.zoomify", function () {
                    n.$shadow && n.$shadow.remove();
                    n.$shadow = null
                })
            }
        };
        n.fn.zoomify = function (t) {
            return this.each(function () {
                var r = n(this), i = r.data("zoomify");
                i || r.data("zoomify", i = new Zoomify(this, typeof t == "object" && t));
                typeof t == "string" && ["zoom", "zoomIn", "zoomOut", "reposition"].indexOf(t) >= 0 && i[t]()
            })
        }
    }(jQuery);
    $(function () {
        function r() {
            $(".gallery-items").click(function () {
                var t = this.src, i = $(this).data("high-res-img"), u = $(this).data("index"), r = $(this).attr("alt"),
                    n;
                $(this).is("img") ? viewer.show(t, i, r) : (n = $(".gallery-items").children().attr("src"), viewer.play(n))
            })
        }

        var h = new Swiper("#product-gallery .swiper-container", {
            slidesPerView: "auto",
            slidesPerGroup: 1,
            spaceBetween: 5,
            paginationClickable: !0,
            prevButton: ".product-gallery-swiper-prev",
            nextButton: ".product-gallery-swiper-next",
            autoplayDisableOnInteraction: !1,
            direction: "vertical",
            mousewheelControl: !0
        }), n, t, f, i, e, o, s, u;
        $("#product-gallery .swiper-slide").size() < 5 && ($("#product-gallery").addClass("not-navigation"), $("#product-gallery .swiper-navigation div").remove());
        viewer = ImageViewer({snapView: !0});
        n = 0;
        galleryObj = window.galleryObj;
        t = galleryObj.length;
        t > 1 && $(".iv-next, .iv-prev").removeClass("hidden");
        $("a.iv-next").click(function () {
            if (n++, n >= t && (n = 0), galleryObj[n].isVideo) {
                viewer.play(galleryObj[n].videoSrc);
                return
            }
            viewer.load(galleryObj[n].original, galleryObj[n].big, galleryObj[n].alt)
        });
        $("a.iv-prev").click(function () {
            if (n--, n < 0 && (n = t - 1), galleryObj[n].isVideo) {
                viewer.play(galleryObj[n].videoSrc);
                return
            }
            viewer.load(galleryObj[n].original, galleryObj[n].big, galleryObj[n].alt)
        });
        r();
        $("#product-gallery .swiper-slide").first().addClass("hovered");
        $("#product-gallery [data-original-image]").bind("mouseover click", function (n) {
            var t = $(this).find("img").attr("alt") + "-600";
            $("#product-gallery-image").empty().html('<img data-index="' + $(this).data("index") + '" data-high-res-img="' + $(this).data("zoom-image") + '" src="' + $(this).data("original-image") + '" class="gallery-items" alt="' + t + '">')
            /*}*/
            r();
            $("#product-gallery .swiper-slide").removeClass("hovered");
            $(this).parents(".swiper-slide").addClass("hovered")
        });
        $(".iv-container").on("click", function (n) {
            $(n.target).is(".iv-image-view") && (viewer.hide(), n.stopPropagation())
        });
        f = "ontouchstart" in window || navigator.msMaxTouchPoints > 0;
        f || $("img.related-main-image").hover(function () {
            $("#product-gallery-image").empty().html('<img  src="' + $(this).data("main-image") + '" class="related-main-image">')
        }, function () {
            var n = $("#product-gallery").find(".swiper-slide.hovered a"), t = $(this).find("img").attr("alt") + "-600",
                i = $("#product-gallery [data-original-image]").data("flag"),
                u = $("#product-gallery [data-video-image]").parents(".swiper-slide").hasClass("hovered");
            i && u ? ($("#product-gallery-image").empty().html('<video loop data-index="0" data-high-res-img="' + n.data("zoom-image") + '" class="gallery-items"><source src="' + n.data("video-image") + '"><\/video>'), $("#product-gallery-image video").get(0).onloadeddata = function () {
                $("#product-gallery-image video").get(0).play()
            }) : $("#product-gallery-image").empty().html('<img data-index="' + n.data("index") + '" data-high-res-img="' + n.data("zoom-image") + '" src="' + n.data("original-image") + '" class="gallery-items"alt="' + t + '">');
            r()
        });
    });
});