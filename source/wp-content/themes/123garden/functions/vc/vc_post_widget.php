<?php

// v1.1.8

function vc_widget_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
		
		'post_type' => '',
		'image_size' => '',
		'carousel' => '',
		'carousel_autoheight' => '',
		'carousel_margin' => '',
		'carousel_navi' => '',
		'carousel_dots_navi' => '',
		'carousel_autoplay' => '',
		'carousel_autoplaytimeout' => '',
		'carousel_autoplayhoverpause' => '',
		'carousel_loop' => '',
		'columns' => '',	
		'items' => '',
		'cat_filter' => '',
		'thumbnails' => '',
		'caption' => '',
		'order' => '',
		'orderby' => ''

   ), $atts ) );
   

	if ( empty( $post_type ) ) {
		$post_type = 'post';
	}
	if ( empty( $image_size ) ) {
		$image_size = 'theme-size-3x2';
	}
	if ( empty( $columns ) ) {
		$columns = '3';
	}
	if ( empty( $orderby ) ) {
		$orderby = 'date';
	}
	if ( empty( $order ) ) {
		$order = 'DESC';
	}
	
	
	if($post_type=="post"){
	   $post_type="post";
	   $cat_terms="category";
	}else{
	   $post_type="portfolio";
	   $cat_terms="portfolio_category";
	}
	
	if($items){
	   $posts_per_page='&posts_per_page='.$items.'';
	}else{
	   $posts_per_page='&posts_per_page=-1';
	}
   
	if($post_type=="portfolio"){
		$category_filter = '&portfolio_category='.$cat_filter;
	}else{
		$category_filter = '&category_name='.$cat_filter;
	}
	
	if ( $carousel ) {
	
		if($columns=="3"){
			$columns="4";
		}elseif($columns=="4"){
			$columns="3";
		}elseif($columns=="6"){
			$columns="2";
		}
	
		global $shortcode_atts;
		
		$shortcode_atts = array(
			'carousel_autoheight' => $carousel_autoheight,
		  'carousel_margin' => $carousel_margin,
		  'carousel_navi' => $carousel_navi,
		  'carousel_dots_navi' => $carousel_dots_navi,
		  'carousel_autoplay' => $carousel_autoplay,
		  'carousel_autoplaytimeout' => $carousel_autoplaytimeout,
		  'carousel_autoplayhoverpause' => $carousel_autoplayhoverpause,
		  'carousel_loop' => $carousel_loop,
		  'columns' => $columns,
		);
		
		lpd_owl_carousel();
		
		global $the_post_widget_ID;
		
		$the_post_widget_ID = rand();
	
	} 	
   
	ob_start();?>
	
						<div class="post-widget">
							<div class="row">
							<?php if ( $carousel ) { ?><div class="col-md-12 owl-carousel-<?php echo esc_attr($the_post_widget_ID);?>"><?php }?>
	
	
						<?php $query = new WP_Query();?>
						<?php $query->query('post_type='.$post_type.''.$posts_per_page.''.$category_filter.'&orderby='.$orderby.'&order='.$order.'');?>
							
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
                        
						<?php $video = lpd_parse_video(get_post_meta(get_the_ID(), 'video_post_meta', true));?>
						<?php $link = get_post_meta(get_the_ID(), 'link_post_meta', true);?>
						
						<?php $gallery_type = get_post_meta(get_the_ID(), 'portfolio_options_select', true);?>
						<?php $terms = get_the_terms( get_the_ID(), $cat_terms ); ?>
						
						<?php if($post_type=="portfolio"){?>
							<?php $header_image = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'portfolio_header_image', true), $image_size ); ?>
						<?php }else{?>
							<?php $header_image = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'post_header_image', true), $image_size ); ?>
						<?php }?>
						
						  
	<?php if ( !$carousel ) { ?><div class="col-md-<?php echo esc_attr($columns); ?>"><?php }?>
		<div class="lpd-post-widget">
		<?php if ( !$thumbnails ) { ?>
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
		    <?php } elseif ( $video ) { ?>
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
				                <?php $resultstr[] = '<a title="'.esc_attr($term->name).'" href="'.esc_url(get_term_link($term->slug, $cat_terms)).'">'.esc_html($term->name).'</a>'?>
				            <?php } ?>
				            <?php echo $resultstr[0]; endif;?>
								
							</td><?php }?>
							<td class="pw-date"><a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>" class="date"><?php the_time('M j, Y'); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>	
			<div class="content<?php if ( $thumbnails ) { ?> no-thumbnail<?php }?>">
				<?php if ( $link ) { ?>
				<h4 class="title lpd-animated-link"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
				<?php }else{?>
				<h4 class="title lpd-animated-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php }?>
				<?php if ( !$caption ) { ?>
					<div class="lpd-post-widget-content">
						<p><?php echo lpd_excerpt(15)?></p>
					</div>
				<?php }?>
				<div class="lpd-post-widget-element"></div>	
			</div>
		</div>
	<?php if ( !$carousel ) { ?></div><?php }?>
	
						<?php endwhile; endif; wp_reset_query();?>
	
							<?php if ( $carousel ) { ?></div><?php }?>
							</div>
						</div>
						
	<?php
	if ( $carousel ) { 
		$counter_js = new post_widget_class();
		
		$counter_js->post_widget_callback();
	}	
	?>
						
	<?php return ob_get_clean();
    
    
}
add_shortcode( 'vc_widget', 'vc_widget_func' );


