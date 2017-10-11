$(window).on("load", function() {
	"use strict";
    $(".loader").fadeOut(500, function() {
        $("#main").animate({
            opacity: "1"
        }, 500);
        contanimshow();
    });
});
	//   all ------------------
function initDiopter() {
    "use strict";
    var bgImage = $(".bg");
    bgImage.each(function(a) {
        if ($(this).attr("data-bg")) $(this).css("background-image", "url(" + $(this).data("bg") + ")");
    });
	// Owl carousel ------------------
    var ss = $(".single-slider"), dlt2 = ss.data("loppsli");
    ss.owlCarousel({
        margin: 0,
        items: 1,
        smartSpeed: 1300,
        loop: dlt2,
        nav: false,
        autoHeight: true
    });
    $(".single-slider-holder a.next-slide").on("click", function() {
        $(this).closest(".single-slider-holder").find(ss).trigger("next.owl.carousel");
		return false;
    });
    $(".single-slider-holder a.prev-slide").on("click", function() {
        $(this).closest(".single-slider-holder").find(ss).trigger("prev.owl.carousel");
		return false;
    });
	var sync2 = $(".fscs");
    sync2.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        onInitialized: function() {
 			$(".num-holder3").text("1" + " / " + this.items().length);
            }
        }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        $(".num-holder3").text((1 > b ? b  + a : b > a ? b - a : b  )  + " / " + a);
    });
    $(".hero-slider-holder a.next-slide").on("click", function() {
        $(this).closest(".hero-slider-holder").find(sync2).trigger("next.owl.carousel");
        return false;
    });
    $(".hero-slider-holder a.prev-slide").on("click", function() {
        $(this).closest(".hero-slider-holder").find(sync2).trigger("prev.owl.carousel");
        return false;
    });
	 var sync3 = $(".fsss");
    sync3.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
		mouseDrag:false,
		touchDrag:false,
        items: 1,
        dots: true,
        smartSpeed: 1200,
		animateOut: "fadeOut",
        animateIn: "fadeIn",
        autoHeight: false,
        onInitialized: function() {
			$(".num-holder3").text("1" + " / " + this.items().length);
           }
        }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        $(".num-holder3").text((1 > b ? b  + a : b > a ? b - a : b  )  + " / " + a);
    });
    $(".hero-slider-holder a.next-slide").on("click", function() {
        $(this).closest(".hero-slider-holder").find(sync3).trigger("next.owl.carousel");
        return false;
    });
    $(".hero-slider-holder a.prev-slide").on("click", function() {
        $(this).closest(".hero-slider-holder").find(sync3).trigger("prev.owl.carousel");
        return false;
    });
	var sync4 = $(".slideshow-slider");
    sync4.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
		mouseDrag:false,
		touchDrag:false,
		autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        autoplaySpeed: 3600,
        items: 1,
        dots: false,
		animateOut: "fadeOut",
        animateIn: "fadeIn",
        autoHeight: false,
        onInitialized: function() {
			$(".num-holder3").text("1" + " / " + this.items().length);
           }
        }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        $(".num-holder3").text((1 > b ? b  + a : b > a ? b - a : b  )  + " / " + a);
    });
    var sc = $(".inline-carousel");
    sc.owlCarousel({
        margin: 0,
        items: 4,
        smartSpeed: 1300,
        loop: true,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $(".inline-carousel-inner  a.next-slide").on("click", function() {
        $(this).closest(".inline-carousel-inner ").find(sc).trigger("next.owl.carousel");
        return false;
    });
    $(".inline-carousel-inner  a.prev-slide").on("click", function() {
        $(this).closest(".inline-carousel-inner ").find(sc).trigger("prev.owl.carousel");
        return false;
    });
    var gR = $(".gallery_horizontal"), w = $(window), cf = $(".gallery_horizontal").data("cen") , lgg =$(".gallery_horizontal").data("loops") ;
    function initGalleryhorizontal() {
        var  c = $(".gallery_horizontal"), d = $(".bvp").outerHeight() , ch = $(".gallery_horizontal").outerHeight();
	        c.find("img").css({
            height: ch - d
        });

        if (gR.find(".owl-stage-outer").length) {
            gR.trigger("destroy.owl.carousel");
            gR.find(".horizontal_item").unwrap();
        }
        if (w.width() > 1036) gR.owlCarousel({
            autoWidth: true,
            margin: 10,
            items: 3,
            smartSpeed: 1300,
            loop: lgg,
            center: cf,
            nav: false,
            thumbs: true,
            thumbImage: true,
            thumbContainerClass: "owl-thumbs",
            thumbItemClass: "owl-thumb-item",
            onInitialized: function() {
                var c = $(".owl-carousel").find(".active").find(".horizontal_item");
                var e = c.data("phdesc");
                var f = c.data("phname");
                if (e) $(".caption").html("<h4>" + f + "</h4><p>" + e + "</p>");
				  $(".num-holder2").text("1" + " / " + this.items().length);
            }
        }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index-1, a = a.item.count;
        $(".num-holder2").text((1 > b ? b  + a : b > a ? b - a : b  )  + " / " + a);
    });
    }
    if (gR.length) {
        initGalleryhorizontal();
        w.on("resize.destroyhorizontal", function() {
            setTimeout(initGalleryhorizontal, 150);
        });
    }
	var timestamp_mousewheel = 0;
	gR.on("mousewheel", ".owl-stage", function(a) {
		var d = new Date();
		if((d.getTime() - timestamp_mousewheel) > 1000){  
			timestamp_mousewheel = d.getTime();
		if (a.deltaY < 0) gR.trigger("next.owl"); else gR.trigger("prev.owl");
			a.preventDefault();
		}
	});
    gR.on("translated.owl.carousel", function(a) {
        var b = $(this).find(".active").find(".horizontal_item").data("phdesc");
        var c = $(this).find(".active").find(".horizontal_item").data("phname");
        if (b) {

			$(".caption").html("<h4>" + c + "</h4><p>" + b + "</p>");
			$(".caption h4 , .caption p").addClass("remcap");
	        setTimeout(function() {
           $(".caption h4 , .caption p").removeClass("remcap");
        }, 200);
		}

    });
    $(".resize-carousel-holder a.next-slide").on("click", function() {
        $(this).closest(".resize-carousel-holder").find(gR).trigger("next.owl.carousel");
		 $(this).closest(".resize-carousel-holder").find(gf).trigger("next.owl.carousel");
		return false;
    });
    $(".resize-carousel-holder a.prev-slide").on("click", function() {
        $(this).closest(".resize-carousel-holder").find(gR).trigger("prev.owl.carousel");
		 $(this).closest(".resize-carousel-holder").find(gf).trigger("prev.owl.carousel");
		return false;
    });

	$('.ad-thumbs .bg').each(function () {
		var daim = $(this).data("bg");
		$(this).append("<img>");
		$(this).find("img").attr('src',daim);

	});
	var totalItems = $('.hero-wrap-image-slider .owl-item').length;
	$('.totnaum').html(totalItems);
    var gf = $(".full-screen-gallery") ;
        gf.owlCarousel({
            margin: 0,
            items: 1,
            smartSpeed: 1300,
            nav: false,
            thumbs: true,
            thumbImage: true,
            thumbContainerClass: "owl-thumbs",
            thumbItemClass: "owl-thumb-item",
			onInitialized: function() {
                var cf = $(".owl-carousel").find(".active").find(".horizontal_item");
                var ef = cf.data("phdesc");
                var ff = cf.data("phname");
                if (ef) $(".caption").html("<h4>" + ff + "</h4><p>" + ef + "</p>");
				  $(".num-holder2").text("1" + " / " + this.items().length);
            }
        }) ;
       gf.on("translated.owl.carousel", function(a) {
        var b = $(this).find(".active").find(".horizontal_item").data("phdesc");
        var c = $(this).find(".active").find(".horizontal_item").data("phname");
        if (b) {
			$(".caption").html("<h4>" + c + "</h4><p>" + b + "</p>");
			$(".caption h4 , .caption p").addClass("remcap");
	        setTimeout(function() {
           $(".caption h4 , .caption p").removeClass("remcap");
        }, 200);
		}
		var   a = a.item.count;
		var b = $(".full-screen-gallery .owl-item.active" ).index() + 1 ;
        $(".num-holder2").text((b) + " / " + a);
    });
    gf.on("mousewheel", ".owl-stage", function(a) {
        if (a.deltaY < 0) gf.trigger("next.owl"); else gf.trigger("prev.owl");
        a.preventDefault();
    });
    var testiSlider = $(".testimonials-slider");
    testiSlider.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: false,
		onInitialized: function() {
 			$(".teti-counter").text("1" + " / " + this.items().length);
           }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        $(".teti-counter").text((1 > b ? b  + a : b > a ? b - a : b  )  + " / " + a);
    });
    $(".testimonials-slider-holder a.next-slide").on("click", function() {
        $(this).closest(".testimonials-slider-holder").find(testiSlider).trigger("next.owl.carousel");
    });
    $(".testimonials-slider-holder a.prev-slide").on("click", function() {
        $(this).closest(".testimonials-slider-holder").find(testiSlider).trigger("prev.owl.carousel");
    });
	var fwc = $(".full-width-carousel");
    fwc.owlCarousel({
        margin: 0,
        items: 1,
        smartSpeed: 1300,
        loop: true,
        dots: false,
        nav: false,
		center:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1024: {
                items: 3
            }
        }
    }) ;
    $(".full-width-carousel-holder a.next-slide").on("click", function() {
        $(this).closest(".full-width-carousel-holder").find(fwc).trigger("next.owl.carousel");
        return false;
    });
    $(".full-width-carousel-holder a.prev-slide").on("click", function() {
        $(this).closest(".full-width-carousel-holder").find(fwc).trigger("prev.owl.carousel");
        return false;
    });
	function showpanel(){
		$(".anim-panel").animate({
			bottom:20+"px"});
		$(".close-panel").addClass("isPan");
	}
	function hidepanel(){
		$(".anim-panel").animate({
			bottom:-54+"px"});
		$(".close-panel").removeClass("isPan");
	}
	$(".close-panel").on("click", function() {
		$(this).toggleClass("hidpan");
		if ($(this).hasClass("isPan")) hidepanel(); else showpanel();
	});
	//   lightGallery ------------------
    $(".single-popup-image").lightGallery({
        selector: "this",
        cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
        download: false,
        counter: false
    });
    var $lg = $(".lightgallery"), dlt = $lg.data("looped");
    $lg.lightGallery({
        selector: ".lightgallery a.popup-image",
        cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
        download: false,
        loop: dlt,

    });
    $(".lightgallery").on("onBeforeNextSlide.lg", function(a) {
        gR.trigger("next.owl.carousel");
        gf.trigger("next.owl.carousel");
        ss.trigger("next.owl.carousel");
    });
    $(".lightgallery").on("onBeforePrevSlide.lg", function(a) {
        gR.trigger("prev.owl.carousel");
        gf.trigger("prev.owl.carousel");
        ss.trigger("prev.owl.carousel");
    });
		//   Thumbnails ------------------
    var ts = $(".show-thumbs").data("textshow");
    var th = $(".show-thumbs").data("texthide");
    $(".show-thumbs").text(ts);
    function showThumbs() {
        $(".show-thumbs").removeClass("vis-t");
        $(".owl-thumbs").addClass("vis-thumbs");
        $(".show-thumbs").text(th);
		$(".resize-carousel-holder , .buttons-holder").addClass("ogm");
        setTimeout(function() {
            $(".owl-thumb-item").addClass("himask");
        }, 650);
 		hideDet();
    }
    function hideThumbs() {
        $(".show-thumbs").text(ts);
        $(".show-thumbs").addClass("vis-t");
        $(".owl-thumbs").removeClass("vis-thumbs");
        $(".owl-thumb-item").removeClass("himask");
		$(".resize-carousel-holder , .buttons-holder").removeClass("ogm");
    }
    $(".show-thumbs").on("click", function() {
        if ($(this).hasClass("vis-t")) showThumbs(); else hideThumbs();
		return false;
    });
    $(document).on("click", ".owl-thumb-item", function() {
        hideThumbs();
		return false;
    });
	//   Details ------------------
	function showDet(){
		$(".show-details").removeClass("novisdet");
		$(".anim-sb").animate({left:0});
		$(".resize-carousel-holder").animate({left:330+"px"});
		hideThumbs()
	}
	function hideDet(){
		$(".show-details").addClass("novisdet");
		$(".anim-sb").animate({left:-350 + "px"});
		$(".resize-carousel-holder").animate({left:0});
	}

	$(".show-details").on("click", function() {
        if ($(this).hasClass("novisdet")) showDet(); else hideDet();
		return false;
    });
	//   Blog filter ------------------
	$(".blog-btn").on("click", function() {
        $(this).parent(".blog-btn-filter").find("ul").slideToggle(500);
        return false;
    });

	// Isotope ------------------
    function n() {
        if ($(".gallery-items").length) {
            var a = $(".gallery-items").isotope({
                singleMode: true,
                columnWidth: ".grid-sizer, .grid-sizer-second, .grid-sizer-three",
                itemSelector: ".gallery-item, .gallery-item-second, .gallery-item-three",
                transformsEnabled: true,
                transitionDuration: "700ms",
                resizable: true
            });
            a.imagesLoaded(function() {
                a.isotope("layout");
            });
            $(".gallery-filters").on("click", "a.gallery-filter", function(b) {
                b.preventDefault();
                var c = $(this).attr("data-filter");
                a.isotope({
                    filter: c
                });
                $(".gallery-filters a.gallery-filter").removeClass("gallery-filter-active");
                $(this).addClass("gallery-filter-active");
                return false;
            });
            a.isotope("on", "layoutComplete", function(a, b) {
                var b = a.length;
                $(".num-album").html(b);
            });
        }
        var c = {
            touchbehavior: true,
            cursoropacitymax: 1,
            cursorborderradius: "6px",
            background: "transparent",
            cursorwidth: "5px",
            cursorborder: "0px",
            cursorcolor: "#292929",
            autohidemode: false,
            bouncescroll: true,
            scrollspeed: 120,
            mousescrollstep: 90,
            grabcursorenabled: false,
            horizrailenabled: true,
            preservenativescrolling: true,
            cursordragontouch: true,
            railpadding: {
                top: -1,
                right: 0,
                left:  0,
                bottom: 0
            }
        };
        $(".p_horizontal_wrap").niceScroll(c);
        var d = $("#portfolio_horizontal_container");
        d.imagesLoaded(function(a, b, e) {
            var f = {
                itemSelector: ".portfolio_item",
                layoutMode: "packery",
                packery: {
                    isHorizontal: true,
                    gutter: 0
                },
                resizable: true,
                transformsEnabled: true,
                transitionDuration: "1000ms",
            };
            var g = {
                itemSelector: ".portfolio_item",
                layoutMode: "packery",
                packery: {
                    isHorizontal: false,
                    gutter: 0
                },
                resizable: true,
                transformsEnabled: true,
                transitionDuration: "700ms"
            };
            if ($(window).width() < 756) {
                d.isotope(g);
                d.isotope("layout");
                if ($(".p_horizontal_wrap").getNiceScroll()) $(".p_horizontal_wrap").getNiceScroll().remove();

            } else {
                d.isotope(f);
                d.isotope("layout");
                $(".p_horizontal_wrap").niceScroll(c);
            }
            $(".gallery-filters").on("click", "a", function(a) {
                a.preventDefault();
                var b = $(this).attr("data-filter");
                d.isotope({
                    filter: b
                });
                $(".gallery-filters a").removeClass("gallery-filter_active");
                $(this).addClass("gallery-filter_active");
            });
            d.isotope("on", "layoutComplete", function(a, b) {
                var b = a.length;
                $(".num-album").html(b);
            });
        });
    }
    $(".grid-item a").on("click", function() {
        var a = $(this).attr("href");
        window.location.href = a;
        return false;
    });
    var j = $(".portfolio_item , .gallery-item").length;
    $(".all-album , .num-album").html(j);
    n();
    $(window).on("load", function() {
        n();
    });

	/*$('.num-counter').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});*/

	$(".vis-desc .overal-box").append("<span class='numpc'></span>");
	$(".vis-desc .overal-box span.numpc").each(function(i) {
		$(this).text(++i);
	});
 	//   skills ------------------
        $("div.skillbar-bg").each(function() {
            $(this).find(".custom-skillbar").delay(600).animate({
                width: $(this).attr("data-percent")
            }, 1500);
        });
	// css functionts------------------
    function a() {
        $(".hero-slider .item").css({
            height: $(".hero-slider").outerHeight(true)
        });
        $(".full-screen-gallery .horizontal_item").css({
            height: $(".full-screen-gallery").outerHeight(true)
        });
        $(".height-emulator").css({
            height: $(".fixed-footer").outerHeight(true)
        });
       	$(".alt").each(function() {
	        $(this).css({
            "margin-top": -1 * $(this).height() / 2 + "px"
        });
        });
        var a = $(".footer-social li").length;
        var b = $(".footer-social").width();
        $(".footer-social li").css({
            width: b / a - 1
        });
 		$(".links-items").css({
            "margin-left": -1 * $(".links-items").width() / 2 + "px"
        });
        var a = $(window).height(), b = $("header").outerHeight(), c = $(".p_hor izontal_wrap"), ff= $(".fixed-filter ").outerHeight();
        c.css("height", a - b -20 );
        var d = $(window).width();
        if (d < 768) c.css("height", a - b - 60);
        $(" #portfolio_horizontal_container .portfolio_item img  ").css({
            height: $(".portfolio_item").outerHeight(true)
        });
        $(" #portfolio_horizontal_container.vis-desc .portfolio_item img  ").css({
            height: $(".portfolio_item").outerHeight(true) -  $(" #portfolio_horizontal_container.vis-desc .portfolio_item .overal-box").outerHeight(true)
        });
    }
    a();
    $(window).resize(function() {
        a();
		if($(".p_horizontal_wrap").hasClass("res-protoc")){
					if ($(window).width() < 756) {
				location.reload();
			}

		}
    });
	$(".filter-button").on("click" , function() {
     $(".gallery-filters").slideToggle(500);
    });


	// team  ------------------
    $(".team-box").on({
		mouseenter: function () {
        $(this).find("ul.team-social").fadeIn();
        $(this).find(".team-social a").each(function(a) {
            var b = $(this);
            setTimeout(function() {
                b.animate({
                    opacity: 1,
                    top: "0"
                }, 400);
            }, 150 * a);
        });
    },
	 mouseleave: function () {
        $(this).find(".team-social a").each(function(a) {
            var b = $(this);
            setTimeout(function() {
                b.animate({
                    opacity: 0,
                    top: "50px"
                }, 400);
            }, 150 * a);
        });
        setTimeout(function() {
            $(this).find("ul.team-social").fadeOut();
        }, 150);
		  }
    });
 //   Scroll  ------------------
	$(".scroll-content").smartscroll({fullscreen: false});

    $(".scroll-nav  ul").singlePageNav({
        filter: ":not(.external)",
        updateHash: false,
        offset:90,
        threshold: 120,
        speed: 1200,
        currentClass: "act-link",
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 300){
			$(".fixed-icons , .onepage-contr").addClass("vistotop");
		}
		else{
 			$(".fixed-icons , .onepage-contr").removeClass("vistotop");

		}
    });
    $(".to-top").on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });
    $(".custom-scroll-link").on("click", function() {
        var a = 91;
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") || location.hostname == this.hostname) {
            var b = $(this.hash);
            b = b.length ? b : $("[name=" + this.hash.slice(1) + "]");
            if (b.length) {
                $("html,body").animate({
                    scrollTop: b.offset().top - a
                }, {
                    queue: false,
                    duration: 1200,
                    easing: "easeInOutExpo"
                });
                return false;
            }
        }
    });
	// Share   ------------------

    $(".share-container").share({
        networks: ['facebook','pinterest','googleplus','twitter','linkedin']
    });

	var shrcn = $(".share-container") ;
	function showShare() {
		shrcn.removeClass("isShare");
		shrcn.addClass("visshare");
	}
	function hideShare() {
		shrcn.addClass("isShare");
		shrcn.removeClass("visshare");
	}
	$(".showshare").on("click", function() {
		$(this).toggleClass("vis-butsh");
		 $(this).find("span").text($(this).text() == 'Cerrar' ? 'Compartir' : 'Cerrar');
		if ($(".share-container").hasClass("isShare")) showShare(); else hideShare();
	});
	$(".hde  .portfolio_item , .hde .gallery-item").each( function() { $(this).hoverdir(); } );

	// Map ------------------
	/*$("#map-canvas").gmap3({
        action: "init",
        marker: {
            values: [ {
                latLng: [ 10.501493, -66.900480 ],
                data: "Our office  - Caracas",
                options: {
                    icon: "images/marker.png"
                }
            } ],
            options: {
                draggable: false
            },
            events: {
                mouseover: function(a, b, c) {
                    var d = $(this).gmap3("get"), e = $(this).gmap3({
                        get: {
                            name: "infowindow"
                        }
                    });
                    if (e) {
                        e.open(d, a);
                        e.setContent(c.data);
                    } else $(this).gmap3({
                        infowindow: {
                            anchor: a,
                            options: {
                                content: c.data
                            }
                        }
                    });
                },
                mouseout: function() {
                    var a = $(this).gmap3({
                        get: {
                            name: "infowindow"
                        }
                    });
                    if (a) a.close();
                }
            }
        },
        map: {
            options: {
                zoom: 14,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                scrollwheel: false,
                streetViewControl: true,
                draggable: true,
                styles:[{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#000000"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#000000"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:17},{weight:1.2}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#000000"},{lightness:21}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#000000"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#000000"},{lightness:16}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#000000"},{lightness:19}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"water",elementType:"geometry.fill",stylers:[{saturation:"-100"},{lightness:"-100"},{gamma:"0.00"}]}]
            }
        }
    });*/
	//  contact form  ------------------
    $("#contactform").submit(function() {
        var a = $(this).attr("action");
        $("#message").slideUp(750, function() {
            $("#message").hide();
            $("#submit").attr("disabled", "disabled");
            $.post(a, {
                name: $("#name").val(),
                email: $("#email").val(),
                comments: $("#comments").val()
            }, function(a) {
                document.getElementById("message").innerHTML = a;
                $("#message").slideDown("slow");
                $("#submit").removeAttr("disabled");
                if (null != a.match("success")) $("#contactform").slideDown("slow");
            });
        });
        return false;
    });
    $("#contactform input, #contactform textarea").keyup(function() {
        $("#message").slideUp(1500);
    });
	// Background video ------------------
    var l = $(".background-youtube").data("vid");
    var m = $(".background-youtube").data("mv");
    $(".background-youtube").YTPlayer({
        fitToBackground: true,
        videoId: l,
        pauseOnScroll: true,
        mute: m,
        callback: function() {
            var a = $(".background-video").data("ytPlayer").player;
        }
    });
    var vid = $(".background-vimeo").data("vim");
    $(".background-vimeo").append('<iframe src="//player.vimeo.com/video/' + vid + '?background=1"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>');
    $(".video-holder").height($(".media-container").height());
    if ($(window).width() > 1024) {
        if ($(".video-holder").size() > 0) if ($(".media-container").height() / 9 * 16 > $(".media-container").width()) {
            $(".background-vimeo iframe ").height($(".media-container").height()).width($(".media-container").height() / 9 * 16);
            $(".background-vimeo iframe ").css({
                "margin-left": -1 * $("iframe").width() / 2 + "px",
                top: "-75px",
                "margin-top": "0px"
            });
        } else {

            $(".background-vimeo iframe ").width($(window).width()).height($(window).width() / 16 * 9);
            $(".background-vimeo iframe ").css({
                "margin-left": -1 * $("iframe").width() / 2 + "px",
                "margin-top": -1 * $("iframe").height() / 2 + "px",
                top: "50%"
            });
        }
    } else if ($(window).width() < 760) {
        $(".video-holder").height($(".media-container").height());
        $(".background-vimeo iframe ").height($(".media-container").height());
    } else {
        $(".video-holder").height($(".media-container").height());
        $(".background-vimeo iframe ").height($(".media-container").height());
    }
}
// if mobile remove parallax and video  ------------------
function initparallax() {
    var a = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return a.Android() || a.BlackBerry() || a.iOS() || a.Opera() || a.Windows();
        }
    };
    trueMobile = a.any();
    if (null == trueMobile) {
		var parallax = new Scrollax();
		parallax.reload();
		parallax.init();
    }
    if (trueMobile) $(".background-vimeo , .background-youtube").remove();
}
	var  transitionLayer = $('.cd-transition-layer'),
		transitionBackground = transitionLayer.children() ;
		var frameProportion = 1.78,
		frames = 25,
		resize = false;
		function setLayerDimensions() {
		var windowWidth = $(window).width(),
			windowHeight = $(window).height(),
			layerHeight, layerWidth;

		if( windowWidth/windowHeight > frameProportion ) {
			layerWidth = windowWidth;
			layerHeight = layerWidth/frameProportion;
		} else {
			layerHeight = windowHeight*1.2;
			layerWidth = layerHeight*frameProportion;
		}
		transitionBackground.css({
			'width': layerWidth*frames+'px',
			'height': layerHeight+'px',
		});

		resize = false;
	}
