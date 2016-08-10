<?php function lpd_shop_styles_styles() {?>

<?php $sale_flash_color= ot_get_option('sale_flash_color');?>

<?php if($sale_flash_color){?><style>.lpd-onsale-2,.lpd-onsale{background:<?php echo esc_attr($sale_flash_color); ?>;}</style><?php }?>

<?php }?>
<?php add_action( 'wp_head', 'lpd_shop_styles_styles' );?>