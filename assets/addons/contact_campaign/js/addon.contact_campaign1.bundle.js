!function(s){function t(t){for(var e,n,o=t[0],r=t[1],i=t[2],a=0,c=[];a<o.length;a++)n=o[a],u[n]&&c.push(u[n][0]),u[n]=0;for(e in r)Object.prototype.hasOwnProperty.call(r,e)&&(s[e]=r[e]);for(d&&d(t);c.length;)c.shift()();return f.push.apply(f,i||[]),l()}function l(){for(var t,e=0;e<f.length;e++){for(var n=f[e],o=!0,r=1;r<n.length;r++){var i=n[r];0!==u[i]&&(o=!1)}o&&(f.splice(e--,1),t=a(a.s=n[0]))}return t}var n={},u={1:0},f=[];function a(t){if(n[t])return n[t].exports;var e=n[t]={i:t,l:!1,exports:{}};return s[t].call(e.exports,e,e.exports,a),e.l=!0,e.exports}a.m=s,a.c=n,a.d=function(t,e,n){a.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},a.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)a.d(n,o,function(t){return e[t]}.bind(null,o));return n},a.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return a.d(e,"a",e),e},a.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},a.p="";var e=window.webpackJsonp=window.webpackJsonp||[],o=e.push.bind(e);e.push=t,e=e.slice();for(var r=0;r<e.length;r++)t(e[r]);var d=o;f.push([9,0]),l()}({9:function(t,n,o){"use strict";o.r(n),function(f){function r(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}o.d(n,"default",function(){return t});var t=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.formSectionList=[],this.currentFormSectionIndex=0,this.topMargin=0}var e,n,o;return e=t,(n=[{key:"validateSections",value:function(t){var e=!1;if(this.currentFormSectionIndex<this.formSectionList.length){var i=this.formSectionList[this.currentFormSectionIndex];if(e=!0,void 0!==i.find("input:radio, input:checkbox")[0]){var n=i.data("validate-check");if(void 0!==n&&1==n)void 0===i.find("input:checked").val()&&(e=!1)}var o=i.find("input[type=email]"),r=o.val(),a=o.attr("required");if(void 0!==r){if(void 0!==a&&""===r)o.addClass("invalid"),i.find("label[for='"+o.attr("id")+"']").attr("data-error","Sie müssen eine Email angeben"),e=!1;else for(var c=o.attr("class").split(" "),s=0;s<c.length;s++)"invalid"===c[s]&&(o.addClass("invalid"),i.find("label[for='"+o.attr("id")+"']").attr("data-error","Die Email ist noch nicht korrekt"),e=!1)}if(void 0!==i.find("input:text")[0]){var l=[];if(i.find("input:text").each(function(t,e){var n=f(e),o=f(e).val(),r=f(e).attr("required");if(void 0!==o){void 0!==r&&""===o&&(n.addClass("invalid"),i.find("label[for='"+n.attr("id")+"']").attr("data-error","Dieses feld darf nicht leer bleiben"),l.push(!1))}}),0<l.length)for(var u=0;u<l.length;u++)if(!l[u]){e=!1;break}}e?(f("#contact-form-button").removeAttr("disabled"),f("#contact-form-submit-button").removeAttr("disabled"),t||(this.topMargin=this.topMargin-this.formSectionList[0].height(),f(".form-section-container").animate({marginTop:this.topMargin+"px"},500),this.currentFormSectionIndex++)):(console.log("INVALID - ausgrauen"),f("#contact-form-button").attr("disabled","disabled"),f("#contact-form-submit-button").attr("disabled","disabled")),this.currentFormSectionIndex>=this.formSectionList.length-1&&(f("#contact-form-button").css({display:"none"}),f("#contact-form-submit-button").css({display:"block"}))}return e}},{key:"showProgressStatus",value:function(t,e){t?(f(".preloader-layer").css({display:"block"}),f(".preloader-layer").animate({opacity:"1.0"},500)):f(".preloader-layer").animate({opacity:"0"},500,function(){f(".preloader-layer").css({display:"none"})}),e&&e()}},{key:"init",value:function(){var i=this;f(".form-section").each(function(t,e){i.formSectionList.push(f(e))}),f("#contact-form-button").on("click",function(t){i.validateSections(!1)}),f(".form-section [data-no-tab]").each(function(t,e){f(e).keydown(function(t){9===t.keyCode&&t.preventDefault()})}),f("#concam-form").on("submit",function(t){t.preventDefault();var e=i.validateSections(!0);if(console.log(e),e){i.showProgressStatus(!0);var n,o=f(t.currentTarget).attr("action"),r=f(t.currentTarget).attr("method");n=f(t.currentTarget).serialize(),f.ajax({url:o,data:n,cache:!1,type:r}).done(function(t){f("#concam-response").html(t),f("#concam-response").css({display:"block"}),f("#concam-form").css({display:"none"}),i.showProgressStatus(!1)}).fail(function(t,e){console.log(t+" "+e),f("#concam-response").html(t),f("#concam-response").css({display:"block"}),f("#concam-form").css({display:"none"}),i.showProgressStatus(!1)})}}),f(".form-body").find("input:radio, input:checkbox").each(function(t,e){f(e).on("click",function(t){console.log("click-"+f(e).attr("id")),i.validateSections(!0)})}),f(".form-section input:text, .form-section input[type=email]").each(function(t,e){f(e).on("blur",function(t){console.log("blur"),i.validateSections(!0)})})}}])&&r(e.prototype,n),o&&r(e,o),t}(),e=new t;e.showProgressStatus(!0),f(function(){e.init(),e.showProgressStatus(!1),console.log("Addon loaded")})}.call(this,o(0))}});
//# sourceMappingURL=addon.contact_campaign1.bundle.js.map