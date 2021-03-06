/** ********************************************** **
	@Author			Dorin Grigoras
	@Website		www.stepofweb.com
	@Last Update	Monday, July 21, 2014
 ** ********************************************* **/
 
 
 
/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{a(jQuery)}}(function(e){var a=/\+/g;function d(g){return g}function b(g){return decodeURIComponent(g.replace(a," "))}function f(g){if(g.indexOf('"')===0){g=g.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\")}try{return c.json?JSON.parse(g):g}catch(h){}}var c=e.cookie=function(p,o,u){if(o!==undefined){u=e.extend({},c.defaults,u);if(typeof u.expires==="number"){var q=u.expires,s=u.expires=new Date();s.setDate(s.getDate()+q)}o=c.json?JSON.stringify(o):String(o);return(document.cookie=[encodeURIComponent(p),"=",c.raw?o:encodeURIComponent(o),u.expires?"; expires="+u.expires.toUTCString():"",u.path?"; path="+u.path:"",u.domain?"; domain="+u.domain:"",u.secure?"; secure":""].join(""))}var g=c.raw?d:b;var r=document.cookie.split("; ");var v=p?undefined:{};for(var n=0,k=r.length;n<k;n++){var m=r[n].split("=");var h=g(m.shift());var j=g(m.join("="));if(p&&p===h){v=f(j);break}if(!p){v[h]=f(j)}}return v};c.defaults={};e.removeCookie=function(h,g){if(e.cookie(h)!==undefined){e.cookie(h,"",e.extend(g,{expires:-1}));return true}return false}}));



/**	STYLE SWITCHER
*************************************************** **/
jQuery(document).ready(function() {
	"use strict";


	/**
		COLOR SKIN [light|dark]
	**/



});



	/** ********************************************************************************************************** **/
	/** ********************************************************************************************************** **/
	/** ********************************************************************************************************** **/


	function getActiveStyleSheet() {

		return null;
	}

	function getPreferredStyleSheet() {
		var i, a;
		for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
			if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("rel").indexOf("alt") == -1 && a.getAttribute("title")) { 
				return a.getAttribute("title"); 
			}
		}

		return null;
	}

	function createCookie(name,value,days) {
		/** 
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		} else {
			expires = "";
		}	document.cookie = name+"="+value+expires+"; path=/";
		**/
	}

	function readCookie(name) {
		/** 
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];

			while (c.charAt(0)==' ') {
				c = c.substring(1,c.length);
			}

			if (c.indexOf(nameEQ) == 0) {
				return c.substring(nameEQ.length,c.length);
			}
		}
		**/

		return null;
	}

	jQuery("select#headerLayout").click(function() {

		var type = jQuery(this).attr('value');

		if (jQuery("#css_navigation_style").length > 0){
			jQuery("#css_navigation_style").remove();
		}

		jQuery("head").append("<link>");
		jQuery("head").children(":last").attr({
			rel:  	"stylesheet",
			type: 	"text/css",
			id: 	"css_navigation_style",
			href: 	"css/navigation-style-" + type + ".css"
		});

	});


	/**
		Pattern Background
	**/
	function pattern_switch(pattern) {
		if(pattern == 'none' || pattern == '') {
			createCookie("pattern_switch", pattern, -1);
			remove_pattern();
		} else {

			if(!jQuery('body').hasClass('boxed')) {
				jQuery('body').addClass('boxed');
				jQuery("#is_boxed").trigger('click');
				createCookie("is_boxed", 'true', 365);
			}

			createCookie("background_switch", '', -1);
			jQuery('body').attr('data-background', '');
			jQuery('.backstretch').remove();
			jQuery('body').removeClass('transparent');
			remove_pattern();

			remove_pattern();
			jQuery('body').addClass(pattern);
			createCookie("pattern_switch", pattern, 365);
		}
	}
	function remove_pattern() {
		jQuery('body').removeClass('pattern1');
		jQuery('body').removeClass('pattern2');
		jQuery('body').removeClass('pattern3');
		jQuery('body').removeClass('pattern4');
		jQuery('body').removeClass('pattern5');
		jQuery('body').removeClass('pattern6');
		jQuery('body').removeClass('pattern7');
		jQuery('body').removeClass('pattern8');
		jQuery('body').removeClass('pattern9');
		jQuery('body').removeClass('pattern10');
		createCookie("pattern_switch", '', -1);
	}



	/**
		Image Background
	**/
	function background_switch(imgbkg) {
		if(imgbkg == 'none' || imgbkg == '') {

			createCookie("background_switch", '', -1);
			jQuery('body').attr('data-background', '');
			jQuery('.backstretch').remove();
			jQuery('body').removeClass('transparent');
			remove_pattern();

		} else {

			if(!jQuery('body').hasClass('boxed')) {
				jQuery('body').addClass('boxed');
				jQuery("#is_boxed").trigger('click');
				createCookie("is_boxed", 'true', 365);
			}

			jQuery('body').attr('data-background', imgbkg);
			createCookie("background_switch", imgbkg, 365);
			remove_pattern();

			var data_background = jQuery('body').attr('data-background');
			if(data_background) {

				loadScript(plugin_path + 'jquery.backstretch.min.js', function() {

					if(data_background) {
						jQuery.backstretch(data_background);
						jQuery('body').addClass('transparent'); // remove backround color of boxed class
					}

				});

			}
		}
	}



	/**
		Reset Switcher
	**/
	function resetSwitcher() {
		remove_pattern();
		jQuery('body').removeClass('boxed');
		jQuery("#css_dark_skin").remove();
		jQuery('body').attr('data-background', '');
		jQuery('.backstretch').remove();
		jQuery("a.logo img").attr('src', 'assets/images/logo.png');

		jQuery("#is_light").trigger('click');
		jQuery("#is_wide").trigger('click');
		jQuery("#is_ltr").trigger('click');

		// delete cookies!
		createCookie("style", '', -1);
		createCookie("switcher_visible", '', -1);
		createCookie("pattern_switch", '', -1);
		createCookie("background_switch", '', -1);
		createCookie("boxed", '', -1);
		createCookie("color_skin", '', -1);
		createCookie("is_boxed", '', -1);
	}
