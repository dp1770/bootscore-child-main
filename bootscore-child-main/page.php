<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>


<div id="content" class="site-content container-fluid">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <div class="row">

        <main id="main" class="site-main p-0">

            <?php the_post(); ?>
			
			<!-- Hero Section Start -->
	  
			<?php		
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
			
			if( $featured_img_url ): ?>
				<section id="main-section">
					<div id="hero-img" class="m-md-3 m-2 text-center bg-image position-relative" style="background-image: url('<?php echo $featured_img_url?>');">
						<div class="h-100 m-auto container row align-items-center">
							<div id="hero" class="text-center text-white col-md-12 align-self-center">
								
								<?php the_title('<h1>', '</h1>'); ?>
								
								<div class="w-100 mt-3">
									<p class="d-inline-block arial px-3"><?php echo get_the_content(); ?></p>
								</div>
							</div>
						</div>				
					</div>
				</section>
			<?php else: ?>
			<div class="mt-5 pt-5 border-2 border-bottom border-primary">
			<div class="container">
				<div class="row">
				<!-- Title -->
				<?php the_title('<h1 class="text-center p-4">', '</h1>'); ?>
				<!-- Featured Image-->
				<?php bootscore_post_thumbnail(); ?>
				<!-- .entry-header -->
				
				<div class="entry-content">
					<!-- Content -->
					<?php the_content(); ?>
					<!-- .entry-content -->
				</div>
				</div>
			</div>
			</div>
		<?php endif;?>
		
		<!-- Hero Section End -->
          </div>

         
        </main><!-- #main -->

	</div>
</div><!-- #content -->

<?php
get_footer();
