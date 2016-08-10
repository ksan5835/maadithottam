<?php $catalog_type = ot_get_option('catalog_type');	
$s_cart = ot_get_option('s_cart');
$h_sm_locations = ot_get_option('h_sm_locations');
$message_box_location = ot_get_option('message_box_location');
$s_cart_style = ot_get_option('s_cart_style');
?>

<?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>

<?php if($s_cart!='disable'){ ?>
	<?php if(!$catalog_type){?>
		<div class="lpd-shopping-cart<?php if ($s_cart=='sl_panel_right'||$s_cart=='sl_panel_left') { ?> lpd-shopping-cart-scotchpanel<?php } ?><?php if ($s_cart_style) { echo ' lpd-shopping-cart-'.esc_attr($s_cart_style); } ?>">
	
			<div class="lpd-shopping-cart-wrap">
				<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="cart-total visible-xs visible-sm">
					<strong><?php esc_html_e('Shopping Bag', GETTEXT_DOMAIN); ?></strong>
					<?php echo esc_html(WC()->cart->get_cart_contents_count()); ?> <?php esc_html_e('item(s)', GETTEXT_DOMAIN); ?> - <?php echo WC()->cart->get_cart_subtotal(); ?>
				</a>
				<a href="#" class="cart-button hidden-xs hidden-sm">
					<span class="cart-button-total"><?php esc_html_e('Cart', GETTEXT_DOMAIN); ?> - <?php echo WC()->cart->get_cart_subtotal(); ?></span>
					<span class="cart-icon">
						<span class="icon"></span>
						<span class="count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
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
					
		</div>
	<?php }?>
<?php }else{?>
	<?php if($h_sm_locations != "right_h"&&$message_box_location!="right"){ ?>
		&nbsp;
	<?php }?>
<?php }?>


<?php }?>