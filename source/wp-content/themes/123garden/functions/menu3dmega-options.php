<?php function lpd_install_mediaboxes() {?>
<?php $navigation_speed= ot_get_option('navigation_speed');?>
<?php $clickable_navigation= ot_get_option('clickable_navigation');?>
<?php $easing_navigation= ot_get_option('easing_navigation');?>	
<?php $animate_hoverIn= ot_get_option('animate_hoverIn');?>
<?php $animate_hoverOut= ot_get_option('animate_hoverOut');?>
<?php $type_layouts= ot_get_option('type_layouts');?>
<script>
	jQuery(document).ready(function () {

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		
			var clickable = true;
		
		}else{
			
			var clickable = <?php echo esc_js($clickable_navigation); ?>;
		}

		jQuery('#menuMega').menu3d({
			"skin":"skin-123garden",
			"responsive":true,
			"clickable":clickable,
			"speed":<?php if(!$navigation_speed):?>600<?php else: echo esc_js($navigation_speed); endif; ?>,
			"easing":"<?php echo esc_js($easing_navigation); ?>",
			"hoverIn":"<?php echo esc_js($animate_hoverIn); ?>",
			"hoverOut":"<?php echo esc_js($animate_hoverOut); ?>"
		});
		
	});
</script>
<?php }?>
<?php add_action( 'wp_footer', 'lpd_install_mediaboxes', 100);?>