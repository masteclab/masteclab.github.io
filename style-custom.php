<?php
	/*	
	*	Goodlayers Custom Style File (style-custom.php)
	*	---------------------------------------------------------------------
	*	This file fetch all style options in admin panel to generate the css
	*	to attach to header.php file
	*	---------------------------------------------------------------------
	*/

	header("Content-type: text/css;");
	
	$current_url = dirname(__FILE__);
	$wp_content_pos = strpos($current_url, 'wp-content');
	$wp_content = substr($current_url, 0, $wp_content_pos);

	require_once($wp_content . 'wp-load.php');
	
?>
/* Background
   ================================= */
<?php 
	$background_style = get_option(THEME_SHORT_NAME.'_background_style', 'Pattern');
	if($background_style == 'Pattern'){
		$background_pattern = get_option(THEME_SHORT_NAME.'_background_pattern', '1');
		?>
		
		html{ 
			background-image: url('<?php echo GOODLAYERS_PATH; ?>/images/pattern/pattern-<?php echo $background_pattern; ?>.png');
			background-repeat: repeat; 
		}
		
		<?php
	}
?>
   
/* Logo
   ================================= */
.logo-wrapper{
	margin-top: <?php echo get_option(THEME_SHORT_NAME . "_logo_top_margin", '65'); ?>px;
	margin-right: <?php echo get_option(THEME_SHORT_NAME . "_logo_right_margin", '0'); ?>px;
	margin-bottom: <?php echo get_option(THEME_SHORT_NAME . "_logo_bottom_margin", '40'); ?>px;
}  
   
/* Font Size
   ================================= */
h1{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h1_size", '30'); ?>px;
}
h2{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h2_size", '25'); ?>px;
}
h3{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h3_size", '20'); ?>px;
}
h4{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h4_size", '18'); ?>px;
}
h5{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h5_size", '16'); ?>px;
}
h6{
	font-size: <?php echo get_option(THEME_SHORT_NAME . "_h6_size", '15'); ?>px;
}

/* Body
   ================================= */
html{
	background-color: <?php echo get_option(THEME_SHORT_NAME . "_body_background", '#dddddd'); ?>;
}
div.container-fake{
	background-color: <?php echo get_option(THEME_SHORT_NAME . "_container_background", '#ffffff'); ?>;
}
div.content-top-gimmick-wrapper{ 
	background-color: <?php echo get_option(THEME_SHORT_NAME . "_container_top_bar", '#484848;'); ?>;
}

/* Font Family 
  ================================= */
body{
	font-family: <?php echo substr(get_option(THEME_SHORT_NAME . "_content_font"), 2); ?>;
}
h1, h2, h3, h4, h5, h6, .gdl-title{
	font-family: <?php echo substr(get_option(THEME_SHORT_NAME . "_header_font"), 2); ?>;
}
.gdl-info, span.page-header-caption, div.custom-sidebar #twitter_update_list,
div.custom-sidebar  .recent-post-widget-date, div.custom-sidebar  .recent-post-widget-comment-num,
div.custom-sidebar .error, span.comment-date, span.portfolio-header-caption, span.single-header-caption, 
span.single-portfolio-header-caption, span.blog-header-caption{
	font-family: <?php echo gdl_format_font(THEME_SHORT_NAME . "_info_font"); ?>;
}

/* Stunning Text
  ================================= */
.stunning-text-title{
	<?php 
		$stunning_text_font = get_option(THEME_SHORT_NAME . "_stunning_text_font");
		if( !empty( $stunning_text_font ) ){ 
				echo 'font-family: ' . substr( $stunning_text_font, 2) . ';';
		}
	?>
	color: <?php echo get_option(THEME_SHORT_NAME . "_stunning_text_title_color", '#000000'); ?>;
}
.stunning-text-caption{
	<?php 
		if( !empty( $stunning_text_font ) ){ 
				echo 'font-family: ' . substr( $stunning_text_font, 2) . ';';
		}
	?>
	color: <?php echo get_option(THEME_SHORT_NAME . "_stunning_text_caption_color", '#888888'); ?>;
}
  
