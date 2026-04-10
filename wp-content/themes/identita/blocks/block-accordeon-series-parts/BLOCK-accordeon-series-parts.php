<?php
/**
 * Block Name: BLOCK-accordeon-series-parts
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'accord-item--caption';
    $HAS_INDENT = get_field( 'has_indent' );

    $SERIE_CAPTION = get_field('serie_caption');
    $SERIE_COL_IMG = get_field('serie_col_img');
    $imgID = $SERIE_COL_IMG['ID'];
    $SERIE_COL_CAPTION = get_field('serie_col_caption');
    
    if($HAS_INDENT) :
        $CLS_W .= ' ';
        $CLS_W .= 'indented';
    endif;

    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    // $id = 'accordBtnID-' . $block['id'];
?>

<div class="<?php echo esc_attr( $classes ); ?>" >
    <p class="plain"><?php echo $SERIE_CAPTION; ?> </p>
</div>
<div class="accord-item--columns columns">
    <div class="column v-a-bottom">
        <?php if($imgID) : ?>
            <?php echo wp_get_attachment_image($imgID, 'full'); ?>
        <?php endif; ?>
    </div>

    <div class="column flex v-a-bottom">
    <?php if($SERIE_COL_CAPTION) : ?>
        <p class="plain"><?php echo $SERIE_COL_CAPTION; ?></p>
    <?php endif; ?>
    </div>
</div>

            