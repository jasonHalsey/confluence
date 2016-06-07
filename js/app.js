jQuery(document).foundation();

jQuery(document).ready(function() {
	
  jQuery('ul#menu').addClass('vertical medium-horizontal menu');
  jQuery('ul#menu > li').addClass('hvr-underline-from-center');

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

  moveCalNav();
}); //End Main Doc Ready


jQuery(window).scroll(function(){
    jQuery(".logo").css("opacity", 1 - jQuery(window).scrollTop() / 100);
});


jQuery(window).scroll(function() {

  if (jQuery('body').hasClass('home')){
    if (jQuery(window).scrollTop() > 100) {
        jQuery('.title_logo').slideDown('slow');
        jQuery('#phone_container').slideDown('slow');
    }
    else {
        jQuery('.title_logo').slideUp('slow');
        jQuery('#phone_container').slideUp('slow');
    }
  }
});

  function moveCalNav() {
    var translate = jQuery('.ai1ec-pull-left');
    jQuery(translate).detach();
    jQuery('.ai1ec-calendar').prepend($(translate));
  }

  // Add Yelp Reviews to Sidebar
 (function() { var s = document.createElement("script");s.async = true;s.onload = s.onreadystatechange = function(){getYelpWidget("deep-canyon-outfitters-bend","300","RED","y","y","3");};s.src='http://chrisawren.com/widgets/yelp/yelpv2.js' ;var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);})();

//Back To Top Scrolling
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $('.cd-top');

  //hide or show the "back to top" link
  $(window).scroll(function(){
    ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    if( $(this).scrollTop() > offset_opacity ) { 
      $back_to_top.addClass('cd-fade-out');
    }
  });

//smooth scroll to top
  $back_to_top.on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0 ,
      }, scroll_top_duration
    );
  });


