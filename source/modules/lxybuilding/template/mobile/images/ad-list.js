
var FCAPP=FCAPP||{};FCAPP.ADList=FCAPP.ADList||{RUNTIME:{},init:function(){var R=ADList.RUNTIME;if(!window.gQuery&&!gQuery.id){setTimeout(arguments.callee,200);return;}
ADList.initElements();ADList.initEvents();ADList.loadADListData();FCAPP.Common.hideToolbar();},initElements:function(){var R=ADList.RUNTIME;if(!R.template){R.container=$('#container');R.template=FCAPP.Common.escTpl($('#template').html());R.popTips=$('div.pop_tips');}},initEvents:function(){var R=ADList.RUNTIME;$(window).resize(function(){FCAPP.Common.resizeLayout(R.popTips);});},loadADListData:function(){window.renderData=ADList.renderData;var datafile=window.gQuery&&gQuery.listnum?gQuery.listnum+'.':'',dt=new Date();datafile=datafile.replace(/[<>\'\"\/\\&#\?\s\r\n]+/gi,'');datafile+='ad-list.js?';$.ajax({url:'static/'+datafile+dt.getDate()+dt.getHours(),dataType:'jsonp'});},renderData:function(data){var R=ADList.RUNTIME,id=window.gQuery&&gQuery.id?gQuery.id:'';FCAPP.Common.hideLoading();data.id=id;R.container.html($.template(R.template,{data:data}));if(data.bgImg&&data.bgImg.length){var bgEl=$("<div style=\"background-image:url("+data.bgImg+");background-size:100% 100%;position:fixed;left:0;top:0;right:0;bottom:0;width:100%;height:100%;z-index:-100\"></div>");$(document.body).prepend(bgEl);}},goDetail:function(id){id=id||'';FCAPP.Common.jumpTo('ad-desc.html',{adid:id,from:"ad-list.html"},true);},goDetail_1:function(id){id=id||'';FCAPP.Common.jumpTo('ad-desc-1.html',{adid:id,from:"ad-list.html"},true);}};var ADList=FCAPP.ADList;$(document).ready(ADList.init);