class post_widget_class
{
    protected static $var = '';

    public static function post_widget_callback(){
    
	global $the_post_widget_ID;
	
	global $shortcode_atts;
	
	$carousel_autoheight = $shortcode_atts['carousel_autoheight'];
	$carousel_margin = $shortcode_atts['carousel_margin'];
	$carousel_navi = $shortcode_atts['carousel_navi'];
	$carousel_dots_navi = $shortcode_atts['carousel_dots_navi'];
	$carousel_autoplay = $shortcode_atts['carousel_autoplay'];
	$carousel_autoplaytimeout = $shortcode_atts['carousel_autoplaytimeout'];
	$carousel_autoplayhoverpause = $shortcode_atts['carousel_autoplayhoverpause'];
	$carousel_loop = $shortcode_atts['carousel_loop'];
	$columns = $shortcode_atts['columns'];
	
		ob_start();?>
		
		<script>
		/* <![CDATA[ */
            jQuery(document).ready(function() {
              jQuery('.owl-carousel-<?php echo esc_js($the_post_widget_ID);?>').owlCarousel({
                <?php if ( $columns ) { ?>items: <?php echo esc_js($columns);?>,<?php }?>
                <?php if ( $carousel_margin ) { ?>margin: <?php echo esc_js($carousel_margin);?>,<?php }?>
                <?php if ( $carousel_autoheight ) { ?>autoHeight: true,<?php }?>
                <?php if ( $carousel_navi ) { ?>nav:true,<?php }?>
                <?php if ( !$carousel_dots_navi ) { ?>dots:false,<?php }?>
                <?php if ( $carousel_autoplay ) { ?>autoplay:true,<?php }?>
                <?php if ( $carousel_autoplaytimeout ) { ?>autoplayTimeout: <?php echo esc_js($carousel_autoplaytimeout);?>,<?php }?>
                <?php if ( $carousel_autoplayhoverpause ) { ?>autoplayHoverPause:true,<?php }?>
                <?php if ( $carousel_loop ) { ?>loop:true,<?php }?>
                navText : ['<?php _e('prev', GETTEXT_DOMAIN); ?>','<?php _e('next', GETTEXT_DOMAIN); ?>'],
			    <?php if ( $columns ) { ?>
			    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        768:{
			            items:<?php echo esc_js($columns);?>,    
			        }
			    }<?php }?>
              });
            })
		/* ]]> */
		</script>

		
		<?php $script = ob_get_clean();

        self::$var[] = $script;

        add_action( 'wp_footer', array ( __CLASS__, 'footer' ), 20 );         
    }

	public static function footer() 
	{
	    foreach( self::$var as $script ){
	        echo $script;
	    }
	}

}


