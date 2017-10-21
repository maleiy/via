var css = '<style type="text/css">' +
				'.ciba_ds{width:100%; height:30px; line-height:30px;}' +
				'.ciba_ds_con{width:96%; margin:0 auto; padding:0 auto; height:30px; line-height:30px; color:#000; font-size:12px;}' +
				'.ciba_ds_juzi{width:75%; height:30px; float:left; overflow:hidden; word-wrap:break-word;}' +
				'.ciba_ds_juzi a{color:#000;}' +
				'.ciba_ds_juzi a:hover{text-decoration:underline;}' +
				'.l{float:left;}' +
				'.iciba_common_laba:hover {background-position: 0 -13px;}' +
				'.iciba_common_laba{float: left; display: block; width: 15px; height: 13px; overflow: hidden; background: url(\'http://cdn.iciba.com/web/common_top/top.gif\') no-repeat; margin: 9px 9px 0 5px;}' +
				'.iciba_common_top_lx {float: left; display: block; width: 11px; height: 14px; overflow: hidden; background: url(\'http://cdn.iciba.com/web/open/img/maike.gif\') no-repeat; margin: 9px 9px 0 5px;}' +
			   '</style>';
			   
var content = '<div class="ciba_ds">' +
            	'<div class="ciba_ds_con">' +
                	'<div class="l">每日一句：</div><div class="ciba_ds_juzi"><a href="http://news.iciba.com/dailysentence/detail-2758.html" title="One day someone will walk into your life, then you realize love is always worth waiting for. 有一天那个人走进了你的生命，你就会明白，真爱总是值得等待的。" target="_blank">One day someone will walk into your life, then you realize love is always worth waiting for. 有一天那个人走进了你的生命，你就会明白，真爱总是值得等待的。</a></div><a class="iciba_common_laba" href="javascript:;" title="点击发音" onclick="asplay_top(\'http://news.iciba.com/admin/tts/2017-10-22-day\');" onmouseover="iciba_common_top_onSecondDelay(\'http://news.iciba.com/admin/tts/2017-10-22-day\');" onmouseout="clearTimeout(timer);"></a>' +
                '<object style="height:0px;width:0px;overflow:hidden;" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="0" height="0" id="asound_top" align="absmiddle"> <param name="allowScriptAccess" value="always" /> <param name="movie" value="http://www.iciba.com/top/asound.swf" /> <param name="quality" value="high" /> <embed src="http://www.iciba.com/top/asound.swf" quality="high" width="0" height="0" name="asound_top" align="absmiddle" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /> </object><a class="iciba_common_top_lx" href="http://news.iciba.com/dailysentence/speak-2758.html" target="_blank"></a>' +
                '</div>' +
            '</div>';
document.write(css + content);

function getFlashObject_top(movieName) {
	if (window.document[movieName]) {
		return window.document[movieName];
	}
	if (navigator.appName.indexOf("Microsoft Internet")==-1) {
		if (document.embeds && document.embeds[movieName])
		return document.embeds[movieName];
	} else  {
		return document.getElementById(movieName);
	}
}

function asplay_top(c){
	var browser={    
		versions:function(){            
			var u = navigator.userAgent, app = navigator.appVersion;            
			return {                
				trident: u.indexOf('Trident') > -1, //IE内核                
				presto: u.indexOf('Presto') > -1, //opera内核                
				webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核                
				gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核                
				mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/), //是否为移动终端                
				ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端                
				android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器                
				iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器                
				iPad: u.indexOf('iPad') > -1, //是否iPad                
				webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部            
			};
		}()
	};
	
	if( browser.versions.ios
	    ||browser.versions.iPhone
	    ||browser.versions.iPad
	){
		var _audio		= document.createElement("audio");
		var _source		= document.createElement("source");
		_audio.appendChild(_source);
		_source.src = c;
		_audio.play();
	}else{
		var asound = getFlashObject_top("asound_top");
		if(asound){
			asound.SetVariable("f",c);
			asound.GotoFrame(1);
		}
	}
}

function asstop_top(){
	var asound = getFlashObject_top("asound_top");
	if(asound){
		asound.GotoFrame(3);
	}
}
var timer = null;
function  iciba_common_top_callback(mp3) {
	asplay_top(mp3);
}
function  iciba_common_top_onSecondDelay(mp3) {
	clearTimeout(timer);
	var mp3_1 = "iciba_common_top_callback('"+mp3+"')";
	timer = setTimeout(mp3_1, 100);
}
