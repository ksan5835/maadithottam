<?php

// v1.1.8

function vc_icon_banner_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      'content_color' => '',
      'content_font_weight' => '',
      'sub_title' => '',	
      'bn_text' => '',
      'link' => '',
      'type' => '',
      'size' => '',
	  'icon_img' => '',
      'img_width' => '',
      'design_icon' => '',
      'icon_color_bg' => '',
      'icon_color_bg_hover' => '',
      'icon_border_style' => '',
      'icon_color_border' => '',
      'icon_color_border_hover' => '',
      'icon_border_size' => '',
      'icon_border_radius' => '',
      'icon_border_spacing' => '',
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
	if ( empty( $icon_border_style ) ) {
		$icon_border_style = '';
	}
   
   $icon_img = wp_get_attachment_image_src( $icon_img, 'full' );
   
	$icon_styles='';
	
	if($img_width){
		$icon_styles = ' style="';
		if($img_width){$icon_styles .= 'font-size:'.$img_width.'px;';}
		if($design_icon){
			if($icon_border_size){$icon_styles .= 'border-width:'.esc_attr($icon_border_size).'px;';}	
			if($icon_color_bg){$icon_styles .= 'background-color:'.esc_attr($icon_color_bg).';';}
			if($icon_border_style){$icon_styles .= 'border-style:'.esc_attr($icon_border_style).';';}
			if($icon_color_border){$icon_styles .= 'border-color:'.esc_attr($icon_color_border).';';}
			if($icon_border_radius){$icon_styles .= 'border-radius:'.esc_attr($icon_border_radius).'px;';}
			if($icon_border_spacing){$icon_styles .= 'padding:'.esc_attr($icon_border_spacing).'px;';}
		}
		$icon_styles .= '"';
	}
	
	if($icon_color_bg_hover||$icon_color_border_hover){
	
		global $shortcode_atts;
		
		$shortcode_atts = array(
			'icon_color_bg_hover' => $icon_color_bg_hover,
			'icon_color_border_hover' => $icon_color_border_hover,
		);
		
		global $the_vc_icon_banner_ID;
		
		$the_vc_icon_banner_ID = rand();
		
	}
 
   $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
   
   ob_start();?>
   
   <div class="lpd-icon-banner<?php if(!$right_border){?> lib-border-right<?php } ?>">
	   <?php if($icon_img){?>
	   <div class="lpd_icon_banner_icon<?php if($icon_color_bg_hover||$icon_color_border_hover){?> lpd_icon_banner_icon-<?php echo esc_attr($the_vc_icon_banner_ID);?><?php } ?>">
		   <span class="lpd-wrap-icon">
			   <div class="lpd-img-wrap-icon"<?php echo $icon_styles ;?>>
				   <img class="lpd-img-icon" src="<?php echo esc_url($icon_img[0]) ;?>">
			   </div>
		  </span>
	   </div>
	   <?php } ?>
	   <?php if($title){?><h3><?php echo esc_html($title); ?></h3><?php } ?>
	   <?php if($content){?><p class="lpd-b-content" style="color:<?php echo esc_attr($content_color); ?>;font-weight:<?php echo esc_attr($content_font_weight); ?>;"><?php echo $content; ?></p><?php } ?>
	   <?php if($bn_text){?><a class="btn btn-vc btn-<?php echo esc_attr($type); ?> btn-<?php echo esc_attr($size); ?>" href="<?php echo esc_url($link); ?>"><?php echo esc_html($bn_text); ?></a><?php } ?>
   </div>
   
	<?php
	if($icon_color_bg_hover||$icon_color_border_hover){ 
		$counter_js = new vc_icon_banner_class();
		
		$counter_js->vc_icon_banner_callback();
	}	
	?>
   
   <?php return ob_get_clean();

}
add_shortcode( 'vc_icon_banner', 'vc_icon_banner_func' );

class vc_icon_banner_class
{
    protected static $var = '';

