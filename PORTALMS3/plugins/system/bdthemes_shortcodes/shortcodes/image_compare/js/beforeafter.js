jQuery(document).ready(function(t) {
        "undefined" == typeof t.easing.easeInOutQuad && t.extend(t.easing, {
            easeInOutBack: function(t, s, i, e, r, n) {
                return void 0 === n && (n = 1.70158), (s /= r / 2) < 1 ? e / 2 * (s * s * (((n *= 1.525) + 1) * s - n)) + i : e / 2 * ((s -= 2) * s * (((n *= 1.525) + 1) * s + n) + 2) + i
            }
        })
    }),
    function(t, s, i, e) {
        function r(s, i) {
            this.element = s, "undefined" == typeof i && (i = t(this.element).data()), this.settings = t.extend({}, a, i), this.settings.splitBorder = this.settings.splitBorder === !0 || "true" === this.settings.splitBorder || "1" === this.settings.splitBorder, this.settings.returnValue = this.settings.returnValue === !0 || "true" === this.settings.returnValue || "1" === this.settings.returnValue, this._defaults = a, this._name = n, this.init()
        }
        var n = "imageCompare",
            a = {
                width: 400,
                height: 300,
                direction: "horizontal",
                slideOn: "click",
                rotation: 0,
                start: .5,
                returnValue: !0,
                returnDelay: 5e3,
                returnDuration: 1e3,
                arrows: !0,
                arrowColor: "#fff",
                arrowSize: 5,
                arrowGap: 10,
                arrowOffset: 0,
                splitBorder: !0,
                splitBorderColor: "#fff",
                splitBorderWidth: 3,
                slider: !1,
                sliderLocation: "bottom",
                sliderBarColor: "rgba(255,255,255,.3)",
                sliderBarThickness: 8,
                sliderButtonColor: "rgba(255,255,255,.8)",
                sliderThickness: 30,
                complete: function() {}
            };
        t.extend(r.prototype, {
            init: function() {
                this.setup(), this.settings.complete()
            },
            setup: function() {
                var i = t(this.element);
                this.settings.arrowSize = 7, i.css({
                    maxWidth: this.settings.width,
                    height: this.settings.height
                }), "undefined" == typeof i.attr("id") && i.attr("id", "su-image-compare-" + parseInt(1e5 * Math.random(), 10)), t(this.element).find("> *:eq(0)").addClass("image-after").wrap('<div class="image-after-container"></div>').find("> *:eq(0)").addClass("image-after-content"), this.settings.splitBorder === !0 && i.find(".image-after-container").css({
                    boxShadow: "0 0 0 " + this.settings.splitBorderWidth + "px " + this.settings.splitBorderColor + ", inset 0 0 0 .1px " + this.settings.splitBorderColor
                }), this.settings.slider !== !0 || navigator.userAgent.match(/Mobi/) || this.createSlider(), this.settings.arrows && ("horizontal" === this.settings.direction ? (i.append('<div class="su-image-compare-arrow-left"></div>'), i.append('<div class="su-image-compare-arrow-right"></div>')) : (i.append('<div class="su-image-compare-arrow-up"></div>'), i.append('<div class="su-image-compare-arrow-down"></div>')), i.find("[class^=su-image-compare-arrow]").css("borderWidth", this.settings.arrowSize), i.find("[class^=su-image-compare-arrow]").css("borderColor", this.settings.arrowColor)), t(s).resize(t.proxy(this.adjustStartingPosition, this)), t(s).resize(t.proxy(this.resizeContainerAspectRatio, this)), this.resizeContainerAspectRatio(), this.adjustStartingPosition(), i.addClass("slide-on-" + this.settings.slideOn), "hover" === this.settings.slideOn || navigator.userAgent.match(/Mobi/) ? t("body").on("mousemove touchmove touchstart", "#" + i.attr("id"), t.proxy(this.moveHandler, this)) : "click" === this.settings.slideOn && t("body").on("mousedown", "#" + i.attr("id"), t.proxy(this.slideDragStartHandler, this)), this.returnTimeout = null, this.returnAnimating = !1
            },
            resizeContainerAspectRatio: function() {
                var s = t(this.element);
                s.height(this.settings.height / this.settings.width * s.width())
            },
            adjustStartingPosition: function() {
                this.move(this.settings.start)
            },
            createSlider: function() {
                var i = t(this.element),
                    e = "bottom" === this.settings.sliderLocation || "top" === this.settings.sliderLocation ? "height" : "width",
                    r = "bottom" === this.settings.sliderLocation || "top" === this.settings.sliderLocation ? "width" : "height",
                    n = t("<div></div>").addClass("su-image-compare-slider");
                n.css({
                    backgroundColor: this.settings.sliderBarColor
                }).css(e, this.settings.sliderBarThickness).appendTo(i);
                var a = t("<div></div>").addClass("su-image-compare-slider-button");
                a.css({
                    backgroundColor: this.settings.sliderButtonColor
                }).css(e, this.settings.sliderBarThickness).css(r, this.settings.sliderButtonThickness).appendTo(n), t("body").on("mousedown", "#" + i.attr("id") + " .su-image-compare-slider", t.proxy(this.sliderAreaDragStartHandler, this)), t("body").on("mousedown", "#" + i.attr("id") + " .su-image-compare-slider-button", t.proxy(this.sliderDragStartHandler, this)), this.sliderAdjustLocation(this.settings.start), t(s).resize(t.proxy(this.sliderAdjustLocation, this))
            },
            sliderAdjustLocation: function(s) {
                "undefined" == typeof s && (s = this.settings.start);
                var i = t(this.element).find(".su-image-compare-slider"),
                    e = t(this.element).find(".su-image-compare-slider-button");
                if ("top" === this.settings.sliderLocation || "bottom" === this.settings.sliderLocation) {
                    var r = 0,
                        n = i.width() - e.width(),
                        a = n * s + r;
                    e.css("left", a)
                } else {
                    var o = 0,
                        d = i.height() - e.height(),
                        h = d * s + o;
                    e.css("top", h)
                }
            },
            sliderAreaDragStartHandler: function(t) {
                t.preventDefault(), this.sliderDragStartHandler(t), this.sliderDragMoveHandler(t)
            },
            sliderDragStartHandler: function(s) {
                return s.preventDefault(), this.returnAnimating ? !1 : t(this.element).find(".su-image-compare-slider-button").hasClass("bdt-dragging") ? !1 : void t(this.element).find(".su-image-compare-slider-button").addClass("bdt-dragging").parents().on("mousemove", t.proxy(this.sliderDragMoveHandler, this)).on("mouseup", t.proxy(this.sliderDragEndHandler, this))
            },
            sliderDragMoveHandler: function(s) {
                if (s.preventDefault(), this.returnAnimating) return !1;
                var i = t(this.element).find(".su-image-compare-slider"),
                    e = t(this.element).find(".su-image-compare-slider-button"),
                    r = 0;
                if ("top" === this.settings.sliderLocation || "bottom" === this.settings.sliderLocation) {
                    var n = 0,
                        a = i.width() - e.width(),
                        o = s.pageX - i.offset().left - e.width() / 2;
                    n > o ? o = n : o > a && (o = a), r = o / (a - n), e.css("left", o)
                } else {
                    var d = 0,
                        h = i.height() - e.height(),
                        g = s.pageY - i.offset().top - e.height() / 2;
                    d > g ? g = d : g > h && (g = h), r = g / (h - d), e.css("top", g)
                }
                this.move(r)
            },
            sliderDragEndHandler: function(s) {
                s.preventDefault(), t(this.element).find(".su-image-compare-slider-button").removeClass("bdt-dragging").parents().off("mousemove", t.proxy(this.sliderDragMoveHandler, this)).off("mouseup", t.proxy(this.sliderDragEndHandler, this))
            },
            slideDragStartHandler: function(s) {
                return s.preventDefault(), this.returnAnimating ? !1 : t(this.element).hasClass("bdt-dragging") ? !1 : void t(this.element).addClass("bdt-dragging").parents().on("mousemove", t.proxy(this.slideDragHandler, this)).on("mouseup", t.proxy(this.slideDragEndHandler, this))
            },
            slideDragHandler: function(s) {
                if (s.preventDefault(), this.returnAnimating) return !1;
                var i, e = t(this.element);
                i = "horizontal" === this.settings.direction ? (s.pageX - e.offset().left) / e.width() : (s.pageY - e.offset().top) / e.height(), this.move(i)
            },
            slideDragEndHandler: function(s) {
                s.preventDefault(), t(this.element).removeClass("bdt-dragging").parents().off("mousemove", t.proxy(this.slideDragHandler, this)).off("mouseup", t.proxy(this.slideDragEndHandler, this))
            },
            moveHandler: function(s) {
                if (s.preventDefault(), !this.returnAnimating) {
                    var i, e = t(this.element);
                    i = "horizontal" === this.settings.direction ? "undefined" != typeof s.pageX ? (s.pageX - e.offset().left) / e.width() : (s.originalEvent.touches[0].pageX - e.offset().left) / e.width() : "undefined" != typeof s.pageY ? (s.pageY - e.offset().top) / e.height() : (s.originalEvent.touches[0].pageY - e.offset().top) / e.height(), this.move(i)
                }
            },
            move: function(s) {
                var i = t(this.element),
                    e = i.width(),
                    r = i.height(),
                    n = this.settings.rotation * Math.PI / 180,
                    a = Math.tan(n),
                    o = Math.cos(n),
                    d = e * a,
                    h = r * a,
                    g = e / o - (e / 2 + r / 2 * a),
                    l = g + e + h,
                    f = r / o - (r / 2 + e / 2 * a),
                    m = f + r + d;
                if (this.settings.splitBorder) {
                    var u = 2 * (this.settings.splitBorderWidth + 2) * a + 1;
                    l += u, m += u
                }
                this.settings.rotation < 0 && (g += h, l -= h, f += d, m -= d);
                var p, c, b, _, v, w, x, T, y, D, B;
                "horizontal" === this.settings.direction ? (p = -s * (l - g) + l, c = "translateX(" + -p + "px) rotate(" + this.settings.rotation + "deg) translateZ(0)", b = "rotate(" + -this.settings.rotation + "deg)  translateX(" + p + "px) translateZ(0)", _ = "translateX(" + -p + "px) rotate(" + this.settings.rotation + "deg)", v = "rotate(" + -this.settings.rotation + "deg)  translateX(" + p + "px)", i.find(".image-after-container").css({
                    top: "-" + r / 2 * 5 + "px",
                    bottom: "-" + r / 2 * 5 + "px",
                    left: "-" + e / 2 + "px",
                    right: "-" + e / 2 + "px",
                    webkitTransform: c,
                    mozTransform: c,
                    msTransform: _,
                    otransform: c,
                    transform: c
                }), i.find(".image-after").css({
                    top: r / 2 * 5 + "px",
                    bottom: r / 2 * 5 + "px",
                    left: e / 2 + "px",
                    right: e / 2 + "px",
                    webkitTransform: b,
                    mozTransform: b,
                    msTransform: v,
                    oTransform: b,
                    transform: b
                }), this.settings.arrows && (w = a * this.settings.splitBorderWidth, T = this.settings.splitBorderWidth / Math.sin((90 - this.settings.rotation) * Math.PI / 180), y = this.settings.arrowSize / Math.sin((90 - this.settings.rotation) * Math.PI / 180), x = s * (e + a * (r / 2) * 2 + T + y / 2) - a * (r / 2) - T / 2 - y / 2, D = "translateY(-50%) translateX(" + (x - y - w - this.settings.arrowGap + 1) + "px) rotate(" + this.settings.rotation + "deg) translateY(" + -this.settings.arrowOffset + "px)", B = "translateY(-50%) translateX(" + (x - w + T + this.settings.arrowGap) + "px) rotate(" + this.settings.rotation + "deg) translateY(" + this.settings.arrowOffset + "px)", i.find(".su-image-compare-arrow-left").css({
                    webkitTransform: D,
                    mozTransform: D,
                    msTransform: D,
                    oTransform: D,
                    transform: D
                }), i.find(".su-image-compare-arrow-right").css({
                    webkitTransform: B,
                    mozTransform: B,
                    msTransform: B,
                    oTransform: B,
                    transform: B
                }))) : (p = -s * (m - f) + m, c = "translateY(" + -p + "px) rotate(" + this.settings.rotation + "deg) translateZ(0)", b = "rotate(" + -this.settings.rotation + "deg)  translateY(" + p + "px) translateZ(0)", _ = "translateY(" + -p + "px) rotate(" + this.settings.rotation + "deg)", v = "rotate(" + -this.settings.rotation + "deg)  translateY(" + p + "px)", i.find(".image-after-container").css({
                    top: "-" + r / 2 + "px",
                    bottom: "-" + r / 2 + "px",
                    left: "-" + e / 2 * 5 + "px",
                    right: "-" + e / 2 * 5 + "px",
                    webkitTransform: c,
                    mozTransform: c,
                    msTransform: _,
                    oTransform: c,
                    transform: c
                }), i.find(".image-after").css({
                    top: r / 2 + "px",
                    bottom: r / 2 + "px",
                    left: e / 2 * 5 + "px",
                    right: e / 2 * 5 + "px",
                    webkitTransform: b,
                    mozTransform: b,
                    msTransform: v,
                    oTransform: b,
                    transform: b
                }), this.settings.arrows && (w = a * this.settings.splitBorderWidth, T = this.settings.splitBorderWidth / Math.sin((90 - this.settings.rotation) * Math.PI / 180), y = this.settings.arrowSize / Math.sin((90 - this.settings.rotation) * Math.PI / 180), x = s * (r + a * (e / 2) * 2 + T + y / 2) - a * (e / 2) - T / 2 - y / 2, D = "translateX(-50%) translateY(" + (x - y - w - this.settings.arrowGap + 1) + "px) rotate(" + this.settings.rotation + "deg) translateX(" + -this.settings.arrowOffset + "px)", B = "translateX(-50%) translateY(" + (x - w + T + this.settings.arrowGap) + "px) rotate(" + this.settings.rotation + "deg) translateX(" + this.settings.arrowOffset + "px)", i.find(".su-image-compare-arrow-up").css({
                    webkitTransform: D,
                    mozTransform: D,
                    msTransform: D,
                    oTransform: D,
                    transform: D
                }), i.find(".su-image-compare-arrow-down").css({
                    webkitTransform: B,
                    mozTransform: B,
                    msTransform: B,
                    oTransform: B,
                    transform: B
                }))), this.sliderAdjustLocation(s), this.settings.returnValue && (this.position = s, null !== this.returnTimeout && (clearTimeout(this.returnTimeout), this.returnTimeout = null), this.returnTimeout = setTimeout(t.proxy(this.returnPosition, this), this.settings.returnDelay))
            },
            returnPosition: function() {
                t({
                    z: this.position
                }).animate({
                    z: this.settings.start
                }, {
                    duration: this.settings.returnDuration,
                    easing: "easeInOutBack",
                    step: t.proxy(this._returnPositionStep, this),
                    start: t.proxy(this._returnPositionStart, this),
                    complete: t.proxy(this._returnPositionComplete, this)
                })
            },
            _returnPositionStart: function() {
                this.returnAnimating = !0
            },
            _returnPositionComplete: function() {
                this.returnAnimating = !1
            },
            _returnPositionStep: function(t) {
                this.move(t)
            }
        }), t.fn[n] = function(s) {
            return this.each(function() {
                t.data(this, "plugin_" + n) || t.data(this, "plugin_" + n, new r(this, s))
            }), this
        }
    }(jQuery, window, document), document.addEventListener("DOMContentLoaded", function() {
        var t = document.querySelectorAll(".vc_tta-tab");
        Array.prototype.forEach.call(t, function(t) {
            t.addEventListener("mouseup", function() {
                setTimeout(function() {
                    window.dispatchEvent(new Event("resize"))
                }, 1)
            })
        })
    }), jQuery(document).ready(function(t) {
        t(".su-image-compare").imageCompare()
    });