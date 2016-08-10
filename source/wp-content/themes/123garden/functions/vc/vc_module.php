<?php

// v1.1.8

function vc_module_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'image' => '',
      'image_size' => '',
      'scale' => '',
      'title' => '',
      'title_font_size' => '',
      'url' => '',
      'badge_text' => '',
      'badge_color' => '',
      
   ), $atts ) );
   
	if ( empty( $title_font_size ) ) {
		$title_font_size = '24px';
	}
   
   	if(!$image_size){
	   	$image_size = 'thumbnail';
   	}
   
	$img = lpd_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $image_size, 'class' => "img-responsive" ) );
 
	$out = '';
	$no_scale = '';
	
	if($title_font_size=="36px"){
		$title_font_size = " class='large'";
	}else{
		$title_font_size = "";
	}
	
	if($title){
		$title='<h3'.$title_font_size.'>'.esc_html($title).'</h3>';
	}
	
	if($badge_text){
		$badge_text='<span class="lpd-badge" style="background-color:'.esc_attr($badge_color).';">'.esc_html($badge_text).'</span>';
	}
	
	if($title){
		$module_content='<span class="module_content"><table><tbody><tr><td style="vertical-align:middle">'.$title.'<div class="sep-border"></div></td></tr></tbody></table></span>';
	}
	
	if($scale){
		$no_scale=' module-no-scale';
	}
	
	$out .= '<a href="'.esc_url($url).'" class="lpd-module'.esc_attr($no_scale).'">'.$badge_text.''.$img['thumbnail'].''.$module_content.'</a>';
	
    return $out;
}
add_shortcode( 'vc_module', 'vc_module_func' );


vc_map(array(
   "name" => __("Module", GETTEXT_DOMAIN),
   "base" => "vc_module",
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
			 "heading" => __("Image Size", GETTEXT_DOMAIN),
			 "param_name" => "image_size",
			 "value" => "",
			 "description" => __("Enter image size. Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", GETTEXT_DOMAIN)
		),  
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Thumbnail Scale", GETTEXT_DOMAIN),
	      "param_name" => "scale",
	      "description" => __("If selected, thumbnail scale will be disabled.", GETTEXT_DOMAIN),
	      "value" => Array(__("disable", GETTEXT_DOMAIN) => 'disable')
	    ),
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Title", GETTEXT_DOMAIN),
			 "param_name" => "title",
			 "value" => __("Lorem Imsum Dolor", GETTEXT_DOMAIN),
			 "description" => __("Enter your title.", GETTEXT_DOMAIN)
		),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Title font size", GETTEXT_DOMAIN),
	      "param_name" => "title_font_size",
	      "value" => array( "24px" => "24px", "36px" => "36px"),
	      "description" => __("Select title font size.", GETTEXT_DOMAIN)
	    ),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Url (link)", GETTEXT_DOMAIN),
			 "param_name" => "url",
			 "value" => "",
			 "description" => __("Module link.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Badge Text", GETTEXT_DOMAIN),
			 "param_name" => "badge_text",
			 "value" => "",
			 "description" => __("Enter your content if you want to display your badget.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Badge Color", GETTEXT_DOMAIN),
			"param_name" => "badge_color",
			"value" => '#fdb813',
			"description" => __("Choose badge color.", GETTEXT_DOMAIN)
		)
   )
));

?>