(function($) {
    'use strict';

    // contact form validation.
    var $form = $(".contact-block__send-form");
    $form.validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        realTime : true,
        onValid: function (e) {
            $('.es-contact-msg').html('')
            e.preventDefault();
            $.ajax({
                url: Es_Trendy.ajaxurl,
                method: 'post',
                data: $(this.form).serialize(),
                dataType: 'json',
                beforeSend: function(){
                    $('.contact-block__send-form').find('.ajax_loader').css('display', 'block');
                },
                success: function(data){

                    data = data || {};

                    grecaptcha.reset();
                    $('.contact-block__send-form').find('.ajax_loader').css('display', 'none');
                    $('.contact-block__send-form')[0].reset();

                    if ( data.msg ) {
                        $('.es-contact-msg').html(data.msg)
                    } else {
                        $.magnificPopup.open({
                            items: {
                                src: '.message_sent__container',
                                type: 'inline'
                            }
                        });
                    }

                }
            })
        }
    });

    $(document).on('click', '.message_sent .close', function(e){
        $('.message_sent').css('display', 'none');
        $('.overlay').fadeOut(500);
    });

    $('.overlay .close').click(function() {
        $('.overlay').fadeOut(500);
    });

    // Init testimonials slider.
    if ($('.testimonials__slider') != 0) {
        $('.testimonials__slider').bxSlider({
            pager: false,
            nextText: '',
            prevText: ''
        });
    }

    $('.why-choose-us__container li:eq(0)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        classToAddForFullView: 'full-visible',
        offset: 0
    });
    $('.why-choose-us__container li:eq(1)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        classToAddForFullView: 'full-visible',
        offset: 100
    });
    $('.why-choose-us__container li:eq(2)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        classToAddForFullView: 'full-visible',
        offset: 200
    });
    $('.join-us__container').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInRight',
        classToAddForFullView: 'full-visible',
        offset: 100
    });
    $('.testimonials__container').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInLeft',
        classToAddForFullView: 'full-visible',
        offset: 100
    });
    $('.contact-block-line__grid li:eq(0)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInLeft',
        classToAddForFullView: 'full-visible',
        offset: 100
    });
    $('.contact-block-line__grid li:eq(1)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        classToAddForFullView: 'full-visible',
        offset: 100
    });
    $('.contact-block-line__grid li:eq(2)').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated bounceInRight',
        classToAddForFullView: 'full-visible',
        offset: 100
    });

    $(".content-block__grid li:nth-of-type(2n+1):last-child").parents('.content-block__grid').addClass("content-block__grid-not-even");

    $('.mobile-menu__button').sidr({
       name: 'sidr-left-top',
       timing: 'ease-in-out',
       speed: 500,
       source: '.mobile-menu',
       displace: false
     });

     $(document).on('click', '.sidr-class-menu-item-has-children', function(e) {
         $(this).find('ul').toggle( "slow");
     });

     $(document).on('click', '.sidr-class-mobile-menu__button', function(e) {
         $.sidr('close', 'sidr-left-top');
         return false;
     });

     $(document).on('click', '.mobile-contact__button', function(e) {
         $('.header__contact-information').toggle('slow');
         return false;
     });

})(jQuery)
