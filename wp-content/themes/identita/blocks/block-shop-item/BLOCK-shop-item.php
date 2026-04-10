<?php
/**
 * Block Name: BLOCK-shop-item
 *
 * This is the template that displays the featured shop items.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// determine if it is card with btn and custom text inside or standard shop item card
    $IS_GLOBAL_CARD = get_field( 'is_global_card' );

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'shop-item';
    $ITEM_IMG_ID = get_field( 'shop_item_img' );
    $ITEM_IMG_OBJ = get_field( 'shop_item_img' );
    if(!empty($ITEM_IMG_OBJ) ) :
        $imgID = $ITEM_IMG_OBJ['ID'];
    endif;
    $ITEM_DESC = get_field( 'shop_item_desc' );
    $ITEM_PRICE = get_field( 'shop_item_price' );
    $ITEM_LINK = get_field( 'shop_item_link' );
    $BG_COLOR = get_field( 'bg_color' );

    
    if($BG_COLOR) :
        $CLS_W .= ' bg_color bg_color_';
        $CLS_W .= $BG_COLOR;
    endif;

    if($IS_GLOBAL_CARD) :
        $CLS_W .= ' padded-top';
    endif;

    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    $id = 'shop-item-' . $block['id'];
?>

<div id="<?php echo $id; ?>" class="<?php echo esc_attr( $classes ); ?>" >
    <?php if(!$IS_GLOBAL_CARD) : ?>
    
        <div class="shop-item--img">
            <?php
                if($imgID ): 
                    echo wp_get_attachment_image($imgID, 'full');
                endif; 
            ?>
        </div>
        <h5 class="shop-item--desc"><?php echo $ITEM_DESC; ?></h5>
        <p class="shop-item--price plain"><?php echo $ITEM_PRICE; ?></p>

    <?php else : ?>

        <InnerBlocks/>
        <div class="shop-item--btn_container">
            <a href="<?php echo $ITEM_LINK; ?>" class="shop-item--btn btn-outline btn button-XS">→</a>
        </div>

    <?php endif; ?>
        <a href="<?php echo $ITEM_LINK; ?>" class="shop-item--link abs-link"></a>
</div>
