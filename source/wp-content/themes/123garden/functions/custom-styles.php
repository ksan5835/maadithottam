<?php function lpd_custom_styles() {?>

<?php
$hc_custom1 = ot_get_option('hc_custom1');
$hc_custom1_title = ot_get_option('hc_custom1_title');
$hc_custom_1_icon = ot_get_option('hc_custom_1_icon');
$hc_custom_1_color = ot_get_option('hc_custom_1_color');
$hc_custom_1_color_hover = ot_get_option('hc_custom_1_color_hover');
$hc_custom2 = ot_get_option('hc_custom2');
$hc_custom2_title = ot_get_option('hc_custom2_title');
$hc_custom_2_icon = ot_get_option('hc_custom_2_icon');
$hc_custom_2_color = ot_get_option('hc_custom_2_color');
$hc_custom_2_color_hover = ot_get_option('hc_custom_2_color_hover');
$s_cart_tm = ot_get_option('s_cart_tm');
$hm_bottom_border = ot_get_option('hm_bottom_border');
$hc_custom2_font_style = ot_get_option('hc_custom2_font_style');
$hc_custom1_font_style = ot_get_option('hc_custom1_font_style');
$hc_contact_font_style = ot_get_option('hc_contact_font_style');
$hc_delivery_font_style = ot_get_option('hc_delivery_font_style');
?>

<?php
if($hm_bottom_border=="type1"){
	$hm_bottom_border_style = 'solid';
	$hm_bottom_border_width = '1px';
}
if($hm_bottom_border=="type2"){
	$hm_bottom_border_style = 'solid';
	$hm_bottom_border_width = '2px';
}
if($hm_bottom_border=="type3"){
	$hm_bottom_border_style = 'solid';
	$hm_bottom_border_width = '3px';
}
if($hm_bottom_border=="type4"){
	$hm_bottom_border_style = 'dashed';
	$hm_bottom_border_width = '1px';
}
if($hm_bottom_border=="type5"){
	$hm_bottom_border_style = 'dashed';
	$hm_bottom_border_width = '2px';
}
if($hm_bottom_border=="type6"){
	$hm_bottom_border_style = 'dashed';
	$hm_bottom_border_width = '3px';
}
?>

<?php if($hc_custom1||$hc_custom1_title||$hc_custom2||$hc_custom2_title||$s_cart_tm||$hm_bottom_border){?>
<style>
<?php if($hc_delivery_font_style){?>
.hc-delivery a{
	font-style: <?php echo $hc_delivery_font_style?>;
}
<?php }?>
<?php if($hc_contact_font_style){?>
.hc-contact a{
	font-style: <?php echo $hc_contact_font_style?>;
}
<?php }?>
<?php if($hm_bottom_border){?>
.header-meta-bottom-border{
	border-bottom-style: <?php echo $hm_bottom_border_style;?>;
	border-bottom-width: <?php echo $hm_bottom_border_width;?>;
}
.header-top{
	padding-bottom: <?php echo $hm_bottom_border_width;?>;
}
<?php }?>
<?php if($s_cart_tm){?>
.lpd-shopping-cart{margin-top:<?php echo $s_cart_tm;?>px !important;}
<?php }?>
<?php if($hc_custom1&&$hc_custom1_title){?>

	<?php if($hc_custom_1_icon||$hc_custom_1_color||$hc_custom1_font_style){?>
	.hc-custom-1.hc-item a{
	<?php if($hc_custom_1_icon){?>background-image: url(<?php echo $hc_custom_1_icon?>);background-position:15px 7px;padding-left:48px;<?php }?>
	<?php if($hc_custom_1_color){?>background-color: <?php echo $hc_custom_1_color?>;<?php }?>
	<?php if($hc_custom1_font_style){?>font-style: <?php echo $hc_custom1_font_style?>;<?php }?>
	}<?php }?>
	<?php if($hc_custom_1_color_hover){?>
	.hc-custom-1.hc-item a:hover{
	<?php if($hc_custom_1_color_hover){?>background-color: <?php echo $hc_custom_1_color_hover?>;<?php }?>
	}
	<?php }?>
	<?php if($hc_custom_1_color_hover){?>
	.hc-custom-1-content-wrap{
		border-color: <?php echo $hc_custom_1_color_hover?> !important;
	}
	<?php }?>

<?php }?>

<?php if($hc_custom2&&$hc_custom2_title){?>

	<?php if($hc_custom_2_icon||$hc_custom_2_color||$hc_custom2_font_style){?>
	.hc-custom-2.hc-item a{
	<?php if($hc_custom_2_icon){?>background-image: url(<?php echo $hc_custom_2_icon?>);background-position:15px 7px;padding-left:48px;<?php }?>
	<?php if($hc_custom_2_color){?>background-color: <?php echo $hc_custom_2_color?>;<?php }?>
	<?php if($hc_custom2_font_style){?>font-style: <?php echo $hc_custom2_font_style?>;<?php }?>
	}<?php }?>
	<?php if($hc_custom_2_color_hover){?>
	.hc-custom-2.hc-item a:hover{
	<?php if($hc_custom_2_color_hover){?>background-color: <?php echo $hc_custom_2_color_hover?>;<?php }?>
	}
	<?php }?>
	<?php if($hc_custom_2_color_hover){?>
	.hc-custom-2-content-wrap{
		border-color: <?php echo $hc_custom_2_color_hover?> !important;
	}
	<?php }?>

<?php }?>

</style>
<?php }?>



<?php }?>
<?php add_action( 'wp_head', 'lpd_custom_styles' );?>