<?php
/**
 * Block Name: BLOCK-partners-grid
 *
 * This is the template that displays the featured news block.
 * @param   array $block The block settings and attributes.
 */
?>
<?php
    $IS_FACULTIES_GRID = get_field('is_faculties_grid');
    $GRID_CLS = "partners-grid";

    if($IS_FACULTIES_GRID) :
    $GRID_CLS .= " ";
    $GRID_CLS .= "faculties-grid";
    endif;
    
    // Create class attribute allowing for custom "className" values.
    $CLS_W = 'inner-content full_width';
    // Create class attribute allowing for custom "className" values.
    $classes = ( ! empty( $block['className'] ) ) ? sprintf( $CLS_W . ' %s', $block['className'] ) : $CLS_W;

    // $ratio = 2;
?>


<div class="<?php echo esc_attr( $classes ); ?>">
<div class="<?php echo $GRID_CLS; ?>">

<?php
/* REPEATER RELATED CODE */
if( have_rows('partners_row') ):
    while ( have_rows('partners_row') ) :
        the_row();
            $IS_LOGO = get_sub_field('is_logo');

            $IS_TEXTLINK = (!$IS_LOGO) ? true : false;

            $LOGO_IMG_OBJ = get_sub_field('logo_img');

            $GRID_ITEM_CLS = "partners-grid--item";

            if(!empty($LOGO_IMG_OBJ)) :
                $LOGO_IMG_URL = $LOGO_IMG_OBJ['url'];

                $size = 'large';
                $thumb = $LOGO_IMG_OBJ['sizes'][ $size ];
                $img_W = $LOGO_IMG_OBJ['sizes'][ $size . '-width' ];
                $img_H = $LOGO_IMG_OBJ['sizes'][ $size . '-height' ];

                $ratio = $img_W / $img_H;
            endif;

            if (!$IS_TEXTLINK && ($ratio && ($img_W / $img_H) > 2.4)) :
                $GRID_ITEM_CLS .= " ";
                $GRID_ITEM_CLS .= "double-width";
            endif;

            $PARTNER_LINK = get_sub_field('partner_link');
            $PARTNER_TITLE = get_sub_field('partner_title');


            if ($IS_TEXTLINK) :
                $GRID_ITEM_CLS .= " ";
                $GRID_ITEM_CLS .= "partners-grid--item---text_link";
            endif;
            ?>
            <div class="<?php echo $GRID_ITEM_CLS; ?>">
                <?php
                if ($IS_TEXTLINK) :
                ?>
                    <a class="minor" href="<?php echo $PARTNER_LINK; ?>" target="_blank"><?php echo $PARTNER_TITLE; ?></a>
                <?php
                else :
                ?>
                <a href="<?php echo $PARTNER_LINK; ?>" target="_blank">
                    <img class="partners-grid--item_img" src="<?php echo $LOGO_IMG_URL; ?>" title="<?php echo $PARTNER_TITLE; ?>" alt="<?php echo $PARTNER_TITLE; ?>" />
                </a>
                <?php
                endif;
                ?>
            </div>
<?php   
    endwhile;
endif;
?>

</div><!-- END GRID -->
</div><!-- END INNER CONTENT -->