// show hide content and init functions  ------------------
function contanimshow() {
    if ($(".content").hasClass("home-content")) {
		$("header").animate({
            top: "-70px"
        }, 500);
	}
	else
	{
		$("header").animate({
            top: "20px"
        }, 500);
	}
	transitionLayer.addClass('closing');
	transitionBackground.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
		transitionLayer.removeClass('closing opening visible');
		transitionBackground.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
	});
    setTimeout(function() {
    	$(".content-holder").removeClass("scale-bg2");
    }, 450);
    var a = window.location.href;
    var b = $(".dynamic-title").text();
    $(".header-title a").attr("href", a);
    $(".header-title a").html(b);
	$(".header-title h2").removeClass("hid-title");

	$('nav:not(.scroll-nav) li').addClass("parlink");
	$('nav li > ul li ,nav li   ul li > ul li ').removeClass("parlink");
	 $('nav:not(.scroll-nav) a').removeClass('act-link');
	 var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $("a.ajax").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("act-link");
     });
 	if($("nav li > a").hasClass("act-link")){
		$("nav li ul li > a.act-link").parents("nav li.parlink").find("a").addClass("act-link");
 	}
	$("nav:not(.scroll-nav) li ul li > a.act-link").removeClass("act-link");
}

function contanimhide() {
	transitionLayer.addClass('visible opening');
    setTimeout(function() {
        $(".elem").addClass("scale-bg2");
    }, 650);
	$(".header-title h2").addClass("hid-title");
}

