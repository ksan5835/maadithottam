<?php
/*
Plugin Name: WooThumbs - Awesome Product Imagery
Plugin URI: http://www.jckemp.com
Description: Display your WooCommerce product images in an awesome way. Zoom, Slide, Enlarge, and more!
Version: 4.4.13
Author: James Kemp
Author URI: http://www.jckemp.com
Text Domain: jck-wt
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once dirname( __FILE__ ) . '/inc/admin/class-envato-market-github.php';
require_once dirname( __FILE__ ) . '/inc/admin/class-tgm-plugin-activation.php';

class JCKWooThumbs {

    /*
     * Version
     *
     * @var string
     */
    public $version = "4.4.13";

    /*
     * Full name
     *
     * @var string
     */
    public $name = 'WooThumbs - Multiple Images per Variation';

    /*
     * Short name
     *
     * @var string
     */
    public $shortname = 'WooThumbs';

    /*
     * Slug
     *
     * @var string
     */
    public $slug = 'jck-wt';

    /*
     * Variable to hold settings framework instance
     *
     * @var obj
     */
    public $settings_framework = null;

    /*
     * Absolute path to this plugin folder, trailing slash
     *
     * @var string
     */
    public $plugin_path;

    /*
     * URL to this plugin folder, no trailing slash
     *
     * @var string
     */
    public $plugin_url;

    /*
     * Page slug for bulk edit
     *
     * @var string
     */
    public $bulk_edit_slug;

    /*
     * Nonce name for ajax requests
     *
     * @var string
     */
    public $ajax_nonce_string;

    /*
     * Active Plugins List
     *
     * @var arr
     */
    public $active_plugins;

    /*
     * Construct
     */
    function __construct() {

        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->bulk_edit_slug = $this->slug.'-bulk-edit';
        $this->ajax_nonce_string = $this->slug.'_ajax';
        $this->active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

        // Hook up to the plugins_loaded action
        add_action( 'plugins_loaded', array( $this, 'plugins_loaded_hook' ) );

        // If Redux is running as a plugin, this will remove the demo notice and links
        add_action( 'redux/loaded', array( $this, 'remove_redux_demo' ) );

    }


    /*
     *
     * Helper: Remove Redux Demo Mode
     *
     */
    function remove_redux_demo() {

        if (class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);
            remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
        }

    }


    /*
     *
     * Runs on plugins_loaded
     *
     */
    function plugins_loaded_hook() {

        load_plugin_textdomain( 'jck-wt', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

        if ( !isset( $jck_wt ) && file_exists( dirname( __FILE__ ) . '/inc/admin/woothumbs-options.php' ) ) {
            require_once dirname( __FILE__ ) . '/inc/admin/woothumbs-options.php';
        }

        if ( is_admin() ) {

            $this->delete_transients();

            add_action( 'tgmpa_register',                                       array( $this, 'register_required_plugins' ) );

            add_action( 'admin_enqueue_scripts',                                array( $this, 'admin_scripts' ) );
            add_action( 'wp_ajax_admin_load_thumbnails',                        array( $this, 'admin_load_thumbnails' ) );
            add_action( 'woocommerce_save_product_variation',                   array( $this, 'save_product_variation' ), 10, 2 );
            add_action( 'admin_menu',                                           array( $this, 'bulk_edit_page' ) );
            add_action( 'admin_init',                                           array( $this, 'media_columns' ) );

            add_action( 'wp_ajax_jck-wt_bulk_save',                             array( $this, 'bulk_save' ) );

            add_action( 'woocommerce_product_write_panel_tabs',                 array( $this, 'product_tab' ) );
            add_action( 'woocommerce_product_write_panels',                     array( $this, 'product_tab_fields' ) );
            add_action( 'woocommerce_process_product_meta',                     array( $this, 'save_product_fields' ) );

            add_action( 'wp_ajax_jck_wt_get_variation',                         array( $this, 'ajax_get_variation' ) );
            add_action( 'wp_ajax_nopriv_jck_wt_get_variation',                  array( $this, 'ajax_get_variation' ) );

        } else {

            add_action( 'woocommerce_before_single_product',                    array( $this, 'remove_hooks' ) );
            add_action( 'woocommerce_before_single_product_summary',            array( $this, 'show_product_images' ), 20);
            add_action( 'wp_enqueue_scripts',                                   array( $this, 'register_scripts_and_styles' ) );

            add_filter( 'body_class',                                           array( $this, 'add_theme_class' ) );

            add_action( 'jck_wt_after_images',                                  array( $this, 'add_yith_wishlist_icon' ) );

            add_action( 'woocommerce_api_product_response',                     array( $this, 'woocommerce_api_product_response' ), 10, 4 );

        }

        add_filter( 'woocommerce_available_variation',                          array( $this, 'alter_variation_json' ), 10, 3 );

    }


    /*
     *
     * Frontend: Alter Variation JSON
     *
     * This hooks into the data attribute on the variations form for each variation
     * we can get the additional image data here!
     *
     * Run frontend for variations form, and backend for ajax request
     *
     * @param mixed $variation_data
     * @param mixed $wc_product_variable
     * @param mixed $variation_obj
     *
     * @return arr
     *
     */
    public function alter_variation_json( $variation_data, $wc_product_variable, $variation_obj ) {

        $images = $this->get_all_image_sizes( $variation_data['variation_id'] );

        $variation_data['jck_additional_images'] = $images;

        return $variation_data;

    }


    /*
     *
     * Frontend: Add Theme Class to Body
     *
     * @param arr $classes exisiting classes
     *
     * @return arr
     *
     */
    public function add_theme_class( $classes ) {

        $theme_name = sanitize_title_with_dashes( wp_get_theme() );

        $classes[] = $this->slug.'-'.$theme_name;
        return $classes;

    }


    /*
     *
     * Helper: Is Enabled
     *
     * Check whether WooThumbs is enabled for this product
     *
     * @return bool
     *
     */
    public function is_enabled() {

        global $post;

        $pid = $post->ID;

        if ( $pid ) {

            $disable_woothumbs = get_post_meta( $pid, 'disable_woothumbs', true );

            return ( $disable_woothumbs && $disable_woothumbs == "yes" ) ? false : true;

        }

        return false;

    }


    /*
     *
     * Helper: Get Product ID from Slug
     *
     * Gets the product id from the slug of the current product
     *
     * @return int
     *
     */
    public function get_post_id_from_slug() {

        global $wpdb;

        $slug = str_replace( array( "/product/", "/" ), "", $_SERVER['REQUEST_URI'] );

        $sql = "
            SELECT
                ID
            FROM
                $wpdb->posts
            WHERE
                post_type = \"product\"
            AND
                post_name = \"%s\"
        ";

        return $wpdb->get_var( $wpdb->prepare( $sql, $slug ) );

    }


    /*
     *
     * Admin: Add Bulk Edit Page
     *
     */
    public function bulk_edit_page() {

        add_submenu_page( 'woocommerce', __('Bulk Edit Variation Images', 'jck-wt'), __('WooThumbs Bulk', 'jck-wt'), 'manage_woocommerce', $this->bulk_edit_slug, array( $this, 'bulk_edit_page_display' ) );

    }


    /*
     *
     * Admin: Display Bulk Edit Page
     *
     */
    public function bulk_edit_page_display() {

        if ( !current_user_can( 'manage_options' ) ) {
            wp_die( __( 'You do not have sufficient permissions to access this page.', 'jck-wt') );
        }

        require_once 'inc/admin/bulk-edit.php';

    }

    /*
     *
     * Admin: Add tab to product edit page
     *
     */
    public function product_tab( $tabs ) {
        global $post;

        echo '<li class="'.$this->slug.'_options_tab"><a href="#'.$this->slug.'_options">'.__('WooThumbs', 'jck-wt').'</a></li>';

    }


    /*
     *
     * Admin: Add custom product fields
     *
     */
    public function product_tab_fields() {

        global $woocommerce, $post;

        $product_settings = get_post_meta($post->ID, '_jck_wt', true);

        echo '<div id="'.$this->slug.'_options" class="panel woocommerce_options_panel">';

            // Disable WooThumbs
            woocommerce_wp_checkbox(
                array(
                    'id'            => 'disable_woothumbs',
                    'label'         => __('Disable WooThumbs?', 'jck-wt')
                )
            );

            // Video URL
            woocommerce_wp_text_input(array(
                'id' => 'jck-wt-video-url',
                'name' => 'jck_wt[video_url]',
                'label' => __('Video URL', 'jck-wt'),
                'desc_tip' => true,
                'description' => __('Video URL - most video hosting services are supported.', 'jck-wt'),
                'value' => isset($product_settings['video_url']) ? $product_settings['video_url'] : ""
            ));

        echo '</div>';

    }


    /*
     *
     * Admin: Save custom product fields
     *
     */
    public function save_product_fields( $post_id ) {

        $product_settings = array();

        // Disable WooThumbs
        $disable_woothumbs = isset( $_POST['disable_woothumbs'] ) ? 'yes' : 'no';
        update_post_meta( $post_id, 'disable_woothumbs', $disable_woothumbs );

        if( isset($_POST['jck_wt']) ) {

            if( isset($_POST['jck_wt']['video_url']) ) {

                $product_settings['video_url'] = $_POST['jck_wt']['video_url'];

            }

            update_post_meta( $post_id, '_jck_wt', $product_settings );

        }

        $this->delete_transients( true, $post_id );

    }




    /**
     * Helper: Delete all woothumbs transient
     *
     * @param bool $force
     */
    public function delete_transients( $force = false, $product_id = false ) {

        if( isset( $_POST['jck-wt-delete-image-cache'] ) || $force === true ) {

            global $wpdb;

            $transients = $wpdb->get_results(
                $wpdb->prepare(
                    "
                    SELECT * FROM $wpdb->options
                    WHERE `option_name` LIKE '%s'
                    ",
                    '%transient_jck-wt_%'
                )
            );

            if( $transients ) {

                foreach( $transients as $transient ) {

                    $transient_name = str_replace('_transient_', '', $transient->option_name);
                    delete_transient( $transient_name );

                }

            }

            if( $product_id ) {

                $dvi_transient_name = $this->get_transient_name( $product_id, "dvi" );
                delete_transient( $dvi_transient_name );

                $all_images_transient_name = $this->get_transient_name( $product_id, "all-images" );
                delete_transient( $all_images_transient_name );

            }

        }

    }


    /*
     *
     * Admin: Save Bulk Edit Page
     *
     */
    function bulk_save() {

        check_ajax_referer($this->ajax_nonce_string, 'nonce');

        header('Content-Type: application/json');

        $return = array('result' => 'success', 'content' => '', 'message' => '');

        $images = trim($_POST['images']);

        // Validate input
        $re = '/^\d+(?:,\d+)*$/'; // numbers or commas

        // if input contains only numbers or commas OR nothing was entered
        if (preg_match($re, $images) || $images == "") {

            $prevImages = get_post_meta($_POST['varid'], 'variation_image_gallery', true);
            $updatedImages = update_post_meta($_POST['varid'], 'variation_image_gallery', $images, $prevImages);

            if ($prevImages == $images) {
                $return['result'] = 'no-change';
            }
            elseif ($updatedImages === false) {
                $return['result'] = 'failed';
            }

            // if any other character is found
        } else {

            $return['result'] = 'invalid-format';

        }

        switch ($return['result']) {
        case 'no-change':
            $return['message'] = __('There was no change.', 'jck-wt');
            break;
        case 'invalid-format':
            $return['message'] = __('Please use only numbers and commas.', 'jck-wt');
            break;
        case 'failed':
            $return['message'] = __('Sorry, an error occurred. Please try again.', 'jck-wt');
            break;
        case 'empty':
            $return['message'] = __('Nothing was entered.', 'jck-wt');
            break;
        }

        $return['postdata'] = $_POST;

        echo json_encode($return);

        $this->delete_transients( true );

        wp_die();

    }


    /*
     *
     * Admin: Setup new media column for image IDs
     *
     */
    function media_columns() {
        add_filter( 'manage_media_columns', array( $this, 'media_id_col' ) );
        add_action( 'manage_media_custom_column', array( $this, 'media_id_col_val' ), 10, 2 );
    }


    /*
     *
     * Admin: Media column name
     *
     */
    function media_id_col( $cols ) {
        $cols["mediaid"] = "Image ID";
        return $cols;
    }


    /*
     *
     * Admin: media column content
     *
     * @param str $column_name
     * @param int $id
     *
     * @return str
     *
     */
    function media_id_col_val( $column_name, $id ) {
        if ($column_name == 'mediaid') echo $id;
    }


    /*
     *
     * Admin: Register required plugins
     *
     */
    function register_required_plugins() {

        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => 'Redux Framework',
                'slug'      => 'redux-framework',
                'required'  => true,
            ),

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(

            'id'           => $this->slug.'-plugins',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => $this->slug.'-plugins-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'jck-wt'),
                'menu_title'                      => __( 'Install Plugins', 'jck-wt'),
                'installing'                      => __( 'Installing Plugin: %s', 'jck-wt'), // %s = plugin name.
                'oops'                            => __( 'Something went wrong with the plugin API.', 'jck-wt'),
                'notice_can_install_required'     => _n_noop( $this->name.' requires the following plugin: %1$s.', $this->name.' requires the following plugins: %1$s.', $this->slug ), // %1$s = plugin name(s).
                'notice_can_install_recommended'  => _n_noop( $this->name.' recommends the following plugin: %1$s.', $this->name.' recommends the following plugins: %1$s.', $this->slug ), // %1$s = plugin name(s).
                'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', $this->slug ), // %1$s = plugin name(s).
                'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', $this->slug ), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', $this->slug ), // %1$s = plugin name(s).
                'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', $this->slug ), // %1$s = plugin name(s).
                'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with '.$this->name.': %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with '.$this->name.': %1$s.', $this->slug ), // %1$s = plugin name(s).
                'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', $this->slug ), // %1$s = plugin name(s).
                'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', $this->slug ),
                'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', $this->slug ),
                'return'                          => __( 'Return to Required Plugins Installer', 'jck-wt'),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'jck-wt'),
                'complete'                        => __( 'All plugins installed and activated successfully. %s', 'jck-wt'), // %s = dashboard link.
                'nag_type'                        => 'error' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            )
        );

        tgmpa( $plugins, $config );

    }


    /*
     *
     * Admin: Scripts
     *
     */
    public function admin_scripts() {

        global $post, $pagenow;

        if (
            ($post && (get_post_type( $post->ID ) == "product" && ($pagenow == "post.php" || $pagenow == "post-new.php"))) ||
            ($pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == $this->bulk_edit_slug)
        ) {

            wp_enqueue_script( $this->slug, plugins_url('assets/admin/js/admin-scripts.js', __FILE__), array('jquery'), '2.0.1', true );
            wp_enqueue_style( 'jck_wt_admin_css', plugins_url('assets/admin/css/admin-styles.css', __FILE__), false, '2.0.1' );

            $vars = array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( $this->ajax_nonce_string ),
                'slug' => $this->slug
            );

            wp_localize_script( $this->slug, 'jck_wt_vars', $vars );

        }

    }


    /*
     *
     * Admin: Save variation images
     *
     * @param int $variation_id
     * @param int $i
     *
     */
    function save_product_variation( $variation_id, $i ) {

        $this->delete_transients( true, $variation_id );

        if ( isset( $_POST['variation_image_gallery'][$variation_id] ) ) {

            update_post_meta($variation_id, 'variation_image_gallery', $_POST['variation_image_gallery'][$variation_id]);

        }

    }


    /*
     *
     * Ajax: Load thumbnails via ajax for variation tabs
     *
     * @jck: change to new method
     *
     */
    function admin_load_thumbnails() {

        if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], $this->ajax_nonce_string ) ) { die ( 'Invalid Nonce' ); }

        $attachments = get_post_meta($_GET['varID'], 'variation_image_gallery', true);
        $attachmentsExp = array_filter(explode(',', $attachments));
        $image_ids = array(); ?>

			<ul class="wooThumbs">

				<?php if (!empty($attachmentsExp)) { ?>

					<?php foreach ($attachmentsExp as $id) { $image_ids[] = $id; ?>
						<li class="image" data-attachment_id="<?php echo $id; ?>">
							<a href="#" class="delete" title="Delete image"><?php echo wp_get_attachment_image( $id, 'thumbnail' ); ?></a>
						</li>
					<?php } ?>

				<?php } ?>

			</ul>
			<input type="hidden" class="variation_image_gallery" name="variation_image_gallery[<?php echo $_GET['varID']; ?>]" value="<?php echo $attachments; ?>">

		<?php exit;
    }


    /*
     *
     * Frontend: Remove product images
     *
     */
    public function remove_hooks() {

        if ( apply_filters( 'woothumbs_enabled', $this->is_enabled() ) ) {

            remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

            // Mr. Tailor
            remove_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );
            remove_action( 'woocommerce_product_summary_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

            // Remove images from Bazar theme
            if ( class_exists( 'YITH_WCMG' ) ) {
                $this->remove_filters_for_anonymous_class( 'woocommerce_before_single_product_summary', 'YITH_WCMG_Frontend', 'show_product_images', 20 );
                $this->remove_filters_for_anonymous_class( 'woocommerce_product_thumbnails', 'YITH_WCMG_Frontend', 'show_product_thumbnails', 20 );
            }

        }

    }


    /*
     *
     * Frontend: Add product images
     *
     * @param str $variable
     *
     * @return str
     *
     */
    public function show_product_images() {

        if ( apply_filters( 'woothumbs_enabled', $this->is_enabled() ) ) {

            if ( !in_array( 'redux-framework/redux-framework.php', $this->active_plugins ) ) {

                echo '<p>'.sprintf( __('You need to install and enable the <a href="%s" target="_blank">Redux Framework</a> plugin before your images are shown.', 'jck-wt'), 'https://wordpress.org/plugins/redux-framework/' ).'</p>';

            } else {

                require 'inc/images.php';

            }

        }

    }


    /*
     *
     * Frontend: Register scripts and styles
     *
     */
    public function register_scripts_and_styles() {

        global $jck_wt, $post;

        if( !$post )
            return;

        if ( ( ( function_exists('is_product') && is_product() ) || has_shortcode( $post->post_content, 'product_page' ) ) && apply_filters( 'woothumbs_enabled', $this->is_enabled() ) ) {

            // Plugins/Libs

            $this->enqueue_photoswipe();
            $this->enqueue_tooltipster();

            // CSS

            $this->load_file( $this->slug . '-css', '/assets/frontend/css/main.min.css' );

            // Scripts

            $this->load_file( $this->slug . '-script', '/assets/frontend/js/main.min.js', true );

            $vars = array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( $this->ajax_nonce_string ),
                'loading_icon' => plugins_url('assets/frontend/img/loading.gif', __FILE__),
                'slug' => $this->slug,
                'options' => $jck_wt,
                'text' => array(
                    'fullscreen' => __('Fullscreen', 'jck-wt'),
                    'video' => __('Play Video', 'jck-wt')
                )
            );

            wp_localize_script( $this->slug . '-script', 'jck_wt_vars', $vars );

            add_action( 'wp_head', array( $this, 'dynamic_css' ) );

        }

    }



    /**
     *
     * Enqueue Photoswipe
     *
     */
    public function enqueue_photoswipe() {

        if( $this->maybe_enable_fullscreen() ) {

            $this->load_file( 'photoswipe', '/assets/frontend/js/lib/photoswipe/photoswipe.min.js', true );
            $this->load_file( 'photoswipe-ui', '/assets/frontend/js/lib/photoswipe/photoswipe-ui-default.min.js', true );

            add_action( 'wp_footer', array( $this, 'photoswipe_html' ), 1 );

        }

    }



    /**
     *
     * Enqueue Tooltipster
     *
     */
    public function enqueue_tooltipster() {

        global $jck_wt;

        if( isset( $jck_wt['iconTooltips'] ) && $jck_wt['iconTooltips'] ) {

            $this->load_file( 'tooltipster', '/assets/frontend/js/lib/tooltipster/jquery.tooltipster.min.js', true );
            $this->load_file( 'tooltipster', '/assets/frontend/css/lib/tooltipster/tooltipster.css' );

        }

    }



    /**
     *
     * Output photoswipe HTML template
     *
     */
    public function photoswipe_html() {
        include_once( $this->plugin_path . '/inc/pswp.php' );
    }



    /**
     * Helper: Maybe enable fullscreen
     */
    public function maybe_enable_fullscreen() {

        global $jck_wt, $post;

        $product_settings = (array) get_post_meta($post->ID, '_jck_wt', true);

        if(
            ( isset( $jck_wt['enableLightbox'] ) && $jck_wt['enableLightbox'] ) ||
            ( isset( $product_settings['video_url'] ) && $product_settings['video_url'] != "" )
        ) {

            return true;

        } else {

            return false;

        }

    }


    /*
     *
     * Frontend: Add dynamic CSS to wp_head
     *
     */
    public function dynamic_css() {

        include $this->plugin_path.'assets/frontend/css/dynamic-styles.css.php';

    }


    /*
     *
     * Helper: register and enqueue a file
     *
     * @param str $handle
     * @param str $file_path
     * @param str $is_script
     *
     */
    private function load_file( $handle, $file_path, $is_script = false ) {

        $url = plugins_url($file_path, __FILE__);
        $file = plugin_dir_path(__FILE__) . $file_path;

        if ( file_exists( $file ) ) {
            if ( $is_script ) {
                wp_register_script( $handle, $url, array('jquery'), $this->version, true ); //depends on jquery
                wp_enqueue_script( $handle );
            } else {
                wp_register_style( $handle, $url, array(), $this->version );
                wp_enqueue_style( $handle );
            }
        }

    }


    /*
     *
     * Helper: Allow to remove method for a hook when it's a class method used
     *
     * @param str $hook_name Name of the wordpress hook
     * @param str $class_name Name of the class where the add_action resides
     * @param str $method_name Name of the method to unhook
     * @param str $priority The priority of which the above method has in the add_action
     *
     */
    public function remove_filters_for_anonymous_class( $hook_name = '', $class_name ='', $method_name = '', $priority = 0 ) {

        global $wp_filter;

        // Take only filters on right hook name and priority
        if ( !isset($wp_filter[$hook_name][$priority]) || !is_array($wp_filter[$hook_name][$priority]) )
            return false;

        // Loop on filters registered
        foreach ( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {
            // Test if filter is an array ! (always for class/method)
            if ( isset($filter_array['function']) && is_array($filter_array['function']) ) {
                // Test if object is a class, class and method is equal to param !
                if ( is_object($filter_array['function'][0]) && get_class($filter_array['function'][0]) && get_class($filter_array['function'][0]) == $class_name && $filter_array['function'][1] == $method_name ) {
                    unset($wp_filter[$hook_name][$priority][$unique_id]);
                }
            }

        }

        return false;

    }


    /*
     *
     * Helper: Get default variaiton ID
     *
     * Grabs the default variation ID, depending on the
     * settings for that particular product
     *
     * @return int
     *
     */
    public function get_default_variation_id() {

        global $post, $woocommerce, $product;

        $default_variation_id = $product->id;
        $transient_name = $this->get_transient_name( $product->id, "dvi" );

        if ( false === ( $default_variation_id = get_transient( $transient_name ) ) ) {

            if ($product->product_type == 'variable') {

                $defaults = $product->get_variation_default_attributes();
                $variations = array_reverse($product->get_available_variations());

                if (!empty($defaults)) {

                    foreach ($variations as $variation) {

                        $varCount = count($variation["attributes"]);
                        $attMatch = 0;
                        $partMatch = 0;

                        foreach ($defaults as $dAttName => $dAttVal) {

                            if (isset($variation["attributes"]['attribute_'.$dAttName])) {

                                $theAtt = $variation["attributes"]['attribute_'.$dAttName];

                                if ($theAtt == $dAttVal) {
                                    $attMatch++;
                                    $partMatch++;
                                }

                                if ($theAtt == "") {
                                    $partMatch++;
                                }

                            }

                        }

                        if ($varCount == $partMatch) {
                            $default_variation_id = $variation['variation_id'];
                        }

                        if ($varCount == $attMatch) {
                            $default_variation_id = $variation['variation_id'];
                        }

                    }

                }

            }

            set_transient( $transient_name, $default_variation_id, 12 * HOUR_IN_SECONDS );

        }

        return $default_variation_id;

    }


    /*
     *
     * Helper: Get selected variation
     *
     * If the URL contains variation data, get the related variation ID,
     * if it exists, and overwrite the current selected ID
     *
     * @param int $currId
     *
     * @return int
     *
     */
    public function get_selected_varaiton($currId) {
        global $post, $woocommerce, $product;

        if ($product->product_type == 'variable') {

            $selected_atts = $this->get_atts_from_query_string();
            $selected_atts_count = count($selected_atts);
            $available_atts_count = count($product->get_variation_attributes());

            if( empty($selected_atts) || $selected_atts_count < $available_atts_count )
                return $currId;

            $args = array(
            	'post_type' => 'product_variation',
            	'post_parent' => (int)$currId,
            	'meta_query' => array( 'relation' => 'AND' )
            );

            foreach( $selected_atts as $key => $value ) {
                $args['meta_query'][] = array(
                    'key'     => $key,
                    'value'   => $value,
                    'compare' => '='
                );
            }

            $variation = new WP_Query( $args );

            if( $variation->found_posts >= 1 ) {
                $currId = $variation->posts[0]->ID;
            }

            wp_reset_query();

        }

        return $currId;
    }



    /**
     *
     * Helper: Get attributes from query string
     *
     */
    public function get_atts_from_query_string() {

        $atts = array();

        if( isset( $_GET ) ) {

            foreach( $_GET as $key => $value ) {

                if( strpos($key, 'attribute_') !== false ) {

                    $atts[$key] = $value;

                }

            }

        }

        return $atts;

    }


    /**
     * Helper: WPML - Get original variation ID
     *
     * If WPML is active and this is a translated variaition, get the original ID.
     *
     * @param int $id
     */
    public function wpml_get_original_variation_id( $id ) {

        $wpml_original_variation_id = get_post_meta( $id, '_wcml_duplicate_of_variation', true );

        if( $wpml_original_variation_id )
            $id = $wpml_original_variation_id;

        return $id;

    }

    /**
     * Helper: Get all images transient name for specific variation/product
     *
     * @param int $id
     * @param str $type
     */
    public function get_transient_name( $id, $type ) {

        if( $type === "all-images" ) {

            $id = $this->wpml_get_original_variation_id( $id );

            return sprintf("%s_variation_image_ids_%d", $this->slug, $id);

        } elseif( $type === "dvi" ) {

            return sprintf('%s-dvi-%d', $this->slug, $id);

        }

        return false;

    }


    /*
     *
     * Helper: Get all image IDs for a specifc variation
     *
     * @param int $id
     *
     */
    public function get_all_image_ids( $id ) {

        $transient_name = $this->get_transient_name( $id, "all-images" );

        if ( false === ( $all_images = get_transient( $transient_name ) ) ) {

            $all_images = array();
            $show_gallery = false;

            // Main Image
            if (has_post_thumbnail($id)) {

                $all_images['featured'] = get_post_thumbnail_id($id);

            } else {

                $prod = get_post($id);
                $prod_parent_id = $prod->post_parent;
                if ($prod_parent_id && has_post_thumbnail($prod_parent_id)) {
                    $all_images['featured'] = get_post_thumbnail_id($prod_parent_id);
                } else {
                    $all_images[] = 'placeholder';
                }

                $show_gallery = true;
            }

            // WooThumb Attachments

            if (get_post_type($id) == 'product_variation') {
                $wt_attachments = array_filter(explode(',', get_post_meta($id, 'variation_image_gallery', true)));
                $all_images = array_merge($all_images, $wt_attachments);
            }

            // Gallery Attachments

            if (get_post_type($id) == 'product' || $show_gallery) {
                $product = get_product($id);
                $attach_ids = $product->get_gallery_attachment_ids();

                if (!empty($attach_ids)) {
                    $all_images = array_merge($all_images, $attach_ids);
                }
            }

            set_transient( $transient_name, $all_images, 12 * HOUR_IN_SECONDS );

        }

        return apply_filters( $this->slug . '-all-image-ids', $all_images, $id );

    }


    /*
     *
     * Helper: Get all image sizes
     *
     * @param int $variation_id
     *
     */
    public function get_all_image_sizes( $variation_id ) {

        global $jck_wt;

        $image_ids = $this->get_all_image_ids( absint($variation_id) );
        $images = array();

        if (!empty($image_ids)) {
            foreach ($image_ids as $image_id):

                $transient_name = sprintf("%s_variation_image_sizes_%d", $this->slug, $image_id);

                if ( false === ( $image_sizes = get_transient( $transient_name ) ) ) {

                    $image_sizes = false;

                    if ($image_id == 'placeholder') {
                        $image_sizes = array(
                            'large' => array( wc_placeholder_img_src( $jck_wt['largeImageSize'] ) ),
                            'single' => array( wc_placeholder_img_src('shop_single') ),
                            'thumb' => array( wc_placeholder_img_src('shop_thumbnail') ),
                            'alt' => '',
                            'title' => ''
                        );
                    } else {

                        if (!array_key_exists($image_id, $images)) {
                            $attachment = $this->wp_get_attachment($image_id);

                            if( !$attachment )
                                continue;

                            $large = wp_get_attachment_image_src( $image_id, $jck_wt['largeImageSize'] );
                            $single = wp_get_attachment_image_src( $image_id, 'shop_single' );
                            $thumb = wp_get_attachment_image_src( $image_id, 'shop_thumbnail' );

                            $image_sizes = array(
                                'large' => $large,
                                'single' => $single,
                                'thumb' => $thumb,
                                'alt' => $attachment['alt'],
                                'title' => $attachment['title']
                            );

                            // Get retina images
                            if( function_exists('wr2x_get_retina_from_url') ) {

                                foreach( $image_sizes as $key => $image_data ) {

                                    if( $key == "alt" || $key == "title" )
                                        continue;

                                    if( $image_data ) {

                                        $retina_url = wr2x_get_retina_from_url( $image_data[0] );

                                        if( $retina_url ) {

                                            $image_sizes[$key]['retina'] = array(
                                                $retina_url,
                                                $image_data[1]*2,
                                                $image_data[2]*2
                                            );

                                        }

                                    }

                                }

                            }

                        }

                    }

                    set_transient( $transient_name, $image_sizes, 12 * HOUR_IN_SECONDS );

                }

                if( $image_sizes )
                    $images[] = $image_sizes;

            endforeach;
        }

        return $images;

    }


    /*
     *
     * Helper: Get an attachment with additional data
     *
     * @param arr $attachment_id
     *
     */
    public function wp_get_attachment( $attachment_id ) {

        $attachment = get_post( $attachment_id );

        if( !$attachment )
            return false;

        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );

    }



    /**
     * Ajax: Get variation by ID
     */
    public function ajax_get_variation() {

        $response = array(
            'success' => false,
            'variation' => false
        );

        if( ( isset( $_GET['variation_id'] ) && !empty( $_GET['variation_id'] ) ) && ( isset( $_GET['product_id'] ) && !empty( $_GET['product_id'] ) )  ) {

            $transient_name = sprintf("%s_variation_%d", $this->slug, $_GET['variation_id']);

            if ( false === ( $variation = get_transient( $transient_name ) ) ) {

                $variable_product = wc_get_product( absint( $_GET['product_id'] ), array( 'product_type' => 'variable' ) );
                $variation = $variable_product->get_available_variation( absint( $_GET['variation_id'] ) );

                set_transient( $transient_name, $variation, 12 * HOUR_IN_SECONDS );

            }

            $response['success'] = true;
            $response['variation'] = $variation;

        }

        // generate the response
    	$response['get'] = $_GET;

    	// response output
    	header('Content-Type: text/javascript; charset=utf8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Max-Age: 3628800');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    	echo htmlspecialchars($_GET['callback']) . '(' . json_encode( $response ) . ')';

        wp_die();

    }



    /**
     * Frontend: Add YITH Wishlist Icon
     */

    public function add_yith_wishlist_icon() {

        if ( in_array( 'yith-woocommerce-wishlist/init.php', $this->active_plugins ) ) {

            global $product;

            $default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

			if( ! empty( $default_wishlists ) ){
				$default_wishlist = $default_wishlists[0]['ID'];
			}
			else{
				$default_wishlist = false;
			}

            $added = YITH_WCWL()->is_product_in_wishlist( $product->id, $default_wishlist );
			$wishlist_url = YITH_WCWL()->get_wishlist_url();

            ?>

            <div class="jck-wt-wishlist-buttons <?php if( $added ) echo "jck-wt-wishlist-buttons--added"; ?>">

                <a class="jck-wt-wishlist-buttons__browse" href="<?php echo $wishlist_url; ?>" data-jck-wt-tooltip="<?php _e('Browse Wishlist', 'jck-wt'); ?>"><i class="jck-wt-icon jck-wt-icon-heart"></i></a>

                <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->id ) )?>" rel="nofollow" data-product-id="<?php echo $product->id; ?>" data-product-type="<?php echo $product->product_type; ?>" class="jck-wt-wishlist-buttons__add add_to_wishlist" data-jck-wt-tooltip="<?php _e('Add to Wishlist', 'jck-wt'); ?>"><i class="jck-wt-icon jck-wt-icon-heart"></i></a>

            </div>

            <?php
        }

    }

    /**
     * Add variation images to the API
     *
     * @param arr $product_data
     * @param obj $product
     * @param arr $fields
     * @param obj $server
     */
    public function woocommerce_api_product_response( $product_data, $product, $fields, $server ) {

        if( !empty( $product_data['variations'] ) ) {

            foreach( $product_data['variations'] as $i => $variation ) {

                $product_data['variations'][$i]['images'] = $this->get_all_image_sizes( $variation['id'] );

            }

        }

        return $product_data;

    }

    /**
     * Bulk: Get current bulk page params
     *
     * @param arr $ignore
     * @return arr
     */
    public function get_bulk_parameters( $ignore = array() ) {

        $get = $_GET;

        if( empty( $get ) )
            return $get;

        foreach( $get as $key => $value ) {
            if( empty( $value ) )
                unset( $get[$key] );
        }

        if( empty( $ignore ) )
            return $get;

        foreach( $ignore as $ignore_key ) {
            unset($get[$ignore_key]);
        }

        return $get;

    }

    /**
     * Bulk: Output bulk page params
     *
     * @param arr $ignore
     */
    public function output_bulk_parameters( $ignore = array() ) {

        $params = $this->get_bulk_parameters( $ignore );

        if( !empty( $params ) ) {
            foreach( $params as $key => $value ) {
                if( is_string( $value ) ) {
                    printf('<input type="hidden" name="%s" value="%s">', $key, $value);
                }
            }
        }

    }

    /**
     * Bulk: Get pagination link
     *
     * @param int $page_number
     */
    public function get_pagination_link( $page_number = false ) {

        $params = $this->get_bulk_parameters( array('paged') );

        if( $page_number )
            $params['paged'] = $page_number;

        return sprintf( '?%s', http_build_query( $params ) );

    }

}


$jck_woothumbs_class = new JCKWooThumbs();