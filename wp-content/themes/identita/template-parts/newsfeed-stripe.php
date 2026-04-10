<?php
/**
 * Displays top newsfeed stripe
 *
 * @package WordPress
 * @subpackage identita
 * @since 1.0
 * * @version 1.0
 */

?>
<style>
	
</style>
	<?php
		$args = array( 
    		'post_type' => 'post',
        	'post_status' => 'publish',
        	'category_name' => 'aktuality, news',
        	'posts_per_page' => -1,
    	);
		$news_query = new WP_Query( $args );

			if ( $news_query->have_posts() ) : 
				?>
			<div class="newsrun" id="newsrunID">

				<div class="marquee-content" duration="10" wb-data="marquee">
    
					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
			            <div class="newsrun--item">
			                <p class="newsrun--item_title plain"><?php the_title(); ?></p>
			                <a href="<?php echo get_permalink(); ?>" class="newsrun--item_link abs-link"></a>
			            </div> <!-- END NEWSRUN ITEM -->
					<?php endwhile; ?>

				</div>
				<!-- DUPLICATE ITEMS TO PROVIDE INFINITE STRIPE WITHOUT GAP -->
				<div class="marquee-content" aria-hidden="true" duration="10" wb-data="marquee">
					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
			            <div class="newsrun--item">
			                <p class="newsrun--item_title plain"><?php the_title(); ?></p>
			                <a href="<?php echo get_permalink(); ?>" class="newsrun--item_link abs-link"></a>
			            </div>
					<?php endwhile; ?>
				</div>
				<!-- DUPLICATE ITEMS TO PROVIDE INFINITE STRIPE WITHOUT GAP -->

			</div>
		<?php
			endif;
		

		wp_reset_query();
	?>