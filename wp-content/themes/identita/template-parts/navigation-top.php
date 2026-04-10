<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage identita
 * @since 1.0
 * * @version 1.0
 */

?>

	<input type="checkbox" id="menuBtnID" class="nav-switch menu-switch">
	<!-- <input type="checkbox" id="menuBtnID" class="nav-switch menu-switch" checked > -->
	<label for="menuBtnID" class="hamburger">
		<span class="">Menu</span>
	</label>
<!-- COLOR MODE SWITCH -->
<?php
	$LOCALE = get_locale();

	if($LOCALE === 'cs_CZ') :
	$COLORIZE = "Odbarvit";
	$UNCOLORIZE = "Obarvit";
	else :
		$COLORIZE = "No-Color";
		$UNCOLORIZE = "Colorize";
	endif;

	$COLOR_RANGE = array( 'color', 'no-color' );
	$CHECK = 'checked';
	if ( !isset($_COOKIE["color_scheme"]) || strval($_COOKIE["color_scheme"]) === 'color' ) {
		$CHECK = 'checked';
	} else {
	    $CHECK = '';
	}
?>
	<input type="checkbox" id="coloriseBtnID" class="colorise-btn-switch nav-switch" <?php echo $CHECK; ?> >
	<label for="coloriseBtnID" class="colorise-btn landscape-only">
		<span class="on"><?php echo $COLORIZE; ?></span>
		<span class="off"><?php echo $UNCOLORIZE; ?></span>
	</label>
<!-- COLOR MODE SWITCH -->
	<div class="menu">
		<!-- <ul class="nav-list lang-list list-none">
			<li class="caps"><a class="button button-outline button-S current" href="#">cs</a></li>
			<li class="caps"><a class="button button-outline button-S" href="https://bohemianidentity.com/">en</a></li>
		</ul> -->


		<?php if ( is_active_sidebar( 'langswitch-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'langswitch-widget-area' ); ?>
		<?php endif; ?>	
		
		<?php if( is_front_page() ) : ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'hp-menu-top',
				'container' => '',
				'menu_class' => 'main-nav-list nav-list list-none',
			) ); ?>
		<?php else : ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'main-menu-top',
				'container' => '',
				'menu_class' => 'main-nav-list nav-list list-none',
			) ); ?>
		<?php endif; ?>
		<?php wp_nav_menu( array(
				'theme_location' => 'main-menu',
				'container' => '',
				'menu_class' => 'main-nav-list nav-list list-none',
		) ); ?>
		<div class="menu-row flex jc-f-start a-i-fend">
			<?php wp_nav_menu( array(
				'theme_location' => 'fcbk-mail-tel',
				'container' => '',
				'menu_class' => 'social-nav-list list-none',
			) ); ?>
			<input type="checkbox" id="coloriseBtnID2" class="colorise-btn-switch-2 nav-switch" checked>
			<label for="coloriseBtnID2" class="colorise-btn-2 portrait-only">
				<span class="on">Odbarvit</span>
				<span class="off">Obarvit</span>
			</label>

			<?php if ( is_active_sidebar( 'press-widget-btn' ) ) : ?>
				<!-- NL FORM WIDGET -->
				<?php dynamic_sidebar( 'press-widget-btn' ); ?>
				<!-- END NL FORM WIDGET -->
			<?php endif; ?>	
			<!-- <a href="pro-media.php" class="btn button-S button-outline a-s-end">Pro média</a> -->
		</div>
		<div class="menu-row nl-widget flex fd-col">
			<p class="plain nl-widget-label">newsletter</p>
			<?php if ( is_active_sidebar( 'nl-form-widget-area' ) ) : ?>
				<!-- NL FORM WIDGET -->
				<?php dynamic_sidebar( 'nl-form-widget-area' ); ?>
				<!-- END NL FORM WIDGET -->
			<?php endif; ?>	
		</div>
	</div> <!-- END DIV CLASS MENU -->
			
			