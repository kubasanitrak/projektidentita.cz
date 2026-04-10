<?php
/**
 * Block Name: BLOCK inner content
 *
 * This is the template wraps inner content.
 * @param   array $block The block settings and attributes.
 */
?>

<?php
$id = 'identita-' . $block['id'];
// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) :
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
else :
    $anchor = 'id="' . esc_attr( $id ) . '" ';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$CLS_W = 'inner-content'; 
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$IS_FULL_W = get_field( 'is_full_width' );
if($IS_FULL_W) :
    $CLS_W .= ' ';
    $CLS_W .= 'full_width';
endif;

// Create class attribute allowing for custom "className" values.
$classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $classes ); ?>">
     <InnerBlocks/>
</div>