	<?php $message_box_content = ot_get_option('message_box_content'); ?>
	<?php $message_box_icon_bg = ot_get_option('message_box_icon_bg'); ?>
	<?php $message_box_icon = ot_get_option('message_box_icon'); ?>
	<?php $message_box_type = ot_get_option('message_box_type'); ?>
	<?php $message_box_tm = ot_get_option('message_box_tm'); ?>
	<?php $message_box_location = ot_get_option('message_box_location'); ?>

	<?php if($message_box_content):?>
		<div class="header-message-box<?php if($message_box_location=="left"):?> header-middle-left-mb<?php endif; ?><?php if($message_box_icon):?><?php echo ' '.$message_box_type;?><?php endif; ?>"<?php if($message_box_tm):?> style="margin-top:<?php echo esc_attr($message_box_tm);?>px"<?php endif; ?>>
			<?php if($message_box_icon):?><div class="hmb-icon" style="background-color:<?php echo esc_attr($message_box_icon_bg);?>"><img src="<?php echo esc_url($message_box_icon);?>"></div><?php endif; ?>
			<?php echo $message_box_content;?>
		</div>
	<?php endif; ?>