jQuery(document).ready(function ($) {
  $(".tab-services a").click(function (e) {
    e.preventDefault();

    $(".tab-services a").removeClass("active");
    $(this).addClass("active");

    var tab = $(this).data("slug"); // Assuming each link has a data-slug attribute with the term

    $.ajax({
      url: ajax_object.ajax_url,
      type: "POST",
      data: {
        action: "get_services_by_tab",
        tab: tab,
      },
      success: function (response) {
        $(".services-content").html(response);
        window.initSwiper(".swiper-services");
      },
    });
  });
});
