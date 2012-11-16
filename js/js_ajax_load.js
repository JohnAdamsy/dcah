/**
 * @author TAR
 * @Modified September 29th 2012
 * @Description combines the 3 ajax loaded scripts (validation.js, jquery.form.js & global_functions.js)to minimize server slack time
 */

/*---------------------------start of validation.js------------------------------------------------------------------------------------------------------------------*/
// JavaScript Document

/*	$.validator.setDefaults({
	submitHandler: function() { 
	//show some notification on submission
	alert("submitted!"); }

	});*/
$().ready(function(){
    $.validator.addMethod('positiveNumber',
    function (value) { 
        return Number(value) > 0;
    }, 'Value must be > 0');
    
     $.validator.addMethod('zeroAndAbove',
    function (value) { 
        return Number(value) >= 0;
    }, 'Value must be >= 0');
    
    
    //class specific validation rules
     $.validator.addClassRules({
        cloned:{
        required: true
    },
    positive:{
    	positiveNumber:true
    	},
    fromZero:{
    	zeroAndAbove:true
    	}
    });
    
    /*get form id from after ajax request from the user click event*/
   
    //var form_id='#'+$(".form-container").find('form').attr('id');
   // alert('Found: '+form_id);
	/*---------------------------------------start of validation to zinc_ors_inventory form------------------------------------------------------------*/
	$("#zinc_ors_inventory").validate({/*inventory module*/
		rules: {
			facilityDateOfInventory:{required: true},
			facilityName:{required: true},
			facilityContactPerson:{required: true},
			facilityZincOrsDispensedFrom:{required: false},
			facilityDistrict: {required: true},
			facilityCounty: {required: true},
			facilityTelephone:{required:true},
			facilityAltTelephone:{required:true},
			facilityEmail:{required: true,email:true},
			ortQuestion1:{required:true},
			ortQuestion2:{required:true},
			ortDehydrationLocation:{required:true}
		},
		messages: {
			facilityDateOfInventory:{required: "*Required"},
			facilityName:{required: "*Required"},
			facilityContactPerson:{required: "*Required"},
			facilityZincOrsDispensedFrom:{required: "*Required"},
			facilityDistrict: {required:"*Required"},
			facilityCounty: {required: "*Required"},
			facilityTelephone:{required:"*Required"},
			facilityAltTelephone:{required:"*Required"},
			facilityEmail:{required: "*Required",email:"Not a valid email. Valid example: facility_name@dcah.or.ke"},
			ortQuestion1:{required:"*Required"},
			ortQuestion2:{required:"*Required"},
			ortDehydrationLocation:{required:"*Required"}
		}
	}); /*end of zinc_ors_inventory*/
	
	/*---------------------------------------start of validation to form_mnh_assessment form------------------------------------------------------------*/
	$("#form_mnh_assessment").validate({/*inventory module*/
		rules: {
			facilityDateOfInventory:{required: true},
			facilityName:{required: true},
			facilityType:{required:true},
			facilityLevel:{required:true},
			facilityContactPerson:{required: true},
			facilityZincOrsDispensedFrom:{required: false},
			facilityProvince: {required: true},
			facilityOwner: {required: true},
			facilityDistrict: {required: true},
			facilityCounty: {required: true},
			facilityTelephone:{required:true},
			facilityAltTelephone:{required:false},
			facilityEmail:{required: true,email:true},

			'q18equipAType_81[]':{required:true},
			'q6bSkilledProviders[]':{required:true,},

			ortDehydrationLocation:{minlength:1}
		},
		messages: {
			facilityDateOfInventory:{required: "*Required"},
			facilityName:{required: "*Required"},
			facilityType:{required:"*Required"},
			facilityLevel:{required:"*Required"},
			facilityContactPerson:{required: "*Required"},
			facilityProvince: {required: "*Required"},
			facilityOwner: {required: "*Required"},
			facilityDistrict: {required:"*Required"},
			facilityCounty: {required: "*Required"},
			facilityTelephone:{required:"*Required"},
			facilityAltTelephone:{required:"*Required"},
			facilityEmail:{required: "*Required",email:"Not a valid email. Valid example: facility_name@dcah.or.ke"},

			'q18equipAType_81[]':{required:"Select at least 1 type of size"},
			'q6bSkilledProviders[]':{required:"Select at least 1 skilled provider"},

			ortDehydrationLocation:{minlength:"*Required"}
		}
	}); /*end of form_mnh_assessment*/
	
	/*---------------------------------------start of validation to form_mnh_assessment form------------------------------------------------------------*/
	$("#form-verify").validate({/*inventory module*/
		rules: {
			username:{required:true}
		},
		messages:{
			username:{required:"Facility Name Required"}
		}
	});/*end of form-verify validation rules*/
	
	});
/*---------------------------end of validation.js------------------------------------------------------------------------------------------------------------------*/


/*---------------------------start of jquery.form.js------------------------------------------------------------------------------------------------------------------*/
/*!
 * jQuery Form Plugin
 * version: 3.09 (16-APR-2012)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses:
 *    http://malsup.github.com/mit-license.txt
 *    http://malsup.github.com/gpl-license-v2.txt
 */
