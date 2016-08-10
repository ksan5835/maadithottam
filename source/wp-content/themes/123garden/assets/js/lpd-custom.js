///*global jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    functions();
});

function functions() {
	
	//clearfix for columns
	jQuery('<div class="clearfix"></div>').insertAfter(".col-md-4.one-column:nth-child(3n)");
    jQuery('<div class="clearfix"></div>').insertAfter(".col-md-3.one-column:nth-child(4n)");
    jQuery('<div class="clearfix"></div>').insertAfter(".post-widget .col-md-6:nth-child(2n)");
    jQuery('<div class="clearfix"></div>').insertAfter(".post-widget .col-md-4:nth-child(3n)");
    jQuery('<div class="clearfix"></div>').insertAfter(".post-widget .col-md-3:nth-child(4n)");
    //clearfix for columns END

	//parallax
	jQuery.stellar({horizontalScrolling: false,verticalOffset: 40});
	//parallax END
	
	//js buttom styles
	jQuery("#searchform #searchsubmit").addClass("btn btn-primary");
	jQuery(".footer.dark-theme #searchform #searchsubmit").addClass("btn btn-warning");
	jQuery('.widget_search #s,.widget_product_search #s').addClass("form-control input-sm");
	jQuery(".form-submit #submit").addClass("btn btn-primary").removeAttr("id");
    jQuery('.price_slider_amount button').removeClass("button").addClass("btn btn-sm btn-primary");
    jQuery('.group_table a.btn').removeClass('btn-primary').addClass("btn btn-xs btn-default");
    //js buttom styles END
    
    // bootstrap tooltip
	jQuery('.lpd-tooltip').tooltip();
	// bootstrap tooltip END

    // contact form 7
	jQuery(".wpcf7 .wpcf7-submit").addClass("btn-primary").addClass("btn");
	jQuery(".wpcf7 input").addClass("form-control");
	jQuery(".wpcf7 input[type=submit]").removeClass("form-control");
	jQuery(".wpcf7 input[type=checkbox]").removeClass("form-control");
	jQuery(".wpcf7 textarea").addClass("form-control");
	jQuery(".wpcf7 select").addClass("form-control");
	// contact form 7 END
	
    
    // product category widget
    jQuery('.widget_product_categories ul > li > ul.children').before('<span class="toggle">[+]</span>');
 
    var current_cat = jQuery('.widget_product_categories ul > li.current-cat, .widget_product_categories ul > li.current-cat-parent');
    
    current_cat.children('.toggle').html("[-]");
    current_cat.children('ul').slideDown().addClass('opened');
    
    
    jQuery('.widget_product_categories ul > li > ul.children').each(function() {
        jQuery(this).parent().children('.toggle').toggle(function() {
			if(jQuery(this).parent().children('ul').hasClass('opened')){
			jQuery(this).html("[+]");
			jQuery(this).parent().children('ul').slideUp();
			jQuery(this).parent().children('ul').removeClass('opened').addClass('closed');
			}else{
			jQuery(this).html("[-]");
			jQuery(this).parent().children('ul').slideDown();
			jQuery(this).parent().children('ul').removeClass('closed').addClass('opened');
			}
        }, function() {
			if(jQuery(this).parent().children('ul').hasClass('closed')){
			jQuery(this).html("[-]");
			jQuery(this).parent().children('ul').slideDown();
			jQuery(this).parent().children('ul').removeClass('closed').addClass('opened');
			}else{
			jQuery(this).html("[+]");
			jQuery(this).parent().children('ul').slideUp();
			jQuery(this).parent().children('ul').removeClass('opened').addClass('closed');
		}
        });    
    });
    
    jQuery('.widget_product_categories > ul > li > .toggle').html("[-]");
    jQuery('.widget_product_categories > ul > li > ul.children').addClass('opened').css({display: "block"});
    
    // product category widget END

}