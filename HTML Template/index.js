$(document).ready(function () {
  // banner owl carousel
  $("#banner-area .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
  });

  //new-arrivals carousel initialization
  $("#new-arrivals .owl-carousel").owlCarousel({
    dots: false,
    nav: true,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });
  //top-sale carousel
  $("#top-sale .owl-carousel").owlCarousel({
    dots: false,
    nav: false,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({
      filter: filterValue,
    });
  });

  //product-qty increase-decrease
  let $qty_up = $(".qty .qty-up");
  let $qty_down = $(".qty .qty-down");
  //let $input=$(".qty .qty_input")

  //onclick up button
  $qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if ($input.val() >= 1 && $input.val() <= 9) {
      $input.val(function (i, oldvalue) {
        return ++oldvalue;
      });
    }
  });

  //onclick down button
  $qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if ($input.val() > 1 && $input.val() <= 10) {
      $input.val(function (i, oldvalue) {
        return --oldvalue;
      });
    }
  });
});
