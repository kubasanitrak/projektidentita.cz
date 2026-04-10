<?php
add_action( 'after_setup_theme', 'identita_theme_setup' );
function identita_theme_setup() {
	load_theme_textdomain( 'identita_theme', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;

	if ( ! isset( $content_width ) ) $content_width = 640;

	register_nav_menus( array(
		'main-menu'    => __( 'Hlavni Menu', 'identita_theme' ),
		'main-menu-top'    => __( 'Hlavni Menu TOP', 'identita_theme' ),
		'hp-menu-top'    => __( 'HP Menu TOP', 'identita_theme' ),
		'fcbk-mail-tel' => __( 'Social links', 'identita_theme' ),
		// 'support' => __( 'Podpora', 'identita_theme' ),
	) );
}

add_action( 'comment_form_before', 'identita_theme_enqueue_comment_reply_script' );
function identita_theme_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'identita_theme_title' );
function identita_theme_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

function wp_example_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');

// REMOVE HARDCODED WIDTH & HEIGHT INLINE IN THUMBNAIL
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
// END REMOVE WIDTH & HEIGHT

add_filter( 'wp_title', 'identita_theme_filter_wp_title' );
function identita_theme_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'identita_theme_widgets_init' );
function identita_theme_widgets_init() {
	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
		// 'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'before_widget' => ' ',
		// 'after_widget'  => '</div></div>',
		'after_widget'  => ' ',
	);

	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Language Switcher', 'identita_theme' ),
				'id' => 'langswitch-widget-area',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);

	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Newsletter', 'identita_theme' ),
				'id' => 'nl-widget-area',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Newsletter Form', 'identita_theme' ),
				'id' => 'nl-form-widget-area',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Pro média', 'identita_theme' ),
				'id' => 'press-widget-area',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Pro média btn', 'identita_theme' ),
				'id' => 'press-widget-btn',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);	
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Footer', 'identita_theme' ),
				'id' => 'footer-widget-area',
				// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
				// 'after_widget' => "</li>",
				// 'before_title' => '<h3 class="widget-title">',
				// 'after_title' => '</h3>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Partners', 'identita_theme' ),
				'id' => 'partners-widget-area',
				'before_widget' => '<div class="inner-content full_width"> <div class="partners-grid">',
				'after_widget' => '</div></div>',
				// 'before_title' => '<h4 class="section-header--title">',
				// 'after_title' => '</h4>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Partner Faculties', 'identita_theme' ),
				'id' => 'partner-faculties-widget-area',
				'before_widget' => '<div class="inner-content full_width"> <div class="partners-grid faculties-grid">',
				'after_widget' => '</div></div>',
				// 'before_title' => '<h4 class="section-header--title">',
				// 'after_title' => '</h4>',
			)
		)
	);
	register_sidebar( 
		array_merge(
			$shared_args,
			array (
				'name' => __( 'Thank you', 'identita_theme' ),
				'id' => 'thankyou-widget-area',
				'before_widget' => '<div class="inner-content-wrapper">',
				'after_widget' => '</div>',
				// 'before_title' => '<h4 class="section-header--title">',
				// 'after_title' => '</h4>',
			)
		)
	);
	/*
	<!-- SEKCE PARTNEŘI -> LOGO GRID + BTN NA STRÁNKU "CHCI SE STÁT PARTNEREM" -->

	<div class="section-header--title_container">
		<h4 class="section-header--title">Děkujeme za podporu našim partnerům</h4>
	</div>
	<div class="inner-content-wrapper">
		<div class="inner-content full_width">
			<div class="partners-grid">


	<div class="section-header--title_container">
			<h4 class="section-header--title">Děkujeme také</h4>
	</div>
	<div class="inner-content-wrapper">		
		<div class="inner-content full_width">
			<div class="partners-grid mar-B">
	*/
}
function identita_theme_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'identita_theme_comments_number' );

function identita_theme_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$temp_comments = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $temp_comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}
/* / — / — / — / — / — / — / — / — / — */
/* / — / — / — / — / — / — / — / — / — */
/* WRAP THE POST CONTENT IN CUSTOM DIV */
/* / — / — / — / — / — / — / — / — / — */
/* / — / — / — / — / — / — / — / — / — */
// function wrap_content_in_div($content) {
//     global $post;
//     return '<div class="flow">'.$content.'</div>';
// }
// add_filter('the_content', 'wrap_content_in_div');
/* / — / — / — / — / — / — / — / — / — */
/* / — / — / — / — / — / — / — / — / — */
/* / — / — / — / — / — / — / — / — / — */
/* / — / — / — / — / — / — / — / — / — */


