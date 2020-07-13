webpackJsonp([6],{"./node_modules/redux-batched-actions/lib/index.js":function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n.batchActions=function(e){return{type:arguments.length>1&&void 0!==arguments[1]?arguments[1]:r,meta:{batch:!0},payload:e}},n.enableBatching=function(e){return function n(t,r){return r&&r.meta&&r.meta.batch?r.payload.reduce(n,t):e(t,r)}},n.batchDispatchMiddleware=function(e){return function(n){return function(t){!function e(n,t){t.meta&&t.meta.batch?t.payload.forEach(function(t){e(n,t)}):n.dispatch(t)}(e,t),n(t)}}};var r=n.BATCH="BATCHING_REDUCER.BATCH"},"./node_modules/redux-logger/dist/redux-logger.js":function(e,n,t){(function(e){(function(n){"use strict";function t(e,n){e.super_=n,e.prototype=Object.create(n.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}})}function r(e,n){Object.defineProperty(this,"kind",{value:e,enumerable:!0}),n&&n.length&&Object.defineProperty(this,"path",{value:n,enumerable:!0})}function o(e,n,t){o.super_.call(this,"E",e),Object.defineProperty(this,"lhs",{value:n,enumerable:!0}),Object.defineProperty(this,"rhs",{value:t,enumerable:!0})}function a(e,n){a.super_.call(this,"N",e),Object.defineProperty(this,"rhs",{value:n,enumerable:!0})}function i(e,n){i.super_.call(this,"D",e),Object.defineProperty(this,"lhs",{value:n,enumerable:!0})}function s(e,n,t){s.super_.call(this,"A",e),Object.defineProperty(this,"index",{value:n,enumerable:!0}),Object.defineProperty(this,"item",{value:t,enumerable:!0})}function c(e,n,t){var r=e.slice((t||n)+1||e.length);return e.length=n<0?e.length+n:n,e.push.apply(e,r),e}function u(e){var n=void 0===e?"undefined":x(e);return"object"!==n?n:e===Math?"math":null===e?"null":Array.isArray(e)?"array":"[object Date]"===Object.prototype.toString.call(e)?"date":"function"==typeof e.toString&&/^\/.*\//.test(e.toString())?"regexp":"object"}function l(e,n,t,r,f,d,p){f=f||[],p=p||[];var m=f.slice(0);if(void 0!==d){if(r){if("function"==typeof r&&r(m,d))return;if("object"===(void 0===r?"undefined":x(r))){if(r.prefilter&&r.prefilter(m,d))return;if(r.normalize){var g=r.normalize(m,d,e,n);g&&(e=g[0],n=g[1])}}}m.push(d)}"regexp"===u(e)&&"regexp"===u(n)&&(e=e.toString(),n=n.toString());var h=void 0===e?"undefined":x(e),b=void 0===n?"undefined":x(n),y="undefined"!==h||p&&p[p.length-1].lhs&&p[p.length-1].lhs.hasOwnProperty(d),v="undefined"!==b||p&&p[p.length-1].rhs&&p[p.length-1].rhs.hasOwnProperty(d);if(!y&&v)t(new a(m,n));else if(!v&&y)t(new i(m,e));else if(u(e)!==u(n))t(new o(m,e,n));else if("date"===u(e)&&e-n!=0)t(new o(m,e,n));else if("object"===h&&null!==e&&null!==n)if(p.filter(function(n){return n.lhs===e}).length)e!==n&&t(new o(m,e,n));else{if(p.push({lhs:e,rhs:n}),Array.isArray(e)){var j;for(e.length,j=0;j<e.length;j++)j>=n.length?t(new s(m,j,new i(void 0,e[j]))):l(e[j],n[j],t,r,m,j,p);for(;j<n.length;)t(new s(m,j,new a(void 0,n[j++])))}else{var w=Object.keys(e),O=Object.keys(n);w.forEach(function(o,a){var i=O.indexOf(o);i>=0?(l(e[o],n[o],t,r,m,o,p),O=c(O,i)):l(e[o],void 0,t,r,m,o,p)}),O.forEach(function(e){l(void 0,n[e],t,r,m,e,p)})}p.length=p.length-1}else e!==n&&("number"===h&&isNaN(e)&&isNaN(n)||t(new o(m,e,n)))}function f(e,n,t,r){return r=r||[],l(e,n,function(e){e&&r.push(e)},t),r.length?r:void 0}function d(e,n,t){if(e&&n&&t&&t.kind){for(var r=e,o=-1,a=t.path?t.path.length-1:0;++o<a;)void 0===r[t.path[o]]&&(r[t.path[o]]="number"==typeof t.path[o]?[]:{}),r=r[t.path[o]];switch(t.kind){case"A":!function e(n,t,r){if(r.path&&r.path.length){var o,a=n[t],i=r.path.length-1;for(o=0;o<i;o++)a=a[r.path[o]];switch(r.kind){case"A":e(a[r.path[o]],r.index,r.item);break;case"D":delete a[r.path[o]];break;case"E":case"N":a[r.path[o]]=r.rhs}}else switch(r.kind){case"A":e(n[t],r.index,r.item);break;case"D":n=c(n,t);break;case"E":case"N":n[t]=r.rhs}return n}(t.path?r[t.path[o]]:r,t.index,t.item);break;case"D":delete r[t.path[o]];break;case"E":case"N":r[t.path[o]]=t.rhs}}}function p(e,n,t,r){var o=f(e,n);try{r?t.groupCollapsed("diff"):t.group("diff")}catch(e){t.log("diff")}o?o.forEach(function(e){var n,r=e.kind,o=function(e){var n=e.kind,t=e.path,r=e.lhs,o=e.rhs,a=e.index,i=e.item;switch(n){case"E":return[t.join("."),r,"\u2192",o];case"N":return[t.join("."),o];case"D":return[t.join(".")];case"A":return[t.join(".")+"["+a+"]",i];default:return[]}}(e);t.log.apply(t,["%c "+E[r].text,(n=r,"color: "+E[n].color+"; font-weight: bold")].concat(O(o)))}):t.log("\u2014\u2014 no diff \u2014\u2014");try{t.groupEnd()}catch(e){t.log("\u2014\u2014 diff end \u2014\u2014 ")}}function m(e,n,t,r){switch(void 0===e?"undefined":x(e)){case"object":return"function"==typeof e[r]?e[r].apply(e,O(t)):e[r];case"function":return e(n);default:return e}}function g(e,n){var t,r,o,a=n.logger,i=n.actionTransformer,s=n.titleFormatter,c=void 0===s?(r=(t=n).timestamp,o=t.duration,function(e,n,t){var a=["action"];return a.push("%c"+String(e.type)),r&&a.push("%c@ "+n),o&&a.push("%c(in "+t.toFixed(2)+" ms)"),a.join(" ")}):s,u=n.collapsed,l=n.colors,f=n.level,d=n.diff,g=void 0===n.titleFormatter;e.forEach(function(t,r){var o=t.started,s=t.startedTime,h=t.action,b=t.prevState,y=t.error,v=t.took,w=t.nextState,x=e[r+1];x&&(w=x.prevState,v=x.started-o);var O=i(h),_="function"==typeof u?u(function(){return w},h,t):u,E=j(s),S=l.title?"color: "+l.title(O)+";":"",A=["color: gray; font-weight: lighter;"];A.push(S),n.timestamp&&A.push("color: gray; font-weight: lighter;"),n.duration&&A.push("color: gray; font-weight: lighter;");var k=c(O,E,v);try{_?l.title&&g?a.groupCollapsed.apply(a,["%c "+k].concat(A)):a.groupCollapsed(k):l.title&&g?a.group.apply(a,["%c "+k].concat(A)):a.group(k)}catch(e){a.log(k)}var D=m(f,O,[b],"prevState"),P=m(f,O,[O],"action"),C=m(f,O,[y,b],"error"),N=m(f,O,[w],"nextState");if(D)if(l.prevState){var T="color: "+l.prevState(b)+"; font-weight: bold";a[D]("%c prev state",T,b)}else a[D]("prev state",b);if(P)if(l.action){var F="color: "+l.action(O)+"; font-weight: bold";a[P]("%c action    ",F,O)}else a[P]("action    ",O);if(y&&C)if(l.error){var M="color: "+l.error(y,b)+"; font-weight: bold;";a[C]("%c error     ",M,y)}else a[C]("error     ",y);if(N)if(l.nextState){var R="color: "+l.nextState(w)+"; font-weight: bold";a[N]("%c next state",R,w)}else a[N]("next state",w);d&&p(b,w,a,_);try{a.groupEnd()}catch(e){a.log("\u2014\u2014 log end \u2014\u2014")}})}function h(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=Object.assign({},S,e),t=n.logger,r=n.stateTransformer,o=n.errorTransformer,a=n.predicate,i=n.logErrors,s=n.diffPredicate;if(void 0===t)return function(){return function(e){return function(n){return e(n)}}};if(e.getState&&e.dispatch)return console.error("[redux-logger] redux-logger not installed. Make sure to pass logger instance as middleware:\n// Logger with default options\nimport { logger } from 'redux-logger'\nconst store = createStore(\n  reducer,\n  applyMiddleware(logger)\n)\n// Or you can create your own logger with custom options http://bit.ly/redux-logger-options\nimport createLogger from 'redux-logger'\nconst logger = createLogger({\n  // ...options\n});\nconst store = createStore(\n  reducer,\n  applyMiddleware(logger)\n)\n"),function(){return function(e){return function(n){return e(n)}}};var c=[];return function(e){var t=e.getState;return function(e){return function(u){if("function"==typeof a&&!a(t,u))return e(u);var l={};c.push(l),l.started=w.now(),l.startedTime=new Date,l.prevState=r(t()),l.action=u;var f=void 0;if(i)try{f=e(u)}catch(e){l.error=o(e)}else f=e(u);l.took=w.now()-l.started,l.nextState=r(t());var d=n.diff&&"function"==typeof s?s(t,u):n.diff;if(g(c,Object.assign({},n,{diff:d})),c.length=0,l.error)throw l.error;return f}}}}var b,y,v=function(e,n){return t="0",r=n-e.toString().length,new Array(r+1).join(t)+e;var t,r},j=function(e){return v(e.getHours(),2)+":"+v(e.getMinutes(),2)+":"+v(e.getSeconds(),2)+"."+v(e.getMilliseconds(),3)},w="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance:Date,x="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},O=function(e){if(Array.isArray(e)){for(var n=0,t=Array(e.length);n<e.length;n++)t[n]=e[n];return t}return Array.from(e)},_=[];b="object"===(void 0===e?"undefined":x(e))&&e?e:"undefined"!=typeof window?window:{},(y=b.DeepDiff)&&_.push(function(){void 0!==y&&b.DeepDiff===f&&(b.DeepDiff=y,y=void 0)}),t(o,r),t(a,r),t(i,r),t(s,r),Object.defineProperties(f,{diff:{value:f,enumerable:!0},observableDiff:{value:l,enumerable:!0},applyDiff:{value:function(e,n,t){e&&n&&l(e,n,function(r){t&&!t(e,n,r)||d(e,n,r)})},enumerable:!0},applyChange:{value:d,enumerable:!0},revertChange:{value:function(e,n,t){if(e&&n&&t&&t.kind){var r,o,a=e;for(o=t.path.length-1,r=0;r<o;r++)void 0===a[t.path[r]]&&(a[t.path[r]]={}),a=a[t.path[r]];switch(t.kind){case"A":!function e(n,t,r){if(r.path&&r.path.length){var o,a=n[t],i=r.path.length-1;for(o=0;o<i;o++)a=a[r.path[o]];switch(r.kind){case"A":e(a[r.path[o]],r.index,r.item);break;case"D":case"E":a[r.path[o]]=r.lhs;break;case"N":delete a[r.path[o]]}}else switch(r.kind){case"A":e(n[t],r.index,r.item);break;case"D":case"E":n[t]=r.lhs;break;case"N":n=c(n,t)}return n}(a[t.path[r]],t.index,t.item);break;case"D":case"E":a[t.path[r]]=t.lhs;break;case"N":delete a[t.path[r]]}}},enumerable:!0},isConflict:{value:function(){return void 0!==y},enumerable:!0},noConflict:{value:function(){return _&&(_.forEach(function(e){e()}),_=null),f},enumerable:!0}});var E={E:{color:"#2196F3",text:"CHANGED:"},N:{color:"#4CAF50",text:"ADDED:"},D:{color:"#F44336",text:"DELETED:"},A:{color:"#2196F3",text:"ARRAY:"}},S={level:"log",logger:console,logErrors:!0,collapsed:void 0,predicate:void 0,duration:!1,timestamp:!0,stateTransformer:function(e){return e},actionTransformer:function(e){return e},errorTransformer:function(e){return e},colors:{title:function(){return"inherit"},prevState:function(){return"#9E9E9E"},action:function(){return"#03A9F4"},nextState:function(){return"#4CAF50"},error:function(){return"#F20404"}},diff:!1,diffPredicate:void 0,transformer:void 0},A=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.dispatch,t=e.getState;return"function"==typeof n||"function"==typeof t?h()({dispatch:n,getState:t}):void console.error("\n[redux-logger v3] BREAKING CHANGE\n[redux-logger v3] Since 3.0.0 redux-logger exports by default logger with default settings.\n[redux-logger v3] Change\n[redux-logger v3] import createLogger from 'redux-logger'\n[redux-logger v3] to\n[redux-logger v3] import { createLogger } from 'redux-logger'\n")};n.defaults=S,n.createLogger=h,n.logger=A,n.default=A,Object.defineProperty(n,"__esModule",{value:!0})})(n)}).call(n,t("./node_modules/webpack/buildin/global.js"))},"./src/announcements/index.js":function(e,n,t){"use strict";t.d(n,"a",function(){return m});var r,o,a=t("./node_modules/react/index.js"),i=t.n(a),s=t("./src/common/app-base/index.js"),c=t("./src/common/components/app-style/index.js"),u=t("./src/announcements/ops/index.js"),l=t("./src/announcements/state/index.js"),f=t("./src/announcements/state/actions.js"),d=t("./src/announcements/view/index.js"),p=function(){function e(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(n,t,r){return t&&e(n.prototype,t),r&&e(n,r),n}}();var m=(o=r=function(e){function n(e){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,n);var t=function(e,n){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!n||"object"!=typeof n&&"function"!=typeof n?e:n}(this,(n.__proto__||Object.getPrototypeOf(n)).call(this,e));return t.store=Object(l.a)(u.a),t.store.dispatch(Object(f.d)(t.props)),t}return function(e,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function, not "+typeof n);e.prototype=Object.create(n&&n.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),n&&(Object.setPrototypeOf?Object.setPrototypeOf(e,n):e.__proto__=n)}(n,a["Component"]),p(n,[{key:"render",value:function(){return i.a.createElement(s.a,{store:this.store,locale:this.props.locale},i.a.createElement(c.a,null,i.a.createElement(d.a,null)))}}]),n}(),r.defaultProps={baseUrl:"",flags:[],locale:""},o)},"./src/announcements/model/index.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r});var r="adg2-off-warning"},"./src/announcements/ops/adg2-off-warning/actions.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r}),t.d(n,"b",function(){return o}),t.d(n,"d",function(){return a}),t.d(n,"c",function(){return i});var r="ops.adg2-off-warning.FLAG_ACTION_CLICK",o=function(){return{type:r}},a=function(){return{type:"ops.adg2-off-warning.SEND_HAS_SEEN_ADG2_OFF_WARNING_SUCCESS"}},i=function(){return{type:"ops.adg2-off-warning.SEND_HAS_SEEN_ADG2_OFF_WARNING_FAILURE"}}},"./src/announcements/ops/adg2-off-warning/index.js":function(e,n,t){"use strict";t("./node_modules/redux-observable/lib/es/index.js");var r=t("./node_modules/rxjs/Rx.js"),o=(t.n(r),t("./src/common/util/analytics/trigger-analytics.js")),a=t("./src/announcements/model/index.js"),i=t("./src/announcements/rest/adg2-off-warning/index.js"),s=t("./src/announcements/state/actions.js"),c=t("./src/announcements/state/selectors.js"),u=t("./src/announcements/ops/adg2-off-warning/actions.js"),l=function(e){return Object(i.a)(e).map(u.d).catch(function(){return r.Observable.of(Object(u.c)())})};n.a=function(e,n){return e.ofType(s.a,u.a).switchMap(function(e){var t=n.getState();switch(e.type){case s.a:return e.id===a.a?l(Object(c.a)(t)):r.Observable.empty();case u.a:return window.open("https://www.atlassian.com/blog/jira-software/your-teams-are-getting-better-navigation-in-jira-cloud","_blank"),Object(o.b)("announcements.flag.adg2OffWarning.actionClick"),l(Object(c.a)(t));default:return r.Observable.empty()}})}},"./src/announcements/ops/analytics/actions.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r}),t.d(n,"c",function(){return o}),t.d(n,"b",function(){return a}),t.d(n,"d",function(){return i});var r="ops.analytics.SEND_FLAG_DISMISSED_ANALYTIC",o=function(e){return{id:e,type:r}},a="ops.analytics.SEND_FLAG_SEEN_ANALYTIC",i=function(e){return{id:e,type:a}}},"./src/announcements/ops/analytics/index.js":function(e,n,t){"use strict";var r=t("./node_modules/redux-observable/lib/es/index.js"),o=t("./node_modules/rxjs/Rx.js"),a=(t.n(o),t("./src/common/util/analytics/safe-string.js")),i=t("./src/common/util/analytics/trigger-analytics.js"),s=t("./src/announcements/state/actions.js"),c=t("./src/announcements/ops/analytics/actions.js");n.a=Object(r.b)(function(e){return e.ofType(s.a).switchMap(function(e){return o.Observable.of(Object(c.c)(e.id))})},function(e){return e.ofType(c.a,c.b).switchMap(function(e){var n=e.type===c.b?"announcements.flag.flagSeen":"announcements.flag.flagDismissed",t=e.id,r=Object(a.c)(t)(t);return Object(i.b)(n,{flag:r}),o.Observable.empty()})},function(e){return e.ofType(s.b).switchMap(function(e){return o.Observable.from(e.payload.flags.map(c.d))})})},"./src/announcements/ops/index.js":function(e,n,t){"use strict";var r=t("./node_modules/redux-observable/lib/es/index.js"),o=t("./src/announcements/ops/adg2-off-warning/index.js"),a=t("./src/announcements/ops/analytics/index.js");n.a=Object(r.b)(o.a,a.a)},"./src/announcements/rest/adg2-off-warning/index.js":function(e,n,t){"use strict";t.d(n,"a",function(){return a});var r=t("./src/common/fetch/index.js"),o=t("./src/common/user-properties/get-user-property-url.js"),a=function(e){var n=Object(o.a)(e),t={method:"POST",body:JSON.stringify({key:"adg3.has.seen.graduation.warning",value:!0})};return Object(r.e)(n,t)}},"./src/announcements/state/actions.js":function(e,n,t){"use strict";t.d(n,"b",function(){return r}),t.d(n,"d",function(){return o}),t.d(n,"a",function(){return a}),t.d(n,"c",function(){return i});var r="state.SET_APP_PROPS",o=function(e){return{payload:e,type:r}},a="state.DISABLE_FLAG",i=function(e){return{id:e,type:a}}},"./src/announcements/state/index.js":function(e,n,t){"use strict";(function(e){var r=t("./src/common/tangerine/state/initiate.js"),o=t("./src/announcements/state/reducer.js");n.a=function(n){return Object(r.a)({appName:"announcements",rootReducer:o.default,rootEpic:n,hotReducerReplacement:function(n){return e.hot.accept("./reducer",function(){return n(t("./src/announcements/state/reducer.js").default)})}})}}).call(n,t("./node_modules/webpack/buildin/harmony-module.js")(e))},"./src/announcements/state/reducer.js":function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var r=t("./src/announcements/state/actions.js"),o=Object.assign||function(e){for(var n=1;n<arguments.length;n++){var t=arguments[n];for(var r in t)Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r])}return e},a={context:{baseUrl:"",locale:""},flags:[]};n.default=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:a,n=arguments[1];switch(n.type){case r.b:var t=n.payload,i=t.baseUrl,s=t.locale,c=t.flags;return o({},e,{context:{baseUrl:i,locale:s},flags:c});case r.a:var u=n.id,l=e.flags.filter(function(e){return e!==u});return o({},e,{flags:l});default:return e}}},"./src/announcements/state/selectors.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r}),t.d(n,"b",function(){return o});var r=function(e){return e.context.baseUrl},o=function(e,n){return e.flags.includes(n)}},"./src/announcements/view/adg2-off-warning/index.js":function(e,n,t){"use strict";var r=t("./node_modules/react-redux/es/index.js"),o=t("./src/announcements/ops/adg2-off-warning/actions.js"),a=t("./src/announcements/view/adg2-off-warning/view.js");n.a=Object(r.connect)(null,{onActionClick:o.b})(a.a)},"./src/announcements/view/adg2-off-warning/messages.js":function(e,n,t){"use strict";var r=t("./node_modules/react-intl/lib/index.es.js");n.a=Object(r.defineMessages)({title:{id:"announcements.adg2-off-warning.title",defaultMessage:"Jira's new look is coming your way"},description1:{id:"announcements.adg2-off-warning.description-1",defaultMessage:"Within the next two weeks, the ability to turn off the new Jira experience will be removed."},description2:{id:"announcements.adg2-off-warning.description-2",defaultMessage:"This change won't affect your existing data or configuration."},action:{id:"announcements.adg2-off-warning.action",defaultMessage:"Learn more"},infoIcon:{id:"announcements.adg2-off-warning.info-icon",defaultMessage:"Info"}})},"./src/announcements/view/adg2-off-warning/view.js":function(e,n,t){"use strict";var r,o,a=t("./node_modules/react/index.js"),i=t.n(a),s=t("./node_modules/react-intl/lib/index.es.js"),c=t("./node_modules/lodash/noop.js"),u=t.n(c),l=t("./src/common/components/flags/info-flag.js"),f=t("./src/announcements/view/adg2-off-warning/messages.js"),d=function(){function e(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(n,t,r){return t&&e(n.prototype,t),r&&e(n,r),n}}();var p=(o=r=function(e){function n(){return function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,n),function(e,n){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!n||"object"!=typeof n&&"function"!=typeof n?e:n}(this,(n.__proto__||Object.getPrototypeOf(n)).apply(this,arguments))}return function(e,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function, not "+typeof n);e.prototype=Object.create(n&&n.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),n&&(Object.setPrototypeOf?Object.setPrototypeOf(e,n):e.__proto__=n)}(n,a["Component"]),d(n,[{key:"render",value:function(){var e=this.props.intl.formatMessage;return i.a.createElement(l.a,{id:this.props.id,title:e(f.a.title),description:i.a.createElement("div",null,i.a.createElement("p",null,e(f.a.description1)),i.a.createElement("p",null,e(f.a.description2))),actions:[{content:e(f.a.action),onClick:this.props.onActionClick}],isDismissAllowed:this.props.isDismissAllowed,onDismissed:this.props.onDismissed})}}]),n}(),r.defaultProps={isDismissAllowed:!1,onActionClick:u.a,onDismissed:u.a},o);n.a=Object(s.injectIntl)(p)},"./src/announcements/view/index.js":function(e,n,t){"use strict";var r=t("./node_modules/react-redux/es/index.js"),o=t("./src/announcements/model/index.js"),a=t("./src/announcements/state/actions.js"),i=t("./src/announcements/state/selectors.js"),s=t("./src/announcements/view/adg2-off-warning/index.js"),c=t("./src/announcements/view/view.js");n.a=Object(r.connect)(function(e){return{flags:[{id:o.a,Flag:s.a}].filter(function(n){return Object(i.b)(e,n.id)})}},{onFlagDismissed:a.c})(c.a)},"./src/announcements/view/view.js":function(e,n,t){"use strict";t.d(n,"a",function(){return u});var r,o,a=t("./node_modules/react/index.js"),i=t.n(a),s=t("./node_modules/@atlaskit/flag/dist/esm/index.js"),c=function(){function e(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(n,t,r){return t&&e(n.prototype,t),r&&e(n,r),n}}();var u=(o=r=function(e){function n(){return function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,n),function(e,n){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!n||"object"!=typeof n&&"function"!=typeof n?e:n}(this,(n.__proto__||Object.getPrototypeOf(n)).apply(this,arguments))}return function(e,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function, not "+typeof n);e.prototype=Object.create(n&&n.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),n&&(Object.setPrototypeOf?Object.setPrototypeOf(e,n):e.__proto__=n)}(n,a["Component"]),c(n,[{key:"render",value:function(){return i.a.createElement(s.b,{onDismissed:this.props.onFlagDismissed},this.props.flags.map(function(e){return i.a.createElement(e.Flag,{key:e.id,id:e.id})}))}}]),n}(),r.defaultProps={flags:[],onFlagDismissed:function(){}},o)},"./src/common/components/app-style/index.js":function(e,n,t){"use strict";var r,o,a=t("./node_modules/styled-components/dist/styled-components.browser.es.js"),i=t("./node_modules/@atlaskit/util-shared-styles/dist/bundle.js"),s=(t.n(i),r=["\n    font-family: ",";\n    font-size: ",";\n    height: inherit;\n    letter-spacing: normal;\n"],o=["\n    font-family: ",";\n    font-size: ",";\n    height: inherit;\n    letter-spacing: normal;\n"],Object.freeze(Object.defineProperties(r,{raw:{value:Object.freeze(o)}})));n.a=a.default.div(s,i.akFontFamily,i.akFontSizeDefault)},"./src/common/components/flags/info-flag.js":function(e,n,t){"use strict";t.d(n,"a",function(){return l});var r,o,a=t("./node_modules/react/index.js"),i=t.n(a),s=t("./src/common/components/flags/common-flag.js"),c=Object.assign||function(e){for(var n=1;n<arguments.length;n++){var t=arguments[n];for(var r in t)Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r])}return e},u=function(){function e(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(n,t,r){return t&&e(n.prototype,t),r&&e(n,r),n}}();var l=(o=r=function(e){function n(){return function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,n),function(e,n){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!n||"object"!=typeof n&&"function"!=typeof n?e:n}(this,(n.__proto__||Object.getPrototypeOf(n)).apply(this,arguments))}return function(e,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function, not "+typeof n);e.prototype=Object.create(n&&n.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),n&&(Object.setPrototypeOf?Object.setPrototypeOf(e,n):e.__proto__=n)}(n,a["PureComponent"]),u(n,[{key:"render",value:function(){return i.a.createElement(s.a,c({},this.props,{flagType:"info"}))}}]),n}(),r.defaultProps={description:null,actions:[]},o)},"./src/common/tangerine/state/action-listener-middleware.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r});var r=function e(){var n=this;!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e),this.listeners=[],this.add=function(e){n.listeners.push(e)},this.remove=function(e){n.listeners=n.listeners.filter(function(n){return n!==e})},this.perform=function(e){return function(t){return function(r){var o=t(r);return n.listeners.forEach(function(n){return n(r,e.getState())}),o}}}}},"./src/common/tangerine/state/initiate.js":function(e,n,t){"use strict";(function(e){var r=t("./node_modules/react/index.js"),o=(t.n(r),t("./node_modules/redux/es/index.js")),a=t("./node_modules/redux-batched-actions/lib/index.js"),i=(t.n(a),t("./node_modules/redux-observable/lib/es/index.js")),s=t("./src/common/util/index.js"),c=t("./src/common/util/debug.js"),u=t("./src/common/tangerine/state/action-listener-middleware.js");n.a=function(n){var l=n.appName,f=n.rootReducer,d=n.rootEpic,p=n.hotReducerReplacement,m=n.middlewares,g=void 0===m?[]:m,h=new u.a;if(g.push(h.perform),Object(c.a)("redux-logger")){var b=t("./node_modules/redux-logger/dist/redux-logger.js").logger;g.push(b)}d&&g.push(Object(i.c)(d));var y=Object(o.createStore)(Object(a.enableBatching)(f),void 0,Object(s.b)({name:l,serialize:{replacer:function(e,n){return Object(r.isValidElement)(n)?n.type&&n.type.displayName?"React Element <"+n.type.displayName+">":"React Element":n}}})(o.applyMiddleware.apply(void 0,function(e){if(Array.isArray(e)){for(var n=0,t=Array(e.length);n<e.length;n++)t[n]=e[n];return t}return Array.from(e)}(g))));return y.addActionListener=h.add,y.removeActionListener=h.remove,p&&e.hot&&p(function(e){y.replaceReducer(Object(a.enableBatching)(e))}),y}}).call(n,t("./node_modules/webpack/buildin/harmony-module.js")(e))},"./src/common/user-properties/get-user-property-url.js":function(e,n,t){"use strict";n.a=function(e,n){return n?e+"/rest/api/2/userProperties?key="+n:e+"/rest/api/2/userProperties"}},"./src/common/util/debug.js":function(e,n,t){"use strict";t.d(n,"a",function(){return r});var r=function(e){return"".split(",").includes(e)}},"./src/entry/announcements/index.js":function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var r=t("./node_modules/react/index.js"),o=t.n(r),a=t("./node_modules/react-dom/index.js"),i=(t.n(a),t("./src/common/util/index.js")),s=t("./src/announcements/index.js"),c=t("./src/announcements/model/index.js"),u=t("./src/entry/announcements/extractors.js"),l=Object(i.h)(),f=l.baseUrl,d=l.locale,p=function(){var e=Object(u.a)()?[c.a]:[];if(e.length){var n=document.getElementById("announcements-app");n||(n=function(){var e=document.createElement("div");if(e.id="announcements-app",!document.body)throw new Error("document.body was not found whilst trying to create the announcements-app placeholder.");return document.body.appendChild(e),e}()),Object(a.render)(o.a.createElement(s.a,{baseUrl:f,locale:d,flags:e}),n)}};p()}});
//# sourceMappingURL=async-announcements.85ec32a5a91d3245e7a4.7.js.map