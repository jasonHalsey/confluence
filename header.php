<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confluence Fly Shop</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
    <?php wp_head(); ?>
  </head>
<body>
<div class="fixed_nav">
  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar" id="main-menu">
	  <div class="top-bar-left">
	    <ul class="dropdown menu" data-dropdown-menu>
	      <li class="menu-text">Site Title</li>
	    </ul>
	  </div>
	  <div class="top-bar-right">
	    <?php wp_nav_menu( array( 'menu_id' => 'menu', 'theme_location' => 'primary-menu', 'menu_class' => 'show', 'container' => false ) ); ?>
	  </div>
	</div>
</div>