<?php
$page_title_a_type = ot_get_option('page_title_a_type');
$page_title_a_speed = ot_get_option('page_title_a_speed');
$page_title_a_delay = ot_get_option('page_title_a_delay');
$page_title_a_offset = ot_get_option('page_title_a_offset');
$page_title_a_easing = ot_get_option('page_title_a_easing');

if(!$page_title_a_speed){
	$page_title_a_speed = '1000';
}
if(!$page_title_a_delay){
	$page_title_a_delay = '0';
}

if(!$page_title_a_offset){
	$page_title_a_offset = '80';
}

$animation_att = ' data-animation="'.esc_attr($page_title_a_type).'" data-speed="'.esc_attr($page_title_a_speed).'" data-delay="'.esc_attr($page_title_a_delay).'" data-offset="'.esc_attr($page_title_a_offset).'" data-easing="'.esc_attr($page_title_a_easing).'"';
?>

<div id="title-breadcrumb" <?php echo lpd_page_header_image(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div<?php echo lpd_title_padding(); ?> class="title-wrap">
					<?php if($page_title_a_type){?><div  class="cre-animate"<?php echo $animation_att; ?>><?php }?>
						<?php echo lpd_page_sub_title(); ?>
						<h1><?php echo lpd_title();?></h1>
					<?php if($page_title_a_type){?></div><?php }?>
				</div>
			</div>
			<div class="col-md-7"></div>
		</div>
	</div>
</div>
<div id="title-breadcrumb-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>
					<?php if(is_shop()){?>
						<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo woocommerce_breadcrumb();?></div>
					<?php } else if (is_singular('product') ) {?>
						<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo woocommerce_breadcrumb();?></div>
					<?php } else if (is_tax('product_cat')||is_tax('product_tag') ) {?>
						<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo woocommerce_breadcrumb();?></div>
					<?php } else{?>
						<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo lpd_breadcrumb()?></div>
					<?php }?>
				<?php }else{?>
					<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo lpd_breadcrumb()?></div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
