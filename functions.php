<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'sg-1100', 1100, 9999, true );
add_image_size( 'sg-900', 900, 9999, true );
add_image_size( 'sg-600', 775, 9999, true );
add_image_size( 'sg-400', 400, 300, false );
add_image_size( 'sg-300', 345, 9999, false );
add_image_size( 'sg-150', 150, 50, true );
add_image_size( 'sg-100', 100, 100, true );
add_image_size( 'sg-60', 60, 60, true );

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
		
    register_sidebar(array(
    	'id' => 'footerbar1',
    	'name' => 'First Footer',
    	'description' => 'The first footer widget.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="h2">',
    	'after_title' => '</h2>',
    ));

    register_sidebar(array(
    	'id' => 'footerbar2',
    	'name' => 'Second Footer',
    	'description' => 'The second footer widget.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="h2">',
    	'after_title' => '</h2>',
    ));

    register_sidebar(array(
    	'id' => 'footerbar3',
    	'name' => 'Third Footer',
    	'description' => 'The third footer widget.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="h2">',
    	'after_title' => '</h2>',
    ));

    register_sidebar(array(
    	'id' => 'footerbar4',
    	'name' => 'Fourth Footer',
    	'description' => 'The fourth footer widget.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="h2">',
    	'after_title' => '</h2>',
    ));    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php 
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ 
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

//display thumbnails function
function displayFeatThumbnail($size = 'sg-300') {
	global $post;
	$id = $post->ID;
	
	if ( has_post_thumbnail($id) ) {
	  $html = "<a href=\"" . get_permalink( $id ) . "\" title=\"" . the_title_attribute('echo=0') . "\" >";
	  $html .= get_the_post_thumbnail($id, $size, array('title' => the_title_attribute('echo=0'), 'alt' => the_title_attribute('echo=0'), 'style' => 'max-width: 100%; height: auto;') ); 
	  $html .= "</a>";
	} else {
	  $html = "<a href=\"" . get_permalink( $id ) . "\" title=\"" . the_title_attribute('echo=0') . "\" >";
	  $html .= "<img src='" . get_template_directory_uri() . "/library/images/default-img.png' width='355' />"; 
	  $html .= "</a>";
	}
		echo $html;			
}
//filter the nav menu
add_filter('wp_nav_menu_items','search_box_function', 10, 2);
function search_box_function( $nav, $args ) {
  if( $args->theme_location == 'main-nav' ) {
		$navHTML = "<li id='menu-header-home'><a href='". home_url() ."' title='Return to Home Page' alt='Return to Home Page' class='icon-house' style='font-size: 20px; margin-top: 1px;'></a></li>\r\n";
		$navHTML .= $nav . "\r\n";
  	
  	return $navHTML;
	}
	return $nav;
}

add_action('wp_enqueue_scripts', 'sg_enqueue_custom'); 
function sg_enqueue_custom() {
	( is_singular('products') ) ? wp_enqueue_script('jquery') : '';
	( is_singular('products') ) ? wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/library/js/lightbox.js' ) : '';
}

add_action('pre_get_posts', 'query_multiple_posts_types', 1);
function query_multiple_posts_types( $q ) {
  if ( $q->is_main_query() && is_home() ) {
    $q->query_vars['posts_per_page'] = 3;
		$q->query_vars['post_type'] = array('products');
    return $q;
	}
}

function get_product_images() {
global $post;
$gallery = get_post_meta($post->ID, '_sg_gallery_loop', true);


$count = count($gallery);
	if ($count >= 1 && !empty($gallery)) {
	echo "<div class=\"screenshot-gallery clearfix\">\r\n";
	echo "<h2 class=\"h2\"><span class=\"icon-pictures\">&nbsp;</span>Image Gallery</h2>\r\n";
		for ($i=0; $i < $count; $i++) {
			
			$each_gal = $gallery[$i][_sg_gallery_image][src];

			$pattern = '<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>';
			$replacement = '<a$1href="$2-100x100$3" rel=\'Lightbox[gallery]$5>';

			$fixed_link = preg_replace($pattern, $replacement, $each_gal);
			$thumbnail = $fixed_link;
			
			$html = "<div class=\"single\">\r\n";
			$html .= "<a href=\"" . $each_gal . "\" rel=\"lightbox[gallery]\" title=\"" .$gallery[$i][_sg_gallery_image_desc] . "\" >\r\n";
			$html .= "<img src=\"" . $thumbnail . "\" class=\"thumbnails\"/>\r\n";
			$html .= "</a></div>\r\n";
		
			echo $html;
		}
							
	echo "</div>";
	
	} else {
		echo "<div class=\"screenshot-gallery clearfix\">\r\n";
		echo "\t\t<h2 class=\"h2\"><span class=\"icon-pictures\">&nbsp;</span>Image Gallery</h2>\r\n";
		echo "\t<div class='alert-info'>\r\n";
		echo "\t\t<p class='icon-cog'> No Product Images found, We've awoken the Genies.</p>\r\n";
		echo "\t</div>\r\n";
		echo "</div>\r\n";
	}
	
}

?>