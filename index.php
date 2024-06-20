<?php 
	// Include header elements
	get_header();
?>	
	<div class="content-wrapper">
		<div class="section-wrapper">
		<?php 
			$section_number = 0;
			
			if( !empty( $gdl_menu_node ) ){
				
				foreach( $gdl_menu_node->childNodes as $menu_item ){
				
					echo '<section id="section-n' . $section_number . '" class="story" data-speed="4" data-type="background" ';
					echo 'data-icon="' . find_xml_value($menu_item, 'icon-type') . '" ><article>';
					?>
						<div class="article-wrapper">
							<div class="container-fake"></div>
							<div class="container" >
								<?php 
									echo '<div class="content-top-gimmick-wrapper"></div>'; 
									
									$gdl_menu_name = find_xml_value($menu_item, 'menu-page-title');
									
									echo '<div class="ajax-container" data-firstpage="' . $gdl_menu_name . '">';
									get_gdl_page_by_title( $gdl_menu_name );
									echo '<div class="clear"></div>';
									echo '</div>';
								?>
								<div class="clear"></div>
							</div>
						</div>
					<?php
					echo '</article></section>';
					
					$section_number++;
				}
			}
		?>
		</div>	
	</div>	
<?php			
	// Include the footer elements
	get_footer(); 

?>