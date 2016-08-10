<?php $header_search = ot_get_option('header_search');?>
<?php $h_sm_locations = ot_get_option('h_sm_locations');?>
<?php $header_search_tm = ot_get_option('header_search_tm');?>
<?php $message_box_location = ot_get_option('message_box_location');?>

<?php if($header_search != "none"){ ?>
<div class="header-middle-search"<?php if($header_search_tm){?> style="margin-top:<?php echo esc_attr($header_search_tm); ?>px;"<?php }?>>
	
	<?php if($header_search == "shop_search"){ ?>
		<form role="form" method="get" class="" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			<input type="hidden" name="post_type" value="product" />
		    <button type="submit" class="search-btn"></button>
		    <input type="input" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e( 'Search For Products', GETTEXT_DOMAIN ); ?>">
			
		</form>
	<?php } elseif($header_search == "theme_search"){?>
		<form role="form" method="get" class="" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
		    <button type="submit" class="search-btn"></button>
		    <input type="input" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e( 'Search Site', GETTEXT_DOMAIN ); ?>">
		</form>
	<?php }?>
	
</div>
<?php }else{?>
	<?php if($h_sm_locations != "left_h"&&$message_box_location!="left"){ ?>
		&nbsp;
	<?php }?>
<?php }?>