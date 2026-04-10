<?php
/**
 * Template Name: PAGE CONTACT
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

			
		<!-- contact -->
		<div class="section-header section-header--tvurci" id="header_kontakt_ID">
			<div class="section-header--title_container scrollTab">
				<h2 class="section-header--title"><?php print strtolower(get_the_title()); ?></h2>
			</div>
		</div>

		<!-- kontakt content -->
		<div class="section-content section-content--contact" id="content_kontakt_ID">
			<div class="inner-content-wrapper">
				<?php the_content(); ?>
			</div>
		</div>
<?php 
	endwhile; 
	wp_reset_postdata();
	endif;
?>

	<?php get_footer(); ?>

	</body>
</html>