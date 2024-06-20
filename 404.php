<?php 
/**
 * 404 ( Not fount page )
 */
get_header();?>
	<?php 
		global $gdl_admin_translator;
		// Translator
		if( $gdl_admin_translator == 'enable' ){
			$translate_title = get_option(THEME_SHORT_NAME.'_404_title', 'Sorry');
			$translate_content = get_option(THEME_SHORT_NAME.'_404_content', "The page you are finding seem doesn't exist.");
		}else{
			$translate_title = __('Sorry','gdl_front_end');
			$translate_content = __("The page you are finding seem doesn't exist.",'gdl_front_end');
		}		
	?>
	<div class="content-wrapper gdl-not-home">
		<div class="section-wrapper">
			<section data-background="static">
				<article>
					<div class="article-wrapper">
						<div class="container-fake"></div>
						<div class="container" >		
							<div class="content-top-gimmick-wrapper"></div>
							<div class="ajax-container">
								<div class="message-box-wrapper red">
									<div class="message-box-title">
										<?php echo $translate_title; ?>
									</div>
									<div class="message-box-content">
										<?php echo $translate_content; ?>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</article>
			</section>
		</div> <!-- section wrapper -->
		<div class="clear"></div>
		
	</div> <!-- content-wrapper -->
<?php get_footer();?>