!function(){"use strict";var r,e={809:function(){var r=window.wp.blocks,e=window.wp.element,n=window.wp.blockEditor,o=JSON.parse('{"u2":"gb-for-slick-slider/slick-slider-item"}');(0,r.registerBlockType)(o.u2,{edit:function(o){const i=(0,n.useBlockProps)(),t=(0,r.getBlockTypes)(),s=[""];t.forEach((function(r){"gb-for-slick-slider/slick-slider"!==r.name&&"gb-for-slick-slider/slick-slider-item"!==r.name&&s.push(r.name)}));const c=(0,n.useInnerBlocksProps)(i,{allowedBlocks:s});return(0,e.createElement)("div",c)},save:function(r){n.useBlockProps.save();const o=n.useInnerBlocksProps.save(r);return(0,e.createElement)("div",o)}})}},n={};function o(r){var i=n[r];if(void 0!==i)return i.exports;var t=n[r]={exports:{}};return e[r](t,t.exports,o),t.exports}o.m=e,r=[],o.O=function(e,n,i,t){if(!n){var s=1/0;for(f=0;f<r.length;f++){n=r[f][0],i=r[f][1],t=r[f][2];for(var c=!0,l=0;l<n.length;l++)(!1&t||s>=t)&&Object.keys(o.O).every((function(r){return o.O[r](n[l])}))?n.splice(l--,1):(c=!1,t<s&&(s=t));if(c){r.splice(f--,1);var u=i();void 0!==u&&(e=u)}}return e}t=t||0;for(var f=r.length;f>0&&r[f-1][2]>t;f--)r[f]=r[f-1];r[f]=[n,i,t]},o.o=function(r,e){return Object.prototype.hasOwnProperty.call(r,e)},function(){var r={52:0,583:0};o.O.j=function(e){return 0===r[e]};var e=function(e,n){var i,t,s=n[0],c=n[1],l=n[2],u=0;if(s.some((function(e){return 0!==r[e]}))){for(i in c)o.o(c,i)&&(o.m[i]=c[i]);if(l)var f=l(o)}for(e&&e(n);u<s.length;u++)t=s[u],o.o(r,t)&&r[t]&&r[t][0](),r[t]=0;return o.O(f)},n=self.webpackChunkgb_for_slick_slider=self.webpackChunkgb_for_slick_slider||[];n.forEach(e.bind(null,0)),n.push=e.bind(null,n.push.bind(n))}();var i=o.O(void 0,[583],(function(){return o(809)}));i=o.O(i)}();