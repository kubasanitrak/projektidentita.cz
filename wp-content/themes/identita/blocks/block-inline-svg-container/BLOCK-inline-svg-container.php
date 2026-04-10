<?php
/**
 * Block Name: BLOCK inline svg container
 *
 * This is the template wraps inner content.
 * @param   array $block The block settings and attributes.
 */
?>

<?php

// Support custom "anchor" values.
$STYLE = '';
if ( get_field('aspect_ratio') ) :
    $STYLE = 'style="--aspect-ratio:' . get_field( 'svg-width' );
    $STYLE .= '/';
    $STYLE .= get_field( 'svg-height' ) . ';" ';
else :
    $STYLE = 'style="--aspect-ratio:1/1;"';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$CLS_W = 'svg-container'; 
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.

if( get_field( 'override_colors' ) ) :
    $CLS_W .= ' ';
    $CLS_W .= 'fill-color-contrast-high';
endif;

// Create class attribute allowing for custom "className" values.
$classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;

?>

<div <?php echo $STYLE; ?> class="<?php echo esc_attr( $classes ); ?>">
    <InnerBlocks/>
</div>