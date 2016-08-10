<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array(
		array(
			'id'          => 'general_default',
			'title'       => __('General Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'header_meta',
			'title'       => __('Header Meta', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'header_content',
			'title'       => __('Header Contnet', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'header_sm',
			'title'       => __('Header Social Media', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'navigation',
			'title'       => __('Menu Options', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'typography',
			'title'       => __('Typography', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'seo_settings',
			'title'       => __('SEO Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'theme_options',
			'title'       => __('Theme Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'blog_options',
			'title'       => __('Blog Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'portfolio_options',
			'title'       => __('Portfolio Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'shop_options',
			'title'       => __('Shop Settings', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'footer_meta',
			'title'       => __('Footer Meta', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'footer_options',
			'title'       => __('Footer Options', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'animation_onscroll',
			'title'       => __('Animation Onscroll', GETTEXT_DOMAIN),
		),
    ),
    'settings'        => array(
       
    
	/*------------------------------------------------------------------
	General Settings
	-------------------------------------------------------------------*/

      array(
        'id'          => 'theme_style',
        'label'       => __('Theme Style', GETTEXT_DOMAIN),
        'desc'        => __('Select on of theme style.', GETTEXT_DOMAIN),
        'std'         => 'full-width',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'full',
            'label'       => __('Full width', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'boxed',
            'label'       => __('Boxed', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wpml_switcher',
        'label'       => __('WPML Switcher', GETTEXT_DOMAIN),
        'desc'        => __('Enable for displaying "WordPress Multilingual" switcher, "WPML Multilingual CMS" plugin must be activated.', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => __('Enable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom Css',
        'desc'        => 'Enter your custom css styles.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_js',
        'label'       => 'Custom Javascript',
        'desc'        => 'Enter your custom javascript.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

	/*------------------------------------------------------------------
	Header Meta
	-------------------------------------------------------------------*/

      array(
        'id'          => 'header_meta',
        'label'       => __('Header Meta', GETTEXT_DOMAIN),
        'desc'        => __('Disable for hiding header meta container.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hm_social_m_style',
        'label'       => __('Social Media Style', GETTEXT_DOMAIN),
        'desc'        => __('Select one of social media style', GETTEXT_DOMAIN),
        'std'         => 'style2',
        'type'        => 'select',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'style1',
            'label'       => __('Style 1', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'style2',
            'label'       => __('Style 2', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hm_custom_bg',
        'label'       => __('Meta Header Background', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for meta header background.', GETTEXT_DOMAIN),
        'std'         => '#f0bc00',
        'type'        => 'colorpicker',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hm_bottom_border',
        'label'       => __('Meta Header Bottom Border', GETTEXT_DOMAIN),
        'desc'        => __('Select one of meta header bottom border type', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'type1',
            'label'       => __('1px Solid', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type2',
            'label'       => __('2px Solid', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type3',
            'label'       => __('3px Solid', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type4',
            'label'       => __('1px Dashed', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type5',
            'label'       => __('2px Dashed', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type6',
            'label'       => __('3px Dashed', GETTEXT_DOMAIN),
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'header_meta_background',
        'label'       => __('Header Meta Background', GETTEXT_DOMAIN),
        'desc'        => __('Select header meta background type', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => __('none', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'pattern',
            'label'       => __('Theme Pattern', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'custom',
            'label'       => __('Custom', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hm_custom_pattern',
        'label'       => 'Custom Pattern',
        'desc'        => __('Upload custom pattern for header meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'left_headermeta',
        'label'       => __('Left Header Meta', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for left header meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_headermeta',
        'label'       => __('Right Header Meta', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for right header meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

	/*------------------------------------------------------------------
	Header Contnet
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'custom_logo',
        'label'       => 'Custom Logo',
        'desc'        => __('Upload a logo for your theme.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_logo_tm',
        'label'       => __('Custom Logo Top Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_logo_bm',
        'label'       => __('Custom Logo Bottom Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin bottom, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo_location',
        'label'       => __('Logo Location', GETTEXT_DOMAIN),
        'desc'        => __('Select one of logo locations.', GETTEXT_DOMAIN),
        'std'         => 'left',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'left',
            'label'       => __('Left', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'center',
            'label'       => __('Center', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'header_search',
        'label'       => __('Header Search Form', GETTEXT_DOMAIN),
        'desc'        => __('Select one search form type.', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'shop_search',
            'label'       => __('Shop search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme_search',
            'label'       => __('Theme search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'header_search_tm',
        'label'       => __('Header Search Form Top Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_social_m',
        'label'       => __('Header Social Media', GETTEXT_DOMAIN),
        'desc'        => __('&#8595; The options are available only for "Right Header" and "Left Header" locations.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_social_m_tm',
        'label'       => __('Header Social Media Top Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_message_box',
        'label'       => __('Header Message Box', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'message_box_location',
        'label'       => __('Message Box Location', GETTEXT_DOMAIN),
        'desc'        => __('Select one of message box locations.', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => __('Left', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'right',
            'label'       => __('Right', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'message_box_type',
        'label'       => __('Message Box Type', GETTEXT_DOMAIN),
        'desc'        => __('Select one of message box types.', GETTEXT_DOMAIN),
        'std'         => 'type1',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'type1',
            'label'       => __('Type 1', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type2',
            'label'       => __('Type 2', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type3',
            'label'       => __('Type 3', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type4',
            'label'       => __('Type 4', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'message_box_icon',
        'label'       => 'Message Box Icon',
        'desc'        => __('Upload an icon for message box.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'message_box_icon_bg',
        'label'       => __('Icon Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for icon background.', GETTEXT_DOMAIN),
        'std'         => '#66ab36',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'message_box_content',
        'label'       => __('Message Box Content', GETTEXT_DOMAIN),
        'desc'        => __('The content for message box.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'message_box_tm',
        'label'       => __('Message Box Top Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_delivery_c',
        'label'       => __('Delivery Container', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_delivery',
        'label'       => __('Delivery', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'dropdown',
            'label'       => __('Dropdown', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sp_top',
            'label'       => __('Sliding Panel (top)', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_delivery_font_style',
        'label'       => __('"Delivery" Button Font Style', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'italic',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'italic',
            'label'       => __('Italic', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'normal',
            'label'       => __('Normal', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_delivery_bg_dd',
        'label'       => __('Delivery Dowpdown Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Delivery" dropdown.', GETTEXT_DOMAIN),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_delivery_bg_sp',
        'label'       => __('Delivery Sliding Panel Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Delivery" sliding panel.', GETTEXT_DOMAIN),
        'std'         => '#363636',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_contact_c',
        'label'       => __('"Contact Us" Container', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_contact',
        'label'       => __('Contact Us', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'dropdown',
            'label'       => __('Dropdown', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sp_top',
            'label'       => __('Sliding Panel (top)', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_contact_font_style',
        'label'       => __('"Contact Us" Button Font Style', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'italic',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'italic',
            'label'       => __('Italic', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'normal',
            'label'       => __('Normal', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_contact_bg_dd',
        'label'       => __('Contact Dowpdown Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Contact" dropdown.', GETTEXT_DOMAIN),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_contact_bg_sp',
        'label'       => __('Contact Sliding Panel Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Contact" sliding panel.', GETTEXT_DOMAIN),
        'std'         => '#363636',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom1_c',
        'label'       => __('Custom 1 Container', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom1',
        'label'       => __('Custom 1', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'dropdown',
            'label'       => __('Dropdown', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sp_top',
            'label'       => __('Sliding Panel (top)', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_custom1_font_style',
        'label'       => __('"Custom 1" Button Font Style', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'italic',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'italic',
            'label'       => __('Italic', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'normal',
            'label'       => __('Normal', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_custom1_title',
        'label'       => __('Custom 1 Title', GETTEXT_DOMAIN),
        'desc'        => __('Enter the title for custom 1 button.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_1_icon',
        'label'       => 'Custom 1 Icon',
        'desc'        => __('Upload an icon for custom 1 button, recommended size 24x24px.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom1_css',
        'label'       => __('Custom 1, CSS Style', GETTEXT_DOMAIN),
        'desc'        => __("Use custom styles if your icon dimension doesn't fit.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_1_color',
        'label'       => __('Custom 1 Button Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for "Custom 1" button.', GETTEXT_DOMAIN),
        'std'         => '#f0bc00',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_1_color_hover',
        'label'       => __('Custom 1 Hover Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick hover color for "Custom 1" button.', GETTEXT_DOMAIN),
        'std'         => '#f8c400',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom1_bg_dd',
        'label'       => __('"Custom 1" Dowpdown Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Custom 1" dropdown.', GETTEXT_DOMAIN),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom1_bg_sp',
        'label'       => __('"Custom 1" Sliding Panel Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Custom 1" sliding panel.', GETTEXT_DOMAIN),
        'std'         => '#363636',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom2_c',
        'label'       => __('Custom 2 Container', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom2',
        'label'       => __('Custom 2', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'dropdown',
            'label'       => __('Dropdown', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sp_top',
            'label'       => __('Sliding Panel (top)', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_custom2_font_style',
        'label'       => __('"Custom 2" Button Font Style', GETTEXT_DOMAIN),
        'desc'        => '',
        'std'         => 'italic',
        'type'        => 'select',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'italic',
            'label'       => __('Italic', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'normal',
            'label'       => __('Normal', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hc_custom2_title',
        'label'       => __('Custom 2 Title', GETTEXT_DOMAIN),
        'desc'        => __('Enter the title for custom 2 button.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_2_icon',
        'label'       => 'Custom 2 Icon',
        'desc'        => __('Upload an icon for custom 2 button, recommended size 24x24px.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom2_css',
        'label'       => __('Custom 2, CSS Style', GETTEXT_DOMAIN),
        'desc'        => __("Use custom styles if your icon dimension doesn't fit.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_2_color',
        'label'       => __('Custom 2 Button Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for "Custom 2" button.', GETTEXT_DOMAIN),
        'std'         => '#f0bc00',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom_2_color_hover',
        'label'       => __('Custom 2 Hover Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick hover color for "Custom 2" button.', GETTEXT_DOMAIN),
        'std'         => '#f8c400',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom2_bg_dd',
        'label'       => __('"Custom 2" Dowpdown Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Custom 2" dropdown.', GETTEXT_DOMAIN),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hc_custom2_bg_sp',
        'label'       => __('"Custom 2" Sliding Panel Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick background color for "Custom 2" sliding panel.', GETTEXT_DOMAIN),
        'std'         => '#363636',
        'type'        => 'colorpicker',
        'section'     => 'header_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

	/*------------------------------------------------------------------
	Header Social Media
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'h_sm_locations',
        'label'       => __('Social Media Locations', GETTEXT_DOMAIN),
        'desc'        => __('Select one of locations.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'right_hm',
            'label'       => __('Right Header Meta', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'left_hm',
            'label'       => __('Left Header Meta', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'right_h',
            'label'       => __('Right Header', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'left_h',
            'label'       => __('Left Header', GETTEXT_DOMAIN),
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'h_sm_target',
        'label'       => __('Target', GETTEXT_DOMAIN),
        'desc'        => __('The target attribute specifies where to open the linked document.', GETTEXT_DOMAIN),
        'std'         => '_self',
        'type'        => 'select',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '_blank',
            'label'       => '_blank',
            'src'         => ''
          ),
          array(
            'value'       => '_self',
            'label'       => '_self',
            'src'         => ''
          ),
          array(
            'value'       => '_parent',
            'label'       => '_parent',
            'src'         => ''
          ),
          array(
            'value'       => '_top',
            'label'       => '_top',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'h_forrst',
        'label'       => "forrst",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_dribbble',
        'label'       => "dribbble",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_twitter',
        'label'       => "twitter",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_flickr',
        'label'       => "flickr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_twitter_1',
        'label'       => "twitter alt",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_facebook',
        'label'       => "facebook",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_skype',
        'label'       => "skype",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_digg',
        'label'       => "digg",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google',
        'label'       => "google",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_html5',
        'label'       => "html5",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_linkedin',
        'label'       => "linkedin",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_last_fm',
        'label'       => "last_fm",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_vimeo',
        'label'       => "vimeo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_yahoo',
        'label'       => "yahoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_tumblr',
        'label'       => "tumblr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_apple',
        'label'       => "apple",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_windows',
        'label'       => "windows",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_youtube',
        'label'       => "youtube",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_delicious',
        'label'       => "delicious",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_rss',
        'label'       => "rss",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_picasa',
        'label'       => "picasa",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_deviantart',
        'label'       => "deviantart",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_technorati',
        'label'       => "technorati",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_stumbleupon',
        'label'       => "stumbleupon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_blogger',
        'label'       => "blogger",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_wordpress',
        'label'       => "wordpress",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_amazon',
        'label'       => "amazon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_appstore',
        'label'       => "appstore",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_paypal',
        'label'       => "paypal",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'h_myspace',
        'label'       => "myspace",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_windows8',
        'label'       => "windows8",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_pinterest',
        'label'       => "pinterest",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_soundcloud',
        'label'       => "soundcloud",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google_drive',
        'label'       => "google_drive",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_android',
        'label'       => "android",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_behance',
        'label'       => "behance",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_instagram',
        'label'       => "instagram",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_ebay',
        'label'       => "ebay",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google_plus',
        'label'       => "google_plus",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_forrst1',
        'label'       => "forrst1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_dribbble1',
        'label'       => "dribbble1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_twitter1',
        'label'       => "twitter1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_flickr1',
        'label'       => "flickr1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_twitter_11',
        'label'       => "twitter alt1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_facebook1',
        'label'       => "facebook1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_skype1',
        'label'       => "skype1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_digg1',
        'label'       => "digg1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google1',
        'label'       => "google1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_html51',
        'label'       => "html51",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_linkedin1',
        'label'       => "linkedin1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_last_fm1',
        'label'       => "last_fm1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_vimeo1',
        'label'       => "vimeo1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_yahoo1',
        'label'       => "yahoo1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_tumblr1',
        'label'       => "tumblr1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_apple1',
        'label'       => "apple1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_windows1',
        'label'       => "windows1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_youtube1',
        'label'       => "youtube1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_delicious1',
        'label'       => "delicious1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_rss1',
        'label'       => "rss1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_picasa1',
        'label'       => "picasa1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_deviantart1',
        'label'       => "deviantart1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_technorati1',
        'label'       => "technorati1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_stumbleupon1',
        'label'       => "stumbleupon1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_blogger1',
        'label'       => "blogger1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_wordpress1',
        'label'       => "wordpress1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_amazon1',
        'label'       => "amazon1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_appstore1',
        'label'       => "appstore1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_paypal1',
        'label'       => "paypal1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'h_myspace1',
        'label'       => "myspace1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_windows81',
        'label'       => "windows81",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_pinterest1',
        'label'       => "pinterest1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_soundcloud1',
        'label'       => "soundcloud1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google_drive1',
        'label'       => "google_drive1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_android1',
        'label'       => "android1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_behance1',
        'label'       => "behance1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_instagram1',
        'label'       => "instagram1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_ebay1',
        'label'       => "ebay1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google_plus1',
        'label'       => "google_plus1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Menu Options
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'disable_sticky',
        'label'       => __('Sticky Menu', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you want to disable sticky menu.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'disable_sticky_containers',
        'label'       => __('Sticky Menu "Delivery", "Contact Us", "Custom 1" & "Custom 2" containers.', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you want to disable sticky menu "Delivery", "Contact Us", "Custom 1" & "Custom 2" containers.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sep_element',
        'label'       => __('Separator Element', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you want to disable separator element.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'clickable_navigation',
        'label'       => __('Clickable Navigation', GETTEXT_DOMAIN),
        'desc'        => __('Flag to indicate dropdown menu show when you click or hover, set to true it will show when you click.', GETTEXT_DOMAIN),
        'std'         => 'false',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'false',
            'label'       => 'false',
            'src'         => ''
          ),
          array(
            'value'       => 'true',
            'label'       => 'true',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navigation_search',
        'label'       => __('Navigation Search Form', GETTEXT_DOMAIN),
        'desc'        => __('Select one search form type', GETTEXT_DOMAIN),
        'std'         => 'shop_search',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'shop_search',
            'label'       => __('Shop search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme_search',
            'label'       => __('Theme search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navigation_search_type',
        'label'       => __('Navigation Search Type', GETTEXT_DOMAIN),
        'desc'        => __('Select one of search type', GETTEXT_DOMAIN),
        'std'         => 'type2',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'type1',
            'label'       => __('Type 1', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'type2',
            'label'       => __('Type 2', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navigation_speed',
        'label'       => __('Navigation Speed', GETTEXT_DOMAIN),
        'desc'        => __('The duration of the transition animations in milliseconds.', GETTEXT_DOMAIN),
        'std'         => '600',
        'type'        => 'text',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
       array(
        'id'          => 'clickable_navigation',
        'label'       => __('Clickable Navigation', GETTEXT_DOMAIN),
        'desc'        => __('Flag to indicate dropdown menu show when you click or hover, set to true it will show when you click.', GETTEXT_DOMAIN),
        'std'         => 'false',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'false',
            'label'       => 'false',
            'src'         => ''
          ),
          array(
            'value'       => 'true',
            'label'       => 'true',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'easing_navigation',
        'label'       => __('Easing', GETTEXT_DOMAIN),
        'desc'        => __('Specifies the speed curve of the animation. Some of easing, you can reference in <a href="http://jqueryui.com/resources/demos/effect/easing.html">here</a>.', GETTEXT_DOMAIN),
        'std'         => 'false',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'default',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'linear',
            'label'       => 'linear',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInCirc',
            'label'       => 'easeInCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'animate_hoverIn',
        'label'       => __('hoverIn Effect', GETTEXT_DOMAIN),
        'desc'        => __('The animation method used for dropdown menu when hover in.', GETTEXT_DOMAIN),
        'std'         => 'flipInX',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'flash',
            'label'       => 'flash',
            'src'         => ''
          ),
          array(
            'value'       => 'shake',
            'label'       => 'shake',
            'src'         => ''
          ),
          array(
            'value'       => 'bounce',
            'label'       => 'bounce',
            'src'         => ''
          ),
          array(
            'value'       => 'flipInX',
            'label'       => 'flipInX',
            'src'         => ''
          ),
          array(
            'value'       => 'flipInY',
            'label'       => 'flipInY',
            'src'         => ''
          ),
          array(
            'value'       => 'wiggle',
            'label'       => 'wiggle',
            'src'         => ''
          ),
          array(
            'value'       => 'pulse',
            'label'       => 'pulse',
            'src'         => ''
          ),
          array(
            'value'       => 'rollIn',
            'label'       => 'rollIn',
            'src'         => ''
          ),
          array(
            'value'       => 'bounceIn',
            'label'       => 'bounceIn',
            'src'         => ''
          ),
          array(
            'value'       => 'lightSpeedIn',
            'label'       => 'lightSpeedIn',
            'src'         => ''
          ),
          array(
            'value'       => 'bounceInRight',
            'label'       => 'bounceInRight',
            'src'         => ''
          ),
          array(
            'value'       => 'bounceInLeft',
            'label'       => 'bounceInLeft',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeIn',
            'label'       => 'fadeIn',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeInRight',
            'label'       => 'fadeInRight',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeInLeft',
            'label'       => 'fadeInLeft',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeInUp',
            'label'       => 'fadeInUp',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeInDown',
            'label'       => 'fadeInDown',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'animate_hoverOut',
        'label'       => __('foverOut Effect', GETTEXT_DOMAIN),
        'desc'        => __('The animation method used for dropdown menu when hover out..', GETTEXT_DOMAIN),
        'std'         => 'slideUp',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Hide',
            'label'       => 'Hide',
            'src'         => ''
          ),
          array(
            'value'       => 'flipOutX',
            'label'       => 'flipOutX',
            'src'         => ''
          ),
          array(
            'value'       => 'flipOutY',
            'label'       => 'flipOutY',
            'src'         => ''
          ),
          array(
            'value'       => 'bounceOut',
            'label'       => 'bounceOut',
            'src'         => ''
          ),
          array(
            'value'       => 'lightSpeedOut',
            'label'       => 'lightSpeedOut',
            'src'         => ''
          ),
          array(
            'value'       => 'hinge',
            'label'       => 'hinge',
            'src'         => ''
          ),
          array(
            'value'       => 'slideUp',
            'label'       => 'slideUp',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeOut',
            'label'       => 'fadeOut',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeOutRight',
            'label'       => 'fadeOutRight',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeOutLeft',
            'label'       => 'fadeOutLeft',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeOutUp',
            'label'       => 'fadeOutUp',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeOutDown',
            'label'       => 'fadeOutDown',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'navigation_font_size',
        'label'       => __('Navigation Font Size', GETTEXT_DOMAIN),
        'desc'        => __('Set navigation font size.', GETTEXT_DOMAIN),
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ), 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ), 
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'navigation_font_style',
        'label'       => __('Navigation Font Weight', GETTEXT_DOMAIN),
        'desc'        => __('Set navigation font weight.', GETTEXT_DOMAIN),
        'std'         => '400',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          ),
        ),
      ),
       array(
        'id'          => 'dropdown_font_size',
        'label'       => __('Navigation Dropdown Font Size', GETTEXT_DOMAIN),
        'desc'        => __('Set navigation dropdown font size.', GETTEXT_DOMAIN),
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ), 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ), 
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'dropdown_font_style',
        'label'       => __('Navigation Dropdown Font Weight', GETTEXT_DOMAIN),
        'desc'        => __('Set navigation dropdown font weight.', GETTEXT_DOMAIN),
        'std'         => '400',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '300',
            'label'       => '300',
            'src'         => ''
          ),
          array(
            'value'       => '400',
            'label'       => '400',
            'src'         => ''
          ),
          array(
            'value'       => '500',
            'label'       => '500',
            'src'         => ''
          ),
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          ),
        ),
      ),
	
	/*------------------------------------------------------------------
	Typography
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'body_font_size',
        'label'       => __('Body Font Size', GETTEXT_DOMAIN),
        'desc'        => __('Set body font size.', GETTEXT_DOMAIN),
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'typekit_id',
        'label'       => "Typekit Kit ID",
        'desc'        => __("Input your Typekit Kit ID for Adobe Typekit fonts, find more information how to use this service on <a href='http://support.lpd-themes.com/?s=typekit'>http://support.lpd-themes.com/</a>.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'body_font_family',
        'label'       => __('Body Font Family', GETTEXT_DOMAIN),
        'desc'        => __('Set body font family.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => '"Arvo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => '"Vollkorn", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Sans',
            'label'       => '"PT Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Serif',
            'label'       => '"PT Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Sans',
            'label'       => '"Droid Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Serif',
            'label'       => '"Droid Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => '"Cabin", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lora',
            'label'       => '"Lora", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => '"Oswald", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Varela+Round',
            'label'       => '"Varela Round", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Unna',
            'label'       => '"Unna", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => '"Rokkitt", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => '"Merriweather", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bitter',
            'label'       => '"Bitter", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => '"Kreon", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Playfair+Display',
            'label'       => '"Playfair Display", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Roboto+Slab',
            'label'       => '"Roboto Slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bree+Serif',
            'label'       => '"Bree Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Libre+Baskerville',
            'label'       => '"Libre Baskerville", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantata+One',
            'label'       => '"Cantata One", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Alegreya',
            'label'       => '"Alegreya", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noto+Serif',
            'label'       => '"Noto Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB+Garamond',
            'label'       => '"EB Garamond", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noticia+Text',
            'label'       => '"Noticia Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Old+Standard+TT',
            'label'       => '"Old Standard TT", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson+Text',
            'label'       => '"Crimson Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin+Sans',
            'label'       => '"Josefin Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- Typekit Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-sans',
            'label'       => '"museo-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-slab',
            'label'       => '"museo-slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adelle',
            'label'       => '"adelle", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'nimbus-sans',
            'label'       => '"nimbus-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo',
            'label'       => '"museo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'ff-enzo-web',
            'label'       => '"ff-enzo-web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adobe-garamond-pro',
            'label'       => '"adobe-garamond-pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'heading_font_family',
        'label'       => __('Heading Font Family', GETTEXT_DOMAIN),
        'desc'        => __('Set heading font family.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => '"Arvo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => '"Vollkorn", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Sans',
            'label'       => '"PT Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Serif',
            'label'       => '"PT Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Sans',
            'label'       => '"Droid Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Serif',
            'label'       => '"Droid Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => '"Cabin", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lora',
            'label'       => '"Lora", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => '"Oswald", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Varela+Round',
            'label'       => '"Varela Round", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Unna',
            'label'       => '"Unna", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => '"Rokkitt", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => '"Merriweather", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bitter',
            'label'       => '"Bitter", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => '"Kreon", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Playfair+Display',
            'label'       => '"Playfair Display", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Roboto+Slab',
            'label'       => '"Roboto Slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bree+Serif',
            'label'       => '"Bree Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Libre+Baskerville',
            'label'       => '"Libre Baskerville", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantata+One',
            'label'       => '"Cantata One", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Alegreya',
            'label'       => '"Alegreya", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noto+Serif',
            'label'       => '"Noto Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB+Garamond',
            'label'       => '"EB Garamond", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noticia+Text',
            'label'       => '"Noticia Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Old+Standard+TT',
            'label'       => '"Old Standard TT", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson+Text',
            'label'       => '"Crimson Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin+Sans',
            'label'       => '"Josefin Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- Typekit Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-sans',
            'label'       => '"museo-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-slab',
            'label'       => '"museo-slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adelle',
            'label'       => '"adelle", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'nimbus-sans',
            'label'       => '"nimbus-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo',
            'label'       => '"museo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'ff-enzo-web',
            'label'       => '"ff-enzo-web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adobe-garamond-pro',
            'label'       => '"adobe-garamond-pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'elements_font_family',
        'label'       => __('Elements Font Family', GETTEXT_DOMAIN),
        'desc'        => __('Set elements font family.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => '"Arvo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => '"Vollkorn", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Sans',
            'label'       => '"PT Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Serif',
            'label'       => '"PT Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Sans',
            'label'       => '"Droid Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Serif',
            'label'       => '"Droid Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => '"Cabin", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lora',
            'label'       => '"Lora", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => '"Oswald", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Varela+Round',
            'label'       => '"Varela Round", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Unna',
            'label'       => '"Unna", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => '"Rokkitt", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => '"Merriweather", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bitter',
            'label'       => '"Bitter", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => '"Kreon", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Playfair+Display',
            'label'       => '"Playfair Display", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Roboto+Slab',
            'label'       => '"Roboto Slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bree+Serif',
            'label'       => '"Bree Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Libre+Baskerville',
            'label'       => '"Libre Baskerville", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantata+One',
            'label'       => '"Cantata One", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Alegreya',
            'label'       => '"Alegreya", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noto+Serif',
            'label'       => '"Noto Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB+Garamond',
            'label'       => '"EB Garamond", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noticia+Text',
            'label'       => '"Noticia Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Old+Standard+TT',
            'label'       => '"Old Standard TT", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson+Text',
            'label'       => '"Crimson Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Josefin+Sans',
            'label'       => '"Josefin Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- Typekit Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-sans',
            'label'       => '"museo-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo-slab',
            'label'       => '"museo-slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adelle',
            'label'       => '"adelle", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'nimbus-sans',
            'label'       => '"nimbus-sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'museo',
            'label'       => '"museo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'ff-enzo-web',
            'label'       => '"ff-enzo-web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'adobe-garamond-pro',
            'label'       => '"adobe-garamond-pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_typekit',
        'label'       => __('Custom Typekit Fonts', GETTEXT_DOMAIN),
        'desc'        => "&#8595; Use custom 'Typekit Font' options, if you couldn't find the font you want in our list.",
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tk_body_font',
        'label'       => "Typekit Body Font Family",
        'desc'        => __('Set "Typekit" font family for body (primary font), (ex: "museo-sans", sans-serif, "museo-slab", serif).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tk_heading_font',
        'label'       => "Typekit Heading Font Family",
        'desc'        => __('Set "Typekit" font family for headings, (ex: "museo-sans", sans-serif, "museo-slab", serif).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'tk_elements_font',
        'label'       => "Typekit Elements Font Family",
        'desc'        => __('Set "Typekit" font family for elements, (ex: "museo-sans", sans-serif, "museo-slab", serif).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'bold_elements_font_style',
        'label'       => __('Font Weight for Bold Elements', GETTEXT_DOMAIN),
        'desc'        => __('Set navigation "Bold Elements" font weight.', GETTEXT_DOMAIN),
        'std'         => '900',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '700',
            'label'       => '700',
            'src'         => ''
          ),
          array(
            'value'       => '900',
            'label'       => '900',
            'src'         => ''
          ),
        ),
      ),
	
	/*------------------------------------------------------------------
	SEO Settings
	-------------------------------------------------------------------*/
	
array(
        'id'          => 'disable_seo',
        'label'       => 'Disable Theme SEO',
        'desc'        => __('If you are using an external SEO plug-in you should disable this option.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'keywords',
        'label'       => 'Keywords',
        'desc'        => __('Enter a list of keywords separated by commas.', GETTEXT_DOMAIN),
        'std'         => 'keyword1, keywords2',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'description',
        'label'       => 'Description',
        'desc'        => __('Enter description for your site.', GETTEXT_DOMAIN),
        'std'         => 'website description',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      
      
	/*------------------------------------------------------------------
	Theme Settings
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'theme_color',
        'label'       => __('Theme Color #1', GETTEXT_DOMAIN),
        'desc'        => __('Pick primary color for link, buttons and etc.', GETTEXT_DOMAIN),
        'std'         => '#66ab36',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_color_2',
        'label'       => __('Theme  Color #2', GETTEXT_DOMAIN),
        'desc'        => __('Pick primary color for hover elements.', GETTEXT_DOMAIN),
        'std'         => '#96ca42',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_color_3',
        'label'       => __('Theme Color #3', GETTEXT_DOMAIN),
        'desc'        => __('Pick the secondary color for link, buttons and etc.', GETTEXT_DOMAIN),
        'std'         => '#f0bc00',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_color_4',
        'label'       => __('Theme  Color #4', GETTEXT_DOMAIN),
        'desc'        => __('Pick secondary color for hover elements.', GETTEXT_DOMAIN),
        'std'         => '#f8c400',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_color',
        'label'       => __('Background Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the background color for "boxed" theme style.', GETTEXT_DOMAIN),
        'std'         => '#f0f0f0',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_image_full',
        'label'       => __('Background Image (full width)', GETTEXT_DOMAIN),
        'desc'        => __('Upload background image for "boxed" theme style.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_image_repeat',
        'label'       => __('Background Image (repeat)', GETTEXT_DOMAIN),
        'desc'        => __('Upload background image for "boxed" theme style.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => __('Upload an .ico image (dimensions 16x16) for favicon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone_icon',
        'label'       => 'Iphone Icon',
        'desc'        => __('Upload an .png image (dimensions 57x57) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad_icon',
        'label'       => 'Ipad Icon',
        'desc'        => __('Upload an .png image (dimensions 72x72) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone2_icon',
        'label'       => 'Iphone Icon Retina',
        'desc'        => __('Upload an .png image (dimensions 114x114) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad2_icon',
        'label'       => 'Ipad Icon Retina',
        'desc'        => __('Upload an .png image (dimensions 144x144) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

	
	/*------------------------------------------------------------------
	Blog Settings
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'blog-header-image',
        'label'       => __('Header Image', GETTEXT_DOMAIN),
        'desc'        => __('Upload an image for blog header.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog-header-image_type',
        'label'       => __('Header Type', GETTEXT_DOMAIN),
        'desc'        => __('Select header type', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => __('Full Width', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'parallax',
            'label'       => __('Parallax', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat',
            'label'       => __('Repeat', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_sub_title',
        'label'       => __('Sub-title', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for sub-title.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_title_padding_top',
        'label'       => __('Title Padding Top', GETTEXT_DOMAIN),
        'desc'        => __('Padding top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_title_padding_bottom',
        'label'       => __('Title Padding Bottom', GETTEXT_DOMAIN),
        'desc'        => __('Padding bottom, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog-sidebar',
        'label'       => __('Sidebar', GETTEXT_DOMAIN),
        'desc'        => __('Select sidebar type', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => __('Right', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => __('Left', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'st_buttons',
        'label'       => __('Share This Buttons', GETTEXT_DOMAIN),
        'desc'        => __('Paste the span tags "ShareThis" buttons, get your code for "ShareThis" buttons on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'st_javascript',
        'label'       => __('Share This Javascript', GETTEXT_DOMAIN),
        'desc'        => __('Paste the script tags "ShareThis" javascript, get your code for "ShareThis" javascript on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Portfolio Settings
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 'st_buttons_p',
        'label'       => __('Share This Buttons', GETTEXT_DOMAIN),
        'desc'        => __('Paste the span tags "ShareThis" buttons, get your code for "ShareThis" buttons on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'portfolio_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'st_javascript_p',
        'label'       => __('Share This Javascript', GETTEXT_DOMAIN),
        'desc'        => __('Paste the script tags "ShareThis" javascript, get your code for "ShareThis" javascript on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'portfolio_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Shop Settings
	-------------------------------------------------------------------*/
	
      array(
        'id'          => 's_cart',
        'label'       => __('Shopping Cart', GETTEXT_DOMAIN),
        'desc'        => __('Select your shopping cart type or disable it.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'dropdowp',
            'label'       => __('Dropdown', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sl_panel_right',
            'label'       => __('Sliding Panel (right)', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'sl_panel_left',
            'label'       => __('Sliding Panel (left)', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'disable',
            'label'       => __('Disable', GETTEXT_DOMAIN),
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 's_cart_tm',
        'label'       => __('Shopping Cart Top Margin', GETTEXT_DOMAIN),
        'desc'        => __('Margin top, only integers (ex: 1, 5, 10).', GETTEXT_DOMAIN),
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 's_cart_style',
        'label'       => __('Shopping Cart Style', GETTEXT_DOMAIN),
        'desc'        => __('Select one of shopping cart style.', GETTEXT_DOMAIN),
        'std'         => 'style2',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'style1',
            'label'       => 'style1',
            'src'         => ''
          ),
          array(
            'value'       => 'style2',
            'label'       => 'style2',
            'src'         => ''
          ),
          array(
            'value'       => 'style3',
            'label'       => 'style3',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 's_rating',
        'label'       => __('Rating', GETTEXT_DOMAIN),
        'desc'        => __('Check for disabling rating stars on front pages.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => __('Disable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_title',
        'label'       => __('Shop Page Title', GETTEXT_DOMAIN),
        'desc'        => __('Check for disabling tile on shop page.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => __('Disable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'loop_shop_per_page',
        'label'       => __('Number of Products', GETTEXT_DOMAIN),
        'desc'        => __('Number of products to display on shop page.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_columns',
        'label'       => __('Number of Columns', GETTEXT_DOMAIN),
        'desc'        => __('Select number of columns for shop page.', GETTEXT_DOMAIN),
        'std'         => '4',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sale_flash_color',
        'label'       => __('Sale Flash Element', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for sale flash element.', GETTEXT_DOMAIN),
        'std'         => '#d9534f',
        'type'        => 'colorpicker',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'shop_thumb_type',
        'label'       => 'Catalog Images',
        'desc'        => 'Select one of thumbnail type.',
        'std'         => 'theme-size-1x1',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('woocommerce image size', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-4x3',
            'label'       => 'theme-size-4x3',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x2',
            'label'       => 'theme-size-3x2',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-16x9',
            'label'       => 'theme-size-16x9',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-1x1',
            'label'       => 'theme-size-1x1',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x4',
            'label'       => 'theme-size-3x4',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-2x3',
            'label'       => 'theme-size-2x3',
            'src'         => ''
          ),
          array(
            'value'       => 'custom-size',
            'label'       => __('custom size', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_thumb_custom',
        'label'       => __('Catalog Images Custom Size', GETTEXT_DOMAIN),
        'desc'        => __("Enter image size. Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size. The 'custom size' thumbnail type must be selected in 'Catalog Images'", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_image_type',
        'label'       => 'Single Product Image',
        'desc'        => 'Select one of image type.',
        'std'         => 'theme-size-1x1',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('woocommerce image size', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-4x3',
            'label'       => 'theme-size-4x3',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x2',
            'label'       => 'theme-size-3x2',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-16x9',
            'label'       => 'theme-size-16x9',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-1x1',
            'label'       => 'theme-size-1x1',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x4',
            'label'       => 'theme-size-3x4',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-2x3',
            'label'       => 'theme-size-2x3',
            'src'         => ''
          ),
          array(
            'value'       => 'custom-size',
            'label'       => __('custom size', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_image_custom',
        'label'       => __('Single Product Image Custom Size', GETTEXT_DOMAIN),
        'desc'        => __("Enter image size. Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size. The 'custom size' thumbnail type must be selected in 'Single Product Image'", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_thumbnails_type',
        'label'       => 'Product Thumbnails',
        'desc'        => 'Select one of image type.',
        'std'         => 'theme-size-1x1',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('woocommerce image size', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-4x3',
            'label'       => 'theme-size-4x3',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x2',
            'label'       => 'theme-size-3x2',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-16x9',
            'label'       => 'theme-size-16x9',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-1x1',
            'label'       => 'theme-size-1x1',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-3x4',
            'label'       => 'theme-size-3x4',
            'src'         => ''
          ),
          array(
            'value'       => 'theme-size-2x3',
            'label'       => 'theme-size-2x3',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'catalog_mode',
        'label'       => __('Catalog Mode', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'catalog_type',
        'label'       => __('Catalog Type', GETTEXT_DOMAIN),
        'desc'        => 'Select one of catalog type.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'purchases',
            'label'       => 'disable purchases',
            'src'         => ''
          ),
          array(
            'value'       => 'purchases_prices',
            'label'       => 'disable purchases and prices',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_custom_css_enable',
        'label'       => __('Enable "Shop Custom Css"', GETTEXT_DOMAIN),
        'desc'        => "",
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => __('Enable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_custom_css',
        'label'       => 'Shop Custom Css',
        'desc'        => 'Enter your shop custom css styles.',
        'std'         => '
.widget_product_categories .title{
	padding-bottom:15px;
	padding-top:15px;
	background-color:#66ab36;
	border-bottom:3px solid rgba(255, 255, 255, 0.3);
	color:#fff;
	text-align:center;
	margin-top:0;
	margin-bottom:20px;
}
.product-categories{
	padding:20px 15px !important;
	border:3px solid #ebebeb;
}
        ',
        'type'        => 'textarea-simple',
        'section'     => 'shop_options',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Footer Meta
	-------------------------------------------------------------------*/
	
array(
        'id'          => 'footer_meta_color',
        'label'       => __('Footer Meta Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the background color for bottom footer.', GETTEXT_DOMAIN),
        'std'         => '#66ab36',
        'type'        => 'colorpicker',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_meta_background',
        'label'       => __('Footer Meta Background', GETTEXT_DOMAIN),
        'desc'        => __('Select header meta background type', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => __('none', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'pattern',
            'label'       => __('Theme Pattern', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'custom',
            'label'       => __('Custom Pattern', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'full-width-image',
            'label'       => __('Full Width Image', GETTEXT_DOMAIN),
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'fm_custom_pattern',
        'label'       => __('Custom Pattern/Full Width Image', GETTEXT_DOMAIN),
        'desc'        => __('Upload custom pattern for footer meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column1',
        'label'       => __('Column 1', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 1.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column2',
        'label'       => __('Column 2', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 2.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column3',
        'label'       => __('Column 3', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 3.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column4',
        'label'       => __('Column 4', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 4.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'sm_label',
        'label'       => "Social Media Label",
        'desc'        => __("Enter a value for social media label.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sm_target',
        'label'       => __('Target', GETTEXT_DOMAIN),
        'desc'        => __('The target attribute specifies where to open the linked document.', GETTEXT_DOMAIN),
        'std'         => '_self',
        'type'        => 'select',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '_blank',
            'label'       => '_blank',
            'src'         => ''
          ),
          array(
            'value'       => '_self',
            'label'       => '_self',
            'src'         => ''
          ),
          array(
            'value'       => '_parent',
            'label'       => '_parent',
            'src'         => ''
          ),
          array(
            'value'       => '_top',
            'label'       => '_top',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'forrst',
        'label'       => "forrst",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble',
        'label'       => "dribbble",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => "twitter",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => "flickr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_1',
        'label'       => "twitter alt",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => "facebook",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype',
        'label'       => "skype",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg',
        'label'       => "digg",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google',
        'label'       => "google",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'html5',
        'label'       => "html5",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin',
        'label'       => "linkedin",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'last_fm',
        'label'       => "last_fm",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo',
        'label'       => "vimeo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yahoo',
        'label'       => "yahoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr',
        'label'       => "tumblr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple',
        'label'       => "apple",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows',
        'label'       => "windows",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => "youtube",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'delicious',
        'label'       => "delicious",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss',
        'label'       => "rss",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'picasa',
        'label'       => "picasa",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'deviantart',
        'label'       => "deviantart",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'technorati',
        'label'       => "technorati",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stumbleupon',
        'label'       => "stumbleupon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blogger',
        'label'       => "blogger",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wordpress',
        'label'       => "wordpress",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'amazon',
        'label'       => "amazon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'appstore',
        'label'       => "appstore",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paypal',
        'label'       => "paypal",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'myspace',
        'label'       => "myspace",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows8',
        'label'       => "windows8",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest',
        'label'       => "pinterest",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soundcloud',
        'label'       => "soundcloud",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_drive',
        'label'       => "google_drive",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'android',
        'label'       => "android",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'behance',
        'label'       => "behance",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'instagram',
        'label'       => "instagram",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ebay',
        'label'       => "ebay",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_plus',
        'label'       => "google_plus",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'forrst1',
        'label'       => "forrst1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble1',
        'label'       => "dribbble1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter1',
        'label'       => "twitter1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr1',
        'label'       => "flickr1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_11',
        'label'       => "twitter alt1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook1',
        'label'       => "facebook1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype1',
        'label'       => "skype1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg1',
        'label'       => "digg1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google1',
        'label'       => "google1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'html51',
        'label'       => "html51",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin1',
        'label'       => "linkedin1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'last_fm1',
        'label'       => "last_fm1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo1',
        'label'       => "vimeo1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yahoo1',
        'label'       => "yahoo1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr1',
        'label'       => "tumblr1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple1',
        'label'       => "apple1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows1',
        'label'       => "windows1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube1',
        'label'       => "youtube1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'delicious1',
        'label'       => "delicious1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss1',
        'label'       => "rss1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'picasa1',
        'label'       => "picasa1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'deviantart1',
        'label'       => "deviantart1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'technorati1',
        'label'       => "technorati1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stumbleupon1',
        'label'       => "stumbleupon1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blogger1',
        'label'       => "blogger1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wordpress1',
        'label'       => "wordpress1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'amazon1',
        'label'       => "amazon1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'appstore1',
        'label'       => "appstore1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paypal1',
        'label'       => "paypal1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'myspace1',
        'label'       => "myspace1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows81',
        'label'       => "windows81",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest1',
        'label'       => "pinterest1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soundcloud1',
        'label'       => "soundcloud1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_drive1',
        'label'       => "google_drive1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'android1',
        'label'       => "android1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'behance1',
        'label'       => "behance1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'instagram1',
        'label'       => "instagram1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ebay1',
        'label'       => "ebay1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_plus1',
        'label'       => "google_plus1",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Footer Options
	-------------------------------------------------------------------*/
	
array(
        'id'          => 'cc',
        'label'       => __('Credit Cards', GETTEXT_DOMAIN),
        'desc'        => __('Credit cards image, the recommended height 50px.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_copyright',
        'label'       => 'Footer Copyright Text',
        'desc'        => 'Enter the copyright text you\'d like to show in the footer of your site.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_color',
        'label'       => __('Footer Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the background color for footer.', GETTEXT_DOMAIN),
        'std'         => '#fafafa',
        'type'        => 'colorpicker',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_bg_type',
        'label'       => __('Footer Background Type', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you are using dark background color.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => __('Dark Background', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bottom_footer_custom_color',
        'label'       => __('Custom Bottom Footer Color', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you want to use "Bottom Footer Color" option.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => __('Enable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bottom_footer_color',
        'label'       => __('Bottom Footer Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the background color for bottom footer.', GETTEXT_DOMAIN),
        'std'         => '#252525',
        'type'        => 'colorpicker',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'bottom_footer_bg_type',
        'label'       => __('Bottom Footer Background Type', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you are using light background color.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => __('Light Background', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_separator',
        'label'       => __('Footer Separator', GETTEXT_DOMAIN),
        'desc'        => __('Check, if you want to enable separator element.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => __('Enable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_separator_color',
        'label'       => __('Separator Color', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for separator element.', GETTEXT_DOMAIN),
        'std'         => '#f8c400',
        'type'        => 'colorpicker',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_separator_icon',
        'label'       => __('Separator Icon', GETTEXT_DOMAIN),
        'desc'        => __('Icon image, the minimal dimensions 48x48px.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_separator_icon_border',
        'label'       => __('Separator Icon Border', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for icon border.', GETTEXT_DOMAIN),
        'std'         => '#96ca42',
        'type'        => 'colorpicker',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	
	/*------------------------------------------------------------------
	Animation Onscroll
	-------------------------------------------------------------------*/
 
       array(
        'id'          => 'sidebar_animation',
        'label'       => __('Sidebar', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for sidebar.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sidebar_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for sidebar.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_animation',
        'label'       => __('Footer', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for footer.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for footer.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_top_animation',
        'label'       => __('Footer Top', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_top_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for footer top.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_top_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_top_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_top_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_top_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for footer top.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_bottom_animation',
        'label'       => __('Footer Bottom', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_bottom_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for footer bottom.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_bottom_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_bottom_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_bottom_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_bottom_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for footer bottom.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_meta_animation',
        'label'       => __('Footer Meta', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_meta_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for footer meta.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_meta_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_meta_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_meta_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_meta_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for footer meta.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'page_title_bottom_animation',
        'label'       => __('Page Title', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for page title.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'page_title_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for page title.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_thumb_animation',
        'label'       => __('Shop Thumnails', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_thumb_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for shop thumbnails.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'shop_thumb_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_thumb_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_thumb_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_thumb_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for shop thumbnails.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_page_animation',
        'label'       => __('Product Page', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_page_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for product page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_page_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_page_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_page_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_page_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for product page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_image_animation',
        'label'       => __('Product Image', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_image_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for product image.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_image_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_image_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_image_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_image_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for product image.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_bottom_animation',
        'label'       => __('Product Bottom', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_bottom_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for product bottom.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_bottom_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_bottom_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_bottom_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'product_bottom_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for product bottom.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'team_post_animation',
        'label'       => __('Team Post', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'team_post_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for team post.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'team_post_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'team_post_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'team_post_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'team_post_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for team post',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'portfolio_post_animation',
        'label'       => __('Portfolio Post', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_post_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for portfolio post.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'portfolio_post_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_post_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_post_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_post_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for portfolio post',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'portfolio_thumbnails_animation',
        'label'       => __('Portfolio Thumbnails', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_thumbnails_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for portfolio thumbnails.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'portfolio_thumbnails_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_thumbnails_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_thumbnails_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_thumbnails_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for portfolio thumbnails',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_front_animation',
        'label'       => __('Blog Page', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_front_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for posts on blog page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_front_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_front_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_front_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_front_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for posts on blog page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_post_animation',
        'label'       => __('Post Page', GETTEXT_DOMAIN),
        'desc'        => '&#8595;',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_post_a_type',
        'label'       => __('Type of Animation', GETTEXT_DOMAIN),
        'desc'        => 'Choose type of animation for posts on blog page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-in',
            'label'       => 'Fade-In',
            'src'         => ''
          ),
          array(
            'value'       => 'fade-out',
            'label'       => 'Fade-Out',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-down-from-top',
            'label'       => 'Slide-Down-From-Top',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-right',
            'label'       => 'Slide-In-From-Right',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-up-from-bottom',
            'label'       => 'Slide-Up-From-Bottom',
            'src'         => ''
          ),
          array(
            'value'       => 'slide-in-from-left',
            'label'       => 'Slide-In-From-Left',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-up',
            'label'       => 'Scale Up',
            'src'         => ''
          ),
          array(
            'value'       => 'scale-down',
            'label'       => 'Scale Down',
            'src'         => ''
          ),
          array(
            'value'       => 'rotate',
            'label'       => 'Rotate',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-y-axis',
            'label'       => 'Flip-Y-Axis',
            'src'         => ''
          ),
          array(
            'value'       => 'flip-x-axis',
            'label'       => 'Flip-X-Axis',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_post_a_speed',
        'label'       => __('Animation Speed in Milliseconds', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_post_a_delay',
        'label'       => __('Animation Delay in Milliseconds:', GETTEXT_DOMAIN),
        'desc'        => __('eg. (1000 = 1 second).', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_post_a_offset',
        'label'       => __('Animation Offset Percentage(Trigger Point)', GETTEXT_DOMAIN),
        'desc'        => __('eg. (value of 0 = top of viewport, value of 100 = bottom of viewport) .', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_post_a_easing',
        'label'       => __('Animation Easing:', GETTEXT_DOMAIN),
        'desc'        => 'Choose animation easing for post page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'animation_onscroll',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'ease',
            'label'       => 'ease',
            'src'         => ''
          ),
          array(
            'value'       => 'in',
            'label'       => 'in',
            'src'         => ''
          ),
          array(
            'value'       => 'out',
            'label'       => 'out',
            'src'         => ''
          ),
          array(
            'value'       => 'in-out',
            'label'       => 'in-out',
            'src'         => ''
          ),
          array(
            'value'       => 'snap',
            'label'       => 'snap',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          )
        ),
      ),      
            
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}