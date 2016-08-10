/*!
 * imagesLoaded PACKAGED v4.0.0
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function(){"use strict";function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype,r=this,s=r.EventEmitter;i.getListeners=function(e){var t,n,i=this._getEvents();if(e instanceof RegExp){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;t<e.length;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),s="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(s?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;t<e.length;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,s=this.getListenersAsObject(e);for(r in s)s.hasOwnProperty(r)&&(i=t(s[r],n),-1!==i&&s[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,s=e?this.removeListener:this.addListener,o=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)s.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?s.call(this,i,r):o.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if(e instanceof RegExp)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,s,o,h=this.getListenersAsObject(e);for(s in h)if(h.hasOwnProperty(s))for(n=h[s].slice(0),r=n.length;r--;)i=n[r],i.once===!0&&this.removeListener(e,i.listener),o=i.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,i.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},e.noConflict=function(){return r.EventEmitter=s,e},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return e}):"object"==typeof module&&module.exports?module.exports=e:r.EventEmitter=e}).call(this),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter"],function(n){return t(e,n)}):"object"==typeof module&&module.exports?module.exports=t(e,require("wolfy87-eventemitter")):e.imagesLoaded=t(e,e.EventEmitter)}(window,function(e,t){function n(e,t){for(var n in t)e[n]=t[n];return e}function i(e){var t=[];if(Array.isArray(e))t=e;else if("number"==typeof e.length)for(var n=0;n<e.length;n++)t.push(e[n]);else t.push(e);return t}function r(e,t,s){return this instanceof r?("string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=i(e),this.options=n({},this.options),"function"==typeof t?s=t:n(this.options,t),s&&this.on("always",s),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(function(){this.check()}.bind(this))):new r(e,t,s)}function s(e){this.img=e}function o(e,t){this.url=e,this.element=t,this.img=new Image}var h=e.jQuery,a=e.console;r.prototype=Object.create(t.prototype),r.prototype.options={},r.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},r.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&u[t]){for(var n=e.querySelectorAll("img"),i=0;i<n.length;i++){var r=n[i];this.addImage(r)}if("string"==typeof this.options.background){var s=e.querySelectorAll(this.options.background);for(i=0;i<s.length;i++){var o=s[i];this.addElementBackgroundImages(o)}}}};var u={1:!0,9:!0,11:!0};return r.prototype.addElementBackgroundImages=function(e){var t=getComputedStyle(e);if(t)for(var n=/url\((['"])?(.*?)\1\)/gi,i=n.exec(t.backgroundImage);null!==i;){var r=i&&i[2];r&&this.addBackground(r,e),i=n.exec(t.backgroundImage)}},r.prototype.addImage=function(e){var t=new s(e);this.images.push(t)},r.prototype.addBackground=function(e,t){var n=new o(e,t);this.images.push(n)},r.prototype.check=function(){function e(e,n,i){setTimeout(function(){t.progress(e,n,i)})}var t=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(t){t.once("progress",e),t.check()}):void this.complete()},r.prototype.progress=function(e,t,n){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emit("progress",this,e,t),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+n,e,t)},r.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emit(e,this),this.emit("always",this),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},s.prototype=Object.create(t.prototype),s.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},s.prototype.getIsImageComplete=function(){return this.img.complete&&void 0!==this.img.naturalWidth},s.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("progress",this,this.img,t)},s.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},s.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},s.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},s.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},o.prototype=Object.create(s.prototype),o.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},o.prototype.unbindEvents=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this)},o.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("progress",this,this.element,t)},r.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(h=t,h.fn.imagesLoaded=function(e,t){var n=new r(this,e,t);return n.jqDeferred.promise(h(this))})},r.makeJQueryPlugin(),r});
/**
 * bxSlider v4.2.5
 * Copyright 2013-2015 Steven Wanderski
 * Written while drinking Belgian ales and listening to jazz

 * Licensed under MIT (http://opensource.org/licenses/MIT)
 */

