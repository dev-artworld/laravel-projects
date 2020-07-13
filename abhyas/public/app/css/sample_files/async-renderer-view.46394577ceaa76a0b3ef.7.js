webpackJsonp([74],{"./src/issue/media/components/create-auth-provider.js":function(e,t,r){"use strict";r.d(t,"a",function(){return i}),r.d(t,"b",function(){return a});var n=this;function o(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,r){return function n(o,i){try{var a=t[o](i),u=a.value}catch(e){return void r(e)}if(!a.done)return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)});e(u)}("next")})}}var i=function(e,t){return r=o(regeneratorRuntime.mark(function r(o){return regeneratorRuntime.wrap(function(r){for(;;)switch(r.prev=r.next){case 0:return r.t0=t,r.next=3,e(o?o.collectionName:void 0);case 3:return r.t1=r.sent,r.abrupt("return",{clientId:r.t0,token:r.t1});case 5:case"end":return r.stop()}},r,n)})),function(e){return r.apply(this,arguments)};var r},a=function(e){return o(regeneratorRuntime.mark(function t(){return regeneratorRuntime.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",e);case 1:case"end":return t.stop()}},t,n)}))}},"./src/issue/media/components/with-media-provider/create-media-provider.js":function(e,t,r){"use strict";var n,o,i=r("./src/issue/media/components/create-auth-provider.js"),a=this;t.a=(n=regeneratorRuntime.mark(function e(t,r,n){var o,u,s,c;return regeneratorRuntime.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return o=t.viewContext,u=t.uploadContext,s=t.userAuth,c=Promise.resolve({serviceHost:o.serviceHost,authProvider:Object(i.a)(r,o.clientId)}),e.abrupt("return",u?{viewContext:c,uploadContext:Promise.resolve({serviceHost:u.serviceHost,authProvider:Object(i.a)(r,u.clientId),userAuthProvider:s?Object(i.b)(s):null}),uploadParams:{collection:u.collection,dropzoneContainer:n}}:{viewContext:c});case 3:case"end":return e.stop()}},e,a)}),o=function(){var e=n.apply(this,arguments);return new Promise(function(t,r){return function n(o,i){try{var a=e[o](i),u=a.value}catch(e){return void r(e)}if(!a.done)return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)});t(u)}("next")})},function(e,t,r){return o.apply(this,arguments)})},"./src/issue/media/components/with-media-provider/with-media-provider.js":function(e,t,r){"use strict";var n=r("./node_modules/react/index.js"),o=r.n(n),i=r("./src/issue/media/components/with-token-provider/with-token-provider.js"),a=r("./src/issue/media/components/with-media-provider/create-media-provider.js"),u=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},s=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,r,n){return r&&e(t.prototype,r),n&&e(t,n),t}}();function c(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}var p=function(e){return function(t){function r(){var e,t,n;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,r);for(var o=arguments.length,i=Array(o),u=0;u<o;u++)i[u]=arguments[u];return t=n=c(this,(e=r.__proto__||Object.getPrototypeOf(r)).call.apply(e,[this].concat(i))),n.state={mediaProvider:null},n.initializeMediaProvider=function(e){if(!n.state.mediaProvider&&e){var t=n.props,r=t.mediaContext,o=t.tokenProvider,i=Object(a.a)(r,o,e);n.setState({mediaProvider:i})}},c(n,t)}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(r,n["Component"]),s(r,[{key:"render",value:function(){var t=this.props,r=(t.mediaContext,t.tokenProvider,function(e,t){var r={};for(var n in e)t.indexOf(n)>=0||Object.prototype.hasOwnProperty.call(e,n)&&(r[n]=e[n]);return r}(t,["mediaContext","tokenProvider"]));return o.a.createElement("div",{ref:this.initializeMediaProvider},this.state.mediaProvider&&o.a.createElement(e,u({mediaProvider:this.state.mediaProvider},r)))}}]),r}()};t.a=function(e){return Object(i.a)(p(e))}},"./src/issue/media/components/with-token-provider/with-token-provider.js":function(e,t,r){"use strict";var n=r("./node_modules/react/index.js"),o=r.n(n),i=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},a=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,r,n){return r&&e(t.prototype,r),n&&e(t,n),t}}();t.a=function(e){return function(t){function r(e){var t=this;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,r);var n,o,i=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(r.__proto__||Object.getPrototypeOf(r)).call(this,e));return i.resetViewTokenPromise=function(){i.viewTokenPromise=new Promise(function(e){i.resolveViewTokenPromise=e})},i.updateViewTokenPromise=function(e){var t=e.viewContext;t.areTokenPermissionsUpToDate&&t.token?i.resolveViewTokenPromise(t.token):i.resetViewTokenPromise()},i.tokenProvider=(n=regeneratorRuntime.mark(function e(r){var n;return regeneratorRuntime.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:if(r){e.next=2;break}return e.abrupt("return",i.viewTokenPromise);case 2:if(!(n=i.props.mediaContext.uploadContext)){e.next=5;break}return e.abrupt("return",n.token);case 5:throw new Error("Upload token not available");case 6:case"end":return e.stop()}},e,t)}),o=function(){var e=n.apply(this,arguments);return new Promise(function(t,r){return function n(o,i){try{var a=e[o](i),u=a.value}catch(e){return void r(e)}if(!a.done)return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)});t(u)}("next")})},function(e){return o.apply(this,arguments)}),i.resetViewTokenPromise(),i.updateViewTokenPromise(e.mediaContext),i}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(r,n["Component"]),a(r,[{key:"componentWillReceiveProps",value:function(e){this.updateViewTokenPromise(e.mediaContext)}},{key:"render",value:function(){return o.a.createElement(e,i({tokenProvider:this.tokenProvider},this.props))}}]),r}()}},"./src/issue/views/common/renderer/renderer-view.js":function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=r("./src/issue/media/components/with-media-provider/with-media-provider.js"),o=r("./src/issue/views/common/renderer/async-renderer.js");t.default=Object(n.a)(o.b)}});
//# sourceMappingURL=async-renderer-view.5a4a393755541faa0d24.7.js.map