/* Font Color
   ================================= */
body{
	color: <?php echo get_option(THEME_SHORT_NAME . "_content_color", '#666666'); ?> !important;
}
a{
	color: <?php echo get_option(THEME_SHORT_NAME . "_link_color", '#222222'); ?>;
}
.gdl-link-title{
	color: <?php echo get_option(THEME_SHORT_NAME . "_link_color", '#222222'); ?> !important;
}
a:hover{
	color: <?php echo get_option(THEME_SHORT_NAME . "_link_hover_color", '#555555'); ?>;
}
h1, h2, h3, h4, h5, h6, .title-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_title_color', '#333333'); ?> !important;
}
.caption-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_caption_color', '#949494'); ?> !important;
}

/* Post/Port Color
   ================================= */
   
.port-title-color a, a.port-title-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_port_title_color', '#404040'); ?> !important;
}
.port-title-color a:hover, a:hover.port-title-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_port_title_hover_color', '#666666'); ?> !important;
}
.single-port-np-divider{
	border-color: <?php echo get_option(THEME_SHORT_NAME.'_port_info_divider_color', '#000000'); ?> !important;
}
.post-title-color, a.post-title-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_post_title_color', '#444444'); ?> !important;
}
.post-title-color a:hover, a:hover.post-title-color{
	color: <?php echo get_option(THEME_SHORT_NAME.'_post_title_hover_color', '#777777'); ?> !important;
}
.port-info-color, .port-info-color a,
.post-info-color, .post-info-color a, 
div.custom-sidebar #twitter_update_list{
	color: <?php echo get_option(THEME_SHORT_NAME.'_post_info_color', '#919191'); ?> !important;
}
.post-info-title-color, .post-info-title-color a{
	color: <?php echo get_option(THEME_SHORT_NAME.'_post_info_title_color', '#b3b3b3'); ?> !important;
}
div.pagination a{ background-color: <?php echo get_option(THEME_SHORT_NAME.'_pagination_normal_state', '#f5f5f5'); ?>; }
div.portfolio-thumbnail-image,
div.portfolio-thumbnail-video,
div.portfolio-thumbnail-slider,
div.blog-item-holder .blog-thumbnail-image,
div.blog-item-holder .blog-thumbnail-video,
div.blog-item-holder .blog-thumbnail-slider,
div.single-port-thumbnail-image,
div.single-port-thumbnail-video,
div.single-port-thumbnail-slider,
div.single-post-thumbnail-image,
div.single-post-thumbnail-video,
div.single-post-thumbnail-slider{
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_post_port_frame_color', '#e3e3e3'); ?> !important;
} 

/* Slider 
   ================================= */
.gdl-slider-title{
	color: <?php echo get_option(THEME_SHORT_NAME . "_slider_title_color", '#ff9600'); ?> !important;
}  
.gdl-slider-caption{
	color: <?php echo get_option(THEME_SHORT_NAME . "_slider_title_color", '#ffffff'); ?> !important;
}

/* Column Service
   ================================= */
.column-service-title{
	color: <?php echo get_option(THEME_SHORT_NAME.'_column_service_title_color', '#2a2a2a'); ?> !important;
}

/* Footer Color
   ================================= */