/*global ActiveXObject alert */
;(function($) {
"use strict";

/*
    Usage Note:
    -----------
    Do not use both ajaxSubmit and ajaxForm on the same form.  These
    functions are mutually exclusive.  Use ajaxSubmit if you want
    to bind your own submit handler to the form.  For example,

    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault(); // <-- important
            $(this).ajaxSubmit({
                target: '#output'
            });
        });
    });

    Use ajaxForm when you want the plugin to manage all the event binding
    for you.  For example,

    $(document).ready(function() {
        $('#myForm').ajaxForm({
            target: '#output'
        });
    });
    
    You can also use ajaxForm with delegation (requires jQuery v1.7+), so the
    form does not have to exist when you invoke ajaxForm:

    $('#myForm').ajaxForm({
        delegation: true,
        target: '#output'
    });
    
    When using ajaxForm, the ajaxSubmit function will be invoked for you
    at the appropriate time.
*/

/**
 * Feature detection
 */
var feature = {};
feature.fileapi = $("<input type='file'/>").get(0).files !== undefined;
feature.formdata = window.FormData !== undefined;

/**
 * ajaxSubmit() provides a mechanism for immediately submitting
 * an HTML form using AJAX.
 */
$.fn.ajaxSubmit = function(options) {
    /*jshint scripturl:true */

    // fast fail if nothing selected (http://dev.jquery.com/ticket/2752)
    if (!this.length) {
        log('ajaxSubmit: skipping submit process - no element selected');
        return this;
    }
    
    var method, action, url, $form = this;

    if (typeof options == 'function') {
        options = { success: options };
    }

    method = this.attr('method');
    action = this.attr('action');
    url = (typeof action === 'string') ? $.trim(action) : '';
    url = url || window.location.href || '';
    if (url) {
        // clean url (don't include hash vaue)
        url = (url.match(/^([^#]+)/)||[])[1];
    }

    options = $.extend(true, {
        url:  url,
        success: $.ajaxSettings.success,
        type: method || 'GET',
        iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'
    }, options);

    // hook for manipulating the form data before it is extracted;
    // convenient for use with rich editors like tinyMCE or FCKEditor
    var veto = {};
    this.trigger('form-pre-serialize', [this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
        return this;
    }

    // provide opportunity to alter form data before it is serialized
    if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSerialize callback');
        return this;
    }

    var traditional = options.traditional;
    if ( traditional === undefined ) {
        traditional = $.ajaxSettings.traditional;
    }
    
    var elements = [];
    var qx, a = this.formToArray(options.semantic, elements);
    if (options.data) {
        options.extraData = options.data;
        qx = $.param(options.data, traditional);
    }

    // give pre-submit callback an opportunity to abort the submit
    if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSubmit callback');
        return this;
    }

    // fire vetoable 'validate' event
    this.trigger('form-submit-validate', [a, this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
        return this;
    }

    var q = $.param(a, traditional);
    if (qx) {
        q = ( q ? (q + '&' + qx) : qx );
    }    
    if (options.type.toUpperCase() == 'GET') {
        options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
        options.data = null;  // data is null for 'get'
    }
    else {
        options.data = q; // data is the query string for 'post'
    }

    var callbacks = [];
    if (options.resetForm) {
        callbacks.push(function() { $form.resetForm(); });
    }
    if (options.clearForm) {
        callbacks.push(function() { $form.clearForm(options.includeHidden); });
    }

    // perform a load on the target only if dataType is not provided
    if (!options.dataType && options.target) {
        var oldSuccess = options.success || function(){};
        callbacks.push(function(data) {
            var fn = options.replaceTarget ? 'replaceWith' : 'html';
            $(options.target)[fn](data).each(oldSuccess, arguments);
        });
    }
    else if (options.success) {
        callbacks.push(options.success);
    }

    options.success = function(data, status, xhr) { // jQuery 1.4+ passes xhr as 3rd arg
        var context = options.context || options;    // jQuery 1.4+ supports scope context 
        for (var i=0, max=callbacks.length; i < max; i++) {
            callbacks[i].apply(context, [data, status, xhr || $form, $form]);
        }
    };

    // are there files to upload?
    var fileInputs = $('input:file:enabled[value]', this); // [value] (issue #113)
    var hasFileInputs = fileInputs.length > 0;
    var mp = 'multipart/form-data';
    var multipart = ($form.attr('enctype') == mp || $form.attr('encoding') == mp);

    var fileAPI = feature.fileapi && feature.formdata;
    log("fileAPI :" + fileAPI);
    var shouldUseFrame = (hasFileInputs || multipart) && !fileAPI;

    // options.iframe allows user to force iframe mode
    // 06-NOV-09: now defaulting to iframe mode if file input is detected
    if (options.iframe !== false && (options.iframe || shouldUseFrame)) {
        // hack to fix Safari hang (thanks to Tim Molendijk for this)
        // see:  http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
        if (options.closeKeepAlive) {
            $.get(options.closeKeepAlive, function() {
                fileUploadIframe(a);
            });
        }
          else {
            fileUploadIframe(a);
          }
    }
    else if ((hasFileInputs || multipart) && fileAPI) {
        fileUploadXhr(a);
    }
    else {
        $.ajax(options);
    }

    // clear element array
    for (var k=0; k < elements.length; k++)
        elements[k] = null;

    // fire 'notify' event
    this.trigger('form-submit-notify', [this, options]);
    return this;

     // XMLHttpRequest Level 2 file uploads (big hat tip to francois2metz)
    function fileUploadXhr(a) {
        var formdata = new FormData();

        for (var i=0; i < a.length; i++) {
            formdata.append(a[i].name, a[i].value);
        }

        if (options.extraData) {
            for (var p in options.extraData)
                if (options.extraData.hasOwnProperty(p))
                    formdata.append(p, options.extraData[p]);
        }

        options.data = null;

        var s = $.extend(true, {}, $.ajaxSettings, options, {
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST'
        });
        
        if (options.uploadProgress) {
            // workaround because jqXHR does not expose upload property
            s.xhr = function() {
                var xhr = jQuery.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.onprogress = function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position; /*event.position is deprecated*/
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        options.uploadProgress(event, position, total, percent);
                    };
                }
                return xhr;
            };
        }

        s.data = null;
          var beforeSend = s.beforeSend;
          s.beforeSend = function(xhr, o) {
              o.data = formdata;
            if(beforeSend)
                beforeSend.call(o, xhr, options);
        };
        $.ajax(s);
    }

    // private function for handling file uploads (hat tip to YAHOO!)
    function fileUploadIframe(a) {
        var form = $form[0], el, i, s, g, id, $io, io, xhr, sub, n, timedOut, timeoutHandle;
        var useProp = !!$.fn.prop;

        if ($(':input[name=submit],:input[id=submit]', form).length) {
            // if there is an input with a name or id of 'submit' then we won't be
            // able to invoke the submit fn on the form (at least not x-browser)
            alert('Error: Form elements must not have name or id of "submit".');
            return;
        }
        
        if (a) {
            // ensure that every serialized input is still enabled
            for (i=0; i < elements.length; i++) {
                el = $(elements[i]);
                if ( useProp )
                    el.prop('disabled', false);
                else
                    el.removeAttr('disabled');
            }
        }

        s = $.extend(true, {}, $.ajaxSettings, options);
        s.context = s.context || s;
        id = 'jqFormIO' + (new Date().getTime());
        if (s.iframeTarget) {
            $io = $(s.iframeTarget);
            n = $io.attr('name');
            if (!n)
                 $io.attr('name', id);
            else
                id = n;
        }
        else {
            $io = $('<iframe name="' + id + '" src="'+ s.iframeSrc +'" />');
            $io.css({ position: 'absolute', top: '-1000px', left: '-1000px' });
        }
        io = $io[0];


        xhr = { // mock object
            aborted: 0,
            responseText: null,
            responseXML: null,
            status: 0,
            statusText: 'n/a',
            getAllResponseHeaders: function() {},
            getResponseHeader: function() {},
            setRequestHeader: function() {},
            abort: function(status) {
                var e = (status === 'timeout' ? 'timeout' : 'aborted');
                log('aborting upload... ' + e);
                this.aborted = 1;
                $io.attr('src', s.iframeSrc); // abort op in progress
                xhr.error = e;
                if (s.error)
                    s.error.call(s.context, xhr, e, status);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, e]);
                if (s.complete)
                    s.complete.call(s.context, xhr, e);
            }
        };

        g = s.global;
        // trigger ajax global events so that activity/block indicators work like normal
        if (g && 0 === $.active++) {
            $.event.trigger("ajaxStart");
        }
        if (g) {
            $.event.trigger("ajaxSend", [xhr, s]);
        }

        if (s.beforeSend && s.beforeSend.call(s.context, xhr, s) === false) {
            if (s.global) {
                $.active--;
            }
            return;
        }
        if (xhr.aborted) {
            return;
        }

        // add submitting element to data if we know it
        sub = form.clk;
        if (sub) {
            n = sub.name;
            if (n && !sub.disabled) {
                s.extraData = s.extraData || {};
                s.extraData[n] = sub.value;
                if (sub.type == "image") {
                    s.extraData[n+'.x'] = form.clk_x;
                    s.extraData[n+'.y'] = form.clk_y;
                }
            }
        }
        
        var CLIENT_TIMEOUT_ABORT = 1;
        var SERVER_ABORT = 2;

        function getDoc(frame) {
            var doc = frame.contentWindow ? frame.contentWindow.document : frame.contentDocument ? frame.contentDocument : frame.document;
            return doc;
        }
        
        // Rails CSRF hack (thanks to Yvan Barthelemy)
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var csrf_param = $('meta[name=csrf-param]').attr('content');
        if (csrf_param && csrf_token) {
            s.extraData = s.extraData || {};
            s.extraData[csrf_param] = csrf_token;
        }

        // take a breath so that pending repaints get some cpu time before the upload starts
        function doSubmit() {
            // make sure form attrs are set
            var t = $form.attr('target'), a = $form.attr('action');

            // update form attrs in IE friendly way
            form.setAttribute('target',id);
            if (!method) {
                form.setAttribute('method', 'POST');
            }
            if (a != s.url) {
                form.setAttribute('action', s.url);
            }

            // ie borks in some cases when setting encoding
            if (! s.skipEncodingOverride && (!method || /post/i.test(method))) {
                $form.attr({
                    encoding: 'multipart/form-data',
                    enctype:  'multipart/form-data'
                });
            }

            // support timout
            if (s.timeout) {
                timeoutHandle = setTimeout(function() { timedOut = true; cb(CLIENT_TIMEOUT_ABORT); }, s.timeout);
            }
            
            // look for server aborts
            function checkState() {
                try {
                    var state = getDoc(io).readyState;
                    log('state = ' + state);
                    if (state && state.toLowerCase() == 'uninitialized')
                        setTimeout(checkState,50);
                }
                catch(e) {
                    log('Server abort: ' , e, ' (', e.name, ')');
                    cb(SERVER_ABORT);
                    if (timeoutHandle)
                        clearTimeout(timeoutHandle);
                    timeoutHandle = undefined;
                }
            }

            // add "extra" data to form if provided in options
            var extraInputs = [];
            try {
                if (s.extraData) {
                    for (var n in s.extraData) {
                        if (s.extraData.hasOwnProperty(n)) {
                            extraInputs.push(
                                $('<input type="hidden" name="'+n+'">').attr('value',s.extraData[n])
                                    .appendTo(form)[0]);
                        }
                    }
                }

                if (!s.iframeTarget) {
                    // add iframe to doc and submit the form
                    $io.appendTo('body');
                    if (io.attachEvent)
                        io.attachEvent('onload', cb);
                    else
                        io.addEventListener('load', cb, false);
                }
                setTimeout(checkState,15);
                form.submit();
            }
            finally {
                // reset attrs and remove "extra" input elements
                form.setAttribute('action',a);
                if(t) {
                    form.setAttribute('target', t);
                } else {
                    $form.removeAttr('target');
                }
                $(extraInputs).remove();
            }
        }

        if (s.forceSync) {
            doSubmit();
        }
        else {
            setTimeout(doSubmit, 10); // this lets dom updates render
        }

        var data, doc, domCheckCount = 50, callbackProcessed;

        function cb(e) {
            if (xhr.aborted || callbackProcessed) {
                return;
            }
            try {
                doc = getDoc(io);
            }
            catch(ex) {
                log('cannot access response document: ', ex);
                e = SERVER_ABORT;
            }
            if (e === CLIENT_TIMEOUT_ABORT && xhr) {
                xhr.abort('timeout');
                return;
            }
            else if (e == SERVER_ABORT && xhr) {
                xhr.abort('server abort');
                return;
            }

            if (!doc || doc.location.href == s.iframeSrc) {
                // response not received yet
                if (!timedOut)
                    return;
            }
            if (io.detachEvent)
                io.detachEvent('onload', cb);
            else    
                io.removeEventListener('load', cb, false);

            var status = 'success', errMsg;
            try {
                if (timedOut) {
                    throw 'timeout';
                }

                var isXml = s.dataType == 'xml' || doc.XMLDocument || $.isXMLDoc(doc);
                log('isXml='+isXml);
                if (!isXml && window.opera && (doc.body === null || !doc.body.innerHTML)) {
                    if (--domCheckCount) {
                        // in some browsers (Opera) the iframe DOM is not always traversable when
                        // the onload callback fires, so we loop a bit to accommodate
                        log('requeing onLoad callback, DOM not available');
                        setTimeout(cb, 250);
                        return;
                    }
                    // let this fall through because server response could be an empty document
                    //log('Could not access iframe DOM after mutiple tries.');
                    //throw 'DOMException: not available';
                }

                //log('response detected');
                var docRoot = doc.body ? doc.body : doc.documentElement;
                xhr.responseText = docRoot ? docRoot.innerHTML : null;
                xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
                if (isXml)
                    s.dataType = 'xml';
                xhr.getResponseHeader = function(header){
                    var headers = {'content-type': s.dataType};
                    return headers[header];
                };
                // support for XHR 'status' & 'statusText' emulation :
                if (docRoot) {
                    xhr.status = Number( docRoot.getAttribute('status') ) || xhr.status;
                    xhr.statusText = docRoot.getAttribute('statusText') || xhr.statusText;
                }

                var dt = (s.dataType || '').toLowerCase();
                var scr = /(json|script|text)/.test(dt);
                if (scr || s.textarea) {
                    // see if user embedded response in textarea
                    var ta = doc.getElementsByTagName('textarea')[0];
                    if (ta) {
                        xhr.responseText = ta.value;
                        // support for XHR 'status' & 'statusText' emulation :
                        xhr.status = Number( ta.getAttribute('status') ) || xhr.status;
                        xhr.statusText = ta.getAttribute('statusText') || xhr.statusText;
                    }
                    else if (scr) {
                        // account for browsers injecting pre around json response
                        var pre = doc.getElementsByTagName('pre')[0];
                        var b = doc.getElementsByTagName('body')[0];
                        if (pre) {
                            xhr.responseText = pre.textContent ? pre.textContent : pre.innerText;
                        }
                        else if (b) {
                            xhr.responseText = b.textContent ? b.textContent : b.innerText;
                        }
                    }
                }
                else if (dt == 'xml' && !xhr.responseXML && xhr.responseText) {
                    xhr.responseXML = toXml(xhr.responseText);
                }

                try {
                    data = httpData(xhr, dt, s);
                }
                catch (e) {
                    status = 'parsererror';
                    xhr.error = errMsg = (e || status);
                }
            }
            catch (e) {
                log('error caught: ',e);
                status = 'error';
                xhr.error = errMsg = (e || status);
            }

            if (xhr.aborted) {
                log('upload aborted');
                status = null;
            }

            if (xhr.status) { // we've set xhr.status
                status = (xhr.status >= 200 && xhr.status < 300 || xhr.status === 304) ? 'success' : 'error';
            }

            // ordering of these callbacks/triggers is odd, but that's how $.ajax does it
            if (status === 'success') {
                if (s.success)
                    s.success.call(s.context, data, 'success', xhr);
                if (g)
                    $.event.trigger("ajaxSuccess", [xhr, s]);
            }
            else if (status) {
                if (errMsg === undefined)
                    errMsg = xhr.statusText;
                if (s.error)
                    s.error.call(s.context, xhr, status, errMsg);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, errMsg]);
            }

            if (g)
                $.event.trigger("ajaxComplete", [xhr, s]);

            if (g && ! --$.active) {
                $.event.trigger("ajaxStop");
            }

            if (s.complete)
                s.complete.call(s.context, xhr, status);

            callbackProcessed = true;
            if (s.timeout)
                clearTimeout(timeoutHandle);

            // clean up
            setTimeout(function() {
                if (!s.iframeTarget)
                    $io.remove();
                xhr.responseXML = null;
            }, 100);
        }

        var toXml = $.parseXML || function(s, doc) { // use parseXML if available (jQuery 1.5+)
            if (window.ActiveXObject) {
                doc = new ActiveXObject('Microsoft.XMLDOM');
                doc.async = 'false';
                doc.loadXML(s);
            }
            else {
                doc = (new DOMParser()).parseFromString(s, 'text/xml');
            }
            return (doc && doc.documentElement && doc.documentElement.nodeName != 'parsererror') ? doc : null;
        };
        var parseJSON = $.parseJSON || function(s) {
            /*jslint evil:true */
            return window['eval']('(' + s + ')');
        };

        var httpData = function( xhr, type, s ) { // mostly lifted from jq1.4.4

            var ct = xhr.getResponseHeader('content-type') || '',
                xml = type === 'xml' || !type && ct.indexOf('xml') >= 0,
                data = xml ? xhr.responseXML : xhr.responseText;

            if (xml && data.documentElement.nodeName === 'parsererror') {
                if ($.error)
                    $.error('parsererror');
            }
            if (s && s.dataFilter) {
                data = s.dataFilter(data, type);
            }
            if (typeof data === 'string') {
                if (type === 'json' || !type && ct.indexOf('json') >= 0) {
                    data = parseJSON(data);
                } else if (type === "script" || !type && ct.indexOf("javascript") >= 0) {
                    $.globalEval(data);
                }
            }
            return data;
        };
    }
};

