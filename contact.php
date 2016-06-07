<?php
/*
Template Name: contact
*/
get_header(); ?>

<?php 
  foreach(get_images_src('large','false') as $k => $i){
    echo '<section class="interior_hero contact_archive_hero" style="background-image:url('.$i[0].');">';
    }
?>

</section>
<div class="row">

  <div class="large-8 medium-8 columns">
    <div class="row">
      <div class="large-12 columns">
        <div class="excerpt callout feed_block">
        
        </div><!-- End feed_block -->
      </div><!-- End large-12 -->
    </div><!-- End row -->
  </div><!-- End large-8 -->



  <div class="large-4 medium-4 columns">
    <h4>Upcoming Events</h4>
    <div class="callout">
      <?php echo do_shortcode("[ai1ec view='agenda']"); ?>
    </div><!-- End callout -->
    <h4>Reviews</h4>
      <div id='yelpwidget' class="callout">
      </div><!-- End yelpwidget -->
  </div><!-- End large-4 -->

</div><!-- End row -->


<?php get_footer(); ?>
