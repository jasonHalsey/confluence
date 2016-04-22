<?php
/*
Template Name: archive_river_report
*/
  get_header();
?>
<section class="interior_hero river_archive_hero">

</section>
<!-- TODO: Add Backgroungd Image Header -->
<div class="row small-up-1 medium-up-2 large-up-3 report_feed_container">   
  <?php
    $mypost = array( 'post_type' => 'report','orderby' => 'menu_order');
    $loop = new WP_Query( $mypost );
  ?>
  <?php while ( $loop->have_posts() ) : $loop->the_post();?>

      <div class="column">
        <div class="report_feed">
          <figure class="effect-oscar_report">
            <img src="<?php echo get_post_meta( $post->ID, '_cmb2_report_image', true ); ?>"/>
            <figcaption>
              <h2><?php the_title() ?></h2>
              <p>See what the <?php the_title() ?> is doing</p>
              <a href="<?php the_permalink(); ?>">View more</a>
            </figcaption>     
          </figure>
        </div>

      </div>

  <?php endwhile; ?>

  <?php wp_reset_query(); ?>
</div>
<?php get_footer(); ?>