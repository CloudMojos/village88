/* Copyright 2021 Carlos A. (https://github.com/dealfonso); License: http://www.apache.org/licenses/LICENSE-2.0 */
!function(exports){var exports;function pascalToSnake(t){return t.replace(/[A-Z]/g,t=>"_"+t.toLowerCase()).replace(/^_*/,"")}function pascalToKebab(t){return t.replace(/[A-Z]/g,t=>"-"+t.toLowerCase()).replace(/^-*/,"")}function snakeCaseToCamel(t){t.replace(/-([a-z])/g,t=>t[1].toUpperCase())}function pascalToCamel(t){return t.charAt(0).toLowerCase()+t.slice(1)}function CamelToCamel(t){return t.charAt(0).toUpperCase()+t.slice(1)}function isElement(t){t instanceof Element||0 instanceof HTMLDocument}function parseBoolean(t){return"boolean"==typeof t?t:"string"==typeof t?"true"===(t=t.toLowerCase())||"yes"===t||"1"===t:!!t}function createTag(t,e={},n=null){var o=t.split("#");let s=null;var i,o=(t=1==o.length?o[0]:(o[1]=o[1].split("."),s=o[1][0],[o[0],...o[1].slice(1)].join("."))).split("."),l=(""===(t=o[0])&&(t="div"),"string"==typeof e&&(n=e,e={}),null!==n&&(e.innerHTML=n),null!==s&&(e.id=s),e.className=[e.className,...o.slice(1)].filter(function(t){return""!==(""+t).trim()}).join(" "),document.createElement(t));for(i in e)void 0!==l[i]?l[i]=e[i]:l.setAttribute(i,e[i]);return l}function appendToElement(t,...e){e=e.filter(t=>null!=t);return t.append(...e),t}function searchForm(t){let e=null;return null!==t&&void 0===(e=document.forms[t])&&null===(e=document.querySelector(t))&&console.warn(`form ${t} not found`),null!==e&&"form"!==e.tagName.toLowerCase()&&console.warn(`form ${t} is not a form`),e}function getValueWithJavascriptSupport(value,context=null){if("function"==typeof value)return value.bind(context);if("string"==typeof value){let internalValue=value.trim();if(internalValue.startsWith("javascript:"))try{let f=internalValue.substring(11);value=function(){return eval(f)}.bind(context)}catch(e){console.error(`Error executing javascript code ${internalValue.substring(11)}, error: `+e),value=null}}return value}function promiseForEvent(e,n){let o=null;var t=new Promise(t=>{o=t});return e.addEventListener(n,function t(){e.removeEventListener(n,t),o()}),t}function isEmpty(t){return null==t||(t instanceof Array?0===t.length:t instanceof Object?0===Object.keys(t).length:"string"==typeof t&&""===t.trim())}void 0===exports&&(exports=window),exports.powerButtons=function(t,e=null,n=null){let o=null,s=[],i={};if("string"==typeof t)if(null===(o=function(t){for(var e in PowerButtons.actionsRegistered)if(t.toLocaleLowerCase()===e.toLocaleLowerCase())return e;return null}(t))){if(0===(s=document.querySelectorAll(t)).length)return void console.error(`Parameter ${t} is neither the name of a registered plugin nor a valid selector`);2<arguments.length&&console.warn("Ignoring extra parameters"),i=e}else{let t=!1;if("string"==typeof e)s=document.querySelectorAll(e),t=!0;else if(e instanceof HTMLElement)s=[e],t=!0;else if(void 0!==e.length){for(var l in t=!0,e)if(!(e[l]instanceof HTMLElement)){t=!1;break}t&&(s=e)}if(!t)return void console.error(`Parameter ${e} is neither a valid selector, a list of elements or an HTMLElement`);i=n}else if(t instanceof HTMLElement)s=[t];else{if(void 0===t.length)return void console.error(`Parameter ${t} is neither a valid selector, a list of elements or an HTMLElement`);for(var r in t)if(!(t[r]instanceof HTMLElement))return void console.error(`Parameter ${t} is neither a valid selector, a list of elements or an HTMLElement`);s=t}if("object"!=typeof(i=null===i?{}:i))console.error("Options parameter must be an object");else if(null!==o){var a,c=PowerButtons.actionsRegistered[o];for(a of s)c.initialize(a,i)}else PowerButtons.discover(s,i)},exports.powerButtons.version="2.1.0",exports.powerButtons.plugins=function(){return Object.keys(PowerButtons.actionsRegistered)},exports.powerButtons.discoverAll=function(){PowerButtons.discoverAll()},exports.powerButtons.discover=function(t,e){PowerButtons.discover(t,e)},void 0!==document.addEventListener&&document.addEventListener("DOMContentLoaded",function(t){PowerButtons.discoverAll()}),void 0!==exports.$&&(exports.$.fn.powerButtons=function(t,e={}){return exports.powerButtons(t,this,e),this},exports.$.fn.powerButtons.version=exports.powerButtons.version,exports.$.fn.powerButtons.plugins=exports.powerButtons.plugins);class DialogLegacy{DEFAULTS={message:"Main message",buttonCount:2};constructor(t={},e=null,n=null){this.options={...this.DEFAULTS,...t},this.buttonCount=this.options.buttons.length,this.options.buttons=["Accept","Cancel"],this.result=null,this.onButton=e,this.onHidden=n}dispose(){}show(t=null,e=null){switch(null!==t&&(this.onButton=t),null!==e&&(this.onHidden=e),this.buttonCount){case 0:case 1:alert(this.message),this.result=0;break;case 2:this.result=confirm(this.options.message)?0:1;break;default:throw"Unsupported button count "+this.buttonCount}null!==this.onButton&&this.onButton(this.result,{button:this.result,text:this.options.buttons[this.result]},null),null!==this.onHidden&&this.onHidden(this.result,{button:this.result,text:this.options.buttons[this.result]},null)}}class Dialog{static create(t={},e=null,n=null){if(void 0===exports.bootstrap||void 0===exports.bootstrap.Modal)return new DialogLegacy(t,e,n);if(void 0!==t.selector&&null!==t.selector||void 0!==t.dialogFunction&&null!==t.dialogFunction)throw new Error("not implemented, yet");return new Dialog(t,e,n)}DEFAULTS={title:"Title",message:"Main message",customContent:null,buttons:["Accept"],buttonClasses:["btn-primary","btn-secondary"],buttonPanelClasses:["text-end"],escapeKeyCancels:!0,header:!0,footer:!0,body:!0,close:!0};dialog=null;options=null;modal=null;onButton=null;result=null;onHidden=null;onButton=null;constructor(t={},e=null,n=null){if(void 0===exports.bootstrap||void 0===exports.bootstrap.Modal)throw new Error("Bootstrap is required to use this class");this.options={...this.DEFAULTS,...t};var o=[];for(let e=0;e<this.options.buttons.length;e++){let t=this.options.buttons[e];"string"==typeof t?t={text:t}:void 0===t.text&&(t.text="Button "+e),void 0===t.class&&(t.class=this.options.buttonClasses[Math.min(e,this.options.buttonClasses.length-1)]),o.push(t)}this.options.buttons=o,this.dialog=null,this.modal=null,this.result=null,this.onButton=e,this.onHidden=n,this._hiddenHandler=this._hiddenHandler.bind(this)}_hiddenHandler(){this.dialog.removeEventListener("hidden.bs.modal",this._hiddenHandler),null!==this.onHidden&&(null!==this.result&&0<=this.result?this.onHidden(this.result,{button:this.result,text:this.options.buttons[this.result]}):this.onHidden(this.result,null))}dispose(){null!==this.modal&&(this.modal.dispose(),this.modal=null),this.dialog.remove(),this.dialog=null}show(t=null,e=null){return null===this.dialog&&(this.dialog=this._build_dialog(this.options)),null===this.modal&&(this.modal=new bootstrap.Modal(this.dialog,{backdrop:!!this.options.escapeKeyCancels||"static",keyboard:this.options.escapeKeyCancels})),this.dialog.addEventListener("hidden.bs.modal",this._hiddenHandler),(this.result=null)!==t&&(this.onButton=t),null!==e&&(this.onHidden=e),this.modal.show(),promiseForEvent(this.dialog,"shown.bs.modal")}hide(){return this.modal.hide(),promiseForEvent(this.dialog,"hidden.bs.modal")}_handleButton(t,e,n){this.result=t,null!==this.onButton&&!1===this.onButton(t,e,n)||this.hide()}_build_dialog(s={}){let t=null,e=null;parseBoolean(s.close)&&(e=createTag("button.close.btn-close",{type:"button","aria-label":"Close"})).addEventListener("click",()=>this._handleButton(-1,null,e)),parseBoolean(s.header)&&(t=createTag(".modal-header"),null!==s.title&&t.append(appendToElement(createTag(".modal-title"),appendToElement(createTag("h5",s.title)))),parseBoolean(s.close))&&t.append(e);var i=[];if(null!==s.buttons)for(let o=0;o<s.buttons.length;o++){let t=s.buttons[o],e=t.class.split(" ").map(t=>t.trim()).filter(t=>""!==t).join("."),n=(!1===s.footer&&(e+=".mx-1"),createTag("button.btn"+(e=""!==e?"."+e:e)+".button"+o,{type:"button"},t.text));n.addEventListener("click",function(){this._handleButton(o,t,n),void 0!==t.handler&&null!==t.handler&&t.handler(o,t,n)}.bind(this)),i.push(n)}let n=null,o=(parseBoolean(s.footer)&&(n=appendToElement(createTag(".modal-footer"),...i)),null);if(parseBoolean(s.body)&&(o=createTag(".modal-body"),null===t&&parseBoolean(s.close)&&o.append(appendToElement(createTag(".text-end"),e)),null!==s.message&&o.append(createTag("p.message.text-center",s.message)),null!==s.customContent&&o.append(createTag(".custom-content.mx-auto",s.customContent)),null===n)){let t=s.buttonPanelClasses.map(t=>t.trim()).filter(t=>""!==t).join(".");""!==t&&(t="."+t),appendToElement(o,appendToElement(createTag(".buttons"+t),...i))}return appendToElement(createTag(".modal.fade",{tabindex:"-1",role:"dialog","aria-hidden":"true","data-keyboard":"false"}),appendToElement(createTag(".modal-dialog.modal-dialog-centered",{role:"document"}),appendToElement(createTag(".modal-content"),t,o,n)))}}function confirmDialog(t,e="this action needs confirmation",n=null,o=null,s=!0){e=new Dialog({title:e,message:t,buttons:[{text:"Cancel",class:"btn-secondary",handler:o},{text:"Confirm",class:"btn-primary",handler:n}],escapeKeyCancels:s});return e.show(),e}function alertDialog(t,e="Alert",n=null){e=new Dialog({title:e,message:t,buttons:[{text:"Accept",class:"btn-primary",handler:n}],escapeKeyCancels:!0});return e.show(),e}function loadingDialog(t,e=null,n=null){"function"==typeof e&&(n=e,e=null);t=new Dialog({title:null,message:t,buttons:[{text:"Cancel",class:"btn-primary"}],customContent:e,escapeKeyCancels:!1,close:!1,header:!1,footer:!1},n);return t.show(),t}void 0===exports.powerButtons.utils&&(exports.powerButtons.utils={}),Object.assign(exports.powerButtons.utils,{confirmDialog:confirmDialog,alertDialog:alertDialog,loadingDialog:loadingDialog});class PowerButtons{static actionsRegistered={};static registerAction(t){this.actionsRegistered[t.NAME.toLowerCase()]=t,void 0===exports.powerButtons&&(exports.powerButtons={}),void 0===exports.powerButtons.defaults&&(exports.powerButtons.defaults={}),exports.powerButtons.defaults[t.NAME.toLowerCase()]=Object.assign({},t.DEFAULTS)}static getActionSettings(t,e){if(void 0===this.actionsRegistered[t.NAME.toLowerCase()])return console.error(`The action ${t.NAME} is not registered`),{};let n={};return void 0!==exports.powerButtons&&void 0!==exports.powerButtons.defaults&&void 0!==exports.powerButtons.defaults[t.NAME.toLowerCase()]&&(n=exports.powerButtons.defaults[t.NAME.toLowerCase()]),Object.assign({},t.DEFAULTS,n,e)}static addAction(t,e={}){PowerButtons.addActionSupport(t).appendAction(e)}static addActionSupport(t){return void 0===t._powerButtons?t._powerButtons=new PowerButtons(t):t._powerButtons.reset(),t._powerButtons}el=null;current_action=0;actions=[];back_onclick=null;constructor(t){(t._powerButtons=this).el=t,this.current_action=0,this.actions=[],this.back_onclick=null,void 0!==t.onclick&&null!==t.onclick&&(this.back_onclick=t.onclick,t.onclick=null),t.addEventListener("click",this.handlerClick.bind(this))}appendAction(t={}){if(void 0===t.type)throw"The type of the action is mandatory";this.actions.push(t)}handlerClick(t){if(this.current_action>=this.actions.length)this.current_action=0,"function"!=typeof this.back_onclick||this.back_onclick()||t.preventDefault();else{var e=this.actions[this.current_action],n=(t.preventDefault(),t.stopImmediatePropagation(),function(){this.current_action++,this.current_action>=this.actions.length&&void 0!==this.el.click?this.el.click():this.el.dispatchEvent(new Event(t.type,t))}.bind(this)),o=this.constructor.actionsRegistered[e.type];if(void 0===o)throw`The action ${e.type} is not registered`;o.execute(this.el,e,n,()=>this.reset())}}reset(){this.current_action=0}static discoverAll(){Object.entries(this.actionsRegistered).forEach(([,t])=>{t.discoverAll()})}static discover(e,n={}){Object.entries(this.actionsRegistered).forEach(([,t])=>{t.discover(e,n)})}}class Action{static NAME=null;static register(){PowerButtons.registerAction(this)}static DEFAULTS={};static extractOptions(t,e=null,n=null){null===e&&(e=this.NAME.toLowerCase()),null===n&&((n={})[e]=e);var o,s={};for(o in this.DEFAULTS){var i=void 0!==n[i=o]?n[i]:e+CamelToCamel(i);void 0!==t.dataset[i]&&(s[o]=t.dataset[i])}return s}static initialize(t,e={}){PowerButtons.addAction(t,Object.assign({type:this.NAME.toLowerCase()},e))}static discoverAll(){var t=this.NAME.toLowerCase();this.discover(document.querySelectorAll(`[data-${t}]`))}static discover(t,e={},n=!0){void 0===t.length&&(t=[t]);var o,s,i=this.NAME.toLowerCase();for(o of t)n&&void 0!==o._powerButtons&&void 0!==o._powerButtons._discover&&-1!==o._powerButtons._discover.indexOf(i)||void 0!==o.dataset[i]&&(s=Object.assign(this.extractOptions(o,i),e),this.initialize(o,s),void 0!==o._powerButtons)&&(void 0===o._powerButtons._discover&&(o._powerButtons._discover=[]),o._powerButtons._discover.includes(i)||o._powerButtons._discover.push(i))}static execute(t,e,n,o){throw new Error("The execute method must be implemented by the derived class")}}class ActionVerify extends Action{static NAME="Verify";static DEFAULTS={verify:null,form:null,verified:null,notVerified:"The condition for this action is not met",customContentVerified:null,customContentNotVerified:null,titleNotVerified:"The action requires verification",titleVerified:null,buttonAccept:"Accept",buttonClose:!1,escapeKey:!0,header:!0,footer:!0};static execute(el,options,onNextAction,onCancelActions){let settings=PowerButtons.getActionSettings(this,options),result=null,bindObject=searchForm(settings.form);null===bindObject&&(bindObject=document);try{result="function"==typeof settings.verify?settings.verify.bind(bindObject)():"string"==typeof settings.verify?function(){return eval(settings.verify)}.bind(bindObject)():parseBoolean(settings.verify)}catch(e){console.error("Error executing verification function",e),result=!1}let dialog=null,onVerificationSuccess=onNextAction,onVerificationFailure=onCancelActions;result?null===settings.verified&&null===settings.customContentVerified&&null===settings.titleVerified||(dialog=Dialog.create({title:settings.titleVerified,message:settings.verified,customContent:settings.customContentVerified,buttons:[settings.buttonAccept],escapeKeyCancels:settings.escapeKey,close:settings.buttonClose},null,function(t){null!==onVerificationSuccess&&onVerificationSuccess()})):null===settings.notVerified&&null===settings.customContentNotVerified&&null===settings.titleNotVerified||(dialog=Dialog.create({title:settings.titleNotVerified,message:settings.notVerified,customContent:settings.customContentNotVerified,buttons:[settings.buttonAccept],escapeKeyCancels:settings.escapeKey,close:settings.buttonClose},null,function(t){null!==onVerificationFailure&&onVerificationFailure()})),null!==dialog?dialog.show():result?null!==onVerificationSuccess&&onVerificationSuccess():null!==onVerificationFailure&&onVerificationFailure()}}ActionVerify.register();class ActionConfirm extends Action{static NAME="Confirm";static DEFAULTS={confirm:"Please confirm this action",customContent:null,title:"The action requires confirmation",buttonConfirm:"Confirm",buttonCancel:"Cancel",buttonClose:!0,escapeKey:!0};static extractOptions(t,e=null,n=null){t=super.extractOptions(t,e,n);return""==t.confirm.trim()&&delete t.confirm,t}static execute(t,e,n,o){e=PowerButtons.getActionSettings(this,e);Dialog.create({title:e.title,message:e.confirm,customContent:e.customContent,buttons:[e.buttonConfirm,e.buttonCancel],escapeKeyCancels:e.escapeKey,close:e.buttonClose},null,function(t){0===t?null!==n&&n():null!==o&&o()}).show()}}ActionConfirm.register();class ActionAsyncTask extends Action{static NAME="AsyncTask";static DEFAULTS={task:null,message:"Please wait...",customContent:null,title:null,buttonCancel:"Cancel",cancel:null,header:!0,footer:!0};static extractOptions(t,e=null,n){return super.extractOptions(t,e,{task:"asynctask"})}static execute(el,options,onNextAction,onCancelActions){let settings=PowerButtons.getActionSettings(this,options);if(null===settings.task)console.error("The task to execute cannot be null");else{let task=null;if("string"==typeof settings.task)task=async function(){return eval(settings.task)};else{if("function"!=typeof settings.task)return void console.error("The task to execute must be either a string or a function");task=settings.task}let buttons=[],cancelHandler=null,dialog=(null!==settings.cancel&&(buttons=[settings.buttonCancel],"string"==typeof settings.cancel?cancelHandler=function(){eval(settings.cancel)}:"function"==typeof settings.cancel?cancelHandler=settings.cancel:console.error("The cancel handler must be either a string or a function")),Dialog.create({title:settings.title,message:settings.message,customContent:settings.customContent,buttons:buttons,escapeKeyCancels:!1,close:!1,header:void 0!==options.header?settings.header:null!==settings.title&&""!=settings.title,footer:void 0!==options.footer?settings.footer:null!==cancelHandler},function(){cancelHandler(),onCancelActions()},function(t){null!==onNextAction&&onNextAction()}));dialog.show().then(function(){task().finally(function(){dialog.hide()})})}}}ActionAsyncTask.register();class ActionShowMessage extends Action{static NAME="ShowMessage";static DEFAULTS={showmessage:"This is a message",customContent:null,title:null,buttonAccept:"Accept",escapeKey:!0,buttonClose:!0,header:!0,footer:!0};static execute(t,e,n,o){var s=PowerButtons.getActionSettings(this,e);Dialog.create({title:s.title,message:s.showmessage,customContent:s.customContent,buttons:[s.buttonAccept],escapeKeyCancels:s.escapeKey,close:s.buttonClose,header:void 0!==e.header?s.header:null!==s.title&&""!=s.title,footer:void 0!==e.footer?s.footer:null!==s.buttonAccept&&""!=s.buttonAccept},null,function(t){null!==n&&n()}).show()}}ActionShowMessage.register();class ActionFormset extends Action{static NAME="Formset";static DEFAULTS={form:null,fields:{}};static extractOptions(e,n=null,t){var o,s=super.extractOptions(e,n,{form:"formset"}),i={};for(o in e.dataset)if(o.startsWith(n)){let t=o.substring(n.length);""!==t&&t[0]===t[0].toUpperCase()&&(i[t=t.toLocaleLowerCase()]=e.dataset[o])}return void 0===s.fields&&(s.fields={}),Object.assign(s.fields,i),s}static execute(t,e,n,o){var s,i=PowerButtons.getActionSettings(this,e);let l=null,r=[],a=[];if(""==i.form)null!==t.form?l=t.form:a=Array.from(document.querySelectorAll("input")).filter(t=>null===t.form);else if(null===(l=searchForm(i.form)))return void console.error("Form not found "+i.form);for(s in(a=null!==l?Array.from(l.elements):a).forEach(t=>{""!==t.name&&(r[t.name.toLocaleLowerCase()]=t),""!==t.id&&(r[t.id.toLocaleLowerCase()]=t)}),i.fields)if(void 0!==r[s]){var c=i.fields[s];let t=getValueWithJavascriptSupport(c,null!==l?l:r);if("function"==typeof t)try{t=t()}catch(t){console.error("Error executing "+c,t);continue}r[s].value=t}n()}}ActionFormset.register();class ActionFormButton extends Action{static NAME="FormButton";static DEFAULTS={formbutton:null,method:"post",formClass:"formbutton",convertCase:"none",formId:null,fields:{}};static extractOptions(e,n=null,t=null){var o,s=super.extractOptions(e,n,t),i={};for(o in n+="Field",e.dataset)if(o.startsWith(n)){let t=o.substring(n.length);if(""!==t&&t[0]===t[0].toUpperCase()){switch(s.convertCase){case"kebab":t=pascalToKebab(t);break;case"snake":t=pascalToSnake(t);break;case"camel":t=pascalToCamel(t)}i[t]=e.dataset[o]}}return void 0===s.fields&&(s.fields={}),Object.assign(s.fields,i),s}static initialize(t,e={}){for(var n=PowerButtons.getActionSettings(this,e),o=document.createElement("form"),s=(o.method=n.method,isEmpty(n.formbutton)||(o.action=n.formbutton),null!==n.formId&&(o.id=n.formId),n.formClass.split(" ")),i=0;i<s.length;i++)isEmpty(s[i])||o.classList.add(s[i]);t.type="submit";var l,r={};for(l in n.fields)r[l]=getValueWithJavascriptSupport(n.fields[l],o);var a,c={};for(a in r){var u=document.createElement("input");u.type="hidden","function"==typeof r[u.name=a]?(u.value="",c[a]=r[a]):u.value=r[a],o.appendChild(u)}t.parentNode.replaceChild(o,t),o.appendChild(t),0<Object.keys(c).length&&(n.fields=c,n._formObject=o,super.initialize(t,n))}static execute(t,e,n,o){var s,i=PowerButtons.getActionSettings(this,e);let l=!1;for(s in i.fields)try{var r=i.fields[s]();i._formObject[s].value=r}catch(t){console.error(`Error obtaining value for field ${s}: `+t),l=!0}(l?o:n)()}}ActionFormButton.register()}(window);