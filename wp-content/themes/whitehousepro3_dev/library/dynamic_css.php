<?php



// ================================
// = Hook Up Dynamic Stylesheets =
// ================================
add_action('wp_print_styles', 'dynamic_css');

function dynamic_css() {
	global $pagelines_ID; 
	global $post;
	
	if(VPRO){
		if ( file_exists( PAGELINES_PRO . '/css/pro.css') ) {
		    wp_register_style('pro', PRO_CSS . '/pro.css');
		    wp_enqueue_style( 'pro');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_black.css') && pagelines('colorscheme', $pagelines_ID) == 'black' ) {
			wp_register_style('scheme-black', PRO_CSS . '/color_black.css');
		    wp_enqueue_style( 'scheme-black');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_green.css') && pagelines('colorscheme', $pagelines_ID) == 'green' ) {
			wp_register_style('scheme-green', PRO_CSS . '/color_green.css');
		    wp_enqueue_style( 'scheme-green');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_orange.css') && pagelines('colorscheme', $pagelines_ID) == 'orange' ) {
			wp_register_style('scheme-orange', PRO_CSS . '/color_orange.css');
		    wp_enqueue_style( 'scheme-orange');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_red.css') && pagelines('colorscheme', $pagelines_ID) == 'red' ) {
			wp_register_style('scheme-red', PRO_CSS . '/color_red.css');
		    wp_enqueue_style( 'scheme-red');
		}
	}
	
} 
?>
<style type="text/css">

<?php if (pagelines('linkcolor')):?>
	a,.commentlist cite,.commentlist cite a, #sub_head #subnav .current_page_item a, #grandchildnav .current_page_item a, .headline h1 a:hover{color:<?php echo pagelines('linkcolor'); ?>;}
<?php endif;?>

<?php if(VPRO):?>
	<?php if(pagelines('body_background')):?>
		body{
			background:<?php echo pagelines('body_background');?>;
		}
	<?php endif;?>
	
	<?php if (pagelines('linkcolor_hover')):?>
		a:hover,.commentlist cite a:hover,  #grandchildnav .current_page_item a:hover, .headline h1 a:hover {color:<?php echo pagelines('linkcolor_hover'); ?>;}
	<?php endif;?>

	<?php if (pagelines('headercolor')):?>
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a{color: <?php echo pagelines('headercolor'); ?>;}
	<?php endif;?>

	<?php if (pagelines('backgroundcolor')):?>
		body {background:<?php echo pagelines('backgroundcolor');?>;}
		
	<?php endif;?>

	
	<?php if (pagelines('metacolor')):?>
		.metabar em {background:<?php echo pagelines('metacolor');?>;}
	<?php endif;?>
	<?php if (pagelines('metacolortext')):?>
		.metabar em {color:<?php echo pagelines('metacolortext');?>; text-shadow:none;}
	<?php endif;?>
	<?php if (pagelines('metacolorlink')):?>
		.metabar em a{color:<?php echo pagelines('metacolorlink');?>; text-shadow:none;}
	<?php endif;?>
	
	<?php if (pagelines('customcss')):?>
		<?php echo pagelines('customcss');?>
	<?php endif;?>
<?php endif;?>
</style>