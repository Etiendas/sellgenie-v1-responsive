	<section class="well">
		<div class="wrap clearfix">
			<?php if (is_front_page()) {
				echo "<p>\r\n";
				control_login_view();
				bloginfo('description') . "\r\n";
				echo "</p>\r\n";
			} ?>
			
	    <?php if (is_category()) { ?>
		    <h1 class="archive-title h2">
			    <span><?php _e("Posts Categorized:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
	    	</h1>
	    
	    <?php } elseif (is_tag()) { ?> 
		    <h1 class="archive-title h2">
			    <span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
		    </h1>
	    
	    <?php } elseif (is_author()) { 
	    	global $post;
	    	$author_id = $post->post_author;
	    ?>
		    <h1 class="archive-title h2">
		    	<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>
		    </h1>
	    <?php } elseif (is_day()) { ?>
		    <h1 class="archive-title h2">
					<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
		    </h1>

			<?php } elseif (is_month()) { ?>
  		    <h1 class="archive-title h2">
    	    	<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
	        </h1>
	
	    <?php } elseif (is_year()) { ?>
	        <h1 class="archive-title h2">
	    	    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
	        </h1>
	    <?php } elseif (is_post_type_archive()) { ?>
	        <h1 class="archive-title h2">
	    	    <span><?php _e("Current Inventory:", "bonestheme"); ?></span> 
	        </h1>
	    <?php } elseif ( ('products' == get_post_type() && !is_front_page() )|| (is_single() && !is_front_page()) ) { ?>
	        <h1 class="archive-title h2">
	    	    <span><?php _e(control_login_view(), "bonestheme"); ?></span>
	        </h1>
	    <?php } ?>    
		</div>
	</section>