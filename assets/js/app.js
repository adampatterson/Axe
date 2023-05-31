"use strict";(self.webpackChunkAxe=self.webpackChunkAxe||[]).push([[449],{704:(e,t,n)=>{n.d(t,{fi:()=>w,kZ:()=>b});var r=n(400),o=n(163),i=n(57),a=n(556);var s=n(333),f=n(63),c=n(252),p=n(611),u=n(138);function d(e,t,n){void 0===n&&(n=!1);var d,l,v=(0,a.Re)(t),m=(0,a.Re)(t)&&function(e){var t=e.getBoundingClientRect(),n=(0,u.NM)(t.width)/e.offsetWidth||1,r=(0,u.NM)(t.height)/e.offsetHeight||1;return 1!==n||1!==r}(t),h=(0,c.Z)(t),Z=(0,r.Z)(e,m,n),g={scrollLeft:0,scrollTop:0},y={x:0,y:0};return(v||!v&&!n)&&(("body"!==(0,s.Z)(t)||(0,p.Z)(h))&&(g=(d=t)!==(0,i.Z)(d)&&(0,a.Re)(d)?{scrollLeft:(l=d).scrollLeft,scrollTop:l.scrollTop}:(0,o.Z)(d)),(0,a.Re)(t)?((y=(0,r.Z)(t,!0)).x+=t.clientLeft,y.y+=t.clientTop):h&&(y.x=(0,f.Z)(h))),{x:Z.left+g.scrollLeft-y.x,y:Z.top+g.scrollTop-y.y,width:Z.width,height:Z.height}}var l=n(583),v=n(492),m=n(552),h=n(701);function Z(e){var t=new Map,n=new Set,r=[];function o(e){n.add(e.name),[].concat(e.requires||[],e.requiresIfExists||[]).forEach((function(e){if(!n.has(e)){var r=t.get(e);r&&o(r)}})),r.push(e)}return e.forEach((function(e){t.set(e.name,e)})),e.forEach((function(e){n.has(e.name)||o(e)})),r}var g={placement:"bottom",modifiers:[],strategy:"absolute"};function y(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];return!t.some((function(e){return!(e&&"function"==typeof e.getBoundingClientRect)}))}function b(e){void 0===e&&(e={});var t=e,n=t.defaultModifiers,r=void 0===n?[]:n,o=t.defaultOptions,i=void 0===o?g:o;return function(e,t,n){void 0===n&&(n=i);var o,s,f={placement:"bottom",orderedModifiers:[],options:Object.assign({},g,i),modifiersData:{},elements:{reference:e,popper:t},attributes:{},styles:{}},c=[],p=!1,u={state:f,setOptions:function(n){var o="function"==typeof n?n(f.options):n;b(),f.options=Object.assign({},i,f.options,o),f.scrollParents={reference:(0,a.kK)(e)?(0,v.Z)(e):e.contextElement?(0,v.Z)(e.contextElement):[],popper:(0,v.Z)(t)};var s=function(e){var t=Z(e);return h.xs.reduce((function(e,n){return e.concat(t.filter((function(e){return e.phase===n})))}),[])}(function(e){var t=e.reduce((function(e,t){var n=e[t.name];return e[t.name]=n?Object.assign({},n,t,{options:Object.assign({},n.options,t.options),data:Object.assign({},n.data,t.data)}):t,e}),{});return Object.keys(t).map((function(e){return t[e]}))}([].concat(r,f.options.modifiers)));return f.orderedModifiers=s.filter((function(e){return e.enabled})),f.orderedModifiers.forEach((function(e){var t=e.name,n=e.options,r=void 0===n?{}:n,o=e.effect;if("function"==typeof o){var i=o({state:f,name:t,instance:u,options:r}),a=function(){};c.push(i||a)}})),u.update()},forceUpdate:function(){if(!p){var e=f.elements,t=e.reference,n=e.popper;if(y(t,n)){f.rects={reference:d(t,(0,m.Z)(n),"fixed"===f.options.strategy),popper:(0,l.Z)(n)},f.reset=!1,f.placement=f.options.placement,f.orderedModifiers.forEach((function(e){return f.modifiersData[e.name]=Object.assign({},e.data)}));for(var r=0;r<f.orderedModifiers.length;r++)if(!0!==f.reset){var o=f.orderedModifiers[r],i=o.fn,a=o.options,s=void 0===a?{}:a,c=o.name;"function"==typeof i&&(f=i({state:f,options:s,name:c,instance:u})||f)}else f.reset=!1,r=-1}}},update:(o=function(){return new Promise((function(e){u.forceUpdate(),e(f)}))},function(){return s||(s=new Promise((function(e){Promise.resolve().then((function(){s=void 0,e(o())}))}))),s}),destroy:function(){b(),p=!0}};if(!y(e,t))return u;function b(){c.forEach((function(e){return e()})),c=[]}return u.setOptions(n).then((function(e){!p&&n.onFirstUpdate&&n.onFirstUpdate(e)})),u}}var w=b()},985:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(556);function o(e,t){var n=t.getRootNode&&t.getRootNode();if(e.contains(t))return!0;if(n&&(0,r.Zq)(n)){var o=t;do{if(o&&e.isSameNode(o))return!0;o=o.parentNode||o.host}while(o)}return!1}},400:(e,t,n)=>{n.d(t,{Z:()=>s});var r=n(556),o=n(138),i=n(57),a=n(977);function s(e,t,n){void 0===t&&(t=!1),void 0===n&&(n=!1);var s=e.getBoundingClientRect(),f=1,c=1;t&&(0,r.Re)(e)&&(f=e.offsetWidth>0&&(0,o.NM)(s.width)/e.offsetWidth||1,c=e.offsetHeight>0&&(0,o.NM)(s.height)/e.offsetHeight||1);var p=((0,r.kK)(e)?(0,i.Z)(e):window).visualViewport,u=!(0,a.Z)()&&n,d=(s.left+(u&&p?p.offsetLeft:0))/f,l=(s.top+(u&&p?p.offsetTop:0))/c,v=s.width/f,m=s.height/c;return{width:v,height:m,top:l,right:d+v,bottom:l+m,left:d,x:d,y:l}}},62:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(57);function o(e){return(0,r.Z)(e).getComputedStyle(e)}},252:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(556);function o(e){return(((0,r.kK)(e)?e.ownerDocument:e.document)||window.document).documentElement}},583:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(400);function o(e){var t=(0,r.Z)(e),n=e.offsetWidth,o=e.offsetHeight;return Math.abs(t.width-n)<=1&&(n=t.width),Math.abs(t.height-o)<=1&&(o=t.height),{x:e.offsetLeft,y:e.offsetTop,width:n,height:o}}},333:(e,t,n)=>{function r(e){return e?(e.nodeName||"").toLowerCase():null}n.d(t,{Z:()=>r})},552:(e,t,n)=>{n.d(t,{Z:()=>u});var r=n(57),o=n(333),i=n(62),a=n(556);function s(e){return["table","td","th"].indexOf((0,o.Z)(e))>=0}var f=n(923),c=n(918);function p(e){return(0,a.Re)(e)&&"fixed"!==(0,i.Z)(e).position?e.offsetParent:null}function u(e){for(var t=(0,r.Z)(e),n=p(e);n&&s(n)&&"static"===(0,i.Z)(n).position;)n=p(n);return n&&("html"===(0,o.Z)(n)||"body"===(0,o.Z)(n)&&"static"===(0,i.Z)(n).position)?t:n||function(e){var t=/firefox/i.test((0,c.Z)());if(/Trident/i.test((0,c.Z)())&&(0,a.Re)(e)&&"fixed"===(0,i.Z)(e).position)return null;var n=(0,f.Z)(e);for((0,a.Zq)(n)&&(n=n.host);(0,a.Re)(n)&&["html","body"].indexOf((0,o.Z)(n))<0;){var r=(0,i.Z)(n);if("none"!==r.transform||"none"!==r.perspective||"paint"===r.contain||-1!==["transform","perspective"].indexOf(r.willChange)||t&&"filter"===r.willChange||t&&r.filter&&"none"!==r.filter)return n;n=n.parentNode}return null}(e)||t}},923:(e,t,n)=>{n.d(t,{Z:()=>a});var r=n(333),o=n(252),i=n(556);function a(e){return"html"===(0,r.Z)(e)?e:e.assignedSlot||e.parentNode||((0,i.Zq)(e)?e.host:null)||(0,o.Z)(e)}},57:(e,t,n)=>{function r(e){if(null==e)return window;if("[object Window]"!==e.toString()){var t=e.ownerDocument;return t&&t.defaultView||window}return e}n.d(t,{Z:()=>r})},163:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(57);function o(e){var t=(0,r.Z)(e);return{scrollLeft:t.pageXOffset,scrollTop:t.pageYOffset}}},63:(e,t,n)=>{n.d(t,{Z:()=>a});var r=n(400),o=n(252),i=n(163);function a(e){return(0,r.Z)((0,o.Z)(e)).left+(0,i.Z)(e).scrollLeft}},556:(e,t,n)=>{n.d(t,{Re:()=>i,Zq:()=>a,kK:()=>o});var r=n(57);function o(e){return e instanceof(0,r.Z)(e).Element||e instanceof Element}function i(e){return e instanceof(0,r.Z)(e).HTMLElement||e instanceof HTMLElement}function a(e){return"undefined"!=typeof ShadowRoot&&(e instanceof(0,r.Z)(e).ShadowRoot||e instanceof ShadowRoot)}},977:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(918);function o(){return!/^((?!chrome|android).)*safari/i.test((0,r.Z)())}},611:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(62);function o(e){var t=(0,r.Z)(e),n=t.overflow,o=t.overflowX,i=t.overflowY;return/auto|scroll|overlay|hidden/.test(n+i+o)}},492:(e,t,n)=>{n.d(t,{Z:()=>c});var r=n(923),o=n(611),i=n(333),a=n(556);function s(e){return["html","body","#document"].indexOf((0,i.Z)(e))>=0?e.ownerDocument.body:(0,a.Re)(e)&&(0,o.Z)(e)?e:s((0,r.Z)(e))}var f=n(57);function c(e,t){var n;void 0===t&&(t=[]);var i=s(e),a=i===(null==(n=e.ownerDocument)?void 0:n.body),p=(0,f.Z)(i),u=a?[p].concat(p.visualViewport||[],(0,o.Z)(i)?i:[]):i,d=t.concat(u);return a?d:d.concat(c((0,r.Z)(u)))}},701:(e,t,n)=>{n.d(t,{BL:()=>c,Ct:()=>h,DH:()=>w,F2:()=>i,I:()=>o,MS:()=>j,N7:()=>Z,Pj:()=>d,XM:()=>b,YP:()=>v,bw:()=>m,cW:()=>k,d7:()=>s,ij:()=>g,iv:()=>O,k5:()=>l,mv:()=>f,r5:()=>y,t$:()=>a,ut:()=>p,wX:()=>x,we:()=>r,xs:()=>M,zV:()=>u});var r="top",o="bottom",i="right",a="left",s="auto",f=[r,o,i,a],c="start",p="end",u="clippingParents",d="viewport",l="popper",v="reference",m=f.reduce((function(e,t){return e.concat([t+"-"+c,t+"-"+p])}),[]),h=[].concat(f,[s]).reduce((function(e,t){return e.concat([t,t+"-"+c,t+"-"+p])}),[]),Z="beforeRead",g="read",y="afterRead",b="beforeMain",w="main",x="afterMain",O="beforeWrite",k="write",j="afterWrite",M=[Z,g,y,b,w,x,O,k,j]},599:(e,t,n)=>{n.r(t),n.d(t,{afterMain:()=>r.wX,afterRead:()=>r.r5,afterWrite:()=>r.MS,applyStyles:()=>o.Z,arrow:()=>i.Z,auto:()=>r.d7,basePlacements:()=>r.mv,beforeMain:()=>r.XM,beforeRead:()=>r.N7,beforeWrite:()=>r.iv,bottom:()=>r.I,clippingParents:()=>r.zV,computeStyles:()=>a.Z,createPopper:()=>m.fi,createPopperBase:()=>l.fi,createPopperLite:()=>Z,detectOverflow:()=>v.Z,end:()=>r.ut,eventListeners:()=>s.Z,flip:()=>f.Z,hide:()=>c.Z,left:()=>r.t$,main:()=>r.DH,modifierPhases:()=>r.xs,offset:()=>p.Z,placements:()=>r.Ct,popper:()=>r.k5,popperGenerator:()=>l.kZ,popperOffsets:()=>u.Z,preventOverflow:()=>d.Z,read:()=>r.ij,reference:()=>r.YP,right:()=>r.F2,start:()=>r.BL,top:()=>r.we,variationPlacements:()=>r.bw,viewport:()=>r.Pj,write:()=>r.cW});var r=n(701),o=n(824),i=n(896),a=n(531),s=n(372),f=n(855),c=n(892),p=n(122),u=n(421),d=n(394),l=n(704),v=n(486),m=n(804),h=[s.Z,u.Z,a.Z,o.Z],Z=(0,l.kZ)({defaultModifiers:h})},824:(e,t,n)=>{n.d(t,{Z:()=>i});var r=n(333),o=n(556);const i={name:"applyStyles",enabled:!0,phase:"write",fn:function(e){var t=e.state;Object.keys(t.elements).forEach((function(e){var n=t.styles[e]||{},i=t.attributes[e]||{},a=t.elements[e];(0,o.Re)(a)&&(0,r.Z)(a)&&(Object.assign(a.style,n),Object.keys(i).forEach((function(e){var t=i[e];!1===t?a.removeAttribute(e):a.setAttribute(e,!0===t?"":t)})))}))},effect:function(e){var t=e.state,n={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,n.popper),t.styles=n,t.elements.arrow&&Object.assign(t.elements.arrow.style,n.arrow),function(){Object.keys(t.elements).forEach((function(e){var i=t.elements[e],a=t.attributes[e]||{},s=Object.keys(t.styles.hasOwnProperty(e)?t.styles[e]:n[e]).reduce((function(e,t){return e[t]="",e}),{});(0,o.Re)(i)&&(0,r.Z)(i)&&(Object.assign(i.style,s),Object.keys(a).forEach((function(e){i.removeAttribute(e)})))}))}},requires:["computeStyles"]}},896:(e,t,n)=>{n.d(t,{Z:()=>l});var r=n(206),o=n(583),i=n(985),a=n(552),s=n(516),f=n(711),c=n(293),p=n(706),u=n(701),d=function(e,t){return e="function"==typeof e?e(Object.assign({},t.rects,{placement:t.placement})):e,(0,c.Z)("number"!=typeof e?e:(0,p.Z)(e,u.mv))};const l={name:"arrow",enabled:!0,phase:"main",fn:function(e){var t,n=e.state,i=e.name,c=e.options,p=n.elements.arrow,l=n.modifiersData.popperOffsets,v=(0,r.Z)(n.placement),m=(0,s.Z)(v),h=[u.t$,u.F2].indexOf(v)>=0?"height":"width";if(p&&l){var Z=d(c.padding,n),g=(0,o.Z)(p),y="y"===m?u.we:u.t$,b="y"===m?u.I:u.F2,w=n.rects.reference[h]+n.rects.reference[m]-l[m]-n.rects.popper[h],x=l[m]-n.rects.reference[m],O=(0,a.Z)(p),k=O?"y"===m?O.clientHeight||0:O.clientWidth||0:0,j=w/2-x/2,M=Z[y],P=k-g[h]-Z[b],D=k/2-g[h]/2+j,E=(0,f.u)(M,D,P),R=m;n.modifiersData[i]=((t={})[R]=E,t.centerOffset=E-D,t)}},effect:function(e){var t=e.state,n=e.options.element,r=void 0===n?"[data-popper-arrow]":n;null!=r&&("string"!=typeof r||(r=t.elements.popper.querySelector(r)))&&(0,i.Z)(t.elements.popper,r)&&(t.elements.arrow=r)},requires:["popperOffsets"],requiresIfExists:["preventOverflow"]}},531:(e,t,n)=>{n.d(t,{Z:()=>l});var r=n(701),o=n(552),i=n(57),a=n(252),s=n(62),f=n(206),c=n(943),p=n(138),u={top:"auto",right:"auto",bottom:"auto",left:"auto"};function d(e){var t,n=e.popper,f=e.popperRect,c=e.placement,d=e.variation,l=e.offsets,v=e.position,m=e.gpuAcceleration,h=e.adaptive,Z=e.roundOffsets,g=e.isFixed,y=l.x,b=void 0===y?0:y,w=l.y,x=void 0===w?0:w,O="function"==typeof Z?Z({x:b,y:x}):{x:b,y:x};b=O.x,x=O.y;var k=l.hasOwnProperty("x"),j=l.hasOwnProperty("y"),M=r.t$,P=r.we,D=window;if(h){var E=(0,o.Z)(n),R="clientHeight",L="clientWidth";if(E===(0,i.Z)(n)&&(E=(0,a.Z)(n),"static"!==(0,s.Z)(E).position&&"absolute"===v&&(R="scrollHeight",L="scrollWidth")),c===r.we||(c===r.t$||c===r.F2)&&d===r.ut)P=r.I,x-=(g&&E===D&&D.visualViewport?D.visualViewport.height:E[R])-f.height,x*=m?1:-1;if(c===r.t$||(c===r.we||c===r.I)&&d===r.ut)M=r.F2,b-=(g&&E===D&&D.visualViewport?D.visualViewport.width:E[L])-f.width,b*=m?1:-1}var A,F=Object.assign({position:v},h&&u),B=!0===Z?function(e){var t=e.x,n=e.y,r=window.devicePixelRatio||1;return{x:(0,p.NM)(t*r)/r||0,y:(0,p.NM)(n*r)/r||0}}({x:b,y:x}):{x:b,y:x};return b=B.x,x=B.y,m?Object.assign({},F,((A={})[P]=j?"0":"",A[M]=k?"0":"",A.transform=(D.devicePixelRatio||1)<=1?"translate("+b+"px, "+x+"px)":"translate3d("+b+"px, "+x+"px, 0)",A)):Object.assign({},F,((t={})[P]=j?x+"px":"",t[M]=k?b+"px":"",t.transform="",t))}const l={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:function(e){var t=e.state,n=e.options,r=n.gpuAcceleration,o=void 0===r||r,i=n.adaptive,a=void 0===i||i,s=n.roundOffsets,p=void 0===s||s,u={placement:(0,f.Z)(t.placement),variation:(0,c.Z)(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:o,isFixed:"fixed"===t.options.strategy};null!=t.modifiersData.popperOffsets&&(t.styles.popper=Object.assign({},t.styles.popper,d(Object.assign({},u,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:a,roundOffsets:p})))),null!=t.modifiersData.arrow&&(t.styles.arrow=Object.assign({},t.styles.arrow,d(Object.assign({},u,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:p})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})},data:{}}},372:(e,t,n)=>{n.d(t,{Z:()=>i});var r=n(57),o={passive:!0};const i={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:function(e){var t=e.state,n=e.instance,i=e.options,a=i.scroll,s=void 0===a||a,f=i.resize,c=void 0===f||f,p=(0,r.Z)(t.elements.popper),u=[].concat(t.scrollParents.reference,t.scrollParents.popper);return s&&u.forEach((function(e){e.addEventListener("scroll",n.update,o)})),c&&p.addEventListener("resize",n.update,o),function(){s&&u.forEach((function(e){e.removeEventListener("scroll",n.update,o)})),c&&p.removeEventListener("resize",n.update,o)}},data:{}}},855:(e,t,n)=>{n.d(t,{Z:()=>u});var r={left:"right",right:"left",bottom:"top",top:"bottom"};function o(e){return e.replace(/left|right|bottom|top/g,(function(e){return r[e]}))}var i=n(206),a={start:"end",end:"start"};function s(e){return e.replace(/start|end/g,(function(e){return a[e]}))}var f=n(486),c=n(943),p=n(701);const u={name:"flip",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,r=e.name;if(!t.modifiersData[r]._skip){for(var a=n.mainAxis,u=void 0===a||a,d=n.altAxis,l=void 0===d||d,v=n.fallbackPlacements,m=n.padding,h=n.boundary,Z=n.rootBoundary,g=n.altBoundary,y=n.flipVariations,b=void 0===y||y,w=n.allowedAutoPlacements,x=t.options.placement,O=(0,i.Z)(x),k=v||(O===x||!b?[o(x)]:function(e){if((0,i.Z)(e)===p.d7)return[];var t=o(e);return[s(e),t,s(t)]}(x)),j=[x].concat(k).reduce((function(e,n){return e.concat((0,i.Z)(n)===p.d7?function(e,t){void 0===t&&(t={});var n=t,r=n.placement,o=n.boundary,a=n.rootBoundary,s=n.padding,u=n.flipVariations,d=n.allowedAutoPlacements,l=void 0===d?p.Ct:d,v=(0,c.Z)(r),m=v?u?p.bw:p.bw.filter((function(e){return(0,c.Z)(e)===v})):p.mv,h=m.filter((function(e){return l.indexOf(e)>=0}));0===h.length&&(h=m);var Z=h.reduce((function(t,n){return t[n]=(0,f.Z)(e,{placement:n,boundary:o,rootBoundary:a,padding:s})[(0,i.Z)(n)],t}),{});return Object.keys(Z).sort((function(e,t){return Z[e]-Z[t]}))}(t,{placement:n,boundary:h,rootBoundary:Z,padding:m,flipVariations:b,allowedAutoPlacements:w}):n)}),[]),M=t.rects.reference,P=t.rects.popper,D=new Map,E=!0,R=j[0],L=0;L<j.length;L++){var A=j[L],F=(0,i.Z)(A),B=(0,c.Z)(A)===p.BL,V=[p.we,p.I].indexOf(F)>=0,W=V?"width":"height",H=(0,f.Z)(t,{placement:A,boundary:h,rootBoundary:Z,altBoundary:g,padding:m}),I=V?B?p.F2:p.t$:B?p.I:p.we;M[W]>P[W]&&(I=o(I));var q=o(I),C=[];if(u&&C.push(H[F]<=0),l&&C.push(H[I]<=0,H[q]<=0),C.every((function(e){return e}))){R=A,E=!1;break}D.set(A,C)}if(E)for(var N=function(e){var t=j.find((function(t){var n=D.get(t);if(n)return n.slice(0,e).every((function(e){return e}))}));if(t)return R=t,"break"},S=b?3:1;S>0;S--){if("break"===N(S))break}t.placement!==R&&(t.modifiersData[r]._skip=!0,t.placement=R,t.reset=!0)}},requiresIfExists:["offset"],data:{_skip:!1}}},892:(e,t,n)=>{n.d(t,{Z:()=>s});var r=n(701),o=n(486);function i(e,t,n){return void 0===n&&(n={x:0,y:0}),{top:e.top-t.height-n.y,right:e.right-t.width+n.x,bottom:e.bottom-t.height+n.y,left:e.left-t.width-n.x}}function a(e){return[r.we,r.F2,r.I,r.t$].some((function(t){return e[t]>=0}))}const s={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:function(e){var t=e.state,n=e.name,r=t.rects.reference,s=t.rects.popper,f=t.modifiersData.preventOverflow,c=(0,o.Z)(t,{elementContext:"reference"}),p=(0,o.Z)(t,{altBoundary:!0}),u=i(c,r),d=i(p,s,f),l=a(u),v=a(d);t.modifiersData[n]={referenceClippingOffsets:u,popperEscapeOffsets:d,isReferenceHidden:l,hasPopperEscaped:v},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":l,"data-popper-escaped":v})}}},122:(e,t,n)=>{n.d(t,{Z:()=>i});var r=n(206),o=n(701);const i={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:function(e){var t=e.state,n=e.options,i=e.name,a=n.offset,s=void 0===a?[0,0]:a,f=o.Ct.reduce((function(e,n){return e[n]=function(e,t,n){var i=(0,r.Z)(e),a=[o.t$,o.we].indexOf(i)>=0?-1:1,s="function"==typeof n?n(Object.assign({},t,{placement:e})):n,f=s[0],c=s[1];return f=f||0,c=(c||0)*a,[o.t$,o.F2].indexOf(i)>=0?{x:c,y:f}:{x:f,y:c}}(n,t.rects,s),e}),{}),c=f[t.placement],p=c.x,u=c.y;null!=t.modifiersData.popperOffsets&&(t.modifiersData.popperOffsets.x+=p,t.modifiersData.popperOffsets.y+=u),t.modifiersData[i]=f}}},421:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(581);const o={name:"popperOffsets",enabled:!0,phase:"read",fn:function(e){var t=e.state,n=e.name;t.modifiersData[n]=(0,r.Z)({reference:t.rects.reference,element:t.rects.popper,strategy:"absolute",placement:t.placement})},data:{}}},394:(e,t,n)=>{n.d(t,{Z:()=>l});var r=n(701),o=n(206),i=n(516);var a=n(711),s=n(583),f=n(552),c=n(486),p=n(943),u=n(607),d=n(138);const l={name:"preventOverflow",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,l=e.name,v=n.mainAxis,m=void 0===v||v,h=n.altAxis,Z=void 0!==h&&h,g=n.boundary,y=n.rootBoundary,b=n.altBoundary,w=n.padding,x=n.tether,O=void 0===x||x,k=n.tetherOffset,j=void 0===k?0:k,M=(0,c.Z)(t,{boundary:g,rootBoundary:y,padding:w,altBoundary:b}),P=(0,o.Z)(t.placement),D=(0,p.Z)(t.placement),E=!D,R=(0,i.Z)(P),L="x"===R?"y":"x",A=t.modifiersData.popperOffsets,F=t.rects.reference,B=t.rects.popper,V="function"==typeof j?j(Object.assign({},t.rects,{placement:t.placement})):j,W="number"==typeof V?{mainAxis:V,altAxis:V}:Object.assign({mainAxis:0,altAxis:0},V),H=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,I={x:0,y:0};if(A){if(m){var q,C="y"===R?r.we:r.t$,N="y"===R?r.I:r.F2,S="y"===R?"height":"width",T=A[R],$=T+M[C],K=T-M[N],z=O?-B[S]/2:0,X=D===r.BL?F[S]:B[S],Y=D===r.BL?-B[S]:-F[S],U=t.elements.arrow,_=O&&U?(0,s.Z)(U):{width:0,height:0},G=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:(0,u.Z)(),J=G[C],Q=G[N],ee=(0,a.u)(0,F[S],_[S]),te=E?F[S]/2-z-ee-J-W.mainAxis:X-ee-J-W.mainAxis,ne=E?-F[S]/2+z+ee+Q+W.mainAxis:Y+ee+Q+W.mainAxis,re=t.elements.arrow&&(0,f.Z)(t.elements.arrow),oe=re?"y"===R?re.clientTop||0:re.clientLeft||0:0,ie=null!=(q=null==H?void 0:H[R])?q:0,ae=T+te-ie-oe,se=T+ne-ie,fe=(0,a.u)(O?(0,d.VV)($,ae):$,T,O?(0,d.Fp)(K,se):K);A[R]=fe,I[R]=fe-T}if(Z){var ce,pe="x"===R?r.we:r.t$,ue="x"===R?r.I:r.F2,de=A[L],le="y"===L?"height":"width",ve=de+M[pe],me=de-M[ue],he=-1!==[r.we,r.t$].indexOf(P),Ze=null!=(ce=null==H?void 0:H[L])?ce:0,ge=he?ve:de-F[le]-B[le]-Ze+W.altAxis,ye=he?de+F[le]+B[le]-Ze-W.altAxis:me,be=O&&he?(0,a.q)(ge,de,ye):(0,a.u)(O?ge:ve,de,O?ye:me);A[L]=be,I[L]=be-de}t.modifiersData[l]=I}},requiresIfExists:["offset"]}},804:(e,t,n)=>{n.d(t,{fi:()=>v});var r=n(704),o=n(372),i=n(421),a=n(531),s=n(824),f=n(122),c=n(855),p=n(394),u=n(896),d=n(892),l=[o.Z,i.Z,a.Z,s.Z,f.Z,c.Z,p.Z,u.Z,d.Z],v=(0,r.kZ)({defaultModifiers:l})},581:(e,t,n)=>{n.d(t,{Z:()=>s});var r=n(206),o=n(943),i=n(516),a=n(701);function s(e){var t,n=e.reference,s=e.element,f=e.placement,c=f?(0,r.Z)(f):null,p=f?(0,o.Z)(f):null,u=n.x+n.width/2-s.width/2,d=n.y+n.height/2-s.height/2;switch(c){case a.we:t={x:u,y:n.y-s.height};break;case a.I:t={x:u,y:n.y+n.height};break;case a.F2:t={x:n.x+n.width,y:d};break;case a.t$:t={x:n.x-s.width,y:d};break;default:t={x:n.x,y:n.y}}var l=c?(0,i.Z)(c):null;if(null!=l){var v="y"===l?"height":"width";switch(p){case a.BL:t[l]=t[l]-(n[v]/2-s[v]/2);break;case a.ut:t[l]=t[l]+(n[v]/2-s[v]/2)}}return t}},486:(e,t,n)=>{n.d(t,{Z:()=>k});var r=n(701),o=n(57),i=n(252),a=n(63),s=n(977);var f=n(62),c=n(163),p=n(138);var u=n(492),d=n(552),l=n(556),v=n(400),m=n(923),h=n(985),Z=n(333);function g(e){return Object.assign({},e,{left:e.x,top:e.y,right:e.x+e.width,bottom:e.y+e.height})}function y(e,t,n){return t===r.Pj?g(function(e,t){var n=(0,o.Z)(e),r=(0,i.Z)(e),f=n.visualViewport,c=r.clientWidth,p=r.clientHeight,u=0,d=0;if(f){c=f.width,p=f.height;var l=(0,s.Z)();(l||!l&&"fixed"===t)&&(u=f.offsetLeft,d=f.offsetTop)}return{width:c,height:p,x:u+(0,a.Z)(e),y:d}}(e,n)):(0,l.kK)(t)?function(e,t){var n=(0,v.Z)(e,!1,"fixed"===t);return n.top=n.top+e.clientTop,n.left=n.left+e.clientLeft,n.bottom=n.top+e.clientHeight,n.right=n.left+e.clientWidth,n.width=e.clientWidth,n.height=e.clientHeight,n.x=n.left,n.y=n.top,n}(t,n):g(function(e){var t,n=(0,i.Z)(e),r=(0,c.Z)(e),o=null==(t=e.ownerDocument)?void 0:t.body,s=(0,p.Fp)(n.scrollWidth,n.clientWidth,o?o.scrollWidth:0,o?o.clientWidth:0),u=(0,p.Fp)(n.scrollHeight,n.clientHeight,o?o.scrollHeight:0,o?o.clientHeight:0),d=-r.scrollLeft+(0,a.Z)(e),l=-r.scrollTop;return"rtl"===(0,f.Z)(o||n).direction&&(d+=(0,p.Fp)(n.clientWidth,o?o.clientWidth:0)-s),{width:s,height:u,x:d,y:l}}((0,i.Z)(e)))}function b(e,t,n,r){var o="clippingParents"===t?function(e){var t=(0,u.Z)((0,m.Z)(e)),n=["absolute","fixed"].indexOf((0,f.Z)(e).position)>=0&&(0,l.Re)(e)?(0,d.Z)(e):e;return(0,l.kK)(n)?t.filter((function(e){return(0,l.kK)(e)&&(0,h.Z)(e,n)&&"body"!==(0,Z.Z)(e)})):[]}(e):[].concat(t),i=[].concat(o,[n]),a=i[0],s=i.reduce((function(t,n){var o=y(e,n,r);return t.top=(0,p.Fp)(o.top,t.top),t.right=(0,p.VV)(o.right,t.right),t.bottom=(0,p.VV)(o.bottom,t.bottom),t.left=(0,p.Fp)(o.left,t.left),t}),y(e,a,r));return s.width=s.right-s.left,s.height=s.bottom-s.top,s.x=s.left,s.y=s.top,s}var w=n(581),x=n(293),O=n(706);function k(e,t){void 0===t&&(t={});var n=t,o=n.placement,a=void 0===o?e.placement:o,s=n.strategy,f=void 0===s?e.strategy:s,c=n.boundary,p=void 0===c?r.zV:c,u=n.rootBoundary,d=void 0===u?r.Pj:u,m=n.elementContext,h=void 0===m?r.k5:m,Z=n.altBoundary,y=void 0!==Z&&Z,k=n.padding,j=void 0===k?0:k,M=(0,x.Z)("number"!=typeof j?j:(0,O.Z)(j,r.mv)),P=h===r.k5?r.YP:r.k5,D=e.rects.popper,E=e.elements[y?P:h],R=b((0,l.kK)(E)?E:E.contextElement||(0,i.Z)(e.elements.popper),p,d,f),L=(0,v.Z)(e.elements.reference),A=(0,w.Z)({reference:L,element:D,strategy:"absolute",placement:a}),F=g(Object.assign({},D,A)),B=h===r.k5?F:L,V={top:R.top-B.top+M.top,bottom:B.bottom-R.bottom+M.bottom,left:R.left-B.left+M.left,right:B.right-R.right+M.right},W=e.modifiersData.offset;if(h===r.k5&&W){var H=W[a];Object.keys(V).forEach((function(e){var t=[r.F2,r.I].indexOf(e)>=0?1:-1,n=[r.we,r.I].indexOf(e)>=0?"y":"x";V[e]+=H[n]*t}))}return V}},706:(e,t,n)=>{function r(e,t){return t.reduce((function(t,n){return t[n]=e,t}),{})}n.d(t,{Z:()=>r})},206:(e,t,n)=>{function r(e){return e.split("-")[0]}n.d(t,{Z:()=>r})},607:(e,t,n)=>{function r(){return{top:0,right:0,bottom:0,left:0}}n.d(t,{Z:()=>r})},516:(e,t,n)=>{function r(e){return["top","bottom"].indexOf(e)>=0?"x":"y"}n.d(t,{Z:()=>r})},943:(e,t,n)=>{function r(e){return e.split("-")[1]}n.d(t,{Z:()=>r})},138:(e,t,n)=>{n.d(t,{Fp:()=>r,NM:()=>i,VV:()=>o});var r=Math.max,o=Math.min,i=Math.round},293:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(607);function o(e){return Object.assign({},(0,r.Z)(),e)}},918:(e,t,n)=>{function r(){var e=navigator.userAgentData;return null!=e&&e.brands?e.brands.map((function(e){return e.brand+"/"+e.version})).join(" "):navigator.userAgent}n.d(t,{Z:()=>r})},711:(e,t,n)=>{n.d(t,{q:()=>i,u:()=>o});var r=n(138);function o(e,t,n){return(0,r.Fp)(e,(0,r.VV)(t,n))}function i(e,t,n){var r=o(e,t,n);return r>n?n:r}},641:(e,t,n)=>{n(755),n(154),n(909)},567:()=>{},509:()=>{}},e=>{var t=t=>e(e.s=t);e.O(0,[296,593,931],(()=>(t(641),t(567),t(509))));e.O()}]);