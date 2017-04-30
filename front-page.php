<?php get_header(); ?>
<?php if( have_rows('theater') ): ?>
<div id="home-theater" class="carousel slide">
	<div class="carousel-inner">
		<?php 
			$rows = get_field('theater');
			$first = true;
			if($rows)
			{
			foreach ($rows as $row)
			{
				if ( $first )
				{
					echo '<div class="item active"><a href="' . $row['link'] . '"><img src=' . $row['background'] . '></a></div>';	
					//echo '<div class="item active"><a href="' . $row['link'] . '"><img src=' . $row['background'] . '><div class="caption">' . $row['caption'] . '<p class="btn btn-reversed">Learn More &raquo;</p></div></a></div>';	
					$first = false;
				}
				else
				{
					echo '<div class="item"><a href="' . $row['link'] . '"><img src=' . $row['background'] . '></a></div>';	
					//echo '<div class="item"><a href="' . $row['link'] . '"><img src=' . $row['background'] . '><div class="caption">' . $row['caption'] . ' <p class="btn btn-reversed">Learn More &raquo;</p></div></a></div>';								
				}
				}	
			}
			?>
	</div>
	 <!-- Controls -->
	<a class="carousel-control left" href="#home-theater" data-slide="prev">&lsaquo;</a>
  	<a class="carousel-control right" href="#home-theater" data-slide="next">&rsaquo;</a>
</div>
<?php endif; ?>
<?php if( have_rows('top_banners') ): ?>
<div class="row top_banners">
	<?php while( have_rows('top_banners') ): the_row(); ?>
	<?php 
				//vars
				$link = get_sub_field('link');
				$image = get_sub_field('image');
				$headline = get_sub_field('headline');
				$color = strtolower(get_sub_field('color'));
				?>
	<div class="span4">
		<div class="top-banner"> <a href="<?php echo $link ?>"><img src="<?php echo $image ?>" />
			<h4 class="<?php echo $color ?>"><?php echo $headline ?></h4>
			</a> </div>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="row">
	<div class="span12">
		<div <?php post_class() ?> id="our_story_copy">
			<?php the_post_thumbnail( '' ); ?>
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="row">
	<div class="span8 news-events">
			<?php
				$args = array(
				//'posts_per_page' => 1,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
			);
			
			$query = new WP_Query( $args );
			
			?>
			
			<?php if ( $query->have_posts() ) : ?>
			
				<!-- the loop -->
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>					
					<div class="news-item">
						<p class="news-headline h3">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<span class="date"><?php the_date(); ?></span></p>
						<?php the_post_thumbnail(); ?>	
						<?php the_content(); ?>
						<p><a href="<?php the_permalink(); ?>">Read more <span class="yellow">&raquo;</span></a></p>
					</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
			
				<?php wp_reset_postdata(); ?>
			
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>		
	</div>
	<div class="span4">
		<?php dynamic_sidebar( 'homepage-feature' ); ?>
	</div>	
</div>
<script>
		  !function ($) {
			if ( $(window).width() > 767) { 
			
			$(function(){
			  $('#heroBanner').carousel()
			})
			
			}
			else {
			   
			}
				
		  }(window.jQuery)
		</script>
<?php get_footer(); ?>
