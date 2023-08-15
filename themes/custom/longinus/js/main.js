(function ($, Drupal) {
    // Language switcher set first child active language.
    Drupal.behaviors.longinusLanguageSwitcher = {
        attach: function (context) {
          $(window).on("load", function () {
            setTimeout(function () {
              var languageActive = $(
                ".block-languageswitcher .links li.is-active",
                context
              ).detach();
              languageActive.insertBefore(
                $(".block-languageswitcher .links li:first-child")
              );
            }, 1);
          });
        },
      };
      

    // Open submenu researches on click.
    $(".block-mainnavigation-2__menu li:nth-child(3)").click(function(){
        if($(".block-mainnavigation-2__menu li:nth-child(3)>.block-mainnavigation-2__submenu").hasClass('opened-researches')) {
            $(".block-mainnavigation-2__menu li:nth-child(3)>.block-mainnavigation-2__submenu").removeClass('opened-researches');
        }
        else {
            $(".block-mainnavigation-2__menu li:nth-child(3)>.block-mainnavigation-2__submenu").addClass("opened-researches");
            if($(".block-mainnavigation-2__menu li:nth-child(4)>.block-mainnavigation-2__submenu").hasClass('opened-doings')) {
                $(".block-mainnavigation-2__menu li:nth-child(4)>.block-mainnavigation-2__submenu").removeClass('opened-doings');
            }
        }
      });

      // Open submenu doings on click.
    $(".block-mainnavigation-2__menu li:nth-child(4)").click(function(){
        if($(".block-mainnavigation-2__menu li:nth-child(4)>.block-mainnavigation-2__submenu").hasClass('opened-doings')) {
            $(".block-mainnavigation-2__menu li:nth-child(4)>.block-mainnavigation-2__submenu").removeClass('opened-doings');
        }
        else {
            $(".block-mainnavigation-2__menu li:nth-child(4)>.block-mainnavigation-2__submenu").addClass("opened-doings");
            if($(".block-mainnavigation-2__menu li:nth-child(3)>.block-mainnavigation-2__submenu").hasClass('opened-researches')) {
                $(".block-mainnavigation-2__menu li:nth-child(3)>.block-mainnavigation-2__submenu").removeClass('opened-researches');
            }
        }
      });
  /* Lightgallery. */
  $(function () {
    $("[data-light-gallery]").lightGallery({
      auto: false,
      thumbnail: false,
      showThumbByDefault: false,
      selector: ".image-item",
      fullScreen: false,
    });
  });

  // Swiper

  if ($('.path-frontpage .view-banners-block-1 .swiper-container').length > 0) {
    console.log('here');
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: 'slide',
        autoplay: {
          delay: 8000,
          disableOnInteraction: false,
          speed: 600,
        },
        autoplayDisableOnInteraction: false,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });
    console.log('here2');
}

  })(jQuery, Drupal);