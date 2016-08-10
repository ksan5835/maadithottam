<?php function lpd_title_padding() {

global $wp_query;
	
	$page_id = '';
	
	$posts_page = get_page($page_id);
	
	if(is_page()){
		$page_padding_top = get_post_meta($posts_page->ID, 'page_header_padding_top', true);
		$page_padding_bottom = get_post_meta($posts_page->ID, 'page_header_padding_bottom', true);
		if($page_padding_top||$page_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($page_padding_top){
				$out .= 'padding-top:'.esc_attr($page_padding_top).'px;';
			}
			if($page_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($page_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
	}
	
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		if(is_shop()){
			$shop_id = woocommerce_get_page_id('shop');
			$page_padding_top = get_post_meta($shop_id, 'page_header_padding_top', true);
			$page_padding_bottom = get_post_meta($shop_id, 'page_header_padding_bottom', true);
			if($page_padding_top||$page_padding_bottom){
				$out = '';
				$out .= ' style="';
				if($page_padding_top){
					$out .= 'padding-top:'.esc_attr($page_padding_top).'px;';
				}
				if($page_padding_bottom){
					$out .= 'padding-bottom:'.esc_attr($page_padding_bottom).'px;';
				} 
				$out .= '"';
				return $out;
			}
		}
	}
	
	if(is_singular('portfolio')){
		$portfolio_padding_top = get_post_meta($posts_page->ID, 'portfolio_header_padding_top', true);
		$portfolio_padding_bottom = get_post_meta($posts_page->ID, 'portfolio_header_padding_bottom', true);
		if($portfolio_padding_top||$portfolio_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($portfolio_padding_top){
				$out .= 'padding-top:'.esc_attr($portfolio_padding_top).'px;';
			}
			if($portfolio_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($portfolio_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
	}
	
	if(is_single()){
		$post_padding_top = get_post_meta($posts_page->ID, 'post_header_padding_top', true);
		$post_padding_bottom = get_post_meta($posts_page->ID, 'post_header_padding_bottom', true);
		if($post_padding_top||$post_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($post_padding_top){
				$out .= 'padding-top:'.esc_attr($post_padding_top).'px;';
			}
			if($post_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($post_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
	}
	
	if(is_singular('product')){
		$product_padding_top = get_post_meta($posts_page->ID, 'product_header_padding_top', true);
		$product_padding_bottom = get_post_meta($posts_page->ID, 'product_header_padding_bottom', true);
		if($product_padding_top||$product_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($product_padding_top){
				$out .= 'padding-top:'.esc_attr($product_padding_top).'px;';
			}
			if($product_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($product_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
	}

	if(is_singular('team')){
		$team_padding_top = get_post_meta($posts_page->ID, 'team_header_padding_top', true);
		$team_padding_bottom = get_post_meta($posts_page->ID, 'team_header_padding_bottom', true);
		if($team_padding_top||$team_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($team_padding_top){
				$out .= 'padding-top:'.esc_attr($team_padding_top).'px;';
			}
			if($team_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($team_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
	}
	if(is_home()){
		$blog_title_padding_top = ot_get_option('blog_title_padding_top');
		$blog_title_padding_bottom = ot_get_option('blog_title_padding_bottom');
		if($blog_title_padding_top||$blog_title_padding_bottom){
			$out = '';
			$out .= ' style="';
			if($blog_title_padding_top){
				$out .= 'padding-top:'.esc_attr($blog_title_padding_top).'px;';
			}
			if($blog_title_padding_bottom){
				$out .= 'padding-bottom:'.esc_attr($blog_title_padding_bottom).'px;';
			} 
			$out .= '"';
			return $out;
		}
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
			
				$tax_category_title_padding_top = $category_term_meta['custom_term_meta4'];
				$tax_category_title_padding_bottom = $category_term_meta['custom_term_meta5'];
				if($tax_category_title_padding_top||$tax_category_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_category_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_category_title_padding_top).'px;';
					}
					if($tax_category_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_category_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}
			
			}
		}
		if(is_tag()){
			if($post_tag_term_meta){
				
				$tax_post_tag_title_padding_top = $post_tag_term_meta['custom_term_meta4'];
				$tax_post_tag_title_padding_bottom = $post_tag_term_meta['custom_term_meta5'];
				if($tax_post_tag_title_padding_top||$tax_post_tag_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_post_tag_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_post_tag_title_padding_top).'px;';
					}
					if($tax_post_tag_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_post_tag_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}
				
			}
		}
		if (is_plugin_active('woocommerce/woocommerce.php')) {
			if(is_product_category()){
				if($product_cat_term_meta){

					$tax_product_cat_title_padding_top = $product_cat_term_meta['custom_term_meta4'];
					$tax_product_cat_title_padding_bottom = $product_cat_term_meta['custom_term_meta5'];
					if($tax_product_cat_title_padding_top||$tax_product_cat_title_padding_bottom){
						$out = '';
						$out .= ' style="';
						if($tax_product_cat_title_padding_top){
							$out .= 'padding-top:'.esc_attr($tax_product_cat_title_padding_top).'px;';
						}
						if($tax_product_cat_title_padding_bottom){
							$out .= 'padding-bottom:'.esc_attr($tax_product_cat_title_padding_bottom).'px;';
						} 
						$out .= '"';
						return $out;
					}
					
				}
			}
			if(is_tax("product_tag")){
				if($product_tag_term_meta){
				
					$tax_product_tag_title_padding_top = $product_tag_term_meta['custom_term_meta4'];
					$tax_product_tag_title_padding_bottom = $product_tag_term_meta['custom_term_meta5'];
					if($tax_product_tag_title_padding_top||$tax_product_tag_title_padding_bottom){
						$out = '';
						$out .= ' style="';
						if($tax_product_tag_title_padding_top){
							$out .= 'padding-top:'.esc_attr($tax_product_tag_title_padding_top).'px;';
						}
						if($tax_product_tag_title_padding_bottom){
							$out .= 'padding-bottom:'.esc_attr($tax_product_tag_title_padding_bottom).'px;';
						} 
						$out .= '"';
						return $out;
					}

				}
			}
		}
		if(is_tax("portfolio_category")){
			if($portfolio_category_term_meta){
				$tax_portfolio_category_title_padding_top = $portfolio_category_term_meta['custom_term_meta4'];
				$tax_portfolio_category_title_padding_bottom = $portfolio_category_term_meta['custom_term_meta5'];
				if($tax_portfolio_category_title_padding_top||$tax_portfolio_category_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_portfolio_category_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_portfolio_category_title_padding_top).'px;';
					}
					if($tax_portfolio_category_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_portfolio_category_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}			
			}
		}
		if(is_tax("portfolio_tags")){
			if($portfolio_tags_term_meta){
				$tax_portfolio_tags_title_padding_top = $portfolio_tags_term_meta['custom_term_meta4'];
				$tax_portfolio_tags_title_padding_bottom = $portfolio_tags_term_meta['custom_term_meta5'];
				if($tax_portfolio_tags_title_padding_top||$tax_portfolio_tags_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_portfolio_tags_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_portfolio_tags_title_padding_top).'px;';
					}
					if($tax_portfolio_tags_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_portfolio_tags_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}
			}
		}
		
		if(is_tax("team_category")){
			if($team_category_term_meta){
				$tax_team_category_title_padding_top = $team_category_term_meta['custom_term_meta4'];
				$tax_team_category_title_padding_bottom = $team_category_term_meta['custom_term_meta5'];
				if($tax_team_category_title_padding_top||$tax_team_category_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_team_category_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_team_category_title_padding_top).'px;';
					}
					if($tax_team_category_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_team_category_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}
			}
		}
		if(is_tax("team_tags")){
			if($team_tags_term_meta){
				$tax_team_tags_title_padding_top = $team_tags_term_meta['custom_term_meta4'];
				$tax_team_tags_title_padding_bottom = $team_tags_term_meta['custom_term_meta5'];
				if($tax_team_tags_title_padding_top||$tax_team_tags_title_padding_bottom){
					$out = '';
					$out .= ' style="';
					if($tax_team_tags_title_padding_top){
						$out .= 'padding-top:'.esc_attr($tax_team_tags_title_padding_top).'px;';
					}
					if($tax_team_tags_title_padding_bottom){
						$out .= 'padding-bottom:'.esc_attr($tax_team_tags_title_padding_bottom).'px;';
					} 
					$out .= '"';
					return $out;
				}
			}
		}	
	
	}

	/*

		

	


	
	}
	
	*/
	
}?>