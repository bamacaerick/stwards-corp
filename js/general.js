var $ = jQuery;

function triggerTabs($tabsArray) {
  $tabsArray.each((index, element) => {
    $(element).on("click", function () {
      $(".tab-button").removeClass("active");
      $(this).addClass("active");
      $tabContendId = $(this).data("tab");

      $(".tab-content").removeClass("active");
      $("#" + $tabContendId).addClass("active");
    });
  });
}

$(document).ready(function () {
  // var $menu = $('.menu');
  // var $menuChildren = $('.menu > li.menu-item-has-children')

  // if ($menuChildren) {
  //     $menuChildren.each((index, element) => {
  //         $(element).on('click', function () {
  //             $(this).find('.sub-menu').slideToggle('fast');
  //         })
  //     });
  // }

  // TABS
  var $buttonTabs = $(".tab-button");
  if ($buttonTabs !== undefined && $buttonTabs.length > 0) {
    triggerTabs($buttonTabs);
  }

  // Swiper
  var $swiperServices = $(".swiper-services");
  if ($swiperServices !== undefined && $swiperServices.length > 0) {
    window.initSwiper(".swiper-services");
  }

});
