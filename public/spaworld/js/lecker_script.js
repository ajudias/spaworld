(function ($) {
  "use strict";
  $(".lec_form").validate({
    submitHandler: function (form) {
      var type = $(form).attr("id");
      send_form(type);
      return false;
    },
  });
  function send_form(type) {
    var arr = [];
    $("#" + type + " .form-control").each(function () {
      var element = $(this).attr("name");
      var value = $(this).val();
      $(this).css({ border: "1px solid #c4c4c4" });
      if ($(this).prop("required") && value == "") {
        $(this).css({ border: "2px solid red" });
        $(this).focus();
        return false;
      }
      arr.push("'&" + element + "=' + " + value);
    });
    var dataString = arr.join(" + ");
    $.ajax({
      method: "POST",
      url: "http://formspree.io/rodalermakov@gmail.com",
      data: dataString,
      dataType: "json",
      success: function () {
        $("#" + type).html(
          "<div id='form_send_message'>Thank you for your request, we will contact you as soon as possible.</div>",
          1500
        );
      },
    });
  }
  Modernizr.addTest("retina", function () {
    var dpr =
      window.devicePixelRatio ||
      window.screen.deviceXDPI / window.screen.logicalXDPI ||
      1;
    return !!(dpr > 1);
  });
  $(".lightbox").magnificPopup({ type: "image", gallery: { enabled: true } });
  $(".video").magnificPopup({
    type: "iframe",
    iframe: {
      markup:
        '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        "</div>",
      patterns: {
        youtube: {
          index: "youtube.com/",
          id: "v=",
          src: "http://www.youtube.com/embed/%id%?autoplay=1",
        },
        vimeo: {
          index: "vimeo.com/",
          id: "/",
          src: "http://player.vimeo.com/video/%id%?autoplay=1",
        },
        gmaps: { index: "//maps.google.", src: "%id%&output=embed" },
      },
      srcAction: "iframe_src",
    },
  });
  if ($(".lec_slider_firefly").length > 0) {
    $(".lec_slider_firefly").each(function () {
      var min = $(this).attr("data-min");
      var max = $(this).attr("data-max");
      var total = $(this).attr("data-total");
      $.firefly({
        color: "none",
        minPixel: min,
        maxPixel: max,
        total: total,
        on: ".lec_slider_firefly",
      });
    });
  }
  $(".lec_slider_single .lec_lm_type_i_item").each(function () {
    var title = $(this).find(".lec_gold").text();
    $(this)
      .parents(".lec_section")
      .find(".lec_slider_single_btns")
      .append('<div class="lec_slider_single_btn">' + title + "</div>");
  });
  $(".lec_slider_single").each(function () {
    var dots = $(this).data("dots");
    var autoplay = $(this).data("autoplay");
    $(this).owlCarousel({
      addClassActive: true,
      autoplay: autoplay,
      stagePadding: 50,
      loop: true,
      touchDrag: true,
      center: true,
      singleItem: true,
      items: 1,
      responsive: {
        0: { stagePadding: 0, margin: 0, center: false },
        768: { stagePadding: 0, margin: 0, center: false },
        980: {},
      },
      stagePadding: 100,
      margin: 60,
      nav: true,
      navText: ["", ""],
      dots: dots,
      dotsContainer: ".lec_slider_single_btns",
    });
  });
  if (!device.tablet() && !device.mobile()) {
    $(".lec_gold").lettering();
    $(".lec_gold span").each(function () {
      var letter = $(this).html();
      $(this).addClass("lec_letter_" + letter);
    });
  }
  $(".lec_main_menu_icon b").lettering();
  $(".lec_main_menu_icon b").each(function () {
    var i = 2;
    $(this)
      .find("span")
      .each(function () {
        $(this).css("transition-delay", "0." + i + "s");
        i++;
      });
  });
  $(".lec_reviews_single").owlCarousel({
    addClassActive: true,
    autoplay: false,
    loop: true,
    touchDrag: true,
    center: true,
    singleItem: true,
    items: 1,
    responsive: {
      0: { items: 1, stagePadding: 0, margin: 0 },
      768: { items: 1, stagePadding: 0, margin: 0 },
      980: { items: 1 },
    },
    stagePadding: 100,
    margin: 60,
    nav: true,
    dots: false,
    navText: ["", ""],
    autoHeight: true,
  });
  $(".lec_team_slider").owlCarousel({
    addClassActive: true,
    autoplay: false,
    loop: true,
    touchDrag: true,
    items: 3,
    responsive: { 0: { items: 1 }, 768: { items: 2 }, 980: { items: 3 } },
    margin: 40,
    nav: false,
    navText: ["", ""],
    dots: true,
  });
  $(".lec_main_slider").owlCarousel({
    addClassActive: true,
    autoplay: true,
    loop: false,
    touchDrag: true,
    items: 1,
    nav: false,
    navText: ["", ""],
    dots: false,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
  });
  var feed = new Instafeed({
    get: "user",
    userId: 4075526338,
    accessToken: "4075526338.17dd6bd.0fcd5eb0262e416390ef273090854cc7",
    sortBy: "most-liked",
    template:
      '<a href="{{link}}" target="_blank" class="lec_insta_item lec_news_block text-center"><span class="lec_news_img_parent"><span class="lec_news_img lec_image_bck" data-image="{{image}}"></span></span><span class="lec_news_title lec_gold_subtitle">{{caption}}</span></div>',
    target: "instagram-carousel",
    limit: 9,
    resolution: "standard_resolution",
    after: function () {
      $("#instagram-carousel").owlCarousel({
        items: 3,
        responsive: { 0: { items: 1 }, 768: { items: 2 }, 980: { items: 3 } },
        navigation: true,
        pagination: true,
        autoPlay: 4000,
        margin: 40,
        loop: true,
        navigationText: [
          '<i class="ti ti-angle-left"></i>',
          '<i class="ti ti-angle-right"></i>',
        ],
      });
      $(".lec_image_bck").each(function () {
        var image = $(this).attr("data-image");
        var gradient = $(this).attr("data-gradient");
        var color = $(this).attr("data-color");
        var blend = $(this).attr("data-blend");
        var opacity = $(this).attr("data-opacity");
        var position = $(this).attr("data-position");
        var height = $(this).attr("data-height");
        if (image) {
          $(this).css("background-image", "url(" + image + ")");
        }
        if (gradient) {
          $(this).css("background-image", gradient);
        }
        if (color) {
          $(this).css("background-color", color);
        }
        if (blend) {
          $(this).css("background-blend-mode", blend);
        }
        if (position) {
          $(this).css("background-position", position);
        }
        if (opacity) {
          $(this).css("opacity", opacity);
        }
        if (height) {
          $(this).css("height", height);
        }
      });
    },
  });
  feed.run();
  $(".lec_image_bck").each(function () {
    var image = $(this).attr("data-image");
    var gradient = $(this).attr("data-gradient");
    var color = $(this).attr("data-color");
    var blend = $(this).attr("data-blend");
    var opacity = $(this).attr("data-opacity");
    var position = $(this).attr("data-position");
    var height = $(this).attr("data-height");
    if (image) {
      $(this).css("background-image", "url(" + image + ")");
    }
    if (gradient) {
      $(this).css("background-image", gradient);
    }
    if (color) {
      $(this).css("background-color", color);
    }
    if (blend) {
      $(this).css("background-blend-mode", blend);
    }
    if (position) {
      $(this).css("background-position", position);
    }
    if (opacity) {
      $(this).css("opacity", opacity);
    }
    if (height) {
      $(this).css("height", height);
    }
  });
  $(".lec_over, .lec_head_bck").each(function () {
    var color = $(this).attr("data-color");
    var image = $(this).attr("data-image");
    var opacity = $(this).attr("data-opacity");
    var blend = $(this).attr("data-blend");
    if (color) {
      $(this).css("background-color", color);
    }
    if (image) {
      $(this).css("background-image", "url(" + image + ")");
    }
    if (opacity) {
      $(this).css("opacity", opacity);
    }
    if (blend) {
      $(this).css("mix-blend-mode", blend);
    }
  });
  $(".lec_map_over").on("click", function (e) {
    $(this).parents(".lec_section").toggleClass("active_map");
  });
  $(".lec_map_container")
    .on("click", function (e) {
      $(this).addClass("clicked");
    })
    .on("mouseleave", function (e) {
      $(this).removeClass("clicked");
    });
  $(".lec_virtual_play").on("click", function (e) {
    $(this)
      .parents(".lec_animation_block")
      .siblings(".lec_animation_block")
      .toggleClass("active");
    $(this).toggleClass("active");
    $(".lec_virtual_close").fadeIn();
  });
  $(".lec_virtual_close").on("click", function (e) {
    $(this)
      .parents(".lec_animation_block")
      .siblings(".lec_animation_block")
      .toggleClass("active");
    $(".lec_virtual_play").toggleClass("active");
    $(this).fadeOut();
  });
  $(".lec_main_menu").on("click", function (e) {
    $(this).next(".lec_main_menu_content").toggleClass("active");
    $(this).next().next(".lec_main_menu_content_menu").toggleClass("active");
    $(this).toggleClass("active");
  });
  $(".lec_go").on("click", function (e) {
    var anchor = $(this);
    $("html, body")
      .stop()
      .animate({ scrollTop: $(anchor.attr("href")).offset().top }, 300);
    e.preventDefault();
  });
  $("div[data-animation=animation_blocks]").each(function () {
    var i = 0;
    $(this)
      .find(".lec_icon_box, .skill-bar-content, .lec_anim_box")
      .each(function () {
        $(this).css("transition-delay", "0." + i + "s");
        i++;
      });
  });
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();
  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      $(".lec_logo").addClass("active");
      $("body").addClass("lec_first_step");
    } else {
      $("body").removeClass("lec_first_step");
      $(".lec_logo").removeClass("active");
    }
    if ($(window).scrollTop() > 300) {
      $("body").addClass("lec_second_step");
    } else {
      $("body").removeClass("lec_second_step");
    }
  });
  $(".lec_fixed").css("background-attachment", "fixed");
  $(".lec_main_menu_content_menu .lec_parent > a").on("click", function (e) {
    $(this).parents("li").find("ul").slideToggle(300);
    $(this).toggleClass("active");
    e.preventDefault();
  });
  $(".lec_main_menu_content_menu .lec_parent_01 > a").on("click", function (e) {
    $(this).parents("li").find("ul").slideToggle(300);
    $(this).toggleClass("active");
    e.preventDefault();
  });
  $(".lec_main_menu_content_menu a[href*=\\#]:not([href=\\#])").on(
    "click",
    function () {
      $(".lec_main_menu_content_menu a[href*=\\#]:not([href=\\#])").removeClass(
        "active"
      );
      $(this).addClass("active");
      $(".lec_main_menu").trigger("click");
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") ||
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body").animate({ scrollTop: target.offset().top }, 1000);
          return false;
        }
      }
    }
  );
  $(".lec_mobile_menu_content .lec_parent").on("click", function (e) {
    $(this).find("ul").slideToggle(300);
  });
  $(".lec_mobile_menu_content .lec_parent_01").on("click", function (e) {
    $(this).find(".ul_").slideToggle(300);
  });
  $(".lec_mobile_menu").on("click", function (e) {
    $(this).toggleClass("active");
    $(".lec_mobile_menu_hor").toggleClass("active");
  });
  $(".lec_header_search span").on("click", function (e) {
    $(this).next(".lec_header_search_cont").fadeToggle();
  });
  if (!device.tablet() && !device.mobile()) {
    $(".lec_auto_height").each(function () {
      setEqualHeight($(this).find('div[class^="col"]'));
    });
  }
  if (device.tablet() && device.landscape()) {
    $(".lec_auto_height").each(function () {
      setEqualHeight($(this).find('div[class^="col"]'));
    });
  }
  $(window).resize(function () {
    if (!device.tablet() && !device.mobile()) {
      $(".lec_auto_height").each(function () {
        setEqualHeight($(this).find('div[class^="col"]'));
      });
    }
    if (device.tablet() && device.landscape()) {
      $(".lec_auto_height").each(function () {
        setEqualHeight($(this).find('div[class^="col"]'));
      });
    }
  });
  function setEqualHeight(columns) {
    var tallestcolumn = 0;
    columns.each(function () {
      $(this).css("height", "auto");
      var currentHeight = $(this).height();
      if (currentHeight > tallestcolumn) {
        tallestcolumn = currentHeight;
      }
    });
    columns.height(tallestcolumn);
  }
  $(window).on("load", function () {
    $("body").imagesLoaded(function () {
      $(".lec_page_loader div").fadeOut();
      $(".lec_page_loader").delay(200).fadeOut("slow");
    });
    if (!device.tablet() && !device.mobile()) {
      var s = skrollr.init({ forceHeight: false });
      $(window).stellar({
        horizontalScrolling: false,
        responsive: true,
        positionProperty: "transform",
        hideDistantElements: true,
      });
    }
  });
})(jQuery);