/**
 * ajaxForm() provides a mechanism for fully automating form submission.
 *
 * The advantages of using this method instead of ajaxSubmit() are:
 *
 * 1: This method will include coordinates for <input type="image" /> elements (if the element
 *    is used to submit the form).
 * 2. This method will include the submit element's name/value data (for the element that was
 *    used to submit the form).
 * 3. This method binds the submit() method to the form for you.
 *
 * The options argument for ajaxForm works exactly as it does for ajaxSubmit.  ajaxForm merely
 * passes the options argument along after properly binding events for submit elements and
 * the form itself.
 */
$.fn.ajaxForm = function(options) {
    options = options || {};
    options.delegation = options.delegation && $.isFunction($.fn.on);
    
    // in jQuery 1.3+ we can fix mistakes with the ready state
    if (!options.delegation && this.length === 0) {
        var o = { s: this.selector, c: this.context };
        if (!$.isReady && o.s) {
            log('DOM not ready, queuing ajaxForm');
            $(function() {
                $(o.s,o.c).ajaxForm(options);
            });
            return this;
        }
        // is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
        log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
        return this;
    }

    if ( options.delegation ) {
        $(document)
            .off('submit.form-plugin', this.selector, doAjaxSubmit)
            .off('click.form-plugin', this.selector, captureSubmittingElement)
            .on('submit.form-plugin', this.selector, options, doAjaxSubmit)
            .on('click.form-plugin', this.selector, options, captureSubmittingElement);
        return this;
    }

    return this.ajaxFormUnbind()
        .bind('submit.form-plugin', options, doAjaxSubmit)
        .bind('click.form-plugin', options, captureSubmittingElement);
};

