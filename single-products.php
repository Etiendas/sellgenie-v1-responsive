<?php get_header();

?>
			
			<div id="content">
<!--
				
			<section class="products-head wrap clearfix">

				<div class="eightcol first clearfix">
					<?php displayFeatThumbnail('sg-600'); ?>
				</div>
				<div class="sidebar fourcol last clearfix" role="complementary">
					<h4 class="widgettitle">Product Information</h4>
				</div>

			</section>-->


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol first clearfix" role="main">
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
								<section class="entry-content clearfix" itemprop="articleBody">
										<?php the_content(); ?>
								</section> <!-- end article section -->

								<section class="sg-gallery">
									<?php get_product_images(); ?>
								</section>
								
								<footer class="article-footer">
									<?php the_tags('<p class="tags"><span class="tags-title icon-tag"></span> ', ', ', '</p>'); ?>
								</footer> <!-- end article footer -->
								
								<?php //comments_template(); ?>
		    						
								<span class="byline">
									<?php _e("Added", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> 
								</span>		
												
							</article> <!-- end article -->
			
							</div> <!-- end #main -->
					
							<?php get_sidebar(); ?>

							</div> <!-- end #inner-content -->					
						<?php endwhile; ?>			
					
						<?php else : ?>
					
							<article id="post-not-found" class="hentry clearfix alert-error">
					    		<header class="article-header">
					    			<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					    		</header>
					    		<section class="entry-content">
					    			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					    		</section>
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>