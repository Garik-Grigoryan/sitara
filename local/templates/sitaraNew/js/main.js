$('.autoplay').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
});

jQuery(document).on('click','.toggle-button', function() {
  slideout.toggle();
});

$( ".app-send" ).on( "click", function() {
  $("#appSend").css("display", "block");
});