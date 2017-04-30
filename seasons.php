<?php
/*
Template Name: Seasons
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
					
					<?php $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID."    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>
					<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
					<div class="show">
						<div class="child-thumb alignleft"><a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>"><?php echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?></a></div>
						<div class="showdescription">
							<h3><a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>"><?php echo $pageChild->post_title; ?></a></h3>
							<?php echo $pageChild->post_excerpt; ?>
							<?php $excerpt = the_field( "season_listing_excerpt",$pageChild->ID );
								if( $value ) {									
									echo value;								
								} else {	 } ?>
						</div>
					</div>
					<?php endforeach;  endif; ?>			
			
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