.footer-wrapper a{
	color: <?php echo get_option(THEME_SHORT_NAME . "_footer_link_color", '#ffa217'); ?>;
}
.footer-wrapper a:hover{
	color: <?php echo get_option(THEME_SHORT_NAME . "_footer_link_hover_color", '#ffbf5e'); ?>;
}
.footer-widget-wrapper .custom-sidebar-title{ 
	color: <?php echo get_option(THEME_SHORT_NAME.'_footer_title_color', '#ececec'); ?> !important;
}
.footer-wrapper .gdl-divider{
	border-color: <?php echo get_option(THEME_SHORT_NAME.'_footer_divider_color', '#3b3b3b'); ?> !important;
}
.footer-wrapper, .footer-wrapper table th{
	color: <?php echo get_option(THEME_SHORT_NAME.'_footer_content_color', '#999999'); ?> !important;
}
.footer-wrapper .post-info-color, div.custom-sidebar #twitter_update_list{
	color: <?php echo get_option(THEME_SHORT_NAME.'_footer_content_info_color', '#b1b1b1'); ?> !important;
}
div.footer-wrapper div.contact-form-wrapper input[type="text"], 
div.footer-wrapper div.contact-form-wrapper input[type="password"], 
div.footer-wrapper div.contact-form-wrapper textarea, 
div.footer-wrapper div.custom-sidebar #search-text input[type="text"], 
div.footer-wrapper div.custom-sidebar .contact-widget-whole input, 
div.footer-wrapper div.custom-sidebar .contact-widget-whole textarea {
	color: <?php echo get_option(THEME_SHORT_NAME.'_footer_input_text', '#888888'); ?> !important; 
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_footer_input_background', '#3d3d3d'); ?> !important;
	border: 1px solid <?php echo get_option(THEME_SHORT_NAME.'_footer_input_border', '#333333'); ?> !important;
}
div.footer-wrapper a.button, div.footer-wrapper button, div.footer-wrapper button:hover {
	color: <?php echo get_option(THEME_SHORT_NAME.'_footer_button_text', '#7a7a7a'); ?> !important; 
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_footer_button_color', '#242424'); ?> !important;
}
div.footer-wrapper div.custom-sidebar .recent-post-widget-thumbnail {  
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_footer_frame_background', '#292929'); ?>; 
	border-color: <?php echo get_option(THEME_SHORT_NAME.'_footer_frame_border', '#3b3b3b'); ?>;
}

<?php $gdl_footer_background = get_option(THEME_SHORT_NAME.'_footer_background', 'dark'); ?>
div.open-footer-button{ 
	background: url('images/icon/<?php echo $gdl_footer_background; ?>/footer-close.png'); 
}
div.open-footer-button.active{ 
	background: url('images/icon/<?php echo $gdl_footer_background; ?>/footer-open.png'); 
}
.footer-wrapper .footer-inner-wrapper{ 
	background: url('images/icon/<?php echo $gdl_footer_background; ?>/footer-bg.png');
}
/* Divider Color
   ================================= */
.gdl-divider{
	border-color: <?php echo get_option(THEME_SHORT_NAME . "_divider_line", '#ececec'); ?> !important;
}
table th{
	color: <?php echo get_option(THEME_SHORT_NAME.'_table_text_title', '#666666'); ?>;
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_table_title_background', '#f7f7f7'); ?>;
}
table, table tr, table tr td, table tr th{
	border-color: <?php echo get_option(THEME_SHORT_NAME . "_table_border", '#e5e5e5'); ?>;
}

/* Testimonial Color
   ================================= */
.testimonial-content{
	color: <?php echo get_option(THEME_SHORT_NAME.'_testimonial_text', '#848484'); ?> !important;;
}
.testimonial-author-name{
	color: <?php echo get_option(THEME_SHORT_NAME.'_testimonial_author', '#494949'); ?> !important;; 
}
.testimonial-author-position{
	color: <?php echo get_option(THEME_SHORT_NAME.'_testimonial_position', '#8d8d8d'); ?> !important;;
}

/* Tabs Color
   ================================= */
ul.tabs li a {
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_tab_background_color', '#f5f5f5'); ?> !important;;
}
ul.tabs li a.active {
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_tab_active_background_color', '#ffffff'); ?> !important;;
}

/* Button Color
   ================================= */
<?php
	$gdl_button_color = get_option(THEME_SHORT_NAME.'_button_background_color', '#f1f1f1');
	$gdl_button_border = get_option(THEME_SHORT_NAME.'_button_border_color', '#dedede');
	$gdl_button_text = get_option(THEME_SHORT_NAME.'_button_text_color', '#7a7a7a');
	$gdl_button_hover = get_option(THEME_SHORT_NAME.'_button_text_hover_color', '#7a7a7a');
	$gdl_button_shadow = get_option(THEME_SHORT_NAME.'_button_shadow_color', '#ececec');
