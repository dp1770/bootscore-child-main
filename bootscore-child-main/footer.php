<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0
 */

?>


<footer>
<?php if( have_rows('quick_contact', 'option') ): ?>
			
			<?php while( have_rows('quick_contact', 'option') ) : the_row();
				
					$quick_contact_image = get_sub_field('quick_contact_image');?>
					
					<div class="quick-contact position-fixed end-0">
						<a href="<?php echo the_sub_field('page_link');?>">
							<?php echo wp_get_attachment_image( $quick_contact_image, 'full' );?>
						</a>
					</div>
				
				<?php endwhile;
			
	endif;?>
	
  <div class="bootscore-footer bg-white pt-5 pb-3">
    <div class="container">


     <div class="row gap-md-0 gap-2 text-md-start text-center">

		<!-- Footer 1 Widget -->
		<div class="col-md-6 col-lg-3">
			<!-- Top Footer Widget -->
			
			<?php if (is_active_sidebar('top-footer')) : ?>
			
				<div class="footer-logo">
				
					<?php dynamic_sidebar('top footer'); ?>
				
				</div>
			
			<?php endif; ?>
			
			<!-- Social Section Start -->
		
		<?php if( have_rows('social_links', 'option') ): ?>
		
			<?php while( have_rows('social_links', 'option') ) : the_row(); ?>
			
					<ul id="social_icons" class="col-md-12 d-flex justify-content-md-start justify-content-center p-2 gap-2 my-2">
					
						<?php if(get_sub_field('instagram')): ?>

							<li class="align-items-center">

								<a href="<?php the_sub_field('instagram'); ?>" target="_blank" class="d-flex h-100 align-items-center">

									<i class="fa-brands fa-instagram text-dark fa-xl"></i>

								</a>

							</li>

						<?php endif;
						
						if(get_sub_field('facebook')): ?>

							<li class="align-items-center">

								<a href="<?php the_sub_field('facebook'); ?>" target="_blank" class="d-flex h-100 align-items-center">

									<i class="fa-brands fa-facebook text-dark fa-xl"></i>

								</a>

							</li>

						<?php endif;
						
						if(get_sub_field('linkedin')): ?>					

							<li class="align-items-center">

								<a href="<?php the_sub_field('linkedin'); ?>" target="_blank" class="d-flex h-100 align-items-center">

									<i class="fa-brands fa-linkedin text-dark fa-xl"></i>

								</a>

							</li>

						<?php endif;
						
						if(get_sub_field('twitter')): ?>

							<li class="align-items-center">

								<a href="<?php the_sub_field('twitter'); ?>" target="_blank" class="d-flex h-100 align-items-center">

									<i class="fa-brands fa-twitter text-dark fa-xl"></i>

								</a>

							</li>

						<?php endif;?>

					</ul>
				
			<?php endwhile; ?>

		<?php endif; ?>
			
		</div>

        <!-- Footer 1 Widget -->
        <div class="col-md-6 col-lg-2">

          <?php if (is_active_sidebar('footer-1')) : ?>

            <div>

              <?php dynamic_sidebar('footer-1'); ?>

            </div>

          <?php endif; ?>
		  
        </div>

        <!-- Footer 2 Widget -->

        <div class="col-md-6 col-lg-3">

          <?php if (is_active_sidebar('footer-2')) : ?>

            <div>

              <?php dynamic_sidebar('footer-2'); ?>

            </div>

          <?php endif; ?>

        </div>

        <!-- Footer 3 Widget -->
        <div class="col-md-6 col-lg-2">

          <?php if (is_active_sidebar('footer-3')) : ?>

            <div>

              <?php dynamic_sidebar('footer-3'); ?>

            </div>

          <?php endif; ?>

        </div>

        <!-- Footer 4 Widget -->
        <div class="col-md-6 col-lg-2 last-widget">

          <?php if (is_active_sidebar('footer-4')) : ?>

            <div>

              <?php dynamic_sidebar('footer-4'); ?>

            </div>

          <?php endif; ?>

        </div>
		
      </div>
	
	<div class="bootscore-info text-muted border-top py-2 border-primary text-center">

		<div class="container">

			<div class="row">

				<div class="col-md-4 text-md-start ps-md-0">
					
					<div class="copyright ps-md-0">&copy;&nbsp;<?php bloginfo('name'); ?> <?php echo Date('Y'); ?></div>
				
				</div>
				
				<div class="col-md-5 text-center">
					
				 <?php  wp_nav_menu(array(
							'theme_location' => 'footer-menu',
							'container' => false,
							'menu_class' => '',
							'fallback_cb' => '__return_false',
							'items_wrap' => '<ul id="footer-privacy-menu" class="nav justify-content-center text-secondary %2$s">%3$s</ul>',
							'depth' => 1,
							'walker' => new bootstrap_5_wp_nav_menu_walker()
						));?>
						
				</div>
				
				<div class="col-md-3 text-md-end pe-md-0">
				
				<?php if( have_rows('site_by', 'option') ): ?>
				
				<?php while( have_rows('site_by', 'option') ) : the_row();?>
					
					<a href="<?php the_sub_field('link'); ?>" target="_blank" class="site_by pe-md-0">
						<?php the_sub_field("by_text");?>
					</a>
					
				<?php endwhile;
				
				endif;?>
				
				</div>
				
			</div>
			
		</div>
		
	</div>

    </div>

</div>

  

</footer>

<!-- To top button -->
<!--<a href="#" class="btn btn-primary shadow top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>-->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>