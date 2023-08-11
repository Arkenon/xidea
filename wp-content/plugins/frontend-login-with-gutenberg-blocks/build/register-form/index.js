(()=>{"use strict";var e,t={440:()=>{const e=window.wp.blocks,t=window.wp.element,l=window.wp.blockEditor,o=window.wp.i18n,n=JSON.parse('{"m2":{"f":"Your e-mail"},"kl":{"f":"Enter your e-mail"},"WO":{"f":"Username"},"P6":{"f":"Enter your username"},"jV":{"f":"Password"},"cC":{"f":"Enter your password"},"QM":{"f":"Password Again"},"d3":{"f":"Enter your password again"},"XR":{"f":"Register"},"sl":{"f":"I have read and accept terms and conditions and privacy policy."}}'),r=JSON.parse('{"s$":{"f":"Label Settings"},"iE":{"f":"Show labels"},"z3":{"f":"Font Weight & Font Color"},"dE":{"f":"Input Settings"},"_F":{"f":"Input Border Radius"},"Fk":{"f":"Show Placeholders"},"r9":{"f":"Button Settings"},"t7":{"f":"Button Border Radius"},"aO":{"f":"Button Border"},"mm":{"f":"Button Background Color"},"ET":{"f":"Button Font Weight"},"lu":{"f":"Button Text Color"}}'),a=window.wp.components,s=e=>{let{options:l}=e;const{attributes:n,setAttributes:s}=l;return(0,t.createElement)(a.Panel,null,(0,t.createElement)(a.PanelBody,{title:(0,o.__)(r.s$.f,"flwgb"),initialOpen:!1},(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.ToggleControl,{label:(0,o.__)(r.iE.f,"flwgb"),help:n.showLabels?"Show":"Hide",checked:n.showLabels,onChange:e=>s({showLabels:e})})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.SelectControl,{labelPosition:"top",label:(0,o.__)(r.z3.f,"flwgb"),value:n.textFontWeight,options:[{label:"Normal",value:"normal"},{label:"Bold",value:"bold"}],onChange:e=>s({textFontWeight:e})})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.ColorPicker,{color:n.textColor,onChange:e=>s({textColor:e}),enableAlpha:!0,defaultValue:"#000"}))))},i=e=>{let{options:l}=e;const{attributes:n,setAttributes:s}=l;return(0,t.createElement)(a.Panel,null,(0,t.createElement)(a.PanelBody,{title:(0,o.__)(r.r9.f,"flwgb"),initialOpen:!1},(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.RangeControl,{label:(0,o.__)(r.t7.f,"flwgb"),value:n.buttonBorderRadius,onChange:e=>s({buttonBorderRadius:e}),min:0,max:25})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.__experimentalBorderControl,{label:(0,o.__)(r.aO.f,"flwgb"),onChange:e=>s({buttonBorder:e}),value:n.buttonBorder})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.__experimentalText,null,(0,o.__)(r.mm.f,"flwgb"))),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.ColorPalette,{value:n.buttonBgColor,onChange:e=>s({buttonBgColor:e})})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.SelectControl,{labelPosition:"top",label:(0,o.__)(r.ET.f,"flwgb"),value:n.buttonTextFontWeight,options:[{label:"Normal",value:"normal"},{label:"Bold",value:"bold"}],onChange:e=>s({buttonTextFontWeight:e})})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.__experimentalText,null,(0,o.__)(r.lu.f,"flwgb"))),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.ColorPalette,{value:n.buttonTextColor,onChange:e=>s({buttonTextColor:e})}))))},c=e=>{let{options:l}=e;const{attributes:n,setAttributes:s}=l;return(0,t.createElement)(a.Panel,null,(0,t.createElement)(a.PanelBody,{title:(0,o.__)(r.dE.f,"flwgb"),initialOpen:!1},(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.RangeControl,{label:(0,o.__)(r._F.f,"flwgb"),value:n.inputBorderRadius,onChange:e=>s({inputBorderRadius:e}),min:0,max:25})),(0,t.createElement)(a.PanelRow,null,(0,t.createElement)(a.ToggleControl,{label:(0,o.__)(r.Fk.f,"flwgb"),help:n.showPlaceholders?"Show":"Hide",checked:n.showPlaceholders,onChange:e=>s({showPlaceholders:e})}))))},b=e=>{let{options:o}=e;return(0,t.createElement)(l.InspectorControls,null,(0,t.createElement)(s,{options:o}),(0,t.createElement)(c,{options:o}),(0,t.createElement)(i,{options:o}))},u=JSON.parse('{"u2":"frontend-login-with-gutenberg-blocks/register-form"}');(0,e.registerBlockType)(u.u2,{edit:function(e){const{attributes:r}=e,a=(0,l.useBlockProps)(e),s={"border-radius":r.inputBorderRadius},i={color:r.textColor,"font-weight":r.textFontWeight},c={color:r.buttonTextColor,backgroundColor:r.buttonBgColor,"border-color":r.buttonBorder.color,"border-style":r.buttonBorder.style,"border-width":r.buttonBorder.width,"border-radius":r.buttonBorderRadius,"font-weight":r.buttonTextFontWeight};return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(b,{options:e}),(0,t.createElement)("div",a,(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("div",{className:"flwgb-input-group"},r.showLabels&&(0,t.createElement)("label",{className:"flwgb-input-label",style:i,htmlFor:"flwgb-username"},(0,o.__)(n.WO.f,"flwgb")),(0,t.createElement)("input",{className:"flwgb-input-control",id:"flwgb-username",type:"text",style:s,placeholder:r.showPlaceholders&&(0,o.__)(n.P6.f,"flwgb")}))),(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("div",{className:"flwgb-input-group"},r.showLabels&&(0,t.createElement)("label",{className:"flwgb-input-label",style:i,htmlFor:"flwgb-email"},(0,o.__)(n.m2.f,"flwgb")),(0,t.createElement)("input",{className:"flwgb-input-control",id:"flwgb-email",type:"text",style:s,placeholder:r.showPlaceholders&&(0,o.__)(n.kl.f,"flwgb")}))),(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("div",{className:"flwgb-input-group"},r.showLabels&&(0,t.createElement)("label",{className:"flwgb-input-label",style:i,htmlFor:"flwgb-password"},(0,o.__)(n.jV.f,"flwgb")),(0,t.createElement)("input",{className:"flwgb-input-control",id:"flwgb-password",type:"password",style:s,placeholder:r.showPlaceholders&&(0,o.__)(n.cC.f,"flwgb")}))),(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("div",{className:"flwgb-input-group"},r.showLabels&&(0,t.createElement)("label",{className:"flwgb-input-label",style:i,htmlFor:"flwgb-password-again"},(0,o.__)(n.QM.f,"flwgb")),(0,t.createElement)("input",{className:"flwgb-input-control",id:"flwgb-password-again",type:"password",style:s,placeholder:r.showPlaceholders&&(0,o.__)(n.d3.f,"flwgb")}))),(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("div",{className:"flwgb-form-check-group"},(0,t.createElement)("input",{id:"flwgb-terms-and-privacy",checked:"checked",type:"checkbox",className:"flwgb-form-check-input"}),(0,t.createElement)("label",{className:"flwgb-form-check-label",htmlFor:"flwgb-terms-and-privacy"},(0,o.__)(n.sl.f,"flwgb")))),(0,t.createElement)("div",{className:"flwgb-form-row"},(0,t.createElement)("button",{style:c,type:"submit",name:"wp-submit",id:"wp-submit",className:"flwgb-register-btn flwgb-btn"},(0,o.__)(n.XR.f,"flwgb")))))},save:function(){}})}},l={};function o(e){var n=l[e];if(void 0!==n)return n.exports;var r=l[e]={exports:{}};return t[e](r,r.exports,o),r.exports}o.m=t,e=[],o.O=(t,l,n,r)=>{if(!l){var a=1/0;for(b=0;b<e.length;b++){l=e[b][0],n=e[b][1],r=e[b][2];for(var s=!0,i=0;i<l.length;i++)(!1&r||a>=r)&&Object.keys(o.O).every((e=>o.O[e](l[i])))?l.splice(i--,1):(s=!1,r<a&&(a=r));if(s){e.splice(b--,1);var c=n();void 0!==c&&(t=c)}}return t}r=r||0;for(var b=e.length;b>0&&e[b-1][2]>r;b--)e[b]=e[b-1];e[b]=[l,n,r]},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={848:0,6:0};o.O.j=t=>0===e[t];var t=(t,l)=>{var n,r,a=l[0],s=l[1],i=l[2],c=0;if(a.some((t=>0!==e[t]))){for(n in s)o.o(s,n)&&(o.m[n]=s[n]);if(i)var b=i(o)}for(t&&t(l);c<a.length;c++)r=a[c],o.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return o.O(b)},l=self.webpackChunkfrontend_login_with_gutenberg_blocks=self.webpackChunkfrontend_login_with_gutenberg_blocks||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})();var n=o.O(void 0,[6],(()=>o(440)));n=o.O(n)})();