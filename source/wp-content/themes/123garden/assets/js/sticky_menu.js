/*global jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    sticky_menu();
});

function sticky_menu() {

var headerBottomWrap = jQuery('.header-bottom-wrap');
    
headerBottomWrap.waypoint(function (direction) {
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky');
		}
  
  }, {
  
  offset: function (direction) {
    return -jQuery(this).outerHeight();
  }
  
});

/// v1.1 updated
jQuery('.header-middle').waypoint(function (direction) {
  
		if( direction === 'up'){
			headerBottomWrap.removeClass('sticky');
		}
  
  }, {
  
  offset: function (direction) {
    return -jQuery(this).outerHeight();
  }
  
});

var headerBottom = jQuery('.header-bottom');

headerBottom.waypoint(function (direction) {

  		//jQuery(this).toggleClass("test1", direction === "down");
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky');
		}

        jQuery(".scotch-panel-canvas").css("transform", "inherit");
        jQuery(".scotch-panel-canvas").css("-webkit-transform", "inherit");
        jQuery(".scotch-panel-canvas").css("backface-visibility", "inherit");
        jQuery(".scotch-panel-canvas").css("-webkit-backface-visibility", "inherit");
        
    }, {
  offset: function (direction) {
    return -jQuery(this).outerHeight()-100;
  }
});

headerBottom.waypoint(function (direction) {

  		if( direction === 'up'){
			jQuery(this).removeClass('sticky');
		}
        
    });

headerBottom.waypoint(function (direction) {
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky-active');
		}
		/*else if( direction === 'up'){
			jQuery(this).removeClass('sticky-active');
		}*/
        
    }, {
  offset: function (direction) {
    return -jQuery(this).outerHeight()-200;
  }
});

headerBottom.waypoint(function (direction) {
  
		if( direction === 'up'){
			jQuery(this).removeClass('sticky-active');
		}
        
    });

};


/*jQuery('.header-bottom-wrap').waypoint(function (direction) {
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky');
		}
		else if( direction === 'up'){
			jQuery(this).removeClass('sticky');
		}
  
  }, {
  
  offset: function (direction) {
    return -jQuery(this).outerHeight();
  }
  
});

jQuery('.header-bottom').waypoint(function (direction) {

  		//jQuery(this).toggleClass("test1", direction === "down");
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky');
		}
		else if( direction === 'up'){
			jQuery(this).removeClass('sticky');
		}

        jQuery(".scotch-panel-canvas").css("transform", "inherit");
        jQuery(".scotch-panel-canvas").css("-webkit-transform", "inherit");
        jQuery(".scotch-panel-canvas").css("backface-visibility", "inherit");
        jQuery(".scotch-panel-canvas").css("-webkit-backface-visibility", "inherit");
        
    }, {
  offset: function (direction) {
    return -jQuery(this).outerHeight();
  }
});

jQuery('.header-bottom').waypoint(function (direction) {
  
		if( direction === 'down') {
			jQuery(this).addClass('sticky-active');
		}
		else if( direction === 'up'){
			jQuery(this).removeClass('sticky-active');
		}
        
    }, {
  offset: function (direction) {
    return -jQuery(this).outerHeight();
  }
});*/