jQuery(document).foundation();

jQuery(document).ready(function() {
	
  jQuery('ul#menu').addClass('vertical medium-horizontal menu');

  // Split Reports-Archive h2 and bold 2nd word for style
  jQuery('figure.effect-oscar_report figcaption > h2').each(function () { 
    var h2 = jQuery(this);
    var charNum = h2.text().length;
    if (charNum > 14){
      h2.addClass('long_h2');
    }
    var text = h2.text().split(' ');
    for( var i = 1, len = text.length; i < len; i=i+2 ) {
        text[i] = '<span>' + text[i] + '</span>';
    }
    h2.html(text.join(' '));
  });

  // jQuery('.title_logo').fadeOut();
}); //End Main Doc Ready


jQuery(window).scroll(function(){
    jQuery(".logo").css("opacity", 1 - jQuery(window).scrollTop() / 100);

    // jQuery(".title_logo").css("display", "block" - jQuery(window).scrollTop() / -300);
    // jQuery(".title_logo").css("display", "none" - jQuery(window).scrollTop());
});

// $(document).scroll(function() {
//   var y = $(this).scrollTop();
//   // if (y > 800) {
//     if (y > (jQuery(window).scrollTop() / 300)) {
//     // jQuery('.title_logo').fadeIn('slow');
//     jQuery('.title_logo').slideDown('slow');
//   } else {
//     // jQuery('.title_logo').fadeOut();
//     jQuery('.title_logo').slideUp('slow');
//   }
// });

jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() > 100) {
        jQuery('.title_logo').slideDown('slow');
    }
    else {
        jQuery('.title_logo').slideUp('slow');
    }
});