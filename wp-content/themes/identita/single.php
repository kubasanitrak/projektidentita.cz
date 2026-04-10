<?php
/**
 * Template Name: SINGLE POST
 *
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


		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( in_category('aktuality') || in_category('news') ) : ?>
				<?php include('template-parts/single-aktuality.php'); ?>
			<?php endif; ?>
		<?php endwhile; endif; ?>

	<?php get_footer(); ?>
</body>
</html>
