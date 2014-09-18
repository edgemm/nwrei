<?php

// add theme scripts - gfh
function nwrei_scripts() {
	//wp_enqueue_script( 'menu-scripts', get_stylesheet_directory_uri() . '/js/rh-menu.js', array(), '1.0.0', true );
	//if ( is_page( array( 42, 369, 1041, 1864, 1932, 1941, 1954 ) ) ) {
	wp_enqueue_style( 'jqueryui-dialog', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css' );
	wp_enqueue_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array(), '1.10.4', true );
	wp_enqueue_script( 'jquery-apply', get_stylesheet_directory_uri() . '/js/nwrei-apply.js', array(), '1.0.0', true );
	//}
}
add_action( 'wp_enqueue_scripts', 'nwrei_scripts' );

// Theme Initialization -- Copyright PageLines 2010 -- Designed by Andrew Powers -- 

// GET CORE ///////////
	
	if(file_exists(TEMPLATEPATH.'/_core/init_core.php')){
		define('CORE', TEMPLATEPATH . "/_core");
		define('CORENAME', "_core");
	}else{
		define('CORE', TEMPLATEPATH . "/core");
		define('CORENAME', "core");
	}
	include(CORE . "/init_core.php");
	
	
	// SMC Change code cleanup/content filtering config

function mytheme_tinymce_config( $init ) {

// Add to list of valid HTML elements (so they don't get stripped)

    // IFRAME
    $valid_iframe = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';
    // PRE
    $valid_pre = 'pre[id|name|class|style]';
    // DIV
    $valid_div = 'div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title]';

    // Concatenate 
    $cbnet_valid_elements = $valid_iframe . ',' . $valid_pre . ',' . $valid_div;

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $cbnet_valid_elements;
    } else {
        $init['extended_valid_elements'] = $cbnet_valid_elements;
    }

// Pass $init back to WordPress
    return $init;
}
add_filter('tiny_mce_before_init', 'mytheme_tinymce_config');


// SMC add Adwords Tracking to /Applications Page

function myjavascript_in_wp_footer($pid){
   if (is_page()) {
       global $post;
       if($post->ID=="376"){ // only for post Id = 123
            echo '
			
			<!-- Google Code for Lead Form Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 975858284;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "FlydCJSbygIQ7NSp0QM";
var google_conversion_value = 1.000000;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/975858284/?value=1.000000&amp;label=FlydCJSbygIQ7NSp0QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
			
			';
       }
   }
}
add_action( 'wp_footer', 'myjavascript_in_wp_footer' );
	

?>
