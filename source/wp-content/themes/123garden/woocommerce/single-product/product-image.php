<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<?php $product_image_a_type = ot_get_option('product_image_a_type');
$product_image_a_speed = ot_get_option('product_image_a_speed');
$product_image_a_delay = ot_get_option('product_image_a_delay');
$product_image_a_offset = ot_get_option('product_image_a_offset');
$product_image_a_easing = ot_get_option('product_image_a_easing');

if(!$product_image_a_speed){
	$product_image_a_speed = '1000';
}
if(!$product_image_a_delay){
	$product_image_a_delay = '0';
}

if(!$product_image_a_offset){
	$product_image_a_offset = '80';
}

$animation_att = ' data-animation="'.esc_attr($product_image_a_type).'" data-speed="'.esc_attr($product_image_a_speed).'" data-delay="'.esc_attr($product_image_a_delay).'" data-offset="'.($product_image_a_offset).'" data-easing="'.($product_image_a_easing).'"';

$product_image_type = ot_get_option('product_image_type');
$product_image_custom = ot_get_option('product_image_custom');

if(!$product_image_custom){
	$product_image_custom = 'thumbnail';
}

?>


	<div class="images<?php if($product_image_a_type){?> cre-animate<?php }?>"<?php if($product_image_a_type){ echo $animation_att;}?>>
	
		<?php
			if ( has_post_thumbnail() ) {
	
				$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
					
				if($product_image_type=="none"){
				
					$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array( 'title' => $image_title ) );
				
				} elseif($product_image_type=="custom-size"){
					
					$img = lpd_getImageBySize( array( 'attach_id' => get_post_thumbnail_id($post->ID), 'thumb_size' => $product_image_custom, 'class' => "" ) );
					$image = $img['thumbnail'];
				
				}else{
				
					$image = get_the_post_thumbnail( $post->ID, $product_image_type, array( 'title' => $image_title )  );
				
				}
					
				$attachment_count   = count( $product->get_gallery_attachment_ids() );
	
				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}
	
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );
	
			} else {
	
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );
	
			}
		?>
	
		<?php do_action( 'woocommerce_product_thumbnails' ); ?>
	
	</div>
	
