<?php
/**
 * Block Name: BLOCK_customaccordeon
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'accord-item';
    $ACCORD_TITLE = get_field( 'accord_title' );
    $ACCORD_TITLE_LABEL = get_field( 'accord_title_label' );
    $IS_OVERLINE = get_field( 'accord_line_top' );
    
    if($IS_OVERLINE) :
        $CLS_W .= ' ';
        $CLS_W .= 'border-top';
    endif;

    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    $id = 'accordBtnID-' . $block['id'];
?>

<div id="" class="<?php echo esc_attr( $classes ); ?>" >
    <div class="accord-item--header">
        <?php if($ACCORD_TITLE_LABEL): ?>
            <p class="plain accord-item--label"><?php echo $ACCORD_TITLE_LABEL; ?></p>
        <?php endif; ?>
        <h3 class="accord-item--title"><?php echo $ACCORD_TITLE; ?></h3>
    </div>
    <!-- <input type="checkbox" id="<?php #echo $id; ?>" class="nav-switch accord-switch" checked > -->
    <input type="checkbox" id="<?php echo $id; ?>" class="nav-switch accord-switch"  >
    <label for="<?php echo $id; ?>" class="accord-btn">
        <span>view</span>
    </label>
    <div class="accord-item--content">
        <InnerBlocks/>
    </div>
</div>
