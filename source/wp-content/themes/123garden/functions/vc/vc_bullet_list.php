<?php

// v1.1.8

function vc_bullet_list_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'image' => '',
      'style' => '',
   ), $atts ) );
   
	if ( empty( $style ) ) {
		$style = '';
	}
   
	$image_cropped = wp_get_attachment_image_src( $image, 'thumbnail' );
	
	
	if($image){
		$image = '<img class="lpd_bullet_img" src="'.esc_url($image_cropped[0]).'"/>';
	}

   ob_start();?>
   

	<?php
    $graph_lines = explode( ",", $content );
    
    $output= '';
    $output .= '<ul class="lpd-bullet-list';
    if($image){
    	$output .= ' lpd-bl-custom-icon';    
    }
    if($style){
    	$output .= ' '.esc_attr($style);    
    }
    $output .= '">';
    
    foreach ($graph_lines as $line) {
        if($line){

			$output .= '<li>';
			$output .= $image;
			$output .= $line;
			$output .= '</li>';
            
        }
    }
    
    $output .= '</ul>';
    echo $output;
    ?>
				        

   <?php return ob_get_clean();
}
add_shortcode( 'vc_bullet_list', 'vc_bullet_list_func' );


vc_map(array(
   "name" => __("Bullet List", GETTEXT_DOMAIN),
   "base" => "vc_bullet_list",
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
	      "type" => "dropdown",
	      "heading" => __("List Style", GETTEXT_DOMAIN),
	      "param_name" => "style",
	      "value" => array( 'Style 1' => '', 'Style 2' => 'lpd-bl-style2', 'Style 3' => 'lpd-bl-style3'),
	      "description" => __("Select list style.", GETTEXT_DOMAIN)
	    ),
		array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content", GETTEXT_DOMAIN),
			 "param_name" => "content",
			 "value" => "",
			 "description" => __("Enter your content separated by comma (ex: red, green, yellow).", GETTEXT_DOMAIN)
		),
   )
));

?>