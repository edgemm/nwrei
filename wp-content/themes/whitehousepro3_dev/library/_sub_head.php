<?php 
global $pagelines_ID; 

if(is_page_template('page-highlight.php')):?>
	<?php if(!pagelines('hidesearch')) {
		global $sidesearch; $sidesearch = true;
	}?>
	<div id="sub_head" class="fix">
		<?php get_template_part('library/_sub_nav');?>
	</div>
<?php elseif(!pagelines('hide_sub_header')):?>
	<?php if(isset($post) && ( $post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0") ) ) $children = true;
 	else $children = false;?>
	<?php if($children == true):?>
		<div id="sub_head" class="fix">
			<?php get_template_part('library/_sub_nav');?>
		</div>
	<?php elseif((is_home() || is_category()) && pagelines('subnav_categories') && wp_list_categories('include='.pagelines('subnav_categories').'&title_li=&echo=0') != "<li>No categories</li>"):?>
			<div id="sub_head" class="fix">
				<?php if(!is_page_template('page-highlight.php') && !pagelines('hidesearch')) include (THEME_LIB . '/_searchform.php'); ?>

					<ul id="subnav" class="fix">
						<?php wp_list_categories('include='.pagelines('subnav_categories').'&title_li='); ?>
					</ul>
					
			</div>
	<?php elseif(!pagelines('hidesearch')):?>

		<?php 
			global $sidesearch;
		 	$sidesearch = true;
		?>
	<?php endif;?>
<?php elseif(!pagelines('hidesearch')):?>
	<?php 
		global $sidesearch;
	 	$sidesearch = true;
	?>
<?php endif;?>