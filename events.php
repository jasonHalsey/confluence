 <?php
/*
Template Name: Events
*/
  get_header();
?>
<section class="interior_hero river_archive_hero">
</section>

<div class="row small-up-1 medium-up-2 large-up-3 report_feed_container">
  <h3 class="page_title"><?php the_title();?></h3> 
<h4 class="page_subtitle">Come See What You Can Learn</h4>
  <?php
    $mypost = array( 'post_type' => 'event','orderby' => 'menu_order');
    $loop = new WP_Query( $mypost );
  ?>
  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
      <div>          
        <h4><?php the_title() ?></h4>
        <p><?php echo get_post_meta( $post->ID, '_cmb2_description', true ); ?></p>
        <p>Location:&nbsp;<?php echo get_post_meta( $post->ID, '_cmb2_location', true ); ?></p>
        <p>Cost:&nbsp;<?php echo get_post_meta( $post->ID, '_cmb2_cost', true ); ?></p>
      </div>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>

  <?php echo do_shortcode("[ai1ec view='monthly']"); ?>
</div>
<?php get_footer(); ?>