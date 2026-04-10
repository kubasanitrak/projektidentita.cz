<?php require_once('assets/config.php'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

<meta name="robots" content= "index, follow">
<meta name="author" content="projektidentita<=>bohemianidentity">
<!-- <meta name="twitter:card"       content="summary_large_image" >
<meta name="twitter:site"       content="@bohemianidentity" >
<meta name="twitter:creator"    content="@bohemianidentity" >
<meta property="og:title" content="<?php #echo $SITE_TITLE; ?>" />
<meta property="og:site_name" content="<?php #echo $SITE_TITLE; ?>" />
<meta property="og:url" content="" />
<meta property="og:description" content="" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php #echo get_template_directory_uri(); ?>/assets/images/<?php #echo $OG_IMG; ?>" /> -->


<link href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png" rel="apple-touch-icon">
<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.svg">
<link rel="alternate icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/safari-pinned-tab.svg" color="">

<!-- PREFETCH WEBFONTS -->
<link rel="prefetch" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Identita1.7-Regular.woff" as="font" type="font/woff" crossorigin>
<!-- PREFETCH WEBFONTS -->

<!-- START WP_HEAD() -->
<?php wp_head(); ?>
<!-- END WP_HEAD() -->

<!--[if lt IE]>
<style></style>
<![endif]-->


<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?v10-04-2026.01" />

<style>
	/* CRITICAL CSS */
	@supports (--custom:property) {[style*="--aspect-ratio"] {position: relative; padding-bottom: 0; } [style*="--aspect-ratio"]::before {padding-bottom: calc(100% / (var(--aspect-ratio))); display: block; content: ""; } [style*="--aspect-ratio"] > :first-child:not(.play-button); {position: absolute; top: 0; left: 0; height: 100%; width: 100%; } }

	body, html { height: fill-available; height: -webkit-fill-available; }
	.wrapper { width: 100%; overflow-x: auto; overflow-y: scroll; max-height: 100vh!important; max-height: fill-available; max-height: -webkit-fill-available; }
	@media screen and (orientation: landscape) and (max-height: 55rem) {
		.menu {overflow-y: scroll; min-width: 0;
		}
		.menu-switch:checked ~ label ~ .menu {width: var(--menu-W); min-width: var(--menu-W);
		}
	}
</style>

</head>
	<?php
		$HAS_NEWSFEED = "";
		if(is_front_page()) :
			$HAS_NEWSFEED = "with-bloomberg";
		endif;

		$COLOR_RANGE = array( 'color', 'no-color' );
		$DEF_THEME = 'color';
	    $THEME = $DEF_THEME;

		if ( !isset($_COOKIE["color_scheme"]) ) {
		    $THEME = $DEF_THEME;
		} else {
		    $THEME = in_array(strval($_COOKIE["color_scheme"]), $COLOR_RANGE ) ? strval($_COOKIE["color_scheme"]) : $DEF_THEME;
		}
	?>
<body class="hp-body-flex" data-theme="<?php echo $THEME; ?>">
	<script> document.body.className="js hp-body-flex <?php echo $HAS_NEWSFEED; ?>";</script>
<!-- BODY OVERLAY -->
		<div class="body-blackout"></div>

		<!-- MODAL POPUP -->
		<div class="popup-modal" id="popupmodal_ID">
			<button class="btn popup-close-btn fas fa-2x fa-times text-white bg-primary p-3 popup-modal__close">close</button>
			<div class="popup-modal-content" id="popup_content_ID"></div>
		</div>

	<!-- NAVIGATION -->
	<?php get_template_part( 'template-parts/navigation', 'top' ); ?>

	<div class="wrapper loading" id="wrapper-id" >

		<?php
			$HAS_NEWSFEED = "";
			if(is_front_page()) :
				include('template-parts/newsfeed-stripe.php');
			endif;
		?>