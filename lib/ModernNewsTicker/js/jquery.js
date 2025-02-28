/**
 * Modern News Ticker
 * Copyright (c) CreativeTier
 * contact@CreativeTier.com
 * www.CreativeTier.com
 */
(function(e) {
    var t = {
        effect: "scroll",
        autoplay: true,
        feedType: "none",
        feedCount: 5,
        refresh: "10:00"
    };
    var n = {
        scroll: {
            scrollInterval: 20,
            transitionTime: 500
        },
        fade: {
            displayTime: 4e3,
            transitionTime: 300
        },
        type: {
            typeInterval: 10,
            displayTime: 4e3,
            transitionTime: 300
        },
        slide: {
            slideDistance: 100,
            displayTime: 4e3,
            transitionTime: 350
        }
    };
    var r = {
        "rss-atom": {
            feedUrl: ""
        },
        twitter: {
            twitterName: ""
        }
    };
    var i = {
        init: function(t) {
            var i = {};
            e.extend(i, {
                feedType: t.feedType
            });
            e.extend(i, r[i.feedType]);
            e.extend(i, {
                effect: t.effect
            });
            e.extend(i, n[i.effect]);
            e.extend(i, t);
            return this.each(function() {
                function w() {
                    A();
                    p.addClass("mt-hide");
                    h.addClass("mt-preloader");
                    p.children().remove();
                    p.css("margin-left", 0);
                    d.css("opacity", "1").removeClass("mt-hide");
                    p.append(d);
                    switch (i.feedType) {
                        case "rss-atom":
                            e.ajax({
                                url: "https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + i.feedCount + "&q=" + i.feedUrl,
                                type: "GET",
                                dataType: "jsonp",
                                success: function(e) {
                                    var t = e.responseData.feed.entries;
                                    for (var n = 0; n < t.length; n++) {
                                        p.append("<li><a href='" + t[n].link + "' target='_blank'>" + t[n].title + "</a></li>")
                                    }
                                    E()
                                }
                            });
                            break;
                        case "twitter":
                            e.ajax({
                                url: "http://api.twitter.com/1/statuses/user_timeline.json",
                                type: "GET",
                                dataType: "jsonp",
                                data: {
                                    screen_name: i.twitterName,
                                    count: i.feedCount,
                                    trim_user: true
                                },
                                success: function(e) {
                                    for (var t = 0; t < e.length; t++) {
                                        p.append("<li><a href='http://twitter.com/#!/" + e[t].user.id_str + "/status/" + e[t].id_str + "' target='_blank'>" + e[t].text + "</a></li>")
                                    }
                                    E()
                                }
                            });
                            break
                    }
                }

                function E() {
                    h.removeClass("mt-preloader");
                    p.removeClass("mt-hide");
                    x()
                }

                function S() {
                    if (i.feedType == "rss-atom" || i.feedType == "twitter") {
                        clearTimeout(f);
                        a = false;
                        w()
                    }
                }

                function x() {
                    if (i.effect != "scroll") p.children("li:not(:first)").addClass("mt-hide");
                    if (u) {
                        u = false;
                        if (i.autoplay) {
                            k();
                            _()
                        }
                    } else O();
                    if (i.refresh) {
                        f = setTimeout(S, T(i.refresh))
                    }
                    a = true
                }

                function T(e) {
                    var t;
                    if (typeof e == "number") t = e;
                    else {
                        var n = e.split(":");
                        n.reverse();
                        t = parseFloat(n[0]);
                        if (n[1]) t += parseFloat(n[1]) * 60;
                        if (n[2]) t += parseFloat(n[2]) * 3600
                    }
                    return t * 1e3
                }

                function N(e) {
                    if (a) C(e.data.type)
                }

                function C(t) {
                    if (!s) {
                        s = true;
                        A();
                        if (t == "prev") {
                            switch (i.effect) {
                                case "scroll":
                                    p.css({
                                        "margin-left": -e(p.children(":last")).outerWidth()
                                    }).children(":last").prependTo(p);
                                    p.animate({
                                        "margin-left": 0
                                    }, i.transitionTime, function() {
                                        s = false;
                                        m.mouseleave(function() {
                                            O()
                                        })
                                    });
                                    break;
                                case "fade":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide");
                                        p.children(":last").prependTo(p).removeClass("mt-hide").css({
                                            opacity: 0
                                        }).animate({
                                            opacity: 1
                                        }, i.transitionTime, function() {
                                            O()
                                        });
                                        s = false
                                    });
                                    break;
                                case "type":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide");
                                        M(p.children(":last").prependTo(p).removeClass("mt-hide").css({
                                            opacity: 0
                                        }).animate({
                                            opacity: 1
                                        }, i.transitionTime).children("a"));
                                        s = false
                                    });
                                    break;
                                case "slide":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide");
                                        p.children(":last").prependTo(p).removeClass("mt-hide").css({
                                            opacity: 0,
                                            "margin-left": i.slideDistance
                                        }).animate({
                                            opacity: 1,
                                            "margin-left": 0
                                        }, i.transitionTime, function() {
                                            O()
                                        });
                                        s = false
                                    });
                                    break
                            }
                        } else {
                            switch (i.effect) {
                                case "scroll":
                                    p.animate({
                                        "margin-left": -e(p.children(":first")).outerWidth()
                                    }, i.transitionTime, function() {
                                        p.css("margin-left", 0).children(":first").appendTo(p);
                                        s = false;
                                        g.mouseleave(function() {
                                            O()
                                        })
                                    });
                                    break;
                                case "fade":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide").appendTo(p);
                                        p.children(":first").removeClass("mt-hide").css({
                                            opacity: 0
                                        }).animate({
                                            opacity: 1
                                        }, i.transitionTime, function() {
                                            O()
                                        });
                                        s = false
                                    });
                                    break;
                                case "type":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide").appendTo(p);
                                        M(p.children(":first").removeClass("mt-hide").css({
                                            opacity: 0
                                        }).animate({
                                            opacity: 1
                                        }, i.transitionTime).children("a"));
                                        s = false
                                    });
                                    break;
                                case "slide":
                                    p.children(":first").animate({
                                        opacity: 0
                                    }, i.transitionTime, function() {
                                        e(this).addClass("mt-hide").appendTo(p);
                                        p.children(":first").removeClass("mt-hide").css({
                                            opacity: 0,
                                            "margin-left": i.slideDistance
                                        }).animate({
                                            opacity: 1,
                                            "margin-left": 0
                                        }, i.transitionTime, function() {
                                            O()
                                        });
                                        s = false
                                    });
                                    break
                            }
                        }
                    }
                }

                function k() {
                    n = true;
                    if (i.effect == "scroll") {
                        t = setInterval(function() {
                            var t = parseFloat(p.css("margin-left")) - 1;
                            p.css("margin-left", t);
                            if (Math.abs(t) > e(p.children("li")[0]).outerWidth()) {
                                p.css("margin-left", 0).children(":first").appendTo(p)
                            }
                        }, i.scrollInterval)
                    } else {
                        t = setInterval(function() {
                            C("next")
                        }, i.displayTime)
                    }
                }

                function L() {
                    n = false;
                    clearInterval(t)
                }

                function A() {
                    if (n) {
                        r = true;
                        L()
                    }
                }

                function O() {
                    if (r && !o) {
                        k();
                        r = false
                    }
                }

                function M(e) {
                    var t = e.html().split("");
                    var n = 0;
                    e.html("_");
                    var r = setInterval(function() {
                        var i = e.html().split("_")[0] + t[n++];
                        if (n != t.length) {
                            i += "_"
                        }
                        e.html(i);
                        if (n == t.length) {
                            clearInterval(r);
                            O()
                        }
                    }, i.typeInterval)
                }

                function _() {
                    y.addClass("mt-pause")
                }

                function D() {
                    y.removeClass("mt-pause")
                }

                function P() {
                    return false
                }
                var t;
                var n = false;
                var r = false;
                var s = false;
                var o = false;
                var u = true;
                var a = false;
                var f;
                var l = e(this);
                var c = l.children(".mt-label");
                var h = l.children(".mt-news");
                var p = h.children("ul");
                var d = p.children("li");
                var v = l.children(".mt-controls");
                var m = v.children(".mt-prev");
                var g = v.children(".mt-next");
                var y = v.children(".mt-play");
                if (i.effect == "scroll") l.addClass("mt-scroll");
                c.css("width", c.width());
                var b = l.width();
                if (c.length) b -= c.outerWidth() + parseFloat(c.css("margin-right"));
                if (v.length) b -= v.outerWidth() + parseFloat(v.css("margin-left"));
                h.css("width", b);
                h.hover(function() {
                    if (a) {
                        A();
                        o = true
                    }
                }, function() {
                    if (a) {
                        o = false;
                        O()
                    }
                });
                m.mousedown(P).bind("click", {
                    type: "prev"
                }, N);
                g.mousedown(P).bind("click", {
                    type: "next"
                }, N);
                y.mousedown(P).click(function() {
                    if (a) {
                        if (n) {
                            L();
                            D()
                        } else {
                            k();
                            _()
                        }
                    }
                });
                if (i.feedType == "rss-atom" || i.feedType == "twitter") {
                    w()
                } else {
                    x()
                }
                l.data("pause", A);
                l.data("resume", O);
                l.data("refresh", S)
            })
        },
        pause: function() {
            return this.each(function() {
                e(this).data("pause")()
            })
        },
        resume: function() {
            return this.each(function() {
                e(this).data("resume")()
            })
        },
        refresh: function() {
            return this.each(function() {
                e(this).data("refresh")()
            })
        }
    };
    e.fn.modernTicker = function(t) {
        if (i[t]) {
            return i[t].apply(this, Array.prototype.slice.call(arguments, 1))
        } else if (typeof t === "object" || !t) {
            return i.init.apply(this, arguments)
        } else {
            e.error("Method " + t + " does not exist on jQuery.modernTicker")
        }
    }
})(jQuery)