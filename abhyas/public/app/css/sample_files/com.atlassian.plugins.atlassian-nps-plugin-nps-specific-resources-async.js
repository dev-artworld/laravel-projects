;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = '/js/nps/main.js' */
define("atlassian-nps-plugin/js/nps/main",["atlassian-nps-plugin/js/amd-shims/ajs","atlassian-nps-plugin/js/nps/survey-dialog","atlassian-nps-plugin/js/nps/survey-flags","atlassian-nps-plugin/js/nps/client-storage","atlassian-nps-plugin/js/nps/session-manager","atlassian-nps-plugin/js/nps/submission"],function(a,e,g,d,f,c){function h(i){a.bind("/nps/openSurvey",function(){c.startSurvey();d.remove("displayCount");i.scheduleNextSurveyDate().then(function(){f.reset();e.showDialog()})});a.bind("/nps/cancelSurvey",function(m,l){c.cancelSurvey(l);if(l==="notification"){d.remove("displayCount");i.scheduleNextSurveyDate().then(function(){f.reset();b(i)})}else{b(i)}});a.bind("/nps/dismissSurvey",function(m,l){c.cancelSurvey(l);i.setConfig("optedOut",true);d.remove("displayCount")});a.bind("/nps/surveyCompleted",function(m,l){c.submitSurvey(l);i.setConfig("dismissedCount",0);g.showConfirmationFlag();if(a.DarkFeatures&&a.DarkFeatures.isEnabled("nps.survey.inline.dialog")){d.remove("displayCount");i.scheduleNextSurveyDate().then(function(){f.reset()})}});var j=parseInt(i.getCachedData().dismissedCount,10);var k=j>=3;if(a.DarkFeatures&&a.DarkFeatures.isEnabled("nps.survey.inline.dialog")){c.startSurvey();require(["atlassian-nps-plugin/js/nps/survey-inline-dialog"],function(l){l.show(k)})}else{g.showNotificationFlag(k)}}function b(j){var i=parseInt(j.getCachedData().dismissedCount,10);j.setConfig("dismissedCount",i+1)}return{launch:h}});;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = '/js/nps/survey-flags.js' */
define("atlassian-nps-plugin/js/nps/survey-flags",["atlassian-nps-plugin/js/amd-shims/ajs","atlassian-nps-plugin/js/amd-shims/templates","jquery","aui/flag","atlassian-nps-plugin/js/nps/product"],function(b,c,f,a,d){var e={};e.showConfirmationFlag=function(){if(!f("#nps-header-confirmation").length){var h=c.surveyConfirmationFlagTitle();var i=c.surveyConfirmationFlagBody({productName:d.getProductName()});var g=f(a({type:"success",close:"auto",title:h,body:i}));g.attr("id","nps-header-confirmation")}};e.showNotificationFlag=function(j){if(!f("#nps-header-notification").length){var i=c.surveyNotificationFlagTitle({productName:d.getProductName()});var g=c.surveyNotificationFlagBody({showOptOutOption:j});var h=f(a({type:"info",close:"manual",title:i,body:g}));h.attr("id","nps-header-notification");f("#nps-header-notification-open-survey").click(function(){e.removeSurveyFlag();b.trigger("/nps/openSurvey")});f("#nps-header-notification .icon-close").click(function(){b.trigger("/nps/cancelSurvey","notification")});f("#nps-header-notification-dismiss-survey").click(function(){e.removeSurveyFlag();b.trigger("/nps/dismissSurvey","dismiss")})}};e.removeSurveyFlag=function(){f("#nps-header-notification").remove()};return e});;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = '/js/nps/survey-dialog.js' */
define("atlassian-nps-plugin/js/nps/survey-dialog",["atlassian-nps-plugin/js/nps/util","atlassian-nps-plugin/js/nps/product","atlassian-nps-plugin/js/amd-shims/ajs","atlassian-nps-plugin/js/amd-shims/templates","jquery"],function(j,f,i,k,d){var a={};var c={};a.previewDialog=function(){var m=g();i.dialog2(m).show();m.on("click","#nps-rank-buttons > button",function(o){var n=d(o.target);m.find("#nps-rank-buttons > button").removeClass("nps-rank-selected");n.addClass("nps-rank-selected");n.blur()});var l=m.find("#nps-cancel-button");l.on("click",function(){i.dialog2("#nps-survey-dialog").remove()})};a.showDialog=function(){var m=g();i.dialog2(m).show();d(".aui-button").blur();m.on("click","#nps-rank-buttons > button",function(q){var p=d(q.target);m.find("#nps-rank-buttons > button").removeClass("nps-rank-selected");p.addClass("nps-rank-selected");p.blur();a.rankSelected=parseInt(p.text(),10);h()});var n=m.find("#nps-role");n.on("change",function(){a.roleSelected=this.value;h()});var o=m.find("#nps-send-button");o.on("click",function(){c.rank=a.rankSelected;c.role=a.roleSelected;var p=d("#nps-comment").val();if(p){c.comment=p}if(f.isServerMode()){i.dialog2("#nps-survey-dialog").hide();i.trigger("/nps/surveyCompleted",c)}else{e()}});var l=m.find("#nps-cancel-button");l.on("click",function(){i.dialog2("#nps-survey-dialog").hide();i.trigger("/nps/cancelSurvey","click")})};function g(){return d(k.survey({productName:f.getProductName(),roles:b()}))}function b(){var m=[{value:"",text:"Choose role",disabled:true,selected:true}];var l=[{value:"software-engineer",text:"Software Engineering"},{value:"product-manager",text:"Product Management"},{value:"qa",text:"Quality Assurance"},{value:"design",text:"Design"},{value:"management",text:"Management"},{value:"sys-admin",text:"Systems Administration"}];var n=[{value:"other",text:"Other"}];return m.concat(j.kfyShuffle(l)).concat(n)}function e(){i.dialog2("#nps-survey-dialog").hide();var l=d(k.contact({productName:f.getProductName()}));i.dialog2(l).show();d("#nps-done-button").on("click",function(){var n=d("#nps-contact-name").val();if(n){c.name=n.trim()}var m=d("#nps-contact-email").val();if(m){c.email=m.trim()}if(typeof f.getApplicationKey==="function"){c.applicationKey=f.getApplicationKey()}i.dialog2("#nps-contact-dialog").hide();i.trigger("/nps/surveyCompleted",c)});d("#nps-contact-name").focus()}function h(){var m=!!a.roleSelected&&!isNaN(a.rankSelected);var l=d("#nps-send-button");l.attr("aria-disabled",m?"false":"true");if(m){l.removeAttr("disabled")}else{l.attr("disabled","")}}return a});;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = '/js/nps/survey-inline-dialog.js' */
define("atlassian-nps-plugin/js/nps/survey-inline-dialog",["atlassian-nps-plugin/js/nps/util","atlassian-nps-plugin/js/nps/product","atlassian-nps-plugin/js/amd-shims/ajs","atlassian-nps-plugin/js/amd-shims/templates","jquery","skate","aui/inline-dialog2"],function(e,m,h,d,c,r){var u="nps-survey-inline-dialog";var l={};l.eventAttrs={};function k(){if(typeof m.getInlineDialogAlignment==="function"){return m.getInlineDialogAlignment()}else{return"bottom right"}}l.show=function(x){var w=o({id:u,trigger:m.getSurveyTrigger(),productName:m.getProductName(),roles:v(),showOptOutOption:x,isServerMode:m.isServerMode(),alignment:k()});setTimeout(function(){s(w,false);g(w);b(w);q(w);if(typeof m.hasAdg3NavigationSidebar==="function"&&m.hasAdg3NavigationSidebar()){w.addClass(m.getAdg3SurveyInlineDialogClass())}},0)};l.preview=function(){var w=o({id:u,trigger:"#nps-preview",productName:m.getProductName(),roles:v(),showOptOutOption:false,isServerMode:m.isServerMode()});setTimeout(function(){s(w,true);g(w);w.find("#nps-send-button").prop("disabled",true);b(w);q(w)},0)};function o(y){var w=c(y.trigger);w.attr({"aria-controls":u});var x=c(d.surveyInlineDialog({data:y}));x.appendTo("body");r.init(x[0]);return x}function s(z,x){z.find(".nps-close-icon").on("click",function(){z.trigger("aui-layer-hide")});z.on("aui-layer-hide",function(){if(x===false){j()}});var w=z.find("#nps-rank-buttons > .rank-button");w.click(function(C){w.removeClass("nps-rank-selected");var B=c(C.target);B.addClass("nps-rank-selected");B.blur();if(x===false){l.eventAttrs.rank=parseInt(B.text(),10);window.onbeforeunload=j}z.find(".comment-session").show()});if(x===false){var A=z.find("#nps-send-button");A.on("click",n);var y=z.find("#nps-done-button");y.on("click",t);z.find(".nps-dismiss-forever").on("click",a)}}function v(){var x=[{value:"",text:"Choose role",disabled:true,selected:true}];var w=[{value:"software-engineer",text:"Software Engineering"},{value:"product-manager",text:"Product Management"},{value:"qa",text:"Quality Assurance"},{value:"design",text:"Design"},{value:"management",text:"Management"},{value:"sys-admin",text:"Systems Administration"}];var y=[{value:"other",text:"Other"}];return x.concat(e.kfyShuffle(w)).concat(y)}function j(){var w=!c.isEmptyObject(l.eventAttrs);if(w){if(typeof m.getApplicationKey==="function"){l.eventAttrs.applicationKey=m.getApplicationKey()}i(l.eventAttrs);f(l.eventAttrs);h.trigger("/nps/surveyCompleted",l.eventAttrs);delete l.eventAttrs}else{h.trigger("/nps/cancelSurvey","notification")}c("#nps-survey-inline-dialog").remove()}function i(x){if(typeof m.getAdg3Flags==="function"){var w=m.getAdg3Flags();x.simplifiedNavigationEnabled=w.simplifiedNavigationEnabled;x.adg3GraduatedStylesEnabled=w.adg3GraduatedStylesEnabled;x.userAdg3Enabled=w.userAdg3Enabled}}function f(w){if(typeof m.isUserSiteAdmin==="function"){w.isUserSiteAdmin=m.isUserSiteAdmin()}}function g(w){h.dialog2.on("show",function(){w.hide()});h.dialog2.on("hide",function(){w.show()});h.bind("show.dialog",function(){w.hide()});h.bind("hide.dialog",function(){w.show()});h.bind("remove.dialog",function(){w.show()})}function n(w){w.preventDefault();c(this).prop("disabled",true);var y=c.trim(c("#nps-comment").val());if(y){l.eventAttrs.comment=y}var x=c.trim(c("#nps-role").val());if(x){l.eventAttrs.role=x}if(m.isServerMode()){j();c("#nps-survey-inline-dialog").remove()}else{c(".survey-screen").hide();c(".survey-screen.screen-2").show()}}function t(x){x.preventDefault();var w=c("#nps-allow-contact").is(":checked");if(w){l.eventAttrs.allowContact=w}j();c("#nps-survey-inline-dialog").remove()}function b(w){setTimeout(function(){w.find(".aui-button").blur()},50)}function a(){h.trigger("/nps/dismissSurvey","dismiss");c("#nps-survey-inline-dialog").remove()}function p(w){if(w[0].hide){w[0].hide()}else{w[0].removeAttribute("open")}}function q(w){if(w[0].show){w[0].show()}else{w[0].open=true}}return l});;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = 'soy/contact.soy' */
// This file was automatically generated from contact.soy.
// Please don't edit this file by hand.

