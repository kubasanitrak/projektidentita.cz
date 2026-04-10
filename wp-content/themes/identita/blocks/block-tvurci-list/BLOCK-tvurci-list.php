<?php
/**
 * Block Name: BLOCK-tvurci-list
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    

    $TVURCI_TITLE = get_field( 'tvurci_title' );
    $TVURCI_LINK = get_field( 'tvurci_link' );

    // Create class attribute allowing for custom "className" values.
   
    // $id = 'accordBtnID-' . $block['id'];
?>

<?php 
/*
tvurce_category

tv-cyklus : TV Cyklus
vystava : Výstava
kniha : Kniha
film : Film
tv-cyklus-en : TV Series
vystava-en : Exhibition
kniha-en : Book
film-en : Film

tvurce_cat

tvurci_cyklus
tvurci_vystava
tvurci_kniha
tvurci_film
*/
        
        $CAT = get_field( 'tvurci_category' );

        // foreach ($CAT as $cat_slug) {
            // $cat_arr($cat_slug);
        // }
        $args = array( 
            'post_type' => 'tvurci',
            // 'category_name' => 'tv-cyklus, tv-cyklus-en',
            'category_name' => strval($CAT),
        );


$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : 
    ?>
        <!-- TVURCILIST -->
        <div class="inner-content--header border-bottom">
            <h3 class="content--title"><?php echo $TVURCI_TITLE; ?></h3>
        </div>
        <div class="tvurci-list flex wrap">

<?php
    while ( $the_query->have_posts() ) : $the_query->the_post();

    $POST_ID = get_the_ID();
    $TEMP_ROLE = get_field('creator_role', $POST_ID);
?>
        <div class="tvurci-list--item">
            <p class="tvurci-label minor"><?php echo $TEMP_ROLE; ?></p>
            <h5 class="tvurci-name"><a href="<?php echo $TVURCI_LINK; ?>" class="btn btn-outline"><?php the_title(); ?></a></h5>
        </div>
<?php
    endwhile;
?>
        </div> <!-- END TVURCILIST -->
<?php else: __( 'Sorry, there are no posts to display', 'identita' ); ?>
<?php endif;  ?>
<?php wp_reset_postdata(); ?>