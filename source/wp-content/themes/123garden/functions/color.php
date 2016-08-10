<?php function lpd_color_styles() {?>

<?php
$theme_color_1 = ot_get_option('theme_color');
$theme_color_2 = ot_get_option('theme_color_2');
$theme_color_3 = ot_get_option('theme_color_3');
$theme_color_4 = ot_get_option('theme_color_4');
$hm_custom_bg = ot_get_option('hm_custom_bg');

if($theme_color_1==""){
	$theme_color_1 = "#66ab36";
}

if($theme_color_2==""){
	$theme_color_2 = "#96ca42";
}

if($theme_color_3==""){
	$theme_color_3 = "#f0bc00";
}

if($theme_color_4==""){
	$theme_color_4 = "#f8c400";
}
if($hm_custom_bg==""){
	$hm_custom_bg = "#f0bc00";
}
?>

<?php if($theme_color_1||$theme_color_2||$theme_color_3||$theme_color_4){?>
<style>
/*------------------------------------------------------------------
1. #66ab36
-------------------------------------------------------------------*/
a {
  color: <?php echo $theme_color_1;?>;
}
#title-breadcrumb-breadcrumb{
  background-color: <?php echo $theme_color_1;?>;
}
.widget.widget_rss ul li a:hover,
.widget.widget_pages ul li a:hover,
.widget.widget_nav_menu ul li a:hover,
.widget.widget_login ul li a:hover,
.widget.widget_meta ul li a:hover,
.widget.widget_categories ul li a:hover,
.widget.widget_archive ul li a:hover,
.widget.widget_recent_comments ul li a:hover,
.widget.widget_recent_entries ul li a:hover{
  color: <?php echo $theme_color_1;?>;
}
.title-wrap:before{
  background-color: <?php echo $theme_color_1;?>;
}
.ribbon .ribbon-content:before{
   border-top-color: <?php echo $theme_color_1;?>;
}
.tagcloud a:hover,
.tags a:hover{
	background-color: <?php echo $theme_color_1;?>;
	border-color: <?php echo $theme_color_1;?>;	
}
.footer-meta{
	background-color: <?php echo $theme_color_1;?>;
}
.cart-icon .count{
	border-color: <?php echo $theme_color_1;?>;	
}
.hc-item.hc-delivery > a{
	background-color: <?php echo $theme_color_1;?>;
}
.btn-primary {
  background-color: <?php echo $theme_color_1;?>;
}
.lpd-product-item-category{
  background-color: <?php echo $theme_color_1;?>;
}
.wordpress-123garden .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
.wordpress-123garden .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.wordpress-123garden.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a,
.wordpress-123garden.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a{
	border-color: <?php echo $theme_color_1;?>;
}
.menu3dmega > ul > li > a:hover{
	background-color: <?php echo $theme_color_1;?>;
}
.menu3dmega > ul > li.open > a,
.menu3dmega > ul > li.current-menu-item > a,
.menu3dmega > ul > li.current_page_item > a,
.menu3dmega > ul > li.current-page-ancestor > a,
.menu3dmega > ul > li.current-menu-parent > a,
.menu3dmega > ul > li.current_page_item > a,
.menu3dmega > ul > li.current_page_parent > a,
.menu3dmega > ul > li.current-menu-ancestor > a,
.menu3dmega > ul > li.current_page_ancestor > a{
    background-color: <?php echo $theme_color_1;?>;
}
.wordpress-123garden .woocommerce ul.cart_list li a:hover,
.wordpress-123garden .woocommerce ul.product_list_widget li a:hover,
.wordpress-123garden.woocommerce-page ul.cart_list li a:hover,
.wordpress-123garden.woocommerce-page ul.product_list_widget li a:hover{
    color: <?php echo $theme_color_1;?>;
}
.footer .woocommerce .widget_layered_nav ul li a:hover,
.woocommerce-page .footer .widget_layered_nav ul li a:hover,
.footer .woocommerce .widget_layered_nav ul li span:hover,
.woocommerce-page .footer .widget_layered_nav ul li span:hover{
	color: <?php echo $theme_color_1;?>;
}
.woocommerce .widget_layered_nav ul li.chosen a,
.woocommerce-page .widget_layered_nav ul li.chosen a{
    background-color: <?php echo $theme_color_1;?>;
}
.woocommerce .widget_layered_nav_filters ul li a,
.woocommerce-page .widget_layered_nav_filters ul li a{
    background-color: <?php echo $theme_color_1;?>;
}
.wordpress-123garden .footer .widget_product_categories ul li a:hover{
	color: <?php echo $theme_color_1;?>;
}
.lpd-product-data-table .added_to_cart:hover{
	color: <?php echo $theme_color_1;?>;
}
.wordpress-123garden .wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav .ui-tabs-active a,
.wordpress-123garden .wpb_tabs .wpb_tabs_nav li.ui-tabs-active a{
	border-color: <?php echo $theme_color_1;?>;
}
.lpd-module .sep-border{
    background-color: <?php echo $theme_color_1;?>;
}
.mi-slider nav.icons-nav span{
    background-color: <?php echo $theme_color_1;?>;
}
.lpd-post-widget:hover .title a{
	color: <?php echo $theme_color_1;?>;
}
.lpd-post-widget .widget-meta:before{
    background-color: <?php echo $theme_color_1;?>;
}
.dropcap{
    background-color: <?php echo $theme_color_1;?>;
}
.deco-sep-line-50,
.deco-sep-line-100,
.deco-sep-line-150,
.deco-sep-line-200{
    background-color: <?php echo $theme_color_1;?>;
}
.lpd-icon-banner.lib-border-right:before{
    background-color: <?php echo $theme_color_1;?>;
}
.cc-product-item .cc-price{
	background-color: <?php echo $theme_color_1;?>;
}
.wordpress-123garden .widget_product_categories ul li a:hover{
	color: <?php echo $theme_color_1;?>;
}
.lpd-product-category-wrap .sep-border{
	background-color: <?php echo $theme_color_1;?>;
}
.ic-title{
	background-color: <?php echo $theme_color_1;?>;
}
.ic-icon{
	border-color: <?php echo $theme_color_1;?>;
}
/*------------------------------------------------------------------
2. #96ca42
-------------------------------------------------------------------*/
a:hover,
a:focus {
  color: <?php echo $theme_color_2;?>;
}
.ribbon {
   background-color: <?php echo $theme_color_2;?>;
}
.cart-icon .count{
	background-color: <?php echo $theme_color_2;?>;
}
.hc-item.hc-delivery > a:hover{
	background-color: <?php echo $theme_color_2;?>;
}
.hc-delivery-content-wrap{
	border-color: <?php echo $theme_color_2;?> !important;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active{
  background-color: <?php echo $theme_color_2;?>;
}
.menu3dmega > ul > li.open > a:hover,
.menu3dmega > ul > li.current-menu-item > a:hover,
.menu3dmega > ul > li.current_page_item > a:hover,
.menu3dmega > ul > li.current-page-ancestor > a:hover,
.menu3dmega > ul > li.current-menu-parent > a:hover,
.menu3dmega > ul > li.current_page_item > a:hover,
.menu3dmega > ul > li.current_page_parent > a:hover,
.menu3dmega > ul > li.current-menu-ancestor > a:hover,
.menu3dmega > ul > li.current_page_ancestor > a:hover{
  background-color: <?php echo $theme_color_2;?>;
}
.lpd-module:hover .sep-border{
    background-color: <?php echo $theme_color_2;?>;
}
.mi-slider nav.icons-nav a:hover span{
    background-color: <?php echo $theme_color_2;?>;
}
.lpd-post-widget .widget-meta{
    background-color: <?php echo $theme_color_2;?>;
}
/*------------------------------------------------------------------
3. #f0bc00
-------------------------------------------------------------------*/
.header-top{
	background-color: <?php echo $theme_color_3;?>;
}
.btn-warning {
  background-color: <?php echo $theme_color_3;?>;
}
.comment-post div.avatar{
	border-color: <?php echo $theme_color_3;?>;
}
.footer.footer-dark-theme .widget.widget_rss ul li a:hover,
.footer.footer-dark-theme .widget.widget_pages ul li a:hover,
.footer.footer-dark-theme .widget.widget_nav_menu ul li a:hover,
.footer.footer-dark-theme .widget.widget_login ul li a:hover,
.footer.footer-dark-theme .widget.widget_meta ul li a:hover,
.footer.footer-dark-theme .widget.widget_categories ul li a:hover,
.footer.footer-dark-theme .widget.widget_archive ul li a:hover,
.footer.footer-dark-theme .widget.widget_recent_comments ul li a:hover,
.footer.footer-dark-theme .widget.widget_recent_entries ul li a:hover{
	color: <?php echo $theme_color_3;?>;
}
.footer.footer-dark-theme .tagcloud a:hover,
.footer.footer-dark-theme .tags a:hover{
	background-color: <?php echo $theme_color_3;?>;
	border-color: <?php echo $theme_color_3;?>;
}
.wordpress-123garden .woocommerce .star-rating,
.wordpress-123garden.woocommerce-page .star-rating{
	color: <?php echo $theme_color_3;?>;
}
.wordpress-123garden .woocommerce #reviews #comments ol.commentlist li img.avatar,
.wordpress-123garden.woocommerce-page #reviews #comments ol.commentlist li img.avatar{
	border-color: <?php echo $theme_color_3;?>;
}
.wordpress-123garden .footer.footer-dark-theme .woocommerce ul.cart_list li a:hover,
.wordpress-123garden .footer.footer-dark-theme .woocommerce ul.product_list_widget li a:hover,
.wordpress-123garden.woocommerce-page .footer.footer-dark-theme ul.cart_list li a:hover,
.wordpress-123garden.woocommerce-page .footer.footer-dark-theme ul.product_list_widget li a:hover{
	color: <?php echo $theme_color_3;?>;
}
.footer.footer-dark-theme .woocommerce .widget_layered_nav ul li a:hover,
.woocommerce-page .footer.footer-dark-theme .widget_layered_nav ul li a:hover,
.footer.footer-dark-theme .woocommerce .widget_layered_nav ul li span:hover,
.woocommerce-page .footer.footer-dark-theme .widget_layered_nav ul li span:hover{
	color: <?php echo $theme_color_3;?>;
}
.footer-dark-theme .woocommerce .widget_layered_nav ul li.chosen a,
.woocommerce-page .footer-dark-theme .widget_layered_nav ul li.chosen a{
    background-color: <?php echo $theme_color_3;?>;
}
.footer-dark-theme .woocommerce .widget_layered_nav_filters ul li a,
.woocommerce-page .footer-dark-theme .widget_layered_nav_filters ul li a{
    background-color: <?php echo $theme_color_3;?>;
}
.wordpress-123garden .footer.footer-dark-theme .widget_product_categories ul li a:hover{
	color: <?php echo $theme_color_3;?>;
}
.lpd-post-widget:hover .lpd-post-widget-element{
    background-color: <?php echo $theme_color_3;?>;
}
.lpd-post-widget:hover .pw-thumbnail .post-type-icon{
    background-color: <?php echo $theme_color_3;?>;
}
.owl-theme .owl-controls .owl-nav [class*=owl-]{
    background-color: <?php echo $theme_color_3;?>;
}
.dropcap2{
    background-color: <?php echo $theme_color_3;?>;
}
.dark-background .deco-sep-line-50,
.dark-background .deco-sep-line-100,
.dark-background .deco-sep-line-150,
.dark-background .deco-sep-line-200{
    background-color: <?php echo $theme_color_3;?>;
}
#shopping_cart_panel .lpd-cart-list-title a:hover{
	color: <?php echo $theme_color_3;?>;
}
/*------------------------------------------------------------------
4. #f8c400
-------------------------------------------------------------------*/
.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active{
  background-color: <?php echo $theme_color_4;?>;
}
#title-breadcrumb-breadcrumb a:hover{
	color: <?php echo $theme_color_4;?>;
}
#footer-bottom.footer-bottom-dark-theme a:hover{
	color: <?php echo $theme_color_4;?>;
}
.progress-bar{
	background-color: <?php echo $theme_color_4;?>; 
}
.pw-thumbnail .post-type-icon{
    background-color: <?php echo $theme_color_4;?>; 
}
.owl-theme .owl-controls .owl-nav [class*=owl-]:hover{
    background-color: <?php echo $theme_color_4;?>;
}
.cc-product-item .cc-price{
	border-color: <?php echo $theme_color_4;?>; 
}
/*------------------------------------------------------------------
Header Meta Color #f0bc00
-------------------------------------------------------------------*/
.wpml-switcher a,
.wpml-switcher .current-lang{
	color: <?php echo $hm_custom_bg;?> !important; 
}
</style>
<?php }?>

<?php }?>
<?php add_action( 'wp_head', 'lpd_color_styles' );?>