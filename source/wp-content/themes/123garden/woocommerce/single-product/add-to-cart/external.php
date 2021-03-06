<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$catalog_type = ot_get_option('catalog_type');

?>

<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<?php if(!$catalog_type){?>

<p class="cart">
	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button<?php echo product_post_button_class();?>"><?php echo esc_html( $button_text ); ?></a>
</p>

<?php }?>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
