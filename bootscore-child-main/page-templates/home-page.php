<?php

/**
 * Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content">

  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">

      <div class="entry-content">
	  <!-- Hero Section Start -->
	  
	  <section>
      
		<?php the_post(); 
		
		$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
				
		<?php $hero = get_field('main_banner_group');
		
		if( $hero ): 
		
			while ( have_rows( 'main_banner_group' ) ) : the_row();?>
		
			<div id="hero-img" class="m-md-3 m-2 text-center bg-image position-relative" style="background-image: url('<?php echo 	$featured_img_url?>');">
			
				<div class="h-100 m-auto container row align-items-center">
				
					<div id="hero" class="text-center text-white col-md-12 align-self-center">
						
						<h1><?php echo $hero['title']; ?></h1>
						
						<div class="w-100 mt-3">

							<p class="d-inline-block arial px-3"><?php echo $hero['short_description']; ?></p>

						</div>
						
						<a href="<?php echo esc_url( $hero['button_link'] ); ?>" class="btn site-button">

							<?php echo esc_html( $hero['button_text'] ); ?> <i class="fa fa-arrow-right"></i>

						</a>
					
					</div>

				</div>				

					<?php if( have_rows('certificate') ): ?>

					<div class="position-absolute certificate col-md-3 col-9 ">
							
							<ul class="d-flex pb-2">
						
								<?php while( have_rows('certificate') ): the_row(); 
									
									$image = get_sub_field('certificate_icon');
									
									if( !empty( $image ) ):?>
									
										<li class="flex-fill pe-4">

											<?php echo wp_get_attachment_image( $image, 'full' ); ?>

										</li>
									
									<?php endif;

								endwhile; ?>
						
							</ul>
					</div>

				<?php endif; ?>

				</div>
				
		<?php endwhile;

		endif; ?>

	</section>
	<!-- Hero Section End -->
		 
	<!-- Social Section Start -->
	<?php if( have_rows('social_links', 'option') ): ?>

		<?php while( have_rows('social_links', 'option') ) : the_row(); ?>

			<section id="social-section" class="d-flex flex-wrap justify-content-start py-3 mb-3 container-fluid w-100 px-0">

				<div class="col-md-3 col-7 bg-primary">

					<p class="text-white gotham px-3 mb-0 py-3 px-2">FOLLOW US ON SOCIAL MEDIA </p>

				</div>

				<ul id="social_icons" class="col-md-8 col-5 d-flex justify-content-end bg-light p-2 gap-2 my-2">
						
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

				</section>

			<?php endwhile; ?>

		<?php endif; ?>
		
		<!-- Carousel Slider Start -->
		<?php $carousel = get_field('image_carousel');
		
		if( $carousel ): ?>
		
		<section id="home-carousel" class="pt-2 pb-md-5">

			<div class="owl-carousel owl-theme">

			<?php $i = 1;

			while ( have_rows( 'image_carousel' ) ) : the_row();?>
				
				<?php $slid_image = get_sub_field('image');

					if( !empty( $slid_image ) ):?>

						<div>
						
							<?php echo wp_get_attachment_image( $slid_image, 'full' ); ?>

						</div>
				<?php $i++;

				endif;

			endwhile;?>

			</div>

		</section>

		<?php endif;?>
		<!-- Carousel Slider End -->
		
		<!-- About Section Start -->
		<?php $about_section = get_field('about_section');
		
		if( $about_section ):?>

		<section id="about-section" class="pt-4 pb-md-5 mb-4">

			<div class="container">

				<div class="row">
					
					<?php while ( have_rows( 'about_section' ) ) : the_row();?>
					
					<div class="col-md-7 order-md-2 py-3 py-md-0">
						
					<?php $video_thumb = get_sub_field('video_thumb');
							
						if( !empty( $video_thumb ) ):?>
						
							<div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#about_video">

								<?php echo wp_get_attachment_image( $video_thumb, 'full' ); ?>

							</div>
								
							<!-- Modal -->
							<div class="modal fade modal-lg" id="about_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

							  <div class="modal-dialog">

								<div class="modal-content bg-transparent border-0">

								  <div class="modal-header border-0 p-2">

									<button type="button" class="btn-close bg-white rounded-0 border-0" data-bs-dismiss="modal" aria-label="Close"></button>

								  </div>

								  <div class="modal-body p-0">

									<?php echo get_sub_field('video_embed_code');?>

								  </div>

								</div>

							  </div>

							</div>

						<?php endif;?>

					</div>
					
					<div class="col-md-5 order-md-1 py-3 py-md-0">
						
						<h2 class="text-primary pb-2">

							<?php echo get_sub_field('title');?>

						</h2>
						
						<div class="about-desc border-start border-3 border-primary ps-4 fs-5">

							<?php echo get_sub_field('description');?>

						</div>
					
					</div>
					
					<?php endwhile;?>

				</div>

			</div>

		</section>

		<?php endif;?>
		<!-- About Section End -->
		
		<!-- Case Studies Section Start -->

		<section id="case-studies" class="py-4 bg-primary text-white mt-5">

			<div class="container pt-4">

				<h4>Case Study</h4>

				<?php $args = array(
						'post_type' => 'case_studies',
						'posts_per_page' => 3,
						);
					 
					$query = new WP_Query($args);
					 
					if($query->have_posts()):?>

				<div class="d-flex py-4 gap-md-5 gap-3 row">
					
				<?php while($query->have_posts()):

						$query->the_post();?>

					<div class="case-study card col-md-3 flex-lg-fill bg-transparent border-0">

						<a href="<?php echo get_permalink();?>">

							<?php echo get_the_post_thumbnail(get_the_id(),array( 386, 234));?>

						</a>

						<div class="card-body px-0">

							<h5 class="card-title pt-2 pb-3">

								<a href="<?php echo get_permalink();?>" class="text-white"><?php echo get_the_title()?></a>

							</h5>

							<div class="border-start border-3 border-white ps-4 mb-2 mb-4"><?php echo get_the_excerpt();?></div>

							<a href="<?php echo get_permalink();?>" class="btn btn-light text-primary py-2 px-3">READ MORE <i class="fa fa-arrow-right"></i></a>
						
						</div>

					</div>

					<?php endwhile;?>

				</div>

				<?php wp_reset_postdata(); 

					endif;?>

			</div>
			
		</section>
		<!-- Case Studies Section End -->
		
		<!-- Call to Action Section Start -->
	  <section id="call-to-action">
        	
		<?php $call_to_action = get_field('call_to_action');
		
		if( $call_to_action ): 
		
			while ( have_rows( 'call_to_action' ) ) : the_row();
			
				$background_image = get_sub_field('background_image');?>
									
				<div id="call-to-img" class="m-md-3 m-2 text-center bg-image position-relative" style="background-image: url('<?php echo $background_image?>');">

				<div class="h-100 m-auto container row align-items-center">

					<div id="hero" class="text-center text-white col-md-12 align-self-center">
						
						<h2><?php echo get_sub_field('title'); ?></h2>
						
						<div class="w-100 mt-3">

							<p class="d-inline-block arial px-3"><?php echo get_sub_field('short_description'); ?></p>

						</div>
						
						<a href="<?php echo esc_url( get_sub_field('button_link') ); ?>" class="btn site-button">

							<?php echo esc_html( get_sub_field('button_text') ); ?> <i class="fa fa-arrow-right"></i>

						</a>
					
					</div>

				</div>
				
			</div>				
				
		<?php endwhile;
		endif; ?>
		
		</section>
		<!-- Call to Action End -->
		
		</div>
        
		<?php the_content(); ?>
        
    </main><!-- #main -->

	  </div>
	  
  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();