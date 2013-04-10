<?php
	// Load custom libraries used in theme
	$btm_libraries =
		array(
			'themesetup',
			'theme-options',
			'debug',
			'filters',
			'shortcodes',
			'widgets',
			'featuredimages',
			'meta-boxes',
			'custom-post-types',
			'comments',
			'attachment-gallery',
			'plugins/btm-latest-posts',
			'plugins/btm-twitter-widget',
			'plugins/social-links'
		);
	foreach( $btm_libraries as $library ) {
		include_once( 'libraries/' . $library . '.php' );
	}
//Stylesheet directory
	// Theme and Version Information
	$btm_theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
	define('btm_THEME_NAME', $btm_theme_data['Title']);
	define('btm_THEME_AUTHOR', $btm_theme_data['Author']);
	define('btm_THEME_URI', $btm_theme_data['URI']);
	define('btm_THEME_VERSION', $btm_theme_data['Version']);
	define('btm_THEME_INFOLINE', btm_THEME_NAME . ' by ' . btm_THEME_AUTHOR . ' (' . btm_THEME_URI . ') v' . btm_THEME_VERSION);
	add_action('wp_footer','btm_display_themeinfo');
	function btm_display_themeinfo() {
		echo '<!-- ' . btm_THEME_INFOLINE . ' -->'; // Display for easier debugging remotely
	}
	// Fallback (Pre 3.0) menu system
	function btm_menu_fallback()
	{
		$menu = "<ul class='sf-menu'>";
		//$menu .= wp_list_pages('echo=0&title_li=');
		$menu .= "<li><a href='#'>" . __( 'Add a menu in Apperance, Menus', 'btm' ) . "</a></li>";
		$menu .= "</ul>";
		echo $menu;
	}
	// post->ID returns first post ID, need to correct on the blog page only
	function btm_corrected_post_id() {
		global $post;
		$post_id = null;
		if ( get_option('show_on_front') == 'page' && get_option('page_for_posts') && is_home() ) {
			$post_id = get_option('page_for_posts');
		} else {
			if ($post != null) {
				$post_id = $post->ID;
			}
		}
		return $post_id;
	}
	// return page number
	function btm_get_page_number() {
		global $post;
		if(get_query_var('paged')) {
			 $paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			 $paged = get_query_var('page');
		} else {
			 $paged = 1;
		}
		return $paged;
	}
	// Get Featured Image + Link
	function btm_get_featured_image( $img_size, $fallback ) {
		global $post;
		$btm_post_hide_featured_single = get_post_meta($post->ID, 'btm_post_hide_featured_single', true);
		if ( is_single() && $btm_post_hide_featured_single ) {
			return false;
		}
		if ( has_post_thumbnail() ) {
			$featured_image_link_to = get_post_meta($post->ID, 'featured_image_link_to', true);
			$featured_image_link_to_url = get_post_meta($post->ID, 'featured_image_link_to_url', true);
			if ( $featured_image_link_to_url ) {
				$featured_image_link = $featured_image_link_to_url;
			}else{
				if ( $featured_image_link_to == 'post' ) {
					$featured_image_link = get_permalink();
				}else if ( $featured_image_link_to == 'image' || !$featured_image_link_to ) {
					$featured_image_link = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$featured_image_link = $featured_image_link[0];
				}
			} // end if url set
			$featured_image = get_the_post_thumbnail($post->ID, $img_size, array( 'class' => '' ));
		}else{ // no thumbnail set
			$featured_image_link = get_permalink();
			$featured_image = $fallback;
		} // end if has featured image
		if ( has_post_thumbnail() ) {
			return "<div class='post-thumbnail clearfix'><a href='" . $featured_image_link . "'>" . $featured_image . "</a></div>";
		}
	}
	function custom_excerpt_length( $length ) {
  	return 50;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
  function new_excerpt_more( $more ) {
  	return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');
 // function btm_get_categories(){}
   add_filter('the_author', 'btm_author');
   function btm_author($author) {
     if ($author == 'admin') {
       return 'BTM Editors';
     } else {
       return $author;
     };
   }
function btm_social() {
  $twitter = get_option('twitter', false );
  $fb = get_option('facebook', false );
  $yt = get_option('youtube', false );
  $ret = '';
  if ($twitter) {
    $ret .= '<li><a href="http://twitter.com/'.$twitter.'">';
    $ret .= '<img src="'.get_template_directory_uri().'/images/social_icons/picons03.png">';
    $ret .= '<span class="social-text">Twitter</span></a></li>'."\n";
  };
  if ($fb) {
    $ret .= '<li><a href="http://www.facebook.com/'.$fb.'">';
    $ret .= '<img src="'.get_template_directory_uri().'/images/social_icons/picons06.png">';
    $ret .= '<span class="social-text">Facebook</span></a></li>'."\n";
  };
  if ($yt) {
    $ret .= '<li><a href="http://www.youtube.com/'.$yt.'">';
    $ret .= '<img src="'.get_template_directory_uri().'/images/social_icons/picons18.png">';
    $ret .= '<span class="social-text">YouTube</span></a></li>'."\n";
  };
  if (!($ret == '')) {
    $ret = '<div class="social-links">'."\n".'<ul class="social-links-list">'."\n".$ret;
    $ret .= '<li></li>';
    $ret .= '</ul></div>';
  };
    return $ret;
}
function btm_page_link($page, $cat) {
  return site_url().'?cat='.$cat.'&paged='.$page;
}
//add_action('pre_get_posts', 'url_fixer');
$content = add_filter('the_content', 'content');
function content($content) {
  return preg_replace('/<p[^>]*>([^a-zA-Z0-9]*[a-zA-Z0-9])/', '<div class="firs\
t_letter">${1}</div><p>', $content, 1);
};
?>
