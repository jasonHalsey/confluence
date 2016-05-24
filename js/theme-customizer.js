(function($){
  wp.customize("shop_hours_1", function(value) {
    value.bind(function(newval) {
      $("#hr_1").html(newval);
    } );
  });
})(jQuery);