<?php

// v1.1.8

function mega_header_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      'title_font_size' => '',
      'title_font_weight' => '',
      'title_color' => '',
      'separator' => '',
      'separator_color' => '',
      'description' => '',
      'description_font_size' => '',
      'description_font_weight' => '',
      'description_letter_spacing' => '',
      'description_color' => '',
      'description_font_style' => '',
      'sub_title' => '',
      'sub_title_font_size' => '',
      'sub_title_font_style' => '',
      'sub_title_font_weight' => '',
      'sub_title_letter_spacing' => '',
      'sub_title_color' => '',
      'padding_top' => '',
      'padding_bottom' => '',
      'margin_top' => '',
      'margin_bottom' => '',
      'bg_color' => '',
   ), $atts ) );
   

	if ( empty( $title_font_size ) ) {
		$title_font_size = '36px';
	}
	if ( empty( $title_font_weight ) ) {
		$title_font_weight = '300';
	}
	if ( empty( $separator ) ) {
		$separator = '';
	}
	if ( empty( $description_font_size ) ) {
		$description_font_size = '14px';
	}
	if ( empty( $description_font_weight ) ) {
		$description_font_weight = '300';
	}
	if ( empty( $sub_title_font_size ) ) {
		$sub_title_font_size = '13px';
	}
	if ( empty( $sub_title_font_weight ) ) {
		$sub_title_font_weight = '300';
	}
	if ( empty( $sub_title_font_style ) ) {
		$sub_title_font_style = 'normal';
	}
   
   	$out = '';
   	
   	if($title_font_size){$title_font_size = 'font-size:'.esc_attr($title_font_size).';';}
   	if($title_font_weight){$title_font_weight = 'font-weight:'.esc_attr($title_font_weight).';';}
   	if($title_color){$title_color = 'color:'.esc_attr($title_color).';';}
   	
   	if($description_font_size){$description_font_size = 'font-size:'.esc_attr($description_font_size).';';}
   	if($description_font_weight){$description_font_weight = 'font-weight:'.esc_attr($description_font_weight).';';}
   	if($description_color){$description_color = 'color:'.esc_attr($description_color).';';}
   	if($description_letter_spacing!=""){$description_letter_spacing = 'letter-spacing:'.esc_attr($description_letter_spacing).'px;';}
   	
   	if($sub_title_font_size){$sub_title_font_size = 'font-size:'.esc_attr($sub_title_font_size).';';}
   	if($sub_title_font_weight){$sub_title_font_weight = 'font-weight:'.esc_attr($sub_title_font_weight).';';}
   	if($sub_title_color){$sub_title_color = 'color:'.esc_attr($sub_title_color).';';}
   	if($sub_title_letter_spacing){$sub_title_letter_spacing = 'letter-spacing:'.esc_attr($sub_title_letter_spacing).'px;';}
   	if($sub_title_font_style){$sub_title_font_style = 'font-style:'.esc_attr($sub_title_font_style).';';}
   	
	if($padding_top){$padding_top = 'padding-top:'.esc_attr($padding_top).'px;';}
	if($padding_bottom){$padding_bottom = 'padding-bottom:'.esc_attr($padding_bottom).'px;';}

	if($margin_top){$margin_top = 'margin-top:'.esc_attr($margin_top).'px;';}
	if($margin_bottom){$margin_bottom = 'margin-bottom:'.esc_attr($margin_bottom).'px;';}
	
	if($bg_color){ $bg_color = 'background-color:'.esc_attr($bg_color).';';}

   	$out .= '<div class="mega_header" style='.$padding_top.''.$padding_bottom.''.$margin_top.''.$margin_bottom.''.$bg_color.'>';
   	
   	if($sub_title){
   		$out .= '<p class="sub-title" style="'.$sub_title_font_size.''.$sub_title_font_weight.''.$sub_title_color.''.$sub_title_letter_spacing.''.$sub_title_font_style.'">'.esc_html($sub_title).'</p>';
   	}
   	
   	if($title){
   		$out .= '<h2 style="'.$title_font_size.''.$title_font_weight.''.$title_color.'">'.esc_html($title).'</h2>';
   	}
   	
   	if($separator){
   		$out .= '<div style="background-color:'.esc_attr($separator_color).';" class="deco-sep-line-'.esc_attr($separator).'"></div>';
   	}
   	
   	$mh_font_style = '';
   	
   	if($description_font_style){ 
   	
   	$mh_font_style = ' mh-font-style';
   	
   	}
   	
   	if($description){
   		$out .= '<div class="mh_description'.$mh_font_style.'" style="'.$description_font_size.''.$description_font_weight.''.$description_color.''.$description_letter_spacing.'">'.$description.'</div>';
   	}
   	
    $out .= '</div>';
    
    return $out;		
    
}
add_shortcode( 'vc_mega_header', 'mega_header_func' );

vc_map(array(
   "name" => __("Mega Header", GETTEXT_DOMAIN),
   "base" => "vc_mega_header",
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
			 "value" => "",
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
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Sub-title", GETTEXT_DOMAIN),
			 "param_name" => "sub_title",
			 "value" => "",
			 "description" => __("Enter your sub-title.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Sub-title Font Size", GETTEXT_DOMAIN),
			"param_name" => "sub_title_font_size",
			"value" => array(
				"13px" => "13px",		
				"14px" => "14px",
				"16px" => "16px",
				"18px" => "18px",
			),
			"description" => __("Select sub-title font size.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Sub-title Font Weight", GETTEXT_DOMAIN),
			"param_name" => "sub_title_font_weight",
			"value" => array(
				"300" => "300",
				"400" => "400",	
				"500" => "500",
				"700" => "700",
				"900" => "900",		
			),
			"description" => __("Select sub-title font weight.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Sub-title Letter Spacing", GETTEXT_DOMAIN),
			 "param_name" => "sub_title_letter_spacing",
			 "value" => '',
			 "description" => __("Letter spacing for sub-title, only integers (ex: 0.75, 1, 3,).", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Sub-title Color", GETTEXT_DOMAIN),
			"param_name" => "sub_title_color",
			"value" => 'rgba(0, 0, 0, 0.42)',
			"description" => __("Choose sub-title color.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Sub-title Font Style", GETTEXT_DOMAIN),
			"param_name" => "sub_title_font_style",
			"value" => array(
				__('normal', GETTEXT_DOMAIN) => "normal",
				__('italic', GETTEXT_DOMAIN) => "italic",
			),
			"description" => __("Select sub-title font style.", GETTEXT_DOMAIN)
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
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Background Color", GETTEXT_DOMAIN),
			"param_name" => "bg_color",
			"value" => '',
			"description" => __("Choose background color.", GETTEXT_DOMAIN)
		)
   )
));
	
?>