/**
 * @fileoverview Templates in namespace NPS.Templates.
 */

if (typeof NPS == 'undefined') { var NPS = {}; }
if (typeof NPS.Templates == 'undefined') { NPS.Templates = {}; }


NPS.Templates.contact = function(opt_data, opt_ignored) {
  return '' + aui.dialog.dialog2({modal: true, size: 'large', id: 'nps-contact-dialog', titleText: 'Thanks for your feedback!', content: '' + aui.form.form({isTopLabels: true, content: '<p>' + soy.$$escapeHtml(AJS.format('We\x27\x27d love to get in touch to discuss your feedback with {0}, so leave your contact details below if you\x27\x27d like to continue the conversation. Otherwise just hit Done to finish!',opt_data.productName)) + '</p><br>' + aui.form.fieldGroup({content: '' + aui.form.label({content: 'Your name', forField: 'nps-contact-name'}) + aui.form.textField({id: 'nps-contact-name', maxLength: 100, placeholderText: 'Optional'})}) + aui.form.fieldGroup({content: '' + aui.form.label({content: 'Email address', forField: 'nps-contact-email'}) + aui.form.textField({id: 'nps-contact-email', maxLength: 100, placeholderText: 'Optional'})})}), footerActionContent: '' + aui.buttons.button({type: 'primary', id: 'nps-done-button', text: 'Done'})});
};
if (goog.DEBUG) {
  NPS.Templates.contact.soyTemplateName = 'NPS.Templates.contact';
}
;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = 'soy/survey-flags.soy' */
// This file was automatically generated from survey-flags.soy.
// Please don't edit this file by hand.

