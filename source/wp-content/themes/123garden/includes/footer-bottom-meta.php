<?php $cc = ot_get_option('cc');?>
<?php
$footer_copyright = ot_get_option('footer_copyright');

$footer_bottom_a_type = ot_get_option('footer_bottom_a_type');
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

<?php if($footer_copyright){ ?>
<div class="<?php if($cc){ ?>col-md-6<?php } else{?>col-md-12<?php } ?><?php if($footer_bottom_a_type){?> cre-animate<?php }?>"<?php if($footer_bottom_a_type){ echo $animation_att;}?>>
	<p class="copyright"><?php echo $footer_copyright ?></p>
</div>
<?php } ?>