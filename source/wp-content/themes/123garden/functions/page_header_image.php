<?php function lpd_page_header_image() {

global $wp_query;

$page_id = '';

$posts_page = get_page($page_id);

$portfolio_header_image_type=$tax_portfolio_category_header_image_type=$tax_portfolio_tags_header_image_type=$shop_category_header_image_type=$shop_tag_header_image_type=$product_header_image_type=$tax_post_tag_header_image_type=$tax_category_header_image_type=$post_header_image_type=$page_header_image_type=$page_header_image_bg=$blog_header_image_bg=$post_header_image_bg=$shop_search_header_image_bg=$shop_category_header_image_bg=$shop_tag_header_image_bg=$portfolio_header_image_bg=$post_header_image_bg=$tax_category_header_image_bg=$tax_post_tag_header_image_bg=$tax_portfolio_category_header_image_bg=$tax_portfolio_tags_header_image_bg=$archive_header_image_bg=$product_header_image_bg=$team_header_image_type=$team_header_image_bg=$tax_team_category_header_image_bg=$tax_team_category_header_image_type=$tax_team_tags_header_image_bg=$tax_team_tags_header_image_type = "";
if(is_page()){
	$page_header_image_bg = wp_get_attachment_image_src( get_post_meta($posts_page->ID, 'page_header_image', true), 'full' );
	$page_header_image_type =get_post_meta($posts_page->ID, 'page_header_type', true);
}

if (is_plugin_active('woocommerce/woocommerce.php')) {
	if(is_shop()){
		$shop_id = woocommerce_get_page_id('shop');
		$page_header_image_bg = wp_get_attachment_image_src( get_post_meta($shop_id, 'page_header_image', true), 'full' );
		$page_header_image_type =get_post_meta($shop_id, 'page_header_type', true);
	}
}

$blog_header_image_bg = ot_get_option('blog-header-image');
$blog_header_image_type = ot_get_option('blog-header-image_type');
$blog_header_image_bg = new_lpd_get_attachment_id_from_src($blog_header_image_bg);
$blog_header_image_bg = wp_get_attachment_image_src( $blog_header_image_bg, 'full' );

if(is_singular('portfolio')){
	$portfolio_header_image_bg = wp_get_attachment_image_src( get_post_meta($posts_page->ID, 'portfolio_header_image', true), 'full' );
	$portfolio_header_image_type = get_post_meta($posts_page->ID, 'portfolio_header_type', true);
}
if(is_single()){
	$post_header_image_bg = wp_get_attachment_image_src( get_post_meta($posts_page->ID, 'post_header_image', true), 'full' );
	$post_header_image_type =get_post_meta($posts_page->ID, 'post_header_type', true);
}
if(is_singular('product')){
	$product_header_image_bg = wp_get_attachment_image_src( get_post_meta($posts_page->ID, 'product_header_image', true), 'full' );
	$product_header_image_type =get_post_meta($posts_page->ID, 'product_header_type', true);
}
if(is_singular('team')){
	$team_header_image_bg = wp_get_attachment_image_src( get_post_meta($posts_page->ID, 'team_header_image', true), 'full' );
	$team_header_image_type =get_post_meta($posts_page->ID, 'team_header_type', true);
}

if(is_tag()||is_category()||is_tax("product_tag")||is_tax("product_cat")||is_tax("portfolio_tags")||is_tax("portfolio_category")||is_tax("team_tags")||is_tax("team_category")){

$tax = $wp_query->get_queried_object();
$tax_id = $tax->term_id;

$category_term_meta = get_option( "category_$tax_id" );
$post_tag_term_meta = get_option( "post_tag_$tax_id" );
$product_cat_term_meta = get_option( "product_cat_$tax_id" );
$product_tag_term_meta = get_option( "product_tag_$tax_id" );
$portfolio_category_term_meta = get_option( "portfolio_category_$tax_id" );
$portfolio_tags_term_meta = get_option( "portfolio_tags_$tax_id" );
$team_category_term_meta = get_option( "team_category_$tax_id" );
$team_tags_term_meta = get_option( "team_tags_$tax_id" );

if(is_category()){
	if($category_term_meta){
		$tax_category_header_image_bg = wp_get_attachment_image_src( $category_term_meta['custom_term_meta'], 'full' );
		$tax_category_header_image_type = $category_term_meta['custom_term_meta1'];
	}
}
if(is_tag()){
	if($post_tag_term_meta){
		$tax_post_tag_header_image_bg = wp_get_attachment_image_src( $post_tag_term_meta['custom_term_meta'], 'full' );
		$tax_post_tag_header_image_type = $post_tag_term_meta['custom_term_meta1'];
	}
}
if (is_plugin_active('woocommerce/woocommerce.php')) {
	if(is_product_category()){
		#if($product_cat_term_meta){$shop_category_header_image_bg = wp_get_attachment_image_src( $product_cat_term_meta, 'full' );}
		if($product_cat_term_meta){
			$shop_category_header_image_bg = wp_get_attachment_image_src( $product_cat_term_meta['custom_term_meta'], 'full' );
			$shop_category_header_image_type = $product_cat_term_meta['custom_term_meta1'];
		}
	}
	if(is_tax("product_tag")){
		if($product_tag_term_meta){
			$shop_tag_header_image_bg = wp_get_attachment_image_src( $product_tag_term_meta['custom_term_meta'], 'full' );
			$shop_tag_header_image_type = $product_tag_term_meta['custom_term_meta1'];
		}
	}
}
if(is_tax("portfolio_category")){
	if($portfolio_category_term_meta){
		$tax_portfolio_category_header_image_bg = wp_get_attachment_image_src( $portfolio_category_term_meta['custom_term_meta'], 'full' );
		$tax_portfolio_category_header_image_type = $portfolio_category_term_meta['custom_term_meta1'];
	}
}
if(is_tax("portfolio_tags")){
	if($portfolio_tags_term_meta){
		$tax_portfolio_tags_header_image_bg = wp_get_attachment_image_src( $portfolio_tags_term_meta['custom_term_meta'], 'full' );
		$tax_portfolio_tags_header_image_type = $portfolio_tags_term_meta['custom_term_meta1'];
	}
}
if(is_tax("team_category")){
	if($team_category_term_meta){
		$tax_team_category_header_image_bg = wp_get_attachment_image_src( $team_category_term_meta['custom_term_meta'], 'full' );
		$tax_team_category_header_image_type = $team_category_term_meta['custom_term_meta1'];
	}
}
if(is_tax("team_tags")){
	if($team_tags_term_meta){
		$tax_team_tags_header_image_bg = wp_get_attachment_image_src( $team_tags_term_meta['custom_term_meta'], 'full' );
		$tax_team_tags_header_image_type = $team_tags_term_meta['custom_term_meta1'];
	}
}

}

require_once(ABSPATH .'/wp-admin/includes/plugin.php');

if ($page_header_image_bg||$blog_header_image_bg||$product_header_image_bg||$shop_search_header_image_bg||$shop_category_header_image_bg||$shop_tag_header_image_bg||$portfolio_header_image_bg||$post_header_image_bg||$tax_category_header_image_bg||$tax_post_tag_header_image_bg||$tax_portfolio_category_header_image_bg||$tax_portfolio_tags_header_image_bg||$archive_header_image_bg||$team_header_image_bg||$tax_team_category_header_image_bg||$tax_team_tags_header_image_bg) {

	if(is_home()){
	
		if ($blog_header_image_type=='parallax') {
			echo 'data-stellar-background-ratio="0.7" class="page-header-image-parallax" ';
		} else if ($blog_header_image_type=='repeat') {
			echo 'class="page-header-image-repeat" ';
		} else{
			echo 'class="page-header-image" ';
		}
	
	} else{
		
		if ($tax_portfolio_tags_header_image_type =='parallax'||$tax_portfolio_category_header_image_type =='parallax'||$portfolio_header_image_type =='parallax'||$shop_tag_header_image_type =='parallax'||$shop_category_header_image_type =='parallax'||$product_header_image_type=='parallax'||$tax_post_tag_header_image_type=='parallax'||$tax_category_header_image_type=='parallax'||$post_header_image_type=='parallax'||$page_header_image_type=='parallax'||$team_header_image_type=='parallax'||$tax_team_category_header_image_type=='parallax'||$tax_team_tags_header_image_type=='parallax') {
			echo 'data-stellar-background-ratio="0.7" class="page-header-image-parallax" ';
		}else if ($tax_portfolio_tags_header_image_type =='repeat'||$tax_portfolio_category_header_image_type =='repeat'||$portfolio_header_image_type =='repeat'||$shop_tag_header_image_type =='repeat'||$shop_category_header_image_type =='repeat'||$product_header_image_type=='repeat'||$tax_post_tag_header_image_type=='repeat'||$tax_category_header_image_type=='repeat'||$post_header_image_type=='repeat'||$page_header_image_type=='repeat'||$team_header_image_type=='repeat'||$tax_team_category_header_image_type=='repeat'||$tax_team_tags_header_image_type=='repeat') {
			echo 'class="page-header-image-repeat" ';
		}else{
			echo 'class="page-header-image" ';
		}
		
	}

	if (is_plugin_active('woocommerce/woocommerce.php')) {
	
		if(!is_shop()){
		
			if($page_header_image_bg){echo 'style="background-image: url('.esc_attr($page_header_image_bg[0]).');"';}
			
		}
		
		if(is_shop()){
		
			if(is_search()){
			
				if($shop_search_header_image_bg){echo 'style="background-image: url('.esc_attr($shop_search_header_image_bg[0]).');"';}
				
			} else{
			
				if($page_header_image_bg){echo 'style="background-image: url('.esc_attr($page_header_image_bg[0]).');"';}
				
			}
			
		} elseif(is_product_category()){
		
			if($shop_category_header_image_bg){echo 'style="background-image: url('.esc_attr($shop_category_header_image_bg[0]).');"';}
		
		} elseif(is_tax("product_tag")){
			
			if($shop_tag_header_image_bg){echo 'style="background-image: url('.esc_attr($shop_tag_header_image_bg[0]).');"';}
		}
		
		if(!is_shop()&&!is_product_category()&&!is_tax("product_tag")){
		
			if(is_singular('product')){ 
				if($product_header_image_bg){echo 'style="background-image: url('.esc_attr($product_header_image_bg[0]).');"';}
			}
			
		}
		
	}else{
	
		if(!is_home()){
		
			if($page_header_image_bg){echo 'style="background-image: url('.esc_attr($page_header_image_bg[0]).');"';}
			
		}
		
	}
	
	if(is_404()){}
	
	if(is_singular('portfolio')){
	
		if($portfolio_header_image_bg){echo 'style="background-image: url('.esc_attr($portfolio_header_image_bg[0]).');"';}
		
	}
	
	if(is_singular('team')){
	
		if($team_header_image_bg){echo 'style="background-image: url('.esc_attr($team_header_image_bg[0]).');"';}
		
	}
	
	if(is_singular()){
		
		if($post_header_image_bg){echo 'style="background-image: url('.esc_attr($post_header_image_bg[0]).');"';}
	}
	
	if(is_category()){
		
		if($tax_category_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_category_header_image_bg[0]).');"';}
	}
	
	if(is_tag()){
		
		if($tax_post_tag_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_post_tag_header_image_bg[0]).');"';}
	}
	
	if(is_archive()){
		if(is_tax("portfolio_category")){
		
			if($tax_portfolio_category_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_portfolio_category_header_image_bg[0]).');"';}
			
		} elseif(is_tax("portfolio_tags")){
		
			if($tax_portfolio_tags_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_portfolio_tags_header_image_bg[0]).');"';}
		
		} elseif(is_tax("team_category")){
		
			if($tax_team_category_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_team_category_header_image_bg[0]).');"';}
			
		} elseif(is_tax("team_tags")){
		
			if($tax_team_tags_header_image_bg){echo 'style="background-image: url('.esc_attr($tax_team_tags_header_image_bg[0]).');"';}
		
		} else{
		
			if($archive_header_image_bg){echo 'style="background-image: url('.esc_attr($archive_header_image_bg[0]).');"';}
			
		}
	}
	
	if(is_search()){
	
		if($search_header_image_bg){echo 'style="background-image: url('.esc_attr($search_header_image_bg[0]).');"';}
		
	}
	
	if(is_home()){
	
		if($blog_header_image_bg){echo 'style="background-image: url('.esc_attr($blog_header_image_bg[0]).');"';}
		
	}

}	

	
}?>