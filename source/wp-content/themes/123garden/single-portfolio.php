
<?php get_header(); ?>

<?php get_template_part('includes/title-breadcrumb' ) ?>

<div id="main" class="inner-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('includes/single-portfolio-post' );?>
            <?php endwhile; else: ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
            <?php endif; ?>
            </div>
		</div>
	</div>
</div>
        
<?php get_footer(); ?>