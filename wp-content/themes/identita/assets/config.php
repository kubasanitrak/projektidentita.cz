<?php 
 

  
define("SITEURL", "https://projektidentita.cz");

$SITE_NAME = "identita";
$SITE_TITLE = "projekt identita";
$SITE_SUBTITLE = "Příběh českého grafického designu";
$OG_IMG = "og-image.jpg";

$READMORE = "chci vědět víc";

$DEFLANG = "cz";
    $locale_range = array( "en", "cz" );
    
// global  $DEFLANG, $locale_range;
$SITELANG = '';
$DONATE = '';
$TIT = '';
$DESC = '';
$KEYWRDS = '';
$TWITTER_SITE = '';
$OG_URL = '';
$OG_IMAGE = '';


$COLOR_RANGE = array( 'color', 'no-color' );
$DEF_THEME = 'color';
$THEME = $DEF_THEME;

if ( !isset($_COOKIE["site_lang"]) ) {
    $THEME = $DEF_THEME;
} else {
    $THEME = in_array(strval($_COOKIE["color_scheme"]), $COLOR_RANGE ) ? strval($_COOKIE["color_scheme"]) : $DEF_THEME;
}

?>