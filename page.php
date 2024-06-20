<?php get_header(); ?>

	<div class="content-wrapper gdl-not-home">
	
		<div class="section-wrapper">
			<section data-background="static">
				<article>
					<div class="article-wrapper">
						<div class="container-fake"></div>
						<div class="container" >		
							<?php 
								echo '<div class="content-top-gimmick-wrapper"></div>'; 
								$gdl_menu_name = get_the_ID();
								echo '<div class="ajax-container" data-firstpage="' . $gdl_menu_name . '">';
								get_gdl_page_by_title( $gdl_menu_name, 'main-query' );
								echo '<div class="clear"></div>';
								echo '</div>';
							?>
							<div class="clear"></div>
						</div>
					</div>
				</article>
			</section>
		</div> <!-- section wrapper -->
		<div class="clear"></div>
		
	</div> <!-- content-wrapper -->

<?php get_footer(); ?>