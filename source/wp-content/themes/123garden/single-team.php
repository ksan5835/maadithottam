<?php $sidebar_checkbox = get_post_meta($post->ID, 'sidebar_checkbox', true);?>

<?php get_header(); ?>

<?php get_template_part('includes/title-breadcrumb' ) ?>

<div id="main" class="inner-page <?php if ($sidebar_checkbox){?>left-sidebar-template<?php }?>">
	<div class="container">
		<div class="row">
			<div class="<?php if ( is_active_sidebar(8) ){?>col-md-9 lpd-sidebar-page<?php } else{ ?>col-md-12<?php } ?> page-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('includes/single-team-post' );?>
            <?php endwhile; else: ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
            <?php endif; ?>
            </div>
			<div class="col-md-3">
				<?php if ( is_active_sidebar(8) ){?>
				    <div class="sidebar">
				    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Team Post Sidebar') ) ?>
				    </div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
        
<?php get_footer(); ?>