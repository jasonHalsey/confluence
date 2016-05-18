<?php
/*
Template Name: Blog
*/
  get_header();
?>

<section class="interior_hero river_archive_hero">

</section>
<!-- TODO: Add Backgroungd Image Header  -->
<div class="row small-up-1 medium-up-2 large-up-3 report_feed_container">   
  <?php
    $blog_post = array( 'orderby' => 'menu_order');
    $blog_loop = new WP_Query( $blog_post );
  ?>
  <?php while ( $blog_loop->have_posts() ) : $blog_loop->the_post();?>

      <div class="column">
        <div class="report_feed">
          <figure class="effect-oscar_report">

          <?php 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            if( !empty( $url ) ): ?>
            
            <img src="<?php echo $url; ?>"/>

          <?php endif; ?>

            <figcaption>
              <h2><?php the_title() ?></h2>
              <p>Read More</p>
              <a href="<?php the_permalink(); ?>">View more</a>
            </figcaption>     
          </figure>
        </div>

      </div>

  <?php endwhile; ?>

  <?php wp_reset_query(); ?>
</div>
<?php get_footer(); ?>