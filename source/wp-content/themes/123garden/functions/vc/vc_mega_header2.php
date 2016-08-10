<?php

// v1.1.8

function vc_mega_header2_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'header_type' => '',
      'title' => '',
      'title_font_size' => '',
      'title_color' => '',
      'title_font_weight' => '',
      'separator' => '',
      'separator_color' => '',
      'description' => '',
      'description_font_size' => '',
      'description_color' => '',
      'description_font_weight' => '',
      'description_letter_spacing' => '',
      'description_font_style' => '',
      'content_font_style' => '',
      'content_color' => '',
      'content_line_height' => '',
      'content_font_weight' => '',
      'content_letter_spacing' => '',
      'content_font_size' => '',
      'padding_top' => '',
      'padding_bottom' => '',
      'margin_top' => '',
      'margin_bottom' => '',
   ), $atts ) );
   

	if ( empty( $header_type ) ) {
		$header_type = 'type-1';
	}
	if ( empty( $title_font_size ) ) {
		$title_font_size = '36px';
	}
	if ( empty( $title_font_weight ) ) {
		$title_font_weight = '300';
	}
	if ( empty( $description_font_size ) ) {
		$description_font_size = '14px';
	}
	if ( empty( $description_font_weight ) ) {
		$description_font_weight = '300';
	}
	if ( empty( $separator ) ) {
		$separator = '';
	}
	if ( empty( $content_font_size ) ) {
		$content_font_size = '14px';
	}
	if ( empty( $content_font_weight ) ) {
		$content_font_weight = '300';
	}
 
   $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
   
   	if($title_font_size){$title_font_size = 'font-size:'.esc_attr($title_font_size).';';}
   	if($title_color){$title_color = 'color:'.esc_attr($title_color).';';}
   	if($title_font_weight){$title_font_weight = 'font-weight:'.esc_attr($title_font_weight).';';}
   	
   	if($description_font_size){$description_font_size = 'font-size:'.esc_attr($description_font_size).';';}
   	if($description_color){$description_color = 'color:'.esc_attr($description_color).';';}
   	if($description_letter_spacing){$description_letter_spacing = 'letter-spacing:'.esc_attr($description_letter_spacing).'px;';}
   	if($description_font_weight){$description_font_weight = 'font-weight:'.esc_attr($description_font_weight).';';}
   	
   	if($content_font_size){$content_font_size = 'font-size:'.esc_attr($content_font_size).';';}
   	if($content_color){$content_color = 'color:'.esc_attr($content_color).';';}
   	if($content_letter_spacing){$content_letter_spacing = 'letter-spacing:'.esc_attr($content_letter_spacing).'px;';}
   	if($content_line_height){$content_line_height = 'line-height:'.esc_attr($content_line_height).'px;';}
   	if($content_font_weight){$content_font_weight = 'font-weight:'.esc_attr($content_font_weight).';';}
   	
   	if($padding_top){$padding_top = 'padding-top:'.esc_attr($padding_top).'px;';}
	if($padding_bottom){$padding_bottom = 'padding-bottom:'.esc_attr($padding_bottom).'px;';}

	if($margin_top){$margin_top = 'margin-top:'.esc_attr($margin_top).'px;';}
	if($margin_bottom){$margin_bottom = 'margin-bottom:'.esc_attr($margin_bottom).'px;';}
	
	$styles=$content_styles=$description_styles=$title_styles= '';
	
	if($title_color||$title_font_size){$title_styles = ' style="'.$title_color.''.$title_font_size.''.$title_font_weight.'"';}
	
	if($description_font_size||$description_color||$description_letter_spacing){$description_styles = ' style="'.$description_font_size.''.$description_color.''.$description_letter_spacing.''.$description_font_weight.'"';}
	
	if($content_font_size||$content_color||$content_letter_spacing||$content_line_height){$content_styles = ' style="'.$content_font_size.''.$content_color.''.$content_letter_spacing.''.$content_line_height.''.$content_font_weight.'"';}
	
	if($padding_top||$padding_bottom||$margin_top||$margin_bottom){$styles = ' style="'.$margin_top.''.$margin_bottom.''.$padding_top.''.$padding_bottom.'"';}
   
   ob_start();?>
   <div class="lpd-mega-header2<?php if($header_type=='type-2'){?> lpd-mega-heade-type-2<?php } ?>"<?php echo $styles; ?>>
	<?php if($header_type=='type-1'){?>
		<?php if($title){?><h3<?php echo $title_styles; ?>><?php echo esc_html($title); ?></h3><?php } ?>
		<?php if($description){?><span class="mh2_description<?php if($description_font_style){?> mh2-font-style<?php } ?>"<?php echo $description_styles; ?>><?php echo $description; ?></span><?php } ?>
		<?php if($separator){?><div style="background-color:<?php echo esc_attr($separator_color); ?>" class="deco-sep-line-<?php echo esc_attr($separator); ?>"></div><?php } ?>
		<?php if($content){?><div class="mh2_content<?php if($content_font_style){?> mh2-font-style<?php } ?>"<?php echo $content_styles; ?>><?php echo $content; ?></div><?php } ?>
	<?php } else{?>
		<?php if($description){?><span class="mh2_description<?php if($description_font_style){?> mh2-font-style<?php } ?>"<?php echo $description_styles; ?>><?php echo $description; ?></span><?php } ?>
		<?php if($separator){?><div style="background-color:<?php echo esc_attr($separator_color); ?>" class="deco-sep-line-<?php echo esc_attr($separator); ?>"></div><?php } ?>
		<?php if($title){?><h3<?php echo $title_styles; ?>><?php echo esc_html($title); ?></h3><?php } ?>
		<?php if($content){?><div class="mh2_content<?php if($content_font_style){?> mh2-font-style<?php } ?>"<?php echo $content_styles; ?>><?php echo $content; ?></div><?php } ?>
	<?php } ?>
   </div>
   
   <?php return ob_get_clean();

}
add_shortcode( 'vc_mega_header2', 'vc_mega_header2_func' );