// private event handlers    
function doAjaxSubmit(e) {
    /*jshint validthis:true */
    var options = e.data;
    if (!e.isDefaultPrevented()) { // if event has been canceled, don't proceed
        e.preventDefault();
        $(this).ajaxSubmit(options);
    }
}
    
function captureSubmittingElement(e) {
    /*jshint validthis:true */
    var target = e.target;
    var $el = $(target);
    if (!($el.is(":submit,input:image"))) {
        // is this a child element of the submit el?  (ex: a span within a button)
        var t = $el.closest(':submit');
        if (t.length === 0) {
            return;
        }
        target = t[0];
    }
    var form = this;
    form.clk = target;
    if (target.type == 'image') {
        if (e.offsetX !== undefined) {
            form.clk_x = e.offsetX;
            form.clk_y = e.offsetY;
        } else if (typeof $.fn.offset == 'function') {
            var offset = $el.offset();
            form.clk_x = e.pageX - offset.left;
            form.clk_y = e.pageY - offset.top;
        } else {
            form.clk_x = e.pageX - target.offsetLeft;
            form.clk_y = e.pageY - target.offsetTop;
        }
    }
    // clear form vars
    setTimeout(function() { form.clk = form.clk_x = form.clk_y = null; }, 100);
}


// ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
$.fn.ajaxFormUnbind = function() {
    return this.unbind('submit.form-plugin click.form-plugin');
};

