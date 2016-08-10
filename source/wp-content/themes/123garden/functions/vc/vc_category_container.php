<?php

// v1.1.8

function vc_category_container_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'slug' => '',
      'column' => '',
      'thumbnail' => '',
      'list_style' => '',
   ), $atts ) );
   
   	if ( empty( $list_style ) ) {
		$list_style = 'style_1';
	}
	if ( empty( $thumbnail ) ) {
		$thumbnail = 'theme-size-1x1';
	}
	if ( empty( $column ) ) {
		$column = '3';
	}
    
   $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
   
	#$cat = get_category_by_slug();
	$cat = get_term_by( 'slug', $slug, 'product_cat');
	
	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
	
	$image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail);
	
	$items = $column;
   
   ob_start();?>
   
   <div class="lpd-category-container">


		<table>
			<tbody>
				<tr>
					<td class="cc-meta-column">
					<div class="ribbon cc-ribbon">
						<span class="ribbon-content">
							<span class="content-ribbon"><h3><?php echo esc_html($cat->name); ?></h3></span>
						</span>
					</div>
						<?php
						
						$title_li = ''; 
						
						if($list_style=='style_2'){
							$title_li=" ";
						}
						
						$cc_cat_list = array(
							'child_of' => $cat->term_id,
							'depth' => 0,
							'title_li'  => $title_li,
							'taxonomy' => 'product_cat',						 
						);
						?>
						<?php
						if($list_style=='style_2'){
						echo '<ul class="cc-cat-list cc-cat-list-style2">';
						} else{
						echo '<ul class="cc-cat-list">';
						}
								wp_list_categories( $cc_cat_list );
						echo '</ul>';
						?>
				   <?php if ($content) {?>
					   <div class="cc-description">
						   <?php echo $content;?>
					   </div>
				   <?php }?>
				   <a href="<?php echo esc_url(get_term_link($slug, 'product_cat'));?>" class="btn btn-warning"><?php _e("View More", GETTEXT_DOMAIN); ?></a>
					</td>
					<td class="cc-content-column">
						<?php if ($image) {?>
							<img class="cc-img" src="<?php echo esc_url($image[0]); ?>" alt="" />
					   <?php }?>
					   <div class="cc-products">
						   <ul class="cc-col cc-col-<?php echo esc_attr($column); ?> clearfix">
						   		<?php $query = new WP_Query();?>
						   		<?php $query->query('post_type=product&product_cat='. $slug .'&posts_per_page='. $items .'');?>
						   		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
						   			
								<li>
									<div class="cc-product-item">
										<a href="<?php the_permalink();?>" class="cc-product-thumbnail">
										<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {?>
											<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'theme-size-1x1' ); echo esc_url($image[0]);?>" alt='<?php the_title();?>'>
										<?php } else{?>
											<img src="<?php echo esc_url(get_template_directory_uri()). '/assets/img/add-featured-image.png'; ?>" alt='<?php the_title();?>'>
										<?php }?>
										</a>
										<div class="cc-price"><?php woocommerce_template_loop_price(); ?></div>
									</div>
								</li>
							   
						   		<?php endwhile; endif; wp_reset_query();?>
						   </ul>
					   </div>
					</td>
				</tr>
			</tbody>
		</table>
		
		
   </div>
   
   <?php return ob_get_clean();

}
add_shortcode( 'vc_category_container', 'vc_category_container_func' );


vc_map(array(
   "name" => __("Category Container", GETTEXT_DOMAIN),
   "base" => "vc_category_container",
   "class" => "",
   "icon" => "icon-wpb-lpd",
   "category" => __('Content', GETTEXT_DOMAIN),
   'admin_enqueue_js' => "",
   'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/assets/vc_extend.css'),
   "params" => array(
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Category (slug)", GETTEXT_DOMAIN),
			 "param_name" => "slug",
			 "value" => '',
			 "description" => __("Enter product category slug you want to display.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("List Style", GETTEXT_DOMAIN),
			"param_name" => "list_style",
			"value" => array('style 1' => "style_1", 'style 2' => "style_2"),
			"description" => __("Select list style.", GETTEXT_DOMAIN)
		),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Image Size", GETTEXT_DOMAIN),
	      "param_name" => "thumbnail",
	      "value" => array( '1x1' => 'theme-size-1x1', '16x9' => 'theme-size-16x9', '4x3' => 'theme-size-4x3', '3x2' => 'theme-size-3x2'),
	      "description" => __("Select format for the image.", GETTEXT_DOMAIN)
	    ),
		array(
			"type" => "dropdown",
			"heading" => __("Product Columns", GETTEXT_DOMAIN),
			"param_name" => "column",
			"value" => array( '3' => "3", '4' => "4", '5' => "5", '6' => "6"),
			"description" => __("Select the number of product columns.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => '',
			 "description" => __("Enter your content.", GETTEXT_DOMAIN)
		),
	
   )

));

?>