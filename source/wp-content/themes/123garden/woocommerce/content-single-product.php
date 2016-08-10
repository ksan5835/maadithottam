<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<?php /* Disabled */ $product_options_logo = get_post_meta($post->ID, 'product_options_logo', true);?>

<?php
	$classes = array();
	
	if ( is_active_sidebar(5)||$product_options_logo){
		$classes[] = 'col-md-9 lpd-sidebar-page';
	}
	$classes[] = 'clearfix';
?>
<?php 
$catalog_type = ot_get_option('catalog_type');

$product_page_a_type = ot_get_option('product_page_a_type');
$product_page_a_speed = ot_get_option('product_page_a_speed');
$product_page_a_delay = ot_get_option('product_page_a_delay');
$product_page_a_offset = ot_get_option('product_page_a_offset');
$product_page_a_easing = ot_get_option('product_page_a_easing');

if(!$product_page_a_speed){
	$product_page_a_speed = '1000';
}
if(!$product_page_a_delay){
	$product_page_a_delay = '0';
}

if(!$product_page_a_offset){
	$product_page_a_offset = '80';
}

$product_page_animation_att = ' data-animation="'.esc_attr($product_page_a_type).'" data-speed="'.esc_attr($product_page_a_speed).'" data-delay="'.esc_attr($product_page_a_delay).'" data-offset="'.esc_attr($product_page_a_offset).'" data-easing="'.esc_attr($product_page_a_easing).'"';

$product_image_a_type = ot_get_option('product_image_a_type');
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

$product_image_animation_att = ' data-animation="'.esc_attr($product_image_a_type).'" data-speed="'.esc_attr($product_image_a_speed).'" data-delay="'.esc_attr($product_image_a_delay).'" data-offset="'.esc_attr($product_image_a_offset).'" data-easing="'.esc_attr($product_image_a_easing).'"';

?>

<?php if ( is_active_sidebar(5)||$product_options_logo){?>
    <div class="row">
<?php } ?>

	<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	
		<div class="row">
	
	
			<div class="col-md-6 product-image<?php if($product_image_a_type){?> cre-animate<?php }?>"<?php if($product_image_a_type){ echo $product_image_animation_att;}?>>
				
				<?php echo woocommerce_show_product_sale_flash(); ?>
		
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
				
			</div>		
			
		
			<div class="col-md-6 product-content<?php if($catalog_type=="purchases_prices"){?> catalog-mode-purchases-prices<?php } ?><?php if($product_page_a_type){?> cre-animate<?php }?>"<?php if($product_page_a_type){ echo $product_page_animation_att;}?>>
		
				<?php do_action( 'woocommerce_single_product_summary' ); ?>
		
			</div><!-- .summary -->
		
		</div>
	
		<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
	
		<meta itemprop="url" content="<?php the_permalink(); ?>" />
	
	</div><!-- #product-<?php the_ID(); ?> -->


<?php if ( is_active_sidebar(5)||$product_options_logo){?>
	
    <div class="col-md-3">
	    <div class="sidebar">
	    <?php if ($product_options_logo){?>
		    <div class="widget">
		    	<h4 class="title"><span class="align"><?php esc_html_e('Product Brand', GETTEXT_DOMAIN) ?></span></h4>
			    <?php echo wp_get_attachment_image($product_options_logo, 'brand-logo'); ?>
		    </div>
	    <?php } ?>
	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Product Post Sidebar') ) ?>
	    </div>
    </div>
    
</div>
<?php } ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>