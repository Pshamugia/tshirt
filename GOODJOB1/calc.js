


/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
var pluses = /\+/g;

function encode(s) {
	return config.raw ? s : encodeURIComponent(s);
}

function decode(s) {
	return config.raw ? s : decodeURIComponent(s);
}

function stringifyCookieValue(value) {
	return encode(config.json ? JSON.stringify(value) : String(value));
}

function parseCookieValue(s) {
	if (s.indexOf('"') === 0) {
		// This is a quoted cookie as according to RFC2068, unescape...
		s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
	}

	try {
		// Replace server-side written pluses with spaces.
		// If we can't decode the cookie, ignore it, it's unusable.
		// If we can't parse the cookie, ignore it, it's unusable.
		s = decodeURIComponent(s.replace(pluses, ' '));
		return config.json ? JSON.parse(s) : s;
	} catch(e) {}
}

function read(s, converter) {
	var value = config.raw ? s : parseCookieValue(s);
	return $.isFunction(converter) ? converter(value) : value;
}

var config = $.cookie = function (key, value, options) {

	// Write

	if (value !== undefined && !$.isFunction(value)) {
		options = $.extend({}, config.defaults, options);

		if (typeof options.expires === 'number') {
			var days = options.expires, t = options.expires = new Date();
			t.setTime(+t + days * 864e+5);
		}

		return (document.cookie = [
			encode(key), '=', stringifyCookieValue(value),
			options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
			options.path    ? '; path=' + options.path : '',
			options.domain  ? '; domain=' + options.domain : '',
			options.secure  ? '; secure' : ''
		].join(''));
	}

	// Read

	var result = key ? undefined : {};

	// To prevent the for loop in the first place assign an empty array
	// in case there are no cookies at all. Also prevents odd result when
	// calling $.cookie().
	var cookies = document.cookie ? document.cookie.split('; ') : [];

	for (var i = 0, l = cookies.length; i < l; i++) {
		var parts = cookies[i].split('=');
		var name = decode(parts.shift());
		var cookie = parts.join('=');

		if (key && key === name) {
			// If second argument (value) is a function it's a converter...
			result = read(cookie, value);
			break;
		}

		// Prevent storing a cookie that we couldn't decode.
		if (!key && (cookie = read(cookie)) !== undefined) {
			result[name] = cookie;
		}
	}

	return result;
};

config.defaults = {};

$.removeCookie = function (key, options) {
	if ($.cookie(key) === undefined) {
		return false;
	}

	// Must not alter options, thus extending a fresh object...
	$.cookie(key, '', $.extend({}, options, { expires: -1 }));
	return !$.cookie(key);
};

/*
 *
 * Copyright (c) 2006-2010 Sam Collett (http://www.texotela.co.uk)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version 2.2.5
 * Demo: http://www.texotela.co.uk/code/jquery/select/
 *
 *
 */
 
;(function($) {
 
/**
 * Adds (single/multiple) options to a select box (or series of select boxes)
 *
 * @name     addOption
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @example  $("#myselect").addOption("Value", "Text"); // add single value (will be selected)
 * @example  $("#myselect").addOption("Value 2", "Text 2", false); // add single value (won't be selected)
 * @example  $("#myselect").addOption({"foo":"bar","bar":"baz"}, false); // add multiple values, but don't select
 *
 */
$.fn.addOption = function()
{
	var add = function(el, v, t, sO, index)
	{
		var option = document.createElement("option");
		option.value = v, option.text = t;
		// get options
		var o = el.options;
		// get number of options
		var oL = o.length;
		if(!el.cache)
		{
			el.cache = {};
			// loop through existing options, adding to cache
			for(var i = 0; i < oL; i++)
			{
				el.cache[o[i].value] = i;
			}
		}
		if (index  index == 0)
		{
 			// we're going to insert these starting  at a specific index...
			// this has the side effect of el.cache[v] being the 
			// correct value for the typeof check below
			var ti = option;
			for(var ii =index; ii <= oL; ii++)
			{
				var tmp = el.options[ii];
				el.options[ii] = ti;
				o[ii] = ti;
				el.cache[o[ii].value] = ii;
				ti = tmp;
			}
		}
    
		// add to cache if it isn't already
		if(typeof el.cache[v] == "undefined") el.cache[v] = oL;
		el.options[el.cache[v]] = option;
		if(sO)
		{
			option.selected = true;
		}
	};
	
	var a = arguments;
	if(a.length == 0) return this;
	// select option when added? default is true
	var sO = true;
	// multiple items
	var m = false;
	// other variables
	var items, v, t;
	if(typeof(a[0]) == "object")
	{
		m = true;
		items = a[0];
	}
	if(a.length >= 2)
	{
		if(typeof(a[1]) == "boolean")
		{
			sO = a[1];
			startindex = a[2];
		}
		else if(typeof(a[2]) == "boolean")
		{
			sO = a[2];
			startindex = a[1];
		}
		else
		{
			startindex = a[1];
		}
		if(!m)
		{
			v = a[0];
			t = a[1];
		}
	}
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return;
			if(m)
			{
			
				for(var item in items)
				{
					if (typeof(items[item]) == "object") {
						for(var key in items[item]) {
							add(this, key, items[item][key], sO, startindex);
						}
					}
					else {
						add(this, item, items[item], sO, startindex);
					}
					startindex += 1;
				}
			}
			else
			{

				add(this, v, t, sO, startindex);
			}
		}
	);
	return this;
};

/**
 * Add options via ajax
 *
 * @name     ajaxAddOption
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @param    String url      Page to get options from (must be valid JSON)
 * @param    Object params   (optional) Any parameters to send with the request
 * @param    Boolean select  (optional) Select the added options, default true
 * @param    Function fn     (optional) Call this function with the select object as param after completion
 * @param    Array args      (optional) Array with params to pass to the function afterwards
 * @example  $("#myselect").ajaxAddOption("myoptions.php");
 * @example  $("#myselect").ajaxAddOption("myoptions.php", {"code" : "007"});
 * @example  $("#myselect").ajaxAddOption("myoptions.php", {"code" : "007"}, false, sortoptions, [{"dir": "desc"}]);
 *
 */
$.fn.ajaxAddOption = function(url, params, select, fn, args)
{
	if(typeof(url) != "string") return this;
	if(typeof(params) != "object") params = {};
	if(typeof(select) != "boolean") select = true;
	this.each(
		function()
		{
			var el = this;
			$.getJSON(url,
				params,
				function(r)
				{
					$(el).addOption(r, select);
					if(typeof fn == "function")
					{
						if(typeof args == "object")
						{
							fn.apply(el, args);
						} 
						else
						{
							fn.call(el);
						}
					}
				}
			);
		}
	);
	return this;
};

/**
 * Removes an option (by value or index) from a select box (or series of select boxes)
 *
 * @name     removeOption
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @param    StringRegExpNumber what  Option to remove
 * @param    Boolean selectedOnly       (optional) Remove only if it has been selected (default false)   
 * @example  $("#myselect").removeOption("Value"); // remove by value
 * @example  $("#myselect").removeOption(/^val/i); // remove options with a value starting with 'val'
 * @example  $("#myselect").removeOption(/./); // remove all options
 * @example  $("#myselect").removeOption(/./, true); // remove all options that have been selected
 * @example  $("#myselect").removeOption(0); // remove by index
 * @example  $("#myselect").removeOption(["myselect_1","myselect_2"]); // values contained in passed array
 *
 */
$.fn.removeOption = function()
{
	var a = arguments;
	if(a.length == 0) return this;
	var ta = typeof(a[0]);
	var v, index;
	// has to be a string or regular expression (object in IE, function in Firefox)
	if(ta == "string"  ta == "object"  ta == "function" )
	{
		v = a[0];
		// if an array, remove items
		if(v.constructor == Array)
		{
			var l = v.length;
			for(var i = 0; i<l; i++)
			{
				this.removeOption(v[i], a[1]); 
			}
			return this;
		}
	}
	else if(ta == "number") index = a[0];
	else return this;
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return;
			// clear cache
			if(this.cache) this.cache = null;
			// does the option need to be removed?
			var remove = false;
			// get options
			var o = this.options;
			if(!!v)
			{
				// get number of options
				var oL = o.length;
				for(var i=oL-1; i>=0; i--)
				{
					if(v.constructor == RegExp)
					{
						if(o[i].value.match(v))
						{
							remove = true;
						}
					}
					else if(o[i].value == v)
					{
						remove = true;
					}
					// if the option is only to be removed if selected
					if(remove && a[1] === true) remove = o[i].selected;
					if(remove)
					{
						o[i] = null;
					}
					remove = false;
				}
			}
			else
			{
				// only remove if selected?
				if(a[1] === true)
				{
					remove = o[index].selected;
				}
				else
				{
					remove = true;
				}
				if(remove)
				{
					this.remove(index);
				}
			}
		}
	);
	return this;
};

/**
 * Sort options (ascending or descending) in a select box (or series of select boxes)
 *
 * @name     sortOptions
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @param    Boolean ascending   (optional) Sort ascending (true/undefined), or descending (false)
 * @example  // ascending
 * $("#myselect").sortOptions(); // or $("#myselect").sortOptions(true);
 * @example  // descending
 * $("#myselect").sortOptions(false);
 *
 */
$.fn.sortOptions = function(ascending)
{
	// get selected values first
	var sel = $(this).selectedValues();
	var a = typeof(ascending) == "undefined" ? true : !!ascending;
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return;
			// get options
			var o = this.options;
			// get number of options
			var oL = o.length;
			// create an array for sorting
			var sA = [];
			// loop through options, adding to sort array
			for(var i = 0; i<oL; i++)
			{
				sA[i] = {
					v: o[i].value,
					t: o[i].text
				}
			}
			// sort items in array
			sA.sort(
				function(o1, o2)
				{
					// option text is made lowercase for case insensitive sorting
					o1t = o1.t.toLowerCase(), o2t = o2.t.toLowerCase();
					// if options are the same, no sorting is needed
					if(o1t == o2t) return 0;
					if(a)
					{
						return o1t < o2t ? -1 : 1;
					}
					else
					{
						return o1t > o2t ? -1 : 1;
					}
				}
			);
			// change the options to match the sort array
			for(var i = 0; i<oL; i++)
			{
				o[i].text = sA[i].t;
				o[i].value = sA[i].v;
			}
		}
	).selectOptions(sel, true); // select values, clearing existing ones
	return this;
};
/**
 * Selects an option by value
 *
 * @name     selectOptions
 * @author   Mathias Bank (http://www.mathias-bank.de), original function
 * @author   Sam Collett (http://www.texotela.co.uk), addition of regular expression matching
 * @type     jQuery
 * @param    StringRegExpArray value  Which options should be selected
 * can be a string or regular expression, or an array of strings / regular expressions
 * @param    Boolean clear  Clear existing selected options, default false
 * @example  $("#myselect").selectOptions("val1"); // with the value 'val1'
 * @example  $("#myselect").selectOptions(["val1","val2","val3"]); // with the values 'val1' 'val2' 'val3'
 * @example  $("#myselect").selectOptions(/^val/i); // with the value starting with 'val', case insensitive
 *
 */
$.fn.selectOptions = function(value, clear)
{
	var v = value;
	var vT = typeof(value);
	// handle arrays
	if(vT == "object" && v.constructor == Array)
	{
		var $this = this;
		$.each(v, function()
			{
      				$this.selectOptions(this, clear);
    			}
		);
	};
	var c = clear  false;
	// has to be a string or regular expression (object in IE, function in Firefox)
	if(vT != "string" && vT != "function" && vT != "object") return this;
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return this;
			// get options
			var o = this.options;
			// get number of options
			var oL = o.length;
			for(var i = 0; i<oL; i++)
			{
				if(v.constructor == RegExp)
				{
					if(o[i].value.match(v))
					{
						o[i].selected = true;
					}
					else if(c)
					{
						o[i].selected = false;
					}
				}
				else
				{
					if(o[i].value == v)
					{
						o[i].selected = true;
					}
					else if(c)
					{
						o[i].selected = false;
					}
				}
			}
		}
	);
	return this;
};

/**
 * Copy options to another select
 *
 * @name     copyOptions
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @param    String to  Element to copy to
 * @param    String which  (optional) Specifies which options should be copied - 'all' or 'selected'. Default is 'selected'
 * @example  $("#myselect").copyOptions("#myselect2"); // copy selected options from 'myselect' to 'myselect2'
 * @example  $("#myselect").copyOptions("#myselect2","selected"); // same as above
 * @example  $("#myselect").copyOptions("#myselect2","all"); // copy all options from 'myselect' to 'myselect2'
 *
 */
$.fn.copyOptions = function(to, which)
{
	var w = which  "selected";
	if($(to).size() == 0) return this;
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return this;
			// get options
			var o = this.options;
			// get number of options
			var oL = o.length;
			for(var i = 0; i<oL; i++)
			{
				if(w == "all"  (w == "selected" && o[i].selected))
				{
					$(to).addOption(o[i].value, o[i].text);
				}
			}
		}
	);
	return this;
};

/**
 * Checks if a select box has an option with the supplied value
 *
 * @name     containsOption
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     BooleanjQuery
 * @param    StringRegExp value  Which value to check for. Can be a string or regular expression
 * @param    Function fn          (optional) Function to apply if an option with the given value is found.
 * Use this if you don't want to break the chaining
 * @example  if($("#myselect").containsOption("val1")) alert("Has an option with the value 'val1'");
 * @example  if($("#myselect").containsOption(/^val/i)) alert("Has an option with the value starting with 'val'");
 * @example  $("#myselect").containsOption("val1", copyoption).doSomethingElseWithSelect(); // calls copyoption (user defined function) for any options found, chain is continued
 *
 */
$.fn.containsOption = function(value, fn)
{
	var found = false;
	var v = value;
	var vT = typeof(v);
	var fT = typeof(fn);
	// has to be a string or regular expression (object in IE, function in Firefox)
	if(vT != "string" && vT != "function" && vT != "object") return fT == "function" ? this: found;
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase() != "select") return this;
			// option already found
			if(found && fT != "function") return false;
			// get options
			var o = this.options;
			// get number of options
			var oL = o.length;
			for(var i = 0; i<oL; i++)
			{
				if(v.constructor == RegExp)
				{
					if (o[i].value.match(v))
					{
						found = true;
						if(fT == "function") fn.call(o[i], i);
					}
				}
				else
				{
					if (o[i].value == v)
					{
						found = true;
						if(fT == "function") fn.call(o[i], i);
					}
				}
			}
		}
	);
	return fT == "function" ? this : found;
};

/**
 * Returns values which have been selected
 *
 * @name     selectedValues
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     Array
 * @example  $("#myselect").selectedValues();
 *
 */
$.fn.selectedValues = function()
{
	var v = [];
	this.selectedOptions().each(
		function()
		{
			v[v.length] = this.value;
		}
	);
	return v;
};

/**
 * Returns text which has been selected
 *
 * @name     selectedTexts
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     Array
 * @example  $("#myselect").selectedTexts();
 *
 */
$.fn.selectedTexts = function()
{
	var t = [];
	this.selectedOptions().each(
		function()
		{
			t[t.length] = this.text;
		}
	);
	return t;
};

/**
 * Returns options which have been selected
 *
 * @name     selectedOptions
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @type     jQuery
 * @example  $("#myselect").selectedOptions();
 *
 */
