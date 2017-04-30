<?php
/*
Template Name: Production
*/
get_header(); ?>

<div class="row">	
	<div id="primary" class="span9 site-content pull-right">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php
					if ( has_post_thumbnail() ) {
						
						the_post_thumbnail( array(380,9999), array( 'class' => 'alignright' ) );
						
						echo '<h1 class="entry-title">';
						echo the_title(); 
						echo '</h1>';
					}
					?>
					
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
						
						
						<?php if( have_rows('artists') ): ?>
							<h2>Artists</h2>
							<?php while( have_rows('artists') ): the_row(); ?>
								<?php 
									//vars
									$headshot = get_sub_field('headshot');
									$image = get_field('image');
									$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
									$bio = get_sub_field('bio');
									?>
							<div class="artist-bio">
								<div class="artist-headshot alignleft">
									<?php if( $headshot ) { echo wp_get_attachment_image( $headshot, $size ); } ?>
								</div>
								<?php echo $bio ?>
							</div>		
							<?php endwhile; ?>
						
						<?php endif; ?>
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