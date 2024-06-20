<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/skeleton.css">
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie-style.php?path=<?php echo GOODLAYERS_PATH; ?>" type="text/css" media="screen, projection" /> 
	<![endif]-->
	
	<!-- Favicon
   ================================================== -->
	<?php 
		if(get_option( THEME_SHORT_NAME.'_enable_favicon','disable') == "enable"){
			$gdl_favicon = get_option(THEME_SHORT_NAME.'_favicon_image');
			if( $gdl_favicon ){
				$gdl_favicon = wp_get_attachment_image_src($gdl_favicon, 'full');
				echo '<link rel="shortcut icon" href="' . $gdl_favicon[0] . '" type="image/x-icon" />';
			}
		} 
	?>

	<!-- Start WP_HEAD
   ================================================== -->
		
	<?php wp_head(); ?>
	
	<!-- FB Thumbnail
   ================================================== -->
	<?php
	if( is_single() ){
		$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
		if( !empty($thumbnail_id) ){
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';
		}else{
			$thumbnail_id = get_post_thumbnail_id();
			if( !empty($thumbnail_id) ){
				$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
				echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';		
			}	
		}
	} else{
		$thumbnail_id = get_post_thumbnail_id();
		if( !empty($thumbnail_id) ){
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';		
		}
	}
	?>		
	
</head>
<body <?php body_class(); ?>>
	<?php
		$background_style = get_option(THEME_SHORT_NAME.'_background_style', 'Pattern');
		if($background_style == 'Custom Image'){
			$background_id = get_option(THEME_SHORT_NAME.'_background_custom');
			if(!empty($background_id)){
				$background_image = wp_get_attachment_image_src( $background_id, 'full' );
				echo '<div id="custom-full-background">';
				echo '<img src="' . $background_image[0] . '" alt="" />';
				echo '</div>';
			}
		}
	?>
<div class="body-wrapper">

	<div class="header-wrapper">
	
		<!-- Get Menu -->
		<div class="navigation-wrapper">
		
			<!-- Get Logo -->
			<div class="logo-wrapper">
				<?php
					global $gdl_menu_node;

					$gdl_is_home_class = (is_home())? '': ' not-home ';
					$gdl_is_home_url = (is_home())? '': home_url( '/' );
					
					echo '<a href="' . $gdl_is_home_url . '#section-n0" class="anchor' . $gdl_is_home_class . '">';
					$logo_attachment = wp_get_attachment_image_src(get_option(THEME_SHORT_NAME.'_logo'), 'full');
					if( !empty($logo_attachment) ){
						$logo_attachment = $logo_attachment[0];
					}else{
						$logo_attachment = GOODLAYERS_PATH . '/images/default-logo.png';
					}
					echo '<img id="gdl-main-logo" alt="logo" ';
					echo 'data-default="' . $logo_attachment . '" ';
					
					// Get custom logo
					$section_number = 0;
					if( !empty( $gdl_menu_node ) ){
						foreach( $gdl_menu_node->childNodes as $menu_item ){	
							$temp_menu_logo = wp_get_attachment_image_src(find_xml_value($menu_item, 'menu-logo'), 'full');
							if( $section_number == 0 ){
								if( !empty($temp_menu_logo) ){
									 echo 'src="' . $temp_menu_logo[0] . '" ';
								}else{
									 echo 'src="' . $logo_attachment . '" ';
								}
							}
							if( !empty($temp_menu_logo) ){
								echo 'data-logo' . $section_number . '="' . $temp_menu_logo[0] . '" ';
							}
							$section_number++;
						}
					}
					
					
					echo '/>';
					echo '</a>';
				?>
			</div>	
			<?php 
				
				$section_number = 0;
				$first_social_type = '';

				echo '<ul class="current-nav0" id="main-navigation" >';
				if( !empty( $gdl_menu_node ) ){
				
					foreach( $gdl_menu_node->childNodes as $menu_item ){
						
						$active = ''; 
						
						if( $section_number == 0){
							$active = " active";
							$first_social_tye = (find_xml_value($menu_item, 'icon-type') == 'light')? ' light':'';
						}
						
						echo '<li><a href="' . $gdl_is_home_url . '#section-n' . $section_number . '" id="nav-section' . $section_number . '" class="anchor' . $active . $gdl_is_home_class . '" >';
						echo __(find_xml_value($menu_item, 'menu-name'), 'gdl_front_end');
						echo '</a></li>';

						$section_number++;
					}
				}
				
				$gdl_copyright_text = get_option(THEME_SHORT_NAME.'_copyright_text');
				if( !empty($gdl_copyright_text) ){
					echo '<li>';
					echo '<div class="copyright-wrapper">';
					echo '<div class="gdl-copyright-divider"></div><div class="clear"></div>';
					echo $gdl_copyright_text;
					echo '</div>';
					echo '</li>';
					echo '</ul>';
				}
			?>
		</div>
		
		<!-- Get Social Icons -->
		<div class="social-icon-wrapper" id="social-icon-wrapper">
		<?php
			global $gdl_icon_type;
			$gdl_social_icon = array(
				'tiktok'=> array('name'=>THEME_SHORT_NAME.'_tiktok'),
				'delicious'=> array('name'=>THEME_SHORT_NAME.'_delicious'),
				'deviantart'=> array('name'=>THEME_SHORT_NAME.'_deviantart'),
				'digg'=> array('name'=>THEME_SHORT_NAME.'_digg'),
				'facebook' => array('name'=>THEME_SHORT_NAME.'_facebook'),
				'flickr' => array('name'=>THEME_SHORT_NAME.'_flickr'),
				'lastfm'=> array('name'=>THEME_SHORT_NAME.'_lastfm'),
				'linkedin' => array('name'=>THEME_SHORT_NAME.'_linkedin'),
				'picasa'=> array('name'=>THEME_SHORT_NAME.'_picasa'),
				'rss'=> array('name'=>THEME_SHORT_NAME.'_rss'),
				'stumble-upon'=> array('name'=>THEME_SHORT_NAME.'_stumble_upon'),
				'tumblr'=> array('name'=>THEME_SHORT_NAME.'_tumblr'),
				'twitter' => array('name'=>THEME_SHORT_NAME.'_twitter'),
				'vimeo' => array('name'=>THEME_SHORT_NAME.'_vimeo'),
				'youtube' => array('name'=>THEME_SHORT_NAME.'_youtube')
				);
			
			foreach( $gdl_social_icon as $social_name => $social_icon ){
				$social_link = get_option($social_icon['name']);
				if( !empty($social_link) ){
					echo '<div class="social-icon"><a target="_blank" class="social-' . $social_name . $first_social_tye . '" href="' . $social_link . '"></a></div>' ;
				}
			}
		?>
		</div>
		
	</div> <!-- header-wrapper -->
		