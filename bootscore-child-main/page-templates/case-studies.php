<?php

/**
 * Template Name: Case Studies Lists
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header(); ?>

<div id="content" class="site-content container-fluid">

  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
	
    <?php bs_after_primary(); ?>

    <div class="row">

        <main id="main" class="site-main p-0">

            <?php the_post(); 
			
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
			
			if( $featured_img_url ): ?>
				
				<!-- Hero Section Start -->
				
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

				<!-- Hero Section End -->

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
			
        </main><!-- #main -->
		
	</div>
		<!--- Case Studies Gallery Start ---->	
		<?php 
			$args = array(
				'post_type' => 'case_studies',
				'posts_per_page' => -1,
			);
				 
			$query = new WP_Query($args);
			
			$terms = get_terms( array( 
				'taxonomy' => 'categories',
				'parent'   => 0
			));?>

	 <div class="container py-4">
	 
        <div class="row gap-md-0 gap-3">

			<div class="col-md-8">
			
				<div class="case-filter" id="dropdown">
				
					<div class="filter-btn bg-primary btn d-md-none d-block w-100 border-0">
					
						<a href="#" class="text-white text-uppercase">Filters </a>
						<i class="fa fa-chevron-down text-white float-end pt-2"></i>
						<a class="toggle" href="#dropdown"></a>
						
						
					</div>

					<div id="cat-list" align="left" class="itens">
						
						<button class="btn btn-light filter-button" data-filter="all">All</button>
					
					<?php foreach ( $terms as $taxonomies ){?>
										
							<button class="btn btn-light filter-button" data-filter="<?php echo $taxonomies->slug;?>">
								
								<?php echo $taxonomies->name;?>
							
							</button>
						
					<?php }?>
					
					</div>
					
				</div>
				
			</div>

			<div class="col-md-4">
			
				 <form class="search" action="<?php echo home_url( '/' ); ?>">
					
					<div class="input-group justify-content-end d-flex">
					  
						<div class="form-outline w-100">
						
							<input name="s" type="search" id="form1" class="fs-6 border-0 form-control rounded-0 bg-light text-uppercase py-2" placeholder="search for a case study..." />
					  
						</div>
					   
							<input type="hidden" name="post_type" value="case_studies">
					  
						<button type="submit" class="btn site-button py-1 position-absolute top-1 h-100" value="Search">
						
							<i class="fas fa-search"></i>
						
						</button>
				
					</div>
					
				</form>
				
			</div>
			
     	</div>
		
	</div>   
	
</div>

</div>

	<div class="container-fluid bg-light">
		
	<?php	if($query->have_posts()):?>
			
				<div class="container d-flex py-4 gap-md-5 gap-3 row m-auto">
					
			<?php 	while($query->have_posts()):
			
						$query->the_post();

						$taxonomies = get_object_taxonomies( 'case_studies', 'categories' );

						$cat_name = array();
						
						$cat_slug = array();
						
						foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

							// Get the terms related to post.
							$terms = get_the_terms( $post->ID, $taxonomy_slug );

							if ( ! empty( $terms ) ) {
								
								foreach ( $terms as $term ) {
								
									$cat_name[] = '<div class="btn bg-primary text-white">'.esc_html( $term->name ).'</div>';
									
									$cat_slug[] = esc_html( $term->slug );
								
								}
							}
						}
						
						$cat = implode( ' ', $cat_name );
						
						$cat_class = implode( ' ', $cat_slug );?>
						
					<div class="case-study filter card col-md-3 flex-lg-fill bg-transparent border-0 <?php echo $cat_class?>">
						
						<a href="<?php echo get_permalink();?>">
							
							<?php echo get_the_post_thumbnail(get_the_id(),array( 386, 234));?>
						
						</a>
						
						<div class="card-body px-0">
							
							<h5 class="card-title pb-3 fs-4">
								
								<a href="<?php echo get_permalink();?>" class="text-dark">
								
									<?php echo get_the_title()?>

								</a>
								
							</h5>
							
							<div class="text-uppercase">
							
								<?php echo $cat?>
							
							</div>
							
							<div class="border-start border-3 border-primary ps-4 my-4">
							
								<?php echo get_the_excerpt();?>

							</div>
							
							<a href="<?php echo get_permalink();?>" class="btn site-button py-2 px-3">
								
								READ MORE <i class="fa fa-arrow-right"></i>
							
							</a>
							
						</div>

					</div>
					
					<?php endwhile;?>
					
				</div>
				
				<?php wp_reset_postdata();
				
			endif;?>		
    </div>

<?php
get_footer();
