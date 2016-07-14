<?php
/*
Template Name: archive_bios
*/
  get_header();
?>
<section class="interior_hero river_archive_hero">
  <h3 class="page_title"><?php the_title();?></h3>
</section>
<!-- TODO: Add Backgroungd Image Header -->
<div class="row">   
  <?php
    $staffpost = array( 'post_type' => 'staff','orderby' => 'menu_order');
    $loop = new WP_Query( $staffpost );
  ?>
  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <div class="bio_container">
      <div class="bio_image">
        <img src="<?php echo get_post_meta( $post->ID, '_cmb2_staff_image', true ); ?>"/>
      </div>
      <div class="bio_content">
        <h2><?php the_title() ?></h2>
        <h4>&dash;&nbsp;<?php echo get_post_meta( $post->ID, '_cmb2_title', true ); ?></h4>
        <p><?php echo get_post_meta( $post->ID, '_cmb2_bio', true ); ?></p>
      </div>
    </div>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
</div>
<?php get_footer(); ?>