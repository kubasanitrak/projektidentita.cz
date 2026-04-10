<?php
/**
 * Displays single news content
 *
 * @package WordPress
 * @subpackage identita
 * @since 1.0
 * * @version 1.0
 */

?>

			<div class="section-header section-header--aktuality" id="header_aktuality_ID">
				<div class="section-header--title_container scrollTab">
					<h2 class="section-header--title"><?php _e('aktuality', 'identita'); ?></h2>
				</div>
			</div>
			<!-- aktuality content -->
			<div class="section-content section-content--aktuality" id="content_aktuality_ID">
				<div class="inner-content-wrapper">
					<div class="inner-content--header scroll-trigger">
						<p class="news-list--item_date minor"><?php echo get_the_date(); ?></p>
						<div class="news-list--item_header">
							<h3 class="maw-30"><?php the_title(); ?></h3>
						</div>
					</div>
					<div class="inner-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>