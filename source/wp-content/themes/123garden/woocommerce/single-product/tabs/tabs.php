<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<?php $product_bottom_a_type = ot_get_option('product_bottom_a_type');
$product_bottom_a_speed = ot_get_option('product_bottom_a_speed');
$product_bottom_a_delay = ot_get_option('product_bottom_a_delay');
$product_bottom_a_offset = ot_get_option('product_bottom_a_offset');
$product_bottom_a_easing = ot_get_option('product_bottom_a_easing');

if(!$product_bottom_a_speed){
	$product_bottom_a_speed = '1000';
}
if(!$product_bottom_a_delay){
	$product_bottom_a_delay = '0';
}

if(!$product_bottom_a_offset){
	$product_bottom_a_offset = '80';
}

$animation_att = ' data-animation="'.esc_attr($product_bottom_a_type).'" data-speed="'.esc_attr($product_bottom_a_speed).'" data-delay="'.esc_attr($product_bottom_a_delay).'" data-offset="'.esc_attr($product_bottom_a_offset).'" data-easing="'.esc_attr($product_bottom_a_easing).'"';

?>

	<div class="woocommerce-tabs wc-tabs-wrapper<?php if($product_bottom_a_type){?> cre-animate<?php }?>"<?php if($product_bottom_a_type){ echo $animation_att;}?>>
		<ul class="tabs wc-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
