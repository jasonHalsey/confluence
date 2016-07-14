<?php
/*
Template Name: river_report
*/
  get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php if ( is_single() ) : ?>

  <?php 
    $usgs_site = get_post_meta( $post->ID, '_cmb2_siteNum', true );
    $siteLat = get_post_meta( $post->ID, '_cmb2_siteLat', true );
    $siteLong = get_post_meta( $post->ID, '_cmb2_siteLong', true );
    $zoomLevelset = get_post_meta( $post->ID, '_cmb2_zoomLevel', true );
    $zoomLevel = $zoomLevelset ?: 18;
  ?>
  
  <?php
    if (empty($usgs_site)) {
      include(locate_template('inc/manual.php'));
  ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/noFlow.js"></script>
  <?php
    }else{
      include(locate_template('inc/flow_js.php'));
  ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/flow.js"></script>
  <?php
    }
  ?>

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
              
              <div class="card-block">
                <?php
                  if (!empty($usgs_site)) {
                ?>
                  <h2 class="usgs_river_name">Loading...</h2>
                  <h3 class="river_sub_title"><?php echo get_post_meta( $post->ID, '_cmb2_sub_title', true ); ?></h3>  
                <?php
                  }else {
                ?>
                  <h2 class="river_name"><?php the_title(); ?></h2>
                  <h3 class="river_sub_title"><?php echo get_post_meta( $post->ID, '_cmb2_sub_title', true ); ?></h3>  
                <?php
                  }
                ?>
                <p> <?php echo get_post_meta( $post->ID, '_cmb2_guide_report', true ); ?></p>
                <h3>Weather</h3>
                <div id="weather_icon" class="card-img-top"> </div>
                <p class="weather_text card-text">Loading...</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item weather_weather">Loading...</li>
                <li class="list-group-item ">Temp:&nbsp;<span class="weather_temp">Loading...</span></li>
                <?php
                  if (!empty($usgs_site)) {
                ?>
                  <li class="list-group-item ">River Gauge:&nbsp;<span class="sitename">Loading...</span></li>
                  <li class="list-group-item ">Flow:&nbsp;<span class="flowNum">Loading...</span></li>
                <?php
                  }
                ?>
                <li class="list-group-item ">Recorded At:&nbsp;<span class="createTime">Loading...</span></li>
              </ul>
              <div class="card-block map-block">
                <div id='map-one' class='map'>Loading Map... </div>
              </div>
              <div class="extended_links card-block">
                <div class="noaa_link"></div>
                <div class="usgs_link"></div>
              </div>
            </div>
        </div>
            
        <div class="large-4 medium-4 columns sidebar"> 
<!--           <h3>Guide Report</h3>
            <#?php echo get_post_meta( $post->ID, '_cmb2_guide_report', true ); ?>
 -->
          <h3>Targeted Species</h3>                     
          <ul class="species_list">
            <?php 
              $balls = get_post_meta( $post->ID, '_cmb2_species_multicheckbox', true );
              foreach($balls as $term): ?>
                <li class="<?php echo $term; ?> species_box">
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/species_<?php echo $term?>.gif " />
                  <h6 class="species_title">&mdash;&nbsp;<?php include(locate_template('inc/species_title.php'));?>&nbsp;&mdash;</h6>
                </li>
            <?php endforeach; ?>
          </ul> 
          <h3>Current Hatches</h3>                     
          <ul class="hatch_list">
            <?php 
              $hatches = get_post_meta( $post->ID, '_cmb2_hatches_multicheckbox', true );
              foreach($hatches as $bugs): ?>
                <li class="<?php echo $bugs; ?> hatch_box">
                  <h5><?php echo $bugs; ?></h5>
                </li>
            <?php endforeach; ?>
          </ul>
          <h3>Hot Flies</h3>                     
          <div class="hot_flies">
            <?php echo get_post_meta( $post->ID, '_cmb2_hot_flies', true ); ?>
          </div>  
        </div>
    </div>
  </section>
</div>
  <?php endif; // is_single() ?>
 <?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>