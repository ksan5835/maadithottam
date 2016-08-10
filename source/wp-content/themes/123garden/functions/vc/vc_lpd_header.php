<?php

// v1.1.8

function vc_lpd_header_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => '',
      'title_color' => '',
      'title_font_weight' => '',
      'title_font_size' => '',
      'separator' => '',
      'separator_color' => '',
      'content_color' => '',
      'alignment' => '',
      'margin_top' => '',
      'margin_bottom' => '',
      'font_type' => '',
      'letter_spacing' => '',
      'line_height' => '',
      'icon_img' => '',
      'img_width' => '',
      'icon_color_bg' => '',
      'icon_color_bg_hover' => '',
      'icon_border_style' => '',
      'icon_color_border' => '',
      'icon_color_border_hover' => '',
      'icon_border_size' => '',
      'icon_border_radius' => '',
      'icon_border_spacing' => '',
      'icon_link' => '',
      'icon_align' => '',
      'icon_margin_bottom' => '',
   ), $atts ) );
   

	if ( empty( $title_font_weight ) ) {
		$title_font_weight = '300';
	}
	if ( empty( $separator ) ) {
		$separator = '';
	}
	if ( empty( $alignment ) ) {
		$alignment = 'left';
	}
	if ( empty( $font_type ) ) {
		$font_type = '';
	}
	if ( empty( $icon_border_style ) ) {
		$icon_border_style = '';
	}
	if ( empty( $icon_align ) ) {
		$icon_align = 'center';
	}
   
   $icon_img = wp_get_attachment_image_src( $icon_img, 'full' );
 
   $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content

	if($margin_top){$margin_top = 'margin-top:'.esc_attr($margin_top).'px;';}
	if($margin_bottom){$margin_bottom = 'margin-bottom:'.esc_attr($margin_bottom).'px;';}
	if($separator_color){$separator_color = 'background-color:'.esc_attr($separator_color).';';}
	
	$styles = $color = '';
	
	if($margin_top||$margin_bottom||$separator_color){$styles = ' style="'.$margin_top.''.$margin_bottom.''.$separator_color.'"';}
	if($content_color||$letter_spacing){
		$content_styles = ' style="';
		if($content_color){$content_styles .= 'color:'.esc_attr($content_color).';';}
		if($letter_spacing){$content_styles .= 'letter-spacing:'.esc_attr($letter_spacing).'px;';}
		if($line_height){$content_styles .= 'line-height:'.esc_attr($line_height).'px;';}
		$content_styles .= '"';
	}
	if($alignment){$alignment = ' style="text-align:'.esc_attr($alignment).';"';}

	$icon_link = ( $icon_link == '||' ) ? '' : $icon_link;
	$icon_link = vc_build_link( $icon_link );
	
	$icon_link_url = $icon_link['url'];
	$icon_link_title = $icon_link['title'];
	$icon_link_target = $icon_link['target'];
	
	$icon_styles='';
	
	if($img_width){
		$icon_styles = ' style="';
		if($img_width){$icon_styles .= 'font-size:'.esc_attr($img_width).'px;';}		
		if($icon_color_bg){$icon_styles .= 'background-color:'.esc_attr($icon_color_bg).';';}
		if($icon_border_style){$icon_styles .= 'border-style:'.esc_attr($icon_border_style).';';}
		if($icon_color_border){$icon_styles .= 'border-color:'.esc_attr($icon_color_border).';';}
		if($icon_border_size){$icon_styles .= 'border-width:'.esc_attr($icon_border_size).'px;';}
		if($icon_border_radius){$icon_styles .= 'border-radius:'.esc_attr($icon_border_radius).'px;';}
		if($icon_border_spacing){$icon_styles .= 'padding:'.esc_attr($icon_border_spacing).'px;';}
		if($icon_margin_bottom){$icon_styles .= 'margin-bottom:'.esc_attr($icon_margin_bottom).'px;';}
		$icon_styles .= '"';
	}
	
	if($icon_color_bg_hover||$icon_color_border_hover){
	
		global $shortcode_atts;
		
		$shortcode_atts = array(
			'icon_color_bg_hover' => $icon_color_bg_hover,
			'icon_color_border_hover' => $icon_color_border_hover,
		);
		
		global $the_lpd_header_ID;
		
		$the_lpd_header_ID = rand();
		
	}
	
   $title_font_size = 'font-size:'.esc_attr($title_font_size).'px;';
   $title_font_weight = 'font-weight:'.esc_attr($title_font_weight).';';
   $title_color = 'color:'.esc_attr($title_color).';';
	
   if($title_font_size||$title_font_weight||$title_color){
	   $styles_h3 = ' style="'.$title_font_weight.''.$title_font_size.''.$title_color.'"';
   }
   
   ob_start();?>
   
   <div class="lpd-header"<?php echo $alignment ;?>>
	   <?php if($icon_img){?>
	   <div class="lpd-align-icon<?php if($icon_color_bg_hover||$icon_color_border_hover){?> lpd-header-icon-<?php echo $the_lpd_header_ID;?><?php } ?>"<?php if($icon_align){?> style="text-align:<?php echo esc_attr($icon_align);?>;"<?php } ?>>
		   <?php if($icon_link_url){?><a href="<?php echo esc_url($icon_link_url) ;?>" class="lpd-href-icon" title="<?php echo esc_attr($icon_link_title) ;?>" target="<?php echo esc_attr($icon_link_target) ;?>"><?php } else{ ?><span class="lpd-wrap-icon"><?php } ?>
			   <div class="lpd-img-wrap-icon"<?php echo $icon_styles ;?>>
				   <img class="lpd-img-icon" src="<?php echo esc_attr($icon_img[0]) ;?>">
			   </div>
		  <?php if($icon_link){?></a><?php } else{ ?></span><?php } ?>
	   </div>
	   <?php } ?>
	   <?php if($title){?><h3<?php echo $styles_h3;?>><?php echo esc_html($title); ?></h3><?php } ?>
	   <?php if($separator){?><div class="deco-sep-line-<?php echo esc_attr($separator); ?>"<?php echo $styles; ?>></div><?php } ?>
	   <?php if($content){?><div class="lpd_header_content<?php if($font_type){ echo ' '.esc_attr($font_type); }?>"<?php echo $content_styles; ?>><?php echo $content; ?></div><?php } ?>
   </div>
   
	<?php
	if($icon_color_bg_hover||$icon_color_border_hover){ 
		$counter_js = new lpd_header_class();
		
		$counter_js->lpd_header_callback();
	}	
	?>
   
   <?php return ob_get_clean();

}
add_shortcode( 'vc_lpd_header', 'vc_lpd_header_func' );


