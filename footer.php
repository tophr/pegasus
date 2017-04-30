<?php
/**
 * The template for displaying the footer.
 */
?>

		</div><!-- end content -->
	</div><!-- end container -->
	<div class="push"></div>
</div><!-- end wrapper -->
<footer class="footer">
	<div class="container">		
		<div class="clearfix"></div>
		<div class="row">
			<div class="span3 footer-left">	
				<p><a href="https://www.facebook.com/PegasusChicago" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ico-facebook-rev.png" alt="Like us on facebook"></a></p>			
				<?php dynamic_sidebar( 'footer-left' ); ?>
				<p>&copy; <?php echo date("Y") ?> <?php echo bloginfo("name") ?><br>
				All rights reserved.</p>
			</div>
			<div class="span7">
				<div class="footer-nav">				
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu', 'container' => false ) ); ?>
				</div>
			</div>	
			<div class="span2 footer-right">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/pegasus_logo_footer.png" alt="<?php bloginfo( 'name' ); ?>"></a>
				<?php dynamic_sidebar( 'footer-right' ); ?>
			</div>		
		</div>
	</div>
	<?php wp_footer(); ?>	
</footer>
</body>
</html>