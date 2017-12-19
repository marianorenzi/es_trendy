(function($) {

    function initGoogleSingleMap() {
        var map = document.getElementById('es-google-map');

        var data = $( map ).data();

        if (map && data.lat && data.lon && typeof(EsGoogleMap) != 'undefined' ) {
            var instance = new EsGoogleMap(map, data.lon, data.lat).init();
            instance.setMarker();
        }
    }

    $(function () {
        var $singleSlickGallery = $('.es-gallery-image');
        var $singleSlickGalleryPager = $('.es-gallery-image-pager');
        var hash = document.location.hash.substring(1);

        var $nav = $('.es-single-tabs');

        $('.es-single-tabs a').each(function() {
            if (!$($(this).attr('href')).length) {
                $(this).hide().closest('li').hide();
            }
        });

        if ( $nav.length ) {
            var navPos = parseInt($nav.offset().top);
            var navPosLeft = parseInt($nav.offset().left);
            var navWidth = parseInt($nav.width());

            $(window).scroll(function (e) {
                if($(this).scrollTop() >= navPos){
                    if(!$nav.hasClass('es-single-tabs-crop')) {
                        property_tabs_wrap.addClass('es-fixed');
                    }
                } else {
                    property_tabs_wrap.removeClass('es-fixed');
                }

            });
        }

        var $rating = $('.es-rating');

        if ($rating.length) {
            $rating.each(function() {
                var ratingNum = $(this).data('rating') || 0;

                $(this).starRating({
                    useFullStars: true,
                    disableAfterRate: false,
                    starSize: 19,
                    readOnly: true
                });

                $(this).starRating('setRating', parseFloat(ratingNum));
            });
        }

        // Add class for properties tabs for narrow screens.
        var property_tabs_wrap = $('.es-single-tabs-wrap');
        var property_tabs_wrap_width = parseInt($('.es-single-tabs-wrap').width());
        var property_tabs_width = parseInt($nav.width());
        var change_width;

        if (property_tabs_width > property_tabs_wrap_width) {
            $nav.addClass('es-single-tabs-crop');
        }
        else {
            $nav.removeClass('es-single-tabs-crop');
        }

        $( window ).resize(function() {
            $nav.removeClass('es-single-tabs-crop');
            property_tabs_wrap_width = parseInt($('.es-single-tabs-wrap').width());
            property_tabs_width = parseInt($nav.width());
            if (property_tabs_width > property_tabs_wrap_width) {
                change_width = property_tabs_wrap_width;
                $nav.addClass('es-single-tabs-crop');
            }
        });

        jQuery('.es-gallery-image').magnificPopup({
            delegate: 'a:not(.slick-cloned a)',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,5] // Will preload 0 - before current, and 1 after the current image
            }
        });

        if ($singleSlickGallery.length) {
            $singleSlickGallery.slick({
                arrows: false,
                asNavFor: $singleSlickGalleryPager
            });

            if ($singleSlickGallery.width() < 430) {
                var show = 4;
            } else {
                var show = 5;
            }

            $singleSlickGalleryPager.slick({
                asNavFor: $singleSlickGallery,
                slidesToScroll: 1,
                slidesToShow: show,
                focusOnSelect: true,
                // centerMode: true,
                nextArrow: $('.slick-next'),
                prevArrow: $('.slick-prev'),
                responsive: [
                    {
                        breakpoint: 1130,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 780,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 320,
                        settings: {
                            slidesToShow: 2
                        }
                    }
                ]
            });
        }

        initGoogleSingleMap();

        if (hash) {
            var $activeTab = $('.es-tab-' + hash).addClass('active');
        } else {
            $('.es-single-tabs').find('a').eq(0).addClass('active');
        }


        $('.es-single-tabs a, .es-top-link').click(function() {
            $('.es-single-tabs a').removeClass('active');
            $(this).addClass('active');

            var target = $(this).attr('href') == '#es-info' ? 'body' : $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(target).offset().top - 50
            }, 600);

            return false;
        });
    });
})(jQuery);
