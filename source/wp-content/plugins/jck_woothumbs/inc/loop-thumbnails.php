<?php
/**
 * Loop thumbnail slider images
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $jck_wt;
$mode = ($jck_wt['thumbnailLayout'] == "above" || $jck_wt['thumbnailLayout'] == "below") ? "horizontal" : "vertical";

?>

<?php if(!empty($images)) { ?>

    <?php do_action( 'jck_wt_before_thumbnails_wrap' ); ?>

    <div class="<?php echo $this->slug; ?>-thumbnails-wrap <?php echo $this->slug; ?>-thumbnails-wrap--<?php echo $jck_wt['navigationType']; ?> <?php echo $this->slug; ?>-thumbnails-wrap--<?php echo $mode; ?>">

        <?php do_action( 'jck_wt_before_thumbnails' ); ?>

    	<div class="<?php echo $this->slug; ?>-thumbnails">

    	    <?php $image_count = count($images); ?>

    	    <?php if( $image_count > 1 ) { ?>

        	    <?php $i = 0; foreach($images as $image): ?>

        	        <?php $srcset = isset( $image['thumb']['retina'][0] ) ? sprintf('data-srcset="%s, %s 2x"', $image['thumb'][0], $image['thumb']['retina'][0]) : ""; ?>

            		<div class="<?php echo $this->slug; ?>-thumbnails__slide <?php if($i == 0) { ?><?php echo $this->slug; ?>-thumbnails__slide--active<?php } ?>" data-index="<?php echo $i; ?>">

            			<img class="<?php echo $this->slug; ?>-thumbnails__image" src="<?php echo $image['thumb'][0]; ?>" <?php echo $srcset; ?> title="<?php echo $image['title']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['thumb'][1]; ?>" height="<?php echo $image['thumb'][2]; ?>">

            		</div>

            	<?php $i++; endforeach; ?>

            	<?php

                // pad out thumbnails if there are less than the number
                // which are meant to be shown.

                if( $image_count < $jck_wt['thumbnailCount'] ) {

                	$empty_count = $jck_wt['thumbnailCount'] - $image_count;
                	$i = 0;

                	while( $i < $empty_count ) {

                    	echo "<div></div>";
                    	$i++;

                	}

            	}

            	?>

        	<?php } ?>

    	</div>

        <?php if( $jck_wt['navigationType'] == "sliding" && $jck_wt['enableNavigationControls'] ) { ?>

    	    <a href="javascript: void(0);" class="<?php echo $this->slug; ?>-thumbnails__control <?php echo $this->slug; ?>-thumbnails__control--<?php echo ( $mode == "horizontal" ) ? "left" : "up"; ?>" data-direction="prev"><i class="jck-wt-icon jck-wt-icon-<?php echo ( $mode == "horizontal" ) ? "left" : "up"; ?>-open-mini"></i></a>
            <a href="javascript: void(0);" class="<?php echo $this->slug; ?>-thumbnails__control <?php echo $this->slug; ?>-thumbnails__control--<?php echo ( $mode == "horizontal" ) ? "right" : "down"; ?>" data-direction="next"><i class="jck-wt-icon jck-wt-icon-<?php echo ( $mode == "horizontal" ) ? "right" : "down"; ?>-open-mini"></i></a>

        <?php } ?>

        <?php do_action( 'jck_wt_after_thumbnails' ); ?>

    </div>

    <?php do_action( 'jck_wt_after_thumbnails_wrap' ); ?>

<?php } ?>