<?php
/*
Template Name: Gallery
*/
get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<?php if( get_field('gallery') ): ?>
		<div id="gallery_large">
			<div id="gallery_slider">
				<?php while( has_sub_field('gallery') ): ?>
				<div>
					<?php if(get_sub_field('gallery_link')): ?>
					<a href="<?php the_sub_field('gallery_link'); ?>" target="_self">
					<?php endif; ?>
					
					<?php $attachment_id = get_sub_field('gallery_image');
					$size = "gallery"; 
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php the_sub_field('gallery_headline'); ?>" />
					
					<div class="bx-caption">
						<?php if(get_sub_field('gallery_headline')): ?>
						<h3><?php the_sub_field('gallery_headline'); ?></h3>
						<?php endif; ?>	
						<p class="portfolio-link">View Portfolio &rarr;</p>				
					</div>
					<?php if(get_sub_field('gallery_link')): ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
		<div>
		<h1><?php the_title(); ?></h1>
			<?php if(get_field('product_service')): ?> 
					<ul class="services-list">				 
					<?php while(has_sub_field('product_service')): ?>
				 
						<div class="service_list <?php $classname = get_sub_field('title'); $classclean = str_replace(" ", "-", $classname); echo strtolower($classclean); ?>">
							<a href="<?php the_sub_field('link'); ?>">
							<h2><?php the_sub_field('title'); ?></h2>
							<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
							</a>						
						</div>
				 
					<?php endwhile; ?>
				 
					</ul>
				 
			<?php endif; ?>	
			
			<?php the_content(); ?>
			
		</div>
		
		<?php endwhile; ?>
		<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
	<!-- end left-col copy --> 
	
</div>
<?php get_footer(); ?>