<?php

function vc_icon_separator_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'border_color' => '',
      'icon' => ''
   ), $atts ) );
   
   $icon = wp_get_attachment_image_src( $icon, 'full' );
   
   ob_start();?>
   
	<?php if($border_color&&$icon){?>
	<div class="is-icon" style="border-color:<?php echo esc_attr($border_color);?>;">
		<img class="is-icon-img" alt="" src="<?php echo esc_url($icon[0]);?>">
	</div>
	<?php } ?>

   <?php return ob_get_clean();
}
add_shortcode( 'vc_icon_separator', 'vc_icon_separator_func' );


vc_map(array(
   "name" => __("Icon Separator", GETTEXT_DOMAIN),
   "base" => "vc_icon_separator",
   "class" => "",
   "icon" => "icon-wpb-lpd",
   "category" => __('Content', GETTEXT_DOMAIN),
   'admin_enqueue_js' => "",
   'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/assets/vc_extend.css'),
   "params" => array(
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Border Color", GETTEXT_DOMAIN),
			"param_name" => "border_color",
			"value" => "#96ca42",
			"description" => __("Select border color for icon.", GETTEXT_DOMAIN),
		),
	    array(
	      "type" => "attach_image",
	      "heading" => __("Icon", GETTEXT_DOMAIN),
	      "param_name" => "icon",
	      "value" => "",
	      "description" => __("Select icon from media library.", GETTEXT_DOMAIN)
	    ),
   )
));

?>