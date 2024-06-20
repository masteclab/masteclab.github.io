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
								echo '<div class="ajax-container">';
								get_gdl_archive_page( '', '', 1, true );
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