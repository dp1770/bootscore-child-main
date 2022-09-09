<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * 
 * @version 5.2.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->

  <meta name="msapplication-TileColor" content="#F9423A">
  <meta name="theme-color" content="#F9423A">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <div id="page" class="site">

    <header id="masthead" class="site-header">

      <div class="fixed-top main-header pt-4">

        <nav id="nav-main" class="navbar px-md-4 px-3 ">

          <div class="container-fluid p-0">

            <!-- Navbar Brand -->
            
		<?php 	$d_logo = get_field('desktop_logo', 'option');
			
				$m_logo = get_field('mobile_logo', 'option');?>
			
			
			<a class="navbar-brand xs d-md-none" href="<?php echo esc_url(home_url()); ?>">
			
			<?php if($m_logo){?>
				
					<?php echo wp_get_attachment_image($m_logo, 'full', "", ["class" => "logo xs", "alt"=>"Logo"]);?>
					
			<?php }else{?>
			
					<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/logo.png" alt="logo" class="logo xs w-50">
			
			<?php }?>
			
			</a>
            
			<a class="navbar-brand md d-none d-md-block" href="<?php echo esc_url(home_url()); ?>">
				
				<?php if($d_logo){
					
					 echo wp_get_attachment_image($d_logo, 'full', "", ["class" => "logo md", "alt"=>"Logo"]);?>
					
			<?php }else{?>
				
					<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logo/logo.png" alt="logo" class="logo md">

			<?php }?>

			</a>

            <!-- Offcanvas Navbar -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar">
              <div class="offcanvas-header bg-primary text-white">
                <span class="h5 mb-0"><?php esc_html_e('Menu', 'bootscore'); ?></span>
                <button type="button" class="btn-close text-reset bg-white rounded-0 border-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body bg-light">
                <!-- Bootstrap 5 Nav Walker Main Menu -->
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'main-menu',
                  'container' => false,
                  'menu_class' => '',
                  'fallback_cb' => '__return_false',
                  'items_wrap' => '<ul id="bootscore-navbar" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                  'depth' => 2,
                  'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
                <!-- Bootstrap 5 Nav Walker Main Menu End -->
              </div>
            </div>


            <div class="header-actions d-flex align-items-center bg-primary">

              <!-- Top Nav Widget -->
              <div class="top-nav-widget">
                <?php if (is_active_sidebar('top-nav')) : ?>
                  <div>
                    <?php dynamic_sidebar('top-nav'); ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Searchform Large -->
              <div class="d-none d-lg-block ms-1 ms-md-2 top-nav-search-lg">
                <?php if (is_active_sidebar('top-nav-search')) : ?>
                  <div>
                    <?php dynamic_sidebar('top-nav-search'); ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Navbar Toggler -->
              <button class="nav-button py-2 ps-4 pe-5 bg-primary ms-1 ms-md-2 border-0 bg-none text-white position-absolute end-0 text-uppercase" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar"> <span class="d-none d-lg-inline">Menu</span> <img src="<?php echo get_stylesheet_directory_uri();?>/img/menu-icon.svg" alt="Menu">
              </button>

            </div><!-- .header-actions -->

          </div><!-- .container -->

        </nav><!-- .navbar -->

        <!-- Top Nav Search Mobile Collapse -->
        <div class="collapse container d-lg-none" id="collapse-search">
          <?php if (is_active_sidebar('top-nav-search')) : ?>
            <div class="mb-2">
              <?php dynamic_sidebar('top-nav-search'); ?>
            </div>
          <?php endif; ?>
        </div>

      </div><!-- .fixed-top .bg-light -->

    </header><!-- #masthead -->