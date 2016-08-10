<?php 
/*
Template Name: Full Width Template (title & breadcrumb)
*/?>

<?php get_header(); ?>
<?php $page_margin = get_post_meta($post->ID, 'page_margin_checkbox', true);?>

<?php get_template_part('includes/title-breadcrumb' ) ?>
<div id="main" class="inner-page<?php if ($page_margin){?> disabled-inner-page-margin<?php }?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-content">
	        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
                <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
	            <img class="page-thumbnail img-responsive" alt="<?php echo esc_attr($alt); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'default-page' ); echo esc_url($image[0]);?>" />
	        <?php }?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; else: ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
            <?php endif; ?>
			</div>
		</div>
	</div>
</div>
        
<?php get_footer(); ?>