class lpd_header_class
{
    protected static $var = '';

    public static function lpd_header_callback(){
    
	global $the_lpd_header_ID;
	
	global $shortcode_atts;
	
	$icon_color_bg_hover = $shortcode_atts['icon_color_bg_hover'];
	$icon_color_border_hover = $shortcode_atts['icon_color_border_hover'];
	
		ob_start();?>
		
		<style>
			.lpd-header:hover .lpd-header-icon-<?php echo $the_lpd_header_ID;?> .lpd-img-wrap-icon{
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
   "name" => __("LPD Header", GETTEXT_DOMAIN),
   "base" => "vc_lpd_header",
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
			 "heading" => __("Title Font Size", GETTEXT_DOMAIN),
			 "param_name" => "title_font_size",
			 "value" => '',
			 "description" => __("Font Size, only integers (ex: 16, 18, 20).", GETTEXT_DOMAIN)
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
			"value" => '#ffcc66',
			"description" => __("Choose title color.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Separator Margin Top", GETTEXT_DOMAIN),
			 "param_name" => "margin_top",
			 "value" => '',
			 "description" => __("Separator margin top, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Separator Margin Bottom", GETTEXT_DOMAIN),
			 "param_name" => "margin_bottom",
			 "value" => '',
			 "description" => __("Separator margin bottom, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Alignment", GETTEXT_DOMAIN),
			"param_name" => "alignment",
			"value" => array(		
__('Left', GETTEXT_DOMAIN) => "left",
__('Center', GETTEXT_DOMAIN) => "center",
__('Right', GETTEXT_DOMAIN) => "right",
			),
			"description" => __("Select the alignment for title and separator.", GETTEXT_DOMAIN)
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
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content Color", GETTEXT_DOMAIN),
			"param_name" => "content_color",
			"value" => '#555',
			"description" => __("Choose content color.", GETTEXT_DOMAIN)
		),
		array(
			"type" => "dropdown",
			"heading" => __("Font Type", GETTEXT_DOMAIN),
			"param_name" => "font_type",
			"value" => array(		
__('Type 1', GETTEXT_DOMAIN) => "",
__('Type 2', GETTEXT_DOMAIN) => "font_type_2",
			),
			"description" => __("Select font type.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Letter Spacing", GETTEXT_DOMAIN),
			 "param_name" => "letter_spacing",
			 "value" => '',
			 "description" => __("Letter spacing for the content, only integers (ex: 0.75, 1, 3,).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Line Height", GETTEXT_DOMAIN),
			 "param_name" => "line_height",
			 "value" => '',
			 "description" => __("Line height for the content (in pixels), only integers (ex: 20, 24, 30,).", GETTEXT_DOMAIN)
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
			"type" => "vc_link",
			"class" => "",
			"heading" => __("Link ",GETTEXT_DOMAIN),
			"param_name" => "icon_link",
			"value" => "",
			"dependency" => Array("element" => "enable_icon","value" => "enable"),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Alignment", GETTEXT_DOMAIN),
			"param_name" => "icon_align",
			"value" => array(
				"Center"	=>	"center",
				"Left"		=>	"left",
				"Right"		=>	"right"
			),
			"description" => __("Icon Alignment", GETTEXT_DOMAIN),
			"dependency" => Array("element" => "enable_icon","value" => "enable"),
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon Margin Bottom", GETTEXT_DOMAIN),
			 "param_name" => "icon_margin_bottom",
			 "value" => '',
			 "description" => __("Icon margin bottom, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN)
		),
   )
));

?>