/**
 * @fileoverview Templates in namespace NPS.Templates.
 */

if (typeof NPS == 'undefined') { var NPS = {}; }
if (typeof NPS.Templates == 'undefined') { NPS.Templates = {}; }


NPS.Templates.surveyNotificationFlagTitle = function(opt_data, opt_ignored) {
  return '' + soy.$$escapeHtml(AJS.format('Help us improve your {0} experience!',opt_data.productName));
};
if (goog.DEBUG) {
  NPS.Templates.surveyNotificationFlagTitle.soyTemplateName = 'NPS.Templates.surveyNotificationFlagTitle';
}


NPS.Templates.surveyNotificationFlagBody = function(opt_data, opt_ignored) {
  return soy.$$escapeHtml('It\x27ll only take a second.') + '<div>' + aui.buttons.button({id: 'nps-header-notification-open-survey', type: 'link', text: 'Sure, I\x27ll help'}) + ((opt_data.showOptOutOption == true) ? aui.buttons.button({id: 'nps-header-notification-dismiss-survey', type: 'link', text: 'Dismiss forever'}) : '') + '</div>';
};
if (goog.DEBUG) {
  NPS.Templates.surveyNotificationFlagBody.soyTemplateName = 'NPS.Templates.surveyNotificationFlagBody';
}