vc_map(array(
   "name" => __("Posts Widget", GETTEXT_DOMAIN),
   "base" => "vc_widget",
   "class" => "",
   "icon" => "icon-wpb-lpd",
   "category" => __('Content', GETTEXT_DOMAIN),
   'admin_enqueue_js' => "",
   'admin_enqueue_css' => array(get_template_directory_uri().'/functions/vc/assets/vc_extend.css'),
   "params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Post Type", GETTEXT_DOMAIN),
			"param_name" => "post_type",
			"value" => array(__('Blog Posts', GETTEXT_DOMAIN) => "post", __('Portfolio Posts', GETTEXT_DOMAIN) => "portfolio"),
			"description" => __("Select post type.", GETTEXT_DOMAIN)
		),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Image Size", GETTEXT_DOMAIN),
	      "param_name" => "image_size",
	      "value" => array( '3x2' => 'theme-size-3x2', '4x3' => 'theme-size-4x3', '1x1' => 'theme-size-1x1', '16x9' => 'theme-size-16x9', '3x4' => 'theme-size-3x4', '2x3' => 'theme-size-2x3'),
	      "description" => __("Select format for the image.", GETTEXT_DOMAIN)
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Carousel", GETTEXT_DOMAIN),
	      "param_name" => "carousel",
	      "description" => __("Check, if you wish to enable carousel plugin.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable')
	    ),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Vertical Margin", GETTEXT_DOMAIN),
			 "param_name" => "carousel_margin",
			 "value" => '',
			 "description" => __("Vertical gap between items, only integers (ex: 1, 5, 10).", GETTEXT_DOMAIN),
			 "dependency" => Array('element' => "carousel", 'value' => 'enable')
		),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("autoHeight", GETTEXT_DOMAIN),
	      "param_name" => "carousel_autoheight",
	      "description" => __("Enable auto height for carousel container.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel", 'value' => 'enable')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Navigation", GETTEXT_DOMAIN),
	      "param_name" => "carousel_navi",
	      "description" => __("Show next/prev buttons.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel", 'value' => 'enable')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Dots Navigation", GETTEXT_DOMAIN),
	      "param_name" => "carousel_dots_navi",
	      "description" => __("Show dots navigation.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel", 'value' => 'enable')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Loop", GETTEXT_DOMAIN),
	      "param_name" => "carousel_loop",
	      "description" => __("Inifnity loop. Duplicate last and first items to get loop illusion.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel", 'value' => 'enable')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Autoplay", GETTEXT_DOMAIN),
	      "param_name" => "carousel_autoplay",
	      "description" => __("Check, if you wish to enable autoplay function for carousel plugin.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel", 'value' => 'enable')
	    ),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("autoplayTimeout", GETTEXT_DOMAIN),
			 "param_name" => "carousel_autoplaytimeout",
			 "value" => '',
			 "description" => __("Autoplay interval timeout in (ms), only integers (ex: 1000, 5000, 10000).", GETTEXT_DOMAIN),
			 "dependency" => Array('element' => "carousel_autoplay", 'value' => 'enable')
		),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("autoplayHoverPause", GETTEXT_DOMAIN),
	      "param_name" => "carousel_autoplayhoverpause",
	      "description" => __("Pause on mouse hover.", GETTEXT_DOMAIN),
	      "value" => Array(__("enable", GETTEXT_DOMAIN) => 'enable'),
	      "dependency" => Array('element' => "carousel_autoplay", 'value' => 'enable')
	    ),
		array(
			"type" => "dropdown",
			"heading" => __("Columns", GETTEXT_DOMAIN),
			"param_name" => "columns",
			"value" => array(__('4 Columns', GETTEXT_DOMAIN) => "3", __('3 Columns', GETTEXT_DOMAIN) => "4", __('2 Columns', GETTEXT_DOMAIN) => "6"),
			"description" => __("Select number of columns.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts", GETTEXT_DOMAIN),
			 "param_name" => "items",
			 "value" => "",
			 "description" => __("Enter number of post to show.", GETTEXT_DOMAIN)
		),
		array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Filter", GETTEXT_DOMAIN),
			 "param_name" => "cat_filter",
			 "value" => "",
			 "description" => __("Category slug separated by comma, an example: link,full.", GETTEXT_DOMAIN)
		),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Thumbnails", GETTEXT_DOMAIN),
	      "param_name" => "thumbnails",
	      "description" => __("Check, if you wish to disable thumbnails.", GETTEXT_DOMAIN),
	      "value" => Array(__("disable", GETTEXT_DOMAIN) => 'disable')
	    ),
	    array(
	      "type" => 'checkbox',
	      "heading" => __("Caption", GETTEXT_DOMAIN),
	      "param_name" => "caption",
	      "description" => __("Check, if you wish to disable caption.", GETTEXT_DOMAIN),
	      "value" => Array(__("disable", GETTEXT_DOMAIN) => 'disable')
	    ),
    array(
      "type" => "dropdown",
      "heading" => __("Order by", GETTEXT_DOMAIN),
      "param_name" => "orderby",
      "value" => array( __("Date", GETTEXT_DOMAIN) => "date", __("ID", GETTEXT_DOMAIN) => "ID", __("Author", GETTEXT_DOMAIN) => "author", __("Title", GETTEXT_DOMAIN) => "title", __("Modified", GETTEXT_DOMAIN) => "modified", __("Random", GETTEXT_DOMAIN) => "rand", __("Comment count", GETTEXT_DOMAIN) => "comment_count", __("Menu order", GETTEXT_DOMAIN) => "menu_order" ),
      "description" => sprintf(__('Select how to sort retrieved posts. More at %s.', GETTEXT_DOMAIN), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Order way", GETTEXT_DOMAIN),
      "param_name" => "order",
      "value" => array( __("Descending", GETTEXT_DOMAIN) => "DESC", __("Ascending", GETTEXT_DOMAIN) => "ASC" ),
      "description" => sprintf(__('Designates the ascending or descending order. More at %s.', GETTEXT_DOMAIN), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
    )
   )
));

?>