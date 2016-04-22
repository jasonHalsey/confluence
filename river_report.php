<?php
/*
Template Name: river_report
*/
  get_header();
?>

<?php
  $mypost = array( 'post_type' => 'report','orderby' => 'menu_order');
  $loop = new WP_Query( $mypost );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
<?php $usgs_site = get_post_meta( $post->ID, '_cmb2_siteNum', true ) ?>

  <section class="module parallax parallax-1" style="background-image: url(<?php echo get_post_meta( $post->ID, '_cmb2_report_image', true ); ?>)">
    <div class="container">
      <h1><?php the_title() ?></h1>
    </div>
  </section>

<div class="row">
  <section class="module content">
    <div class="container">
      <div class="large-8 medium-8 columns"> 
            <div class="card">
              <div id="weather_icon" class="card-img-top"> </div>
              <div class="card-block">
                <h3 class="river_name">Loading...</h3>
                <p class="weather_text card-text">Loading...</p>                
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item weather_weather">Loading...</li>
                <li class="list-group-item ">Temp:&nbsp;<span class="weather_temp">Loading...</span></li>
                <li class="list-group-item ">River Gauge:&nbsp;<span class="sitename">Loading...</span></li>
                <li class="list-group-item ">Flow:&nbsp;<span class="flowNum">Loading...</span></li>
                <li class="list-group-item ">Recorded At:&nbsp;<span class="createTime">Loading...</span></li>
              </ul>
              <div class="card-block map-block">
              <div id='map-one' class='map'>Loading Map... </div>
              </div>
              <div class="card-block">
                <a href="#" class="card-link">NOAA Forecast</a>
                <a href="#" class="card-link">Extendend Flow Info</a>
              </div>
            </div>
        </div>
            
        <div class="large-4 medium-4 columns sidebar"> 
          <h3>Guide Report</h3>
            <?php echo get_post_meta( $post->ID, '_cmb2_guide_report', true ); ?>
          <h3>Targeted Species</h3> 
          <?php include(locate_template('inc/flow_js.php'));?>                    
          <ul class="species_list">
            <?php 
              $balls = get_post_meta( $post->ID, '_cmb2_species_multicheckbox', true );
              foreach($balls as $term): ?>
                <li class="<?php echo $term; ?> species_box">
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/species_<?php echo $term?>.jpg " />
                </li>
            <?php endforeach; ?>
          </ul>   
        </div>
    </div>
  </section>
</div>

 <?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>