    public static function vc_icon_banner_callback(){
    
	global $the_vc_icon_banner_ID;
	
	global $shortcode_atts;
	
	$icon_color_bg_hover = $shortcode_atts['icon_color_bg_hover'];
	$icon_color_border_hover = $shortcode_atts['icon_color_border_hover'];
	
		ob_start();?>
		
		<style>
			.lpd-icon-banner:hover .lpd_icon_banner_icon-<?php echo $the_vc_icon_banner_ID;?> .lpd-img-wrap-icon{
				<?php if($icon_color_bg_hover){?>background-color: <?php echo $icon_color_bg_hover; ?> !important;<?php } ?>
				<?php if($icon_color_border_hover){?>border-color: <?php echo $icon_color_border_hover; ?> !important;<?php } ?>
			}
		</style>

		
		<?php $script = ob_get_clean();

        self::$var[] = $script;

        add_action( 'wp_footer', array ( __CLASS__, 'footer' ), 20 );         
    }

	public static function footer() 
	{
	    foreach( self::$var as $script ){
	        echo $script;
	    }
	}

}

vc_map(array(
   "name" => __("Icon Banner", GETTEXT_DOMAIN),
   "base" => "vc_icon_banner",
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
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => "",
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
			 "heading" => __("Button Text", GETTEXT_DOMAIN),
			 "param_name" => "bn_text",
			 "value" => "",
			 "description" => __("Text on the button.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Url (link)", GETTEXT_DOMAIN),
			 "param_name" => "link",
			 "value" => "",
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
			"type" => 'checkbox',
			"heading" => __("Enable Icon", GETTEXT_DOMAIN),
			"param_name" => "enable_icon",
			"description" => __("Enable custom icon.", GETTEXT_DOMAIN),
			"value" => Array(__("Enable", GETTEXT_DOMAIN) => 'enable')
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => __("Upload Image Icon:", GETTEXT_DOMAIN),
			"param_name" => "icon_img",
			"admin_label" => true,
			"value" => "",
			"description" => __("Upload the custom image icon.", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "enable_icon","value" => "enable"),
		),
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Image Width", GETTEXT_DOMAIN),
			"param_name" => "img_width",
			"value" => 48,
			"min" => 16,
			"max" => 512,
			"suffix" => "px",
			"description" => __("Provide image width", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "enable_icon","value" => "enable"),
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Design Your Own Icon", GETTEXT_DOMAIN),
			"param_name" => "design_icon",
			"description" => __("Design your own custom icon.", GETTEXT_DOMAIN),
			"value" => Array(__("Yes", GETTEXT_DOMAIN) => 'enable')
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Background Color", GETTEXT_DOMAIN),
			"param_name" => "icon_color_bg",
			"value" => "#ffffff",
			"description" => __("Select background color for icon.", GETTEXT_DOMAIN),	
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Hover Background Color", GETTEXT_DOMAIN),
			"param_name" => "icon_color_bg_hover",
			"value" => "#ffffff",
			"description" => __("Select hover background color for icon.", GETTEXT_DOMAIN),	
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon Border Style", GETTEXT_DOMAIN),
			"param_name" => "icon_border_style",
			"value" => array(
				"None"=> "",
				"Solid"=> "solid",
				"Dashed" => "dashed",
				"Dotted" => "dotted",
				"Double" => "double",
				"Inset" => "inset",
				"Outset" => "outset",
			),
			"description" => __("Select the border style for icon.",GETTEXT_DOMAIN),
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Border Color", GETTEXT_DOMAIN),
			"param_name" => "icon_color_border",
			"value" => "#555555",
			"description" => __("Select border color for icon.", GETTEXT_DOMAIN),	
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Hover Border Color", GETTEXT_DOMAIN),
			"param_name" => "icon_color_border_hover",
			"value" => "#555555",
			"description" => __("Select hover border color for icon.", GETTEXT_DOMAIN),	
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Border Width", GETTEXT_DOMAIN),
			"param_name" => "icon_border_size",
			"value" => 1,
			"min" => 1,
			"max" => 10,
			"suffix" => "px",
			"description" => __("Thickness of the border.", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Border Radius", GETTEXT_DOMAIN),
			"param_name" => "icon_border_radius",
			"value" => 500,
			"min" => 1,
			"max" => 500,
			"suffix" => "px",
			"description" => __("0 pixel value will create a square border. As you increase the value, the shape convert in circle slowly. (e.g 500 pixels).", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "design_icon","value" => "enable"),
		),
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Background Size", GETTEXT_DOMAIN),
			"param_name" => "icon_border_spacing",
			"value" => 50,
			"min" => 30,
			"max" => 500,
			"suffix" => "px",
			"description" => __("Spacing from center of the icon till the boundary of border / background", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "design_icon","value" => "enable"),
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