/**
 * formToArray() gathers form element data into an array of objects that can
 * be passed to any of the following ajax functions: $.get, $.post, or load.
 * Each object in the array has both a 'name' and 'value' property.  An example of
 * an array for a simple login form might be:
 *
 * [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
 *
 * It is this array that is passed to pre-submit callback functions provided to the
 * ajaxSubmit() and ajaxForm() methods.
 */
$.fn.formToArray = function(semantic, elements) {
    var a = [];
    if (this.length === 0) {
        return a;
    }

    var form = this[0];
    var els = semantic ? form.getElementsByTagName('*') : form.elements;
    if (!els) {
        return a;
    }

    var i,j,n,v,el,max,jmax;
    for(i=0, max=els.length; i < max; i++) {
        el = els[i];
        n = el.name;
        if (!n) {
            continue;
        }

        if (semantic && form.clk && el.type == "image") {
            // handle image inputs on the fly when semantic == true
            if(!el.disabled && form.clk == el) {
                a.push({name: n, value: $(el).val(), type: el.type });
                a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
            }
            continue;
        }

        v = $.fieldValue(el, true);
        if (v && v.constructor == Array) {
            if (elements) 
                elements.push(el);
            for(j=0, jmax=v.length; j < jmax; j++) {
                a.push({name: n, value: v[j]});
            }
        }
        else if (feature.fileapi && el.type == 'file' && !el.disabled) {
            if (elements) 
                elements.push(el);
            var files = el.files;
            if (files.length) {
                for (j=0; j < files.length; j++) {
                    a.push({name: n, value: files[j], type: el.type});
                }
            }
            else {
                // #180
                a.push({ name: n, value: '', type: el.type });
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            if (elements) 
                elements.push(el);
            a.push({name: n, value: v, type: el.type, required: el.required});
        }
    }

    if (!semantic && form.clk) {
        // input type=='image' are not found in elements array! handle it here
        var $input = $(form.clk), input = $input[0];
        n = input.name;
        if (n && !input.disabled && input.type == 'image') {
            a.push({name: n, value: $input.val()});
            a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
        }
    }
    return a;
};

/**
 * Serializes form data into a 'submittable' string. This method will return a string
 * in the format: name1=value1&amp;name2=value2
 */
$.fn.formSerialize = function(semantic) {
    //hand off to jQuery.param for proper encoding
    return $.param(this.formToArray(semantic));
};

/**
 * Serializes all field elements in the jQuery object into a query string.
 * This method will return a string in the format: name1=value1&amp;name2=value2
 */
$.fn.fieldSerialize = function(successful) {
    var a = [];
    this.each(function() {
        var n = this.name;
        if (!n) {
            return;
        }
        var v = $.fieldValue(this, successful);
        if (v && v.constructor == Array) {
            for (var i=0,max=v.length; i < max; i++) {
                a.push({name: n, value: v[i]});
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            a.push({name: this.name, value: v});
        }
    });
    //hand off to jQuery.param for proper encoding
    return $.param(a);
};

/**
 * Returns the value(s) of the element in the matched set.  For example, consider the following form:
 *
 *  <form><fieldset>
 *      <input name="A" type="text" />
 *      <input name="A" type="text" />
 *      <input name="B" type="checkbox" value="B1" />
 *      <input name="B" type="checkbox" value="B2"/>
 *      <input name="C" type="radio" value="C1" />
 *      <input name="C" type="radio" value="C2" />
 *  </fieldset></form>
 *
 *  var v = $(':text').fieldValue();
 *  // if no values are entered into the text inputs
 *  v == ['','']
 *  // if values entered into the text inputs are 'foo' and 'bar'
 *  v == ['foo','bar']
 *
 *  var v = $(':checkbox').fieldValue();
 *  // if neither checkbox is checked
 *  v === undefined
 *  // if both checkboxes are checked
 *  v == ['B1', 'B2']
 *
 *  var v = $(':radio').fieldValue();
 *  // if neither radio is checked
 *  v === undefined
 *  // if first radio is checked
 *  v == ['C1']
 *
 * The successful argument controls whether or not the field element must be 'successful'
 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.  If this value is false the value(s)
 * for each element is returned.
 *
 * Note: This method *always* returns an array.  If no valid value can be determined the
 *    array will be empty, otherwise it will contain one or more values.
 */
$.fn.fieldValue = function(successful) {
    for (var val=[], i=0, max=this.length; i < max; i++) {
        var el = this[i];
        var v = $.fieldValue(el, successful);
        if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length)) {
            continue;
        }
        if (v.constructor == Array)
            $.merge(val, v);
        else
            val.push(v);
    }
    return val;
};

/**
 * Returns the value of the field element.
 */
$.fieldValue = function(el, successful) {
    var n = el.name, t = el.type, tag = el.tagName.toLowerCase();
    if (successful === undefined) {
        successful = true;
    }

    if (successful && (!n || el.disabled || t == 'reset' || t == 'button' ||
        (t == 'checkbox' || t == 'radio') && !el.checked ||
        (t == 'submit' || t == 'image') && el.form && el.form.clk != el ||
        tag == 'select' && el.selectedIndex == -1)) {
            return null;
    }

    if (tag == 'select') {
        var index = el.selectedIndex;
        if (index < 0) {
            return null;
        }
        var a = [], ops = el.options;
        var one = (t == 'select-one');
        var max = (one ? index+1 : ops.length);
        for(var i=(one ? index : 0); i < max; i++) {
            var op = ops[i];
            if (op.selected) {
                var v = op.value;
                if (!v) { // extra pain for IE...
                    v = (op.attributes && op.attributes['value'] && !(op.attributes['value'].specified)) ? op.text : op.value;
                }
                if (one) {
                    return v;
                }
                a.push(v);
            }
        }
        return a;
    }
    return $(el).val();
};

/**
 * Clears the form data.  Takes the following actions on the form's input fields:
 *  - input text fields will have their 'value' property set to the empty string
 *  - select elements will have their 'selectedIndex' property set to -1
 *  - checkbox and radio inputs will have their 'checked' property set to false
 *  - inputs of type submit, button, reset, and hidden will *not* be effected
 *  - button elements will *not* be effected
 */
$.fn.clearForm = function(includeHidden) {
    return this.each(function() {
        $('input,select,textarea', this).clearFields(includeHidden);
    });
};