$.fn.selectedOptions = function()
{
	return this.find("option:selected");
};

})(jQuery);
;(function($){$.fn.ajaxSubmit=function(options){if(!this.length){log('ajaxSubmit: skipping submit process - no element selected');return this}var method,action,url,$form=this;if(typeof options=='function'){options={success:options}}method=this.attr('method');action=this.attr('action');url=(typeof action==='string')?$.trim(action):'';url=urlwindow.location.href'';if(url){url=(url.match(/^([^#]+)/)[])[1]}options=$.extend(true,{url:url,success:$.ajaxSettings.success,type:method'GET',iframeSrc:/^https/i.test(window.location.href'')?'javascript:false':'about:blank'},options);var veto={};this.trigger('form-pre-serialize',[this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');return this}if(options.beforeSerialize&&options.beforeSerialize(this,options)===false){log('ajaxSubmit: submit aborted via beforeSerialize callback');return this}var n,v,a=this.formToArray(options.semantic);if(options.data){options.extraData=options.data;for(n in options.data){if($.isArray(options.data[n])){for(var k in options.data[n]){a.push({name:n,value:options.data[n][k]})}}else{v=options.data[n];v=$.isFunction(v)?v():v;a.push({name:n,value:v})}}}if(options.beforeSubmit&&options.beforeSubmit(a,this,options)===false){log('ajaxSubmit: submit aborted via beforeSubmit callback');return this}this.trigger('form-submit-validate',[a,this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-submit-validate trigger');return this}var q=$.param(a);if(options.type.toUpperCase()=='GET'){options.url+=(options.url.indexOf('?')>=0?'&':'?')+q;options.data=null}else{options.data=q}var callbacks=[];if(options.resetForm){callbacks.push(function(){$form.resetForm()})}if(options.clearForm){callbacks.push(function(){$form.clearForm()})}if(!options.dataType&&options.target){var oldSuccess=options.successfunction(){};callbacks.push(function(data){var fn=options.replaceTarget?'replaceWith':'html';$(options.target)[fn](data).each(oldSuccess,arguments)})}else if(options.success){callbacks.push(options.success)}options.success=function(data,status,xhr){var context=options.contextoptions;for(var i=0,max=callbacks.length;i<max;i++){callbacks[i].apply(context,[data,status,xhr$form,$form])}};var fileInputs=$('input:file',this).length>0;var mp='multipart/form-data';var multipart=($form.attr('enctype')==mp$form.attr('encoding')==mp);if(options.iframe!==false&&(fileInputsoptions.iframemultipart)){if(options.closeKeepAlive){$.get(options.closeKeepAlive,function(){fileUpload(a)})}else{fileUpload(a)}}else{if($.browser.msie&&method=='get'){var ieMeth=$form[0].getAttribute('method');if(typeof ieMeth==='string')options.type=ieMeth}$.ajax(options)}this.trigger('form-submit-notify',[this,options]);return this;function fileUpload(a){var form=$form[0],el,i,s,g,id,$io,io,xhr,sub,n,timedOut,timeoutHandle;var useProp=!!$.fn.prop;if(a){for(i=0;i<a.length;i++){el=$(form[a[i].name]);el[useProp?'prop':'attr']('disabled',false)}}if($(':input[name=submit],:input[id=submit]',form).length){alert('Error: Form elements must not have name or id of "submit".');return}s=$.extend(true,{},$.ajaxSettings,options);s.context=s.contexts;id='jqFormIO'+(new Date().getTime());if(s.iframeTarget){$io=$(s.iframeTarget);n=$io.attr('name');if(n==null)$io.attr('name',id);else id=n}else{$io=$('<iframe name="'+id+'" src="'+s.iframeSrc+'" />');$io.css({position:'absolute',top:'-1000px',left:'-1000px'})}io=$io[0];xhr={aborted:0,responseText:null,responseXML:null,status:0,statusText:'n/a',getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(status){var e=(status==='timeout'?'timeout':'aborted');log('aborting upload... '+e);this.aborted=1;$io.attr('src',s.iframeSrc);xhr.error=e;s.error&&s.error.call(s.context,xhr,e,status);g&&$.event.trigger("ajaxError",[xhr,s,e]);s.complete&&s.complete.call(s.context,xhr,e)}};g=s.global;if(g&&!$.active++){$.event.trigger("ajaxStart")}if(g){$.event.trigger("ajaxSend",[xhr,s])}if(s.beforeSend&&s.beforeSend.call(s.context,xhr,s)===false){if(s.global){$.active--}return}if(xhr.aborted){return}sub=form.clk;if(sub){n=sub.name;if(n&&!sub.disabled){s.extraData=s.extraData{};s.extraData[n]=sub.value;if(sub.type=="image"){s.extraData[n+'.x']=form.clk_x;s.extraData[n+'.y']=form.clk_y}}}var CLIENT_TIMEOUT_ABORT=1;var SERVER_ABORT=2;function getDoc(frame){var doc=frame.contentWindow?frame.contentWindow.document:frame.contentDocument?frame.contentDocument:frame.document;return doc}function doSubmit(){var t=$form.attr('target'),a=$form.attr('action');form.setAttribute('target',id);if(!method){form.setAttribute('method','POST')}if(a!=s.url){form.setAttribute('action',s.url)}if(!s.skipEncodingOverride&&(!method/post/i.test(method))){$form.attr({encoding:'multipart/form-data',enctype:'multipart/form-data'})}if(s.timeout){timeoutHandle=setTimeout(function(){timedOut=true;cb(CLIENT_TIMEOUT_ABORT)},s.timeout)}function checkState(){try{var state=getDoc(io).readyState;log('state = '+state);if(state.toLowerCase()=='uninitialized')setTimeout(checkState,50)}catch(e){log('Server abort: ',e,' (',e.name,')');cb(SERVER_ABORT);timeoutHandle&&clearTimeout(timeoutHandle);timeoutHandle=undefined}}var extraInputs=[];try{if(s.extraData){for(var n in s.extraData){extraInputs.push($('<input type="hidden" name="'+n+'" />').attr('value',s.extraData[n]).appendTo(form)[0])}}if(!s.iframeTarget){$io.appendTo('body');io.attachEvent?io.attachEvent('onload',cb):io.addEventListener('load',cb,false)}setTimeout(checkState,15);form.submit()}finally{form.setAttribute('action',a);if(t){form.setAttribute('target',t)}else{$form.removeAttr('target')}$(extraInputs).remove()}}if(s.forceSync){doSubmit()}else{setTimeout(doSubmit,10)}var data,doc,domCheckCount=50,callbackProcessed;function cb(e){if(xhr.abortedcallbackProcessed){return}try{doc=getDoc(io)}catch(ex){log('cannot access response document: ',ex);e=SERVER_ABORT}if(e===CLIENT_TIMEOUT_ABORT&&xhr){xhr.abort('timeout');return}else if(e==SERVER_ABORT&&xhr){xhr.abort('server abort');return}if(!docdoc.location.href==s.iframeSrc){if(!timedOut)return}io.detachEvent?io.detachEvent('onload',cb):io.removeEventListener('load',cb,false);var status='success',errMsg;try{if(timedOut){throw'timeout';}var isXml=s.dataType=='xml'doc.XMLDocument$.isXMLDoc(doc);log('isXml='+isXml);if(!isXml&&window.opera&&(doc.body==nulldoc.body.innerHTML=='')){if(--domCheckCount){log('requeing onLoad callback, DOM not available');setTimeout(cb,250);return}}var docRoot=doc.body?doc.body:doc.documentElement;xhr.responseText=docRoot?docRoot.innerHTML:null;xhr.responseXML=doc.XMLDocument?doc.XMLDocument:doc;if(isXml)s.dataType='xml';xhr.getResponseHeader=function(header){var headers={'content-type':s.dataType};return headers[header]};if(docRoot){xhr.status=Number(docRoot.getAttribute('status'))xhr.status;xhr.statusText=docRoot.getAttribute('statusText')xhr.statusText}var dt=s.dataType'';var scr=/(jsonscripttext)/.test(dt.toLowerCase());if(scrs.textarea){var ta=doc.getElementsByTagName('textarea')[0];if(ta){xhr.responseText=ta.value;xhr.status=Number(ta.getAttribute('status'))xhr.status;xhr.statusText=ta.getAttribute('statusText')xhr.statusText}else if(scr){var pre=doc.getElementsByTagName('pre')[0];var b=doc.getElementsByTagName('body')[0];if(pre){xhr.responseText=pre.textContent?pre.textContent:pre.innerHTML}else if(b){xhr.responseText=b.innerHTML}}}else if(s.dataType=='xml'&&!xhr.responseXML&&xhr.responseText!=null){xhr.responseXML=toXml(xhr.responseText)}try{data=httpData(xhr,s.dataType,s)}catch(e){status='parsererror';xhr.error=errMsg=(estatus)}}catch(e){log('error caught: ',e);status='error';xhr.error=errMsg=(estatus)}if(xhr.aborted){log('upload aborted');status=null}if(xhr.status){status=(xhr.status>=200&&xhr.status<300xhr.status===304)?'success':'error'}if(status==='success'){s.success&&s.success.call(s.context,data,'success',xhr);g&&$.event.trigger("ajaxSuccess",[xhr,s])}else if(status){if(errMsg==undefined)errMsg=xhr.statusText;s.error&&s.error.call(s.context,xhr,status,errMsg);g&&$.event.trigger("ajaxError",[xhr,s,errMsg])}g&&$.event.trigger("ajaxComplete",[xhr,s]);if(g&&!--$.active){$.event.trigger("ajaxStop")}s.complete&&s.complete.call(s.context,xhr,status);callbackProcessed=true;if(s.timeout)clearTimeout(timeoutHandle);setTimeout(function(){if(!s.iframeTarget)$io.remove();xhr.responseXML=null},100)}var toXml=$.parseXMLfunction(s,doc){if(window.ActiveXObject){doc=new ActiveXObject('Microsoft.XMLDOM');doc.async='false';doc.loadXML(s)}else{doc=(new DOMParser()).parseFromString(s,'text/xml')}return(doc&&doc.documentElement&&doc.documentElement.nodeName!='parsererror')?doc:null};var parseJSON=$.parseJSONfunction(s){return window['eval']('('+s+')')};var httpData=function(xhr,type,s){var ct=xhr.getResponseHeader('content-type')'',xml=type==='xml'!type&&ct.indexOf('xml')>=0,data=xml?xhr.responseXML:xhr.responseText;if(xml&&data.documentElement.nodeName==='parsererror'){$.error&&$.error('parsererror')}if(s&&s.dataFilter){data=s.dataFilter(data,type)}if(typeof data==='string'){if(type==='json'!type&&ct.indexOf('json')>=0){data=parseJSON(data)}else if(type==="script"!type&&ct.indexOf("javascript")>=0){$.globalEval(data)}}return data}}};$.fn.ajaxForm=function(options){if(this.length===0){var o={s:this.selector,c:this.context};if(!$.isReady&&o.s){log('DOM not ready, queuing ajaxForm');$(function(){$(o.s,o.c).ajaxForm(options)});return this}log('terminating; zero elements found by selector'+($.isReady?'':' (DOM not ready)'));return this}return this.ajaxFormUnbind().bind('submit.form-plugin',function(e){if(!e.isDefaultPrevented()){e.preventDefault();$(this).ajaxSubmit(options)}}).bind('click.form-plugin',function(e){var target=e.target;var $el=$(target);if(!($el.is(":submit,input:image"))){var t=$el.closest(':submit');if(t.length==0){return}target=t[0]}var form=this;form.clk=target;if(target.type=='image'){if(e.offsetX!=undefined){form.clk_x=e.offsetX;form.clk_y=e.offsetY}else if(typeof $.fn.offset=='function'){var offset=$el.offset();form.clk_x=e.pageX-offset.left;form.clk_y=e.pageY-offset.top}else{form.clk_x=e.pageX-target.offsetLeft;form.clk_y=e.pageY-target.offsetTop}}setTimeout(function(){form.clk=form.clk_x=form.clk_y=null},100)})};$.fn.ajaxFormUnbind=function(){return this.unbind('submit.form-plugin click.form-plugin')};$.fn.formToArray=function(semantic){var a=[];if(this.length===0){return a}var form=this[0];var els=semantic?form.getElementsByTagName('*'):form.elements;if(!els){return a}var i,j,n,v,el,max,jmax;for(i=0,max=els.length;i<max;i++){el=els[i];n=el.name;if(!n){continue}if(semantic&&form.clk&&el.type=="image"){if(!el.disabled&&form.clk==el){a.push({name:n,value:$(el).val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}continue}v=$.fieldValue(el,true);if(v&&v.constructor==Array){for(j=0,jmax=v.length;j<jmax;j++){a.push({name:n,value:v[j]})}}else if(v!==null&&typeof v!='undefined'){a.push({name:n,value:v})}}if(!semantic&&form.clk){var $input=$(form.clk),input=$input[0];n=input.name;if(n&&!input.disabled&&input.type=='image'){a.push({name:n,value:$input.val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}}return a};$.fn.formSerialize=function(semantic){return $.param(this.formToArray(semantic))};$.fn.fieldSerialize=function(successful){var a=[];this.each(function(){var n=this.name;if(!n){return}var v=$.fieldValue(this,successful);if(v&&v.constructor==Array){for(var i=0,max=v.length;i<max;i++){a.push({name:n,value:v[i]})}}else if(v!==null&&typeof v!='undefined'){a.push({name:this.name,value:v})}});return $.param(a)};$.fn.fieldValue=function(successful){for(var val=[],i=0,max=this.length;i<max;i++){var el=this[i];var v=$.fieldValue(el,successful);if(v===nulltypeof v=='undefined'(v.constructor==Array&&!v.length)){continue}v.constructor==Array?$.merge(val,v):val.push(v)}return val};$.fieldValue=function(el,successful){var n=el.name,t=el.type,tag=el.tagName.toLowerCase();if(successful===undefined){successful=true}if(successful&&(!nel.disabledt=='reset't=='button'(t=='checkbox't=='radio')&&!el.checked(t=='submit't=='image')&&el.form&&el.form.clk!=eltag=='select'&&el.selectedIndex==-1)){return null}if(tag=='select'){var index=el.selectedIndex;if(index<0){return null}var a=[],ops=el.options;var one=(t=='select-one');var max=(one?index+1:ops.length);for(var i=(one?index:0);i<max;i++){var op=ops[i];if(op.selected){var v=op.value;if(!v){v=(op.attributes&&op.attributes['value']&&!(op.attributes['value'].specified))?op.text:op.value}if(one){return v}a.push(v)}}return a}return $(el).val()};$.fn.clearForm=function(){return this.each(function(){$('input,select,textarea',this).clearFields()})};$.fn.clearFields=$.fn.clearInputs=function(){var re=/^(?:colordatedatetimeemailmonthnumberpasswordrangesearchteltexttimeurlweek)$/i;return this.each(function(){var t=this.type,tag=this.tagName.toLowerCase();if(re.test(t)tag=='textarea'){this.value=''}else if(t=='checkbox't=='radio'){this.checked=false}else if(tag=='select'){this.selectedIndex=-1}})};$.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=='function'(typeof this.reset=='object'&&!this.reset.nodeType)){this.reset()}})};$.fn.enable=function(b){if(b===undefined){b=true}return this.each(function(){this.disabled=!b})};$.fn.selected=function(select){if(select===undefined){select=true}return this.each(function(){var t=this.type;if(t=='checkbox't=='radio'){this.checked=select}else if(this.tagName.toLowerCase()=='option'){var $sel=$(this).parent('select');if(select&&$sel[0]&&$sel[0].type=='select-one'){$sel.find('option').selected(false)}this.selected=select}})};function log(){var msg='[jquery.form] '+Array.prototype.join.call(arguments,'');if(window.console&&window.console.log){window.console.log(msg)}else if(window.opera&&window.opera.postError){window.opera.postError(msg)}}})(jQuery);
(function(g){var q={vertical:!1,rtl:!1,start:1,offset:1,size:null,scroll:3,visible:null,animation:"normal",easing:"swing",auto:0,wrap:null,initCallback:null,setupCallback:null,reloadCallback:null,itemLoadCallback:null,itemFirstInCallback:null,itemFirstOutCallback:null,itemLastInCallback:null,itemLastOutCallback:null,itemVisibleInCallback:null,itemVisibleOutCallback:null,animationStepCallback:null,buttonNextHTML:"<div></div>",buttonPrevHTML:"<div></div>",buttonNextEvent:"click",buttonPrevEvent:"click", buttonNextCallback:null,buttonPrevCallback:null,itemFallbackDimension:null},m=!1;g(window).bind("load.jcarousel",function(){m=!0});g.jcarousel=function(a,c){this.options=g.extend({},q,c{});this.autoStopped=this.locked=!1;this.buttonPrevState=this.buttonNextState=this.buttonPrev=this.buttonNext=this.list=this.clip=this.container=null;if(!cc.rtl===void 0)this.options.rtl=(g(a).attr("dir")g("html").attr("dir")"").toLowerCase()=="rtl";this.wh=!this.options.vertical?"width":"height";this.lt=!this.options.vertical? this.options.rtl?"right":"left":"top";for(var b="",d=a.className.split(" "),f=0;f<d.length;f++)if(d[f].indexOf("jcarousel-skin")!=-1){g(a).removeClass(d[f]);b=d[f];break}a.nodeName.toUpperCase()=="UL"a.nodeName.toUpperCase()=="OL"?(this.list=g(a),this.clip=this.list.parents(".jcarousel-clip"),this.container=this.list.parents(".jcarousel-container")):(this.container=g(a),this.list=this.container.find("ul,ol").eq(0),this.clip=this.container.find(".jcarousel-clip"));if(this.clip.size()===0)this.clip= this.list.wrap("<div></div>").parent();if(this.container.size()===0)this.container=this.clip.wrap("<div></div>").parent();b!==""&&this.container.parent()[0].className.indexOf("jcarousel-skin")==-1&&this.container.wrap('<div class=" '+b+'"></div>');this.buttonPrev=g(".jcarousel-prev",this.container);if(this.buttonPrev.size()===0&&this.options.buttonPrevHTML!==null)this.buttonPrev=g(this.options.buttonPrevHTML).appendTo(this.container);this.buttonPrev.addClass(this.className("jcarousel-prev"));this.buttonNext= g(".jcarousel-next",this.container);if(this.buttonNext.size()===0&&this.options.buttonNextHTML!==null)this.buttonNext=g(this.options.buttonNextHTML).appendTo(this.container);this.buttonNext.addClass(this.className("jcarousel-next"));this.clip.addClass(this.className("jcarousel-clip")).css({position:"relative"});this.list.addClass(this.className("jcarousel-list")).css({overflow:"hidden",position:"relative",top:0,margin:0,padding:0}).css(this.options.rtl?"right":"left",0);this.container.addClass(this.className("jcarousel-container")).css({position:"relative"}); !this.options.vertical&&this.options.rtl&&this.container.addClass("jcarousel-direction-rtl").attr("dir","rtl");var j=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible):null,b=this.list.children("li"),e=this;if(b.size()>0){var h=0,i=this.options.offset;b.each(function(){e.format(this,i++);h+=e.dimension(this,j)});this.list.css(this.wh,h+100+"px");if(!cc.size===void 0)this.options.size=b.size()}this.container.css("display","block");this.buttonNext.css("display","block");this.buttonPrev.css("display", "block");this.funcNext=function(){e.next()};this.funcPrev=function(){e.prev()};this.funcResize=function(){e.resizeTimer&&clearTimeout(e.resizeTimer);e.resizeTimer=setTimeout(function(){e.reload()},100)};this.options.initCallback!==null&&this.options.initCallback(this,"init");!m&&g.browser.safari?(this.buttons(!1,!1),g(window).bind("load.jcarousel",function(){e.setup()})):this.setup()};var f=g.jcarousel;f.fn=f.prototype={jcarousel:"0.2.8"};f.fn.extend=f.extend=g.extend;f.fn.extend({setup:function(){this.prevLast= this.prevFirst=this.last=this.first=null;this.animating=!1;this.tail=this.resizeTimer=this.timer=null;this.inTail=!1;if(!this.locked){this.list.css(this.lt,this.pos(this.options.offset)+"px");var a=this.pos(this.options.start,!0);this.prevFirst=this.prevLast=null;this.animate(a,!1);g(window).unbind("resize.jcarousel",this.funcResize).bind("resize.jcarousel",this.funcResize);this.options.setupCallback!==null&&this.options.setupCallback(this)}},reset:function(){this.list.empty();this.list.css(this.lt, "0px");this.list.css(this.wh,"10px");this.options.initCallback!==null&&this.options.initCallback(this,"reset");this.setup()},reload:function(){this.tail!==null&&this.inTail&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+this.tail);this.tail=null;this.inTail=!1;this.options.reloadCallback!==null&&this.options.reloadCallback(this);if(this.options.visible!==null){var a=this,c=Math.ceil(this.clipping()/this.options.visible),b=0,d=0;this.list.children("li").each(function(f){b+=a.dimension(this, c);f+1<a.first&&(d=b)});this.list.css(this.wh,b+"px");this.list.css(this.lt,-d+"px")}this.scroll(this.first,!1)},lock:function(){this.locked=!0;this.buttons()},unlock:function(){this.locked=!1;this.buttons()},size:function(a){if(a!==void 0)this.options.size=a,this.lockedthis.buttons();return this.options.size},has:function(a,c){if(c===void 0!c)c=a;if(this.options.size!==null&&c>this.options.size)c=this.options.size;for(var b=a;b<=c;b++){var d=this.get(b);if(!d.lengthd.hasClass("jcarousel-item-placeholder"))return!1}return!0}, get:function(a){return g(">.jcarousel-item-"+a,this.list)},add:function(a,c){var b=this.get(a),d=0,p=g(c);if(b.length===0)for(var j,e=f.intval(a),b=this.create(a);;){if(j=this.get(--e),e<=0j.length){e<=0?this.list.prepend(b):j.after(b);break}}else d=this.dimension(b);p.get(0).nodeName.toUpperCase()=="LI"?(b.replaceWith(p),b=p):b.empty().append(c);this.format(b.removeClass(this.className("jcarousel-item-placeholder")),a);p=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible): null;d=this.dimension(b,p)-d;a>0&&a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))-d+"px");this.list.css(this.wh,f.intval(this.list.css(this.wh))+d+"px");return b},remove:function(a){var c=this.get(a);if(c.length&&!(a>=this.first&&a<=this.last)){var b=this.dimension(c);a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+b+"px");c.remove();this.list.css(this.wh,f.intval(this.list.css(this.wh))-b+"px")}},next:function(){this.tail!==null&&!this.inTail?this.scrollTail(!1): this.scroll((this.options.wrap=="both"this.options.wrap=="last")&&this.options.size!==null&&this.last==this.options.size?1:this.first+this.options.scroll)},prev:function(){this.tail!==null&&this.inTail?this.scrollTail(!0):this.scroll((this.options.wrap=="both"this.options.wrap=="first")&&this.options.size!==null&&this.first==1?this.options.size:this.first-this.options.scroll)},scrollTail:function(a){if(!this.locked&&!this.animating&&this.tail){this.pauseAuto();var c=f.intval(this.list.css(this.lt)), c=!a?c-this.tail:c+this.tail;this.inTail=!a;this.prevFirst=this.first;this.prevLast=this.last;this.animate(c)}},scroll:function(a,c){!this.locked&&!this.animating&&(this.pauseAuto(),this.animate(this.pos(a),c))},pos:function(a,c){var b=f.intval(this.list.css(this.lt));if(this.lockedthis.animating)return b;this.options.wrap!="circular"&&(a=a<1?1:this.options.size&&a>this.options.size?this.options.size:a);for(var d=this.first>a,g=this.options.wrap!="circular"&&this.first<=1?1:this.first,j=d?this.get(g): this.get(this.last),e=d?g:g-1,h=null,i=0,k=!1,l=0;d?--e>=a:++e<a;){h=this.get(e);k=!h.length;if(h.length===0&&(h=this.create(e).addClass(this.className("jcarousel-item-placeholder")),j[d?"before":"after"](h),this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0e>this.options.size)))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)));j=h;l=this.dimension(h);k&&(i+=l);if(this.first!==null&&(this.options.wrap=="circular"e>=1&&(this.options.size===nulle<= this.options.size)))b=d?b+l:b-l}for(var g=this.clipping(),m=[],o=0,n=0,j=this.get(a-1),e=a;++o;){h=this.get(e);k=!h.length;if(h.length===0){h=this.create(e).addClass(this.className("jcarousel-item-placeholder"));if(j.length===0)this.list.prepend(h);else j[d?"before":"after"](h);if(this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0e>this.options.size))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)))}j=h;l=this.dimension(h);if(l===0)throw Error("jCarousel: No width/height set for items. This will cause an infinite loop. Aborting..."); this.options.wrap!="circular"&&this.options.size!==null&&e>this.options.size?m.push(h):k&&(i+=l);n+=l;if(n>=g)break;e++}for(h=0;h<m.length;h++)m[h].remove();i>0&&(this.list.css(this.wh,this.dimension(this.list)+i+"px"),d&&(b-=i,this.list.css(this.lt,f.intval(this.list.css(this.lt))-i+"px")));i=a+o-1;if(this.options.wrap!="circular"&&this.options.size&&i>this.options.size)i=this.options.size;if(e>i){o=0;e=i;for(n=0;++o;){h=this.get(e--);if(!h.length)break;n+=this.dimension(h);if(n>=g)break}}e=i-o+ 1;this.options.wrap!="circular"&&e<1&&(e=1);if(this.inTail&&d)b+=this.tail,this.inTail=!1;this.tail=null;if(this.options.wrap!="circular"&&i==this.options.size&&i-o+1>=1&&(d=f.intval(this.get(i).css(!this.options.vertical?"marginRight":"marginBottom")),n-d>g))this.tail=n-g-d;if(c&&a===this.options.size&&this.tail)b-=this.tail,this.inTail=!0;for(;a-- >e;)b+=this.dimension(this.get(a));this.prevFirst=this.first;this.prevLast=this.last;this.first=e;this.last=i;return b},animate:function(a,c){if(!this.locked&& !this.animating){this.animating=!0;var b=this,d=function(){b.animating=!1;a===0&&b.list.css(b.lt,0);!b.autoStopped&&(b.options.wrap=="circular"b.options.wrap=="both"b.options.wrap=="last"b.options.size===nullb.last<b.options.sizeb.last==b.options.size&&b.tail!==null&&!b.inTail)&&b.startAuto();b.buttons();b.notify("onAfterAnimation");if(b.options.wrap=="circular"&&b.options.size!==null)for(var c=b.prevFirst;c<=b.prevLast;c++)c!==null&&!(c>=b.first&&c<=b.last)&&(c<1c>b.options.size)&&b.remove(c)}; this.notify("onBeforeAnimation");if(!this.options.animationc===!1)this.list.css(this.lt,a+"px"),d();else{var f=!this.options.vertical?this.options.rtl?{right:a}:{left:a}:{top:a},d={duration:this.options.animation,easing:this.options.easing,complete:d};if(g.isFunction(this.options.animationStepCallback))d.step=this.options.animationStepCallback;this.list.animate(f,d)}}},startAuto:function(a){if(a!==void 0)this.options.auto=a;if(this.options.auto===0)return this.stopAuto();if(this.timer===null){this.autoStopped= !1;var c=this;this.timer=window.setTimeout(function(){c.next()},this.options.auto*1E3)}},stopAuto:function(){this.pauseAuto();this.autoStopped=!0},pauseAuto:function(){if(this.timer!==null)window.clearTimeout(this.timer),this.timer=null},buttons:function(a,c){if(a==null&&(a=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="first"this.options.size===nullthis.last<this.options.size),!this.locked&&(!this.options.wrapthis.options.wrap=="first")&&this.options.size!==null&& this.last>=this.options.size))a=this.tail!==null&&!this.inTail;if(c==null&&(c=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="last"this.first>1),!this.locked&&(!this.options.wrapthis.options.wrap=="last")&&this.options.size!==null&&this.first==1))c=this.tail!==null&&this.inTail;var b=this;this.buttonNext.size()>0?(this.buttonNext.unbind(this.options.buttonNextEvent+".jcarousel",this.funcNext),a&&this.buttonNext.bind(this.options.buttonNextEvent+".jcarousel",this.funcNext), this.buttonNext[a?"removeClass":"addClass"](this.className("jcarousel-next-disabled")).attr("disabled",a?!1:!0),this.options.buttonNextCallback!==null&&this.buttonNext.data("jcarouselstate")!=a&&this.buttonNext.each(function(){b.options.buttonNextCallback(b,this,a)}).data("jcarouselstate",a)):this.options.buttonNextCallback!==null&&this.buttonNextState!=a&&this.options.buttonNextCallback(b,null,a);this.buttonPrev.size()>0?(this.buttonPrev.unbind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev), c&&this.buttonPrev.bind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev),this.buttonPrev[c?"removeClass":"addClass"](this.className("jcarousel-prev-disabled")).attr("disabled",c?!1:!0),this.options.buttonPrevCallback!==null&&this.buttonPrev.data("jcarouselstate")!=c&&this.buttonPrev.each(function(){b.options.buttonPrevCallback(b,this,c)}).data("jcarouselstate",c)):this.options.buttonPrevCallback!==null&&this.buttonPrevState!=c&&this.options.buttonPrevCallback(b,null,c);this.buttonNextState= a;this.buttonPrevState=c},notify:function(a){var c=this.prevFirst===null?"init":this.prevFirst<this.first?"next":"prev";this.callback("itemLoadCallback",a,c);this.prevFirst!==this.first&&(this.callback("itemFirstInCallback",a,c,this.first),this.callback("itemFirstOutCallback",a,c,this.prevFirst));this.prevLast!==this.last&&(this.callback("itemLastInCallback",a,c,this.last),this.callback("itemLastOutCallback",a,c,this.prevLast));this.callback("itemVisibleInCallback",a,c,this.first,this.last,this.prevFirst, this.prevLast);this.callback("itemVisibleOutCallback",a,c,this.prevFirst,this.prevLast,this.first,this.last)},callback:function(a,c,b,d,f,j,e){if(!(this.options[a]==nulltypeof this.options[a]!="object"&&c!="onAfterAnimation")){var h=typeof this.options[a]=="object"?this.options[a][c]:this.options[a];if(g.isFunction(h)){var i=this;if(d===void 0)h(i,b,c);else if(f===void 0)this.get(d).each(function(){h(i,this,d,b,c)});else for(var a=function(a){i.get(a).each(function(){h(i,this,a,b,c)})},k=d;k<=f;k++)k!== null&&!(k>=j&&k<=e)&&a(k)}}},create:function(a){return this.format("<li></li>",a)},format:function(a,c){for(var a=g(a),b=a.get(0).className.split(" "),d=0;d<b.length;d++)b[d].indexOf("jcarousel-")!=-1&&a.removeClass(b[d]);a.addClass(this.className("jcarousel-item")).addClass(this.className("jcarousel-item-"+c)).css({"float":this.options.rtl?"right":"left","list-style":"none"}).attr("jcarouselindex",c);return a},className:function(a){return a+" "+a+(!this.options.vertical?"-horizontal":"-vertical")}, dimension:function(a,c){var b=g(a);if(c==null)return!this.options.vertical?b.outerWidth(!0)f.intval(this.options.itemFallbackDimension):b.outerHeight(!0)f.intval(this.options.itemFallbackDimension);else{var d=!this.options.vertical?c-f.intval(b.css("marginLeft"))-f.intval(b.css("marginRight")):c-f.intval(b.css("marginTop"))-f.intval(b.css("marginBottom"));g(b).css(this.wh,d+"px");return this.dimension(b)}},clipping:function(){return!this.options.vertical?this.clip[0].offsetWidth-f.intval(this.clip.css("borderLeftWidth"))- f.intval(this.clip.css("borderRightWidth")):this.clip[0].offsetHeight-f.intval(this.clip.css("borderTopWidth"))-f.intval(this.clip.css("borderBottomWidth"))},index:function(a,c){if(c==null)c=this.options.size;return Math.round(((a-1)/c-Math.floor((a-1)/c))*c)+1}});f.extend({defaults:function(a){return g.extend(q,a{})},intval:function(a){a=parseInt(a,10);return isNaN(a)?0:a},windowLoaded:function(){m=!0}});g.fn.jcarousel=function(a){if(typeof a=="string"){var c=g(this).data("jcarousel"),b=Array.prototype.slice.call(arguments, 1);return c[a].apply(c,b)}else return this.each(function(){var b=g(this).data("jcarousel");b?(a&&g.extend(b.options,a),b.reload()):g(this).data("jcarousel",new f(this,a))})}})(jQuery);
var swfobject=function(){var D="undefined",r="object",S="Shockwave Flash",W="ShockwaveFlash.ShockwaveFlash",q="application/x-shockwave-flash",R="SWFObjectExprInst",x="onreadystatechange",O=window,j=document,t=navigator,T=false,U=[h],o=[],N=[],I=[],l,Q,E,B,J=false,a=false,n,G,m=true,M=function(){var aa=typeof j.getElementById!=D&&typeof j.getElementsByTagName!=D&&typeof j.createElement!=D,ah=t.userAgent.toLowerCase(),Y=t.platform.toLowerCase(),ae=Y?/win/.test(Y):/win/.test(ah),ac=Y?/mac/.test(Y):/mac/.test(ah),af=/webkit/.test(ah)?parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,X=!+"\v1",ag=[0,0,0],ab=null;if(typeof t.plugins!=D&&typeof t.plugins[S]==r){ab=t.plugins[S].description;if(ab&&!(typeof t.mimeTypes!=D&&t.mimeTypes[q]&&!t.mimeTypes[q].enabledPlugin)){T=true;X=false;ab=ab.replace(/^.*\s+(\S+\s+\S+$)/,"$1");ag[0]=parseInt(ab.replace(/^(.*)\..*$/,"$1"),10);ag[1]=parseInt(ab.replace(/^.*\.(.*)\s.*$/,"$1"),10);ag[2]=/[a-zA-Z]/.test(ab)?parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}}else{if(typeof O.ActiveXObject!=D){try{var ad=new ActiveXObject(W);if(ad){ab=ad.GetVariable("$version");if(ab){X=true;ab=ab.split(" ")[1].split(",");ag=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}}catch(Z){}}}return{w3:aa,pv:ag,wk:af,ie:X,win:ae,mac:ac}}(),k=function(){if(!M.w3){return}if((typeof j.readyState!=D&&j.readyState=="complete")(typeof j.readyState==D&&(j.getElementsByTagName("body")[0]j.body))){f()}if(!J){if(typeof j.addEventListener!=D){j.addEventListener("DOMContentLoaded",f,false)}if(M.ie&&M.win){j.attachEvent(x,function(){if(j.readyState=="complete"){j.detachEvent(x,arguments.callee);f()}});if(O==top){(function(){if(J){return}try{j.documentElement.doScroll("left")}catch(X){setTimeout(arguments.callee,0);return}f()})()}}if(M.wk){(function(){if(J){return}if(!/loadedcomplete/.test(j.readyState)){setTimeout(arguments.callee,0);return}f()})()}s(f)}}();function f(){if(J){return}try{var Z=j.getElementsByTagName("body")[0].appendChild(C("span"));Z.parentNode.removeChild(Z)}catch(aa){return}J=true;var X=U.length;for(var Y=0;Y<X;Y++){U[Y]()}}function K(X){if(J){X()}else{U[U.length]=X}}function s(Y){if(typeof O.addEventListener!=D){O.addEventListener("load",Y,false)}else{if(typeof j.addEventListener!=D){j.addEventListener("load",Y,false)}else{if(typeof O.attachEvent!=D){i(O,"onload",Y)}else{if(typeof O.onload=="function"){var X=O.onload;O.onload=function(){X();Y()}}else{O.onload=Y}}}}}function h(){if(T){V()}else{H()}}function V(){var X=j.getElementsByTagName("body")[0];var aa=C(r);aa.setAttribute("type",q);var Z=X.appendChild(aa);if(Z){var Y=0;(function(){if(typeof Z.GetVariable!=D){var ab=Z.GetVariable("$version");if(ab){ab=ab.split(" ")[1].split(",");M.pv=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}else{if(Y<10){Y++;setTimeout(arguments.callee,10);return}}X.removeChild(aa);Z=null;H()})()}else{H()}}function H(){var ag=o.length;if(ag>0){for(var af=0;af<ag;af++){var Y=o[af].id;var ab=o[af].callbackFn;var aa={success:false,id:Y};if(M.pv[0]>0){var ae=c(Y);if(ae){if(F(o[af].swfVersion)&&!(M.wk&&M.wk<312)){w(Y,true);if(ab){aa.success=true;aa.ref=z(Y);ab(aa)}}else{if(o[af].expressInstall&&A()){var ai={};ai.data=o[af].expressInstall;ai.width=ae.getAttribute("width")"0";ai.height=ae.getAttribute("height")"0";if(ae.getAttribute("class")){ai.styleclass=ae.getAttribute("class")}if(ae.getAttribute("align")){ai.align=ae.getAttribute("align")}var ah={};var X=ae.getElementsByTagName("param");var ac=X.length;for(var ad=0;ad<ac;ad++){if(X[ad].getAttribute("name").toLowerCase()!="movie"){ah[X[ad].getAttribute("name")]=X[ad].getAttribute("value")}}P(ai,ah,Y,ab)}else{p(ae);if(ab){ab(aa)}}}}}else{w(Y,true);if(ab){var Z=z(Y);if(Z&&typeof Z.SetVariable!=D){aa.success=true;aa.ref=Z}ab(aa)}}}}}function z(aa){var X=null;var Y=c(aa);if(Y&&Y.nodeName=="OBJECT"){if(typeof Y.SetVariable!=D){X=Y}else{var Z=Y.getElementsByTagName(r)[0];if(Z){X=Z}}}return X}function A(){return !a&&F("6.0.65")&&(M.winM.mac)&&!(M.wk&&M.wk<312)}function P(aa,ab,X,Z){a=true;E=Znull;B={success:false,id:X};var ae=c(X);if(ae){if(ae.nodeName=="OBJECT"){l=g(ae);Q=null}else{l=ae;Q=X}aa.id=R;if(typeof aa.width==D(!/%$/.test(aa.width)&&parseInt(aa.width,10)<310)){aa.width="310"}if(typeof aa.height==D(!/%$/.test(aa.height)&&parseInt(aa.height,10)<137)){aa.height="137"}j.title=j.title.slice(0,47)+" - Flash Player Installation";var ad=M.ie&&M.win?"ActiveX":"PlugIn",ac="MMredirectURL="+O.location.toString().replace(/&/g,"%26")+"&MMplayerType="+ad+"&MMdoctitle="+j.title;if(typeof ab.flashvars!=D){ab.flashvars+="&"+ac}else{ab.flashvars=ac}if(M.ie&&M.win&&ae.readyState!=4){var Y=C("div");X+="SWFObjectNew";Y.setAttribute("id",X);ae.parentNode.insertBefore(Y,ae);ae.style.display="none";(function(){if(ae.readyState==4){ae.parentNode.removeChild(ae)}else{setTimeout(arguments.callee,10)}})()}u(aa,ab,X)}}function p(Y){if(M.ie&&M.win&&Y.readyState!=4){var X=C("div");Y.parentNode.insertBefore(X,Y);X.parentNode.replaceChild(g(Y),X);Y.style.display="none";(function(){if(Y.readyState==4){Y.parentNode.removeChild(Y)}else{setTimeout(arguments.callee,10)}})()}else{Y.parentNode.replaceChild(g(Y),Y)}}function g(ab){var aa=C("div");if(M.win&&M.ie){aa.innerHTML=ab.innerHTML}else{var Y=ab.getElementsByTagName(r)[0];if(Y){var ad=Y.childNodes;if(ad){var X=ad.length;for(var Z=0;Z<X;Z++){if(!(ad[Z].nodeType==1&&ad[Z].nodeName=="PARAM")&&!(ad[Z].nodeType==8)){aa.appendChild(ad[Z].cloneNode(true))}}}}}return aa}function u(ai,ag,Y){var X,aa=c(Y);if(M.wk&&M.wk<312){return X}if(aa){if(typeof ai.id==D){ai.id=Y}if(M.ie&&M.win){var ah="";for(var ae in ai){if(ai[ae]!=Object.prototype[ae]){if(ae.toLowerCase()=="data"){ag.movie=ai[ae]}else{if(ae.toLowerCase()=="styleclass"){ah+=' class="'+ai[ae]+'"'}else{if(ae.toLowerCase()!="classid"){ah+=" "+ae+'="'+ai[ae]+'"'}}}}}var af="";for(var ad in ag){if(ag[ad]!=Object.prototype[ad]){af+='<param name="'+ad+'" value="'+ag[ad]+'" />'}}aa.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+ah+">"+af+"</object>";N[N.length]=ai.id;X=c(ai.id)}else{var Z=C(r);Z.setAttribute("type",q);for(var ac in ai){if(ai[ac]!=Object.prototype[ac]){if(ac.toLowerCase()=="styleclass"){Z.setAttribute("class",ai[ac])}else{if(ac.toLowerCase()!="classid"){Z.setAttribute(ac,ai[ac])}}}}for(var ab in ag){if(ag[ab]!=Object.prototype[ab]&&ab.toLowerCase()!="movie"){e(Z,ab,ag[ab])}}aa.parentNode.replaceChild(Z,aa);X=Z}}return X}function e(Z,X,Y){var aa=C("param");aa.setAttribute("name",X);aa.setAttribute("value",Y);Z.appendChild(aa)}function y(Y){var X=c(Y);if(X&&X.nodeName=="OBJECT"){if(M.ie&&M.win){X.style.display="none";(function(){if(X.readyState==4){b(Y)}else{setTimeout(arguments.callee,10)}})()}else{X.parentNode.removeChild(X)}}}function b(Z){var Y=c(Z);if(Y){for(var X in Y){if(typeof Y[X]=="function"){Y[X]=null}}Y.parentNode.removeChild(Y)}}function c(Z){var X=null;try{X=j.getElementById(Z)}catch(Y){}return X}function C(X){return j.createElement(X)}function i(Z,X,Y){Z.attachEvent(X,Y);I[I.length]=[Z,X,Y]}function F(Z){var Y=M.pv,X=Z.split(".");X[0]=parseInt(X[0],10);X[1]=parseInt(X[1],10)0;X[2]=parseInt(X[2],10)0;return(Y[0]>X[0](Y[0]==X[0]&&Y[1]>X[1])(Y[0]==X[0]&&Y[1]==X[1]&&Y[2]>=X[2]))?true:false}function v(ac,Y,ad,ab){if(M.ie&&M.mac){return}var aa=j.getElementsByTagName("head")[0];if(!aa){return}var X=(ad&&typeof ad=="string")?ad:"screen";if(ab){n=null;G=null}if(!nG!=X){var Z=C("style");Z.setAttribute("type","text/css");Z.setAttribute("media",X);n=aa.appendChild(Z);if(M.ie&&M.win&&typeof j.styleSheets!=D&&j.styleSheets.length>0){n=j.styleSheets[j.styleSheets.length-1]}G=X}if(M.ie&&M.win){if(n&&typeof n.addRule==r){n.addRule(ac,Y)}}else{if(n&&typeof j.createTextNode!=D){n.appendChild(j.createTextNode(ac+" {"+Y+"}"))}}}function w(Z,X){if(!m){return}var Y=X?"visible":"hidden";if(J&&c(Z)){c(Z).style.visibility=Y}else{v("#"+Z,"visibility:"+Y)}}function L(Y){var Z=/[\\\"<>\.;]/;var X=Z.exec(Y)!=null;return X&&typeof encodeURIComponent!=D?encodeURIComponent(Y):Y}var d=function(){if(M.ie&&M.win){window.attachEvent("onunload",function(){var ac=I.length;for(var ab=0;ab<ac;ab++){I[ab][0].detachEvent(I[ab][1],I[ab][2])}var Z=N.length;for(var aa=0;aa<Z;aa++){y(N[aa])}for(var Y in M){M[Y]=null}M=null;for(var X in swfobject){swfobject[X]=null}swfobject=null})}}();return{registerObject:function(ab,X,aa,Z){if(M.w3&&ab&&X){var Y={};Y.id=ab;Y.swfVersion=X;Y.expressInstall=aa;Y.callbackFn=Z;o[o.length]=Y;w(ab,false)}else{if(Z){Z({success:false,id:ab})}}},getObjectById:function(X){if(M.w3){return z(X)}},embedSWF:function(ab,ah,ae,ag,Y,aa,Z,ad,af,ac){var X={success:false,id:ah};if(M.w3&&!(M.wk&&M.wk<312)&&ab&&ah&&ae&&ag&&Y){w(ah,false);K(function(){ae+="";ag+="";var aj={};if(af&&typeof af===r){for(var al in af){aj[al]=af[al]}}aj.data=ab;aj.width=ae;aj.height=ag;var am={};if(ad&&typeof ad===r){for(var ak in ad){am[ak]=ad[ak]}}if(Z&&typeof Z===r){for(var ai in Z){if(typeof am.flashvars!=D){am.flashvars+="&"+ai+"="+Z[ai]}else{am.flashvars=ai+"="+Z[ai]}}}if(F(Y)){var an=u(aj,am,ah);if(aj.id==ah){w(ah,true)}X.success=true;X.ref=an}else{if(aa&&A()){aj.data=aa;P(aj,am,ah,ac);return}else{w(ah,true)}}if(ac){ac(X)}})}else{if(ac){ac(X)}}},switchOffAutoHideShow:function(){m=false},ua:M,getFlashPlayerVersion:function(){return{major:M.pv[0],minor:M.pv[1],release:M.pv[2]}},hasFlashPlayerVersion:F,createSWF:function(Z,Y,X){if(M.w3){return u(Z,Y,X)}else{return undefined}},showExpressInstall:function(Z,aa,X,Y){if(M.w3&&A()){P(Z,aa,X,Y)}},removeSWF:function(X){if(M.w3){y(X)}},createCSS:function(aa,Z,Y,X){if(M.w3){v(aa,Z,Y,X)}},addDomLoadEvent:K,addLoadEvent:s,getQueryParamValue:function(aa){var Z=j.location.searchj.location.hash;if(Z){if(/\?/.test(Z)){Z=Z.split("?")[1]}if(aa==null){return L(Z)}var Y=Z.split("&");for(var X=0;X<Y.length;X++){if(Y[X].substring(0,Y[X].indexOf("="))==aa){return L(Y[X].substring((Y[X].indexOf("=")+1)))}}}return""},expressInstallCallback:function(){if(a){var X=c(R);if(X&&l){X.parentNode.replaceChild(l,X);if(Q){w(Q,true);if(M.ie&&M.win){l.style.display="block"}}if(E){E(B)}}a=false}}}}();/*if(typeof SkypeDetection=="undefined"){SkypeDetection=function(){var _detectionSwfUrl="http://api.skype.com/detection/detection_as3.swf";var _detectionSwfID="skypedetectionswf";var _containerID="skypedetectioncontainer";var _verbose=false;var _flashCreated=false;var _initalizing=false;var _successCallbacks=[];var _failureCallbacks=[];var _failureTimeout=5000;var createContainer=function(){var container=document.createElement("div");container.id=_containerID;container.style.position="absolute";container.style.width="5px";container.style.height="5px";container.style.top="0px";container.style.left="-10px";var div=document.body&&document.body.appendChild(container);if(!div){log("Seems like container creating failed.");return;}window.setTimeout(createFlash,10);};var createFlash=function(){if(typeof YAHOO!="undefined"&&YAHOO.widget&&YAHOO.widget.SWF){log("Using YUI SWF module to embed Flash content");var yuiswf=new YAHOO.widget.SWF(_containerID,_detectionSwfUrl,{version:9,fixedAttributes:{allowScriptAccess:"always",width:5,height:5}});_flashCreated=true;_detectionSwfID=yuiswf._id;}else{if(window.jQuery&&$&&$.flash&&typeof $.flash.create=="function"){log("Using jquery-swfobject to embed Flash content");$("#"+_containerID).flash({swf:_detectionSwfUrl,id:_detectionSwfID,width:5,height:5,hasVersion:9,params:{allowscriptaccess:"always"}});_flashCreated=true;}else{if(window.jQuery&&$&&$.fn.flash){log("Using jquery-flash to embed Flash content");$("#"+_containerID).flash({id:_detectionSwfID,src:_detectionSwfUrl,width:5,height:5,allowscriptaccess:"always",version:"9.0"});_flashCreated=true;}else{if(typeof swfobject!="undefined"&&swfobject.embedSWF){log("Using SWFObject 2.x to embed Flash content");swfobject.embedSWF(_detectionSwfUrl,_containerID,5,5,"9.0",null,null,{allowScriptAccess:"always"},{id:_detectionSwfID},flashStatusCallback);}else{if(typeof deconcept!="undefined"&&deconcept.SWFObject){log("Using SWFObject 1.5 to embed Flash content");var so=new SWFObject(_detectionSwfUrl,_detectionSwfID,5,5,"9.0");so.addParam("allowScriptAccess","always");so.write(_containerID);_flashCreated=true;}else{log("No supported way of embedding Flash was found");detectionFail();return;}}}}}window.setTimeout(detectionFail,_failureTimeout);};var flashStatusCallback=function(e){if(e.success==false){log("Flash embedding via SWFObject embedding failed");detectionFail();}else{if(e.success==true){log("SWFObject callback indicated success");_flashCreated=true;}}};var detectionFail=function(){if(!SkypeDetection.ready){log("Detection seems to have failed, calling failure callbacks");for(var i=0;i<_failureCallbacks.length;i++){_failureCallbacks[i]();}}};var detectionSuccess=function(){log("Detection succeeded, calling success callbacks");for(var i=0;i<_successCallbacks.length;i++){_successCallbacks[i]();}};var log=function(msg){if(_verbose&&typeof console!="undefined"&&console.log){console.log("[SkypeDetection] "+msg);}};var registerCallback=function(stack,fn){for(var i=0;i<stack.length;i++){if(stack[i]===fn){return;}}stack.push(fn);};var readDetectionData=function(){var swf=document.getElementById(_detectionSwfID);try{var data=swf.getData();}catch(e){log("Getting data with swf.getData() failed, likely reason is browser issue with ExternalInterface setup");detectionFail();return;}SkypeDetection.installed=swf.isInstalled();log("Reading detection data, Skype is "+(SkypeDetection.installed?"installed":"not installed"));if(SkypeDetection.installed){SkypeDetection.version=data.version;SkypeDetection.platform=data.platform;SkypeDetection.language=data.language;log("Using Skype version '"+data.version+"' on '"+data.platform+"' platform in language '"+data.language+"'");if(swf.getSharedObjectData){try{data=swf.getSharedObjectData();}catch(e){log("Could not read swf.getSharedObjectData()");}if(data.ui_timezone){SkypeDetection.internal.profileTimezone=data.ui_timezone;}if(data.os_timezone){SkypeDetection.internal.osTimezone=data.os_timezone;}else{SkypeDetection.internal.osTimezone=parseInt(new Date().getTimezoneOffset()/60);}if(data.ui_installdate){if(typeof data.ui_installdate=="string"){data.ui_installdate=parseInt(data.ui_installdate);}if(isNaN(data.ui_installdate)data.ui_installdate==0){SkypeDetection.internal.profileAge=-1;}else{SkypeDetection.internal.profileAge=Math.floor(((new Date()).getTime()/1000-data.ui_installdate)/60/60/24);}}}if(swf.getSessionData){try{data=swf.getSessionData();}catch(e){log("Could not read swf.getSessionData()");}if(data.username){SkypeDetection.internal.username=data.username;var timeNow=(new Date()).getTime()/1000;if(typeof data.expires!="undefined"&&data.expires<timeNow){SkypeDetection.internal.username="";try{swf.clearSessionData();}catch(e){}}}}}detectionSuccess();};return{setVerbose:function(verbose){_verbose=verbose;log("Enabled verbose mode");},setReady:function(){log("Flash detection code indicated to JS that it is ready");SkypeDetection.ready=true;window.setTimeout(readDetectionData,10);},detect:function(successFn,failureFn){successFn&&registerCallback(_successCallbacks,successFn);failureFn&&registerCallback(_failureCallbacks,failureFn);if(SkypeDetection.ready){log("Detection has already been run before");window.setTimeout(SkypeDetection.installed?detectionSuccess:detectionFail,10);}else{if(!_flashCreated&&!_initalizing){_initalizing=true;log("Creating detection Flash helper");window.setTimeout(createContainer,10);}else{log("Unhandled case, marked not ready and flash somehow created?");}}},isQualifiedVersion:function(reqver){if(!SkypeDetection.ready!SkypeDetection.installed){return false;}var ver=SkypeDetection.version;log("Comparing detected version "+ver+" to required version "+reqver);ver=ver.split(".");reqver=reqver.split(".");try{if(parseInt(ver[0])>parseInt(reqver[0])(parseInt(ver[0])==parseInt(reqver[0])&&parseInt(ver[1])>parseInt(reqver[1]))(parseInt(ver[0])==parseInt(reqver[0])&&parseInt(ver[1])==parseInt(reqver[1])&&parseInt(ver[3])>=parseInt(reqver[3]))){return true;}}catch(e){}return false;},ready:false,version:null,platform:null,language:null,installed:null,internal:{username:null,profileTimezone:null,osTimezone:null,profileAge:null}};}();}
(function(){var _verbose=false;var _hasSkype=false;var _currentURI;var _notice;var _template='<div style="width: 540px; height: 305px; background: white url(http://download.skype.com/share/skypebuttons/oops/bg.png) top left no-repeat; position: relative; font: 14px Verdana, sans-serif;"><span style="position: absolute; left: 40px; top: 44px; font: 24px/24px Verdana, sans-serif; color: white; font-weight: 500;">Hello!</span><span style="position: absolute; left: 40px; top: 90px; width: 230px; font: 14px/18px Verdana, sans-serif; color: white;">Skype buttons require that you have the latest version of Skype installed. Don&rsquo;t worry, you only need to do this once.</span><span style="position: absolute; left: 290px; top: 90px; width: 220px; font: 14px/18px Verdana, sans-serif; color: white;">Skype is a little piece of software that lets you make free calls over the internet.<br /><a href="http://www.skype.com/go/features" style="color: white">Learn more about Skype</a></span><span style="position: absolute; left: 40px; top: 200px; font: 14px/18px Verdana, sans-serif; color: black; width: 460px;">Skype is free, easy and quick to download and install.<br /> It works with Windows, Mac OS X, Linux and your mobile device.</span><form action="http://www.skype.com/go/download" method="get" target="_blank" style="position: absolute; margin: 0; padding: 0; left: 40px; top: 255px; width: 460px;"><input type="submit" value="Download Skype" style="float: left;" /><input type="button" name="haveskype" value="Already have Skype" style="float: right;" /></form></div></div>';var log=function(msg){if(_verbose&&console&&console.log){console.log("[skypeCheck.js] "+msg);}};if(typeof SkypeDetection!="object"typeof swfobject!="object"!swfobject.addDomLoadEvent){log("Needed dependencies (SkypeDetection, SWFObject 2.x) were not found! Not checking for Skype");return;}var addListener=function(obj,ev,fn){if(obj&&typeof obj.addEventListener!="undefined"){obj.addEventListener(ev,fn,false);}else{if(obj&&typeof obj.attachEvent!="undefined"){obj.attachEvent("on"+ev,fn);}else{log("No supported way to add event listener was found");}}};var addLinkChecks=function(){var links=document.getElementsByTagName("A");var l;for(var i=0;i<links.length;i++){l=links[i];if(l.href&&l.href.indexOf("skype:")==0){addListener(l,"click",linkClickCheck);continue;}}};var linkClickCheck=function(e){if(!e){var e=window.event;}var target=e.targete.srcElementnull;if(target){while(target.tagName!="A"&&target.parentElement){target=target.parentElement;}}if(SkypeDetection.installed_hasSkype){log("Skype was detected, passing link through to Skype");return;}else{log("Skype seems not to be installed");target&&target.href&&(_currentURI=target.href);showNotice();e.preventDefault&&e.preventDefault();e.stopPropagation&&e.stopPropagation();e.returnValue&&(e.returnValue=false);return false;}};var showNotice=function(){var clientWidth=0,clientHeight=0;if(!_notice){if(document&&document.documentElement&&document.documentElement.clientWidth){clientWidth=document.documentElement.clientWidth;clientHeight=document.documentElement.clientHeight;}else{if(document&&document.body&&document.body.clientWidth){clientWidth=document.body.clientWidth;clientHeight=document.body.clientHeight;}}log("Creating notice element");_notice=document.createElement("DIV");_notice.id="skypeCheckNotice";_notice.style.position="absolute";_notice.style.zIndex="10000";
_notice.style.top=Math.max(0,Math.floor(clientHeight/2-152))+"px";_notice.style.left=Math.max(0,Math.floor(clientWidth/2-270))+"px";_notice.innerHTML=_template;document.body.appendChild(_notice);var f=_notice.getElementsByTagName("input");(f.length==2)&&addListener(f[1],"click",hasSkype);f.length&&addListener(f[0].parentElement,"submit",onDownloading)&&f[0].focus();}log("Showing notice element");_notice.style.visibility="visible";};var hasSkype=function(){log("User indicated having Skype, hiding notice, opening Skype URI "+_currentURI);_hasSkype=true;_notice.style.visibility="hidden";_currentURI&&location.replace(_currentURI);_currentURI=null;};var onDownloading=function(){var i=_notice.getElementsByTagName("input");if(i.length>1){i[1].style["float"]="";i[1].value="I have Skype installed now";i[0].style.display="none";}};var skypeCheck=function(){return SkypeDetection.ready&&SkypeDetection.installed;};swfobject.addDomLoadEvent(addLinkChecks);swfobject.addDomLoadEvent(SkypeDetection.detect);window.skypeCheck=skypeCheck;})();*/
$.fn.observe = function(callback) {
	return this.each(function(){
		var form = this, change = false;
		$(form.elements).change(function() {
			change = true;
		});
		setInterval(function() {
			if (change) callback.call(form);
			change = false;
		}, 1000);
	});
};
/* qTip2 v2.2.0 tips modal viewport svg imagemap ie6  qtip2.com  Licensed MIT, GPL  Thu Nov 21 2013 20:34:59 */
(function(t,e,i){(function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):jQuery&&!jQuery.fn.qtip&&t(jQuery)})(function(s){"use strict";function o(t,e,i,o){this.id=i,this.target=t,this.tooltip=E,this.elements={target:t},this._id=X+"-"+i,this.timers={img:{}},this.options=e,this.plugins={},this.cache={event:{},target:s(),disabled:k,attr:o,onTooltip:k,lastClass:""},this.rendered=this.destroyed=this.disabled=this.waiting=this.hiddenDuringWait=this.positioning=this.triggering=k}function n(t){return t===E"object"!==s.type(t)}function r(t){return!(s.isFunction(t)t&&t.attrt.length"object"===s.type(t)&&(t.jqueryt.then))}function a(t){var e,i,o,a;return n(t)?k:(n(t.metadata)&&(t.metadata={type:t.metadata}),"content"in t&&(e=t.content,n(e)e.jquerye.done?e=t.content={text:i=r(e)?k:e}:i=e.text,"ajax"in e&&(o=e.ajax,a=o&&o.once!==k,delete e.ajax,e.text=function(t,e){var n=is(this).attr(e.options.content.attr)"Loading...",r=s.ajax(s.extend({},o,{context:e})).then(o.success,E,o.error).then(function(t){return t&&a&&e.set("content.text",t),t},function(t,i,s){e.destroyed0===t.statuse.set("content.text",i+": "+s)});return a?n:(e.set("content.text",n),r)}),"title"in e&&(n(e.title)(e.button=e.title.button,e.title=e.title.text),r(e.titlek)&&(e.title=k))),"position"in t&&n(t.position)&&(t.position={my:t.position,at:t.position}),"show"in t&&n(t.show)&&(t.show=t.show.jquery?{target:t.show}:t.show===W?{ready:W}:{event:t.show}),"hide"in t&&n(t.hide)&&(t.hide=t.hide.jquery?{target:t.hide}:{event:t.hide}),"style"in t&&n(t.style)&&(t.style={classes:t.style}),s.each(R,function(){this.sanitize&&this.sanitize(t)}),t)}function h(t,e){for(var i,s=0,o=t,n=e.split(".");o=o[n[s++]];)n.length>s&&(i=o);return[it,n.pop()]}function l(t,e){var i,s,o;for(i in this.checks)for(s in this.checks[i])(o=RegExp(s,"i").exec(t))&&(e.push(o),("builtin"===ithis.plugins[i])&&this.checks[i][s].apply(this.plugins[i]this,e))}function c(t){return G.concat("").join(t?"-"+t+" ":" ")}function d(i){return i&&{type:i.type,pageX:i.pageX,pageY:i.pageY,target:i.target,relatedTarget:i.relatedTarget,scrollX:i.scrollXt.pageXOffsete.body.scrollLefte.documentElement.scrollLeft,scrollY:i.scrollYt.pageYOffsete.body.scrollTope.documentElement.scrollTop}{}}function p(t,e){return e>0?setTimeout(s.proxy(t,this),e):(t.call(this),i)}function u(t){return this.tooltip.hasClass(ee)?k:(clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this.timers.show=p.call(this,function(){this.toggle(W,t)},this.options.show.delay),i)}function f(t){if(this.tooltip.hasClass(ee))return k;var e=s(t.relatedTarget),i=e.closest(U)[0]===this.tooltip[0],o=e[0]===this.options.show.target[0];if(clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this!==e[0]&&"mouse"===this.options.position.target&&ithis.options.hide.fixed&&/mouse(outleavemove)/.test(t.type)&&(io))try{t.preventDefault(),t.stopImmediatePropagation()}catch(n){}else this.timers.hide=p.call(this,function(){this.toggle(k,t)},this.options.hide.delay,this)}function g(t){return this.tooltip.hasClass(ee)!this.options.hide.inactive?k:(clearTimeout(this.timers.inactive),this.timers.inactive=p.call(this,function(){this.hide(t)},this.options.hide.inactive),i)}function m(t){this.rendered&&this.tooltip[0].offsetWidth>0&&this.reposition(t)}function v(t,i,o){s(e.body).delegate(t,(i.split?i:i.join(he+" "))+he,function(){var t=T.api[s.attr(this,H)];t&&!t.disabled&&o.apply(t,arguments)})}function y(t,i,n){var r,h,l,c,d,p=s(e.body),u=t[0]===e?p:t,f=t.metadata?t.metadata(n.metadata):E,g="html5"===n.metadata.type&&f?f[n.metadata.name]:E,m=t.data(n.metadata.name"qtipopts");try{m="string"==typeof m?s.parseJSON(m):m}catch(v){}if(c=s.extend(W,{},T.defaults,n,"object"==typeof m?a(m):E,a(gf)),h=c.position,c.id=i,"boolean"==typeof c.content.text){if(l=t.attr(c.content.attr),c.content.attr===k!l)return k;c.content.text=l}if(h.container.length(h.container=p),h.target===k&&(h.target=u),c.show.target===k&&(c.show.target=u),c.show.solo===W&&(c.show.solo=h.container.closest("body")),c.hide.target===k&&(c.hide.target=u),c.position.viewport===W&&(c.position.viewport=h.container),h.container=h.container.eq(0),h.at=new z(h.at,W),h.my=new z(h.my),t.data(X))if(c.overwrite)t.qtip("destroy",!0);else if(c.overwrite===k)return k;return t.attr(Y,i),c.suppress&&(d=t.attr("title"))&&t.removeAttr("title").attr(se,d).attr("title",""),r=new o(t,c,i,!!l),t.data(X,r),t.one("remove.qtip-"+i+" removeqtip.qtip-"+i,function(){var t;(t=s(this).data(X))&&t.destroy(!0)}),r}function b(t){return t.charAt(0).toUpperCase()+t.slice(1)}function w(t,e){var s,o,n=e.charAt(0).toUpperCase()+e.slice(1),r=(e+" "+be.join(n+" ")+n).split(" "),a=0;if(ye[e])return t.css(ye[e]);for(;s=r[a++];)if((o=t.css(s))!==i)return ye[e]=s,o}function _(t,e){return Math.ceil(parseFloat(w(t,e)))}function x(t,e){this._ns="tip",this.options=e,this.offset=e.offset,this.size=[e.width,e.height],this.init(this.qtip=t)}function q(t,e){this.options=e,this._ns="-modal",this.init(this.qtip=t)}function C(t){this._ns="ie6",this.init(this.qtip=t)}var T,j,z,M,I,W=!0,k=!1,E=null,S="x",L="y",A="width",B="height",D="top",F="left",O="bottom",P="right",N="center",$="flipinvert",V="shift",R={},X="qtip",Y="data-hasqtip",H="data-qtip-id",G=["ui-widget","ui-tooltip"],U="."+X,Q="click dblclick mousedown mouseup mousemove mouseleave mouseenter".split(" "),J=X+"-fixed",K=X+"-default",Z=X+"-focus",te=X+"-hover",ee=X+"-disabled",ie="_replacedByqTip",se="oldtitle",oe={ie:function(){for(var t=3,i=e.createElement("div");(i.innerHTML="<!--[if gt IE "+ ++t+"]><i></i><![endif]-->")&&i.getElementsByTagName("i")[0];);return t>4?t:0/0}(),iOS:parseFloat((""+(/CPU.*OS ([0-9_]{1,5})(CPU like).*AppleWebKit.*Mobile/i.exec(navigator.userAgent)[0,""])[1]).replace("undefined","3_2").replace("_",".").replace("_",""))k};j=o.prototype,j._when=function(t){return s.when.apply(s,t)},j.render=function(t){if(this.renderedthis.destroyed)return this;var e,i=this,o=this.options,n=this.cache,r=this.elements,a=o.content.text,h=o.content.title,l=o.content.button,c=o.position,d=("."+this._id+" ",[]);return s.attr(this.target[0],"aria-describedby",this._id),this.tooltip=r.tooltip=e=s("<div/>",{id:this._id,"class":[X,K,o.style.classes,X+"-pos-"+o.position.my.abbrev()].join(" "),width:o.style.width"",height:o.style.height"",tracking:"mouse"===c.target&&c.adjust.mouse,role:"alert","aria-live":"polite","aria-atomic":k,"aria-describedby":this._id+"-content","aria-hidden":W}).toggleClass(ee,this.disabled).attr(H,this.id).data(X,this).appendTo(c.container).append(r.content=s("<div />",{"class":X+"-content",id:this._id+"-content","aria-atomic":W})),this.rendered=-1,this.positioning=W,h&&(this._createTitle(),s.isFunction(h)d.push(this._updateTitle(h,k))),l&&this._createButton(),s.isFunction(a)d.push(this._updateContent(a,k)),this.rendered=W,this._setWidget(),s.each(R,function(t){var e;"render"===this.initialize&&(e=this(i))&&(i.plugins[t]=e)}),this._unassignEvents(),this._assignEvents(),this._when(d).then(function(){i._trigger("render"),i.positioning=k,i.hiddenDuringWait!o.show.ready&&!ti.toggle(W,n.event,k),i.hiddenDuringWait=k}),T.api[this.id]=this,this},j.destroy=function(t){function e(){if(!this.destroyed){this.destroyed=W;var t=this.target,e=t.attr(se);this.rendered&&this.tooltip.stop(1,0).find("*").remove().end().remove(),s.each(this.plugins,function(){this.destroy&&this.destroy()}),clearTimeout(this.timers.show),clearTimeout(this.timers.hide),this._unassignEvents(),t.removeData(X).removeAttr(H).removeAttr(Y).removeAttr("aria-describedby"),this.options.suppress&&e&&t.attr("title",e).removeAttr(se),this._unbind(t),this.options=this.elements=this.cache=this.timers=this.plugins=this.mouse=E,delete T.api[this.id]}}return this.destroyed?this.target:(t===W&&"hide"!==this.triggering!this.rendered?e.call(this):(this.tooltip.one("tooltiphidden",s.proxy(e,this)),!this.triggering&&this.hide()),this.target)},M=j.checks={builtin:{"^id$":function(t,e,i,o){var n=i===W?T.nextid:i,r=X+"-"+n;n!==k&&n.length>0&&!s("#"+r).length?(this._id=r,this.rendered&&(this.tooltip[0].id=this._id,this.elements.content[0].id=this._id+"-content",this.elements.title[0].id=this._id+"-title")):t[e]=o},"^prerender":function(t,e,i){i&&!this.rendered&&this.render(this.options.show.ready)},"^content.text$":function(t,e,i){this._updateContent(i)},"^content.attr$":function(t,e,i,s){this.options.content.text===this.target.attr(s)&&this._updateContent(this.target.attr(i))},"^content.title$":function(t,e,s){return s?(s&&!this.elements.title&&this._createTitle(),this._updateTitle(s),i):this._removeTitle()},"^content.button$":function(t,e,i){this._updateButton(i)},"^content.title.(textbutton)$":function(t,e,i){this.set("content."+e,i)},"^position.(myat)$":function(t,e,i){"string"==typeof i&&(t[e]=new z(i,"at"===e))},"^position.container$":function(t,e,i){this.rendered&&this.tooltip.appendTo(i)},"^show.ready$":function(t,e,i){i&&(!this.rendered&&this.render(W)this.toggle(W))},"^style.classes$":function(t,e,i,s){this.rendered&&this.tooltip.removeClass(s).addClass(i)},"^style.(widthheight)":function(t,e,i){this.rendered&&this.tooltip.css(e,i)},"^style.widgetcontent.title":function(){this.rendered&&this._setWidget()},"^style.def":function(t,e,i){this.rendered&&this.tooltip.toggleClass(K,!!i)},"^events.(rendershowmovehidefocusblur)$":function(t,e,i){this.rendered&&this.tooltip[(s.isFunction(i)?"":"un")+"bind"]("tooltip"+e,i)},"^(showhideposition).(eventtargetfixedinactiveleavedistanceviewportadjust)":function(){if(this.rendered){var t=this.options.position;this.tooltip.attr("tracking","mouse"===t.target&&t.adjust.mouse),this._unassignEvents(),this._assignEvents()}}}},j.get=function(t){if(this.destroyed)return this;var e=h(this.options,t.toLowerCase()),i=e[0][e[1]];return i.precedance?i.string():i};var ne=/^position\.(myatadjusttargetcontainerviewport)stylecontentshow\.ready/i,re=/^prerendershow\.ready/i;j.set=function(t,e){if(this.destroyed)return this;var o,n=this.rendered,r=k,c=this.options;return this.checks,"string"==typeof t?(o=t,t={},t[o]=e):t=s.extend({},t),s.each(t,function(e,o){if(n&&re.test(e))return delete t[e],i;var a,l=h(c,e.toLowerCase());a=l[0][l[1]],l[0][l[1]]=o&&o.nodeType?s(o):o,r=ne.test(e)r,t[e]=[l[0],l[1],o,a]}),a(c),this.positioning=W,s.each(t,s.proxy(l,this)),this.positioning=k,this.rendered&&this.tooltip[0].offsetWidth>0&&r&&this.reposition("mouse"===c.position.target?E:this.cache.event),this},j._update=function(t,e){var i=this,o=this.cache;return this.rendered&&t?(s.isFunction(t)&&(t=t.call(this.elements.target,o.event,this)""),s.isFunction(t.then)?(o.waiting=W,t.then(function(t){return o.waiting=k,i._update(t,e)},E,function(t){return i._update(t,e)})):t===k!t&&""!==t?k:(t.jquery&&t.length>0?e.empty().append(t.css({display:"block",visibility:"visible"})):e.html(t),this._waitForContent(e).then(function(t){t.images&&t.images.length&&i.rendered&&i.tooltip[0].offsetWidth>0&&i.reposition(o.event,!t.length)}))):k},j._waitForContent=function(t){var e=this.cache;return e.waiting=W,(s.fn.imagesLoaded?t.imagesLoaded():s.Deferred().resolve([])).done(function(){e.waiting=k}).promise()},j._updateContent=function(t,e){this._update(t,this.elements.content,e)},j._updateTitle=function(t,e){this._update(t,this.elements.title,e)===k&&this._removeTitle(k)},j._createTitle=function(){var t=this.elements,e=this._id+"-title";t.titlebar&&this._removeTitle(),t.titlebar=s("<div />",{"class":X+"-titlebar "+(this.options.style.widget?c("header"):"")}).append(t.title=s("<div />",{id:e,"class":X+"-title","aria-atomic":W})).insertBefore(t.content).delegate(".qtip-close","mousedown keydown mouseup keyup mouseout",function(t){s(this).toggleClass("ui-state-active ui-state-focus","down"===t.type.substr(-4))}).delegate(".qtip-close","mouseover mouseout",function(t){s(this).toggleClass("ui-state-hover","mouseover"===t.type)}),this.options.content.button&&this._createButton()},j._removeTitle=function(t){var e=this.elements;e.title&&(e.titlebar.remove(),e.titlebar=e.title=e.button=E,t!==k&&this.reposition())},j.reposition=function(i,o){if(!this.renderedthis.positioningthis.destroyed)return this;this.positioning=W;var n,r,a=this.cache,h=this.tooltip,l=this.options.position,c=l.target,d=l.my,p=l.at,u=l.viewport,f=l.container,g=l.adjust,m=g.method.split(" "),v=h.outerWidth(k),y=h.outerHeight(k),b=0,w=0,_=h.css("position"),x={left:0,top:0},q=h[0].offsetWidth>0,C=i&&"scroll"===i.type,T=s(t),j=f[0].ownerDocument,z=this.mouse;if(s.isArray(c)&&2===c.length)p={x:F,y:D},x={left:c[0],top:c[1]};else if("mouse"===c)p={x:F,y:D},!z!z.pageX!g.mouse&&i&&i.pageX?i&&i.pageX((!g.mousethis.options.show.distance)&&a.origin&&a.origin.pageX?i=a.origin:(!ii&&("resize"===i.type"scroll"===i.type))&&(i=a.event)):i=z,"static"!==_&&(x=f.offset()),j.body.offsetWidth!==(t.innerWidthj.documentElement.clientWidth)&&(r=s(e.body).offset()),x={left:i.pageX-x.left+(r&&r.left0),top:i.pageY-x.top+(r&&r.top0)},g.mouse&&C&&z&&(x.left-=(z.scrollX0)-T.scrollLeft(),x.top-=(z.scrollY0)-T.scrollTop());else{if("event"===c?i&&i.target&&"scroll"!==i.type&&"resize"!==i.type?a.target=s(i.target):i.target(a.target=this.elements.target):"event"!==c&&(a.target=s(c.jquery?c:this.elements.target)),c=a.target,c=s(c).eq(0),0===c.length)return this;c[0]===ec[0]===t?(b=oe.iOS?t.innerWidth:c.width(),w=oe.iOS?t.innerHeight:c.height(),c[0]===t&&(x={top:(uc).scrollTop(),left:(uc).scrollLeft()})):R.imagemap&&c.is("area")?n=R.imagemap(this,c,p,R.viewport?m:k):R.svg&&c&&c[0].ownerSVGElement?n=R.svg(this,c,p,R.viewport?m:k):(b=c.outerWidth(k),w=c.outerHeight(k),x=c.offset()),n&&(b=n.width,w=n.height,r=n.offset,x=n.position),x=this.reposition.offset(c,x,f),(oe.iOS>3.1&&4.1>oe.iOSoe.iOS>=4.3&&4.33>oe.iOS!oe.iOS&&"fixed"===_)&&(x.left-=T.scrollLeft(),x.top-=T.scrollTop()),(!nn&&n.adjustable!==k)&&(x.left+=p.x===P?b:p.x===N?b/2:0,x.top+=p.y===O?w:p.y===N?w/2:0)}return x.left+=g.x+(d.x===P?-v:d.x===N?-v/2:0),x.top+=g.y+(d.y===O?-y:d.y===N?-y/2:0),R.viewport?(x.adjusted=R.viewport(this,x,l,b,w,v,y),r&&x.adjusted.left&&(x.left+=r.left),r&&x.adjusted.top&&(x.top+=r.top)):x.adjusted={left:0,top:0},this._trigger("move",[x,u.elemu],i)?(delete x.adjusted,o===k!qisNaN(x.left)isNaN(x.top)"mouse"===c!s.isFunction(l.effect)?h.css(x):s.isFunction(l.effect)&&(l.effect.call(h,this,s.extend({},x)),h.queue(function(t){s(this).css({opacity:"",height:""}),oe.ie&&this.style.removeAttribute("filter"),t()})),this.positioning=k,this):this},j.reposition.offset=function(t,i,o){function n(t,e){i.left+=e*t.scrollLeft(),i.top+=e*t.scrollTop()}if(!o[0])return i;var r,a,h,l,c=s(t[0].ownerDocument),d=!!oe.ie&&"CSS1Compat"!==e.compatMode,p=o[0];do"static"!==(a=s.css(p,"position"))&&("fixed"===a?(h=p.getBoundingClientRect(),n(c,-1)):(h=s(p).position(),h.left+=parseFloat(s.css(p,"borderLeftWidth"))0,h.top+=parseFloat(s.css(p,"borderTopWidth"))0),i.left-=h.left+(parseFloat(s.css(p,"marginLeft"))0),i.top-=h.top+(parseFloat(s.css(p,"marginTop"))0),r"hidden"===(l=s.css(p,"overflow"))"visible"===l(r=s(p)));while(p=p.offsetParent);return r&&(r[0]!==c[0]d)&&n(r,1),i};var ae=(z=j.reposition.Corner=function(t,e){t=(""+t).replace(/([A-Z])/," $1").replace(/middle/gi,N).toLowerCase(),this.x=(t.match(/leftright/i)t.match(/center/)["inherit"])[0].toLowerCase(),this.y=(t.match(/topbottomcenter/i)["inherit"])[0].toLowerCase(),this.forceY=!!e;var i=t.charAt(0);this.precedance="t"===i"b"===i?L:S}).prototype;ae.invert=function(t,e){this[t]=this[t]===F?P:this[t]===P?F:ethis[t]},ae.string=function(){var t=this.x,e=this.y;return t===e?t:this.precedance===Lthis.forceY&&"center"!==e?e+" "+t:t+" "+e},ae.abbrev=function(){var t=this.string().split(" ");return t[0].charAt(0)+(t[1]&&t[1].charAt(0)"")},ae.clone=function(){return new z(this.string(),this.forceY)},j.toggle=function(t,i){var o=this.cache,n=this.options,r=this.tooltip;if(i){if(/overenter/.test(i.type)&&/outleave/.test(o.event.type)&&n.show.target.add(i.target).length===n.show.target.length&&r.has(i.relatedTarget).length)return this;o.event=d(i)}if(this.waiting&&!t&&(this.hiddenDuringWait=W),!this.rendered)return t?this.render(1):this;if(this.destroyedthis.disabled)return this;var a,h,l,c=t?"show":"hide",p=this.options[c],u=(this.options[t?"hide":"show"],this.options.position),f=this.options.content,g=this.tooltip.css("width"),m=this.tooltip.is(":visible"),v=t1===p.target.length,y=!i2>p.target.lengtho.target[0]===i.target;return(typeof t).search("booleannumber")&&(t=!m),a=!r.is(":animated")&&m===t&&y,h=a?E:!!this._trigger(c,[90]),this.destroyed?this:(h!==k&&t&&this.focus(i),!ha?this:(s.attr(r[0],"aria-hidden",!t),t?(o.origin=d(this.mouse),s.isFunction(f.text)&&this._updateContent(f.text,k),s.isFunction(f.title)&&this._updateTitle(f.title,k),!I&&"mouse"===u.target&&u.adjust.mouse&&(s(e).bind("mousemove."+X,this._storeMouse),I=W),gr.css("width",r.outerWidth(k)),this.reposition(i,arguments[2]),gr.css("width",""),p.solo&&("string"==typeof p.solo?s(p.solo):s(U,p.solo)).not(r).not(p.target).qtip("hide",s.Event("tooltipsolo"))):(clearTimeout(this.timers.show),delete o.origin,I&&!s(U+'[tracking="true"]:visible',p.solo).not(r).length&&(s(e).unbind("mousemove."+X),I=k),this.blur(i)),l=s.proxy(function(){t?(oe.ie&&r[0].style.removeAttribute("filter"),r.css("overflow",""),"string"==typeof p.autofocus&&s(this.options.show.autofocus,r).focus(),this.options.show.target.trigger("qtip-"+this.id+"-inactive")):r.css({display:"",visibility:"",opacity:"",left:"",top:""}),this._trigger(t?"visible":"hidden")},this),p.effect===kv===k?(r[c](),l()):s.isFunction(p.effect)?(r.stop(1,1),p.effect.call(r,this),r.queue("fx",function(t){l(),t()})):r.fadeTo(90,t?1:0,l),t&&p.target.trigger("qtip-"+this.id+"-inactive"),this))},j.show=function(t){return this.toggle(W,t)},j.hide=function(t){return this.toggle(k,t)},j.focus=function(t){if(!this.renderedthis.destroyed)return this;var e=s(U),i=this.tooltip,o=parseInt(i[0].style.zIndex,10),n=T.zindex+e.length;return i.hasClass(Z)this._trigger("focus",[n],t)&&(o!==n&&(e.each(function(){this.style.zIndex>o&&(this.style.zIndex=this.style.zIndex-1)}),e.filter("."+Z).qtip("blur",t)),i.addClass(Z)[0].style.zIndex=n),this},j.blur=function(t){return!this.renderedthis.destroyed?this:(this.tooltip.removeClass(Z),this._trigger("blur",[this.tooltip.css("zIndex")],t),this)},j.disable=function(t){return this.destroyed?this:("toggle"===t?t=!(this.rendered?this.tooltip.hasClass(ee):this.disabled):"boolean"!=typeof t&&(t=W),this.rendered&&this.tooltip.toggleClass(ee,t).attr("aria-disabled",t),this.disabled=!!t,this)},j.enable=function(){return this.disable(k)},j._createButton=function(){var t=this,e=this.elements,i=e.tooltip,o=this.options.content.button,n="string"==typeof o,r=n?o:"Close tooltip";e.button&&e.button.remove(),e.button=o.jquery?o:s("<a />",{"class":"qtip-close "+(this.options.style.widget?"":X+"-icon"),title:r,"aria-label":r}).prepend(s("<span />",{"class":"ui-icon ui-icon-close",html:"&times;"})),e.button.appendTo(e.titlebari).attr("role","button").click(function(e){return i.hasClass(ee)t.hide(e),k})},j._updateButton=function(t){if(!this.rendered)return k;var e=this.elements.button;t?this._createButton():e.remove()},j._setWidget=function(){var t=this.options.style.widget,e=this.elements,i=e.tooltip,s=i.hasClass(ee);i.removeClass(ee),ee=t?"ui-state-disabled":"qtip-disabled",i.toggleClass(ee,s),i.toggleClass("ui-helper-reset "+c(),t).toggleClass(K,this.options.style.def&&!t),e.content&&e.content.toggleClass(c("content"),t),e.titlebar&&e.titlebar.toggleClass(c("header"),t),e.button&&e.button.toggleClass(X+"-icon",!t)},j._storeMouse=function(t){(this.mouse=d(t)).type="mousemove"},j._bind=function(t,e,i,o,n){var r="."+this._id+(o?"-"+o:"");e.length&&s(t).bind((e.split?e:e.join(r+" "))+r,s.proxy(i,nthis))},j._unbind=function(t,e){s(t).unbind("."+this._id+(e?"-"+e:""))};var he="."+X;s(function(){v(U,["mouseenter","mouseleave"],function(t){var e="mouseenter"===t.type,i=s(t.currentTarget),o=s(t.relatedTargett.target),n=this.options;e?(this.focus(t),i.hasClass(J)&&!i.hasClass(ee)&&clearTimeout(this.timers.hide)):"mouse"===n.position.target&&n.hide.event&&n.show.target&&!o.closest(n.show.target[0]).length&&this.hide(t),i.toggleClass(te,e)}),v("["+H+"]",Q,g)}),j._trigger=function(t,e,i){var o=s.Event("tooltip"+t);return o.originalEvent=i&&s.extend({},i)this.cache.eventE,this.triggering=t,this.tooltip.trigger(o,[this].concat(e[])),this.triggering=k,!o.isDefaultPrevented()},j._bindEvents=function(t,e,o,n,r,a){if(n.add(o).length===n.length){var h=[];e=s.map(e,function(e){var o=s.inArray(e,t);return o>-1?(h.push(t.splice(o,1)[0]),i):e}),h.length&&this._bind(o,h,function(t){var e=this.rendered?this.tooltip[0].offsetWidth>0:!1;(e?a:r).call(this,t)})}this._bind(o,t,r),this._bind(n,e,a)},j._assignInitialEvents=function(t){function e(t){return this.disabledthis.destroyed?k:(this.cache.event=d(t),this.cache.target=t?s(t.target):[i],clearTimeout(this.timers.show),this.timers.show=p.call(this,function(){this.render("object"==typeof to.show.ready)},o.show.delay),i)}var o=this.options,n=o.show.target,r=o.hide.target,a=o.show.event?s.trim(""+o.show.event).split(" "):[],h=o.hide.event?s.trim(""+o.hide.event).split(" "):[];/mouse(overenter)/i.test(o.show.event)&&!/mouse(outleave)/i.test(o.hide.event)&&h.push("mouseleave"),this._bind(n,"mousemove",function(t){this._storeMouse(t),this.cache.onTarget=W}),this._bindEvents(a,h,n,r,e,function(){clearTimeout(this.timers.show)}),(o.show.readyo.prerender)&&e.call(this,t)},j._assignEvents=function(){var i=this,o=this.options,n=o.position,r=this.tooltip,a=o.show.target,h=o.hide.target,l=n.container,c=n.viewport,d=s(e),p=(s(e.body),s(t)),v=o.show.event?s.trim(""+o.show.event).split(" "):[],y=o.hide.event?s.trim(""+o.hide.event).split(" "):[];s.each(o.events,function(t,e){i._bind(r,"toggle"===t?["tooltipshow","tooltiphide"]:["tooltip"+t],e,null,r)}),/mouse(outleave)/i.test(o.hide.event)&&"window"===o.hide.leave&&this._bind(d,["mouseout","blur"],function(t){/selectoption/.test(t.target.nodeName)t.relatedTargetthis.hide(t)}),o.hide.fixed?h=h.add(r.addClass(J)):/mouse(overenter)/i.test(o.show.event)&&this._bind(h,"mouseleave",function(){clearTimeout(this.timers.show)}),(""+o.hide.event).indexOf("unfocus")>-1&&this._bind(l.closest("html"),["mousedown","touchstart"],function(t){var e=s(t.target),i=this.rendered&&!this.tooltip.hasClass(ee)&&this.tooltip[0].offsetWidth>0,o=e.parents(U).filter(this.tooltip[0]).length>0;e[0]===this.target[0]e[0]===this.tooltip[0]othis.target.has(e[0]).length!ithis.hide(t)}),"number"==typeof o.hide.inactive&&(this._bind(a,"qtip-"+this.id+"-inactive",g),this._bind(h.add(r),T.inactiveEvents,g,"-inactive")),this._bindEvents(v,y,a,h,u,f),this._bind(a.add(r),"mousemove",function(t){if("number"==typeof o.hide.distance){var e=this.cache.origin{},i=this.options.hide.distance,s=Math.abs;(s(t.pageX-e.pageX)>=is(t.pageY-e.pageY)>=i)&&this.hide(t)}this._storeMouse(t)}),"mouse"===n.target&&n.adjust.mouse&&(o.hide.event&&this._bind(a,["mouseenter","mouseleave"],function(t){this.cache.onTarget="mouseenter"===t.type}),this._bind(d,"mousemove",function(t){this.rendered&&this.cache.onTarget&&!this.tooltip.hasClass(ee)&&this.tooltip[0].offsetWidth>0&&this.reposition(t)})),(n.adjust.resizec.length)&&this._bind(s.event.special.resize?c:p,"resize",m),n.adjust.scroll&&this._bind(p.add(n.container),"scroll",m)},j._unassignEvents=function(){var i=[this.options.show.target[0],this.options.hide.target[0],this.rendered&&this.tooltip[0],this.options.position.container[0],this.options.position.viewport[0],this.options.position.container.closest("html")[0],t,e];this._unbind(s([]).pushStack(s.grep(i,function(t){return"object"==typeof t})))},T=s.fn.qtip=function(t,e,o){var n=(""+t).toLowerCase(),r=E,h=s.makeArray(arguments).slice(1),l=h[h.length-1],c=this[0]?s.data(this[0],X):E;return!arguments.length&&c"api"===n?c:"string"==typeof t?(this.each(function(){var t=s.data(this,X);if(!t)return W;if(l&&l.timeStamp&&(t.cache.event=l),!e"option"!==n&&"options"!==n)t[n]&&t[n].apply(t,h);else{if(o===i&&!s.isPlainObject(e))return r=t.get(e),k;t.set(e,o)}}),r!==E?r:this):"object"!=typeof t&&arguments.length?i:(c=a(s.extend(W,{},t)),this.each(function(t){var e,o;return o=s.isArray(c.id)?c.id[t]:c.id,o=!oo===k1>o.lengthT.api[o]?T.nextid++:o,e=y(s(this),o,c),e===k?W:(T.api[o]=e,s.each(R,function(){"initialize"===this.initialize&&this(e)}),e._assignInitialEvents(l),i)}))},s.qtip=o,T.api={},s.each({attr:function(t,e){if(this.length){var i=this[0],o="title",n=s.data(i,"qtip");if(t===o&&n&&"object"==typeof n&&n.options.suppress)return 2>arguments.length?s.attr(i,se):(n&&n.options.content.attr===o&&n.cache.attr&&n.set("content.text",e),this.attr(se,e))}return s.fn["attr"+ie].apply(this,arguments)},clone:function(t){var e=(s([]),s.fn["clone"+ie].apply(this,arguments));return te.filter("["+se+"]").attr("title",function(){return s.attr(this,se)}).removeAttr(se),e}},function(t,e){if(!es.fn[t+ie])return W;var i=s.fn[t+ie]=s.fn[t];s.fn[t]=function(){return e.apply(this,arguments)i.apply(this,arguments)}}),s.ui(s["cleanData"+ie]=s.cleanData,s.cleanData=function(t){for(var e,i=0;(e=s(t[i])).length;i++)if(e.attr(Y))try{e.triggerHandler("removeqtip")}catch(o){}s["cleanData"+ie].apply(this,arguments)}),T.version="2.2.0",T.nextid=0,T.inactiveEvents=Q,T.zindex=15e3,T.defaults={prerender:k,id:k,overwrite:W,suppress:W,content:{text:W,attr:"title",title:k,button:k},position:{my:"top left",at:"bottom right",target:k,container:k,viewport:k,adjust:{x:0,y:0,mouse:W,scroll:W,resize:W,method:"flipinvert flipinvert"},effect:function(t,e){s(this).animate(e,{duration:200,queue:k})}},show:{target:k,event:"mouseenter",effect:W,delay:90,solo:k,ready:k,autofocus:k},hide:{target:k,event:"mouseleave",effect:W,delay:0,fixed:k,inactive:k,leave:"window",distance:k},style:{classes:"",widget:k,width:k,height:k,def:W},events:{render:E,move:E,show:E,hide:E,toggle:E,visible:E,hidden:E,focus:E,blur:E}};var le,ce="margin",de="border",pe="color",ue="background-color",fe="transparent",ge=" !important",me=!!e.createElement("canvas").getContext,ve=/rgba?\(0, 0, 0(, 0)?\)transparent#123456/i,ye={},be=["Webkit","O","Moz","ms"];if(me)var we=t.devicePixelRatio1,_e=function(){var t=e.createElement("canvas").getContext("2d");return t.backingStorePixelRatiot.webkitBackingStorePixelRatiot.mozBackingStorePixelRatiot.msBackingStorePixelRatiot.oBackingStorePixelRatio1}(),xe=we/_e;else var qe=function(t,e,i){return"<qtipvml:"+t+' xmlns="urn:schemas-microsoft.com:vml" class="qtip-vml" '+(e"")+' style="behavior: url(#default#VML); '+(i"")+'" />'};s.extend(x.prototype,{init:function(t){var e,i;i=this.element=t.elements.tip=s("<div />",{"class":X+"-tip"}).prependTo(t.tooltip),me?(e=s("<canvas />").appendTo(this.element)[0].getContext("2d"),e.lineJoin="miter",e.miterLimit=1e5,e.save()):(e=qe("shape",'coordorigin="0,0"',"position:absolute;"),this.element.html(e+e),t._bind(s("*",i).add(i),["click","mousedown"],function(t){t.stopPropagation()},this._ns)),t._bind(t.tooltip,"tooltipmove",this.reposition,this._ns,this),this.create()},_swapDimensions:function(){this.size[0]=this.options.height,this.size[1]=this.options.width},_resetDimensions:function(){this.size[0]=this.options.width,this.size[1]=this.options.height},_useTitle:function(t){var e=this.qtip.elements.titlebar;return e&&(t.y===Dt.y===N&&this.element.position().top+this.size[1]/2+this.options.offset<e.outerHeight(W))},_parseCorner:function(t){var e=this.qtip.options.position.my;return t===ke===k?t=k:t===W?t=new z(e.string()):t.string(t=new z(t),t.fixed=W),t},_parseWidth:function(t,e,i){var s=this.qtip.elements,o=de+b(e)+"Width";return(i?_(i,o):_(s.content,o)_(this._useTitle(t)&&s.titlebars.content,o)_(s.tooltip,o))0},_parseRadius:function(t){var e=this.qtip.elements,i=de+b(t.y)+b(t.x)+"Radius";return 9>oe.ie?0:_(this._useTitle(t)&&e.titlebare.content,i)_(e.tooltip,i)0},_invalidColour:function(t,e,i){var s=t.css(e);return!si&&s===t.css(i)ve.test(s)?k:s},_parseColours:function(t){var e=this.qtip.elements,i=this.element.css("cssText",""),o=de+b(t[t.precedance])+b(pe),n=this._useTitle(t)&&e.titlebare.content,r=this._invalidColour,a=[];return a[0]=r(i,ue)r(n,ue)r(e.content,ue)r(e.tooltip,ue)i.css(ue),a[1]=r(i,o,pe)r(n,o,pe)r(e.content,o,pe)r(e.tooltip,o,pe)e.tooltip.css(o),s("*",i).add(i).css("cssText",ue+":"+fe+ge+";"+de+":0"+ge+";"),a},_calculateSize:function(t){var e,i,s,o=t.precedance===L,n=this.options.width,r=this.options.height,a="c"===t.abbrev(),h=(o?n:r)*(a?.5:1),l=Math.pow,c=Math.round,d=Math.sqrt(l(h,2)+l(r,2)),p=[this.border/h*d,this.border/r*d];return p[2]=Math.sqrt(l(p[0],2)-l(this.border,2)),p[3]=Math.sqrt(l(p[1],2)-l(this.border,2)),e=d+p[2]+p[3]+(a?0:p[0]),i=e/d,s=[c(i*n),c(i*r)],o?s:s.reverse()},_calculateTip:function(t,e,i){i=i1,e=ethis.size;var s=e[0]*i,o=e[1]*i,n=Math.ceil(s/2),r=Math.ceil(o/2),a={br:[0,0,s,o,s,0],bl:[0,0,s,0,0,o],tr:[0,o,s,0,s,o],tl:[0,0,0,o,s,o],tc:[0,o,n,0,s,o],bc:[0,0,s,0,n,o],rc:[0,0,s,r,0,o],lc:[s,0,s,o,0,r]};return a.lt=a.br,a.rt=a.bl,a.lb=a.tr,a.rb=a.tl,a[t.abbrev()]},_drawCoords:function(t,e){t.beginPath(),t.moveTo(e[0],e[1]),t.lineTo(e[2],e[3]),t.lineTo(e[4],e[5]),t.closePath()},create:function(){var t=this.corner=(meoe.ie)&&this._parseCorner(this.options.corner);return(this.enabled=!!this.corner&&"c"!==this.corner.abbrev())&&(this.qtip.cache.corner=t.clone(),this.update()),this.element.toggle(this.enabled),this.corner},update:function(e,i){if(!this.enabled)return this;var o,n,r,a,h,l,c,d,p=this.qtip.elements,u=this.element,f=u.children(),g=this.options,m=this.size,v=g.mimic,y=Math.round;e(e=this.qtip.cache.cornerthis.corner),v===k?v=e:(v=new z(v),v.precedance=e.precedance,"inherit"===v.x?v.x=e.x:"inherit"===v.y?v.y=e.y:v.x===v.y&&(v[e.precedance]=e[e.precedance])),n=v.precedance,e.precedance===S?this._swapDimensions():this._resetDimensions(),o=this.color=this._parseColours(e),o[1]!==fe?(d=this.border=this._parseWidth(e,e[e.precedance]),g.border&&1>d&&!ve.test(o[1])&&(o[0]=o[1]),this.border=d=g.border!==W?g.border:d):this.border=d=0,c=this.size=this._calculateSize(e),u.css({width:c[0],height:c[1],lineHeight:c[1]+"px"}),l=e.precedance===L?[y(v.x===F?d:v.x===P?c[0]-m[0]-d:(c[0]-m[0])/2),y(v.y===D?c[1]-m[1]:0)]:[y(v.x===F?c[0]-m[0]:0),y(v.y===D?d:v.y===O?c[1]-m[1]-d:(c[1]-m[1])/2)],me?(r=f[0].getContext("2d"),r.restore(),r.save(),r.clearRect(0,0,6e3,6e3),a=this._calculateTip(v,m,xe),h=this._calculateTip(v,this.size,xe),f.attr(A,c[0]*xe).attr(B,c[1]*xe),f.css(A,c[0]).css(B,c[1]),this._drawCoords(r,h),r.fillStyle=o[1],r.fill(),r.translate(l[0]*xe,l[1]*xe),this._drawCoords(r,a),r.fillStyle=o[0],r.fill()):(a=this._calculateTip(v),a="m"+a[0]+","+a[1]+" l"+a[2]+","+a[3]+" "+a[4]+","+a[5]+" xe",l[2]=d&&/^(rb)/i.test(e.string())?8===oe.ie?2:1:0,f.css({coordsize:c[0]+d+" "+(c[1]+d),antialias:""+(v.string().indexOf(N)>-1),left:l[0]-l[2]*Number(n===S),top:l[1]-l[2]*Number(n===L),width:c[0]+d,height:c[1]+d}).each(function(t){var e=s(this);e[e.prop?"prop":"attr"]({coordsize:c[0]+d+" "+(c[1]+d),path:a,fillcolor:o[0],filled:!!t,stroked:!t}).toggle(!(!d&&!t)),!t&&e.html(qe("stroke",'weight="'+2*d+'px" color="'+o[1]+'" miterlimit="1000" joinstyle="miter"'))})),t.opera&&setTimeout(function(){p.tip.css({display:"inline-block",visibility:"visible"})},1),i!==k&&this.calculate(e,c)},calculate:function(t,e){if(!this.enabled)return k;var i,o,n=this,r=this.qtip.elements,a=this.element,h=this.options.offset,l=(r.tooltip.hasClass("ui-widget"),{});return t=tthis.corner,i=t.precedance,e=ethis._calculateSize(t),o=[t.x,t.y],i===S&&o.reverse(),s.each(o,function(s,o){var a,c,d;o===N?(a=i===L?F:D,l[a]="50%",l[ce+"-"+a]=-Math.round(e[i===L?0:1]/2)+h):(a=n._parseWidth(t,o,r.tooltip),c=n._parseWidth(t,o,r.content),d=n._parseRadius(t),l[o]=Math.max(-n.border,s?c:h+(d>a?d:-a)))
}),l[t[i]]-=e[i===S?0:1],a.css({margin:"",top:"",bottom:"",left:"",right:""}).css(l),l},reposition:function(t,e,s){function o(t,e,i,s,o){t===V&&l.precedance===e&&c[s]&&l[i]!==N?l.precedance=l.precedance===S?L:S:t!==V&&c[s]&&(l[e]=l[e]===N?c[s]>0?s:o:l[e]===s?o:s)}function n(t,e,o){l[t]===N?g[ce+"-"+e]=f[t]=r[ce+"-"+e]-c[e]:(a=r[o]!==i?[c[e],-r[e]]:[-c[e],r[e]],(f[t]=Math.max(a[0],a[1]))>a[0]&&(s[e]-=c[e],f[e]=k),g[r[o]!==i?o:e]=f[t])}if(this.enabled){var r,a,h=e.cache,l=this.corner.clone(),c=s.adjusted,d=e.options.position.adjust.method.split(" "),p=d[0],u=d[1]d[0],f={left:k,top:k,x:0,y:0},g={};this.corner.fixed!==W&&(o(p,S,L,F,P),o(u,L,S,D,O),l.string()===h.corner.string()h.cornerTop===c.top&&h.cornerLeft===c.leftthis.update(l,k)),r=this.calculate(l),r.right!==i&&(r.left=-r.right),r.bottom!==i&&(r.top=-r.bottom),r.user=this.offset,(f.left=p===V&&!!c.left)&&n(S,F,P),(f.top=u===V&&!!c.top)&&n(L,D,O),this.element.css(g).toggle(!(f.x&&f.yl.x===N&&f.yl.y===N&&f.x)),s.left-=r.left.charAt?r.user:p!==Vf.top!f.left&&!f.top?r.left+this.border:0,s.top-=r.top.charAt?r.user:u!==Vf.left!f.left&&!f.top?r.top+this.border:0,h.cornerLeft=c.left,h.cornerTop=c.top,h.corner=l.clone()}},destroy:function(){this.qtip._unbind(this.qtip.tooltip,this._ns),this.qtip.elements.tip&&this.qtip.elements.tip.find("*").remove().end().remove()}}),le=R.tip=function(t){return new x(t,t.options.style.tip)},le.initialize="render",le.sanitize=function(t){if(t.style&&"tip"in t.style){var e=t.style.tip;"object"!=typeof e&&(e=t.style.tip={corner:e}),/stringboolean/i.test(typeof e.corner)(e.corner=W)}},M.tip={"^position.mystyle.tip.(cornermimicborder)$":function(){this.create(),this.qtip.reposition()},"^style.tip.(heightwidth)$":function(t){this.size=[t.width,t.height],this.update(),this.qtip.reposition()},"^content.titlestyle.(classeswidget)$":function(){this.update()}},s.extend(W,T.defaults,{style:{tip:{corner:W,mimic:k,width:6,height:6,border:W,offset:0}}});var Ce,Te,je="qtip-modal",ze="."+je;Te=function(){function t(t){if(s.expr[":"].focusable)return s.expr[":"].focusable;var e,i,o,n=!isNaN(s.attr(t,"tabindex")),r=t.nodeName&&t.nodeName.toLowerCase();return"area"===r?(e=t.parentNode,i=e.name,t.href&&i&&"map"===e.nodeName.toLowerCase()?(o=s("img[usemap=#"+i+"]")[0],!!o&&o.is(":visible")):!1):/inputselecttextareabuttonobject/.test(r)?!t.disabled:"a"===r?t.hrefn:n}function i(t){1>c.length&&t.length?t.not("body").blur():c.first().focus()}function o(t){if(h.is(":visible")){var e,o=s(t.target),a=n.tooltip,l=o.closest(U);e=1>l.length?k:parseInt(l[0].style.zIndex,10)>parseInt(a[0].style.zIndex,10),eo.closest(U)[0]===a[0]i(o),r=t.target===c[c.length-1]}}var n,r,a,h,l=this,c={};s.extend(l,{init:function(){return h=l.elem=s("<div />",{id:"qtip-overlay",html:"<div></div>",mousedown:function(){return k}}).hide(),s(e.body).bind("focusin"+ze,o),s(e).bind("keydown"+ze,function(t){n&&n.options.show.modal.escape&&27===t.keyCode&&n.hide(t)}),h.bind("click"+ze,function(t){n&&n.options.show.modal.blur&&n.hide(t)}),l},update:function(e){n=e,c=e.options.show.modal.stealfocus!==k?e.tooltip.find("*").filter(function(){return t(this)}):[]},toggle:function(t,o,r){var c=(s(e.body),t.tooltip),d=t.options.show.modal,p=d.effect,u=o?"show":"hide",f=h.is(":visible"),g=s(ze).filter(":visible:not(:animated)").not(c);return l.update(t),o&&d.stealfocus!==k&&i(s(":focus")),h.toggleClass("blurs",d.blur),o&&h.appendTo(e.body),h.is(":animated")&&f===o&&a!==k!o&&g.length?l:(h.stop(W,k),s.isFunction(p)?p.call(h,o):p===k?h[u]():h.fadeTo(parseInt(r,10)90,o?1:0,function(){oh.hide()}),oh.queue(function(t){h.css({left:"",top:""}),s(ze).lengthh.detach(),t()}),a=o,n.destroyed&&(n=E),l)}}),l.init()},Te=new Te,s.extend(q.prototype,{init:function(t){var e=t.tooltip;return this.options.on?(t.elements.overlay=Te.elem,e.addClass(je).css("z-index",T.modal_zindex+s(ze).length),t._bind(e,["tooltipshow","tooltiphide"],function(t,i,o){var n=t.originalEvent;if(t.target===e[0])if(n&&"tooltiphide"===t.type&&/mouse(leaveenter)/.test(n.type)&&s(n.relatedTarget).closest(Te.elem[0]).length)try{t.preventDefault()}catch(r){}else(!nn&&"tooltipsolo"!==n.type)&&this.toggle(t,"tooltipshow"===t.type,o)},this._ns,this),t._bind(e,"tooltipfocus",function(t,i){if(!t.isDefaultPrevented()&&t.target===e[0]){var o=s(ze),n=T.modal_zindex+o.length,r=parseInt(e[0].style.zIndex,10);Te.elem[0].style.zIndex=n-1,o.each(function(){this.style.zIndex>r&&(this.style.zIndex-=1)}),o.filter("."+Z).qtip("blur",t.originalEvent),e.addClass(Z)[0].style.zIndex=n,Te.update(i);try{t.preventDefault()}catch(a){}}},this._ns,this),t._bind(e,"tooltiphide",function(t){t.target===e[0]&&s(ze).filter(":visible").not(e).last().qtip("focus",t)},this._ns,this),i):this},toggle:function(t,e,s){return t&&t.isDefaultPrevented()?this:(Te.toggle(this.qtip,!!e,s),i)},destroy:function(){this.qtip.tooltip.removeClass(je),this.qtip._unbind(this.qtip.tooltip,this._ns),Te.toggle(this.qtip,k),delete this.qtip.elements.overlay}}),Ce=R.modal=function(t){return new q(t,t.options.show.modal)},Ce.sanitize=function(t){t.show&&("object"!=typeof t.show.modal?t.show.modal={on:!!t.show.modal}:t.show.modal.on===i&&(t.show.modal.on=W))},T.modal_zindex=T.zindex-200,Ce.initialize="render",M.modal={"^show.modal.(onblur)$":function(){this.destroy(),this.init(),this.qtip.elems.overlay.toggle(this.qtip.tooltip[0].offsetWidth>0)}},s.extend(W,T.defaults,{show:{modal:{on:k,effect:W,blur:W,stealfocus:W,escape:W}}}),R.viewport=function(i,s,o,n,r,a,h){function l(t,e,i,o,n,r,a,h,l){var c=s[n],p=_[t],b=x[t],w=i===V,q=p===n?l:p===r?-l:-l/2,C=b===n?h:b===r?-h:-h/2,T=v[n]+y[n]-(f?0:u[n]),j=T-c,z=c+l-(a===A?g:m)-T,M=q-(_.precedance===tp===_[e]?C:0)-(b===N?h/2:0);return w?(M=(p===n?1:-1)*q,s[n]+=j>0?j:z>0?-z:0,s[n]=Math.max(-u[n]+y[n],c-M,Math.min(Math.max(-u[n]+y[n]+(a===A?g:m),c+M),s[n],"center"===p?c-q:1e9))):(o*=i===$?2:0,j>0&&(p!==nz>0)?(s[n]-=M+o,d.invert(t,n)):z>0&&(p!==rj>0)&&(s[n]-=(p===N?-M:M)+o,d.invert(t,r)),v>s[n]&&-s[n]>z&&(s[n]=c,d=_.clone())),s[n]-c}var c,d,p,u,f,g,m,v,y,b=o.target,w=i.elements.tooltip,_=o.my,x=o.at,q=o.adjust,C=q.method.split(" "),T=C[0],j=C[1]C[0],z=o.viewport,M=o.container,I=i.cache,W={left:0,top:0};return z.jquery&&b[0]!==t&&b[0]!==e.body&&"none"!==q.method?(u=M.offset()W,f="static"===M.css("position"),c="fixed"===w.css("position"),g=z[0]===t?z.width():z.outerWidth(k),m=z[0]===t?z.height():z.outerHeight(k),v={left:c?0:z.scrollLeft(),top:c?0:z.scrollTop()},y=z.offset()W,("shift"!==T"shift"!==j)&&(d=_.clone()),W={left:"none"!==T?l(S,L,T,q.x,F,P,A,n,a):0,top:"none"!==j?l(L,S,j,q.y,D,O,B,r,h):0},d&&I.lastClass!==(p=X+"-pos-"+d.abbrev())&&w.removeClass(i.cache.lastClass).addClass(i.cache.lastClass=p),W):W},R.polys={polygon:function(t,e){var i,s,o,n={width:0,height:0,position:{top:1e10,right:0,bottom:0,left:1e10},adjustable:k},r=0,a=[],h=1,l=1,c=0,d=0;for(r=t.length;r--;)i=[parseInt(t[--r],10),parseInt(t[r+1],10)],i[0]>n.position.right&&(n.position.right=i[0]),i[0]<n.position.left&&(n.position.left=i[0]),i[1]>n.position.bottom&&(n.position.bottom=i[1]),i[1]<n.position.top&&(n.position.top=i[1]),a.push(i);if(s=n.width=Math.abs(n.position.right-n.position.left),o=n.height=Math.abs(n.position.bottom-n.position.top),"c"===e.abbrev())n.position={left:n.position.left+n.width/2,top:n.position.top+n.height/2};else{for(;s>0&&o>0&&h>0&&l>0;)for(s=Math.floor(s/2),o=Math.floor(o/2),e.x===F?h=s:e.x===P?h=n.width-s:h+=Math.floor(s/2),e.y===D?l=o:e.y===O?l=n.height-o:l+=Math.floor(o/2),r=a.length;r--&&!(2>a.length);)c=a[r][0]-n.position.left,d=a[r][1]-n.position.top,(e.x===F&&c>=he.x===P&&h>=ce.x===N&&(h>cc>n.width-h)e.y===D&&d>=le.y===O&&l>=de.y===N&&(l>dd>n.height-l))&&a.splice(r,1);n.position={left:a[0][0],top:a[0][1]}}return n},rect:function(t,e,i,s){return{width:Math.abs(i-t),height:Math.abs(s-e),position:{left:Math.min(t,i),top:Math.min(e,s)}}},_angles:{tc:1.5,tr:7/4,tl:5/4,bc:.5,br:.25,bl:.75,rc:2,lc:1,c:0},ellipse:function(t,e,i,s,o){var n=R.polys._angles[o.abbrev()],r=0===n?0:i*Math.cos(n*Math.PI),a=s*Math.sin(n*Math.PI);return{width:2*i-Math.abs(r),height:2*s-Math.abs(a),position:{left:t+r,top:e+a},adjustable:k}},circle:function(t,e,i,s){return R.polys.ellipse(t,e,i,i,s)}},R.svg=function(t,i,o){for(var n,r,a,h,l,c,d,p,u,f,g,m=s(e),v=i[0],y=s(v.ownerSVGElement),b=1,w=1,_=!0;!v.getBBox;)v=v.parentNode;if(!v.getBBox!v.parentNode)return k;n=y.attr("width")y.width()parseInt(y.css("width"),10),r=y.attr("height")y.height()parseInt(y.css("height"),10);var x=(parseInt(i.css("stroke-width"),10)0)/2;switch(x&&(b+=x/n,w+=x/r),v.nodeName){case"ellipse":case"circle":f=R.polys.ellipse(v.cx.baseVal.value,v.cy.baseVal.value,(v.rxv.r).baseVal.value+x,(v.ryv.r).baseVal.value+x,o);break;case"line":case"polygon":case"polyline":for(u=v.points[{x:v.x1.baseVal.value,y:v.y1.baseVal.value},{x:v.x2.baseVal.value,y:v.y2.baseVal.value}],f=[],p=-1,c=u.numberOfItemsu.length;c>++p;)d=u.getItem?u.getItem(p):u[p],f.push.apply(f,[d.x,d.y]);f=R.polys.polygon(f,o);break;default:f=v.getBoundingClientRect(),f={width:f.width,height:f.height,position:{left:f.left,top:f.top}},_=!1}return g=f.position,y=y[0],_&&(y.createSVGPoint&&(a=v.getScreenCTM(),u=y.createSVGPoint(),u.x=g.left,u.y=g.top,h=u.matrixTransform(a),g.left=h.x,g.top=h.y),y.viewBox&&(l=y.viewBox.baseVal)&&l.width&&l.height&&(b*=n/l.width,w*=r/l.height)),g.left+=m.scrollLeft(),g.top+=m.scrollTop(),f},R.imagemap=function(t,e,i){e.jquery(e=s(e));var o,n,r,a,h,l=e.attr("shape").toLowerCase().replace("poly","polygon"),c=s('img[usemap="#'+e.parent("map").attr("name")+'"]'),d=s.trim(e.attr("coords")),p=d.replace(/,$/,"").split(",");if(!c.length)return k;if("polygon"===l)a=R.polys.polygon(p,i);else{if(!R.polys[l])return k;for(r=-1,h=p.length,n=[];h>++r;)n.push(parseInt(p[r],10));a=R.polys[l].apply(this,n.concat(i))}return o=c.offset(),o.left+=Math.ceil((c.outerWidth(k)-c.width())/2),o.top+=Math.ceil((c.outerHeight(k)-c.height())/2),a.position.left+=o.left,a.position.top+=o.top,a};var Me,Ie='<iframe class="qtip-bgiframe" frameborder="0" tabindex="-1" src="javascript:\'\';"  style="display:block; position:absolute; z-index:-1; filter:alpha(opacity=0); -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";"></iframe>';s.extend(C.prototype,{_scroll:function(){var e=this.qtip.elements.overlay;e&&(e[0].style.top=s(t).scrollTop()+"px")},init:function(i){var o=i.tooltip;1>s("select, object").length&&(this.bgiframe=i.elements.bgiframe=s(Ie).appendTo(o),i._bind(o,"tooltipmove",this.adjustBGIFrame,this._ns,this)),this.redrawContainer=s("<div/>",{id:X+"-rcontainer"}).appendTo(e.body),i.elements.overlay&&i.elements.overlay.addClass("qtipmodal-ie6fix")&&(i._bind(t,["scroll","resize"],this._scroll,this._ns,this),i._bind(o,["tooltipshow"],this._scroll,this._ns,this)),this.redraw()},adjustBGIFrame:function(){var t,e,i=this.qtip.tooltip,s={height:i.outerHeight(k),width:i.outerWidth(k)},o=this.qtip.plugins.tip,n=this.qtip.elements.tip;e=parseInt(i.css("borderLeftWidth"),10)0,e={left:-e,top:-e},o&&n&&(t="x"===o.corner.precedance?[A,F]:[B,D],e[t[1]]-=n[t[0]]()),this.bgiframe.css(e).css(s)},redraw:function(){if(1>this.qtip.renderedthis.drawing)return this;var t,e,i,s,o=this.qtip.tooltip,n=this.qtip.options.style,r=this.qtip.options.position.container;return this.qtip.drawing=1,n.height&&o.css(B,n.height),n.width?o.css(A,n.width):(o.css(A,"").appendTo(this.redrawContainer),e=o.width(),1>e%2&&(e+=1),i=o.css("maxWidth")"",s=o.css("minWidth")"",t=(i+s).indexOf("%")>-1?r.width()/100:0,i=(i.indexOf("%")>-1?t:1)*parseInt(i,10)e,s=(s.indexOf("%")>-1?t:1)*parseInt(s,10)0,e=i+s?Math.min(Math.max(e,s),i):e,o.css(A,Math.round(e)).appendTo(r)),this.drawing=0,this},destroy:function(){this.bgiframe&&this.bgiframe.remove(),this.qtip._unbind([t,this.qtip.tooltip],this._ns)}}),Me=R.ie6=function(t){return 6===oe.ie?new C(t):k},Me.initialize="render",M.ie6={"^contentstyle$":function(){this.redraw()}}})})(window,document);
//@ sourceMappingURL=http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/jquery.qtip.min.map
$(function(){
	$.cookie.json = true;
	//var current_position = $.cookie('current_position');
	/*
	if (typeof(current_position) == 'undefined') {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {latitude: position.coords.latitude, longitude: position.coords.longitude};
				$.cookie('current_position', pos, { expires: 1, domain: '.' + default_domain, path: '/'});
				}, function() {
					$.cookie('current_position', {}, { expires: 1, domain: '.' + default_domain, path: '/'});
			});
		}
		else {
			$.cookie('current_position', {}, { expires: 1, domain: '.' + default_domain, path: '/'});
		}
	}
	*/
	$('.has-qtip').each(function() {
		var options = {
			content: {
				text: $(this).data('title')
			}
		}, position_my = null, position_at = null, my = $(this).data('my'), at = $(this).data('at'), delay = $(this).data('delay');
		if (typeof(my) != 'undefined') {
			position_my = my;
		}
		if (typeof(at) != 'undefined') {
			position_at = at;
		}
		if (typeof(delay) == 'undefined') {
			delay = null;
		}
		if (position_my != null  position_at != null) {
			if (position_my != null) {
				options['position'] = {my: position_my};
			}
			if (position_at != null) {
				if (typeof(options['position']) != 'undefined') {
					options['position']['at'] = position_at;
				}
				else {
					options['position'] = {at: position_at};
				}
			}
		}
		if (delay != null) {
			options['hide'] = {
				fixed: true,
				delay: delay
			};
		}
		$(this).qtip(options);
	});
	bindPopup();
	$.datepicker.regional['en'] = {
		closeText: 'Done',
		prevText: 'Prev',
		nextText: 'Next',
		currentText: 'Today',
		monthNames: ['January','February','March','April','May','June',
		'July','August','September','October','November','December'],
		monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
		'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
		dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
		weekHeader: 'Wk',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.regional['ru'] = {
		closeText: 'Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ',
		prevText: '&#x3c;ÐŸÑ€ÐµÐ´',
		nextText: 'Ð¡Ð»ÐµÐ´&#x3e;',
		currentText: 'Ð¡ÐµÐ³Ð¾Ð´Ð½Ñ',
		monthNames: ['Ð¯Ð½Ð²Ð°Ñ€ÑŒ','Ð¤ÐµÐ²Ñ€Ð°Ð»ÑŒ','ÐœÐ°Ñ€Ñ‚','ÐÐ¿Ñ€ÐµÐ»ÑŒ','ÐœÐ°Ð¹','Ð˜ÑŽÐ½ÑŒ',
		'Ð˜ÑŽÐ»ÑŒ','ÐÐ²Ð³ÑƒÑÑ‚','Ð¡ÐµÐ½Ñ‚ÑÐ±Ñ€ÑŒ','ÐžÐºÑ‚ÑÐ±Ñ€ÑŒ','ÐÐ¾ÑÐ±Ñ€ÑŒ','Ð”ÐµÐºÐ°Ð±Ñ€ÑŒ'],
		monthNamesShort: ['Ð¯Ð½Ð²','Ð¤ÐµÐ²','ÐœÐ°Ñ€','ÐÐ¿Ñ€','ÐœÐ°Ð¹','Ð˜ÑŽÐ½',
		'Ð˜ÑŽÐ»','ÐÐ²Ð³','Ð¡ÐµÐ½','ÐžÐºÑ‚','ÐÐ¾Ñ','Ð”ÐµÐº'],
		dayNames: ['Ð²Ð¾ÑÐºÑ€ÐµÑÐµÐ½ÑŒÐµ','Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»ÑŒÐ½Ð¸Ðº','Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº','ÑÑ€ÐµÐ´Ð°','Ñ‡ÐµÑ‚Ð²ÐµÑ€Ð³','Ð¿ÑÑ‚Ð½Ð¸Ñ†Ð°','ÑÑƒÐ±Ð±Ð¾Ñ‚Ð°'],
		dayNamesShort: ['Ð²ÑÐº','Ð¿Ð½Ð´','Ð²Ñ‚Ñ€','ÑÑ€Ð´','Ñ‡Ñ‚Ð²','Ð¿Ñ‚Ð½','ÑÐ±Ñ‚'],
		dayNamesMin: ['Ð’Ñ','ÐŸÐ½','Ð’Ñ‚','Ð¡Ñ€','Ð§Ñ‚','ÐŸÑ‚','Ð¡Ð±'],
		weekHeader: 'ÐÐµ',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.regional['ge'] = {
		closeText: 'Done',
		prevText: 'Prev',
		nextText: 'Next',
		currentText: 'Today',
		monthNames: ['January','February','March','April','May','June',
		'July','August','September','October','November','December'],
		monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
		'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
		dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
		weekHeader: 'Wk',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$(window).scroll(function() {
		nav_fixed();
	});
	nav_fixed();
});
function nav_fixed() {
	if ($(window).scrollTop() >= 90) {
		$('body').addClass('nav-fixed');
	}
	else {
		$('body').removeClass('nav-fixed');
	}
}
function find_nearest(type) {
	var w = $('body').width();
	if (w <= 758) {
		var action = $('#filter_' + type).attr('action');
		action = action.replace(/#ads/, '');
		$('#filter_' + type).attr('action', action + '#ads');
	}
	$('body').addClass('cursor-progress');
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			function(position) {
				var pos = {latitude: position.coords.latitude, longitude: position.coords.longitude};
				$.cookie('current_position', pos, { expires: 1, domain: '.' + default_domain, path: '/'});
				$('#FilterAdMode').val('map');
				$('#FilterAdNearest').val(1);
				$('#filter_' + type).submit();
			}, function() {
				$.cookie('current_position', {}, { expires: 1, domain: '.' + default_domain, path: '/'});
				$('#FilterAdMode').val('map');
				$('#FilterAdNearest').val(1);
				$('#filter_' + type).submit();
			},
			{
				enableHighAccuracy: true,
				timeout: 5000,
				maximumAge: 0
			}
		);
	}
	else {
		$.cookie('current_position', {}, { expires: 1, domain: '.' + default_domain, path: '/'});
		$('#FilterAdMode').val('map');
		$('#FilterAdNearest').val(1);
		$('#filter_' + type).submit();
	}
}
function bindPopup() {
	$('.popup').unbind();
	$('.popup').click(function(){
		if ($(window).width() > 950  $(this).hasClass('always-popup')) {
			$.colorbox({
				href:$(this).attr('href'),
				onComplete:function(){
					bindPopup();
					$.colorbox.resize();
				},
				onOpen: function(){
					$('object').css('visibility','hidden');
				},
				onClosed: function(){
					$('object').css('visibility','visible');
				}
			});
			return false;
		}
	});
}
function openPopup(link) {
	console.log('AAAAAA');
	if ($(window).width() > 950) {
		$.colorbox.resize();

		$.colorbox({
			href: link,
			fixed:true
		});
	}
	else {
		$.colorbox.resize();
		window.location = link;
	}
}
function getLatitude(key) {
	return $('#' + key + 'Latitude').val();
}
function getLongitude(key) {
	return $('#' + key + 'Longitude').val();
}
function getZoom(key) {
	return $('#' + key + 'Zoom').val();
}
function setLatitude(key, val) {
	$('#' + key + 'Latitude').val(val);
}
function setLongitude(key, val) {
	$('#' + key + 'Longitude').val(val);
}
function setZoom(key, val) {
	$('#' + key + 'Zoom').val(val);
}
function setMap(key, val) {
	$('#' + key + 'Map').val(val);
}
function getMap(key) {
	return parseInt($('#' + key + 'Map').val());
}
function setMapInfo(key) {
	$('#map-info').html(getLatitudeStr($('#' + key + 'Latitude').val()) + '<br />' + getLongitudeStr($('#' + key + 'Longitude').val()));
	handler_map();
	bindPopup();
}
function getAddress(key) {
	var parts = new Array(), city_id = parseInt($('#' + key + 'CityId').val()), street_id = parseInt($('#' + key + 'StreetId').val()), street_text = $('#' + key + 'ParamsStreetText').val(), house_number = $('#' + key + 'ParamsHouseNumber').val(), map_string = $('#' + key + 'MapString').val();
	if (map_string != '') {
		return map_string;
	}
	else {
		if (house_number != '') {
			parts[parts.length] = house_number;
		}
		if ($('#' + key + 'ParamsAnotherStreet').prop('checked')) {
			if (street_text != '') {
				parts[parts.length] = street_text;
			}
		}
		else if (street_id > 0) {
			parts[parts.length] = ln['streets'][street_id];
		}
		if (city_id > 0) {
			parts[parts.length] = ln['cities'][city_id];
		}
		parts[parts.length] = 'Georgia';
		return parts.join(',');
	}
}
function delMapInfo(key) {
	setLatitude(key, map.latitude);
	setLongitude(key, map.longitude);
	setZoom(key, map.zoom);
	setMap(key, 0);
	$('#map-info').html('');
	handler_map();
	bindPopup();
}
function getLatitudeStr(ddd) {
	var dd, mm, ss, tmp = tt.latitude_north;
	if (ddd < 0) tmp = tt.latitude_south;
	dd = Math.floor(ddd);
	mm = Math.floor((ddd - dd) * 60);
	ss = number_format(((ddd - dd) * 60 - mm) * 60, 2, '.', '');
	return sprintf(tmp, [dd, mm, ss]);
}
function getLongitudeStr(ddd) {
	var dd, mm, ss, tmp = tt.longitude_east;
	if (ddd < 0) tmp = tt.longitude_west;
	dd = Math.floor(ddd);
	mm = Math.floor((ddd - dd) * 60);
	ss = number_format(((ddd - dd) * 60 - mm) * 60, 2, '.', '');
	return sprintf(tmp, [dd, mm, ss]);
}
function number_format(number, decimals, dec_point, thousands_sep) {
	var n = !isFinite(+number) ? 0 : +number, 
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1]  '').length < prec) {
		s[1] = s[1]  '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}
function sprintf(str, arg){
	var arg = arg  [];
	var re = /%s/;
	for (var i=0; i<arg.length; i++) {
		str = str.replace(re, arg[i]);
	}
	return str;
}
function h(string, quote_style, charset, double_encode) {
	var optTemp = 0, i = 0, noquotes= false;
	if (typeof quote_style === 'undefined'  quote_style === null) {
		quote_style = 2;
	}
	string = string.toString();
	if (double_encode !== false) {
		string = string.replace(/&/g, '&amp;');
	}
	string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');
	var OPTS = {
		'ENT_NOQUOTES': 0,
		'ENT_HTML_QUOTE_SINGLE' : 1,
		'ENT_HTML_QUOTE_DOUBLE' : 2,
		'ENT_COMPAT': 2,
		'ENT_QUOTES': 3,
		'ENT_IGNORE' : 4
	};
	if (quote_style === 0) {
		noquotes = true;
	}
	if (typeof quote_style !== 'number') {
		quote_style = [].concat(quote_style);
		for (i=0; i < quote_style.length; i++) {
			if (OPTS[quote_style[i]] === 0) {
				noquotes = true;
			}
			else if (OPTS[quote_style[i]]) {
				optTemp = optTemp  OPTS[quote_style[i]];
			}
		}
		quote_style = optTemp;
	}
	if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
		string = string.replace(/'/g, '&#039;');
	}
	if (!noquotes) {
		string = string.replace(/"/g, '&quot;');
	}
	return string;
}
function ending(num, w1, w2, w3) {
	if (num.toString().search('/\./') > -1) {
		return w3
	}
	code = num - Math.floor(num / 10) * 10;
	nums = ' ' + num;
	nums = nums.substring(nums.length - 2, 2);
	num = parseInt(nums);
	if ((num < 11)  (num > 20)) {
		switch (code) {
			case 0:
			case 5:
			case 6:
			case 7:
			case 8:
			case 9:
				return w1;
				break;
			case 1:
				return w2;
				break;
			case 2:
			case 3:
			case 4:
				return w3;
				break;
		}
	}
	else {
		return w1;
	}
}
function trim(str, charlist) {
	var whitespace, l = 0,
		i = 0;
	str += '';
	if (!charlist) {
		whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
	} else {
		charlist += '';
		whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
	}
	l = str.length;
	for (i = 0; i < l; i++) {
		if (whitespace.indexOf(str.charAt(i)) === -1) {
			str = str.substring(i);
			break;
		}
	}
	l = str.length;
	for (i = l - 1; i >= 0; i--) {
		if (whitespace.indexOf(str.charAt(i)) === -1) {
			str = str.substring(0, i + 1);
			break;
		}
	}
	return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}
function reloadCaptcha() {
	var rnd;
	$('.captcha').each(function(){
		rnd = Math.floor(new Date().getTime()/1000)+'_'+Math.floor(Math.random() * 1000);
		$(this).attr('src','/captcha/'+$(this).attr('rel')+'.png?' + rnd);
	});
}
function bnclk(link, bn_id) {
	var img = new Image();
	img.src = '/bnclk/' + bn_id + '.gif';
	return true;
}
function slclk(link, sl_id) {
	var img = new Image();
	img.src = '/slclk/' + sl_id + '.gif';
	$('body').append(img);
	setTimeout('link_redirect(\'' + link + '\')', 200);
}
function link_redirect(link) {
	window.location = link;
}
function swfclk(link, bn_id) {
	var img = new Image();
	img.src = '/bnclk/' + bn_id + '.gif';
	window.open(link);
}



































































