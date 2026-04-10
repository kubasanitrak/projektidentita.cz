<?php
/**
 * Block Name: BLOCK_accordeon_download_content
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php

// Create class attribute allowing for custom "className" values.
    $CLS_W = 'accord-item--caption full-width';
    // $ACCORD_TITLE_LABEL = get_field( 'accord_title_label' );
    $HAS_INDENT = get_field( 'has_indent' );
    $HAS_LABEL = get_field( 'has_label' );
    $DWNLD_TITLE = get_field( 'download_title' );
    $DWNLD_LABEL = get_field( 'download_label' );
    
    if($HAS_INDENT) :
        $CLS_W .= ' ';
        $CLS_W .= 'indented';
    endif;

    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;
    // $id = 'accordBtnID-' . $block['id'];
?>

<div class="<?php echo esc_attr( $classes ); ?>">
    <?php if($HAS_LABEL) : ?>
    <div class="accord-row ">
        <p class="minor"><?php echo $DWNLD_LABEL; ?></p>
    </div>
    <div class="accord-row flex wrap v-a-center jc-s-btwn">
         <h5 class="accord-col accord-col--title" style="line-height: 1.33em"><?php echo $DWNLD_TITLE; ?></h5>
    <?php else: ?>
    <div class="accord-row flex wrap v-a-center jc-s-btwn">
        <h4 class="accord-col accord-col--title"><?php echo $DWNLD_TITLE; ?></h4>
    <?php endif; ?>
        <?php 

// Check value exists.
if( have_rows('dwnld_items_row') ):

    ?>
    <div class="btn-group flex v-a-center">
    <?php 
    // Loop through rows.
    while ( have_rows('dwnld_items_row') ) : the_row();
        if( get_row_layout() == 'dwnld_item' ):
            $attachment = get_sub_field('dwnld_attachment');
            $url = $attachment['url'];
            $ext = pathinfo($url, PATHINFO_EXTENSION);
        ?>
        <a href="<?php echo $url; ?>" target="_blank" class="btn btn-outline">.<?php echo $ext; ?></a>
    <?php
        endif;
    // End loop.
    endwhile;
    ?>
    </div>
<?php
endif;
            ?>
    </div>
</div>