/**
 * Clears the selected form elements.
 */
$.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
    var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i; // 'hidden' is not in this list
    return this.each(function() {
        var t = this.type, tag = this.tagName.toLowerCase();
        if (re.test(t) || tag == 'textarea') {
            this.value = '';
        }
        else if (t == 'checkbox' || t == 'radio') {
            this.checked = false;
        }
        else if (tag == 'select') {
            this.selectedIndex = -1;
        }
        else if (includeHidden) {
            // includeHidden can be the valud true, or it can be a selector string
            // indicating a special test; for example:
            //  $('#myForm').clearForm('.special:hidden')
            // the above would clean hidden inputs that have the class of 'special'
            if ( (includeHidden === true && /hidden/.test(t)) ||
                 (typeof includeHidden == 'string' && $(this).is(includeHidden)) )
                this.value = '';
        }
    });
};

/**
 * Resets the form data.  Causes all form elements to be reset to their original value.
 */
$.fn.resetForm = function() {
    return this.each(function() {
        // guard against an input with the name of 'reset'
        // note that IE reports the reset function as an 'object'
        if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType)) {
            this.reset();
        }
    });
};

/**
 * Enables or disables any matching elements.
 */
$.fn.enable = function(b) {
    if (b === undefined) {
        b = true;
    }
    return this.each(function() {
        this.disabled = !b;
    });
};

/**
 * Checks/unchecks any matching checkboxes or radio buttons and
 * selects/deselects and matching option elements.
 */
$.fn.selected = function(select) {
    if (select === undefined) {
        select = true;
    }
    return this.each(function() {
        var t = this.type;
        if (t == 'checkbox' || t == 'radio') {
            this.checked = select;
        }
        else if (this.tagName.toLowerCase() == 'option') {
            var $sel = $(this).parent('select');
            if (select && $sel[0] && $sel[0].type == 'select-one') {
                // deselect all other options
                $sel.find('option').selected(false);
            }
            this.selected = select;
        }
    });
};

// expose debug var
$.fn.ajaxSubmit.debug = false;

// helper fn for console logging
function log() {
    if (!$.fn.ajaxSubmit.debug) 
        return;
    var msg = '[jquery.form] ' + Array.prototype.join.call(arguments,'');
    if (window.console && window.console.log) {
        window.console.log(msg);
    }
    else if (window.opera && window.opera.postError) {
        window.opera.postError(msg);
    }
}

})(jQuery);
/*---------------------------end of jquery.form.js------------------------------------------------------------------------------------------------------------------*/


