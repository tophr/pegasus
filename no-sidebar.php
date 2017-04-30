<?php 
/*
Template Name: No Sidebar
*/
get_header(); ?>

	<div id="content">
		
		<div class="twelve_col">
		
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<h1><?php  the_title(); ?></h1>
			
			<?php the_content(); ?>
		
	
		
		<?php endwhile; ?>

		<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
		</div>		
	</div><!-- end left-col --> 

</div>

<?php get_footer(); ?>
