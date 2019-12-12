<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <!-- Basic Page Needs -->
  <meta charset="utf-8">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

  <?php
    $content_link_color = get_option('content_link_color');
  ?>
  <style>
    a { color: <?php echo $content_link_color; ?>; }
    .logo-strip-text a { color: <?php echo $content_link_color; ?>; }
  </style>

  <?php wp_head(); ?> 

</head>

<body <?php body_class(); ?>>

  <!-- HEADER ELEMENTS -->
  
  <div class="head-to-foot-wrap">
  <div id="top-menu-bottom-border"
        <?php if (get_option('buso_use_top_menu') == 1) : ?> style="display:none;"> <?php else : ?> > <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="twelve columns">
        <?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'top-menu', 'fallback_cb' => false ) ); ?>
      </div>
    </div>
  </div>
  </div>
  
  <div class="container">
      <div class="logo-strip">
          <div class="logo-strip-text">
             <a href="<?php echo home_url(); ?>">
                 <?php if (get_option('buso_use_logo_image') == 1) : ?>
                     <img src="<?php echo esc_url(get_option('buso_logo_pic')); ?>" />
                 <?php else : ?> 
                     <?php bloginfo('name'); ?>
                 <?php endif; ?>
             </a>
          </div>
      </div>
  </div>

  <div class="header-menu">
	<div class="container menu-container">
	  <span class="mobile-only">Menu</span>
	  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => '', 'fallback_cb' => false ) ); ?>
	</div>
  </div>