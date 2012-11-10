<?php get_header(); 
//set modulus
$mz = 1;
?>
			
			<div id="content" class="featured">
			
				<div id="inner-content" class="wrap clearfix">
					<div class="text">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/featured-text.png" />
					</div>
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				    <?php 
				    	($mz%4 === 1 || $mz === 1) ? $mpoz = 'first ' : $mpoz = '' ;
							if ($mz%3 === 0) $mpoz = 'last ';
							$mz++; 
						?>	
					    <div id="main" class="fourcol <?php echo $mpoz; ?>clearfix" role="main">

					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix media'); ?> role="article">

						    <section class="entry-content clearfix">
								<?php displayFeatThumbnail('sg-300'); ?>
						    </section> <!-- end article section -->
						
						    <section class="article-footer">

							    <h1 class="h2">
							    	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							    		<?php the_title(); ?>
							    		<span class="icon-untitled" style="padding: 1px;"></span>
							    	</a>
						    	</h1>

    							<!--p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p-->

						    </section> <!-- end article footer -->
						    
						    <?php // comments_template(); // uncomment if you want to use them ?>
					
					    </article> <!-- end article -->

					    </div> <!-- end #main -->
				
					    <?php endwhile; ?>	
					
			        <?php if (function_exists('bones_page_navi')) { ?>
					            <?php bones_page_navi(); ?>
					        <?php } else { ?>
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
					    <?php else : ?>
					    
					        <article id="post-not-found" class="hentry clearfix">
					            <header class="article-header">
					        	    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					        	</header>
					            <section class="entry-content">
					        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					        	</section>
					        	<footer class="article-footer">
					        	    <p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
					        	</footer>
					        </article>
					
					    <?php endif; ?>
			
    
				    <?php //get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
