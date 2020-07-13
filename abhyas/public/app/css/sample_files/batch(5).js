;
/* module-key = 'com.atlassian.plugins.browser.metrics.browser-metrics-plugin:impl', location = 'internal/browser-metrics-aa-beacon/impl.js' */
!function(n,r){var t={},e={},o={},u={},i={};i=function(n,r,t,e,o,u,i,c,a,s,f,d,h,l,m,p,v,y){Object.defineProperty(n,"__esModule",{value:!0});var E=t.addReportMarshaller;return E(o),E(e),E(u),E(i),E(c),E(a),E(s),E(f),E(d),E(h),E(l),E(m),E(p),E(v),E(y),r.subscribe(function(n){t.beacon(n.report)}),n}(i,window["browser-metrics"],r,function(n,r){function t(n){return r(n.apdex)}return function(n){if(t(n))return{apdex:""+n.apdex}}}(0,t=function(n){return"number"==typeof n}),function(n,r,t,e){return function(n){var o={};return Object.keys(n).forEach(function(u){var i=n[u];(t(i)||r(i)||e(i)||null===i)&&(o[u]=i)}),o}}(0,function(n){return"boolean"==typeof n},t,e=function(n){return"string"==typeof n}),function(n,r,t){function e(n){return t(n.firstPaint)}return function(n){if(e(n))return{firstPaint:r(n.firstPaint)}}}(0,o=function(n){return""+Math.floor(n)},t),function(n){function r(n){return"boolean"==typeof n.isInitial}return function(n){if(r(n))return{isInitial:""+n.isInitial}}}(),function(n,r){function t(n){return r(n.journeyId)}return function(n){if(t(n))return{journeyId:n.journeyId}}}(0,e),function(n,r){function t(n){return r(n.key)}return function(n){if(t(n))return{key:n.key}}}(0,e),function(n,r){function t(n){return r(n.navigationType)}return function(n){if(t(n))return{navigationType:""+n.navigationType}}}(0,t),function(n,r,t){function e(n){return t(n.readyForUser)}return function(n){if(e(n))return{readyForUser:r(n.readyForUser)}}}(0,o,t),function(n,r){function t(n){return r(n.redirectCount)}return function(n){if(t(n))return{redirectCount:""+n.redirectCount}}}(0,t),function(n,r,t){function e(n){return t(n.resourceLoadedEnd)}return function(n){if(e(n))return{resourceLoadedEnd:r(n.resourceLoadedEnd)}}}(0,o,t),function(n,r,t){function e(n){return Array.isArray(n.resourceTiming)}function o(n){return(n=Math.floor(n||0))>0?u(n):""}function u(n){return n.toString(36)}function i(n){return[c[n.initiatorType]||a,o(n.startTime),o(n.responseEnd),o(n.responseStart),o(n.requestStart),o(n.connectEnd),o(n.secureConnectionStart),o(n.connectStart),o(n.domainLookupEnd),o(n.domainLookupStart),o(n.redirectEnd),o(n.redirectStart)].join(",").replace(/,+$/,"")}var c={other:0,img:1,link:2,script:3,css:4,xmlhttprequest:5},a=-1;return function(n){if(e(n)){var o=new t;return n.resourceTiming.forEach(function(n){var t=r.cleanUrl(n.name);o.add(t||"☠",i(n))}),{resourceTiming:JSON.stringify(o.condensed().toTrieObject())}}}}(0,r,function(n,r){function t(n){return Object.keys(n).length}return function(){function n(){this.children={},this.values=[]}return n.prototype.add=function(r,t){0==r.length?this.values.push(t):(this.children.hasOwnProperty(r[0])||(this.children[r[0]]=new n),this.children[r[0]].add(r.substr(1),t))},n.prototype.toTrieObject=function(){var n={};return r(this.children,function(r,t){n[r]=t.toTrieObject()}),0===this.values.length?n:0===t(this.children)?this.values:[n,this.values]},n.prototype.condensed=function(){var e=new n;return e.values=this.values.concat(),r(this.children,function(n,o){var u=o.condensed();0===u.values.length&&1===t(u.children)?r(u.children,function(r,t){e.children[n+r]=t}):e.children[n]=u}),e},n}()}(0,u=function(n,r){Object.keys(n).forEach(function(t){r(t,n[t])})})),function(n,r,t){function e(n){return t(n.threshold)}return function(n){if(e(n))return{threshold:r(n.threshold)}}}(0,o,t),function(n,r,t){var e="unloadEventStart,unloadEventEnd,redirectStart,redirectEnd,fetchStart,domainLookupStart,domainLookupEnd,connectStart,connectEnd,secureConnectionStart,requestStart,responseStart,responseEnd,domLoading,domInteractive,domContentLoadedEventStart,domContentLoadedEventEnd,domComplete,loadEventStart,loadEventEnd".split(",");return function(n){var o={};return e.forEach(function(e){t(n[e])&&(o[e]=r(n[e]))}),o}}(0,o,t),function(n,r){function t(n){return r(n.userAgent)}return function(n){if(t(n))return{userAgent:n.userAgent}}}(0,e),function(n,r){function t(n){return"object"==typeof n.marks}return function(n){if(t(n)){var e={},o={marks:{},measures:{}};return n.marks.forEach(function(n){o.marks[n.name]=o.marks[n.name]||[],o.marks[n.name].push(Math.floor(n.time))}),r(o.marks,function(n,r){var t=r.sort(function(n,r){return n-r})[0];e["mark__"+n]=t}),n.measures.forEach(function(n){o.measures[n.name]=o.measures[n.name]||[],o.measures[n.name].push([Math.floor(n.startTime),Math.floor(n.duration)])}),r(o.measures,function(n,r){var t=r.sort(function(n,r){return n[0]-r[0]})[0],o=t[0],u=t[1];e["measure__"+n+"__start"]=o,e["measure__"+n+"__duration"]=u}),e.userTimingRaw=JSON.stringify({marks:o.marks,measures:o.measures}),e}}}(0,u))}(0,window["browser-metrics-aa-beacon"]);;
;
/* module-key = 'com.atlassian.plugins.browser.metrics.browser-metrics-plugin:impl', location = 'impl.js' */
window["browser-metrics-plugin"].install(function(t){require(["internal/browser-metrics","internal/browser-metrics-aa-beacon"],function(n,r){var e={},i={};i=function(t,n,r,e,i,o,u,a){Object.defineProperty(t,"__esModule",{value:!0});var c=n.addReporter,s=r.addReportMarshaller,f=r.addUrlCleaner;return c(e),s(i),f(o),f(u),f(a),t}(i,n,r,function(t,n,r){var e=/^(?:https?:)?\/\/[^\.]+\.cloudfront\.net\/p\/([^\/]+)\/main\.js$/,i=/^(?:https?:)?\/\/aes-artifacts--cdn\.[^\.]+\.atlassian\.io\/hashed\/([^\/]+)\/.+\.js$/,o=function(){var t=r.Deferred();return r(function(){var r=[];Array.prototype.slice.call(n.document.getElementsByTagName("script")||[]).forEach(function(t){var n=t.getAttribute("src"),o=n&&(n.match(i)||n.match(e));if(o&&o.length>1){var u=o[1];r.push({name:u,async:t.async})}}),t.resolve(r)}),t.promise()}().pipe(function(t){return{experiments:t}});return function(){return o}}(0,e=window,function(t,n){var r;try{r=n.require("jquery")}catch(t){r=n.jQuery}return r}(0,e)),function(t){return function(t){if(function(t){return Array.isArray(t.experiments)}(t))return{experiments:JSON.stringify(t.experiments.map(function(t){return[t.name,t.async?1:0]}))}}}(),function(t,n,r){var e=/^https:\/\/[^.]+\.cloudfront.net\/[^\/]+(\/wiki)?\/s\//g;return function(t){return t.match(e)?(t=n(t),t=r(t)):""}}(0,function(t,n){var r=/([&?][^&=]+)(=?)([^&#]*)/g;return function(t){return t.replace(r,function(t,r,e,i){return r+e+(n(i)?i:"☠")})}}(0,function(t){var n=/^(true|false|\d+)$/gi;return function(t){return!!t.match(n)}}()),function(t){var n=/(\/s\/).+(\/_\/)/;return function(t){return t.replace(n,function(t,n,r){return n+"☠"+r})}}()),function(t){var n=/^https:\/\/d2kryfvs3op226\.cloudfront\.net\/[a-f0-9]+\.[a-z]+$/g;return function(t){return t.match(n)?t:""}}(),function(t){var n=/^https:\/\/[^\/]+\.atl-paas.net\//g;return function(t){return t.match(n)?t:""}}()),t()})}),define("internal/browser-metrics-plugin/collector",function(){return{install:function(){!function(){var t,n,r,e,i,o,u,a,c,s,f,l,d,p,h,m,v,y,g,_,w,E,b,T,x,S,A,j,I,k;t=function(){return function(t){return{isInitial:"isInitial"in t&&t.isInitial,start:t.timestamp,end:null,key:t.key,threshold:t.threshold,reporters:t.reporters}}}(),r=function(t){return function(n){var r,e=t(n),i=n.threshold,o=4*n.threshold;return r=e.readyForUser<=i?1:e.readyForUser<=o?.5:0,{apdex:r}}}(n=function(){return function(t){return{readyForUser:t.end-t.start}}}()),function(){"use strict";function t(t){return"function"==typeof t}function n(){}function r(){for(var t=0;t<y;t+=2){(0,b[t])(b[t+1]),b[t]=void 0,b[t+1]=void 0}y=0}function i(){}function o(n,r){n===r?a(n,new TypeError("You cannot resolve a promise with itself")):function(t){return"function"==typeof t||"object"==typeof t&&null!==t}(r)?function(n,r){if(r.constructor===n.constructor)!function(t,n){n._state===x?u(t,n._result):t._state===S?a(t,n._result):c(n,void 0,function(n){o(t,n)},function(n){a(t,n)})}(n,r);else{var e=function(t){try{return t.then}catch(t){return A.error=t,A}}(r);e===A?a(n,A.error):void 0===e?u(n,r):t(e)?function(t,n,r){g(function(t){var e=!1,i=function(t,n,r,e){try{t.call(n,r,e)}catch(t){return t}}(r,n,function(r){e||(e=!0,n!==r?o(t,r):u(t,r))},function(n){e||(e=!0,a(t,n))},t._label);!e&&i&&(e=!0,a(t,i))},t)}(n,r,e):u(n,r)}}(n,r):u(n,r)}function u(t,n){t._state===T&&(t._result=n,t._state=x,0===t._subscribers.length||g(s,t))}function a(t,n){t._state===T&&(t._state=S,t._result=n,g(function(t){t._onerror&&t._onerror(t._result),s(t)},t))}function c(t,n,r,e){var i=t._subscribers,o=i.length;t._onerror=null,i[o]=n,i[o+x]=r,i[o+S]=e,0===o&&t._state&&g(s,t)}function s(t){var n=t._subscribers,r=t._state;if(0!==n.length){for(var e,i,o=t._result,u=0;u<n.length;u+=3)e=n[u],i=n[u+r],e?l(r,e,i,o):i(o);t._subscribers.length=0}}function f(){this.error=null}function l(n,r,e,i){var c,s,f,l,d=t(e);if(d){if((c=function(t,n){try{return t(n)}catch(t){return j.error=t,j}}(e,i))===j?(l=!0,s=c.error,c=null):f=!0,r===c)return void a(r,new TypeError("A promises callback cannot return that same promise."))}else c=i,f=!0;r._state!==T||(d&&f?o(r,c):l?a(r,s):n===x?u(r,c):n===S&&a(r,c))}function d(t,n,r,e){this._instanceConstructor=t,this.promise=new t(i,e),this._abortOnReject=r,this._validateInput(n)?(this._input=n,this.length=n.length,this._remaining=n.length,this._init(),0===this.length?u(this.promise,this._result):(this.length=this.length||0,this._enumerate(),0===this._remaining&&u(this.promise,this._result))):a(this.promise,this._validationError())}function p(n,r){this._id=k++,this._label=r,this._state=void 0,this._result=void 0,this._subscribers=[],i!==n&&(t(n)||function(){throw new TypeError("You must pass a resolver function as the first argument to the promise constructor")}(),this instanceof p||function(){throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.")}(),function(t,n){try{n(function(n){o(t,n)},function(n){a(t,n)})}catch(n){a(t,n)}}(this,n))}var h,m,v=h=Array.isArray?Array.isArray:function(t){return"[object Array]"===Object.prototype.toString.call(t)},y=(Date.now,Object.create,0),g=function(t,n){b[y]=t,b[y+1]=n,2===(y+=2)&&m()},_="undefined"!=typeof window?window:{},w=_.MutationObserver||_.WebKitMutationObserver,E="undefined"!=typeof Uint8ClampedArray&&"undefined"!=typeof importScripts&&"undefined"!=typeof MessageChannel,b=new Array(1e3);m="undefined"!=typeof process&&"[object process]"==={}.toString.call(process)?function(){process.nextTick(r)}:w?function(){var t=0,n=new w(r),e=document.createTextNode("");return n.observe(e,{characterData:!0}),function(){e.data=t=++t%2}}():E?function(){var t=new MessageChannel;return t.port1.onmessage=r,function(){t.port2.postMessage(0)}}():function(){setTimeout(r,1)};var T=void 0,x=1,S=2,A=new f,j=new f;d.prototype._validateInput=function(t){return v(t)},d.prototype._validationError=function(){return new Error("Array Methods must be provided an Array")},d.prototype._init=function(){this._result=new Array(this.length)};var I=d;d.prototype._enumerate=function(){for(var t=this.length,n=this.promise,r=this._input,e=0;n._state===T&&e<t;e++)this._eachEntry(r[e],e)},d.prototype._eachEntry=function(t,n){var r=this._instanceConstructor;!function(t){return"object"==typeof t&&null!==t}(t)?(this._remaining--,this._result[n]=this._makeResult(x,n,t)):t.constructor===r&&t._state!==T?(t._onerror=null,this._settledAt(t._state,n,t._result)):this._willSettleAt(r.resolve(t),n)},d.prototype._settledAt=function(t,n,r){var e=this.promise;e._state===T&&(this._remaining--,this._abortOnReject&&t===S?a(e,r):this._result[n]=this._makeResult(t,n,r)),0===this._remaining&&u(e,this._result)},d.prototype._makeResult=function(t,n,r){return r},d.prototype._willSettleAt=function(t,n){var r=this;c(t,void 0,function(t){r._settledAt(x,n,t)},function(t){r._settledAt(S,n,t)})};var k=0,P=p;p.all=function(t,n){return new I(this,t,!0,n).promise},p.race=function(t,n){var r=new this(i,n);if(!v(t))return a(r,new TypeError("You must pass an array to race.")),r;for(var e=t.length,u=0;r._state===T&&u<e;u++)c(this.resolve(t[u]),void 0,function(t){o(r,t)},function(t){a(r,t)});return r},p.resolve=function(t,n){if(t&&"object"==typeof t&&t.constructor===this)return t;var r=new this(i,n);return o(r,t),r},p.reject=function(t,n){var r=new this(i,n);return a(r,t),r},p.prototype={constructor:p,then:function(t,n,r){var e=this._state;if(e===x&&!t||e===S&&!n)return this;this._onerror=null;var o=new this.constructor(i,r),u=this._result;if(e){var a=arguments[e-1];g(function(){l(e,o,a,u)})}else c(this,o,t,n);return o},catch:function(t,n){return this.then(null,t,n)}};var C={Promise:P,polyfill:function(){var n;"Promise"in(n="undefined"!=typeof global?global:"undefined"!=typeof window&&window.document?window:self)&&"resolve"in n.Promise&&"reject"in n.Promise&&"all"in n.Promise&&"race"in n.Promise&&function(){var r;return new n.Promise(function(t){r=t}),t(r)}()||(n.Promise=P)}};e=C}.call(this),c=function(t,n,r,e){function i(){return u&&u.loadTimes}function o(){return void 0!==a.msFirstPaint}if(n){var u=e.chrome,a=n.timing;return function(n){return n.isInitial?(e.top===e.self&&(i()||o())?t(function(){return i()&&u.loadTimes().firstPaintTime>0?1e3*u.loadTimes().firstPaintTime-a.navigationStart:o()&&a.msFirstPaint>0?a.msFirstPaint-a.navigationStart:void 0},250):r.reject("The browser does not have a first paint metric")).then(function(t){return{firstPaint:t}},function(){return{}}):{}}}}(o=function(t){return function(n,r){return new t(function(t){function e(){var r=n();void 0!==r&&(clearInterval(i),t(r))}var i;i=setInterval(e,r),e()})}}(i=e.Promise),a=(u=window).performance,i,u),s=function(t){return{isInitial:t.isInitial}},f=function(t,n){var r="browser-metrics-journey";return function(){return void 0===n.sessionStorage?t.reject("sessionStorage is required to produce a report for this transition."):(null===n.sessionStorage.getItem(r)&&n.sessionStorage.setItem(r,"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(t){var r=16*n.Math.random()|0;return("x"===t?r:3&r|8).toString(16)})),t.resolve({journeyId:n.sessionStorage.getItem(r)}))}}(i,u),l=function(){return function(t){return{key:t.key}}}(),p=function(t,n){return function(r){var e={};return r.isInitial&&n()&&(e.navigationType=t.performance.navigation.type),e}}(u,d=function(t){return function(){return t.performance&&t.performance.navigation&&t.performance.timing&&void 0!==t.performance.timing.navigationStart}}(u)),h=function(t,n,r){return function(e){var i={};if(e.isInitial){if(!n())return t.reject("The navigation timing API is required to produce a report for this transition.");void 0!==r.performance.navigation.redirectCount&&(i.redirectCount=r.performance.navigation.redirectCount)}return t.resolve(i)}}(i,d,u),m=function(t){return function(n){var r=t.document.createElement("a");return r.href=n,r.href}}(u),y=function(t,n){return function(r){var e=n.onresourcetimingbufferfull||function(){};t(n.addEventListener)?n.addEventListener("resourcetimingbufferfull",r):n.onresourcetimingbufferfull=function(){r(),e()}}}(v=function(t){return"function"==typeof t},a),g=function(t,n){return function(){return n&&t(n.getEntriesByType)}}(v,a),b=function(t){return function(n){return n.isInitial?t().then(function(t){return 0===t.length?{resourceLoadedEnd:null}:{resourceLoadedEnd:t.map(function(t){return t.responseEnd}).reduce(function(t,n){return Math.max(t,n)})}}):{}}}(E=function(t,n,r,e){return function(){var i=function(){var n=e.document.querySelectorAll("script[src][async]");return Array.prototype.map.call(n,function(n){return t(n.src)})}();return r().then(function(t){return n().filter(function(t){return"link"===t.initiatorType||"script"===t.initiatorType}).filter(function(n){return n.responseEnd<t.domContentLoadedEventStart}).filter(function(t){return"script"!==t.initiatorType||-1===i.indexOf(t.name)})})}}(m,_=function(t,n,r,e){function i(){return r.getEntriesByType("resource").filter(function(t){return"img"!==t.initiatorType})}function o(){t(r.clearResourceTimings)&&(u=i(),r.clearResourceTimings())}var u=[];return g()?(o(),n(o),function(){return u.concat(i())}):function(){return[]}}(v,y,a),w=function(t,n,r,e){if(e){var i,o=e.timing,u="unloadEventStart,unloadEventEnd,redirectStart,redirectEnd,fetchStart,domainLookupStart,domainLookupEnd,connectStart,connectEnd,secureConnectionStart,requestStart,responseStart,responseEnd,domLoading,domInteractive,domContentLoadedEventStart,domContentLoadedEventEnd,domComplete,loadEventStart,loadEventEnd".split(",");return function(){return r()?(void 0===i&&(i=t(function(){var t={};if(o.loadEventEnd>0)return u.forEach(function(n){var r=o[n];r>0&&(t[n]=r-o.navigationStart)}),t},250)),i):n.reject("The navigation timing API is required to produce a report for this transition.")}}}(o,i,d,a),u)),T=function(t){return function(n){return n.isInitial?t().then(function(t){if(0===t.length)return{resourceLoadedStart:null};var n=t.map(function(t){return t.startTime});return{resourceLoadedStart:Math.min.apply(Math,n)}}):{}}}(E),x=function(t,n){var r="duration,initiatorType,name".split(","),e="startTime,connectEnd,connectStart,domainLookupEnd,domainLookupStart,fetchStart,redirectEnd,redirectStart,requestStart,responseEnd,responseStart,secureConnectionStart".split(",");return function(i){return t()?{resourceTiming:n().filter(function(t){var n=t.responseEnd;return n>=i.start&&n<=i.end&&t.startTime>=i.start}).map(function(t){var n={};return r.forEach(function(r){n[r]=t[r]}),e.forEach(function(r){n[r]=t[r]>0?t[r]-i.start:0}),n})}:{}}}(g,_),S=function(){return function(t){return{threshold:t.threshold}}}(),A=function(t){return function(n){return n.isInitial?t():{}}}(w),j=function(t){return function(){return{userAgent:t.navigator.userAgent}}}(u),I=function(t,n){return function(r){if(!n||!t(n.getEntriesByType))return{};var e=n.getEntriesByType("mark").filter(function(t){return t.startTime>=r.start&&t.startTime<=r.end}),i=n.getEntriesByType("measure").filter(function(t){return t.startTime>=r.start&&t.startTime+t.duration<=r.end});return{marks:e.map(function(t){return{name:t.name,time:t.startTime-r.start}}),measures:i.map(function(t){return{name:t.name,startTime:t.startTime-r.start,duration:t.duration}})}}}(v,a),function(t,n,r){if(a){var e=new t;n.delegateTo(e)}}(function(t,n,r){return function(){var e,i=[],o=[];return function(u){u.start?function(n){e=new t(n)}(u.start):u.end?function(t){e&&e.key===t.key&&(e.end=t.timestamp,r(e).then(function(t){o.push(t),i.forEach(function(n){n({report:t})})}),e=null)}(u.end):u.addReporter?function(t){n.add(t)}(u.addReporter):u.subscribe&&function(t){o.forEach(function(n){t({report:n})}),i.push(t)}(u.subscribe)}}}(t,k=function(t,e,i,o,u,a,d,m,v,y,g,_,w,E,k){var P=[r,c,s,f,l,p,n,h,b,T,x,S,A,j,I];return{get:function(){return P.concat()},add:function(t){P.push(t)}}}(),function(t,n,r,e,i,o){return function(t){var e=t.reporters,u=o.get().concat(e).map(function(n){var e;try{e=n(t)}catch(t){i(t),e={}}return function(t){return function(t){return r.all([t]).then(function(t){return t[0]})}(t).then(null,function(){return{}})}(e)});return r.all(u).then(function(t){return n.apply(void 0,t)})}}(0,function(){var t=Object.prototype.hasOwnProperty;return function(){for(var n,r,e={},i=0,o=arguments.length;i<o;i++){n=arguments[i];for(r in n)t.call(n,r)&&(e[r]=n[r])}return e}}(),i,0,function(t){return function(n){(t.console.error||t.console.log).call(t.console,n.stack||n)}}(u),k)),u["browser-metrics"])}()}}});;
;
/* module-key = 'com.atlassian.jira.plugins.jira-browser-metrics:contrib', location = 'contrib.js' */
window["browser-metrics-plugin"].install(function(r){require(["internal/browser-metrics","internal/browser-metrics-aa-beacon","jquery","jira/featureflags/feature-manager","jira/featureflags/simplified-ux-feature-manager"],function(e,t,n,o,i){var a,s={},u={},l={},d={},c={},p={},f={},m={},b={},R={},v={},g={},h={},y={},S={},w={},M={},j={},C={},I={},_={};s=function(r){r.window=(0,eval)("window");return r}(s),u=function(r,e){function t(){n||(n=e.window.WRM.data.claim(o));var r=n?{applicationHash:n}:{};return r}r.applicationHashReporter=t;var n=null,o="com.atlassian.jira.plugins.jira-browser-metrics:contrib.scm-commit-id";return r}(u,s),l=function(r){function e(r){return"string"==typeof r.applicationHash}function t(r){if(e(r))return{applicationHash:r.applicationHash}}return r.applicationHashReportMarshaller=t,r}(l),d=function(r,e){function t(r){return r.isInitial?n.promise():{}}r.applicationVersionReporter=t;var n=e.Deferred();return e(function(){var r={},t=e("meta[name=application-name]").data("version");t&&(r.applicationHash=t),n.resolve(r)}),r}(d,n),c=function(r){function e(r){return"string"==typeof r.applicationVersion}function t(r){if(e(r))return{applicationVersion:r.applicationVersion}}return r.applicationVersionReportMarshaller=t,r}(c),p=function(r,e){function t(r){return""+Number(r)===r}function n(r){return r.isInitial?o.promise():{}}r.serverDurationReporter=n;var o=e.Deferred();return e(function(){var r={},n=e("#jira_request_timing_info").find("[title=jira\\.request\\.server\\.time]").val();n&&t(n)&&(r.serverDuration=Number(n));var i=e("#jira_request_timing_info").find("[title=jira\\.request\\.server\\.head\\.time]").val();i&&t(i)&&(r.serverHeadDuration=Number(i));var a=e("#jira_request_timing_info").find("[title=jira\\.request\\.id]").val();a&&(r.serverOriginRequestId=a),o.resolve(r)}),r}(p,n),f=function(r){function e(r){return"number"==typeof r.serverDuration}function t(r){if(e(r))return{serverDuration:""+r.serverDuration,serverHeadDuration:""+r.serverHeadDuration,serverOriginRequestId:""+r.serverOriginRequestId}}return r.serverDurationReportMarshaller=t,r}(f),m=function(r,e){function t(r){return""+Number(r)===r}function n(r){return r.isInitial?o.promise():{}}r.databaseDurationReporter=n;var o=e.Deferred();return e(function(){var r={},n="#jira_request_timing_info",i=e(n).find("[title=db\\.reads\\.time\\.in\\.ms]").val(),a=e(n).find("[title=db\\.conns\\.time\\.in\\.ms]").val(),s=e(n).find("[title=db\\.reads\\.count]").val(),u=e(n).find("[title=head\\.db\\.reads\\.count]").val();i&&t(i)&&(r.dbReadsTimeInMs=Number(i)),a&&t(a)&&(r.dbConnsTimeInMs=Number(a)),s&&t(s)&&(r.dbReadsCount=Number(s)),u&&t(u)&&(r.dbReadsHeadCount=Number(u)),o.resolve(r)}),r}(m,n),b=function(r){function e(r){return"number"==typeof r.dbReadsTimeInMs||"number"==typeof r.dbConnsTimeInMs||"number"==typeof r.dbReadsCount||"number"==typeof r.dbReadsHeadCount}function t(r){if(e(r)){var t={dbReadsTimeInMs:""+(r.dbReadsTimeInMs||""),dbConnsTimeInMs:""+(r.dbConnsTimeInMs||"")};return r.dbReadsCount&&(t.dbReadsCount=r.dbReadsCount),r.dbReadsHeadCount&&(t.dbReadsHeadCount=r.dbReadsHeadCount),t}}return r.databaseDurationReportMarshaller=t,r}(b),R=function(r,e){function t(r){if(r.isInitial){o||(o=e.window.WRM.data.claim(n));var t=o?{correlationId:o}:{};return t}return{}}r.correlationIdReporter=t;var n="jira.request.correlation-id",o=null;return r}(R,s),v=function(r){function e(r){return"string"==typeof r.correlationId}function t(r){if(e(r))return{correlationId:r.correlationId}}return r.correlationIdReportMarshaller=t,r}(v),g=function(r,e){function t(r){var t={};if(e.window.performance&&e.window.performance.getEntriesByName&&r.isInitial){var n=e.window.performance.getEntriesByName("mark_fully_visible"),o=e.window.performance.getEntriesByName("mark_fully_loaded");if(n&&n.length>0&&o&&o.length>0){var i=n[0].startTime;t.deferScriptsStart=i;var a=o[0].startTime;t.deferScriptsEnd=a;var s=0,u=e.window.performance.getEntriesByName("defer_scripts_clicks");u&&u.forEach(function(r){var e=r.startTime;e>=i&&e<=a&&s++}),t.deferScriptsClicks=s;var l=0,d=e.window.performance.getEntriesByName("defer_scripts_keydowns");d&&d.forEach(function(r){var e=r.startTime;e>=i&&e<=a&&l++}),t.deferScriptsKeydowns=l}}return t}return r.deferScriptsReporter=t,r}(g,s),h=function(r){function e(r){var e={};return"number"==typeof r.deferScriptsStart&&(e.deferScriptsStart=Math.floor(r.deferScriptsStart)),"number"==typeof r.deferScriptsEnd&&(e.deferScriptsEnd=Math.floor(r.deferScriptsEnd)),"number"==typeof r.deferScriptsClicks&&(e.deferScriptsClicks=Math.floor(r.deferScriptsClicks)),"number"==typeof r.deferScriptsKeydowns&&(e.deferScriptsKeydowns=Math.floor(r.deferScriptsKeydowns)),e}return r.deferScriptsMarshaller=e,r}(h),y=function(r,e){function t(r){var t=e.isAdg3StylesEnabled();return{userAdg3Enabled:t}}return r.adg3StatusReporter=t,r}(y,i),S=function(r){function e(r){return"string"==typeof r.userAdg3Enabled}function t(r){if(e(r))return r}return r.adg3StatusReportMarshaller=t,r}(S),w=function(r,e){function t(){return{preloadFragments:e.isFeatureEnabled("project.config.dw.prefetch.resources.selection")}}return r.preloadFragmentsReporter=t,r}(w,o),M=function(r){function e(r){return{preloadFragments:r.preloadFragments}}return r.preloadFragmentsMarshaller=e,r}(M),j=function(r,e){function t(r){return r.isInitial?(o||(o=e.window.WRM.data.claim(n)),o?{jiraRolloutCohorts:o}:{}):{}}r.jiraRolloutCohortReporter=t;var n="com.atlassian.jira.plugins.jira-browser-metrics:contrib.jira-rollout-cohorts",o=null;return r}(j,s),C=function(r){function e(r){return"object"===n(r.jiraRolloutCohorts)}function t(r){if(e(r))return{jiraRolloutCohorts:JSON.stringify(r.jiraRolloutCohorts)}}r.jiraRolloutCohortReportMarshaller=t;var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(r){return typeof r}:function(r){return r&&"function"==typeof Symbol&&r.constructor===Symbol&&r!==Symbol.prototype?"symbol":typeof r};return r}(C),I=function(r,e){function t(){return{jsonFlagSupport:e.isFeatureEnabled("jira.json.flag.support")}}return r.jsonFlagSupportReporter=t,r}(I,o),_=function(r){function e(r){return{jsonFlagSupport:r.jsonFlagSupport}}return r.jsonFlagSupportMarshaller=e,r}(_),a=function(r,e,t,n,o,i,a,s,u,l,d,c,p,f,m,b,R,v,g,h,y,S){var w=y.addReporter,M=S.addReportMarshaller;w(r.applicationHashReporter),w(t.applicationVersionReporter),w(a.databaseDurationReporter),w(o.serverDurationReporter),w(u.correlationIdReporter),w(d.deferScriptsReporter),w(p.adg3StatusReporter),w(m.preloadFragmentsReporter),w(R.jiraRolloutCohortReporter),w(g.jsonFlagSupportReporter),M(e.applicationHashReportMarshaller),M(n.applicationVersionReportMarshaller),M(s.databaseDurationReportMarshaller),M(i.serverDurationReportMarshaller),M(l.correlationIdReportMarshaller),M(c.deferScriptsMarshaller),M(f.adg3StatusReportMarshaller),M(b.preloadFragmentsMarshaller),M(v.jiraRolloutCohortReportMarshaller),M(h.jsonFlagSupportMarshaller),y.subscribe(function(r){var e=document.getElementById("browser-metrics-report");null==e&&(e=document.createElement("div"),e.id="browser-metrics-report",e.style.display="none",document.body.appendChild(e)),e.textContent=JSON.stringify(r)})}(u,l,d,c,p,f,m,b,R,v,g,h,y,S,w,M,j,C,I,_,e,t),r()})});;