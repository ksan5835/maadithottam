<div class="search-post">
    <h4><?php the_title(); ?></h4>
    <small><?php echo esc_html(get_the_time('j F Y')); ?></small>
    <?php if(get_the_excerpt()){?>
    <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
    <?php }else{?>
    <a href="<?php the_permalink(); ?>"><p><?php esc_html__('view more', GETTEXT_DOMAIN) ?>...</p></a>
    <?php }?>
    <hr />
</div>