/*	 — — —  — — — — — — — — — — — — */
/*	 — — —  — — — — — — — — — — — — */
/*	 — — —  — — — — — — — — — — — — */
/*	 — — —  — — — — — — — — — — — — */
/* ACF CUSTOM BLOCKS
/*	 — — —  — — — — — — — — — — — — */


add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/block-inner-content' );
    register_block_type( __DIR__ . '/blocks/block-gmap' );
    register_block_type( __DIR__ . '/blocks/block-proj-selection');
    register_block_type( __DIR__ . '/blocks/block-accordeon');
    register_block_type( __DIR__ . '/blocks/block-accordeon-download-content');
    register_block_type( __DIR__ . '/blocks/block-hp-layers');
    register_block_type( __DIR__ . '/blocks/block-accordeon-series-parts');
    register_block_type( __DIR__ . '/blocks/block-aktuality-list');
    register_block_type( __DIR__ . '/blocks/block-tvurci-list');
    register_block_type( __DIR__ . '/blocks/block-photogallery');
    register_block_type( __DIR__ . '/blocks/block-imggallery');
    register_block_type( __DIR__ . '/blocks/block-video');
    register_block_type( __DIR__ . '/blocks/block-partners-grid');
    register_block_type( __DIR__ . '/blocks/block-inline-svg-container');
    register_block_type( __DIR__ . '/blocks/block-shop-container');
    register_block_type( __DIR__ . '/blocks/block-shop-item');
}

// Load Gutenberg Editor Styles
function custom_gutenberg_editor_styles() {
    wp_enqueue_style(
        'admin-styles',
        get_stylesheet_directory_uri().'/style-editor.css?v23-11-2024.01'
    );
}
add_action( 'admin_enqueue_scripts', 'custom_gutenberg_editor_styles' );

/* / — / — / — / — / — / – */
/* / — / — / — / — / — / – */
/* CUSTOMIZE WP LOGIN PAGE */
/* / — / — / — / — / — / – */

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
						/*background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);*/
            background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/site-login-logo.png);
						height:65px;
						width:320px;
						background-size: contain;
						background-repeat: no-repeat;
						padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return esc_attr( get_bloginfo( 'name' ) );
    // return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

/* / — / — / — / — / — / – */
/* END CUSTOMIZE WP LOGIN PAGE */
/* / — / — / — / — / — / – */
/* / — / — / — / — / — / – */



/* / — / — / — / — / — / – / — / — / — / */
/* / — / — / — / — / — / – / — / — / — / */
/* ADDS SUPPORT FOR EDITOR COLOR PALETTE */
/* / — / — / — / — / — / – / — / — / — / */

function my_theme_color_features() {

    // The new colors we are going to add
    $newColorPalette = [
        [
            'name'  => __( 'Tmavomodrá', 'identita_theme' ),
			'slug'  => 'tmavomodra',
			'color'	=> '#0B2A41',
        ],
        [
            'name'  => __( 'Modrá', 'identita_theme' ),
			'slug'  => 'modra',
			'color' => '#304357',
        ],
        [
            'name'  => __( 'Oranžová', 'identita_theme' ),
			'slug'  => 'oranzova',
			'color' => '#EB5F23',
        ],
    ];

    // Apply the color palette containing the original colors and 2 new colors:
    add_theme_support( 'editor-color-palette', $newColorPalette);
    // Disables color picker in block color palette.
    add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'my_theme_color_features' );

/* / — / — / — / — / — / – / — / — / — / — / – */
/* / — / — / — / — / — / – / — / — / — / — / – */
/* CUSTOM POST TYPES */
/* / — / — / — / — / — / – / — / — / — / — / – */
/* / — / — / — / — / — / – / — / — / — / — / – */

// Register Custom Post Type
function tvurci_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Tvůrci', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tvůrce', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tvůrci', 'text_domain' ),
		'name_admin_bar'        => __( 'Tvůrce', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Tvůrce', 'text_domain' ),
		'description'           => __( 'Custom Post Type for Bohemian Identity Creators', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'tvurci', $args );

	// register taxonomy
    #register_taxonomy('tvurce_category', 'tvurce', array('hierarchical' => false, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'tvurce-category' )));

}
add_action( 'init', 'tvurci_custom_post_type', 0 );

function thanks_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Thanks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Thank', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Thanks', 'text_domain' ),
		'name_admin_bar'        => __( 'Thank', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Thank', 'text_domain' ),
		'description'           => __( 'Custom Post Type for Bohemian Identity Creators', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'thanks', $args );
}
add_action( 'init', 'thanks_custom_post_type', 0 );
// flush_rewrite_rules( false );
