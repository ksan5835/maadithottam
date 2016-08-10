<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Create a helper function for easy SDK access.
function woothumbs_fs() {
    global $woothumbs_fs;

    if ( ! isset( $woothumbs_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/sdk/start.php';

        $woothumbs_fs = fs_dynamic_init( array(
            'id'                => '282',
            'slug'              => 'woothumbs',
            'public_key'        => 'pk_26fc03a7c540e42f247db83ea42d9',
            'is_premium'        => false,
            'has_addons'        => false,
            'has_paid_plans'    => false,
            'is_org_compliant'  => false,
            'menu'              => array(
                'slug'       => 'jck-wt_options',
                'account'    => false,
                'contact'    => false,
                'support'    => false,
                'parent'     => array(
                    'slug' => 'woocommerce',
                ),
            ),
        ) );
    }

    return $woothumbs_fs;
}

// Init Freemius.
woothumbs_fs();