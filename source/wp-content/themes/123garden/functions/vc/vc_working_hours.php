<?php

function vc_working_hours_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'monday_time' => '',
      'tuesday_time' => '',
      'wednesday_time' => '',
      'thursday_time' => '',
      'friday_time' => '',
      'saturday_time' => '',
      'sunday_time' => '',
      'workweek' => '',
      'weekend' => '',
      'holidays' => '',
      
   ), $atts ) );
 
   $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
   
   ob_start();?>
   
    <div class="working-time">
        <ul>
			<?php if($workweek||$monday_time||$tuesday_time||$wednesday_time||$thursday_time||$friday_time||$saturday_time||$sunday_time){?>
				<?php if($workweek){?><li><span><?php esc_html_e("Workweek", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($workweek); ?></span></li><?php } ?>
				<?php if($monday_time){?><li><span><?php esc_html_e("Monday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($monday_time); ?></span></li><?php } ?>
				<?php if($tuesday_time){?><li><span><?php esc_html_e("Tuesday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($tuesday_time); ?></span></li><?php } ?>
				<?php if($wednesday_time){?><li><span><?php esc_html_e("Wednesday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($wednesday_time); ?></span></li><?php } ?>
				<?php if($thursday_time){?><li><span><?php esc_html_e("Thursday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($thursday_time); ?></span></li><?php } ?>
				<?php if($friday_time){?><li><span><?php esc_html_e("Friday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($friday_time); ?></span></li><?php } ?>
				<?php if($weekend){?><li><span><?php esc_html_e("Weekend", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($weekend); ?></span></li><?php } ?>
				<?php if($saturday_time){?><li><span><?php esc_html_e("Saturday ", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($saturday_time); ?></span></li><?php } ?>
				<?php if($sunday_time){?><li><span><?php esc_html_e("Sunday", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($sunday_time); ?></span></li><?php } ?>
				<?php if($holidays){?><li><span><?php esc_html_e("Holidays", GETTEXT_DOMAIN); ?>:</span><span class="right"><?php echo esc_html($holidays); ?></span></li><?php } ?>
			<?php } ?>
        </ul>
    </div>

   <?php return ob_get_clean();
}
add_shortcode( 'vc_working_hours', 'vc_working_hours_func' );


vc_map(array(
   "name" => __("Working Hours", GETTEXT_DOMAIN),
   "base" => "vc_working_hours",
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
			 "heading" => __("Monday", GETTEXT_DOMAIN),
			 "param_name" => "monday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Tuesday", GETTEXT_DOMAIN),
			 "param_name" => "tuesday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Wednesday", GETTEXT_DOMAIN),
			 "param_name" => "wednesday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Thursday", GETTEXT_DOMAIN),
			 "param_name" => "thursday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Friday", GETTEXT_DOMAIN),
			 "param_name" => "friday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Saturday", GETTEXT_DOMAIN),
			 "param_name" => "saturday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Sunday", GETTEXT_DOMAIN),
			 "param_name" => "sunday_time",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Workweek", GETTEXT_DOMAIN),
			 "param_name" => "workweek",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Weekend", GETTEXT_DOMAIN),
			 "param_name" => "weekend",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Holidays", GETTEXT_DOMAIN),
			 "param_name" => "holidays",
			 "value" => "",
			 "description" => __("Enter the value (ex:  8am to 5pm).", GETTEXT_DOMAIN)
		),
   )
));

?>