vc_map(array(
   "name" => __("Mega Header 2", GETTEXT_DOMAIN),
   "base" => "vc_mega_header2",
   "class" => "",
   "icon" => "icon-wpb-lpd",
   "category" => __('Content', GETTEXT_DOMAIN),
   'admin_enqueue_js' => "",
   'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/assets/vc_extend.css'),
   "params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Header Type", GETTEXT_DOMAIN),
			"param_name" => "header_type",
			"value" => array(		
			__('type 1', GETTEXT_DOMAIN) => "type-1",
			__('type 2', GETTEXT_DOMAIN) => "type-2",
			),
			"description" => __("Select header type.", GETTEXT_DOMAIN)
		),	
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
			"type" => "dropdown",
			"heading" => __("Title Font Size", GETTEXT_DOMAIN),
			"param_name" => "title_font_size",
			"value" => array(
				"36px" => "36px",
				"30px" => "30px",	
				"24px" => "24px",
				"18px" => "18px",		
			),
			"description" => __("Select title font size.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Title Font Weight", GETTEXT_DOMAIN),
			"param_name" => "title_font_weight",
			"value" => array(
				"300" => "300",
				"400" => "400",	
				"500" => "500",
				"700" => "700",
				"900" => "900",		
			),
			"description" => __("Select title font weight.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title Color", GETTEXT_DOMAIN),
			"param_name" => "title_color",
			"value" => '#555',
			"description" => __("Choose title color.", GETTEXT_DOMAIN)
		),		
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Description", GETTEXT_DOMAIN),
			 "param_name" => "description",
			 "value" => "",
			 "description" => __("Enter your description.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Description Font Size", GETTEXT_DOMAIN),
			"param_name" => "description_font_size",
			"value" => array(
				"14px" => "14px",
				"16px" => "16px",
				"18px" => "18px",
				"20px" => "20px",
			),
			"description" => __("Select description font size.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Description Font Weight", GETTEXT_DOMAIN),
			"param_name" => "description_font_weight",
			"value" => array(
				"300" => "300",
				"400" => "400",	
				"500" => "500",
				"700" => "700",
				"900" => "900",		
			),
			"description" => __("Select description font weight.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Description Letter Spacing", GETTEXT_DOMAIN),
			 "param_name" => "description_letter_spacing",
			 "value" => '',
			 "description" => __("Letter spacing for description, only integers (ex: 0.75, 1, 3,).", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Description Color", GETTEXT_DOMAIN),
			"param_name" => "description_color",
			"value" => '#555',
			"description" => __("Choose description color.", GETTEXT_DOMAIN)
		),	
		array(
			"type" => 'checkbox',
			"heading" => __("Secondary Description Font Style", GETTEXT_DOMAIN),
			"param_name" => "description_font_style",
			"description" => __("Check, if you wan to enable secondary font style for description.", GETTEXT_DOMAIN),
			"value" => Array(__("Enable", GETTEXT_DOMAIN) => 'enable')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Separator", GETTEXT_DOMAIN),
			"param_name" => "separator",
			"value" => array(		
			__('none', GETTEXT_DOMAIN) => "",
			__('50px', GETTEXT_DOMAIN) => "50",
			__('100px', GETTEXT_DOMAIN) => "100",
			__('150px', GETTEXT_DOMAIN) => "150",
			__('200px', GETTEXT_DOMAIN) => "200",
			),
			"description" => __("Select icon.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Separator Color", GETTEXT_DOMAIN),
			"param_name" => "separator_color",
			"value" => '#66ab36',
			"description" => __("Choose separator color.", GETTEXT_DOMAIN)
		),	
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => '',
			 "description" => __("Enter your content.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Content Font Size", GETTEXT_DOMAIN),
			"param_name" => "content_font_size",
			"value" => array(
				"14px" => "14px",
				"16px" => "16px",
				"18px" => "18px",
				"20px" => "20px",
				"24px" => "24px",		
			),
			"description" => __("Select content font size.", GETTEXT_DOMAIN)
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
			 "heading" => __("Conetnt Letter Spacing", GETTEXT_DOMAIN),
			 "param_name" => "content_letter_spacing",
			 "value" => '',
			 "description" => __("Letter spacing for description, only integers (ex: 0.75, 1, 3).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content Line Height", GETTEXT_DOMAIN),
			 "param_name" => "content_line_height",
			 "value" => '',
			 "description" => __("Line height for the content (in pixels), only integers (ex: 20, 24, 30, 36).", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content Color", GETTEXT_DOMAIN),
			"param_name" => "content_color",
			"value" => '#555',
			"description" => __("Choose description color.", GETTEXT_DOMAIN)
		),	
		array(
			"type" => 'checkbox',
			"heading" => __("Secondary Content Font Style ", GETTEXT_DOMAIN),
			"param_name" => "content_font_style",
			"description" => __("Check, if you wan to enable secondary font style for content.", GETTEXT_DOMAIN),
			"value" => Array(__("Enable", GETTEXT_DOMAIN) => 'enable')
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Margin Top", GETTEXT_DOMAIN),
			 "param_name" => "margin_top",
			 "value" => '',
			 "description" => __("Margin top, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Margin Bottom", GETTEXT_DOMAIN),
			 "param_name" => "margin_bottom",
			 "value" => '',
			 "description" => __("Margin bottom, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Padding Top", GETTEXT_DOMAIN),
			 "param_name" => "padding_top",
			 "value" => '',
			 "description" => __("Padding top, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Padding Bottom", GETTEXT_DOMAIN),
			 "param_name" => "padding_bottom",
			 "value" => '',
			 "description" => __("Padding bottom, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),

   )
));

?>