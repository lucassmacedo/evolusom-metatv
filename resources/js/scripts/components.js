/*=========================================================================================
  File Name: Components.js
  Description: For Generic Components.
  ----------------------------------------------------------------------------------------
  Item name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function (window, document, $) {
  /***** Component Variables *****/
  var alertValidationInput = $(".alert-validation"),
    alertRegex = /^[0-9]+$/,
    alertValidationMsg = $(".alert-validation-msg"),
    accordion = $(".accordion"),
    collapseTitle = $(".collapse-title"),
    collapseHoverTitle = $(".collapse-hover-title"),
    dropdownMenuIcon = $(".dropdown-icon-wrapper .dropdown-item");

  /***** Alerts *****/
  /* validation with alert */
  alertValidationInput.on('input', function () {
    if (alertValidationInput.val().match(alertRegex)) {
      alertValidationMsg.css("display", "none");
    } else {
      alertValidationMsg.css("display", "block");
    }
  });

  /***** Carousel *****/
  // For Carousel With Enabled Keyboard Controls
  $(document).on("keyup", function (e) {
    if (e.which == 39) {
      $('.carousel[data-keyboard="true"]').carousel('next');
    } else if (e.which == 37) {
      $('.carousel[data-keyboard="true"]').carousel('prev');
    }
  })

  // To open Collapse on hover
  if (accordion.attr("data-toggle-hover", "true")) {
    collapseHoverTitle.closest(".card").on("mouseenter", function () {
      $(this).children(".collapse").collapse("show");
    });
  }
  // Accordion with Shadow - When Collapse open
  $('.accordion-shadow .collapse-header .card-header').on("click", function () {
    var $this = $(this);
    $this.parent().siblings(".collapse-header.open").removeClass("open");
    $this.parent(".collapse-header").toggleClass("open");
  });

  /***** Dropdown *****/
  // For Dropdown With Icons
  dropdownMenuIcon.on("click", function () {
    $(".dropdown-icon-wrapper .dropdown-toggle i").remove();
    $(this).find("i").clone().appendTo(".dropdown-icon-wrapper .dropdown-toggle");
    $(".dropdown-icon-wrapper .dropdown-toggle .dropdown-item").removeClass("dropdown-item");
  });

  /***** Chips *****/
  // To close chips
  $('.chip-closeable').on('click', function () {
    $(this).closest('.chip').remove();
  })


  // let timeLeft = 30;
  // let elem = document.getElementById('item-timer');
  //
  // let timerId = setInterval(countdown, 1000);
  //
  // function countdown() {
  //     if (timeLeft === -1) {
  //         window.location.href = window.next;
  //
  //     } else {
  //         elem.innerHTML = timeLeft ;
  //         timeLeft--;
  //     }
  // }
  // countdown();

  alert(window.next)
  if (window.next !== undefined) {

    function pageScroll() {
      window.scrollBy(0, 1);
      scrolldelay = setTimeout(pageScroll, 100);
    }

    $(window).scroll(function () {
      if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        setTimeout(() => {
          window.location.href = window.next;
        }, 100)
      }
    });

    setTimeout(() => {
      pageScroll();
    }, 100)
  }

  $(window).scroll(function () {
    var navbar = document.getElementById("navTitle");
    var sticky = navbar.offsetTop;

    if (window.pageYOffset > sticky + 40) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  });


})(window, document, jQuery);
