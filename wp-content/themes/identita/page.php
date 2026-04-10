<?php
/**
 * Template Name: PAGE
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
			
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="section-header section-header--aktuality" id="header_media_ID">
				<div class="section-header--title_container scrollTab">
					<h2 class="section-header--title"><?php print strtolower(get_the_title()); ?></h2>
				</div>
			</div>
			
			<div class="section-content section-content--media" id="content_media_ID">
				<div class="inner-content-wrapper scroll-trigger">
					<?php the_content(); ?>
				</div>
			</div>
		
	<?php endwhile; endif; ?>

	<?php get_footer(); ?>

	</body>
</html>