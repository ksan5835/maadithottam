	<?php $h_sm_locations = ot_get_option('h_sm_locations');?>
	<?php $wt_phone = ot_get_option('wt_phone');?>
	<?php $wt_phone2 = ot_get_option('wt_phone2');?>
	<?php $tt_dates1 = ot_get_option('tt_dates1');?>
	<?php $tt_hours1 = ot_get_option('tt_hours1');?>
	<?php $tt_dates2 = ot_get_option('tt_dates2');?>
	<?php $tt_hours2 = ot_get_option('tt_hours2');?>
	<?php $tt_dates3 = ot_get_option('tt_dates3');?>
	<?php $tt_hours3 = ot_get_option('tt_hours3');?>
	<?php $booking_content = ot_get_option('booking_content');?>
	<?php $custom_c_content = ot_get_option('custom_c_content');?>
	<?php $logo_location = ot_get_option('logo_location');?>
	<?php $h_sm_locations = ot_get_option('h_sm_locations'); ?>
	<?php $message_box_location = ot_get_option('message_box_location'); ?>
	<?php $header_search = ot_get_option('header_search');?>
	<?php $catalog_type = ot_get_option('catalog_type'); ?>	
	<?php $s_cart = ot_get_option('s_cart'); ?>

	<?php if($logo_location=="left"){?>
	
		<div class="header-middle-logo-left clearfix">
		
		<?php get_template_part('includes/header-middle/logo' ) ?>
		
		<?php if($message_box_location!="right"):?>
		
			<?php if($h_sm_locations!="right_h"):?>
			
				<?php if($s_cart!='disable'){ ?><?php if(!$catalog_type){?><hr class="visible-xs visible-sm"><?php }?><?php }?>
				
				<?php get_template_part('includes/header-middle/cart' ) ?>
			<?php endif; ?>
			
			<?php if($h_sm_locations=="right_h"):?>
			
				<hr class="visible-xs visible-sm">
			
				<?php get_template_part('includes/header_social_media' ) ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if($message_box_location=="left"):?>
			<hr class="visible-xs visible-sm">
			<?php get_template_part('includes/header-middle/header-message-box' ) ?>
		<?php endif; ?>
		
		<?php if($message_box_location=="right"):?>
			<hr class="visible-xs visible-sm">
			<?php get_template_part('includes/header-middle/header-message-box' ) ?>
		<?php endif; ?>
		
		<?php if($message_box_location!="left"):?>
		
			<?php if($h_sm_locations=="left_h"):?>
			
				<hr class="visible-xs visible-sm">
				<?php get_template_part('includes/header_social_media' ) ?>
				
			<?php endif; ?>
		
			<?php if($h_sm_locations!="left_h"):?>
			
				<?php if($header_search != "none"){ ?><hr class="visible-xs visible-sm"><?php }?>
				<?php get_template_part('includes/header-middle/header_search' ) ?>
				
			<?php endif; ?>
			
		<?php endif; ?>
		
		
		</div>
	
	<?php }else{?>
	
		<div class="header-middle-logo-center clearfix">
		
			<div class="header-middle-logo-center-left-conteiner">
			
				<?php if($message_box_location!="left"):?>
					<?php if($h_sm_locations!="left_h"):?>
						
						<?php get_template_part('includes/header-middle/header_search' ) ?>
						
					<?php endif; ?>
					
					<?php if($h_sm_locations=="left_h"):?>
						<?php get_template_part('includes/header_social_media' ) ?>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if($message_box_location=="left"):?>
					<?php get_template_part('includes/header-middle/header-message-box' ) ?>
				<?php endif; ?>
			
			</div>
	
		
			<?php get_template_part('includes/header-middle/logo' ) ?>
		
			
			<div class="header-middle-logo-center-right-conteiner">
			
				<?php if($message_box_location!="right"):?>
					<?php if($h_sm_locations!="right_h"):?>
						<?php get_template_part('includes/header-middle/cart' ) ?>
					<?php endif; ?>
				
					<?php if($h_sm_locations=="right_h"):?>
						<?php get_template_part('includes/header_social_media' ) ?>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if($message_box_location=="right"):?>
					<?php get_template_part('includes/header-middle/header-message-box' ) ?>
				<?php endif; ?>
			
			</div>
	
		</div>
	
	<?php }?>