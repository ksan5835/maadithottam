<?php

$items='9999';
$taxo_slug = get_queried_object()->slug;
$image_size = 'theme-size-4x3';

if(is_tax("portfolio_category")){
	$queried_object = get_queried_object();
	$tax_id = $queried_object->term_id;
	$portfolio_category_term_meta = get_option( "portfolio_category_$tax_id" );
	$portfolio_category_sidebar = $portfolio_category_term_meta['custom_term_meta2'];
} ?>

<?php get_header(); ?>

<?php get_template_part('includes/title-breadcrumb' ) ?>
<div id="main" class="inner-page<?php if ($portfolio_category_sidebar=='left'){?> left-sidebar-template<?php }?>">
	<div class="container">
		<div class="row">
		
			<?php if ($portfolio_category_sidebar=='none') {?>
			<div class="col-md-12 page-content">
			<?php } else{?>
			<div class="col-md-9 lpd-sidebar-page  page-content">
			<?php }?>
				
			<?php $query = new WP_Query();?>
		    <?php $query->query('portfolio_category='.$taxo_slug.'&post_type=portfolio&posts_per_page='. $items .'');?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
			<?php $video_raw = get_post_meta($post->ID, 'video_post_meta', true);?>
			<?php $link = get_post_meta($post->ID, 'link_post_meta', true); ?>
			<?php $terms = get_the_terms($post->ID, 'portfolio_category' ); //get_the_ID ?>
			<?php $header_image = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'portfolio_header_image', true), $image_size ); ?>

				<div class="col-md-4">
					<div class="lpd-post-widget">

						<?php if ( $link ) { ?>
					        <?php if(has_post_thumbnail()) {?>
								<a href="<?php echo esc_url($link); ?>" class="pw-thumbnail">
									<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size ); echo esc_url($image[0]);?>"/>
									<span class="post-type-icon link"></span>
								</a>
							<?php } elseif($header_image){?>
								<a href="<?php the_permalink(); ?>" class="pw-thumbnail">
									<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php echo esc_url($header_image[0]);?>"/>
									<span class="post-type-icon link"></span>
								</a>
							<?php }else{?>
						        <a href="<?php echo esc_url($link); ?>" class="pw-thumbnail">
						        	<img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/no-image.png"/>
						        	<span class="post-type-icon link"></span>
								</a>
					        <?php }?>
					    <?php } elseif ( $video_raw ) { ?>
					        <?php if(has_post_thumbnail()) {?>
								<a href="<?php the_permalink(); ?>" class="pw-thumbnail">
									<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size ); echo esc_url($image[0]);?>"/>
									<span class="post-type-icon video"></span>
								</a>
							<?php } elseif($header_image){?>
								<a href="<?php the_permalink(); ?>" class="pw-thumbnail">
									<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php echo esc_url($header_image[0]);?>"/>
									<span class="post-type-icon video"></span>
								</a>
							<?php }else{?>
						        <a href="<?php the_permalink(); ?>" class="pw-thumbnail">
						        	<img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/no-image.png"/>
						        	<span class="post-type-icon video"></span>
								</a>
					        <?php }?>
					    <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
							<a href="<?php the_permalink(); ?>" class="pw-thumbnail">
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size ); echo esc_url($image[0]);?>"/>
								<span class="post-type-icon"></span>
								<?php } ?>
							</a>
						<?php } else{?>
							<?php if($header_image){?>
								<a href="<?php the_permalink(); ?>" class="pw-thumbnail">
									<img alt="<?php the_title(); ?>" class="img-responsive" src="<?php echo esc_url($header_image[0]);?>"/>
									<span class="post-type-icon"></span>
								</a>
							<?php }else{?>
					        <a href="<?php the_permalink(); ?>" class="pw-thumbnail">
					        	<img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/no-image.png"/>
					        	<span class="post-type-icon"></span>
							</a>
							<?php }?>
					    <?php }?>

						<div class="widget-meta">
							<div class="ribbon"><span class="ribbon-content"></span></div>
							<table>
								<tbody>
									<tr>
										<td class="pw-author"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>" class="author"><?php echo esc_html(get_the_author()); ?></a></td>
										<?php if($terms){?><td class="pw-category">
											
										<?php $resultstr = array(); ?>
							            <?php if($terms) : foreach ($terms as $term) { ?>
							                <?php $resultstr[] = '<a title="'.$term->name.'" href="'.get_term_link($term->slug, "portfolio_category").'">'.$term->name.'</a>'?>
							            <?php } ?>
							            <?php echo $resultstr[0]; endif;?>
											
										</td><?php }?>
										<td class="pw-date"><a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>" class="date"><?php the_time('M j, Y'); ?></a></td>
									</tr>
								</tbody>
							</table>
						</div>	
						<div class="content">
							<?php if ( $link ) { ?>
							<h4 class="title lpd-animated-link"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
							<?php }else{?>
							<h4 class="title lpd-animated-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php }?>	
							<div class="lpd-post-widget-content">
								<p><?php echo lpd_excerpt(15)?></p>
							</div>
							<div class="lpd-post-widget-element"></div>	
						</div>
					</div>
				</div>

		        <?php endwhile; else: ?>
			        <div class="no-post-matched"><?php esc_html_e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></div>
		        <?php endif; ?>
					        
			</div>
			
			<?php if ($portfolio_category_sidebar!='none') {?>
				<?php get_sidebar(); ?>
			<?php }?>
			
		</div>
	</div>
</div>
        
<?php get_footer(); ?>