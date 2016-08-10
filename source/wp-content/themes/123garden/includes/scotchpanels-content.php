<?php 
$s_cart = ot_get_option('s_cart');	

if ($s_cart=='sl_panel_right'||$s_cart=='sl_panel_left') {
	
if (is_plugin_active('woocommerce/woocommerce.php')) {
	
?>

<div id="shopping_cart_panel">

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
										<a href="<?php echo esc_html(get_permalink( $cart_item['product_id'] )); ?>"><?php echo $product_name; ?></a>
									</div>
									<?php echo WC()->cart->get_item_data( $cart_item ); ?>
									<div class="lpd-cart-list-meta">
										<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="item-remove" title="%s">%s</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', GETTEXT_DOMAIN), __('Remove', GETTEXT_DOMAIN) ), $cart_item_key );?>
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
				<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="btn btn-primary btn-sm view-cart-btn"><?php esc_html_e( 'View Cart', GETTEXT_DOMAIN ); ?></a>
				<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="btn btn-warning checkout-btn"><?php esc_html_e( 'Checkout', GETTEXT_DOMAIN ); ?></a>
			</p>
		
		<?php endif; ?>
	
	</div>
	
</div>
<?php } }?>

<?php
$hc_delivery = ot_get_option('hc_delivery');
$hc_delivery_bg_sp = ot_get_option('hc_delivery_bg_sp');

if ($hc_delivery=='sp_top') {?>

	<?php if ( is_active_sidebar(10) ){ ?>
		<div id="delivery_panel" class="hc-scotch-panel">
			<div class="delivery_panel_wrap"<?php if($hc_delivery_bg_sp){ ?> style="background-color:<?php echo esc_attr($hc_delivery_bg_sp); ?>;"<?php } ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Delivery" Header Content') ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>

<?php }?>

<?php
$hc_contact = ot_get_option('hc_contact');
$hc_contact_bg_sp = ot_get_option('hc_contact_bg_sp');

if ($hc_contact=='sp_top') {?>

	<?php if ( is_active_sidebar(11) ){ ?>
		<div id="contact_panel" class="hc-scotch-panel">
			<div class="contact_panel_wrap"<?php if($hc_contact_bg_sp){ ?> style="background-color:<?php echo esc_attr($hc_contact_bg_sp); ?>;"<?php } ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Contact Us" Header Content') ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>

<?php }?>

<?php
$hc_custom1 = ot_get_option('hc_custom1');
$hc_custom1_bg_sp = ot_get_option('hc_custom1_bg_sp');

if ($hc_custom1=='sp_top') {?>

	<?php if ( is_active_sidebar(12) ){ ?>
		<div id="custom1_panel" class="hc-scotch-panel">
			<div class="custom1_panel_wrap"<?php if($hc_custom1_bg_sp){ ?> style="background-color:<?php echo esc_attr($hc_custom1_bg_sp); ?>;"<?php } ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Custom 1" Header Content') ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>

<?php }?>

<?php
$hc_custom2 = ot_get_option('hc_custom2');
$hc_custom2_bg_sp = ot_get_option('hc_custom2_bg_sp');

if ($hc_custom2=='sp_top') {?>

	<?php if ( is_active_sidebar(13) ){ ?>
		<div id="custom2_panel" class="hc-scotch-panel">
			<div class="custom2_panel_wrap"<?php if($hc_custom2_bg_sp){ ?> style="background-color:<?php echo esc_attr($hc_custom2_bg_sp); ?>;"<?php } ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('"Custom 2" Header Content') ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>

<?php }?>