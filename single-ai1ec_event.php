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
  ?>
  <section class="module parallax parallax-1" style="background-image:url(<?php echo $url; ?>);">
    <div class="container">
      <h1><?php the_title() ?></h1>
    </div>
  </section>

<div class="row">
  <section class="module content">
    <div class="container">
      <div class="large-8 medium-8 columns"> 
            <?php the_content() ?>
        </div>
            
        <div class="large-4 medium-4 columns sidebar"> 
          
        </div>
    </div>
  </section>
</div>
  <?php endif; // is_single() ?>
 <?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>