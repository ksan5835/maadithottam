<?php
$hc_delivery = ot_get_option('hc_delivery');

$hc_contact = ot_get_option('hc_contact');

$hc_custom1 = ot_get_option('hc_custom1');
$hc_custom1_title = ot_get_option('hc_custom1_title');

$hc_custom1_css = ot_get_option('hc_custom1_css');
$hc_custom2 = ot_get_option('hc_custom2');
$hc_custom2_title = ot_get_option('hc_custom2_title');

$hc_custom2_css = ot_get_option('hc_custom2_css');
$hc_custom1_bg_dd = ot_get_option('hc_custom1_bg_dd');
$hc_custom2_bg_dd = ot_get_option('hc_custom2_bg_dd');
$hc_delivery_bg_dd = ot_get_option('hc_delivery_bg_dd');
$hc_contact_bg_dd = ot_get_option('hc_contact_bg_dd');
$disable_sticky_containers = ot_get_option('disable_sticky_containers');

$hc_custom_2_styles=$hc_custom_1_styles= '';

if($hc_custom1_css){
	$hc_custom_1_styles=" style='".esc_attr($hc_custom1_css)."'";
}
if($hc_custom2_css){
	$hc_custom_2_styles=" style='".esc_attr($hc_custom2_css)."'";
}
?>

<?php if($hc_delivery!="none"||$hc_contact!="none"||$hc_custom1!="none"||$hc_custom2!="none"){ ?>
<div class="lpd-header-content<?php if($disable_sticky_containers){ ?> lpd-header-content-disabled-sticky<?php } ?>">
	<?php if($hc_delivery!="none"){ ?>
	<div class="hc-delivery hc-item">
		<a href="#"><?php _e('Delivery', GETTEXT_DOMAIN); ?></a>
		<?php if($hc_delivery=='dropdown'){  if ( is_active_sidebar(10) ){ ?><div class="hc-delivery-content"><div class="hc-delivery-content-wrap"<?php if($hc_delivery_bg_dd){ ?> style="background-color:<?php echo esc_attr($hc_delivery_bg_dd); ?>;"<?php } ?>><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Delivery" Header Content') ) ?></div></div><?php } } ?>
	</div>
	<?php } ?>
	<?php if($hc_contact!="none"){ ?>
	<div class="hc-contact hc-item">
		<a href="#"><?php _e('Contact Us', GETTEXT_DOMAIN); ?></a>
		<?php if($hc_contact=='dropdown'){ if ( is_active_sidebar(11) ){?><div class="hc-contact-content"><div class="hc-contact-content-wrap"<?php if($hc_contact_bg_dd){ ?> style="background-color:<?php echo esc_attr($hc_contact_bg_dd); ?>;"<?php } ?>><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Contact Us" Header Content') ) ?></div></div><?php } } ?>
	</div>
	<?php } ?>
	<?php if($hc_custom1!="none"&&$hc_custom1_title){ ?>
	<div class="hc-custom-1 hc-item">
		<a href="#"<?php echo $hc_custom_1_styles; ?>><?php echo esc_html($hc_custom1_title); ?></a>
		<?php if($hc_custom1=='dropdown'){ if ( is_active_sidebar(12) ){ ?><div class="hc-custom-1-content"><div class="hc-custom-1-content-wrap"<?php if($hc_custom1_bg_dd){ ?> style="background-color:<?php echo esc_attr($hc_custom1_bg_dd); ?>;"<?php } ?>><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Custom 1" Header Content') ) ?></div></div><?php } } ?>
	</div>
	<?php } ?>
	<?php if($hc_custom2!="none"&&$hc_custom2_title){ ?>
	<div class="hc-custom-2 hc-item">
		<a href="#"<?php echo $hc_custom_2_styles; ?>><?php echo esc_html($hc_custom2_title); ?></a>
		<?php if($hc_custom2=='dropdown'){ if ( is_active_sidebar(13) ){ ?><div class="hc-custom-2-content"><div class="hc-custom-2-content-wrap"<?php if($hc_custom2_bg_dd){ ?> style="background-color:<?php echo esc_attr($hc_custom2_bg_dd); ?>;"<?php } ?>><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Custom 2" Header Content') ) ?></div></div><?php } } ?>
	</div>
	<?php } ?>
</div>
<?php } ?>