<?php
/*
	 * Template Post Type: case_studies
	 */

get_header();  ?>


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
	
</div>

</div>

	
	
<?php $content = get_field('content');

if( $content ):

	$row_num = 1;
	
	while ( have_rows( 'content' ) ) : the_row();
	
	//$row_class = (++$row_num % 2) ? 'even' : 'odd';
	
		if($row_num % 2 == 0){
			$order_1 = "order-md-2 order-1 ps-md-5"; 
			$order_2 = "order-md-1";
			$bg = "bg-light";
		}
		else{
			$order_1 = "order-md-1 order-2 pe-md-5"; 
			$order_2 = "order-md-2 order-1 text-end";
			$bg ="";
		}?>
				
	<div class="container-fluid py-md-5 pt-5 <?php echo $bg;?>">
	
		<div class="container">
		
		<div class="row d-flex align-items-center py-md-4">
	
		<div class="col-md-7 py-md-0 py-4 <?php echo $order_1;?>">
		
			<div class="card-body px-0">
							
				<h4 class="text-primary pb-0 fs-1 text-uppercase">
					
						<?php echo get_sub_field('title');?>
					
				</h4>
				
				<div class="border-start border-3 border-primary ps-4 my-md-4 mt-4">
					
					<?php echo get_sub_field('descrription');?>
					
				</div>
				
			</div>
			
		</div>
		
		<div class="col-md-5 <?php echo $order_2;?>">
		
			<?php $thumb = get_sub_field('thumb');
			
				if( !empty( $thumb ) ):
				
						echo wp_get_attachment_image( $thumb, 'full' );
						
				endif;?>
			
		</div>
		
		</div>
		
	</div>
	
</div>
	<?php $row_num++;
	endwhile;
 endif;?>


<!-- Related Case Studies Section Start -->

		<section id="case-studies" class="py-3 bg-primary text-white">
		
			<div class="container pt-5">
			
				<h4 class="text-uppercase">Other Case Studies</h4>
				
				<?php 
					$productterms = wp_get_object_terms( $post->ID, 'categories', array('fields' => 'ids') );
					
					$args = array(
						'post_type' => 'case_studies',
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'tax_query' => array(
								array(
									'taxonomy' => 'categories',
									'field'    => 'id',
									'terms'    => $productterms,
								),
							),
						'post__not_in' => array ($post->ID),
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
							
								<a href="<?php echo get_permalink();?>" class="text-white">
									
									<?php echo get_the_title()?>
								</a>
							</h5>
							
							<div class="border-start border-3 border-white ps-4 mb-2 mb-4">
							
								<?php echo get_the_excerpt();?>

							</div>
							
							<a href="<?php echo get_permalink();?>" class="btn btn-light text-primary py-2 px-3">
							
								READ MORE <i class="fa fa-arrow-right"></i>
							
							</a>
						
						</div>
					
					</div>

					<?php endwhile;?>

				</div>

			<?php wp_reset_postdata(); 

				endif;?>
			</div>
			
		</section>
		<?php //endif;?>
		<!-- Case Studies Section End -->



<?php get_footer(); ?>