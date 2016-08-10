<?php require_once(ABSPATH .'/wp-admin/includes/plugin.php');?>

<?php get_template_part('includes/plug' );?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
	<?php get_template_part('includes/seo' ) ?>

	<?php get_template_part('includes/meta-viewport' ) ?>

    <?php get_template_part('includes/favicon' ) ?>
    
    <?php get_template_part('includes/typekit' ) ?>

    <?php wp_head();?>
    
</head>
<body <?php body_class(); ?>>

<div id="body-wrap">
	<div id="header">
		<?php get_template_part('includes/header_meta/header_meta' ) ?>
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-12">					
						<?php get_template_part('includes/header-middle/header-middle' ) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="header-bottom-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php get_template_part('includes/header-content' ) ?>
							<?php get_template_part('includes/menu' ) ?>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