NPS.Templates.surveyConfirmationFlagTitle = function(opt_data, opt_ignored) {
  return '' + soy.$$escapeHtml('Thanks for your feedback!');
};
if (goog.DEBUG) {
  NPS.Templates.surveyConfirmationFlagTitle.soyTemplateName = 'NPS.Templates.surveyConfirmationFlagTitle';
}


NPS.Templates.surveyConfirmationFlagBody = function(opt_data, opt_ignored) {
  return '<p>' + soy.$$escapeHtml(AJS.format('We\x27\x27ll use your feedback to improve {0}.',opt_data.productName)) + '</p>';
};
if (goog.DEBUG) {
  NPS.Templates.surveyConfirmationFlagBody.soyTemplateName = 'NPS.Templates.surveyConfirmationFlagBody';
}
;
;
/* module-key = 'com.atlassian.plugins.atlassian-nps-plugin:nps-specific-resources-async', location = 'soy/survey.soy' */
// This file was automatically generated from survey.soy.
// Please don't edit this file by hand.

/**
 * @fileoverview Templates in namespace NPS.Templates.
 */

if (typeof NPS == 'undefined') { var NPS = {}; }
if (typeof NPS.Templates == 'undefined') { NPS.Templates = {}; }


NPS.Templates.survey = function(opt_data, opt_ignored) {
  var param10 = aui.form.label({content: AJS.format('1. How likely would you be to recommend {0} to a friend or colleague?',opt_data.productName)}) + '<div id="nps-rating-bar"><div id="nps-low-rank-cell"><div id="nps-low-rank-text" class="nps-low-emphasis">' + soy.$$escapeHtml('Not likely') + '</div></div><div id="nps-rank-cell">';
  var param17 = '';
  for (var x18 = 0; x18 < 11; x18++) {
    param17 += aui.buttons.button({id: 'nps-rank-' + soy.$$escapeHtml(x18), text: x18, extraAttributes: {type: 'button'}});
  }
  param10 += aui.buttons.buttons({id: 'nps-rank-buttons', content: param17});
  param10 += '</div><div id="nps-high-rank-cell"><div id="nps-high-rank-text" class="nps-low-emphasis">' + soy.$$escapeHtml('Extremely likely') + '</div></div></div>';
  var param9 = '' + aui.form.fieldGroup({content: param10});
  param9 += '<br>' + aui.form.fieldGroup({content: '' + aui.form.label({content: '2. Which of these best describes your role at your company?', forField: 'nps-role'}) + aui.form.select({id: 'nps-role', options: opt_data.roles})}) + '<br>' + aui.form.fieldGroup({content: '' + aui.form.label({content: '3. Is there any other feedback you\x27d like to give us? (Optional)', forField: 'nps-comment'}) + aui.form.textarea({id: 'nps-comment'})});
  var param7 = '' + aui.form.form({isTopLabels: true, content: param9});
  var output = '' + aui.dialog.dialog2({modal: true, size: 'large', id: 'nps-survey-dialog', titleText: AJS.format('Help us improve {0}',opt_data.productName), content: param7, footerActionContent: '' + aui.buttons.button({type: 'primary', id: 'nps-send-button', text: 'Send', isDisabled: true}) + aui.buttons.button({type: 'link', id: 'nps-cancel-button', text: 'Cancel'})});
  return output;
};
if (goog.DEBUG) {
  NPS.Templates.survey.soyTemplateName = 'NPS.Templates.survey';
}


