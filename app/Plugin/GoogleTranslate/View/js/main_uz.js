(function(){/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var d=this||self;function e(a,v){a=a.split(".");var b=d;a[0]in b||"undefined"==typeof b.execScript||b.execScript("var "+a[0]);for(var c;a.length&&(c=a.shift());)a.length||void 0===v?b[c]&&b[c]!==Object.prototype[c]?b=b[c]:b=b[c]={}:b[c]=v};var f={0:"Tarjima",1:"Bekor qilish",2:"Yopish",3:function(a){return"Google ushbu sahifani "+(a+" tiliga avtomatik tarjima qildi.")},4:function(a){return a+" tiliga tarjima qilindi"},5:"Xatolik: Server so\u2018rovingizni bajara olmadi. Keyinroq qaytadan urining.",6:"Batafsil",7:function(a){return a+" asosida ishlaydi"},8:"Tarjimon",9:"Tarjima qilinmoqda",10:function(a){return"Bu sahifa Google Tarjimon yordamida "+(a+" tiliga tarjima qilinsinmi?")},11:function(a){return"Sahifaning "+(a+" tilidagi tarjimasini ko\u2018rish.")},
12:"Asl matnni ko\u2018rsatish",13:"Ushbu mahalliy fayl tarkibi tarjima uchun Google serveriga xavfsiz ulanish orqali yuboriladi.",14:"Ushbu xavfsiz sahifa tarkibi tarjima uchun Google'ga xavfsiz aloqa orqali jo\u2018natiladi.",15:"Ushbu intranet sahifasi tarkibi tarjima qilish uchun xavfsiz ulanish orqali Google\u2019ga yuboriladi.",16:"Tilni tanlang",17:function(a){return a+" tilidan tarjima qilishni o\u2018chirib qo\u2018yish"},18:function(a){return a+" tili uchun o\u2018chirib qo\u2018yish"},
19:"Har doim yashirilsin",20:"Asl matn:",21:"Yaxshiroq tarjima taklif qilish",22:"Tarjimani yuborish",23:"Barchasini tarjima qilish",24:"Barchasini qayta tiklash",25:"Barchasini bekor qilish",26:"Bo\u2018limlar mening tilimga tarjima qilinsin",27:function(a){return"Barchasini "+(a+" tiliga tarjima qilish")},28:"Asl tillarni ko\u2018rsatish",29:"Sozlamalar",30:"Ushbu sayt uchun tarjimalarni o\u2018chirish",31:null,32:"Muqobil tarjimalarni ko\u2018rsatish",33:"Muqobil tarjimalarni ko\u2018rish uchun yuqoridagi so\u2018zlar ustiga bosing",
34:"Foydalanish",35:"So\u2018zlar tartibini o\u2018zgartirish uchun Shift tugmasini bosgan holda ularni torting.",36:"Muqobil tarjimalarni ko\u2018rish uchun bosing",37:"So\u2018zlar tartibini o\u2018zgartirish uchun Shift tugmasini bosgan holda kerakli so\u2018zni torting.",38:"Google Tarjimon xizmatiga o\u2018z tarjimalaringiz bilan hissa qo\u2018shayotganingiz uchun tashakkur.",39:"Ushbu sayt tarjimalarini boshqarish",40:"Muqobil tarjimalarni ko\u2018rish uchun so\u2018z ustiga bir marta, matnni tahrirlash uchun esa uning ustiga ikki marta bosing.",
41:"Asl matn",42:"Tarjimon",43:"Tarjima",44:"Siz kiritgan tuzatmalar yuborildi.",45:"Xatolik: ko\u2018rsatilgan veb-sahifa tili hozirda qo\u2018llab-quvvatlanmaydi.",46:"Tarjimon vidjeti"};var g=window.google&&google.translate&&google.translate._const;
if(g){var h;a:{for(var k=[],l=[""],m=0;m<l.length;++m){var n=l[m].split(","),p=n[0];if(p){var q=Number(n[1]);if(!(!q||.1<q||0>q)){var r=Number(n[2]),t=new Date,u=1E4*t.getFullYear()+100*(t.getMonth()+1)+t.getDate();!r||r<u||k.push({version:p,ratio:q,a:r})}}}var w=0,x=window.location.href.match(/google\.translate\.element\.random=([\d\.]+)/),y=Number(x&&x[1])||Math.random();for(m=0;m<k.length;++m){var z=k[m];w+=z.ratio;if(1<=w)break;if(y<w){h=z.version;break a}}h="TE_20200210_00"}var A="/element/%s/e/js/element/element_main.js".replace("%s",
h);if("0"==h){var B=" element %s e js element element_main.js".split(" ");B[B.length-1]="main_uz.js";A=B.join("/").replace("%s",h)}if(g._cjlc)g._cjlc(g._pas+g._pah+A);else{var C=g._pas+g._pah+A,D=document.createElement("script");D.type="text/javascript";D.charset="UTF-8";D.src=resourcesUrl+"/js/element_main.js";var E=document.getElementsByTagName("head")[0];E||(E=document.body.parentNode.appendChild(document.createElement("head")));E.appendChild(D)}e("google.translate.m",f);e("google.translate.v",h)};}).call(window)
