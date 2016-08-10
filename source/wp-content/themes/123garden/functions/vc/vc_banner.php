<?php

// v1.1.8

function vc_banner_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      'content_color' => '',
      'content_font_weight' => '',
      'content_letter_spacing' => '',
      'sub_title' => '',	
      'bn_text' => '',
      'link' => '',
      'type' => '',
      'size' => '',
      'image' => '',
      'right_border' => ''
   ), $atts ) );
   
   	if ( empty( $content_font_weight ) ) {
		$content_font_weight = '300';
	}
	if ( empty( $type ) ) {
		$type = 'default';
	}
	if ( empty( $size ) ) {
		$size = 'lg';
	}
	
   $image = wp_get_attachment_image_src( $image, 'full' );
 
   $content = wpb_js_remove_wpautop($content);
   
   if($content_letter_spacing!=""){$content_letter_spacing = 'letter-spacing:'.esc_attr($content_letter_spacing).'px;';}
   
   ob_start();?>
   
   <div class="lpd-banner<?php if($right_border){?> lpd-b-hide-border<?php } ?>"<?php if($image){?> style="background-image: url(<?php echo esc_attr($image[0]); ?>)"<?php } ?>>
	   <?php if($sub_title){?><span class="lpd-b-sub-title"><?php echo esc_html($sub_title); ?></span><?php } ?>
	   <?php if($title){?><h3><?php echo esc_html($title); ?></h3><?php } ?>
	   <?php if($content){?><p class="lpd-b-content" style="color:<?php echo esc_attr($content_color); ?>;font-weight:<?php echo esc_attr($content_font_weight); ?>;<?php echo $content_letter_spacing; ?>"><?php echo $content; ?></p><?php } ?>
	   <?php if($bn_text){?><a class="btn btn-vc btn-<?php echo esc_attr($type); ?> btn-<?php echo esc_attr($size); ?>" href="<?php echo esc_url($link); ?>"><?php echo esc_html($bn_text); ?></a><?php } ?>
   </div>
   
   <?php return ob_get_clean();

}
add_shortcode( 'vc_banner', 'vc_banner_func' );


vc_map(array(
   "name" => __("Banner", GETTEXT_DOMAIN),
   "base" => "vc_banner",
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
			 "heading" => __("Title", GETTEXT_DOMAIN),
			 "param_name" => "title",
			 "value" => __("Lorem ipsum dolor", GETTEXT_DOMAIN),
			 "description" => __("Enter your title.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Sub-title", GETTEXT_DOMAIN),
			 "param_name" => "sub_title",
			 "value" => __("LOREM ISPUN DOLOR", GETTEXT_DOMAIN),
			 "description" => __("Enter your sub-title.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis dapibus massa.',
			 "description" => __("Enter your content.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Content Color", GETTEXT_DOMAIN),
			"param_name" => "content_color",
			"value" => "#555555",
			"description" => __("Select content color.", GETTEXT_DOMAIN),	
		),
		array(
			"type" => "dropdown",
			"heading" => __("Content Font Weight", GETTEXT_DOMAIN),
			"param_name" => "content_font_weight",
			"value" => array(
				"300" => "300",
				"400" => "400",	
				"500" => "500",
				"700" => "700",
				"900" => "900",		
			),
			"description" => __("Select content font weight.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content Letter Spacing", GETTEXT_DOMAIN),
			 "param_name" => "content_letter_spacing",
			 "value" => '',
			 "description" => __("Letter spacing for content, only integers (ex: 0.75, 1, 3,).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Text", GETTEXT_DOMAIN),
			 "param_name" => "bn_text",
			 "value" => "Text on the button",
			 "description" => __("Text on the button.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Url (link)", GETTEXT_DOMAIN),
			 "param_name" => "link",
			 "value" => __("#", GETTEXT_DOMAIN),
			 "description" => __("Button link.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Type", GETTEXT_DOMAIN),
			"param_name" => "type",
			"value" => array(__('Default', GETTEXT_DOMAIN) => "default", __('Primary', GETTEXT_DOMAIN) => "primary", __('Warning', GETTEXT_DOMAIN) => "warning"),
			"description" => __("Select type of the button.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Size", GETTEXT_DOMAIN),
			"param_name" => "size",
			"value" => array(__('Large', GETTEXT_DOMAIN) => "lg", __('Medium', GETTEXT_DOMAIN) => "medium", __('Small', GETTEXT_DOMAIN) => "sm", __('Extra Small', GETTEXT_DOMAIN) => "xs"),
			"description" => __("Select size of the button.", GETTEXT_DOMAIN)
		),
	    array(
	      "type" => "attach_image",
	      "heading" => __("Image", GETTEXT_DOMAIN),
	      "param_name" => "image",
	      "value" => "",
	      "description" => __("Select image from media library.", GETTEXT_DOMAIN)
	    ),
		array(
			"type" => 'checkbox',
			"heading" => __("Right Border", GETTEXT_DOMAIN),
			"param_name" => "right_border",
			"description" => __("Check, if you want to hide right border.", GETTEXT_DOMAIN),
			"value" => Array(__("Hide", GETTEXT_DOMAIN) => 'hide')
		),
   )

   
));

?>