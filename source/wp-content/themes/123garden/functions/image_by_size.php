<?php function lpd_getImageBySize( $params = array( 'post_id' => NULL, 'attach_id' => NULL, 'thumb_size' => 'thumbnail', 'class' => '' ) ) {
	//array( 'post_id' => $post_id, 'thumb_size' => $grid_thumb_size )
	if ( ( ! isset( $params['attach_id'] ) || $params['attach_id'] == NULL ) && ( ! isset( $params['post_id'] ) || $params['post_id'] == NULL ) ) return;
	$post_id = isset( $params['post_id'] ) ? $params['post_id'] : 0;

	if ( $post_id ) $attach_id = get_post_thumbnail_id( $post_id );
	else $attach_id = $params['attach_id'];

	$thumb_size = $params['thumb_size'];
	$thumb_class = ( isset( $params['class'] ) && $params['class'] != '' ) ? $params['class'] . ' ' : '';

	global $_wp_additional_image_sizes;
	$thumbnail = '';

	if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[$thumb_size] ) && is_array( $_wp_additional_image_sizes[$thumb_size] ) ) || in_array( $thumb_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) ) {
		//$thumbnail = get_the_post_thumbnail( $post_id, $thumb_size );
		$thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, array( 'class' => $thumb_class . 'attachment-' . $thumb_size ) );
		// TODO: APPLY FILTER
	} elseif ( $attach_id ) {
		if ( is_string( $thumb_size ) ) {
			preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
			if ( isset( $thumb_matches[0] ) ) {
				$thumb_size = array();
				if ( count( $thumb_matches[0] ) > 1 ) {
					$thumb_size[] = $thumb_matches[0][0]; // width
					$thumb_size[] = $thumb_matches[0][1]; // height
				} elseif ( count( $thumb_matches[0] ) > 0 && count( $thumb_matches[0] ) < 2 ) {
					$thumb_size[] = $thumb_matches[0][0]; // width
					$thumb_size[] = $thumb_matches[0][0]; // height
				} else {
					$thumb_size = false;
				}
			}
		}
		if ( is_array( $thumb_size ) ) {
			// Resize image to custom size
			$p_img = wpb_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
			$alt = trim( strip_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );

			if ( empty( $alt ) ) {
				$attachment = get_post( $attach_id );
				$alt = trim( strip_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
			}
			if ( empty( $alt ) )
				$alt = trim( strip_tags( $attachment->post_title ) ); // Finally, use the title
			if ( $p_img ) {
				$img_class = '';
				//if ( $grid_layout == 'thumbnail' ) $img_class = ' no_bottom_margin'; class="'.$img_class.'"
				$thumbnail = '<img class="' . $thumb_class . '" src="' . $p_img['url'] . '" width="' . $p_img['width'] . '" height="' . $p_img['height'] . '" alt="' . $alt . '" />';
				//TODO: APPLY FILTER
			}
		}
	}

	$p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );
	return array( 'thumbnail' => $thumbnail, 'p_img_large' => $p_img_large );
}?>