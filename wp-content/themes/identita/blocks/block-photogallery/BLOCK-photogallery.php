<?php
/**
 * Block Name: BLOCK-photogallery
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>

<?php
$UNIQ_ID = 'identita-' . $block['id'];
// Check value exists.
if( have_rows('gallery_items_row') ):

    ?>
	<div class="photogallery">
    <?php 
    // Loop through rows.
    while ( have_rows('gallery_items_row') ) : 
        the_row();
        #if( get_row_layout() == 'gallery_item' ) :
            // $attachment = get_sub_field('gallery_attachment');
            $imgOBJ = get_sub_field( 'gallery_item' );
			$imgID = $imgOBJ['ID'];
            
            // Thumbnail size attributes.
            $size = 'large';
            $thumb = $imgOBJ['sizes'][ $size ];
            $img_W = $imgOBJ['sizes'][ $size . '-width' ];
            $img_H = $imgOBJ['sizes'][ $size . '-height' ];
            $style = "--ratio: " . $img_W . "/" . $img_H;
            $ratio = $img_W / $img_H;

            $is_portrait = ($ratio < 1) ? 'is-portrait' : '';

            $IMG_LABEL = get_sub_field('gallery_label');
        ?>
        <div style="<?php echo esc_attr( $style ); ?>" class="photogallery-item <?php echo $is_portrait; ?>" data-placeholder="<?php echo $IMG_LABEL; ?>">
            <a href="<?php echo wp_get_attachment_image_url( $imgID, 'full' ); ?>" data-rel="lightbox-<?php echo strval($UNIQ_ID); ?>" data-rl_title="" data-rl_caption="" title="" class="lightbox swipebox">
                <?php echo wp_get_attachment_image($imgID, 'full'); ?>
            </a>
		</div>
    <?php #endif; ?>
<?php endwhile; ?>
    </div>
<?php endif; ?>