NPS.Templates.surveyInlineDialog = function(opt_data, opt_ignored) {
  var param64 = '<h3>' + soy.$$escapeHtml('Tell us what you think') + '</h3>' + aui.icons.icon({icon: 'close-dialog', useIconFont: true, size: 'small', extraClasses: 'nps-close-icon'}) + ((opt_data.data.showOptOutOption == true) ? aui.buttons.button({extraClasses: 'nps-dismiss-forever', type: 'link', text: 'Dismiss forever'}) : '');
  var param82 = aui.form.label({content: AJS.format('How likely are you to recommend {0} to a friend or colleague?',opt_data.data.productName)}) + '<div id="nps-rating-bar"><div id="nps-low-rank-cell"><div id="nps-low-rank-text" class="nps-low-emphasis">' + soy.$$escapeHtml('Not likely') + '</div></div><div id="nps-rank-cell">';
  var param89 = '';
  for (var x90 = 0; x90 < 11; x90++) {
    param89 += aui.buttons.button({id: 'nps-rank-' + soy.$$escapeHtml(x90), text: x90, extraClasses: 'rank-button', extraAttributes: {type: 'button'}});
  }
  param82 += aui.buttons.buttons({id: 'nps-rank-buttons', content: param89});
  param82 += '</div><div id="nps-high-rank-cell"><div id="nps-high-rank-text" class="nps-low-emphasis">' + soy.$$escapeHtml('Extremely likely') + '</div></div></div>';
  var param81 = '' + aui.form.fieldGroup({content: param82});
  param81 += aui.form.fieldGroup({extraClasses: 'comment-session', content: '' + aui.form.fieldGroup({content: '' + aui.form.textarea({id: 'nps-comment', placeholderText: 'What\x27s the main reason for your score?'})}) + ((opt_data.data.isServerMode == true) ? aui.form.fieldGroup({content: '' + aui.form.label({content: 'Which of these best describes your role at your company? (Optional)', forField: 'nps-role'}) + aui.form.select({id: 'nps-role', options: opt_data.data.roles})}) : '') + aui.form.buttons({alignment: 'left', content: '' + aui.buttons.button({id: 'nps-send-button', text: 'Send'})})});
  param64 += aui.form.form({isTopLabels: true, extraClasses: 'survey-screen screen-1', content: param81});
  param64 += aui.form.form({isTopLabels: true, extraClasses: 'survey-screen screen-2', content: '<div class="role-field"><p>' + soy.$$escapeHtml(AJS.format('Thanks for your response! To help us improve {0}, we\x27\x27d love to discuss your feedback in more detail. If you\x27\x27re not keen to discuss it, uncheck the box below.',opt_data.data.productName)) + '</p></div>' + ((opt_data.data.isServerMode == false) ? aui.form.fieldGroup({content: '' + aui.form.label({content: 'Which of these best describes your role at your company? (Optional)', forField: 'nps-role'}) + aui.form.select({id: 'nps-role', options: opt_data.data.roles})}) : '') + aui.form.fieldGroup({content: '<div class="checkbox">' + aui.form.input({id: 'nps-allow-contact', type: 'checkbox', isChecked: true}) + aui.form.label({content: 'It\x27s okay to contact me about my feedback.', extraAttributes: 'for="nps-allow-contact"'}) + '</div>'}) + aui.form.buttons({alignment: 'left', content: '' + aui.buttons.button({id: 'nps-done-button', text: 'Done'})})});
  var output = '' + aui.inlineDialog2.inlineDialog2({id: opt_data.data.id, alignment: opt_data.data.alignment, extraAttributes: 'persistent', extraClasses: 'nps-survey-inline-dialog', content: param64});
  return output;
};
if (goog.DEBUG) {
  NPS.Templates.surveyInlineDialog.soyTemplateName = 'NPS.Templates.surveyInlineDialog';
}
;