?>
a.button, button, input[type="submit"], input[type="reset"], input[type="button"],
a.gdl-button{
	background-color: <?php echo $gdl_button_color; ?>;
	color: <?php echo $gdl_button_text; ?>;
	border: 1px solid <?php echo $gdl_button_border; ?>;
	-moz-box-shadow: 1px 1px 3px <?php echo $gdl_button_shadow; ?>;
	-webkit-box-shadow: 1px 1px 3px <?php echo $gdl_button_shadow; ?>;
	box-shadow: 1px 1px 3px <?php echo $gdl_button_shadow; ?>;	
}

a.button:hover, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover,
a.gdl-button:hover{
	color: <?php echo $gdl_button_hover; ?>;
}
   
/* Price Item
   ================================= */   
div.gdl-price-item .gdl-divider{ 
	border-color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_border', '#ececec'); ?> !important;
}
div.gdl-price-item .price-title{
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_price_title_background', '#e9e9e9'); ?> !important;
	color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_price_title_color', '#3a3a3a'); ?> !important;
}
div.gdl-price-item .price-item.active .price-title{ 
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_best_price_title_background', '#5f5f5f'); ?> !important;
	color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_best_price_title_color', '#ffffff'); ?> !important;
}
div.gdl-price-item .price-tag{
	color: <?php echo get_option(THEME_SHORT_NAME.'_price_item_price_color', '#3a3a3a'); ?> !important;
}
div.gdl-price-item .price-item.active .price-tag{
	<?php $gdl_best_price_color = get_option(THEME_SHORT_NAME.'_price_item_best_price_color', '#ff9600'); ?>
	color: <?php echo $gdl_best_price_color; ?> !important;
}
div.gdl-price-item .price-item.active{
	border-top: 1px solid <?php echo $gdl_best_price_color; ?> !important;
}
div.gdl-price-item .price-item.active {
	<?php $gdl_best_price_shadow = get_option(THEME_SHORT_NAME.'_price_item_best_price_item_shadow', '#ececec'); ?>
	-moz-box-shadow: 0px 0px 3px <?php echo $gdl_best_price_shadow; ?>;
	-webkit-box-shadow: 0px 0px 3px <?php echo $gdl_best_price_shadow; ?>;
	box-shadow: 0px 0px 3px <?php echo $gdl_best_price_shadow; ?>;
}

/* Icon Type (dark/light)
   ================================= */
<?php global $gdl_icon_type; ?>

