<?php 
    $footer_separator = ot_get_option('footer_separator');
    $footer_separator_color = ot_get_option('footer_separator_color');
	$footer_separator_icon = ot_get_option('footer_separator_icon');
	$footer_separator_icon_border = ot_get_option('footer_separator_icon_border');
?>

<?php if($footer_separator){?>
<div id="footer-separator"<?php if($footer_separator_color){?> style="background-color:<?php echo esc_attr($footer_separator_color);?>;"<?php }?>>
	<?php if($footer_separator_icon){?>
		<div class="footer-separator-icon"<?php if($footer_separator_icon_border){?> style="border-color:<?php echo esc_attr($footer_separator_icon_border);?>;"<?php }?>>
			<img class="footer-separator-icon-img" src="<?php echo esc_url($footer_separator_icon);?>" alt="">
		</div>
	<?php }?>
</div>
<?php }?>