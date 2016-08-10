<?php

// v1.1.8

function vc_intro_container_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'icon' => '',
      'title' => '',
      'container_color' => '',
      'margin_top' => '',
      'title_font_weight' => '',
      'title_font_size' => '',
      'title_opacity' => '',
      'min_height' => ''
   ), $atts ) );
   
   	if ( empty( $title_font_weight ) ) {
		$title_font_weight = '300';
	}
   
   $icon = wp_get_attachment_image_src( $icon, 'full' );
   
   $background_color = 'background-color:'.esc_attr($container_color).'';
   $title_font_size = 'font-size:'.esc_attr($title_font_size).'px;';
   $title_font_weight = 'font-weight:'.esc_attr($title_font_weight).';';
   
   if($container_color){
	   $styles = ' style="'.$background_color.'"';
   }
   
   if($title_font_size||$title_font_weight){
	   $styles_h4 = ' style="'.$title_font_weight.''.$title_font_size.'"';
   }
   
   ob_start();?>
   
	<div class="intro-container"<?php if($margin_top){?> style="margin-top:<?php echo esc_attr($margin_top);?>px"<?php } ?>>
		<div class="ic-col">
			<?php if($title||$icon){?>
				<div class="ic-title<?php if($icon){?> ic-title-with-icon<?php } ?><?php if($title_opacity){?> ic-title-opacity<?php } ?>"<?php echo $styles;?>>
					<?php if($icon){?>
						<div class="ic-icon">
							<img class="ic-icon-img" alt="" src="<?php echo esc_url($icon[0]);?>">
						</div>
					<?php } ?>
					<?php if($title){?>
						<h4<?php echo $styles_h4;?>><?php echo esc_html($title);?></h4>
					<?php } ?>
				</div>
			<?php } ?>
			<div class="ic-content"<?php if($min_height){?> style="min-height:<?php echo $min_height;?>px;"<?php } ?>><?php echo do_shortcode($content); ?></div>
		</div>
	</div>

   <?php return ob_get_clean();
}
add_shortcode( 'vc_intro_container', 'vc_intro_container_func' );

	vc_map(array(
		"name" => __("Intro Container", GETTEXT_DOMAIN),
		"base" => "vc_intro_container",
		"class" => "",
		"icon" => "icon-wpb-lpd",
		"as_parent" => array('except' => 'vc_intro_container'),
		"content_element" => true,
		"controls" => "full",
		"show_settings_on_create" => true,
		"params" => array(
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Container Color", GETTEXT_DOMAIN),
				"param_name" => "container_color",
				"value" => "#1a74b1",
				"description" => __("Select container color.", GETTEXT_DOMAIN),
			),
			array(
				 "type" => "textarea",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Title", GETTEXT_DOMAIN),
				 "param_name" => "title",
				 "value" => '',
				 "description" => __("Enter your title.", GETTEXT_DOMAIN)
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
		      "type" => "attach_image",
		      "heading" => __("Icon", GETTEXT_DOMAIN),
		      "param_name" => "icon",
		      "value" => "",
		      "description" => __("Select icon from media library.", GETTEXT_DOMAIN)
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
				"type" => 'checkbox',
				"heading" => __("Title Opacity", GETTEXT_DOMAIN),
				"param_name" => "title_opacity",
				"description" => __("Check, if you want to enable opacity of the title.", GETTEXT_DOMAIN),
				"value" => Array(__("Enable", GETTEXT_DOMAIN) => 'enable')
			),
			array(
				 "type" => "textfield",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Minimal Height", GETTEXT_DOMAIN),
				 "param_name" => "min_height",
				 "value" => '',
				 "description" => __("Minimal height of container, only integers (ex: 100, 150, 300).", GETTEXT_DOMAIN)
			),
		
		),
		"js_view" => 'VcColumnView'
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_vc_intro_container extends WPBakeryShortCodesContainer {
		}
	}

?>