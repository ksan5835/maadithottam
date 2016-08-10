<?php 
    $st_javascript = ot_get_option('st_javascript');
    $st_javascript_p = ot_get_option('st_javascript_p');

    $footer_color = ot_get_option('footer_color');
    $footer_bg_type = ot_get_option('footer_bg_type');
    $bottom_footer_color = ot_get_option('bottom_footer_color');
    $bottom_footer_bg_type = ot_get_option('bottom_footer_bg_type');
    $bottom_footer_custom_color = ot_get_option('bottom_footer_custom_color');
    
	$cc = ot_get_option('cc');
	$footer_copyright = ot_get_option('footer_copyright');
    
	$footer_style = ' style="background-color:'.esc_attr($footer_color).'"';
?>

	<?php if ( is_active_sidebar(6)||is_active_sidebar(2) ){?>
	<div id="footer-top">
		<div class="container">
			<div class="row">
			<?php if ( is_active_sidebar(6) ){?>
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Top 3 Column') ) ?>
			<?php } else{?>
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Top') ) ?>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>


	<?php get_template_part('includes/footer-separator') ?>
	<?php get_template_part('includes/footer-meta') ?>
	
	<?php if ( is_active_sidebar(7)||is_active_sidebar(3) ){?>
	
	<div id="footer"<?php if ($footer_color) { echo $footer_style; } ?>>
		
		<div class="footer<?php if ($footer_bg_type) {?>  footer-dark-theme<?php } ?>">
			<div class="container">
				<div class="row">
				<?php if ( is_active_sidebar(7) ){?>
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3 Column') ) ?>
				<?php } else{?>
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) ?>
				<?php } ?>
				</div>
			</div>
		</div>

	</div>
	
	<?php } ?>
	
	<?php if ( $cc||$footer_copyright||has_nav_menu( 'footer-menu' ) ){?>
	<div id="footer-bottom"<?php if (!$bottom_footer_bg_type) {?> class="footer-bottom-dark-theme"<?php } ?><?php if ($bottom_footer_custom_color) { if ($bottom_footer_color) {?> style="background-color:<?php echo esc_attr($bottom_footer_color);?>"<?php } }?>>
		<div class="container">
			<div class="row">
				<?php get_template_part('includes/payment-method') ?>
				<?php get_template_part('includes/footer-bottom-meta') ?>
			</div>
		</div>
	</div>
	<?php } ?>
	
</div>

<?php get_template_part('includes/scotchpanels-content' );?>

<?php get_template_part('includes/custom_css') ?>
<?php get_template_part('includes/custom_js') ?>

<?php if (is_singular()) {?>
	<?php if ($st_javascript) {?>
		<!-- sharethis buttons -->
		<?php echo $st_javascript;?>
	<?php } ?>
<?php } ?>

<?php if (is_singular('portfolio')) {?>
	<?php if ($st_javascript_p) {?>
		<!-- sharethis buttons -->
		<?php echo $st_javascript_p;?>
	<?php } ?>
<?php } ?>
    
<?php wp_footer(); ?>

</body>
</html>