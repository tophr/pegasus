<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="//use.typekit.net/eaj0qum.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<?php wp_head(); ?>
<?php include_once("inc/analyticstracking.php") ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<header>
	<div class="container">
		<div class="row">
			<div class="span7">
				<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php dynamic_sidebar( 'sidebar-header' ); ?>
				<h2 class="tagline"><?php bloginfo('description'); ?></h2>
			</div>
			<div class="span5 header-utility">
				<?php get_search_form(); ?>
				<div class="ordering-links">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display: inline-block;">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="P28ULGFE6PF9U">
					<input type="submit" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Donate" class="btn btn-primary">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<a href="https://web.ovationtix.com/trs/cal/216" target="_blank" class="btn btn-primary">Buy Tickets</a> 
				</div>
				<div class="social-links">
					<ul><li><a href="https://twitter.com/PegasusThtrChi" target="_blank" class="social-twitter">Twitter</a></li></ul>
					<a href="https://www.facebook.com/PegasusChicago" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ico-facebook.png" alt="Like us on facebook"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="navbar-stripe">
		<div class="container">
			<nav class="navbar">
				<div class="navbar-inner"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<div class="nav-collapse collapse">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'walker' => new twitter_bootstrap_nav_walker()) ); ?>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- #site-navigation --> 
</header><!-- #masthead -->
<div class="clearfix"></div>
<div class="content">
	<div class="container">