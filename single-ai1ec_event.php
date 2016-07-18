<?php
/*
Template Name: calendar event
*/
  get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php if ( is_single() ) : ?>
  <?php
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $default = site_url('/wp-content/themes/bwo/images/default_bg.jpg');
    if (!isset($url)) {
      $bg_image = $url;
    } else {
      $bg_image = $default;
    }
  ?>
  <section class="module parallax parallax-1" style="background-image:url(<?php echo $bg_image; ?>);">
    <div class="container">
      <h1><?php the_title() ?></h1>
    </div>
  </section>

<div class="row">
  <section class="module content">
    <div class="container">
      <div class="large-12 medium-12 columns"> 
      <h4><?php the_title(); ?></h4>
            <?php the_content() ?>
        </div>
            
    </div>
  </section>
</div>
  <?php endif; // is_single() ?>
 <?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>