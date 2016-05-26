<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700|Roboto:400,700' rel='stylesheet' type='text/css'>
    <title>Confluence Fly Shop</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
<?php get_template_part( 'inc/options'); ?>
<div class="fixed_nav">
  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
  <img class="show-for-small-only" src="<?php echo bloginfo('template_directory'); ?>/images/title_shield.svg" alt="Confluence Fly Shop"/>
    <button class="menu-icon" type="button" data-toggle></button>

    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar" id="main-menu">
	  <div class="top-bar-left">
	    <ul class="dropdown menu" data-dropdown-menu>
        <li class="title_logo hide-for-small-only">
          <a href="<?php echo home_url( '/' ); ?>">
            <img src="<?php echo bloginfo('template_directory'); ?>/images/title_shield.svg" alt="Confluence Fly Shop"/>
          </a>
        </li>
	    </ul>
	  </div>
	  <div class="top-bar-right">
      <div id="phone_container" class="hide-for-small-only">
        <?php echo $GLOBALS['phone_number'] ?>
      </div>
	    <?php wp_nav_menu( array( 'menu_id' => 'menu', 'theme_location' => 'primary-menu', 'menu_class' => 'show', 'container' => false ) ); ?>
	  </div>
	</div>
</div>