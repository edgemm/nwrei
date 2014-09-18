<div id="sidebar" role="complementary">
	
	<?php
	global $pagelines_ID;
	global $sidesearch;
	if($sidesearch):?>
		<div id="sidesearch" class="fix">
				<?php get_template_part ('library/_searchform'); ?>	
		</div>
	<?php endif;?>
	
	<div id="widgets">
		<?php if(VPRO) get_template_part('library/_grandchildnav_pro');?>
	
		<?php if( pagelines('the_sidebar', $pagelines_ID ) == 'secondary'):?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar') ) : ?>
				<?php _e('The secondary sidebar has been selected but doesn\'t have any widgets. Add some widgets to your secondary sidebar in the admin under appearance > widgets.',TDOMAIN);?>
			<?php endif; ?>
		<?php elseif( pagelines('the_sidebar', $pagelines_ID ) == 'short'):?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Short Sidebar') ) : ?>
				<?php _e('The short sidebar has been selected but doesn\'t have any widgets. Add some widgets to your short sidebar in the admin under appearance > widgets.',TDOMAIN);?>
			<?php endif; ?>
		<?php else:?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
				<?php if(!pagelines('sidebar_no_default')) get_template_part('library/_defaultsidebar');?>
			<?php endif; ?>
		<?php endif;?>
		
	</div>
</div>
