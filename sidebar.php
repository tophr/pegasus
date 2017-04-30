<div class="span3 sidebar">
	<ul class="subnav">
	<?php if( is_page() ) {
		if( !$post->post_parent ) {
			$pagelist = '<li><a href="'.  get_page_link($post->ID) .'">' . $post->post_title . '</a>';
			$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
			if( $children ) $pagelist .= '<ul>' . $children . '</ul>';
			$pagelist .= '</li>';
		}
		elseif( $post->ancestors ) {
			// get the top ID of this page. Page ids DESC so top level ID is the last one
			$ancestor = end($post->ancestors);
			$pagelist = wp_list_pages('title_li=&include='.$ancestor.'&echo=0');
			$pagelist = str_replace('</li>', '', $pagelist);
			$pagelist .= '<ul>' . wp_list_pages('title_li=&child_of='.$ancestor.'&echo=0') .'</ul></li>';
		}
		echo $pagelist;
	} ?>
	</ul>
<?php if (!is_page() && !is_page_template()) { ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
<?php }  ?>

</div>