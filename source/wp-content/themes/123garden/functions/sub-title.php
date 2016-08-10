<?php function lpd_page_sub_title() {

	global $wp_query;
	
	$page_id = '';
	
	$posts_page = get_page($page_id);
	
	if(is_page()){
		$page_subtitle = get_post_meta($posts_page->ID, 'page_header_subtitle', true);
		if($page_subtitle){ echo '<span>'. esc_html($page_subtitle).'</span>'; }
	}
	
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		if(is_shop()){
			$shop_id = woocommerce_get_page_id('shop');
			$page_subtitle = get_post_meta($shop_id, 'page_header_subtitle', true);
			if($page_subtitle){ echo '<span>'. esc_html($page_subtitle).'</span>'; }
		}
	}
	
	if(is_singular('portfolio')){
		$portfolio_subtitle = get_post_meta($posts_page->ID, 'portfolio_header_subtitle', true);
		if($portfolio_subtitle){ echo '<span>'.esc_html($portfolio_subtitle).'</span>'; }
	}
	
	if(is_single()){
		$post_subtitle = get_post_meta($posts_page->ID, 'post_header_subtitle', true);
		if($post_subtitle){ echo '<span>'.esc_html($post_subtitle).'</span>'; }
	}
	
	if(is_singular('product')){
		$product_subtitle = get_post_meta($posts_page->ID, 'product_header_subtitle', true);
		if($product_subtitle){ echo '<span>'.esc_html($product_subtitle).'</span>'; }
	}

	if(is_singular('team')){
		$team_subtitle = get_post_meta($posts_page->ID, 'team_header_subtitle', true);
		if($team_subtitle){ echo '<span>'.esc_html($team_subtitle).'</span>'; }
	}
	
	if(is_home()){
		$blog_subtitle = ot_get_option('blog_sub_title');
		if($blog_subtitle){ echo '<span>'.esc_html($blog_subtitle).'</span>'; }
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
				$tax_category_subtitle = $category_term_meta['custom_term_meta3'];
				if($tax_category_subtitle){ echo '<span>'.esc_html($tax_category_subtitle).'</span>'; }
			}
		}
		if(is_tag()){
			if($post_tag_term_meta){
				$tax_post_tag_subtitle = $post_tag_term_meta['custom_term_meta3'];
				if($tax_post_tag_subtitle){ echo '<span>'.esc_html($tax_post_tag_subtitle).'</span>'; }
			}
		}
		if (is_plugin_active('woocommerce/woocommerce.php')) {
			if(is_product_category()){
				if($product_cat_term_meta){
					$tax_product_cat_subtitle = $product_cat_term_meta['custom_term_meta3'];
					if($tax_product_cat_subtitle){ echo '<span>'.esc_html($tax_product_cat_subtitle).'</span>'; }
				}
			}
			if(is_tax("product_tag")){
				if($product_tag_term_meta){
					$tax_product_tag_subtitle = $product_tag_term_meta['custom_term_meta3'];
					if($tax_product_tag_subtitle){ echo '<span>'.esc_html($tax_product_tag_subtitle).'</span>'; }
				}
			}
		}
		if(is_tax("portfolio_category")){
			if($portfolio_category_term_meta){
				$tax_portfolio_category_subtitle = $portfolio_category_term_meta['custom_term_meta3'];
				if($tax_portfolio_category_subtitle){ echo '<span>'.esc_html($tax_portfolio_category_subtitle).'</span>'; }
			}
		}
		if(is_tax("portfolio_tags")){
			if($portfolio_tags_term_meta){
				$tax_portfolio_tags_subtitle = $portfolio_tags_term_meta['custom_term_meta3'];
				if($tax_portfolio_tags_subtitle){ echo '<span>'.esc_html($tax_portfolio_tags_subtitle).'</span>'; }
			}
		}
		
		if(is_tax("team_category")){
			if($team_category_term_meta){
				$tax_team_category_subtitle = $team_category_term_meta['custom_term_meta3'];
				if($tax_team_category_subtitle){ echo '<span>'.esc_html($tax_team_category_subtitle).'</span>'; }
			}
		}
		if(is_tax("team_tags")){
			if($team_tags_term_meta){
				$tax_team_tags_subtitle = $team_tags_term_meta['custom_term_meta3'];
				if($tax_team_tags_subtitle){ echo '<span>'.esc_html($tax_team_tags_subtitle).'</span>'; }
			}
		}
	
	}
	
}?>