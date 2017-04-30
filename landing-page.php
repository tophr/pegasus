<?php
/**
Template Name: Landing Page
 */

get_header(); ?>

<div class="row">
	<div class="span12">
		<?php the_post_thumbnail('landing-thumb'); ?>	
	</div>
</div>
<div class="row">	
	<div id="primary" class="span9 site-content pull-right">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="entry-div">											
						<h1 class="entry-title"><?php the_title(); ?></h1>							
					</div><!-- .entry-div -->			
				
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