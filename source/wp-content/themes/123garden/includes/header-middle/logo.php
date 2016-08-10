<?php 
    $custom_logo = ot_get_option('custom_logo');
    $header_type = ot_get_option('header_type');
	$custom_logo_tm = ot_get_option('custom_logo_tm');
	$custom_logo_bm = ot_get_option('custom_logo_bm');
?>

	<?php if($custom_logo){?>
	<div id="logo" class="img">
	    <a href="<?php echo esc_url(home_url()); ?>"<?php if($custom_logo_tm||$custom_logo_bm){?> style="<?php if($custom_logo_tm){?>margin-top:<?php echo esc_attr($custom_logo_tm); ?>px;<?php }?><?php if($custom_logo_bm){?>margin-bottom:<?php echo esc_attr($custom_logo_bm); ?>px;<?php }?>"<?php }?>><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url($custom_logo)?>"/></a>
	</div>
	<?php }else{?>
	<div id="logo">
	    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
	</div>
	<?php }?>