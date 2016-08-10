<?php $header_meta= ot_get_option('header_meta');?>
<?php $header_meta_background = ot_get_option('header_meta_background');?>
<?php $hm_custom_pattern = ot_get_option('hm_custom_pattern');?>
<?php $hm_custom_bg = ot_get_option('hm_custom_bg');?>

<?php if(!$header_meta):?>
<div class="header-top<?php if ($header_meta_background) { ?> header-top-pattern-bg<?php } ?>"<?php if ($header_meta_background=='custom'||$hm_custom_bg) { ?> style="<?php if ($header_meta_background=='custom') { ?>background-image:url(<?php echo esc_attr($hm_custom_pattern);?>);<?php } ?><?php if ($hm_custom_bg) { ?>background-color: <?php echo esc_attr($hm_custom_bg);?>;<?php } ?>"<?php } ?>>
	<div class="header-meta-bottom-border">
		<div class="container">
			<div class="row">
				<div class="col-md-6 lpd-animated-link left_header_meta">
					<?php get_template_part('includes/header_meta/left_header_meta' ) ?>
				</div>
				<div class="col-md-6 lpd-animated-link right_header_meta">
					<?php get_template_part('includes/header_meta/right_header_meta' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>