!function(a){var b={mode:"horizontal",slideSelector:"",infiniteLoop:!0,hideControlOnEnd:!1,speed:500,easing:null,slideMargin:0,startSlide:0,randomStart:!1,captions:!1,ticker:!1,tickerHover:!1,adaptiveHeight:!1,adaptiveHeightSpeed:500,video:!1,useCSS:!0,preloadImages:"visible",responsive:!0,slideZIndex:50,wrapperClass:"bx-wrapper",touchEnabled:!0,swipeThreshold:50,oneToOneTouch:!0,preventDefaultSwipeX:!0,preventDefaultSwipeY:!1,ariaLive:!0,ariaHidden:!0,keyboardEnabled:!1,pager:!0,pagerType:"full",pagerShortSeparator:" / ",pagerSelector:null,buildPager:null,pagerCustom:null,controls:!0,nextText:"Next",prevText:"Prev",nextSelector:null,prevSelector:null,autoControls:!1,startText:"Start",stopText:"Stop",autoControlsCombine:!1,autoControlsSelector:null,auto:!1,pause:4e3,autoStart:!0,autoDirection:"next",stopAutoOnClick:!1,autoHover:!1,autoDelay:0,autoSlideForOnePage:!1,minSlides:1,maxSlides:1,moveSlides:0,slideWidth:0,shrinkItems:!1,onSliderLoad:function(){return!0},onSlideBefore:function(){return!0},onSlideAfter:function(){return!0},onSlideNext:function(){return!0},onSlidePrev:function(){return!0},onSliderResize:function(){return!0}};a.fn.bxSlider=function(c){if(0===this.length)return this;if(this.length>1)return this.each(function(){a(this).bxSlider(c)}),this;var d={},e=this,f=a(window).width(),g=a(window).height();if(!a(e).data("bxSlider")){var h=function(){a(e).data("bxSlider")||(d.settings=a.extend({},b,c),d.settings.slideWidth=parseInt(d.settings.slideWidth),d.children=e.children(d.settings.slideSelector),d.children.length<d.settings.minSlides&&(d.settings.minSlides=d.children.length),d.children.length<d.settings.maxSlides&&(d.settings.maxSlides=d.children.length),d.settings.randomStart&&(d.settings.startSlide=Math.floor(Math.random()*d.children.length)),d.active={index:d.settings.startSlide},d.carousel=d.settings.minSlides>1||d.settings.maxSlides>1?!0:!1,d.carousel&&(d.settings.preloadImages="all"),d.minThreshold=d.settings.minSlides*d.settings.slideWidth+(d.settings.minSlides-1)*d.settings.slideMargin,d.maxThreshold=d.settings.maxSlides*d.settings.slideWidth+(d.settings.maxSlides-1)*d.settings.slideMargin,d.working=!1,d.controls={},d.interval=null,d.animProp="vertical"===d.settings.mode?"top":"left",d.usingCSS=d.settings.useCSS&&"fade"!==d.settings.mode&&function(){for(var a=document.createElement("div"),b=["WebkitPerspective","MozPerspective","OPerspective","msPerspective"],c=0;c<b.length;c++)if(void 0!==a.style[b[c]])return d.cssPrefix=b[c].replace("Perspective","").toLowerCase(),d.animProp="-"+d.cssPrefix+"-transform",!0;return!1}(),"vertical"===d.settings.mode&&(d.settings.maxSlides=d.settings.minSlides),e.data("origStyle",e.attr("style")),e.children(d.settings.slideSelector).each(function(){a(this).data("origStyle",a(this).attr("style"))}),j())},j=function(){var b=d.children.eq(d.settings.startSlide);e.wrap('<div class="'+d.settings.wrapperClass+'"><div class="bx-viewport"></div></div>'),d.viewport=e.parent(),d.settings.ariaLive&&!d.settings.ticker&&d.viewport.attr("aria-live","polite"),d.loader=a('<div class="bx-loading" />'),d.viewport.prepend(d.loader),e.css({width:"horizontal"===d.settings.mode?1e3*d.children.length+215+"%":"auto",position:"relative"}),d.usingCSS&&d.settings.easing?e.css("-"+d.cssPrefix+"-transition-timing-function",d.settings.easing):d.settings.easing||(d.settings.easing="swing"),d.viewport.css({width:"100%",overflow:"hidden",position:"relative"}),d.viewport.parent().css({maxWidth:n()}),d.settings.pager||d.settings.controls||d.viewport.parent().css({margin:"0 auto 0px"}),d.children.css({"float":"horizontal"===d.settings.mode?"left":"none",listStyle:"none",position:"relative"}),d.children.css("width",o()),"horizontal"===d.settings.mode&&d.settings.slideMargin>0&&d.children.css("marginRight",d.settings.slideMargin),"vertical"===d.settings.mode&&d.settings.slideMargin>0&&d.children.css("marginBottom",d.settings.slideMargin),"fade"===d.settings.mode&&(d.children.css({position:"absolute",zIndex:0,display:"none"}),d.children.eq(d.settings.startSlide).css({zIndex:d.settings.slideZIndex,display:"block"})),d.controls.el=a('<div class="bx-controls" />'),d.settings.captions&&y(),d.active.last=d.settings.startSlide===q()-1,d.settings.video&&e.fitVids(),("all"===d.settings.preloadImages||d.settings.ticker)&&(b=d.children),d.settings.ticker?d.settings.pager=!1:(d.settings.controls&&w(),d.settings.auto&&d.settings.autoControls&&x(),d.settings.pager&&v(),(d.settings.controls||d.settings.autoControls||d.settings.pager)&&d.viewport.after(d.controls.el)),k(b,l)},k=function(b,c){var d=b.find('img:not([src=""]), iframe').length,e=0;return 0===d?void c():void b.find('img:not([src=""]), iframe').each(function(){a(this).one("load error",function(){++e===d&&c()}).each(function(){this.complete&&a(this).load()})})},l=function(){if(d.settings.infiniteLoop&&"fade"!==d.settings.mode&&!d.settings.ticker){var b="vertical"===d.settings.mode?d.settings.minSlides:d.settings.maxSlides,c=d.children.slice(0,b).clone(!0).addClass("bx-clone"),f=d.children.slice(-b).clone(!0).addClass("bx-clone");d.settings.ariaHidden&&(c.attr("aria-hidden",!0),f.attr("aria-hidden",!0)),e.append(c).prepend(f)}d.loader.remove(),s(),"vertical"===d.settings.mode&&(d.settings.adaptiveHeight=!0),d.viewport.height(m()),e.redrawSlider(),d.settings.onSliderLoad.call(e,d.active.index),d.initialized=!0,d.settings.responsive&&a(window).bind("resize",S),d.settings.auto&&d.settings.autoStart&&(q()>1||d.settings.autoSlideForOnePage)&&I(),d.settings.ticker&&J(),d.settings.pager&&E(d.settings.startSlide),d.settings.controls&&H(),d.settings.touchEnabled&&!d.settings.ticker&&N(),d.settings.keyboardEnabled&&!d.settings.ticker&&a(document).keydown(M)},m=function(){var b=0,c=a();if("vertical"===d.settings.mode||d.settings.adaptiveHeight)if(d.carousel){var e=1===d.settings.moveSlides?d.active.index:d.active.index*r();for(c=d.children.eq(e),i=1;i<=d.settings.maxSlides-1;i++)c=e+i>=d.children.length?c.add(d.children.eq(i-1)):c.add(d.children.eq(e+i))}else c=d.children.eq(d.active.index);else c=d.children;return"vertical"===d.settings.mode?(c.each(function(c){b+=a(this).outerHeight()}),d.settings.slideMargin>0&&(b+=d.settings.slideMargin*(d.settings.minSlides-1))):b=Math.max.apply(Math,c.map(function(){return a(this).outerHeight(!1)}).get()),"border-box"===d.viewport.css("box-sizing")?b+=parseFloat(d.viewport.css("padding-top"))+parseFloat(d.viewport.css("padding-bottom"))+parseFloat(d.viewport.css("border-top-width"))+parseFloat(d.viewport.css("border-bottom-width")):"padding-box"===d.viewport.css("box-sizing")&&(b+=parseFloat(d.viewport.css("padding-top"))+parseFloat(d.viewport.css("padding-bottom"))),b},n=function(){var a="100%";return d.settings.slideWidth>0&&(a="horizontal"===d.settings.mode?d.settings.maxSlides*d.settings.slideWidth+(d.settings.maxSlides-1)*d.settings.slideMargin:d.settings.slideWidth),a},o=function(){var a=d.settings.slideWidth,b=d.viewport.width();if(0===d.settings.slideWidth||d.settings.slideWidth>b&&!d.carousel||"vertical"===d.settings.mode)a=b;else if(d.settings.maxSlides>1&&"horizontal"===d.settings.mode){if(b>d.maxThreshold)return a;b<d.minThreshold?a=(b-d.settings.slideMargin*(d.settings.minSlides-1))/d.settings.minSlides:d.settings.shrinkItems&&(a=Math.floor((b+d.settings.slideMargin)/Math.ceil((b+d.settings.slideMargin)/(a+d.settings.slideMargin))-d.settings.slideMargin))}return a},p=function(){var a=1,b=null;return"horizontal"===d.settings.mode&&d.settings.slideWidth>0?d.viewport.width()<d.minThreshold?a=d.settings.minSlides:d.viewport.width()>d.maxThreshold?a=d.settings.maxSlides:(b=d.children.first().width()+d.settings.slideMargin,a=Math.floor((d.viewport.width()+d.settings.slideMargin)/b)):"vertical"===d.settings.mode&&(a=d.settings.minSlides),a},q=function(){var a=0,b=0,c=0;if(d.settings.moveSlides>0)if(d.settings.infiniteLoop)a=Math.ceil(d.children.length/r());else for(;b<d.children.length;)++a,b=c+p(),c+=d.settings.moveSlides<=p()?d.settings.moveSlides:p();else a=Math.ceil(d.children.length/p());return a},r=function(){return d.settings.moveSlides>0&&d.settings.moveSlides<=p()?d.settings.moveSlides:p()},s=function(){var a,b,c;d.children.length>d.settings.maxSlides&&d.active.last&&!d.settings.infiniteLoop?"horizontal"===d.settings.mode?(b=d.children.last(),a=b.position(),t(-(a.left-(d.viewport.width()-b.outerWidth())),"reset",0)):"vertical"===d.settings.mode&&(c=d.children.length-d.settings.minSlides,a=d.children.eq(c).position(),t(-a.top,"reset",0)):(a=d.children.eq(d.active.index*r()).position(),d.active.index===q()-1&&(d.active.last=!0),void 0!==a&&("horizontal"===d.settings.mode?t(-a.left,"reset",0):"vertical"===d.settings.mode&&t(-a.top,"reset",0)))},t=function(b,c,f,g){var h,i;d.usingCSS?(i="vertical"===d.settings.mode?"translate3d(0, "+b+"px, 0)":"translate3d("+b+"px, 0, 0)",e.css("-"+d.cssPrefix+"-transition-duration",f/1e3+"s"),"slide"===c?(e.css(d.animProp,i),0!==f?e.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(b){a(b.target).is(e)&&(e.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),F())}):F()):"reset"===c?e.css(d.animProp,i):"ticker"===c&&(e.css("-"+d.cssPrefix+"-transition-timing-function","linear"),e.css(d.animProp,i),0!==f?e.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(b){a(b.target).is(e)&&(e.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),t(g.resetValue,"reset",0),K())}):(t(g.resetValue,"reset",0),K()))):(h={},h[d.animProp]=b,"slide"===c?e.animate(h,f,d.settings.easing,function(){F()}):"reset"===c?e.css(d.animProp,b):"ticker"===c&&e.animate(h,f,"linear",function(){t(g.resetValue,"reset",0),K()}))},u=function(){for(var b="",c="",e=q(),f=0;e>f;f++)c="",d.settings.buildPager&&a.isFunction(d.settings.buildPager)||d.settings.pagerCustom?(c=d.settings.buildPager(f),d.pagerEl.addClass("bx-custom-pager")):(c=f+1,d.pagerEl.addClass("bx-default-pager")),b+='<div class="bx-pager-item"><a href="" data-slide-index="'+f+'" class="bx-pager-link">'+c+"</a></div>";d.pagerEl.html(b)},v=function(){d.settings.pagerCustom?d.pagerEl=a(d.settings.pagerCustom):(d.pagerEl=a('<div class="bx-pager" />'),d.settings.pagerSelector?a(d.settings.pagerSelector).html(d.pagerEl):d.controls.el.addClass("bx-has-pager").append(d.pagerEl),u()),d.pagerEl.on("click touchend","a",D)},w=function(){d.controls.next=a('<a class="bx-next" href="">'+d.settings.nextText+"</a>"),d.controls.prev=a('<a class="bx-prev" href="">'+d.settings.prevText+"</a>"),d.controls.next.bind("click touchend",z),d.controls.prev.bind("click touchend",A),d.settings.nextSelector&&a(d.settings.nextSelector).append(d.controls.next),d.settings.prevSelector&&a(d.settings.prevSelector).append(d.controls.prev),d.settings.nextSelector||d.settings.prevSelector||(d.controls.directionEl=a('<div class="bx-controls-direction" />'),d.controls.directionEl.append(d.controls.prev).append(d.controls.next),d.controls.el.addClass("bx-has-controls-direction").append(d.controls.directionEl))},x=function(){d.controls.start=a('<div class="bx-controls-auto-item"><a class="bx-start" href="">'+d.settings.startText+"</a></div>"),d.controls.stop=a('<div class="bx-controls-auto-item"><a class="bx-stop" href="">'+d.settings.stopText+"</a></div>"),d.controls.autoEl=a('<div class="bx-controls-auto" />'),d.controls.autoEl.on("click",".bx-start",B),d.controls.autoEl.on("click",".bx-stop",C),d.settings.autoControlsCombine?d.controls.autoEl.append(d.controls.start):d.controls.autoEl.append(d.controls.start).append(d.controls.stop),d.settings.autoControlsSelector?a(d.settings.autoControlsSelector).html(d.controls.autoEl):d.controls.el.addClass("bx-has-controls-auto").append(d.controls.autoEl),G(d.settings.autoStart?"stop":"start")},y=function(){d.children.each(function(b){var c=a(this).find("img:first").attr("title");void 0!==c&&(""+c).length&&a(this).append('<div class="bx-caption"><span>'+c+"</span></div>")})},z=function(a){a.preventDefault(),d.controls.el.hasClass("disabled")||(d.settings.auto&&d.settings.stopAutoOnClick&&e.stopAuto(),e.goToNextSlide())},A=function(a){a.preventDefault(),d.controls.el.hasClass("disabled")||(d.settings.auto&&d.settings.stopAutoOnClick&&e.stopAuto(),e.goToPrevSlide())},B=function(a){e.startAuto(),a.preventDefault()},C=function(a){e.stopAuto(),a.preventDefault()},D=function(b){var c,f;b.preventDefault(),d.controls.el.hasClass("disabled")||(d.settings.auto&&d.settings.stopAutoOnClick&&e.stopAuto(),c=a(b.currentTarget),void 0!==c.attr("data-slide-index")&&(f=parseInt(c.attr("data-slide-index")),f!==d.active.index&&e.goToSlide(f)))},E=function(b){var c=d.children.length;return"short"===d.settings.pagerType?(d.settings.maxSlides>1&&(c=Math.ceil(d.children.length/d.settings.maxSlides)),void d.pagerEl.html(b+1+d.settings.pagerShortSeparator+c)):(d.pagerEl.find("a").removeClass("active"),void d.pagerEl.each(function(c,d){a(d).find("a").eq(b).addClass("active")}))},F=function(){if(d.settings.infiniteLoop){var a="";0===d.active.index?a=d.children.eq(0).position():d.active.index===q()-1&&d.carousel?a=d.children.eq((q()-1)*r()).position():d.active.index===d.children.length-1&&(a=d.children.eq(d.children.length-1).position()),a&&("horizontal"===d.settings.mode?t(-a.left,"reset",0):"vertical"===d.settings.mode&&t(-a.top,"reset",0))}d.working=!1,d.settings.onSlideAfter.call(e,d.children.eq(d.active.index),d.oldIndex,d.active.index)},G=function(a){d.settings.autoControlsCombine?d.controls.autoEl.html(d.controls[a]):(d.controls.autoEl.find("a").removeClass("active"),d.controls.autoEl.find("a:not(.bx-"+a+")").addClass("active"))},H=function(){1===q()?(d.controls.prev.addClass("disabled"),d.controls.next.addClass("disabled")):!d.settings.infiniteLoop&&d.settings.hideControlOnEnd&&(0===d.active.index?(d.controls.prev.addClass("disabled"),d.controls.next.removeClass("disabled")):d.active.index===q()-1?(d.controls.next.addClass("disabled"),d.controls.prev.removeClass("disabled")):(d.controls.prev.removeClass("disabled"),d.controls.next.removeClass("disabled")))},I=function(){if(d.settings.autoDelay>0){setTimeout(e.startAuto,d.settings.autoDelay)}else e.startAuto(),a(window).focus(function(){e.startAuto()}).blur(function(){e.stopAuto()});d.settings.autoHover&&e.hover(function(){d.interval&&(e.stopAuto(!0),d.autoPaused=!0)},function(){d.autoPaused&&(e.startAuto(!0),d.autoPaused=null)})},J=function(){var b,c,f,g,h,i,j,k,l=0;"next"===d.settings.autoDirection?e.append(d.children.clone().addClass("bx-clone")):(e.prepend(d.children.clone().addClass("bx-clone")),b=d.children.first().position(),l="horizontal"===d.settings.mode?-b.left:-b.top),t(l,"reset",0),d.settings.pager=!1,d.settings.controls=!1,d.settings.autoControls=!1,d.settings.tickerHover&&(d.usingCSS?(g="horizontal"===d.settings.mode?4:5,d.viewport.hover(function(){c=e.css("-"+d.cssPrefix+"-transform"),f=parseFloat(c.split(",")[g]),t(f,"reset",0)},function(){k=0,d.children.each(function(b){k+="horizontal"===d.settings.mode?a(this).outerWidth(!0):a(this).outerHeight(!0)}),h=d.settings.speed/k,i="horizontal"===d.settings.mode?"left":"top",j=h*(k-Math.abs(parseInt(f))),K(j)})):d.viewport.hover(function(){e.stop()},function(){k=0,d.children.each(function(b){k+="horizontal"===d.settings.mode?a(this).outerWidth(!0):a(this).outerHeight(!0)}),h=d.settings.speed/k,i="horizontal"===d.settings.mode?"left":"top",j=h*(k-Math.abs(parseInt(e.css(i)))),K(j)})),K()},K=function(a){var b,c,f,g=a?a:d.settings.speed,h={left:0,top:0},i={left:0,top:0};"next"===d.settings.autoDirection?h=e.find(".bx-clone").first().position():i=d.children.first().position(),b="horizontal"===d.settings.mode?-h.left:-h.top,c="horizontal"===d.settings.mode?-i.left:-i.top,f={resetValue:c},t(b,"ticker",g,f)},L=function(b){var c=a(window),d={top:c.scrollTop(),left:c.scrollLeft()},e=b.offset();return d.right=d.left+c.width(),d.bottom=d.top+c.height(),e.right=e.left+b.outerWidth(),e.bottom=e.top+b.outerHeight(),!(d.right<e.left||d.left>e.right||d.bottom<e.top||d.top>e.bottom)},M=function(a){var b=document.activeElement.tagName.toLowerCase(),c="input|textarea",d=new RegExp(b,["i"]),f=d.exec(c);if(null==f&&L(e)){if(39===a.keyCode)return z(a),!1;if(37===a.keyCode)return A(a),!1}},N=function(){d.touch={start:{x:0,y:0},end:{x:0,y:0}},d.viewport.bind("touchstart MSPointerDown pointerdown",O),d.viewport.on("click",".bxslider a",function(a){d.viewport.hasClass("click-disabled")&&(a.preventDefault(),d.viewport.removeClass("click-disabled"))})},O=function(a){if(d.controls.el.addClass("disabled"),d.working)a.preventDefault(),d.controls.el.removeClass("disabled");else{d.touch.originalPos=e.position();var b=a.originalEvent,c="undefined"!=typeof b.changedTouches?b.changedTouches:[b];d.touch.start.x=c[0].pageX,d.touch.start.y=c[0].pageY,d.viewport.get(0).setPointerCapture&&(d.pointerId=b.pointerId,d.viewport.get(0).setPointerCapture(d.pointerId)),d.viewport.bind("touchmove MSPointerMove pointermove",Q),d.viewport.bind("touchend MSPointerUp pointerup",R),d.viewport.bind("MSPointerCancel pointercancel",P)}},P=function(a){t(d.touch.originalPos.left,"reset",0),d.controls.el.removeClass("disabled"),d.viewport.unbind("MSPointerCancel pointercancel",P),d.viewport.unbind("touchmove MSPointerMove pointermove",Q),d.viewport.unbind("touchend MSPointerUp pointerup",R),d.viewport.get(0).releasePointerCapture&&d.viewport.get(0).releasePointerCapture(d.pointerId)},Q=function(a){var b=a.originalEvent,c="undefined"!=typeof b.changedTouches?b.changedTouches:[b],e=Math.abs(c[0].pageX-d.touch.start.x),f=Math.abs(c[0].pageY-d.touch.start.y),g=0,h=0;3*e>f&&d.settings.preventDefaultSwipeX?a.preventDefault():3*f>e&&d.settings.preventDefaultSwipeY&&a.preventDefault(),"fade"!==d.settings.mode&&d.settings.oneToOneTouch&&("horizontal"===d.settings.mode?(h=c[0].pageX-d.touch.start.x,g=d.touch.originalPos.left+h):(h=c[0].pageY-d.touch.start.y,g=d.touch.originalPos.top+h),t(g,"reset",0))},R=function(a){d.viewport.unbind("touchmove MSPointerMove pointermove",Q),d.controls.el.removeClass("disabled");var b=a.originalEvent,c="undefined"!=typeof b.changedTouches?b.changedTouches:[b],f=0,g=0;d.touch.end.x=c[0].pageX,d.touch.end.y=c[0].pageY,"fade"===d.settings.mode?(g=Math.abs(d.touch.start.x-d.touch.end.x),g>=d.settings.swipeThreshold&&(d.touch.start.x>d.touch.end.x?e.goToNextSlide():e.goToPrevSlide(),e.stopAuto())):("horizontal"===d.settings.mode?(g=d.touch.end.x-d.touch.start.x,f=d.touch.originalPos.left):(g=d.touch.end.y-d.touch.start.y,f=d.touch.originalPos.top),!d.settings.infiniteLoop&&(0===d.active.index&&g>0||d.active.last&&0>g)?t(f,"reset",200):Math.abs(g)>=d.settings.swipeThreshold?(0>g?e.goToNextSlide():e.goToPrevSlide(),e.stopAuto()):t(f,"reset",200)),d.viewport.unbind("touchend MSPointerUp pointerup",R),d.viewport.get(0).releasePointerCapture&&d.viewport.get(0).releasePointerCapture(d.pointerId)},S=function(b){if(d.initialized)if(d.working)window.setTimeout(S,10);else{var c=a(window).width(),h=a(window).height();(f!==c||g!==h)&&(f=c,g=h,e.redrawSlider(),d.settings.onSliderResize.call(e,d.active.index))}},T=function(a){var b=p();d.settings.ariaHidden&&!d.settings.ticker&&(d.children.attr("aria-hidden","true"),d.children.slice(a,a+b).attr("aria-hidden","false"))},U=function(a){return 0>a?d.settings.infiniteLoop?q()-1:d.active.index:a>=q()?d.settings.infiniteLoop?0:d.active.index:a};return e.goToSlide=function(b,c){var f,g,h,i,j=!0,k=0,l={left:0,top:0},n=null;if(d.oldIndex=d.active.index,d.active.index=U(b),!d.working&&d.active.index!==d.oldIndex){if(d.working=!0,j=d.settings.onSlideBefore.call(e,d.children.eq(d.active.index),d.oldIndex,d.active.index),"undefined"!=typeof j&&!j)return d.active.index=d.oldIndex,void(d.working=!1);"next"===c?d.settings.onSlideNext.call(e,d.children.eq(d.active.index),d.oldIndex,d.active.index)||(j=!1):"prev"===c&&(d.settings.onSlidePrev.call(e,d.children.eq(d.active.index),d.oldIndex,d.active.index)||(j=!1)),d.active.last=d.active.index>=q()-1,(d.settings.pager||d.settings.pagerCustom)&&E(d.active.index),d.settings.controls&&H(),"fade"===d.settings.mode?(d.settings.adaptiveHeight&&d.viewport.height()!==m()&&d.viewport.animate({height:m()},d.settings.adaptiveHeightSpeed),d.children.filter(":visible").fadeOut(d.settings.speed).css({zIndex:0}),d.children.eq(d.active.index).css("zIndex",d.settings.slideZIndex+1).fadeIn(d.settings.speed,function(){a(this).css("zIndex",d.settings.slideZIndex),F()})):(d.settings.adaptiveHeight&&d.viewport.height()!==m()&&d.viewport.animate({height:m()},d.settings.adaptiveHeightSpeed),!d.settings.infiniteLoop&&d.carousel&&d.active.last?"horizontal"===d.settings.mode?(n=d.children.eq(d.children.length-1),l=n.position(),k=d.viewport.width()-n.outerWidth()):(f=d.children.length-d.settings.minSlides,l=d.children.eq(f).position()):d.carousel&&d.active.last&&"prev"===c?(g=1===d.settings.moveSlides?d.settings.maxSlides-r():(q()-1)*r()-(d.children.length-d.settings.maxSlides),n=e.children(".bx-clone").eq(g),l=n.position()):"next"===c&&0===d.active.index?(l=e.find("> .bx-clone").eq(d.settings.maxSlides).position(),d.active.last=!1):b>=0&&(i=b*parseInt(r()),l=d.children.eq(i).position()),"undefined"!=typeof l?(h="horizontal"===d.settings.mode?-(l.left-k):-l.top,t(h,"slide",d.settings.speed)):d.working=!1),d.settings.ariaHidden&&T(d.active.index*r())}},e.goToNextSlide=function(){if(d.settings.infiniteLoop||!d.active.last){var a=parseInt(d.active.index)+1;e.goToSlide(a,"next")}},e.goToPrevSlide=function(){if(d.settings.infiniteLoop||0!==d.active.index){var a=parseInt(d.active.index)-1;e.goToSlide(a,"prev")}},e.startAuto=function(a){d.interval||(d.interval=setInterval(function(){"next"===d.settings.autoDirection?e.goToNextSlide():e.goToPrevSlide()},d.settings.pause),d.settings.autoControls&&a!==!0&&G("stop"))},e.stopAuto=function(a){d.interval&&(clearInterval(d.interval),d.interval=null,d.settings.autoControls&&a!==!0&&G("start"))},e.getCurrentSlide=function(){return d.active.index},e.getCurrentSlideElement=function(){return d.children.eq(d.active.index)},e.getSlideElement=function(a){return d.children.eq(a)},e.getSlideCount=function(){return d.children.length},e.isWorking=function(){return d.working},e.redrawSlider=function(){d.children.add(e.find(".bx-clone")).outerWidth(o()),d.viewport.css("height",m()),d.settings.ticker||s(),d.active.last&&(d.active.index=q()-1),d.active.index>=q()&&(d.active.last=!0),d.settings.pager&&!d.settings.pagerCustom&&(u(),E(d.active.index)),d.settings.ariaHidden&&T(d.active.index*r())},e.destroySlider=function(){d.initialized&&(d.initialized=!1,a(".bx-clone",this).remove(),d.children.each(function(){void 0!==a(this).data("origStyle")?a(this).attr("style",a(this).data("origStyle")):a(this).removeAttr("style")}),void 0!==a(this).data("origStyle")?this.attr("style",a(this).data("origStyle")):a(this).removeAttr("style"),a(this).unwrap().unwrap(),d.controls.el&&d.controls.el.remove(),d.controls.next&&d.controls.next.remove(),d.controls.prev&&d.controls.prev.remove(),d.pagerEl&&d.settings.controls&&!d.settings.pagerCustom&&d.pagerEl.remove(),a(".bx-caption",this).remove(),d.controls.autoEl&&d.controls.autoEl.remove(),clearInterval(d.interval),d.settings.responsive&&a(window).unbind("resize",S),d.settings.keyboardEnabled&&a(document).unbind("keydown",M),a(this).removeData("bxSlider"))},e.reloadSlider=function(b){void 0!==b&&(c=b),e.destroySlider(),h(),a(e).data("bxSlider",this)},h(),a(e).data("bxSlider",this),this}}}(jQuery);
/*
*	ImageZoom - Responsive jQuery Image Zoom Pluin
*	by hkeyjun
*   http://codecanyon.net/user/hkeyjun	
*/
!function(a,b){a.ImageZoom=function(c,d){function f(a){var b=parseInt(a);return b=isNaN(b)?0:b}var e=this;e.$el=a(c),e.$el.data("imagezoom",e),e.init=function(b){e.options=a.extend({},a.ImageZoom.defaults,b),e.$viewer=a('<div class="zm-viewer '+e.options.zoomViewerClass+'"></div>').appendTo("body"),e.$handler=a('<div class="zm-handler'+e.options.zoomHandlerClass+'"></div>').appendTo("body"),e.isBigImageReady=-1,e.$largeImg=null,e.isActive=!1,e.$handlerArea=null,e.isWebkit=/chrome/.test(navigator.userAgent.toLowerCase())||/safari/.test(navigator.userAgent.toLowerCase()),e.evt={x:-1,y:-1},e.options.bigImageSrc=""==e.options.bigImageSrc?e.$el.attr("src"):e.options.bigImageSrc,(new Image).src=e.options.bigImageSrc,e.callIndex=a.ImageZoom._calltimes+1,e.animateTimer=null,a.ImageZoom._calltimes+=1,a(document).bind("mousemove.imagezoom"+e.callIndex,function(a){e.isActive&&e.moveHandler(a.pageX,a.pageY)}),e.$el.bind("mouseover.imagezoom",function(a){e.isActive=!0,e.showViewer(a)})},e.moveHandler=function(a,c){var i,j,k,l,m,n,o,p,d=e.$el.offset(),g=e.$el.outerWidth(!1),h=e.$el.outerHeight(!1);a>=d.left&&a<=d.left+g&&c>=d.top&&c<=d.top+h?(d.left=d.left+f(e.$el.css("borderLeftWidth"))+f(e.$el.css("paddingLeft")),d.top=d.top+f(e.$el.css("borderTopWidth"))+f(e.$el.css("paddingTop")),g=e.$el.width(),h=e.$el.height(),a>=d.left&&a<=d.left+g&&c>=d.top&&c<=d.top+h&&(e.evt={x:a,y:c},"follow"==e.options.type&&e.$viewer.css({top:c-e.$viewer.outerHeight()/2,left:a-e.$viewer.outerWidth()/2}),1==e.isBigImageReady&&(k=c-d.top,l=a-d.left,"inner"==e.options.type?(i=-e.$largeImg.height()*k/h+k,j=-e.$largeImg.width()*l/g+l):"standard"==e.options.type?(m=l-e.$handlerArea.width()/2,n=k-e.$handlerArea.height()/2,o=e.$handlerArea.width(),p=e.$handlerArea.height(),0>m?m=0:m>g-o&&(m=g-o),0>n?n=0:n>h-p&&(n=h-p),j=-m/e.scale,i=-n/e.scale,e.isWebkit?(e.$handlerArea.css({opacity:.99}),setTimeout(function(){e.$handlerArea.css({top:n,left:m,opacity:1})},0)):e.$handlerArea.css({top:n,left:m})):"follow"==e.options.type&&(i=-e.$largeImg.height()/h*k+e.options.zoomSize[1]/2,j=-e.$largeImg.width()/g*l+e.options.zoomSize[0]/2,-i>e.$largeImg.height()-e.options.zoomSize[1]?i=-(e.$largeImg.height()-e.options.zoomSize[1]):i>0&&(i=0),-j>e.$largeImg.width()-e.options.zoomSize[0]?j=-(e.$largeImg.width()-e.options.zoomSize[0]):j>0&&(j=0)),e.options.smoothMove?(b.clearTimeout(e.animateTimer),e.smoothMove(j,i)):e.$viewer.find("img").css({top:i,left:j})))):(e.isActive=!1,e.$viewer.hide(),e.$handler.hide(),e.options.onHide(e),b.clearTimeout(e.animateTimer),e.animateTimer=null)},e.showViewer=function(b){var k,l,m,n,o,c=e.$el.offset().top,d=f(e.$el.css("borderTopWidth")),g=f(e.$el.css("paddingTop")),h=e.$el.offset().left,i=f(e.$el.css("borderLeftWidth")),j=f(e.$el.css("paddingLeft"));c=c+d+g,h=h+i+j,k=e.$el.width(),l=e.$el.height(),e.isBigImageReady<1&&a("div",e.$viewer).remove(),"inner"==e.options.type?e.$viewer.css({top:c,left:h,width:k,height:l}).show():"standard"==e.options.type?(m=""==e.options.alignTo?e.$el:a("#"+e.options.alignTo),"left"==e.options.position?(n=m.offset().left-e.options.zoomSize[0]-e.options.offset[0],o=m.offset().top+e.options.offset[1]):"right"==e.options.position&&(n=m.offset().left+m.width()+e.options.offset[0],o=m.offset().top+e.options.offset[1]),e.$viewer.css({top:o,left:n,width:e.options.zoomSize[0],height:e.options.zoomSize[1]}).show(),e.$handlerArea&&(e.scale=k/e.$largeImg.width(),e.$handlerArea.css({width:e.$viewer.width()*e.scale,height:e.$viewer.height()*e.scale}))):"follow"==e.options.type&&e.$viewer.css({width:e.options.zoomSize[0],height:e.options.zoomSize[1],top:b.pageY-e.options.zoomSize[1]/2,left:b.pageX-e.options.zoomSize[0]/2}).show(),e.$handler.css({top:c,left:h,width:k,height:l}).show(),e.options.onShow(e),-1==e.isBigImageReady&&(e.isBigImageReady=0,fastImg(e.options.bigImageSrc,function(){if(a.trim(a(this).attr("src"))==a.trim(e.options.bigImageSrc)){if(e.$viewer.append('<img src="'+e.$el.attr("src")+'" class="zm-fast" style="position:absolute;width:'+this.width+"px;height:"+this.height+'px">'),e.isBigImageReady=1,e.$largeImg=a('<img src="'+e.options.bigImageSrc+'" style="position:absolute;width:'+this.width+"px;height:"+this.height+'px">'),e.$viewer.append(e.$largeImg),"standard"==e.options.type){var c=k/this.width;e.$handlerArea=a('<div class="zm-handlerarea" style="width:'+e.$viewer.width()*c+"px;height:"+e.$viewer.height()*c+'px"></div>').appendTo(e.$handler),e.scale=c}-1==e.evt.x&&-1==e.evt.y?e.moveHandler(b.pageX,b.pageY):e.moveHandler(e.evt.x,e.evt.y),e.options.showDescription&&e.$el.attr("alt")&&""!=a.trim(e.$el.attr("alt"))&&e.$viewer.append('<div class="'+e.options.descriptionClass+'">'+e.$el.attr("alt")+"</div>")}},function(){},function(){}))},e.changeImage=function(a,b){this.$el.attr("src",a),this.isBigImageReady=-1,this.options.bigImageSrc="string"==typeof b?b:a,e.options.preload&&((new Image).src=this.options.bigImageSrc),this.$viewer.hide().empty(),this.$handler.hide().empty(),this.$handlerArea=null},e.changeZoomSize=function(a,b){e.options.zoomSize=[a,b]},e.destroy=function(){a(document).unbind("mousemove.imagezoom"+e.callIndex),this.$el.unbind(".imagezoom"),this.$viewer.remove(),this.$handler.remove(),this.$el.removeData("imagezoom")},e.smoothMove=function(a,c){var g,h,i,j,k,d=10,f=parseInt(e.$largeImg.css("top"));return f=isNaN(f)?0:f,g=parseInt(e.$largeImg.css("left")),g=isNaN(g)?0:g,c=parseInt(c),a=parseInt(a),f==c&&g==a?(b.clearTimeout(e.animateTimer),e.animateTimer=null,void 0):(h=c-f,i=a-g,j=f+h/Math.abs(h)*Math.ceil(Math.abs(h/d)),k=g+i/Math.abs(i)*Math.ceil(Math.abs(i/d)),e.$viewer.find("img").css({top:j,left:k}),e.animateTimer=setTimeout(function(){e.smoothMove(a,c)},10),void 0)},e.init(d)},a.ImageZoom.defaults={bigImageSrc:"",preload:!0,type:"inner",smoothMove:!0,position:"right",offset:[10,0],alignTo:"",zoomSize:[100,100],descriptionClass:"zm-description",zoomViewerClass:"",zoomHandlerClass:"",showDescription:!0,onShow:function(){},onHide:function(){}},a.ImageZoom._calltimes=0,a.fn.ImageZoom=function(b){return this.each(function(){new a.ImageZoom(this,b)})}}(jQuery,window);var fastImg=function(){var a=[],b=null,c=function(){for(var b=0;b<a.length;b++)a[b].end?a.splice(b--,1):a[b]();!a.length&&d()},d=function(){clearInterval(b),b=null};return function(d,e,f,g){var h,i,j,k,l,m=new Image;return m.src=d,m.complete?(e.call(m),f&&f.call(m),void 0):(i=m.width,j=m.height,m.onerror=function(){g&&g.call(m),h.end=!0,m=m.onload=m.onerror=null},h=function(){k=m.width,l=m.height,(k!==i||l!==j||k*l>1024)&&(e.call(m),h.end=!0)},h(),m.onload=function(){!h.end&&h(),f&&f.call(m),m=m.onload=m.onerror=null},h.end||(a.push(h),null===b&&(b=setInterval(c,40))),void 0)}}();
(function($, document) {

    var jck_wt = {

        /**
         * Set up cache with common elements and vars
         */

        cache: function() {

            jck_wt.els  = {};
            jck_wt.vars = {};
            jck_wt.tpl  = {};

            // common elements
            jck_wt.els.images                       = $('.jck-wt-images');
            jck_wt.els.images_wrap                  = $('.jck-wt-images-wrap');
            jck_wt.els.thumbnails                   = $('.jck-wt-thumbnails');
            jck_wt.els.thumbnails_wrap              = $('.jck-wt-thumbnails-wrap');
            jck_wt.els.variations_form              = $('form.variations_form');
            jck_wt.els.all_images_wrap              = $('.jck-wt-all-images-wrap');
            jck_wt.els.variation_id_field           = jck_wt.els.variations_form.find('input[name=variation_id]');
            jck_wt.els.wishlist_buttons             = $('.jck-wt-wishlist-buttons');
            jck_wt.els.wishlist_add_button          = $('.jck-wt-wishlist-buttons__add');
            jck_wt.els.wishlist_browse_button       = $('.jck-wt-wishlist-buttons__browse');
            jck_wt.els.gallery                      = false;
            jck_wt.els.video_template               = $('#jck-wt-video-template');

            // common vars
            jck_wt.vars.window_resize_timeout       = false;
            jck_wt.vars.is_dragging_image_slide     = false;
            jck_wt.vars.images_slider_data          = false;
            jck_wt.vars.thumbnails_slider_data      = false;
            jck_wt.vars.loading_class               = "jck-wt-loading";
            jck_wt.vars.reset_class                 = "jck-wt-reset";
            jck_wt.vars.thumbnails_active_class     = "jck-wt-thumbnails__slide--active";
            jck_wt.vars.images_active_class         = "jck-wt-images__slide--active";
            jck_wt.vars.wishlist_added_class        = "jck-wt-wishlist-buttons--added";
            jck_wt.vars.is_touch_device             = !!('ontouchstart' in window);
            jck_wt.vars.is_zoom_enabled             = jck_wt.is_true(jck_wt_vars.options.enableZoom) ? true : false;
            jck_wt.vars.is_fullscreen_enabled       = ( jck_wt.is_true(jck_wt_vars.options.enableLightbox) ) ? true : false;
            jck_wt.vars.variations_json             = jck_wt.els.variations_form.attr('data-product_variations');
            jck_wt.vars.variations                  = jck_wt.vars.variations_json ? $.parseJSON( jck_wt.vars.variations_json ) : false;
            jck_wt.vars.product_id                  = jck_wt.els.variations_form.data('product_id');
            jck_wt.vars.show_variation_trigger      = "jck_wt_show_variation";
            jck_wt.vars.loading_variation_trigger   = "jck_wt_loading_variation";
            jck_wt.vars.default_images              = $.parseJSON( jck_wt.els.all_images_wrap.attr('data-default') );
            jck_wt.vars.fullscreen_trigger          = ( jck_wt.is_true( jck_wt_vars.options.clickAnywhere ) ) ? ".jck-wt-images__image, .jck-wt-fullscreen, .zm-viewer img, .zm-handler" : ".jck-wt-fullscreen";


            // common templates
            jck_wt.tpl.fullscreen_button            = '<a href="javascript: void(0);" class="jck-wt-fullscreen" data-jck-wt-tooltip="'+jck_wt_vars.text.fullscreen+'"><i class="jck-wt-icon jck-wt-icon-fullscreen"></i></a>';
            jck_wt.tpl.play_button                  = '<a href="javascript: void(0);" class="jck-wt-play" data-jck-wt-tooltip="'+jck_wt_vars.text.video+'"><i class="jck-wt-icon jck-wt-icon-play"></i></a>';
            jck_wt.tpl.temp_images_container        = '<div class="jck-wt-temp"><div class="jck-wt-temp__images"/><div class="jck-wt-icon jck-wt-temp__thumbnails"/></div>';
            jck_wt.tpl.image_slide                  = '<div class="jck-wt-images__slide {{slide_class}}"><img class="jck-wt-images__image" src="{{image_src}}" data-srcset="{{image_src}}{{image_src_retina}}" data-large-image="{{large_image_src}}" data-large-image-width="{{large_image_width}}" data-large-image-height="{{large_image_height}}" width="{{image_width}}" height="{{image_height}}" title="{{title}}" alt="{{alt}}"></div>';
            jck_wt.tpl.thumbnail_slide              = '<div class="jck-wt-thumbnails__slide {{slide_class}}" data-index="{{index}}"><img class="jck-wt-thumbnails__image" src="{{image_src}}" data-srcset="{{image_src}}{{image_src_retina}}" title="{{title}}" alt="{{alt}}" width="{{image_width}}" height="{{image_height}}"></div>';
            jck_wt.tpl.retina_img_src               = ', {{image_src}} 2x';

        },

        /**
         * Run on doc ready
         */

        on_load: function() {

            jck_wt.cache();
            jck_wt.setup_sliders();
            jck_wt.watch_variations();
            jck_wt.setup_fullscreen();
            jck_wt.setup_video();
            jck_wt.setup_zoom();
            jck_wt.setup_yith_wishlist();
            jck_wt.setup_tooltips();

        },

        /**
         * Run on resize
         */

        on_resize: function() {

            clearTimeout( jck_wt.vars.window_resize_timeout );
            jck_wt.vars.window_resize_timeout = setTimeout(function(){

                $(window).trigger('resize-end');

            }, 100);

        },

        /**
         * Helper: Check whether a settings value is true
         *
         * @param str val
         */

        is_true: function( val ) {

            return (parseInt(val) === 1) ? true : false;

        },

        /**
         * Helper: Check if a plugin or theme is active
         *
         * @param str name Name of the plugin or theme to check if is active
         */

        is_active: function( name ) {

            if( name === "woothemes_swatches" ) {

                return ($('#swatches-and-photos-css').length > 0) ? true : false;

            }

            return false;

        },

        /**
         * Helper: Lazy load images to improve loading speed
         */

        lazy_load_images: function() {

            var $images = $('img');

            if( $images.length > 0 ) {

                $images.each(function( index, el ){
                    var $image = $(el),
                        data_src = $image.attr('data-jck-wt-src');

                    if( typeof data_src !== "undefined" ) {

                        var $image_clone = $image.clone();

                        $image_clone.attr('src', data_src).css({paddingTop: "", height: ""});
                        $image.replaceWith( $image_clone );

                    }
                });

            }

        },


        /**
         * Images Slider Args
         *
         * Dynamic so the options are recalculated every time
         */

        images_slider_args: function() {

            return {
                mode: jck_wt_vars.options.slideMode,
                speed: parseInt(jck_wt_vars.options.slideSpeed),
                controls: ( jck_wt.els.images.children().length > 1 ) ? jck_wt.is_true(jck_wt_vars.options.enableArrows) : false,
                infiniteLoop: ( jck_wt.els.images.children().length > 1 ) ? jck_wt.is_true(jck_wt_vars.options.enableInfiniteLoop) : false,
                touchEnabled: ( jck_wt.els.images.children().length > 1 ) ? true : false,
                adaptiveHeight: true,
                auto: jck_wt.is_true(jck_wt_vars.options.slideAutoplay),
                pause: jck_wt_vars.options.slideDuration,
                pager: ( jck_wt_vars.options.navigationType === "bullets" ) ? true : false,
                prevText: '<i class="jck-wt-icon jck-wt-icon-prev"></i>',
                nextText: '<i class="jck-wt-icon jck-wt-icon-next"></i>',
                preventDefaultSwipeY: jck_wt_vars.options.slideMode === "vertical" ? true : false,
                onSliderLoad: function(){

                    jck_wt.setup_srcset();

                    if( this.getSlideCount() <= 1 ) {
                        jck_wt.els.images_wrap.find('.bx-controls').hide();
                    }

                    jck_wt.init_zoom();

                },
                onSlideBefore: function($slide_element, old_index, new_index){

                    jck_wt.go_to_thumbnail( new_index );

                    // add active class
                    $('.'+jck_wt.vars.images_active_class).removeClass( jck_wt.vars.images_active_class );
                    $slide_element.addClass( jck_wt.vars.images_active_class );

                    jck_wt.destroy_zoom();

                },
                onSlideAfter: function($slide_element, old_index, new_index){

                    jck_wt.init_zoom();

                }
            };

        },



        /**
         * Thumbnails Slider Args
         *
         * Dynamic so the options are recalculated every time
         */

        thumbnails_slider_args: function() {

            return {
                mode: ( jck_wt_vars.options.thumbnailLayout === "above" || jck_wt_vars.options.thumbnailLayout === "below" || jck_wt.is_below_breakpoint() && jck_wt.move_thumbnails_at_breakpoint() ) ? "horizontal" : "vertical",
                infiniteLoop: false,
                speed: parseInt(jck_wt_vars.options.thumbnailSpeed),
                minSlides: jck_wt.is_below_breakpoint() ? parseInt(jck_wt_vars.options.thumbnailCountBreakpoint) : parseInt(jck_wt_vars.options.thumbnailCount),
                maxSlides: jck_wt.is_below_breakpoint() ? parseInt(jck_wt_vars.options.thumbnailCountBreakpoint) : parseInt(jck_wt_vars.options.thumbnailCount),
                slideWidth: 800,
                moveSlides: 1,
                pager: false,
                controls: false,
                slideMargin: parseInt(jck_wt_vars.options.thumbnailSpacing),
                onSliderLoad: function() {

                    jck_wt.setup_srcset();

                    jck_wt.els.thumbnails_wrap.css({ opacity:1, height: 'auto' });
                    jck_wt.set_thumbnail_controls_visibility( this );

                },
                onSlideAfter: function($slide_element, old_index, new_index) {

                    jck_wt.set_thumbnail_controls_visibility( this );

                }
            };

        },


        /**
         * Setup sliders
         */

        setup_sliders: function() {

            // setup main images slider

            jck_wt.els.images.imagesLoaded( function() {

                jck_wt.vars.images_slider_data = jck_wt.els.images.bxSlider( jck_wt.images_slider_args() );
                jck_wt.lazy_load_images();

            });

            // setup thumbnails slider

            if( jck_wt.has_sliding_thumbnails() ) {

                jck_wt.els.thumbnails.imagesLoaded( function() {

                    jck_wt.setup_sliding_thumbnails();

                });

                // setup click thumbnail control action

                $(document).on('click', ".jck-wt-thumbnails__control", function(){

                    if( !jck_wt.els.all_images_wrap.hasClass( jck_wt.vars.loading_class ) ) {

                        var dir = $(this).attr('data-direction');

                        if( dir === "next" ) {
                            jck_wt.vars.thumbnails_slider_data.goToNextSlide();
                        } else {
                            jck_wt.vars.thumbnails_slider_data.goToPrevSlide();
                        }

                    }

                });

            }

            // setup click thumbnail action

            $(document).on('click', ".jck-wt-thumbnails__slide", function(){

                if( !jck_wt.els.all_images_wrap.hasClass( jck_wt.vars.loading_class ) ) {

                    var new_index = parseInt( $(this).attr('data-index') );

                    jck_wt.set_active_thumbnail( new_index );
                    jck_wt.vars.images_slider_data.goToSlide( new_index );

                }

            });

            // setup stop auto

            $(document).on('click', ".jck-wt-thumbnails__slide, .bx-next, .bx-prev, .jck-wt-zoom-prev, .jck-wt-zoom-next, .bx-pager-link", function(){

                jck_wt.vars.images_slider_data.stopAuto();

            });

            // position thumbnails on load

            if( jck_wt.els.thumbnails.length > 0 ) {

                jck_wt.position_thumbnails();

            }

            // position thumbnails on resize

            $(window).on('resize', function(){

                if( jck_wt.has_sliding_thumbnails()) {

                    jck_wt.setup_sliding_thumbnails();

                }

                jck_wt.position_thumbnails();

            });

        },

        /**
         * Helper: Do we have sliding thumbnails?
         */

        has_sliding_thumbnails: function() {

            return jck_wt.els.thumbnails.length > 0 && jck_wt_vars.options.navigationType === "sliding";

        },

        /**
         * Helper: Move thumbnails at breakpoint?
         */

        move_thumbnails_at_breakpoint: function(){

            return jck_wt.is_true( jck_wt_vars.options.thumbnailsBelowBreakpoint ) && jck_wt_vars.options.thumbnailLayout !== "below";

        },

        /**
         * Helper: Is the window width below our breakpoint limit
         */

        is_below_breakpoint: function(){

            return jck_wt.is_true( jck_wt_vars.options.enableBreakpoint ) && jck_wt.viewport().width <= parseInt( jck_wt_vars.options.breakpoint.width, 10 );

        },

        /**
         * Helper: Get viewport dimensions
         */

        viewport: function(){

            var e = window, a = 'inner';

            if (!('innerWidth' in window )) {
                a = 'client';
                e = document.documentElement || document.body;
            }

            return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };

        },

        /**
         * Helper: Setup thumbnails
         */

        setup_sliding_thumbnails: function() {

            if( jck_wt.vars.thumbnails_slider_data ) {

                jck_wt.els.thumbnails.reloadSlider( jck_wt.thumbnails_slider_args() );

            } else {

                jck_wt.vars.thumbnails_slider_data = jck_wt.els.thumbnails.bxSlider( jck_wt.thumbnails_slider_args() );

            }

        },

        /**
         * Helper: Position thumbnails
         */

        position_thumbnails: function(){

            var $next_controls = $('.jck-wt-thumbnails__control--right, .jck-wt-thumbnails__control--down'),
                $prev_controls = $('.jck-wt-thumbnails__control--left, .jck-wt-thumbnails__control--up');

            if( jck_wt.is_below_breakpoint() && jck_wt.move_thumbnails_at_breakpoint() ) {

                jck_wt.els.all_images_wrap.removeClass('jck-wt-all-images-wrap--thumbnails-left jck-wt-all-images-wrap--thumbnails-right jck-wt-all-images-wrap--thumbnails-above').addClass('jck-wt-all-images-wrap--thumbnails-below');

                jck_wt.els.images_wrap.after( jck_wt.els.thumbnails_wrap );
                jck_wt.els.thumbnails_wrap.removeClass('jck-wt-thumbnails-wrap--vertical').addClass('jck-wt-thumbnails-wrap--horizontal');

                $next_controls.removeClass('jck-wt-thumbnails__control--down').addClass('jck-wt-thumbnails__control--right')
                .find('i').removeClass('jck-wt-icon-down-open-mini').addClass('jck-wt-icon-right-open-mini');
                $prev_controls.removeClass('jck-wt-thumbnails__control--up').addClass('jck-wt-thumbnails__control--left')
                .find('i').removeClass('jck-wt-icon-up-open-mini').addClass('jck-wt-icon-left-open-mini');

            } else {

                jck_wt.els.all_images_wrap.removeClass('jck-wt-all-images-wrap--thumbnails-below').addClass('jck-wt-all-images-wrap--thumbnails-'+jck_wt_vars.options.thumbnailLayout);

                if ( jck_wt_vars.options.thumbnailLayout === "left" || jck_wt_vars.options.thumbnailLayout === "above" ) {

                    jck_wt.els.images_wrap.before( jck_wt.els.thumbnails_wrap );

                }

                if ( jck_wt_vars.options.thumbnailLayout === "left" || jck_wt_vars.options.thumbnailLayout === "right" ) {

                    jck_wt.els.thumbnails_wrap.removeClass('jck-wt-thumbnails-wrap--horizontal').addClass('jck-wt-thumbnails-wrap--vertical');

                    $next_controls.removeClass('jck-wt-thumbnails__control--right').addClass('jck-wt-thumbnails__control--down')
                    .find('i').removeClass('jck-wt-icon-right-open-mini').addClass('jck-wt-icon-down-open-mini');
                    $prev_controls.removeClass('jck-wt-thumbnails__control--left').addClass('jck-wt-thumbnails__control--up')
                    .find('i').removeClass('jck-wt-icon-left-open-mini').addClass('jck-wt-icon-up-open-mini');

                }

            }

        },

        /**
         * Helper: Set visibility of thumbnail controls
         */

        set_thumbnail_controls_visibility: function( thumbnails_slider_data ) {

            var last_thumbnail_index = jck_wt.get_last_thumbnail_index(),
                current_thumbnail_index = thumbnails_slider_data.getCurrentSlide(),
                $next_controls = $('.jck-wt-thumbnails__control--right, .jck-wt-thumbnails__control--down'),
                $prev_controls = $('.jck-wt-thumbnails__control--left, .jck-wt-thumbnails__control--up');

            if( thumbnails_slider_data.getSlideCount() <= 1 || thumbnails_slider_data.getSlideCount() <= parseInt(jck_wt_vars.options.thumbnailCount) ) {
                $('.jck-wt-thumbnails__control').hide();
                return;
            }

            if( current_thumbnail_index === 0 ) {
                $next_controls.show();
                $prev_controls.hide();
            } else if( current_thumbnail_index === last_thumbnail_index ) {
                $next_controls.hide();
                $prev_controls.show();
            } else {
                $('.jck-wt-thumbnails__control').show();
            }

        },

        /**
         * Helper: Set active thumbnail
         *
         * @param int index
         */

        set_active_thumbnail: function( index ) {

            $(".jck-wt-thumbnails__slide").removeClass( jck_wt.vars.thumbnails_active_class );
            $(".jck-wt-thumbnails__slide[data-index="+index+"]").addClass( jck_wt.vars.thumbnails_active_class );

        },

        /**
         * Helper: Go to thumbnail
         *
         * @param int index
         */

        go_to_thumbnail: function( index ) {

            if( jck_wt.vars.thumbnails_slider_data ) {
                var thumbnail_index = jck_wt.get_thumbnail_index( index );
                jck_wt.vars.thumbnails_slider_data.goToSlide( thumbnail_index );
            }

            jck_wt.set_active_thumbnail( index );

        },

        /**
         * Helper: Get thumbnail index
         *
         * @param int index
         */

        get_thumbnail_index: function( index ) {

            if( parseInt(jck_wt_vars.options.thumbnailCount) === 1 ) {
                return index;
            }

            var last_thumbnail_index = jck_wt.get_last_thumbnail_index(),
                new_thumbnail_index = ( index > last_thumbnail_index ) ? last_thumbnail_index : ( index === 0 ) ? 0 : index - 1;

            return new_thumbnail_index;

        },

        /**
         * Helper: Get thumbnail index
         */

        get_last_thumbnail_index: function() {

            var thumbnail_count = jck_wt.els.thumbnails.children().length,
                last_slide_index = thumbnail_count - jck_wt_vars.options.thumbnailCount;

            return last_slide_index;

        },

        /**
         * Watch for changes in variations
         */

        watch_variations: function() {

            jck_wt.els.variation_id_field.on('change', function() {

                var variation_id = parseInt( $(this).val() ),
                    currently_showing = parseInt( jck_wt.els.all_images_wrap.attr('data-showing') );

                if( !isNaN(variation_id) && variation_id !== currently_showing ) {

                    jck_wt.get_variation_data( variation_id );

                }

            });

            // on reset data trigger

            jck_wt.els.variations_form.on('reset_data', function() {

                jck_wt.reset_images();

            });

            // on loading variation trigger

            $(document).on(jck_wt.vars.loading_variation_trigger, function( event ){

                jck_wt.els.all_images_wrap.addClass( jck_wt.vars.loading_class );

            });

            // on show variation trigger

            $(document).on(jck_wt.vars.show_variation_trigger, function( event, variation ){

                jck_wt.load_images( variation );

            });

        },

        /**
         * Load Images for variation ID
         *
         * @param obj variation
         */

        load_images: function( variation ) {

            if( variation ) {

                jck_wt.els.all_images_wrap.attr('data-showing', variation.variation_id);

                if( variation.jck_additional_images ) {

                    var image_count = variation.jck_additional_images.length;

                    if( image_count > 0 ) {

                        jck_wt.els.all_images_wrap.removeClass( jck_wt.vars.reset_class );

                        jck_wt.replace_images( variation.jck_additional_images, function(){

                            $(document).trigger( 'jck_wt_images_loaded', [ variation ] );

                        });

                    }

                }

            } else {

                jck_wt.els.all_images_wrap.removeClass( jck_wt.vars.loading_class );

            }

        },

        /**
         * Replace slider images
         *
         * @param obj images
         */

        replace_images: function( images, callback ) {

            var temp_images = jck_wt.create_temporary_images( images );

            // once images have loaded, place them into the appropriate sliders

            temp_images.container.imagesLoaded( function() {

                // replace main images

                jck_wt.els.images.html( temp_images.images.html() );

                // reload main slider

                if( jck_wt.vars.images_slider_data ) {
                    jck_wt.els.images.imagesLoaded(function(){

                        jck_wt.vars.images_slider_data.reloadSlider( jck_wt.images_slider_args() );

                    });
                }

                // If thumbnails are enabled

                if( jck_wt.vars.thumbnails_slider_data ) {

                    // replace thumbnail images

                    jck_wt.els.thumbnails.html( temp_images.thumbnails.html() );

                    // reload thumbnail slider

                    jck_wt.els.thumbnails.imagesLoaded(function(){

                        jck_wt.vars.thumbnails_slider_data.reloadSlider( jck_wt.thumbnails_slider_args() );

                    });
                }

                // remove temp images

                temp_images.container.remove();

                // remove loading icon

                jck_wt.els.all_images_wrap.removeClass( jck_wt.vars.loading_class );

                // run a callback, if required

                if(callback !== undefined) {
                    callback();
                }

            });

        },

        /**
         * Helper: Prepare retina srcset
         *
         * @param str retina_src
         */

        prepare_retina_srcset: function( retina_src ) {

            return jck_wt.tpl.retina_img_src.replace('{{image_src}}', retina_src);

        },

        /**
         * Helper: Setup srcset so it doesn't interfere with imagesloaded
         */

        setup_srcset: function() {

            $('[data-srcset]').each(function(){

                $(this)
                    .attr('srcset', $(this).attr('data-srcset'))
                    .removeAttr('data-srcset');

            });

        },

        /**
         * Create temporary images
         *
         * @param obj images parsed JSON
         */

        create_temporary_images: function( images ) {

            // add temp images container
            $('body').append( jck_wt.tpl.temp_images_container );

            var image_count = images.length,
                temp_images = {
                    'container': $('.jck-wt-temp'),
                    'images': $('.jck-wt-temp__images'),
                    'thumbnails': $('.jck-wt-temp__thumbnails')
                };

            // loop through additional images
            $.each( images, function( index, image_data ){

                // add images to temp div

                var has_retina_single = typeof image_data.single.retina !== "undefined" ? true : false,
                    has_retina_thumb = typeof image_data.thumb.retina !== "undefined" ? true : false;

                var slide_html =
                        jck_wt.tpl.image_slide
                        .replace( /{{image_src}}/g, image_data.single[0] )
                        .replace( /{{image_src_retina}}/g, has_retina_single ? jck_wt.prepare_retina_srcset( image_data.single.retina[0] ) : "" )
                        .replace( "{{large_image_src}}", image_data.large[0] )
                        .replace( "{{large_image_width}}", image_data.large[1] )
                        .replace( "{{large_image_height}}", image_data.large[2] )
                        .replace( "{{image_width}}", image_data.single[1] )
                        .replace( "{{image_height}}", image_data.single[2] )
                        .replace( "{{alt}}", image_data.alt )
                        .replace( "{{title}}", image_data.title )
                        .replace( "{{slide_class}}", index === 0 ? jck_wt.vars.images_active_class  : "" );

                temp_images.images.append( slide_html );

                // add thumbnails to temp div if thumbnails are enabled

                if( image_count > 1 && jck_wt.vars.thumbnails_slider_data ) {

                    var thumbnail_html =
                            jck_wt.tpl.thumbnail_slide
                            .replace( /{{image_src}}/g, image_data.thumb[0] )
                            .replace( /{{image_src_retina}}/g, has_retina_thumb ? jck_wt.prepare_retina_srcset( image_data.thumb.retina[0] ) : "" )
                            .replace( "{{index}}", index )
                            .replace( "{{image_width}}", image_data.thumb[1] )
                            .replace( "{{image_height}}", image_data.thumb[2] )
                            .replace( "{{alt}}", image_data.alt )
                            .replace( "{{title}}", image_data.title )
                            .replace( "{{slide_class}}", index === 0 ? jck_wt.vars.thumbnails_active_class  : "" );

                    temp_images.thumbnails.append( thumbnail_html );

                }

            });

            // pad out the thumbnails if there is less than the
            // amount that are meant to be displayed.

            if( jck_wt.vars.thumbnails_slider_data && image_count !== 1 && image_count < jck_wt_vars.options.thumbnailCount ) {

                var empty_count = jck_wt_vars.options.thumbnailCount - image_count;

                i = 0; while( i < empty_count ) {

                    temp_images.thumbnails.append( '<div/>' );

                    i++;

                }

            }

            return temp_images;

        },

        /**
         * Reset Images to defaults
         */

        reset_images: function(){

            if( !jck_wt.els.all_images_wrap.hasClass( jck_wt.vars.reset_class ) && !jck_wt.els.all_images_wrap.hasClass( jck_wt.vars.loading_class ) ) {

                $(document).trigger( jck_wt.vars.loading_variation_trigger );

                jck_wt.els.all_images_wrap.attr('data-showing', jck_wt.vars.product_id);

                // set reset class

                jck_wt.els.all_images_wrap.addClass( jck_wt.vars.reset_class );

                // replace images

                jck_wt.replace_images( jck_wt.vars.default_images );

            }

        },

        /**
         * Gat variation data from variation ID
         *
         * @param int variation_id
         */

        get_variation_data: function( variation_id ) {

            $(document).trigger( jck_wt.vars.loading_variation_trigger );

            var variation_data = false;

            // variation data available

            if( jck_wt.vars.variations ) {

                $.each(jck_wt.vars.variations, function( index, variation ){

                    if( variation.variation_id === variation_id ) {
                        variation_data = variation;
                    }

                });

                $(document).trigger( jck_wt.vars.show_variation_trigger, [ variation_data ] );

            // variation data not available, look it up via ajax

            } else {

                $.ajax({
                    type:        "GET",
                    url:         jck_wt_vars.ajaxurl,
                    cache:       false,
                    dataType:    "jsonp",
                    crossDomain: true,
                    data: {
                        'action': 'jck_wt_get_variation',
                        'variation_id': variation_id,
                        'product_id': jck_wt.vars.product_id
                    },
                    success: function( response ) {

                        if( response.success ) {
                            if( response.variation ) {

                                variation_data = response.variation;

                                $(document).trigger( jck_wt.vars.show_variation_trigger, [ variation_data ] );

                            }
                        }

                    }
                });

            }

        },


        /**
         * Trigger Photoswipe
         *
         * @param bool last_slide
         */
        trigger_photoswipe: function( last_slide ) {

            var pswpElement = $('.jck-wt-pswp')[0];

            // build items array
            var items = jck_wt.get_gallery_items();

            // define options (if needed)
            var options = {
                // optionName: 'option value'
                // for example:
                index: typeof last_slide === "undefined" ? items.index : items.items.length-1, // start at first slide
                shareEl: false,
                closeOnScroll: false,
                history: false
            };

            // Initializes and opens PhotoSwipe
            jck_wt.els.gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items.items, options);
            jck_wt.els.gallery.init();

            jck_wt.els.gallery.listen('close', function() {

                jck_wt.stop_video();

            });

        },

        /**
         * Pause iframe video
         */
        stop_video: function() {

            var $iframe = $('.jck-wt-video-wrapper iframe');

            if( $iframe.length > 0 ) {

                var iframe_src = $iframe.attr('src');

                $iframe.attr('src', '');
                $iframe.attr('src', iframe_src);

            }

        },

        /**
         * Setup fullscreen
         */
        setup_fullscreen: function() {

            if( !jck_wt.vars.is_fullscreen_enabled ) { return; }

            $(document).on('click', jck_wt.vars.fullscreen_trigger, function(){

                jck_wt.trigger_photoswipe();

            });

        },

        /**
         * Setup video
         */
        setup_video: function() {

            $(document).on('click', '.jck-wt-play', function(){

                jck_wt.trigger_photoswipe( true );

            });

        },

        /**
         * Get Gallery Items
         *
         * @return obj index and items
         */

        get_gallery_items: function() {

            var $slides = jck_wt.els.images.children().not('.bx-clone'),
                items = [],
                index = $slides.filter("."+jck_wt.vars.images_active_class).index();

            if( jck_wt.is_true( jck_wt_vars.options.enableInfiniteLoop ) && jck_wt_vars.options.slideMode !== "fade" ) {
                index = index-1;
            }

            if( jck_wt.is_true(jck_wt_vars.options.enableLightbox) ) {

                if( $slides.length > 0 ) {
                    $slides.each(function( i, el ){

                        var img = $(el).find('img'),
                            large_image_src = img.attr('data-large-image'),
                            large_image_w = img.attr('data-large-image-width'),
                            large_image_h = img.attr('data-large-image-height'),
                            item = {
                                src: large_image_src,
                                w: large_image_w,
                                h: large_image_h
                            };

                        if( jck_wt.is_true( jck_wt_vars.options.enableImageTitle ) ) {

                            var title = img.attr('title');

                            item.title = title;

                        }

                        items.push( item );

                    });
                }

            }

            if( jck_wt.els.video_template.length > 0 ) {

                items.push({
                    html: jck_wt.els.video_template.html()
                });

            }

            return {
                index: index,
                items: items
            };

        },

        /**
         * Setup Zoom - actions that should only be run once
         */

        setup_zoom: function() {

            if( !jck_wt.vars.is_zoom_enabled ) { return; }

            // Bullet nav

            $(document).on('click', '.jck-wt-zoom-bullets a', function(){

                var selected_index = parseInt($(this).attr('data-slide-index'));

                // change main slide
                jck_wt.vars.images_slider_data.goToSlide( selected_index );

                return false;

            });

            // Arrow nav

            $(document).on('click', '.jck-wt-zoom-prev', function(){
                jck_wt.vars.images_slider_data.goToPrevSlide();
            });

            $(document).on('click', '.jck-wt-zoom-next', function(){
                jck_wt.vars.images_slider_data.goToNextSlide();
            });

            // Disable the zoom if using a tocuh device

            $(document).on('touchmove', '.jck-wt-images__image', function(){
                jck_wt.vars.is_dragging_image_slide = true;
            });

            $(document).on('touchend', '.jck-wt-images__image', function(e){

                if( !jck_wt.vars.is_dragging_image_slide ) {
                    e.preventDefault();
                    $(this).click();
                }

            });

            $(document).on('touchstart', '.jck-wt-images__image', function(){
                jck_wt.vars.is_dragging_image_slide = false;
            });

            // Reset zoom after resize

            $(window).on('resize-end', function(){
                jck_wt.init_zoom();
            });

        },

        /**
         * Init Hover Zoom
         */

        init_zoom: function() {

            if( !jck_wt.vars.is_zoom_enabled ) { return; }

            jck_wt.destroy_zoom();

            var $current_slide = $('.'+jck_wt.vars.images_active_class),
                $slide_image = $current_slide.find('img'),
                slide_image_width = $slide_image.width(),
                large_image = $slide_image.attr('data-large-image'),
                large_image_width = parseInt($slide_image.attr('data-large-image-width'));

            if( slide_image_width >= large_image_width ) { return; }

            $slide_image.addClass('currZoom').ImageZoom({
                type: jck_wt_vars.options.zoomType,
                bigImageSrc: large_image,
                zoomSize: [jck_wt_vars.options.zoomDimensions.width,jck_wt_vars.options.zoomDimensions.height],
                zoomViewerClass: ( jck_wt_vars.options.zoomType === "follow" ) ? 'shape'+jck_wt_vars.options.innerShape : "shapesquare",
                position: jck_wt_vars.options.zoomPosition,
                showDescription: false,
                onShow: function() {

                    jck_wt.add_zoom_controls();

                },
                onHide: function() {

                    $('.bx-controls--hidden').removeClass('bx-controls--hidden').show();

                }
            });

        },

        /**
         * Destroy Hover Zoom
         */

        destroy_zoom: function() {

            var zoom = $('.currZoom').data('imagezoom');

            if( zoom && typeof zoom !== "undefined" ){

                $('.currZoom').removeClass('currZoom');
                zoom.destroy();

            }

            $('.zm-viewer').remove();
            $('.zm-handler').remove();

        },

        /**
         * Add Zoom Controls
         */

        add_zoom_controls: function() {

            if( $('.zm-viewer .jck-wt-zoom-controls').length <= 0 && jck_wt_vars.options.zoomType === "inner" ) {

                if( jck_wt.is_true(jck_wt_vars.options.iconTooltips) ) {
                    $('.zm-viewer').addClass('jck-wt-tooltips-enabled');
                }

                $('.zm-viewer').append('<div class="jck-wt-zoom-controls"></div>');

                var $zoom_controls = $('.jck-wt-zoom-controls');

                if( jck_wt.els.wishlist_buttons.length > 0 ) {
                    $zoom_controls.append( jck_wt.els.wishlist_buttons.clone() );
                }

                if( jck_wt.is_true(jck_wt_vars.options.enableLightbox) ) {
                    $zoom_controls.append( jck_wt.tpl.fullscreen_button );
                }

                if( jck_wt.els.video_template.length > 0 ) {
                    $zoom_controls.append( jck_wt.tpl.play_button );
                }

                if( jck_wt.is_true(jck_wt_vars.options.enableArrows) && jck_wt.vars.images_slider_data.getSlideCount() > 1 ) {
                    $zoom_controls.append('<a class="jck-wt-zoom-prev" href="javascript: void(0);"><i class="jck-wt-icon jck-wt-icon-prev"></i></a><a class="jck-wt-zoom-next" href="javascript: void(0);"><i class="jck-wt-icon jck-wt-icon-next"></i></a>');
                }

                if( jck_wt_vars.options.navigationType === "bullets" ) {

                    var $bullets = $('.jck-wt-all-images-wrap .bx-pager');

                    if( $bullets.children().length > 1 ) {

                        var $bullets_clone = $bullets.clone();

                        $bullets_clone.appendTo( ".jck-wt-zoom-controls" ).wrap( "<div class='jck-wt-zoom-bullets'></div>" );

                    }

                }

                jck_wt.setup_tooltips();

            }

        },

        /**
         * Setup Yith Wishlist
         */

        setup_yith_wishlist: function() {

            $('body').on('added_to_wishlist', function(){
                $('.jck-wt-wishlist-buttons').addClass( jck_wt.vars.wishlist_added_class );
            });

        },

        /**
         * Setup Tooltips
         */

        setup_tooltips: function() {

            if( jck_wt.is_true(jck_wt_vars.options.iconTooltips) ) {

                $('[data-jck-wt-tooltip]').each(function(){

                    var tooltip = $(this).attr('data-jck-wt-tooltip');

                    $(this).tooltipster({
                        content: tooltip,
                        debug: false
                    });
                });

            }

        },

    };

	$(window).load( jck_wt.on_load() );
	$(window).resize( function(){ jck_wt.on_resize(); } );

}(jQuery, document));