div.custom-sidebar #searchsubmit,	
div.search-wrapper input[type="submit"]{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/find-17px.png') no-repeat center; }	

span.accordion-head-image.active,
span.toggle-box-head-image.active{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/minus-24px.png'); }
span.accordion-head-image,
span.toggle-box-head-image{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/plus-24px.png'); }

div.jcarousellite-nav .prev, 
div.jcarousellite-nav .next{ background-image: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/navigation-20px.png'); } 

div.testimonial-icon{ background: url("<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/quotes-18px.png"); }

span.archive-back-icon,
span.back-to-port-icon,
span.back-to-post-icon{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/back.png') no-repeat; }

a.single-port-prev-button{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/previous.png') no-repeat; }
a.single-port-next-button{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/next.png') no-repeat; }

div.single-port-visit-website{ background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_icon_type; ?>/visit-website.png') no-repeat; }

/* Footer Icon Type
   ================================= */
<?php global $gdl_footer_icon_type; ?>
div.footer-wrapper div.custom-sidebar ul li { background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_footer_icon_type; ?>/arrow4.png') no-repeat 0px 14px; }
div.footer-wrapper div.custom-sidebar #searchsubmit { background: url('<?php echo GOODLAYERS_PATH; ?>/images/icon/<?php echo $gdl_footer_icon_type; ?>/find-17px.png') no-repeat center; }


/* Contact Form
   ================================= */
<?php
	$gdl_contact_form_frame = get_option(THEME_SHORT_NAME.'_contact_form_frame_color', '#f8f8f8');
	$gdl_contact_form_shadow = get_option(THEME_SHORT_NAME.'_contact_form_inner_shadow', '#ececec');
 ?>
div.contact-form-wrapper input[type="text"], 
div.contact-form-wrapper input[type="password"],
div.contact-form-wrapper textarea,
div.custom-sidebar #search-text input[type="text"],
div.custom-sidebar .contact-widget-whole input, 
div.comment-wrapper input[type="text"], input[type="password"], div.comment-wrapper textarea,
div.custom-sidebar .contact-widget-whole textarea,
span.wpcf7-form-control-wrap input[type="text"], 
span.wpcf7-form-control-wrap input[type="password"], 
span.wpcf7-form-control-wrap textarea{
	color: <?php echo get_option(THEME_SHORT_NAME.'_contact_form_text_color', '#888888'); ?>;
	background-color: <?php echo get_option(THEME_SHORT_NAME.'_contact_form_background_color', '#fff'); ?>;
	border: 1px solid <?php echo get_option(THEME_SHORT_NAME.'_contact_form_border_color', '#cfcfcf'); ?>;

	-webkit-box-shadow: <?php echo $gdl_contact_form_shadow; ?> 0px 1px 4px inset, <?php echo $gdl_contact_form_frame; ?> -5px -5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px 5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px 0px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 0px 5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px -5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> -5px 5px 0px 0px;
	box-shadow: <?php echo $gdl_contact_form_shadow; ?> 0px 1px 4px inset, <?php echo $gdl_contact_form_frame; ?> -5px -5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px 5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px 0px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 0px 5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> 5px -5px 0px 0px, <?php echo $gdl_contact_form_frame; ?> -5px 5px 0px 0px;
}

/* Section
   ================================= */
<?php 
	$section_number = 0;
	
	if( !empty( $gdl_menu_node ) ){		
		foreach( $gdl_menu_node->childNodes as $menu_item ){
			// Background
			$background_type = find_xml_value($menu_item, 'background-type');
			if( $background_type == 'Image'){
				$background_id = find_xml_value($menu_item, 'background-image');
				if(!empty($background_id)){ 
					$background_src = wp_get_attachment_image_src( $background_id, 'full');
					echo 'section#section-n' . $section_number . '{';
					echo 'background: url("' . $background_src[0] . '") 50% 0 fixed;';
					echo '} ';
				} 
			}else if($background_type == 'Color'){
				$background_color = find_xml_value($menu_item, 'background-color');
				echo 'section#section-n' . $section_number . '{';
				echo 'background-color: ' . $background_color . ';';
				echo '} ';			
			}else if($background_type == 'Pattern'){
				$background_color = find_xml_value($menu_item, 'background-color');
				$background_pattern = find_xml_value($menu_item, 'background-pattern');
				echo 'section#section-n' . $section_number . '{';
				echo 'background-image: url("' . GOODLAYERS_PATH . '/images/pattern/pattern-' . $background_pattern . '.png");';
				echo 'background-color: ' . $background_color . ';';
				echo '} ';					
			}
			// Navigation
			$gdl_nav_color = find_xml_value($menu_item, 'menu-text');
			$gdl_nav_hover_color = find_xml_value($menu_item, 'menu-text-hover');
			$gdl_nav_bg_hover_color = find_xml_value($menu_item, 'menu-background-hover');
			$gdl_copyright_color = find_xml_value($menu_item, 'copyright-color');
			
			echo 'ul.current-nav' . $section_number . ' a{';
			echo 'color:' . $gdl_nav_color . ' !important;';
			echo '}';
			
			echo 'ul.current-nav' . $section_number . ' a:hover, ul.current-nav' . $section_number . ' a.active{';
			echo 'color:' . $gdl_nav_hover_color . ' !important;';
			echo 'background-color:' . $gdl_nav_bg_hover_color . ' !important;';
			echo '}';			
			
			//Copyright
			echo 'ul.current-nav' . $section_number . ' div.copyright-wrapper,';
			echo 'ul.current-nav' . $section_number . ' div.gdl-copyright-divider{';
			echo 'border-color:' . $gdl_copyright_color . ' !important;';
			echo 'color:' . $gdl_copyright_color . ' !important;';
			echo '}';
			
			$section_number++;
		}
	}
?>