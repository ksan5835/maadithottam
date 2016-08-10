<?php
function lpd_html_widget_title( $title ) {
	//HTML tag opening/closing brackets
	$title = str_replace( '[', '<', $title );
	$title = str_replace( '[/', '</', $title );
	
	$title = str_replace( 'select]', 'span>', $title );
	
	return $title;
}
add_filter( 'widget_title', 'lpd_html_widget_title' );

function lpd_custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'lpd_custom_tag_cloud_widget' );
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'lpd_custom_tag_cloud_widget' );

function lpd_js_remove_wpautop($content, $autop = false) {

  if($autop) {
      $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content)."\n");
  }
  return do_shortcode( shortcode_unautop($content) );
}

/* fix current_page_parent for custom posts [for archive is_post_type_archive( 'post_type' )]
================================================== */
function lpd_fix_blog_menu_css_class( $classes, $item ) {
    if ( is_tax( 'portfolio_tags' ) || is_tax( 'portfolio_category' ) || is_singular( 'portfolio' )) {
        if ( $item->object_id == get_option('page_for_posts') ) {
            $key = array_search( 'current_page_parent', $classes );
            if ( false !== $key )
                unset( $classes[ $key ] );
        }
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'lpd_fix_blog_menu_css_class', 10, 2 );

/*  wpml functions
================================================== */
function lpd_language_selector_flags_2(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');

    
	if(!empty($languages)){
        foreach($languages as $l){
	        if($l['active']) echo '<span class="current-lang">';
	        	if($l['active']) echo '<span class="language_code">'.esc_html($l['language_code']).'</span>';
	        if($l['active']) echo '</span>';    
        }
    }
	if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a class="lpd-tooltip" data-toggle="tooltip" data-placement="bottom" title="'.esc_attr($l['translated_name']).'" href="'.esc_url($l['url']).'">';

            if(!$l['active']) echo ''.esc_html($l['language_code']).'';
            if(!$l['active']) echo '</a>';
        }
    }
    
}

function lpd_language_selector_flags_mobile(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
        echo '<span class="flag">';
            if(!$l['active']) echo '<a href="'.esc_url($l['url']).'">';
            echo '<img title="'.esc_attr($l['translated_name']).'" src="'.esc_url($l['country_flag_url']).'" alt="'.esc_attr($l['language_code']).'" height="12"/>';
            echo ''.esc_html($l['translated_name']).'';
            if(!$l['active']) echo '</a>';
        echo '</span>';
        }
    }
}

/*  blog pagination
================================================== */
function lpd_show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*  get attachment id
================================================== */
function lpd_get_attachment_id_from_src ($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

function new_lpd_get_attachment_id_from_src( $url ) {
	// Split the $url into two parts with the wp-content directory as the separator
	$parsed_url = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
	// Get the host of the current site and the host of the $url, ignoring www
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
	// Return nothing if there aren't any $url parts or if the current host and $url host do not match
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
	return;
	}
	// Now we're going to quickly search the DB for any attachment GUID with a partial path match
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	// Returns null if no attachment is found
	return $attachment[0];
} 


/* Excerpt&content words filter
================================================== */ 
function lpd_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
function lpd_excerpt_more($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' &#91;...&#93;';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
function lpd_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'lpd_excerpt_length', 999 );


/* post gallery
================================================== */ 
add_filter( 'post_gallery', 'lpd_post_gallery', 10, 2 );
function lpd_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'zoom',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, 'theme-size-1x1', true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                text-align: center;
                margin: 0;
                width: {$itemwidth}%;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->
        <div id='$selector' class='gallery galleryid-{$id}'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, 'theme-size-1x1', false, false) : wp_get_attachment_link($id, 'theme-size-1x1', true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div>\n";

    return $output;
}

?>