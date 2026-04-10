<?php
/**
 * Template Name: PAGE TVŮRCI
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

	
<div class="section-header section-header--tvurci" id="header_tvurci_ID">
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
    'post_type' => 'tvurci',
    'posts_per_page' => -1,
    'post_status'    => array( 'publish' ),
    // 'orderby' => 'title',
    // 'order'   => 'DESC'
    'order'   => 'ASC'
);
?>


<?php 
$argsCAT = array(
   'post_type' => 'tvurci',
   'orderby' => 'name',
   'order'   => 'ASC'
   // 'order'   => 'DESC'
);
$categories = get_categories( $argsCAT );
if($categories) :
	$TEMP_MARKUP = "";
endif;
?>
<div class="filter-list">
	<?php
		foreach($categories as $category) : 
		    $TEMP_MARKUP .= '<div class="filter-list--item" ';
		    $TEMP_MARKUP .= 'data-filter-cat="';
		    $TEMP_MARKUP .= str_replace(" ","-", strval($category->name) );
		    $TEMP_MARKUP .= '">';
		    $TEMP_MARKUP .= $category->name;
		    $TEMP_MARKUP .= '</div>';
		endforeach;
		#print($TEMP_MARKUP);
	?>
</div>
<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<!-- tvůrci content -->
<div class="section-content section-content--tvurci" id="content_tvurci_ID">
	<div class="inner-content-wrapper">
		<div class="inner-content scroll-trigger">
			<div class="tvurci">

	    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	    	<?php 
	    		$POST_ID = get_the_ID(); 
	    		$POST_CATS = wp_get_post_categories( $POST_ID, array( 'fields' => 'names' ) );
	    		$TEMP_TITLE = get_the_title();

	    		if( $POST_CATS ) :
					$CLS_LIST = "";
					foreach($POST_CATS as $CATEGORY_NAME) :
						$CLS_LIST .= " ";
						$CLS_LIST .= str_replace(" ","-", strtolower(strval($CATEGORY_NAME)) );
					endforeach;
				endif;

				// $the_content = apply_filters('the_content', get_the_content());
	    	?>

				    	<div class="tvurci-item scroll-trigger <?php echo $CLS_LIST; ?>" id="">
							<div class="tvurci-item--header">
								<div class="tvurci-item--title_container"><h3 class="tvurci-item--title"><?php the_title(); ?></h3></div>
								<div class="tvurci-item--proff"><p class="plain"><?php echo get_field('creator_role', $POST_ID) ?></p></div>
							</div>
							<div class="tvurci-item--content">
								
								<div class="tvurci-item--caption">
									<?php 
										if ( get_the_content() ) :
											the_content();
										endif;
									?>
								</div>
								<?php if (has_post_thumbnail() ): ?>
								<div class="tvurci-item--profilepic">
									<?php the_post_thumbnail($POST_ID, 'full', ['class' => 'lazyload', 'title' => $TEMP_TITLE, 'loading' => 'lazy']); ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
	        

	    <?php endwhile; ?>



					</div>
				</div>
			</div>

	    <?php wp_reset_postdata(); ?>
</div> <!-- END CONTENT TVŮRCI -->
<!-- účinkující -->
	  <?php
	   $argsUCINKUJICI = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			// 'order' => 'DESC',
			'order' => 'ASC',
			'category_name' => 'ucinkujici',
			'posts_per_page' => 1,
		);
		$arr_posts = new WP_Query( $argsUCINKUJICI );
			if ( $arr_posts->have_posts() ) :
				while ( $arr_posts->have_posts() ) :
					$arr_posts->the_post();
	?>
			<div class="section-content--tvurci_filler"></div>
			<div class="section-header section-header--ucinkujici" id="header_ucinkujici_ID">
				<div class="section-header--title_container scrollTab">
					<h2 class="section-header--title"><a href="#content_vystava_ID" class="scrollLink"><?php the_title(); ?></a></h2>
				</div>
			</div>
			<!-- účinkující content -->
			<!-- <div class="section-content section-content--tvurci" id="content_ucinkujici_ID"> -->
			<div class="section-content section-content--ucinkujici" id="content_ucinkujici_ID">
				<div class="inner-content-wrapper">
					<div class="inner-content scroll-trigger">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
	<?php
				endwhile;
			endif; 
		wp_reset_query(); 
	?>




<?php endif; ?>

	<?php get_footer(); ?>

	</body>
</html>