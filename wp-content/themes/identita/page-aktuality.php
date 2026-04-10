<?php
/**
 * Template Name: PAGE AKTUALITY
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage identita
 * @since 1.0
 * * @version 1.0
 */

get_header(); ?>

 
<!-- LOGO -->
<?php include( 'template-parts/logo-small.php' ); ?>
<!-- LOGO -->

<!-- PAGE CONTENT -->
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>

	
<!-- aktuality -->
<div class="section-header section-header--aktuality" id="header_aktuality_ID">
	<div class="section-header--title_container scrollTab">
		<h2 class="section-header--title"><?php print strtolower(get_the_title()); ?></h2>
	</div>
</div>
<?php 
	endwhile; 
	wp_reset_postdata();
	endif;
?>

<?php
	$args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'aktuality, news',
        'posts_per_page' => -1,
    );
	$arr_posts = new WP_Query( $args );
             
	#$alltags = array();
	
	if ( $arr_posts->have_posts() ) : 
?>
<div class="section-content section-content--aktuality" id="content_aktuality_ID">
	<div class="inner-content-wrapper">
		<div class="news-list columns scroll-trigger">
<?php
		while ( $arr_posts->have_posts() ) : $arr_posts->the_post();
?>
			<div class="news-list--item column">
				<?php #the_time( get_option( 'date_format' ) ); ?>
				<p class="news-list--item_date minor"><?php echo get_the_date(); ?></p>
				<h3 class="news-list--item_title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<!-- <a href="<?php #the_permalink();?>" class="news-list--item_link btn-outline btn button-XS">→</a> -->
			</div>

<?php
		endwhile;
?>
		</div>
	</div>
</div>
<?php
	endif;
	wp_reset_query(); 
?>
<!-- aktuality content -->


	<?php get_footer(); ?>

	</body>
</html>


	
		
	<!-- <div class="news-list--item column">
		<p class="news-list--item_date minor">7. ledna 2023</p>
		<h4 class="news-list--item_title"><a href="#">Mrkněte na zbrusu nový trailer k&nbsp;televiznímu cyklu&nbsp;Identita</a></h4>
		<a href="aktuality.php" class="news-list--item_link btn-outline btn button-XS">→</a>
	</div> -->
</div>