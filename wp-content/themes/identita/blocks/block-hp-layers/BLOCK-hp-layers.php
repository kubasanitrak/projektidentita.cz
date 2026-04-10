<?php
/**
 * Block Name: BLOCK hp layers
 *
 * This is the hp layers template.
 * @param   array $block The block settings and attributes.
 */
?>


<?php
$PLAN_SLUG = get_field('plan_name');
$PLAN_TITLE = get_field('plan_title');
?>

    <div class="section-header sticky section-header--<?php echo $PLAN_SLUG; ?> watch-for-pin" id="header_<?php echo $PLAN_SLUG; ?>_ID">
        <div class="section-header--title_container scrollTab">
            <h2 class="section-header--title"><a href="#content_<?php echo $PLAN_SLUG; ?>_ID" class="scrollLink"><?php echo $PLAN_TITLE; ?></a></h2>
        </div>
    </div>
    <div class="section-filler sticky section-filler--<?php echo $PLAN_SLUG; ?>"></div>
    <div class="section-content section-content--<?php echo $PLAN_SLUG; ?>" id="content_<?php echo $PLAN_SLUG; ?>_ID" data-scroll_value="">
        <div class="inner-content-wrapper">
            <InnerBlocks/>
        </div>
    </div>
    <?php if($PLAN_SLUG !== 'plan4') : ?>
    <div class="section-footer sticky section-footer--<?php echo $PLAN_SLUG; ?> scroll-trigger-2" data-scrollto="#content_<?php echo $PLAN_SLUG; ?>_ID" id="footer_<?php echo $PLAN_SLUG; ?>_ID"></div>
    <?php endif; ?>