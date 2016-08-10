<?php

function vc_testimonial_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'image' => '',
      'title' => '',
      'meta_title' => '',
      'meta_info' => '',
      'meta_info_url' => '',
      'font_color' => '',
      'box_color' => '',
   ), $atts ) );
   
	$image_cropped = wp_get_attachment_image_src( $image, 'thumbnail' );
	
	$content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
	
	$img = '';
	
	if($image_cropped){
		$img = '<img class="testiomonial_img" src="'.esc_url($image_cropped[0]).'"/>';
	}

   ob_start();?>
   
	<?php if($title&&$content){?>
		<div class="lpd-testimonial <?php if($image){?>lpd-testimonial-image<?php } ?>" style="background-color:<?php echo esc_attr($box_color);?>;">
			<?php if($image){?><?php echo $img;?><?php } ?>
			<?php if($title){?><h5 style="color:<?php echo esc_attr($font_color);?>;"><?php echo esc_html($title);?></h5><?php } ?>
			<?php if($content){?><div class="t-content" style="color:<?php echo esc_attr($font_color);?>;"><?php echo $content;?></div><?php } ?>
			<?php if($meta_title||$meta_info){?><div class="t-meta"><?php echo esc_html($meta_title);?><?php if($meta_title&&$meta_info){?>, <?php } ?><?php if($meta_info_url){?><a href="<?php echo esc_url($meta_info_url);?>"><?php } ?><?php echo esc_html($meta_info);?><?php if($meta_info_url){?></a><?php } ?></div><?php } ?>
		</div>
	<?php } ?>

   <?php return ob_get_clean();
}
add_shortcode( 'vc_testimonial', 'vc_testimonial_func' );


vc_map(array(
   "name" => __("Testomonial", GETTEXT_DOMAIN),
   "base" => "vc_testimonial",
   "class" => "",
   "icon" => "icon-wpb-lpd",
   "category" => __('Content', GETTEXT_DOMAIN),
   'admin_enqueue_js' => "",
   'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/assets/vc_extend.css'),
   "params" => array(
	    array(
	      "type" => "attach_image",
	      "heading" => __("Image", GETTEXT_DOMAIN),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select image from media library.", GETTEXT_DOMAIN)
	    ),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Title", GETTEXT_DOMAIN),
			 "param_name" => "title",
			 "value" => '',
			 "description" => __("Enter your title.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis purus vitae imperdiet suscipit.",
			 "description" => __("Enter your content.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Meta Tilte", GETTEXT_DOMAIN),
			 "param_name" => "meta_title",
			 "value" => "",
			 "description" => __("Enter your meta title.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Meta Info", GETTEXT_DOMAIN),
			 "param_name" => "meta_info",
			 "value" => "",
			 "description" => __("Enter your meta info.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Meta Info Url", GETTEXT_DOMAIN),
			 "param_name" => "meta_info_url",
			 "value" => "",
			 "description" => __("Enter the url for meta info.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Font Color", GETTEXT_DOMAIN),
			"param_name" => "font_color",
			"value" => "#555",
			"description" => __("Select font color.", GETTEXT_DOMAIN),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Testimonial Box Color", GETTEXT_DOMAIN),
			"param_name" => "box_color",
			"value" => "#f5f5f5",
			"description" => __("Select testimonial box color.", GETTEXT_DOMAIN),
		),
   )
));

?>