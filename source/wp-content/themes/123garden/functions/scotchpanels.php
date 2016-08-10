<?php
function shopping_cart_panel() {

	$shopping_cart_js = new shopping_cart_class();
	$shopping_cart_js->shopping_cart_callback();

}

class shopping_cart_class
{
    protected static $var = '';

    public static function shopping_cart_callback() 
    {
    
    $s_cart = ot_get_option('s_cart');
    
    if ($s_cart=='sl_panel_left') {
    
    	$direction = 'left';
	    
    }else{
	    
	    $direction = 'right';
    }

	
ob_start();?>

<script>
jQuery(function() {

	var shopping_cart_panel = jQuery('#shopping_cart_panel').scotchPanel({
        containerSelector: 'body',
        direction: '<?php echo esc_js($direction);?>',
        duration: 300,
        transition: 'ease',
        clickSelector: '.lpd-shopping-cart',
        distanceX: '320px',
        enableEscapeKey: true,
	    beforePanelOpen: function() {
	    	jQuery('.header-bottom').addClass('hb-scothpanel-open');
			jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2];
				jQuery.globalEval( 'revapi'+id+'.revpause();' );
			});
	    },
	    beforePanelClose: function() {
	    	jQuery('.header-bottom').removeClass('hb-scothpanel-open');
		  	jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2]
				jQuery.globalEval( 'revapi'+id+'.revresume();' );
			});
	    }
    });
	jQuery('#body-wrap').click(function() {
	  shopping_cart_panel.close();
	});


});
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

function delivery_panel() {

	$delivery_js = new delivery_class();
	$delivery_js->delivery_callback();

}
class delivery_class
{
    protected static $var = '';

    public static function delivery_callback() 
    {
	
ob_start();?>

<script>
jQuery(function() {

	var delivery_panel = jQuery('#delivery_panel').scotchPanel({
        containerSelector: 'body',
        direction: 'top',
        duration: 300,
        transition: 'ease',
        clickSelector: '.hc-delivery a',
        forceMinHeight: true,
        enableEscapeKey: true,
	    beforePanelOpen: function() {
	      jQuery('.hc-scotch-panel').css('z-index', 0);
		  jQuery('#delivery_panel').css('z-index', 11);
		  jQuery('.header-bottom').addClass('hb-scothpanel-open');
		  jQuery(".rev_slider_wrapper").each(function(){
			$this = jQuery(this);
			id_array = $this.attr("id").split("_");
			id = id_array[2];
			jQuery.globalEval( 'revapi'+id+'.revpause();' );
		  });
	    },
	    beforePanelClose: function() {
		  jQuery('.header-bottom').removeClass('hb-scothpanel-open');
		  	jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2]
				jQuery.globalEval( 'revapi'+id+'.revresume();' );
			});
	    }
    });
	jQuery('#body-wrap').click(function() {
	  delivery_panel.close();
	});

});
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

function contact_panel() {

	$contact_js = new contact_class();
	$contact_js-> contact_callback();

}
class contact_class
{
    protected static $var = '';

    public static function contact_callback() 
    {
	
ob_start();?>

<script>
jQuery(function() {

	var contact_panel = jQuery('#contact_panel').scotchPanel({
        containerSelector: 'body',
        direction: 'top',
        duration: 300,
        transition: 'ease',
        clickSelector: '.hc-contact a',
        forceMinHeight: true,
        enableEscapeKey: true,
	    beforePanelOpen: function() {
	      jQuery('.hc-scotch-panel').css('z-index', 0);
		  jQuery('#contact_panel').css('z-index', 11);
		  jQuery('.header-bottom').addClass('hb-scothpanel-open');
		  jQuery(".rev_slider_wrapper").each(function(){
			$this = jQuery(this);
			id_array = $this.attr("id").split("_");
			id = id_array[2];
			jQuery.globalEval( 'revapi'+id+'.revpause();' );
		  });
	    },
	    beforePanelClose: function() {
		  jQuery('.header-bottom').removeClass('hb-scothpanel-open');
		  	jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2]
				jQuery.globalEval( 'revapi'+id+'.revresume();' );
			});
	    }
    });
	jQuery('#body-wrap').click(function() {
	  contact_panel.close();
	});

});
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

function custom1_panel() {

	$custom1_js = new custom1_class();
	$custom1_js-> custom1_callback();

}
class custom1_class
{
    protected static $var = '';

    public static function custom1_callback() 
    {
	
ob_start();?>

<script>
jQuery(function() {

	var custom1_panel = jQuery('#custom1_panel').scotchPanel({
        containerSelector: 'body',
        direction: 'top',
        duration: 300,
        transition: 'ease',
        clickSelector: '.hc-custom-1 a',
        forceMinHeight: true,
        enableEscapeKey: true,
	    beforePanelOpen: function() {
	      jQuery('.hc-scotch-panel').css('z-index', 0);
		  jQuery('#custom1_panel').css('z-index', 11);
		  jQuery('.header-bottom').addClass('hb-scothpanel-open');
		  jQuery(".rev_slider_wrapper").each(function(){
			$this = jQuery(this);
			id_array = $this.attr("id").split("_");
			id = id_array[2];
			jQuery.globalEval( 'revapi'+id+'.revpause();' );
		  });
	    },
	    beforePanelClose: function() {
		  jQuery('.header-bottom').removeClass('hb-scothpanel-open');
		  	jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2]
				jQuery.globalEval( 'revapi'+id+'.revresume();' );
			});
	    }
    });
	jQuery('#body-wrap').click(function() {
	  custom1_panel.close();
	});

});
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
function custom2_panel() {

	$custom2_js = new custom2_class();
	$custom2_js-> custom2_callback();

}
class custom2_class
{
    protected static $var = '';

    public static function custom2_callback() 
    {
	
ob_start();?>

<script>
jQuery(function() {

	var custom2_panel = jQuery('#custom2_panel').scotchPanel({
        containerSelector: 'body',
        direction: 'top',
        duration: 300,
        transition: 'ease',
        clickSelector: '.hc-custom-2 a',
        forceMinHeight: true,
        enableEscapeKey: true,
	    beforePanelOpen: function() {
	      jQuery('.hc-scotch-panel').css('z-index', 0);
		  jQuery('#custom2_panel').css('z-index', 11);
		  jQuery('.header-bottom').addClass('hb-scothpanel-open');
		  jQuery(".rev_slider_wrapper").each(function(){
			$this = jQuery(this);
			id_array = $this.attr("id").split("_");
			id = id_array[2];
			jQuery.globalEval( 'revapi'+id+'.revpause();' );
		  });
	    },
	    beforePanelClose: function() {
		  jQuery('.header-bottom').removeClass('hb-scothpanel-open');
		  	jQuery(".rev_slider_wrapper").each(function(){
				$this = jQuery(this);
				id_array = $this.attr("id").split("_");
				id = id_array[2]
				jQuery.globalEval( 'revapi'+id+'.revresume();' );
			});
	    }
    });
	jQuery('#body-wrap').click(function() {
	  custom2_panel.close();
	});

});
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

?>