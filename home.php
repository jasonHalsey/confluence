<?php
/*
Template Name: home
*/
get_header(); ?>

    <div class="hero_row">
      <div class="large-12 columns hero">
      <div class="logo">
        <img src="<?php echo bloginfo('template_directory'); ?>/images/white_logo_600.svg" alt="Confluence Fly Shop"/>
      </div>
        <!-- <#?php echo do_shortcode("[rev_slider alias='homeSlide']"); ?> -->
      </div>
      <div class="hero-arrow-down">
        <div class="chevron"></div>
      </div>
    </div>
    
    <div class="row ctas_row">
      <div class="large-6 medium-12 columns">
        <figure class="effect-oscar">
          <img src="<?php echo bloginfo('template_directory'); ?>/images/reports_bg.jpg" alt="Fishing Reports"/>
          <figcaption>
            <h2>Fishing <span>Reports</span></h2>
            <p>Get the latest intel from our guides</p>
            <a href="<?php echo home_url( '/river-reports' ); ?>">View more</a>
          </figcaption>     
        </figure>
      </div>
      <div class="large-6 medium-12 columns">
        <figure class="effect-oscar">
          <img src="<?php echo bloginfo('template_directory'); ?>/images/events_bg.jpg" alt="Fishing Events"/>
          <figcaption>
            <h2>Shop <span>Events</span></h2>
            <p>See What's Going On</p>
            <a href="#">View more</a>
          </figcaption>     
        </figure>
      </div>
    </div>

    <div class="row ctas_row">
      <div class="large-6 medium-12 columns">
        <figure class="effect-oscar">
          <img src="<?php echo bloginfo('template_directory'); ?>/images/blog_bg.jpg" alt="Fishing Reports"/>
          <figcaption>
            <h2>Blog <span>Posts</span></h2>
            <p>Get the latest intel from our guides</p>
            <a href="<?php echo home_url( '/blog' ); ?>">View more</a>
          </figcaption>     
        </figure>
      </div>
      <div class="large-6 medium-12 columns">
        <figure class="effect-oscar">
          <img src="<?php echo bloginfo('template_directory'); ?>/images/guide_bg.jpg" alt="Fishing Events"/>
          <figcaption>
            <h2>Guided <span>Trips</span></h2>
            <p>Book a trip to get your adventure started</p>
            <a href="#">View more</a>
          </figcaption>     
        </figure>
      </div>
    </div>

  
    <div class="row">
      <div class="large-8 medium-8 columns">
       <div class="row">
        <div class="large-12 columns">
          <?php query_posts( array(
             'post_type' => array( 'post', 'report' ),
             'orderby' => modified,
             'showposts' => 4
             )
             ); ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <div class="excerpt callout feed_block">
              <h2><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2> 
              <div class="report_block">
                <?php $report = get_post_meta( $post->ID, '_cmb2_guide_report', true ); ?>
                <?php
                  if (!empty($report)) {
                  echo wp_trim_words($report, 55 ); 
                  }else {
                    echo get_the_excerpt();
                  }
                ?>
                <div class="author_block">
                <a href="<?php the_permalink(); ?> ">Read More</a>
                <?php mt_profile_img() ?>
                <p>By: <?php echo get_the_author_link(); ?></p>
              </div>
                
              </div>
            </div>

          <?php endwhile; ?>   
        </div>
      </div>
      </div>



      <div class="large-4 medium-4 columns">
        
        <h4>Upcoming Events</h4>
        <div class="callout">

          <?php echo do_shortcode("[ai1ec view='agenda']"); ?>
        </div>
        <h4>Reviews</h4>
          <div id='yelpwidget' class="callout">

        </div>
      </div>
    </div>


<?php get_footer(); ?>
