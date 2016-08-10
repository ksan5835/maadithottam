<?php
/**
 * Images template
 *
 * This template displays both the main images, and the thumbnails
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product, $jck_wt;

$default_variation_id = $this->get_default_variation_id();
$initial_product_id = ($default_variation_id) ? $default_variation_id : $product->id;
$initial_product_id = $this->get_selected_varaiton( $initial_product_id );

$images = $this->get_all_image_sizes( $initial_product_id );
$default_images = $this->get_all_image_sizes( $product->id );

/**
 * Setup classes for all images wrap
 */

$classes = array(
    'jck-wt-all-images-wrap',
    sprintf('jck-wt-all-images-wrap--thumbnails-%s', $jck_wt['thumbnailLayout'])
);

if($default_variation_id == "" || $default_variation_id == $product->id) {
    $classes[] = 'jck-wt-reset';
}

if( $jck_wt['hoverIcons'] ) {
    $classes[] = 'jck-wt-hover-icons';
}

if( $jck_wt['iconTooltips'] ) {
    $classes[] = 'jck-wt-tooltips-enabled';
}
?>

<?php do_action( 'jck_wt_before_all_images_wrap' ); ?>

<div class="<?php echo implode(' ', $classes); ?>" data-showing="<?php echo $initial_product_id; ?>" data-parentid="<?php echo $product->id; ?>" data-default="<?php echo esc_attr( json_encode( $default_images ) ); ?>" data-slide-count="<?php echo count($images); ?>">

	<?php if( $jck_wt['enableNavigation'] && $jck_wt['navigationType'] !== "bullets" && ( $jck_wt['thumbnailLayout'] === "above" || $jck_wt['thumbnailLayout'] === "left" ) ) { include('loop-thumbnails.php'); } ?>

	<?php include('loop-images.php'); ?>

	<?php if( $jck_wt['enableNavigation'] && $jck_wt['navigationType'] !== "bullets" && ( $jck_wt['thumbnailLayout'] === "below" || $jck_wt['thumbnailLayout'] === "right" ) ) { include('loop-thumbnails.php'); } ?>

</div>

<?php do_action( 'jck_wt_after_all_images_wrap' ); ?>