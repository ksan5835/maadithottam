<?php $cc = ot_get_option('cc');?>
<?php $footer_copyright = ot_get_option('footer_copyright');?>
<?php $footer_bottom_a_type = ot_get_option('footer_bottom_a_type');
$footer_bottom_a_speed = ot_get_option('footer_bottom_a_speed');
$footer_bottom_a_delay = ot_get_option('footer_bottom_a_delay');
$footer_bottom_a_offset = ot_get_option('footer_bottom_a_offset');
$footer_bottom_a_easing = ot_get_option('footer_bottom_a_easing');

if(!$footer_bottom_a_speed){
	$footer_bottom_a_speed = '1000';
}
if(!$footer_bottom_a_delay){
	$footer_bottom_a_delay = '0';
}

if(!$footer_bottom_a_offset){
	$footer_bottom_a_offset = '95';
}

$animation_att = ' data-animation="'.esc_attr($footer_bottom_a_type).'" data-speed="'.esc_attr($footer_bottom_a_speed).'" data-delay="'.esc_attr($footer_bottom_a_delay).'" data-offset="'.esc_attr($footer_bottom_a_offset).'" data-easing="'.esc_attr($footer_bottom_a_easing).'"';
?>

<?php if ( has_nav_menu( 'footer-menu' )||$cc) {?>
<div class="<?php if($footer_copyright){ ?>col-md-6<?php } else{?>col-md-12<?php } ?> payment-methods<?php if($footer_bottom_a_type){?> cre-animate<?php }?>"<?php if($footer_bottom_a_type){ echo $animation_att;}?>>

	<?php if ( has_nav_menu( 'footer-menu' )) {?>
		<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'container' => '', 'depth' => 1  ) ); ?>
	<?php } else{?>	
		<?php if($cc){ ?><img src="<?php echo esc_url($cc); ?>" class="payment-cc img-responsive" alt="<?php esc_attr_e('Payment methods', GETTEXT_DOMAIN) ?>"><?php }?>
	<?php } ?>
		
</div>
<?php } ?>
