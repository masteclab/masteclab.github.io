	<div class="footer-wrapper">
		<?php if(get_option(THEME_SHORT_NAME.'_enable_footer', 'enable') == 'enable'){ ?>
			<!-- Get Footer Widget -->
			<div class="open-footer-button" id="open-footer-button"></div>
			<div class="clear"></div>
			<div class="footer-inner-wrapper">
				<div class="footer-widget-wrapper">
					<?php
						$gdl_footer_class = array(
							'footer-style1'=>array('1'=>'four columns', '2'=>'four columns', '3'=>'four columns', '4'=>'four columns'),
							'footer-style2'=>array('1'=>'eight columns', '2'=>'four columns', '3'=>'four columns', '4'=>'display-none'),
							'footer-style3'=>array('1'=>'four columns', '2'=>'four columns', '3'=>'eight columns', '4'=>'display-none'),
							'footer-style4'=>array('1'=>'one-third column', '2'=>'one-third column', '3'=>'one-third column', '4'=>'display-none'),
							'footer-style5'=>array('1'=>'two-thirds column', '2'=>'one-third column', '3'=>'display-none', '4'=>'display-none'),
							'footer-style6'=>array('1'=>'one-third column', '2'=>'two-thirds column', '3'=>'display-none', '4'=>'display-none'),
							);
						$gdl_footer_style = get_option(THEME_SHORT_NAME.'_footer_style', 'footer-style1');
					 
						for( $i=1 ; $i<=4; $i++ ){
							echo '<div class="' . $gdl_footer_class[$gdl_footer_style][$i] . ' mt0 mb0 ">';
							dynamic_sidebar('Footer ' . $i);
							echo '</div>';
						}
					?>
					<br class="clear">
				</div>
			</div>
		<?php } ?>
	</div><!-- footer-wrapper -->
</div> <!-- body-wrapper -->
<div class="now-loading" id="gdl-now-loading"></div>	
<?php wp_footer(); ?>

<script type="text/javascript"> 	
	<?php include ( TEMPLATEPATH."/javascript/cufon-replace.php" ); ?>
</script>

</body>
</html>