/*---------------------------start of global_functions.js------------------------------------------------------------------------------------------------------------------*/
			/*all jquery custom functions are loaded from here*/
			$(document).ready(function() {
				/**
				 * variables
				 */
				var nthChild=''; //to get the vaue of the last cloned row
				var form_id = '';
				var lastRowId=1;	
				var timeDiff='';	
	            
		        /*start of form calculations on key up*/
				/*----------------------------------------------------------------------------------------------------------------*/
				 form_id='#'+$(".form-container").find('form').attr('id'); /*what form has been loaded now?*/
				//alert(form_id);
				
				/*-----------------------------------start of hide/display OTR location field---------------------------------------------------*/
				//hide/display OTR location field on the radio button selected
					 $(function() {
					 	if(form_id="#zinc_ors_inventory"){
			    	$('.form-container').find('input[type="radio"]').click(function() {
			        if($(this).attr('id') == 'ortQuestion2_y') {
			            //$('#others-text').show();
			             $('.hide').show();
			        } else if($(this).attr('id') == 'ortQuestion2_n'){ 
				       $('.hide').hide();
				    }
			    });
			    }
		       });  
				/*-----------------------------------end of hide/display OTR location field---------------------------------------------------*/
				
				
				
				//hide/show  input field on Specify(other) selected
				if(form_id='#form_mnh_assessment'){
				
				var method='';
				$('#sterilizationMethod').change(function(){
						//alert('yes');
					method=$('#sterilizationMethod').val();
					if(method=="other"){
						//alert('fire');
						$("#sterilizationMethodOther").show();
					}else{
						$("#sterilizationMethodOther").hide();
					}
					
				});
				}
				
				
				
				/*-----------------------------------start of hide/display  stock item if not available---------------------------------------*/
				if(form_id=="#zinc_ors_inventory"){
					
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {

					
					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).attr('class')=='cloned left-combo')

					cb_id='#'+$(this).attr('id');
					//alert(cb_id);
					
					/*
					 * display q5 comment on NO option
					 */
					if(cb_id=='#lndq5FacilityDelivery'){
						//alert(cb_id);
						if($(cb_id).val() == 'No'){
						$("#q5comm").show();
						}else{
							$("#q5comm").hide();
						}
					}
					
					/*
					 * display q6b on q6a YES option
					 */
					if(cb_id=='#lndq6aConductingDelivery'){
						if($(cb_id).val() == 'Yes'){
						$("#q6ay").show();
						}else{
							$("#q6ay").hide();
						}
					}
					
					if(cb_id.indexOf('_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")) {
						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}
					
				
				});
				
				$('#editEquipmentListTopButton').click(function(){
				$('#tableEquipmentList').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
				}
				
				if(form_id="#form_mnh_assessment"){
					
					
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {
					

					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).attr('class')=='cloned left-combo'){
					cb_id='#'+$(this).attr('id');
					if(cb_id.indexOf('_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")||($(cb_id).val() == "Never Available")) {

						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}//for enabling/disabling rows
					} //close if($(this).attr('class')=='cloned left-combo')
					
					//hide or show qn18 on facility's level
					$('#facilityLevel').change(function(){
						if($(this).val()<3){
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', true);
						$('hide-level').hide();
						}else{
						$('hide-level').show();	
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', false);
						}
					});
					
					
					
				
				});
				
				//to review equipment assessment--enables the disabled select options
				$('#editEquipmentListTopButton,#editEquipmentListTopButton_2,#editEquipmentListTopButton_3,#editEquipmentListTopButton_4').click(function(){
				$('#tableEquipmentList,#tableEquipmentList_2,#tableEquipmentList_3,#tableEquipmentList_4').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
				}
				
				
				
				
				
				/*-----------------------------------end of of hide/display  stock item if not available--------------------------*/
				
				
				
				/*----------------------------------------------------------------------------------------------------------------*/
			/*start of clone trigger functions*/
			$('#clonetrigger_1,#clonetrigger_2').click(function() {
		            form_id='#'+$(".form-container").find('form').attr('id'); /*what form has been loaded now?*/
					var yourclass = ".clonable";
					//The class you have used in your form
					var clonecount = $(yourclass).length;
					//how many clones do we already have?
					var newid = Number(clonecount) + 1;
					//Id of the new clone
					
					if($(this).attr('id')=="clonetrigger_1"){
						c_target='#formbuttons_1';
						yourclass = ".clonable.zinc";
						clonecount = $(yourclass).length;
						newid = Number(clonecount) + 1;
						//alert('1');
					}else if($(this).attr('id')=="clonetrigger_2"){
						c_target='#formbuttons_2';
						yourclass = ".clonable.ors";
						clonecount = $(yourclass).length;
						newid = Number(clonecount) + 1;
						//alert('2');
					}

					$(yourclass + ":first").fieldclone({//Clone the original element
						newid_ : newid, //Id of the new clone, (you can pass your own if you want)
						target_ : $(c_target), //where do we insert the clone? (target element)
						insert_ : "before", //where do we insert the clone? (after/before/append/prepend...)
						limit_ : 0							//Maximum Number of Clones
					});
					
					
					/*reinitialize datepicker options on the cloned item*/
					$('.clonable label.error').remove();
					$('.cloned').removeClass('error');
					$('.autoDate').removeClass('hasDatepicker error');
					$('.futureDate').removeClass('hasDatepicker error');
		            $('.autoDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '-10y', maxDate: "0D"});
		            $('.futureDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '0y', maxDate: "2y"});
		          
		            /*reinitialize timepicker options on the cloned item*/
		            $('.mobiscroll').removeClass('scroller');
                    $('.mobiscroll').scroller({preset:'time'});

					var t = 'default';
					var m = 'mixed';
					$('.mobiscroll').scroller('destroy').scroller({ preset: 'time', theme: t, mode: m });
					
					$(".cloned").on("keyup", function(){
	                    //alert("active element: "+$("input:text:focus").attr("id"));

	                   //alert('Last Id: '+clonecount);
	                   lastRowId=clonecount+1;
	                    //do some calculations on key typed
	                 // var id=$("input:text:focus").attr("id");
	                 var id=$(this).attr('id');
	                  var no=id.substr(id.indexOf('_')+1,id.length);
	                 // alert("append: "+no);
	                switch(form_id){
	                	
	               case '#zinc_ors_inventory':/*zinc and ors inventory form*/
	            
					break;
				 
	                    } /*end of the case*/
				
	               }); //end of cloned key up function
		 
					return  false;
				});/*end of clone trigger*/
				
				/*----------------------------------------------------------------------------------------------------------------*/
				/*start of clone_remove*/
				$('#cloneremove_1,#cloneremove_2').click(function() {
					//alert($(".clonable").find("tr:last").attr('name'));
				
						if($(this).attr('id')=='cloneremove_1'){
							if($(".clonable.zinc").length>1)
							//alert('1');
							$(".clonable.zinc:last").after().remove();
						}else if($(this).attr('id')=='cloneremove_2'){
							//alert($(".clonable.ors").length);
							if($(".clonable.ors").length>1)
							$(".clonable.ors:last").after().remove();
						}
					//}else{
						//('#cloneremove').disable();
					//}
				 return false;
				 });
				 /*end of clone_remove*/
				/*-----------------------------------------------------------------------------------------------------------------*/
				
				/*-----------------------------------------------------------------------------------------------------------------*/
				/*start of ajax data requests*/
				function getRecordsByForm(){
    			 $.ajax({
		            type: "GET",
		            url: "<?php echo base_url()?>c_salt/getRecordsViaJSON",
		            dataType:"json",
		            cache:"false",
		            data:"",
		            success: function(data){
		            	//$("#edit_panel").show();
		            	if(data.rTotal >0){
		            	var yourclass = ".clonable";
					//The class you have used in your form
					var clonecount = $(yourclass).length;
					//how many clones do we already have?
					var newid = Number(clonecount) + 1;
					//Id of the new clone

					$(yourclass + ":first").fieldclone({//Clone the original element
						newid_ : newid, //Id of the new clone, (you can pass your own if you want)
						target_ : $("#formbuttons"), //where do we insert the clone? (target element)
						insert_ : "before", //where do we insert the clone? (after/before/append/prepend...)
						limit_ : data.rTotal  //Maximum Number of Clones
					});
					
					
					/*reinitialize datepicker options on the cloned item*/
					$('.clonable label.error').remove();
					$('.cloned').removeClass('error');
					$('.autoDate').removeClass('hasDatepicker error');
					$('.futureDate').removeClass('hasDatepicker error');
		            $('.autoDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '-10y', maxDate: "0D"});
		            $('.futureDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '0y', maxDate: "2y"});
		          
		            /*reinitialize timepicker options on the cloned item*/
		            $('.mobiscroll').removeClass('scroller');
                    $('.mobiscroll').scroller({preset:'time'});

					var t = 'default';
					var m = 'mixed';
					$('.mobiscroll').scroller('destroy').scroller({ preset: 'time', theme: t, mode: m });
					
					//render data into the cloned elements
					$(yourclass+":last input[name=yourinput]").val(data.rData);

		            	}
		            },
		            beforeSend:function()
					{
						 $("#results_panel").show();
		                 $("#search_err").html("Loading...");
		          },
		           afterSend:function()
					{
		                 $("#search_err").html("Still working...");
		            }
		        });
         return false;
    		}
				/*end of ajax data requests*/
				/*-----------------------------------------------------------------------------------------------------------------*/
				
				/*start of datetime functions*/
				$(function() {
				var dates= ['.autoDate','.futureDate'];
				
				
				//initialize all datepickers
				for ( var i=0, iLen=dates.length ; i<iLen ; i++){
					if(dates[i]=='.futureDate'){
				$(dates[i]).datepicker({defaultDate:new Date(), changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '0y', maxDate: "2y"});
				}else{
					
					$(dates[i]).datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '-10y', maxDate: "0D"});
				}
				}
				
				for(i=new Date().getFullYear();i>1990; i--)// year picker
				{
				$('#year').append($('<option/>').val(i).html(i));
				$('#harvestYear').append($('<option/>').val(i).html(i));
				}
				}); /*end of datetime functions*/
				
				/*----------------------------------------------------------------------------------------------------------------*/

				//submit button event was here but moved to the index page
				
				/*----------------------------------------------------------------------------------------------------------------*/
				//reset current form was here--.but moved to the index page
				/*----------------------------------------------------------------------------------------------------------------*/
				
				/*start of mobiscroller time picker function*/
				$(function(){
				$('.mobiscroll').scroller({preset:'time'});
			
				var t = 'default';
				var m = 'mixed';
				$('.mobiscroll').scroller('destroy').scroller({ preset: 'time', theme: t, mode: m });
			
				});/*end of mobiscroller time picker function*/
				
				/*----------------------------------------------------------------------------------------------------------------*/
				
				
});/*end of parent document ready function*/
/*---------------------------end of global_functions.js------------------------------------------------------------------------------------------------------------------*/


$().ready(function(){
			/**
			 * variables
			 */
			var form_id='';
			var link_id='';
			var linkIdUrl='';
			var linkSub='';
			var linkDomain='';
			var visit_site = ''; 
			var devices='';
			
				
			    //start of close_opened_form click event
				$("#close_opened_form").click(function() {

				$(".form-container").load('<?php echo base_url() . 'c_front/formviewer'; ?>',function(){

					//delegate events
					loadGlobalScript();

					});
					});/*end of close_opened_form click event

					/*----------------------------------------------------------------------------------------------------------------*/

					/*start of loadGlobalJS*/
					var onload_queue = [];
					var dom_loaded = false;

					function loadGlobalJS(src, callback) {
					var script = document.createElement('script');
					script.type = "text/javascript";
					script.async = true;
					script.src = src;
					script.onload = script.onreadystatechange = function() {
					if (dom_loaded)
					callback();
					else
					onload_queue.push(callback);
					// clean up for IE and Opera
					script.onload = null;
					script.onreadystatechange = null;
					};
					var head = document.getElementsByTagName('head')[0];
					head.appendChild(script);
					}/*end of loadGlobalJS*/

					function domLoaded() {
					dom_loaded = true;
					var len = onload_queue.length;
					for (var i = 0; i < len; i++) {
					onload_queue[i]();
					}
					onload_queue = null;
					};/*end of domLoaded*/

					/*-----------------------------------------------------------------------------------------------------------*/

					//check box/checked radio function was here

					domLoaded();

					/*----------------------------------------------------------------------------------------------------------------*/

					/*submit form event*/
					/*start of submit_form_data click event*/
					//function triggerFormSubmit(){
					$("#submit_form_data").click(function() {

					$("#facilityMFC").val('<?php echo $mfCode; ?>');
					
					if(form_id=="#form_mnh_assessment"){
						$("#q11equipCode_28").val($("#q1_1_equipCode_28").val());
				
					}

					$(form_id).submit();

					});//}/*end of submit_form_data click event*/

					/*----------------------------------------------------------------------------------------------------------------*/

					/*reset form event*/
					/*start of reset_current_form click event*/
					$("#reset_current_form").click(function() {
					$(form_id).resetForm();

					});/*end of reset_current_form click event*/

					/*----------------------------------------------------------------------------------------------------------------*/
					var loaded=false;
					function loadGlobalScript(){
					loaded=true;

					var scripts=['<?php echo base_url();?>js/js_ajax_load.js'];

						for(i=0;i<scripts.length;i++){
						loadGlobalJS(scripts[i],function(){});
						}
						form_id='#'+$(".form-container").find('form').attr('id');

						}
						/*----------------------------------------------------------------------------------------------------------------*/

						//so which link was clicked?
						$('.form-container-menu').find('ul li').on('click',function(){
						link_id='#'+$(this).find('a').attr('id');
						linkSub=$(link_id).attr('class');
						//alert(linkSub);
						linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
						//load url based on the class and id returned
						//switch(linkSub){
						switch(link_id){
						case "#mnh_inventory_li":
						linkDomain='c_load';
						linkIdUrl='form_mnh_equipment_assessment';
						break;
						case "#facility_registration_li":
						linkDomain='c_load';
						linkIdUrl='facility_registration';
						break;
						case "#zinc_inventory_li":
						linkDomain='c_load';
						linkIdUrl='form_zinc_ors_inventory';
						break;
						case "#instructions_li":
	                    linkDomain='c_load';
	                    linkIdUrl='instructions';
	                    break;
	                    case "#ort_li":
	                    linkDomain='c_load';
	                    linkIdUrl='form_ort';
	                    break;
						}/*close the case*/
						if(linkDomain)
						//+linkDomain+'/'+linkIdUrl

						$(".form-container").load('<?php echo base_url(); ?>'+linkDomain+'/'+linkIdUrl,function(){

				//delegate events
				
				//if(loaded==false)
				loadGlobalScript();renderFacilityInfo();
				$( "#tabs" ).tabs();
				//alert('done');
				
				 });
				
				})/*end of which link was clicked*/
				/*----------------------------------------------------------------------------------------------------------------*/
				
				//load zinc form on form load
				
				/*-----------------------------------------------------------------------------------------------------------------*/
				/*start of ajax data requests*/
				function renderFacilityInfo(){
    			 $.ajax({
		            type: "GET",

		            	url: "<?php echo base_url()?>c_load/getFacilityDetails",
						dataType:"json",
						cache:"true",
						data:"",
						success: function(data){
						var info = data.rData;
						$.each(info , function(i,facility) {
						//alert("Name: "+facility.facilityMFC);//render found data
						$("#facilityName").val(facility.facilityName);
						$("#facilityContactPerson").val(facility.facilityContactPerson);

  						$("#facilityType option").filter(function() {return $(this).text() == facility.facilityType;}).first().prop("selected", true);
  						$("#facilityLevel option").filter(function() {return $(this).text() == facility.facilityLevel;}).first().prop("selected", true);
  						$("#facilityOwner option").filter(function() {return $(this).text() == facility.facilityOwnedBy;}).first().prop("selected", true);
  						$("#facilityProvince option").filter(function() {return $(this).text() == facility.facilityProvince;}).first().prop("selected", true);
						$("#facilityDistrict option").filter(function() {return $(this).text() == facility.facilityDistrict;}).first().prop("selected", true);
						$("#facilityCounty option").filter(function() {return $(this).text() == facility.facilityCounty;}).first().prop("selected", true);

						$("#facilityEmail").val(facility.facilityEmail);
						
						/*check if there is more than 1 cell phone no.*/
						if(facility.facilityTelephone !=''){
						if(facility.facilityTelephone.indexOf('/')>0){
							//if tel no >1, split them for display seperately
							altTel=facility.facilityTelephone.split('/');
							$("#facilityTelephone").val(altTel[0]);
							$("#facilityAltTelephone").val(altTel[1]);
						}else{
						$("#facilityTelephone").val(facility.facilityTelephone);
						}
						}
						});

						//return false;
						},
						beforeSend:function(){},
						afterSend:function(){}
						});
						return false;
						}
						/*end of ajax data requests*/
						/*-----------------------------------------------------------------------------------------------------------------*/

						}); /*close document ready*/