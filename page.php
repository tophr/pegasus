<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>

<?php
if ( has_post_thumbnail() ) {
	echo '<div class="featured-image">';
	the_post_thumbnail();
	echo '<h1 class="entry-title">';
	
		if(get_field('custom_title')) {
			echo get_field('custom_title');
			} else { 
			echo the_title(); 
			} 
	
	echo '</h1></div>';
}
?>

<div class="row">	
	<div id="primary" class="span9 site-content pull-right">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php if ( !has_post_thumbnail() ) {
					echo '<div class="entry-div">											
						<h1 class="entry-title">'; 
						
						if(get_field('custom_title')) {
							echo get_field('custom_title');
							} else { 
							echo the_title(); 
							} 
						echo '</h1>							
					</div>';
					} ?>
				
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pegasus' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pegasus' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->					
			
					<div class="entry-meta">			
						<?php edit_post_link( __( 'Edit', 'pegasus' ), '<span class="edit-link">', '</span>' ); ?>						
					</div><!-- .entry-meta -->
				</article><!-- #post -->
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>