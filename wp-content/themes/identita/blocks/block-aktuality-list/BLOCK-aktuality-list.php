<?php
/**
 * Block Name: BLOCK-aktuality-list
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'inner-content--header border-bottom flex jc-s-btwn scroll-trigger';

    $title = get_field( 'news_title' );
    $news_link = get_field( 'news_link' );

    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    // $id = 'accordBtnID-' . $block['id'];
?>

<?php
$argType = get_field( 'loop_argument_type' );
if( $argType == "count" ) :
  $args = array( 
    'category_name' => 'news',
    'posts_per_page' => get_field( 'news_count' )
  );
else:
  $news = get_field( 'select_news' );
  $args = array( 
    'post__in' => $news
  );
endif;


$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : 
    ?>
        <!-- NEWSLIST -->
        <div class="<?php echo esc_attr( $classes ); ?>" >
            <h3 class="content--title"><?php echo $title; ?></h3>
            <a href="<?php echo $news_link; ?>" class="link-more btn btn-outline"><?php _e('Archiv', 'identita'); ?></a>
        </div>
        <div class="news-list columns scroll-trigger">
<?php 
    while ( $the_query->have_posts() ) : $the_query->the_post();
?>
            <div class="news-list--item column">
                <p class="news-list--item_date minor"><?php echo get_the_date(); ?></p>
                <a href="<?php echo get_permalink(); ?>"><h4 class="news-list--item_title"><?php the_title(); ?></h4></a>
                <a href="<?php echo get_permalink(); ?>" class="news-list--item_link btn-outline btn button-XS">→</a>
            </div> <!-- END NEWS ITEM -->

<?php
    endwhile;
?>
        </div> <!-- END NEWSLIST -->
<?php else: __( 'Sorry, there are no posts to display', 'identita' ); ?>
<?php endif;  ?>