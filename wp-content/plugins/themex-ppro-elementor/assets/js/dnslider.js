/*dnslider js */

!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?t(require("jquery")):t(jQuery)}(function(t){"use strict";var i="dnSlide",n="1.0.0";t[i]&&t[i].version>n||(t[i]=function(t,i){return this.container=t,this.options=i,this.api=["init","destroy","hide","show"],this.init(),this},t[i].version=n,t[i].defaults={switching:"normal",isOddShow:!1,precentWidth:"50%",autoPlay:!1,delay:5e3,scale:.9,speed:500,verticalAlign:"middle",afterClickBtnFn:null},t[i].prototype={init:function(){var i=this;this.data(),this.settingDOM(),this.isIE7=/MSIE 6.0|MSIE 7.0/gi.test(window.navigator.userAgent),this.dnSlideMain=this.container.find(".dnSlide-main"),this.dnSlideItems=this.container.find("ul.dnSlide-list"),this.dnSlideLi=this.container.find(".dnSlide-item"),this.firstItem=this.container.find("ul.dnSlide-list > li:first-child"),this.dnSlideItemsLength=this.container.find("ul.dnSlide-list>li").length,this.dnSlideFirstItem=this.container.find("ul.dnSlide-list>li:first-child"),this.dnSlideLastItem=this.container.find("ul.dnSlide-list>li:last-child"),this.options.isOddShow&&this.isEvenPicNum(),this.options.response&&this.container.addClass("dn-response"),this.prevBtn=this.container.find(".dnSlide-left-btn"),this.nextBtn=this.container.find(".dnSlide-right-btn"),this.prevBtn=this.container.find("div.dnSlide-left-btn"),this.nextBtn=this.container.find("div.dnSlide-right-btn"),this.rotateFlag=!0,this.clearLiStyle(),this.countSettingValue(),this.setPositionValue(),this.setDefaultLiJson(),"custom"===this.options.switching&&this.dnSlideLi.off().on("click",function(){i.clickCurrentLI(t(this).index())}),this.options.autoPlay&&(this.autoPlay(),this.container.hover(function(){clearTimeout(i.timer)},function(){i.autoPlay()})),this.prevBtn.off().on("click",function(t){t.stopPropagation();var n=i.options.afterClickPrevBtnFn;i.rotateFlag&&(i.rotateFlag=!1,i.dnSlideRotate("right")),"function"==typeof n&&n&&n()}),this.nextBtn.off().on("click",function(t){t.stopPropagation();var n=i.options.afterClickNextBtnFn;i.rotateFlag&&(i.rotateFlag=!1,i.dnSlideRotate("left")),"function"==typeof n&&n&&n()}),t(window).resize(function(){i.WndwResize()})},data:function(){this.container.data(i)||this.container.data(i,{target:this.container})},destroy:function(){this.container.empty().html(this.defalutHtml)},hide:function(t){this.container.addClass("dnSlide-hide"),t&&"function"==typeof t&&t()},show:function(t){this.container.removeClass("dnSlide-hide"),t&&"function"==typeof t&&t()},settingDOM:function(){var t=this,i="normal"===this.options.switching?"<div class='dnSlide-btn dnSlide-left-btn'></div><div class='dnSlide-btn dnSlide-right-btn'></div>":null;this.defalutHtml=this.container.html(),this.resourceSrcArr=this.container.find("img").map(function(t,i){return i.src});var n=this.container.html('<ul class="dnSlide-list"></ul>').find(".dnSlide-list");jQuery.each(this.resourceSrcArr,function(i,e){n.append('<li class="dnSlide-item"><a href="javascript:void(0)"><img class="slide-img" src="'+t.resourceSrcArr[i]+'" width="100%"></a></li>')}),n.parents(".dnSlide-main").append(i)},WndwResize:function(){var t=this,i="";i&&(clearTimeout(i),i=null),i=setTimeout(function(){t.clearLiStyle(),t.countSettingValue(),t.setPositionValue(),t.setDefaultLiJson()},250)},getCustomSetting:function(){var t=this.setting;return t&&""!==t?t:{}},clearLiStyle:function(){this.dnSlideLi.attr("style","")},countSettingValue:function(){this.options.response;var t="100%",i=Math.floor(this.dnSlideItemsLength/2);this.firstItem.css({width:this.dnSlideItems.width()*(parseFloat(this.options.precentWidth.replace("px",""))/100)}),this.firstItem.css({height:this.dnSlideFirstItem.find(".slide-img").height()}),this.container.css({width:null,height:this.dnSlideFirstItem.find(".slide-img").height()}),this.prevBtn.css({width:(this.container.width()-this.firstItem.width())/2,height:t}),this.nextBtn.css({width:(this.container.width()-this.firstItem.width())/2,height:t}),this.dnSlideFirstItem.css({left:(this.container.width()-this.firstItem.width())/2,zIndex:i})},setPositionValue:function(){var i=this,n=(this.options.response,Math.floor(this.dnSlideItemsLength/2)),e=this.container.find(".dnSlide-list > li").slice(1),s=e.slice(0,e.length/2),d=e.slice(e.length/2),h=(this.container.width()-this.firstItem.width())/2,l=h/n,o=this.dnSlideFirstItem.width(),a=this.dnSlideFirstItem.height();s.each(function(e,s){o*=i.options.scale,a*=i.options.scale;var d=e;t(s).css({width:o,height:a,zIndex:--n,opacity:1/++d,left:h+i.dnSlideFirstItem.width()+ ++e*l-o,top:i.settingVerticalAlign(a)})});var r=s.last().width(),c=s.last().height(),f=Math.floor(this.dnSlideItemsLength/2);d.each(function(e,s){t(s).css({width:r,height:c,zIndex:n++,opacity:1/f--,left:l*e,top:i.settingVerticalAlign(c)}),r/=i.options.scale,c/=i.options.scale})},settingVerticalAlign:function(t){var i=this.options.verticalAlign,n=this.dnSlideFirstItem.find(".slide-img").height();return"middle"===i?(n-t)/2:"top"===i?0:"bottom"===i?n-t:(n-t)/2},dnSlideRotate:function(i){var n=this,e=[],s=[];"left"===i?(this.dnSlideItems.find("li").each(function(i,s){var d=t(s).prev().get(0)?t(s).prev():n.dnSlideLastItem,h=d.width(),l=d.height(),o=d.css("zIndex"),a=d.css("top"),r=d.css("left"),c=d.css("opacity");e.push(o),t(s).animate({width:h,height:l,top:a,left:r,opacity:c},n.options.speed,function(){n.rotateFlag=!0})}),this.dnSlideItems.find("li").each(function(i){t(this).css("zIndex",e[i]),s.push(parseInt(e[i]))})):"right"===i&&(this.dnSlideItems.find("li").each(function(i,s){var d=t(s).next().get(0)?t(s).next():n.dnSlideFirstItem,h=d.width(),l=d.height(),o=d.css("zIndex"),a=d.css("top"),r=d.css("left"),c=d.css("opacity");e.push(o),t(s).animate({width:h,height:l,top:a,left:r,opacity:c},function(){n.rotateFlag=!0})}),this.dnSlideItems.find("li").each(function(i){t(this).css("zIndex",e[i]),s.push(parseInt(e[i]))}));var d=Math.max.apply(null,s),h=jQuery.inArray(d,s);this.options.afterClickBtnFn.apply(this,[h])},setDefaultLiJson:function(){this.setliArr=this.dnSlideLi.map(function(i,n){var e=[];return e.push({width:t(n).css("width"),height:t(n).css("height"),opacity:t(n).css("opacity"),"z-index":t(n).css("z-index"),left:t(n).css("left"),top:t(n).css("top"),current:i}),e}).get()},clickCurrentLI:function(i){var n=this,e=this.dnSlideLi,s=e.map(function(i){return t(this).index()}).get(),d=s,h=d.splice(d.indexOf(i),n.dnSlideItemsLength);n.rotateFlag=!1,h.reverse().forEach(function(t,i){d.unshift(h[i])}),this.setliArr.forEach(function(t,i){t.index=s[i],e.eq(n.setliArr[i].index).css("zIndex",n.setliArr[i]["z-index"]).animate(n.setliArr[i],function(){n.rotateFlag=!1})})},autoPlay:function(){var t=this;this.timer=setInterval(function(){t.dnSlideRotate("left")},t.options.delay)},isEvenPicNum:function(){this.dnSlideItemsLength%2==0&&(this.dnSlideItems.append(this.dnSlideFirstItem.clone()),this.dnSlideItemsLength=this.dnSlide.find("ul.dnSlide-list>li").length,this.dnSlideFirstItem=this.dnSlide.find("ul.dnSlide-list>li:first-child"),this.dnSlideLastItem=this.dnSlide.find("ul.dnSlide-list>li:last-child"))},_api_:function(){var i=this,n={};return t.each(this.api,function(t){var e=this;n[e]=function(){var t=i[e].apply(i,arguments);return void 0===t?n:t}}),n}},t.fn[i]=function(n){return n=t.extend(!0,{},t[i].defaults,n),this.each(function(){t(this).data(i,new t[i](t(this),n)._api_()),t(this).addClass("done")})})});

