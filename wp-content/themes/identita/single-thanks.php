<?php
/**
 * Template Name: single-thanks
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage identita
 * @since 1.0
 * * @version 1.0
 */

get_header(); ?>

<style>
</style>

<div class="wrapper">

 
<!-- LOGO -->
<?php include( 'template-parts/logo-small.php' ); ?>
<!-- LOGO -->


<?php
	$SHOW_HEADER = get_field('show_title');
?>

<div class="content-container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php
				if ($SHOW_HEADER) :
			?>
			<div class="inner-content">
				<div class="section-header--title_container">
					<h4 class="section-header--title"> <?php the_title(); ?> </h4>
				</div>
			</div>
			<?php
				endif;
			?>
			<div class="inner-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>

</div> <!-- END CONTENT -->

<!-- MENU + SOCIAL LINKS -->
	<?php get_footer(); ?>

</body>
</html>





