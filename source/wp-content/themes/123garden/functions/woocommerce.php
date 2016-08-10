<?php

/* Loop-------------------------------------------------------------
-------------------------------------------------------------------*/
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/* Product Post ----------------------------------------------------
-------------------------------------------------------------------*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/* Product Categories ----------------------------------------------
-------------------------------------------------------------------*/
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'lpd_subcategory_thumbnail', 10 );

/* Shop Content ----------------------------------------------------
-------------------------------------------------------------------*/
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'lpd_shop_content', 'lpd_product_archive_description', 10 );


/* Cart Page -------------------------------------------------------
-------------------------------------------------------------------*/
// updated 1.1.3
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

/*------------------------------------------------------------------
-------------------------------------------------------------------*/
//Updated v1.1.2
if ( ! function_exists( 'lpd_product_archive_description' ) ) {

	function lpd_product_archive_description() {
		
			$shop_page   = get_post( wc_get_page_id( 'shop' ) );
			if ( $shop_page ) {
				$description = apply_filters( 'the_content', $shop_page->post_content );
				if ( $description ) {
					echo '<div class="page-description">' . $description . '</div>';
				}
			}
	}
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'woocommerce_button_proceed_to_checkout' ) ) {

	function woocommerce_button_proceed_to_checkout() {
		$checkout_url = WC()->cart->get_checkout_url();
		
		//Updated v1.1.2
		
		?>
		<div class="total-cart-btn-wrap"><input type="submit" class="cart_totals-btn btn btn-default" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /><?php do_action( 'woocommerce_cart_actions' ); ?><?php wp_nonce_field( 'woocommerce-cart' ); ?>
		<input type="submit" class="cart_totals-btn checkout-button btn btn-primary btn-lg wc-forward" name="proceed" value="<?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>" /></div>
		<?php
	}
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'woocommerce_output_related_products' ) ) {
	function woocommerce_output_related_products() {
		$args = array(
			'posts_per_page' => 3,
			'columns' => 3,
			'orderby' => 'rand'
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	}
}
add_action( 'lpd_single_output_related', 'woocommerce_output_related_products', 20 );
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
		woocommerce_upsell_display( 3,3 );
	}
}
add_action( 'lpd_single_output_upsells', 'woocommerce_output_upsells', 15 ); // new function for up-sell
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'woocommerce_cross_sell_display' ) ) {

	function woocommerce_cross_sell_display( $posts_per_page = 3, $columns = 3, $orderby = 'rand' ) {
		wc_get_template( 'cart/cross-sells.php', array(
		
		'posts_per_page' => $posts_per_page,
		'orderby' => $orderby,
		'columns' => $columns
		
		) );
	}
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function ptc_lpd_themes() {
	return 3;
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'ptc_lpd_themes' ); 
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function new_loop_shop_per_page() {

	$loop_shop_per_page= ot_get_option('loop_shop_per_page');

	if (!$loop_shop_per_page){
	    $loop_shop_per_page = 12;
	}
	
	return $loop_shop_per_page;

}
add_filter('loop_shop_per_page', 'new_loop_shop_per_page');
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function woo_sts_lpd_themes( $size ) {	

	$product_thumbnails_type= ot_get_option('product_thumbnails_type');
	
	if($product_thumbnails_type=="none"){
		$size = 'shop_thumbnail';
		return $size;
	}else{
		if($product_thumbnails_type=="theme-size-4x3"){
			$size = 'theme-size-4x3';
			return $size;
		} elseif($product_thumbnails_type=="theme-size-3x2"){
			$size = 'theme-size-3x2';
			return $size;
		} elseif($product_thumbnails_type=="theme-size-16x9"){
			$size = 'theme-size-16x9';
			return $size;	
		} elseif($product_thumbnails_type=="theme-size-1x1"){
			$size = 'theme-size-1x1';
			return $size;	
		} elseif($product_thumbnails_type=="theme-size-3x4"){
			$size = 'theme-size-3x4';
			return $size;	
		}else{
			$size = 'theme-size-2x3';
			return $size;
		}
	}
}
add_filter ( 'single_product_small_thumbnail_size', 'woo_sts_lpd_themes', 25, 1 );
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post,$product;
		
		$shop_thumb_type = ot_get_option('shop_thumb_type');
		$shop_thumb_custom = ot_get_option('shop_thumb_custom');
		$catalog_type = ot_get_option('catalog_type');
		
		if(!$shop_thumb_custom){
		$shop_thumb_custom = 'thumbnail';
		}

		$output = '';
		
		if ( has_post_thumbnail() ){
		
			if($shop_thumb_type=="none"){
			
				$thumbnail = get_the_post_thumbnail( $post->ID, $size );
			
			} elseif($shop_thumb_type=="custom-size"){
				
				$img = lpd_getImageBySize( array( 'attach_id' => get_post_thumbnail_id($post->ID), 'thumb_size' => $shop_thumb_custom, 'class' => "" ) );
				$thumbnail = $img['thumbnail'];
			
			}else{
			
				$thumbnail = get_the_post_thumbnail( $post->ID, $shop_thumb_type );
			
			}
			
			$output .= '<a class="img-transaction" href="'.get_permalink().'">';
				$output .= '<div class="featured-img">';
					$output .= $thumbnail;
				$output .= '</div>';
				$output .= '<div class="gallery-img">';
					$attachment_ids = $product->get_gallery_attachment_ids();
					if($attachment_ids){
						$loop = 0;
						foreach ( $attachment_ids as $attachment_id ) {
							$loop++;
							$image_link = wp_get_attachment_url( $attachment_id );
							if ( ! $image_link )continue;
							if ($loop==1)
							
							if($shop_thumb_type=="none"){
							
								$output .= wp_get_attachment_image( $attachment_id, $size );
							
							} elseif($shop_thumb_type=="custom-size"){
								
								$img = lpd_getImageBySize( array( 'attach_id' => $attachment_id, 'thumb_size' => $shop_thumb_custom, 'class' => "" ) );
								$output .= $img['thumbnail'];
							
							}else{
							
								$output .= wp_get_attachment_image( $attachment_id, $shop_thumb_type );
							
							}
							
						}
					} else{
						$output .= $thumbnail;
					}
				$output .= '</div>';
			$output .= '</a>';
			
		} elseif ( wc_placeholder_img_src() ){
		
			$thumbnail = '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="580" height="580" />';
			
			$output .= '<a href="'.get_permalink().'">';
				$output .= '<div class="featured-img">';
					#$output .= wc_placeholder_img( $size );
					$output .= $thumbnail;
				$output .= '</div>';
			$output .= '</a>';
			
		}
				
		return $output;
	}
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function custom_woocommerce_placeholder_img_src( $src ) {
    $upload_dir = wp_upload_dir();
    $uploads = THEME_ASSETS;
    $src = $uploads . 'img/no-product-image.png';
    return $src;
}
add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
 function lpd_add_to_cart_fragments( $fragments ) {
	global $woocommerce;
	ob_start();?>
		
			<div class="lpd-shopping-cart-wrap">
				<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="cart-total visible-xs visible-sm">
					<strong><?php esc_html_e('Shopping Bag', GETTEXT_DOMAIN); ?></strong>
					<?php echo esc_html(WC()->cart->get_cart_contents_count()); ?> <?php esc_html_e('item(s)', GETTEXT_DOMAIN); ?> - <?php echo WC()->cart->get_cart_subtotal(); ?>
				</a>
				<a href="#" class="cart-button hidden-xs hidden-sm">
					<span class="cart-button-total"><?php esc_html_e('Cart', GETTEXT_DOMAIN); ?> - <?php echo WC()->cart->get_cart_subtotal(); ?></span>
					<span class="cart-icon">
						<span class="icon"></span>
						<span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</span>
				</a>
				<div class="cart-dropdown hidden-xs hidden-sm">
					
					<div class="lpd-shopping-cart-list clearfix">
					
						<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
					
							<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					
									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					
										$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
										$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
										$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					
										?>
										<div class="lpd-cart-list-item clearfix">
											<a class="lpd-cart-list-thumbnail" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
												<?php echo $thumbnail; ?>
											</a>
											<div class="lpd-cart-list-content">
												<div class="lpd-cart-list-title">
													<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo $product_name; ?></a>
												</div>
												<?php echo WC()->cart->get_item_data( $cart_item ); ?>
												<div class="lpd-cart-list-meta">
													<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="item-remove" title="%s">%s</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', GETTEXT_DOMAIN), esc_html__('Remove', GETTEXT_DOMAIN) ), $cart_item_key );?>
													<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
												</div>
											</div>
										</div>
										<?php
									}
								}
							?>
					
						<?php else : ?>
					
							<p class="empty"><?php esc_html_e( 'No products in the cart.', GETTEXT_DOMAIN ); ?></p>
					
						<?php endif; ?>
					
					</div>
		
					<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
					
						<p class="lpd-cart-total clearfix"><strong><?php esc_html_e( 'Subtotal', GETTEXT_DOMAIN ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
					
						<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
					
						<p class="lpd-cart-buttons">
							<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn btn-default btn-sm view-cart-btn"><?php esc_html_e( 'View Cart', GETTEXT_DOMAIN ); ?></a>
							<a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-warning checkout-btn"><?php esc_html_e( 'Checkout', GETTEXT_DOMAIN ); ?></a>
						</p>
					
					<?php endif; ?>
					
				</div>
			</div>
		
	<?php $fragments['.lpd-shopping-cart-wrap'] = ob_get_clean();
	return $fragments;
}
add_filter('add_to_cart_fragments', 'lpd_add_to_cart_fragments');
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
 function lpd_add_to_cart_panel_fragments( $fragments ) {
	global $woocommerce;
	ob_start();?>
		
	<div class="shopping_cart_panel_wrap">
	
		<span class="shopping_cart_title"><?php esc_html_e( 'Shopping Cart', GETTEXT_DOMAIN ); ?></span>
		
		<div class="lpd-shopping-cart-list clearfix">
		
			<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
		
				<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		
							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
		
							?>
							<div class="lpd-cart-list-item clearfix">
								<a class="lpd-cart-list-thumbnail" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
									<?php echo $thumbnail; ?>
								</a>
								<div class="lpd-cart-list-content">
									<div class="lpd-cart-list-title">
										<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $product_name; ?></a>
									</div>
									<?php echo WC()->cart->get_item_data( $cart_item ); ?>
									<div class="lpd-cart-list-meta">
										<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="item-remove" title="%s">%s</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', GETTEXT_DOMAIN), esc_html__('Remove', GETTEXT_DOMAIN) ), $cart_item_key );?>
										<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									</div>
								</div>
							</div>
							<?php
						}
					}
				?>
		
			<?php else : ?>
		
				<p class="empty"><?php esc_html_e( 'No products in the cart.', GETTEXT_DOMAIN ); ?></p>
		
			<?php endif; ?>
		
		</div>
		
		<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
		
			<p class="lpd-cart-total clearfix"><strong><?php esc_html_e( 'Subtotal', GETTEXT_DOMAIN ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
		
			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
		
			<p class="lpd-cart-buttons">
				<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn btn-primary btn-sm view-cart-btn"><?php esc_html_e( 'View Cart', GETTEXT_DOMAIN ); ?></a>
				<a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-warning checkout-btn"><?php esc_html_e( 'Checkout', GETTEXT_DOMAIN ); ?></a>
			</p>
		
		<?php endif; ?>
	
	</div>


		
	<?php $fragments['.shopping_cart_panel_wrap'] = ob_get_clean();
	return $fragments;
}
add_filter('add_to_cart_fragments', 'lpd_add_to_cart_panel_fragments');
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function product_post_button_class() {
	$class = ' btn btn-warning btn-medium';	
	return $class;
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function product_post_select_class() {
	$class = 'class="form-control"';	
	return $class;
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
function loop_select_class() {
	$class = ' form-control"';	
	return $class;
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/
if ( ! function_exists( 'lpd_subcategory_thumbnail' ) ) {

	function lpd_subcategory_thumbnail( $category ) {
		$small_thumbnail_size  	= 'theme-size-1x1';
		$dimensions    			= wc_get_image_size( $small_thumbnail_size );
		$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
			$image = $image[0];
		} else {
			$image = wc_placeholder_img_src();
		}

		if ( $image ) {
			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: http://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
		}
	}
}
/*------------------------------------------------------------------
-------------------------------------------------------------------*/

if ( ! function_exists( 'lpd_shop_custom_css' ) ) {

	function lpd_shop_custom_css() {
	
	$shop_custom_css = ot_get_option('shop_custom_css');
	$shop_custom_css_enable = ot_get_option('shop_custom_css_enable');
	
		if (is_plugin_active('woocommerce/woocommerce.php')) {
		
			if ($shop_custom_css_enable!="") {
				if (is_shop()||is_tax('product_cat')||is_tax('product_tag')) {
					
					?>
					
					<style>
					/*------------------------------------------------------------------
					Custom Shop Styles
					-------------------------------------------------------------------*/
						<?php echo $shop_custom_css;?>
					</style>
			
					
					<?php
					
				}
			}
		
		}
	
	}
	
}
add_action( 'wp_footer', 'lpd_shop_custom_css' );
?>