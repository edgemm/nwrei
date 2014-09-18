<div id="subnav" class="fix">
	<ul>
		<?php if(isset($post) && property_exists($post, 'ancestors')) $ancestors_array = $post->ancestors;
		else $ancestors_array = array();?>
		
		<?php if( isset($post) && ( $post->post_parent || wp_list_pages("title_li=&child_of=".$post->ID."&echo=0") ) ):?>
		<?php 
			if(count($ancestors_array)>=2){
				$reverse_ancestors = array_reverse($ancestors_array);
				$children = wp_list_pages("title_li=&depth=1&child_of=".$reverse_ancestors[0]."&echo=0&sort_column=menu_order");	
			}elseif($post->post_parent){ $children = wp_list_pages("title_li=&depth=1&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
			}else{	$children = wp_list_pages("title_li=&depth=1&child_of=".$post->ID."&echo=0&sort_column=menu_order");}

			if ($children) { echo $children;}
		?>

			<?php endif;?>
		<li><span class="last">&nbsp;</a></li>
	</ul>
	
	<?php if(!is_page_template('page-highlight.php') && !pagelines('hidesearch')) get_template_part ('library/_searchform'); ?>
</div><!-- /sub nav -->