<?php
/**
 * Block Name: BLOCK-shop-container
 *
 * This is the template that displays the featured shop items blocks.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'shop-container full_width';
    
// Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    $id = 'shopcontainerID-' . $block['id'];
?>

<div id="<?php echo $id; ?>" class="<?php echo esc_attr( $classes ); ?>" >
    <InnerBlocks/>
</div>
