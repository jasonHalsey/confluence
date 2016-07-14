<?php
/*
Template Name: Blog
*/
  get_header();
?>

<section class="interior_hero river_archive_hero">
  <h3 class="page_title"><?php the_title();?></h3>
</section>
<!-- TODO: Add Backgroungd Image Header  -->

<div class="row">
<div class="large-9 medium-9 columns">
  <div class="row small-up-1 medium-up-2 large-up-3 report_feed_container">   
    <?php
      $blog_post = array( 'orderby' => 'post_date', 'order' => 'DESC' );
      
      $blog_loop = new WP_Query( $blog_post );
    ?>
    <?php while ( $blog_loop->have_posts() ) : $blog_loop->the_post();?>
        <div class="column">
          <div class="report_feed">
            <figure class="effect-sarah">

            <?php 
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              if( !empty( $url ) ): ?>
              
              <img src="<?php echo $url; ?>"/>

            <?php endif; ?>

              <figcaption>
                <h2><?php the_title() ?></h2>
                <span class="entry-date"><?php echo get_the_modified_date(); ?></span>
                <p>Read More</p>
                <a href="<?php the_permalink(); ?>">View more</a>
              </figcaption>     
            </figure>
          </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
  </div><!--End of report_feed_container -->
</div>

<div class="large-3 medium-3 columns">
<?php if ( is_active_sidebar( 'cat_right_1' ) ) : ?>
    <div id="cat-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'cat_right_1' ); ?>
    </div><!-- #primary-sidebar -->
  <?php endif; ?>
</div>
</div>

<?php get_footer(); ?>