<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
 
$shop_columns = ot_get_option('shop_columns');
$s_rating = ot_get_option('s_rating');
$catalog_type = ot_get_option('catalog_type');

$shop_thumb_a_type = ot_get_option('shop_thumb_a_type');
$shop_thumb_a_speed = ot_get_option('shop_thumb_a_speed');
$shop_thumb_a_delay = ot_get_option('shop_thumb_a_delay');
$shop_thumb_a_offset = ot_get_option('shop_thumb_a_offset');
$shop_thumb_a_easing = ot_get_option('shop_thumb_a_easing');

if(!$shop_thumb_a_speed){
	$shop_thumb_a_speed = '1000';
}
if(!$shop_thumb_a_delay){
	$shop_thumb_a_delay = '0';
}

if(!$shop_thumb_a_offset){
	$shop_thumb_a_offset = '80';
}

$animation_att = ' data-animation="'.esc_attr($shop_thumb_a_type).'" data-speed="'.esc_attr($shop_thumb_a_speed).'" data-delay="'.esc_attr($shop_thumb_a_delay).'" data-offset="'.esc_attr($shop_thumb_a_offset).'" data-easing="'.esc_attr($shop_thumb_a_easing).'"';

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )

	if(!$shop_columns)
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	else
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $shop_columns );

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
//$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ($woocommerce_loop['columns'] == "2"){
	$classes[] = 'col-md-6';
} elseif ($woocommerce_loop['columns'] == "3"){
	$classes[] = 'col-md-4';	
} elseif ($woocommerce_loop['columns'] == "4"){
	$classes[] = 'col-md-3';	
} else{
	$classes[] = 'col-md-3';	
}

//if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	//$classes[] = 'first';
//if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	//$classes[] = 'last';
	
if($shop_thumb_a_type){
	$classes[] = 'cre-animate';
}
?>
<li <?php post_class( $classes ); ?><?php if($shop_thumb_a_type){ echo $animation_att;}?>>

<div class="li-wrap">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<?php woocommerce_show_product_loop_sale_flash(); ?>
	
	<?php if ( ! $product->is_in_stock() ) : ?>
		<span class="lpd-out-of-s<?php if ($product->is_on_sale()) { ?> on-sale-products<?php }?>"><?php esc_html_e( 'Out of Stock', GETTEXT_DOMAIN ); ?></span>
	<?php endif; ?>

	<div class="lpd-product-thumbnail">

	<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
	
	</div>
	<div class="lpd-product-meta">
		<h3><?php the_title(); ?></h3>
		<span class="lpd-product-sku"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'n/a', 'woocommerce' ); ?></span>.</span>
	</div>
	<div class="lpd-product-data">
		<table class="lpd-product-data-table">
			<tbody>
				<tr<?php if($catalog_type=="purchases_prices"){?> class="lpd-product-data-disabled-purchases-prices"<?php }?>>
					<td class="td-price">
					<?php
						if($catalog_type!="purchases_prices"){
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
						}
					?>
					<?php
						if(!$s_rating){
							woocommerce_template_loop_rating();
						}
					?>
					<?php 
						if($catalog_type=="purchases_prices"){
							woocommerce_template_loop_add_to_cart();
						}
					?>
					</td>
					<td class="td-add">
						<?php $terms = get_the_terms( $post->ID, 'product_cat' );
						if($terms){
							foreach ($terms as $term) {
							    $product_cat_id = $term->term_id;
							    $product_cat_link = get_term_link($term);
							    $product_cat_name = $term->name;
							    break;
							}?>
							<?php 
								$product_cat_term_meta = get_option( "product_cat_$product_cat_id" );
								$product_cat_icon = wp_get_attachment_image_src( $product_cat_term_meta['custom_term_meta6'], 'full' );
							?>
							<?php if($product_cat_icon){?>
								<a title="<?php echo esc_attr($product_cat_name);?>" href="<?php echo esc_url($product_cat_link);?>" class="lpd-product-item-category"><img src="<?php echo esc_url($product_cat_icon[0])?>"></a><div class="clearfix"></div>
							<?php }?>
						<?php }?>
						<?php 
						if($catalog_type!="purchases_prices"){
							woocommerce_template_loop_add_to_cart();		
						}?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
</div>

</li>