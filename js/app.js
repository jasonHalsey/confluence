jQuery(document).foundation();



jQuery(document).ready(function() {
	
  jQuery('ul#menu').addClass('vertical medium-horizontal menu');

  // Split Reports-Archive h2 and bold 2nd word for style
  jQuery('figure.effect-oscar_report figcaption > h2').each(function () { 
    var h2 = jQuery(this);
    var text = h2.text().split(' ');
    for( var i = 1, len = text.length; i < len; i=i+2 ) {
        text[i] = '<span>' + text[i] + '</span>';
    }
    h2.html(text.join(' '));
  });


}); //End Main Doc Ready


$(window).scroll(function(){
    $(".logo").css("opacity", 1 - $(window).scrollTop() / 100);
});


