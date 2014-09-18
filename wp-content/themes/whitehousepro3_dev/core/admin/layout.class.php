<?php

class PageLinesLayout {

	// BUILD THE PAGELINES OBJECT
		function __construct() {
			$this->build_layout();		
		}
	
		function build_layout(){
				
				
				$this->layout_mode = 'two-sidebar-right';
				
				if($this->layout_mode == 'two-sidebar-middle' || $this->layout_mode == 'two-sidebar-left' || $this->layout_mode == 'two-sidebar-right'){
					$this->num_columns = 3;
				}elseif($this->layout_mode == 'one-sidebar-left' || $this->layout_mode == 'one-sidebar-right'){
					$this->num_columns = 2;
				}else $this->num_columns = 1;
				
				
				$this->builder->width = 1300;
				$this->builder->bwidth = $this->downscale($this->builder->width);
				
				$this->content->width = 960;
				$this->content->bwidth = $this->downscale($this->content->width);
				
				
				if($this->num_columns == 3){
					$this->fudgefactor = 24;
				
					$this->main_content->width = 480;
					$this->sidebar1->width = 240;
					
				}elseif($this->num_columns == 2){
					$this->fudgefactor = 24;
				
					$this->main_content->width = 660;
					$this->sidebar1->width = 300;
				}elseif($this->num_columns == 1){
					
					$this->fudgefactor = 10;

					$this->main_content->width = 960;
					$this->sidebar1->width = 0;
				}	
				
				
				$this->margin->width = ($this->builder->width - $this->content->width)/2 - ($this->fudgefactor - 1);
				$this->margin->bwidth = $this->downscale($this->margin->width);
				
				
				$this->main_content->text = 'Content';
				$this->main_content->bwidth = $this->downscale($this->main_content->width);
				$this->sidebar2->ID = 'layout-main-content';
				
				$this->sidebar1->text = 'SB1';
				$this->sidebar1->bwidth = $this->downscale($this->sidebar1->width);
				$this->sidebar1->ID = 'layout-sidebar-1';

				$this->sidebar2->width = $this->content->width - $this->main_content->width - $this->sidebar1->width;
				$this->sidebar2->text = 'SB2';
				$this->sidebar2->bwidth = $this->downscale($this->sidebar2->width);
				$this->sidebar2->ID = 'layout-sidebar-2';
				
				$this->hidden->width = 0;
				$this->hidden->text = '';
				$this->hidden->bwidth = 0;
				$this->hidden->ID = 'hidden';
				
				
				$this->builder_inner_directions();
			
		}
		
		function builder_inner_directions(){
			if($this->layout_mode == 'two-sidebar-right'){
				
				$this->west = $this->main_content;
				$this->center = $this->sidebar1;
				$this->east = $this->sidebar2;
			}elseif($this->layout_mode == 'two-sidebar-left'){

				$this->east = $this->main_content;
				$this->west = $this->sidebar1;
				$this->center = $this->sidebar2;
			}elseif($this->layout_mode == 'two-sidebar-middle'){

				$this->east = $this->sidebar2;
				$this->west = $this->sidebar1;
				$this->center = $this->main_content;
			}elseif($this->layout_mode == 'one-sidebar-right'){
				$this->east = $this->sidebar1;
				$this->west = $this->hidden;
				$this->center = $this->main_content;
			}
			elseif($this->layout_mode == 'one-sidebar-left'){
				$this->east = $this->hidden;
				$this->west = $this->sidebar1;
				$this->center = $this->main_content;
			}
		}
		
		
		function downscale($actual_pixels, $ratio = 2){
			return floor($actual_pixels / $ratio);
		}



}

//********* END OF LAYOUT CLASS *********//


// PageLines function returns attributes from layout class

function pagelines_layout($field, $att = null){
	$pagelines_layout = new PageLinesLayout;
	
	
	if(isset($att)){
		return $pagelines_layout->$field->$att;
	}elseif($pagelines_layout->$field){
		return $pagelines_layout->$field;	
	}else print_r($pagelines_layout);
}


?>