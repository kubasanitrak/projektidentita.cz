<?php
/**
 * Block Name: BLOCK-imggallery
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php
$UNIQ_ID = 'identita-' . $block['id'];
// Check value exists.
if( have_rows('img_gallery_items_row') ):

    ?>
	<div class="img-gallery">
    <?php 
    // Loop through rows.
    $counter = 1;
    while ( have_rows('img_gallery_items_row') ) : 
        the_row();
        #if( get_row_layout() == 'gallery_item' ) :
            // $attachment = get_sub_field('gallery_attachment');
            $imgOBJ = get_sub_field( 'img_gallery_item' );
			$imgID = $imgOBJ['ID'];
            
            // Thumbnail size attributes.
            $size = 'large';
            $thumb = $imgOBJ['sizes'][ $size ];
            $img_W = $imgOBJ['sizes'][ $size . '-width' ];
            $img_H = $imgOBJ['sizes'][ $size . '-height' ];
            $style = "--ratio: " . $img_W . "/" . $img_H;
            $ratio = $img_W / $img_H;

            $is_portrait = ($ratio < 1) ? 'is-portrait' : '';

            $IMG_CAPTION = get_sub_field('img_gallery_caption');
        ?>
        <div style="<?php echo esc_attr( $style ); ?>" class="img-gallery--item <?php echo $is_portrait; ?>" data-placeholder="<?php echo $IMG_CAPTION; ?>">
            <a href="<?php echo wp_get_attachment_image_url( $imgID, 'full' ); ?>" data-rel="lightbox-<?php echo strval($UNIQ_ID); ?>" data-rl_title="<?php echo $IMG_CAPTION; ?>" data-rl_caption="<?php echo $IMG_CAPTION; ?>" data-title="<?php echo $IMG_CAPTION; ?>" title="<?php echo $IMG_CAPTION; ?>" class="lightbox swipebox img-gallery--link">
                <?php echo wp_get_attachment_image($imgID, 'full'); ?>
            </a>
		</div>
    <?php if($counter % 2 == 0): ?>
        <div class="img-gallery--item img-gallery--item_break2"></div>
    <?php endif; ?>
    <?php if($counter % 3 == 0): ?>
        <div class="img-gallery--item img-gallery--item_break3"></div>
    <?php endif; ?>
    <?php if($counter % 4 == 0): ?>
        <div class="img-gallery--item img-gallery--item_break4"></div>
    <?php endif; ?>
        <?php $counter++; ?>
<?php endwhile; ?>
    </div>
<?php endif; ?>