$('a.ajax').on('click',function(){
	$('nav li a').removeClass('act-link');
	$(this).addClass('act-link');
});
function showinfo(){
	$(".sb-overlay ").fadeIn(300);
 	$(".sidebar-menu").animate({right:0});
}
	$('#hid-men').menu();
//  quick view ------------------
$(".info-button").on("click",function(){
	showinfo();
});
function hideinfo() {
 	$(".sidebar-menu").animate({right:"-470px"});
	$(".sb-overlay ").fadeOut(300);
}
$(".close-info-btn , .sb-overlay ").on("click",function(){
	$(".close-info-btn").fadeOut();
	hideinfo();
});
    var nb = $(".nav-button"), nh = $(".nav-holder"), an = $(".nav-holder ,.nav-button ");
    function showMenu() {
        nb.removeClass("vis-m");
        nh.slideDown(500);
    }
    function hideMenu() {
        nb.addClass("vis-m");
        nh.slideUp(500);
    }
    nb.on("click", function() {
        if ($(this).hasClass("vis-m")) showMenu(); else hideMenu();
    });

	$(".sidebar-menu a.ajax , .sidebar-menu   .scroll-nav a").on("click", function() {
       hideinfo();
    });
	$(".scroll-nav a").on("click", function() {
		if ($(window).width() < 1036) {
		  hideMenu();
		}
    });
$(".header-title ").append('<h2><a class="ajax" href="#"></a></h2>');
$("body").append('<div class="l-line"><span></span></div>');

//=============== init ajax  ==============
$(function() {
    /*$.coretemp({
        reloadbox: "#wrapper",
		loadErrorMessage: "<h2>404</h2> <br> Page you are looking for - not found", // 404 error text
        loadErrorBacklinkText: "Back to the last page", // 404 back button  text
        outDuration: 250,
        inDuration: 450
    });*/
    readyFunctions();
    $(document).on({
        ksctbCallback: function() {
            readyFunctions();
        }
    });
});
//=============== init all functions  ==============
function readyFunctions() {
     initDiopter();
    initparallax();
}