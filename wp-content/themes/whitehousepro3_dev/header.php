<?php do_action('pagelines_before_html');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Meta Images -->
	<?php if(pagelines('favicon')):?><link rel="shortcut icon" href="<?php echo pagelines('favicon');?>" type="image/x-icon" /><?php endif;?>
	<?php if(pagelines('touchicon')):?><link rel="apple-touch-icon" href="<?php echo pagelines('touchicon');?>" /><?php endif;?>

<!-- Title and External Script Integration -->
	<?php 
		global $bbpress_forum;
		if($bbpress_forum ):?>
			<title><?php wp_title(''); ?></title>
			<?php bb_feed_head(); ?>
			<?php bb_head(); ?>
			<link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />
	<?php else:?>
    			<title><?php wp_title(''); ?></title>
	<?php endif;?>
	
	
<!-- Wordpress Stuff -->
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_single() || is_page()) wp_enqueue_script( 'comment-reply' ); ?> <!-- This makes the comment box appear where the ‘reply to this comment’ link is -->
	<?php  wp_enqueue_script("jquery"); ?>
    
    
<script type="text/javascript" src="/wp-content/themes/whitehousepro3_dev/js/cufon-yui.js"></script>
<script type="text/javascript" src="/wp-content/themes/whitehousepro3_dev/js/universe-cond_500.font.js"></script>


		<script type="text/javascript">
			Cufon.replace('h1'); // Works without a selector engine
			Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
			Cufon.replace('h2'); // Works without a selector engine
			Cufon.replace('#sub2'); // Requires a selector engine for IE 6-7, see above									
		</script>


<!-- Stylesheets -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />	
	<?php get_template_part ('library/dynamic_css'); ?>

<!-- Modules w/ Javascript -->	
<?php if((is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) && VPRO) get_template_part ('core/inits/init_carousel');?>

<?php if((is_page_template('page-feature.php') || is_page_template('page-feature-page.php') || (is_home() && pagelines('featureblog'))) && VPRO) get_template_part ('core/inits/init_feature');?>

<?php if(pagelines('enable_drop_down') && VPRO) get_template_part ('core/inits/init_dropdown');?>

<?php get_template_part ('library/_ie_fixes'); ?>

<!-- Font Replacement -->
  	<?php if(VPRO) get_template_part('library/_font_replacement');?>
	<?php if (pagelines('headerscripts')) echo pagelines('headerscripts');?>

	<?php wp_head(); ?>
    <script type="text/javascript" src="http://www.nw-rei.com/wp-content/themes/whitehousepro3_dev/lunametrics-youtube.js"></script>

</head>
<body <?php body_class(); ?>>
	<?php if (pagelines('asynch_analytics')) echo pagelines('asynch_analytics');?>
	<div id="site">
		<div id="wrapper">
	
					<div id="header" class="fix">
						<div class="content fix">
							<div class="headline">
								<a class="headline-logo-rei" href="<?php echo get_option('home'); ?>/">Northwest Renewable Energy Institute</a>
								<p class="headline-contact-rei">Get Started Today! Call (800) 868-1816</p>
								<a class="headline-logo-ensa" href="http://www.nw-rei.com/wind-turbine-technician-training-programs/ensa">Wind Turbine Technician Training Programs with ENSA</a>
							</div>
							<div class="icons">
								
								<?php if(pagelines('rsslink')):?>
								<a target="_blank" href="<?php echo RSSURL;?>" class="rsslink"></a>
								<?php endif;?>
								
								<?php if(VPRO):?>
									<?php if(pagelines('twitterlink')):?>
									<a target="_blank" href="<?php echo pagelines('twitterlink');?>" class="twitterlink"></a>
									<?php endif;?>
									<?php if(pagelines('facebooklink')):?>
									<a target="_blank" href="<?php echo pagelines('facebooklink');?>" class="facebooklink"></a>
									<?php endif;?>
									<?php if(pagelines('linkedinlink')):?>
									<a target="_blank" href="<?php echo pagelines('linkedinlink');?>" class="linkedinlink"></a>
									<?php endif;?>
									<?php if(pagelines('youtubelink')):?>
									<a target="_blank" href="<?php echo pagelines('youtubelink');?>" class="youtubelink"></a>
									<?php endif;?>
								<?php endif;?>
								
							</div>
						</div>
					</div>
					<div class="container fix <?php if(m_pagelines('sidebar_layout', $post->ID) == 'left') echo 'sidebar_left';?>">
						<div class="effect containershadow">
							<div class="effect containershadow_rpt">
								<div id="sitenav" class="content fix">
									<div id="nav" class="fix ">
										<?php function nav_fallback() {?>
											<ul id="menu-nav" class="<?php if(pagelines('enable_drop_down')) echo 'mnav dropdown fix'; else echo 'mnav fix';?>">
											  	<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
											</ul>
									<?php	}
										 if(function_exists('wp_nav_menu')):?>
											<?php wp_nav_menu( array('menu_class'  => 'mnav dropdown fix', 'container' => null, 'container_class' => '', 'depth' => 3, 'theme_location'=>'primary', 'fallback_cb'=>'nav_fallback') );?>
										<?php else:?>
											<?php nav_fallback();?>
										<?php endif;?>
						
										
									</div><!-- /nav -->
									<div class="clear"></div>
								</div>
								
