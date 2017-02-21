
function openWinBox(URL,title,w,h,okval,cancelVal){ //弹出窗口
	if(!w) w=780;
	if(!h) h= height = $(window).height();
	if(!okval) okval='确定';
	if(!cancelVal) cancelVal='关闭';
	art.dialog.open(URL, {
		title: title,
		width: w,
		height: h,
		lock:true,
		opacity: 0.2,
		ok: function (iframe) {
			var form = iframe.document.getElementById('dosubmit').click();
			return false;
		},
		okVal:okval,
		cancel: true,
		cancelVal:'关闭'
	})
}

function openWinBox2(URL,title,w,h,okval,cancelVal){ //弹出窗口
	if(!w) w=780;
	if(!h) h= height = $(window).height();
	art.dialog.open(URL, {
		title: title,
		width: w,
		height: h,
		lock:true,
		opacity: 0.2,
		ok:false,
		okVal:okval,
		cancel: true,
		cancelVal:'取消'
	})
}

//鼠标激活及失去焦点事件
$.fn.active = function(options) {
	var defaults = {activeClass:'on'};
	var opt = $.extend(defaults, options);
	this.each(function(){
    	var obj=$(this);
		obj.focus(function(){ $(this).addClass(opt.activeClass);});
		obj.blur(function(){ $(this).removeClass(opt.activeClass);});
	});
};

function checkInfo(id,msg,dom){ //表单验证提示
	$('#'+id).select();
	$('span.onShow').removeClass('onError').html('');
	if(dom){
		$(dom).addClass('onError').html(msg);
	}else{
		$('#'+id).next('span.onShow').addClass('onError').html(msg);
	}
	setTimeout(function(){ $('#'+id).next('span').removeClass('onError').html('');},2500);
}

function msg(content,icon,time,opacity){ //弹出提示窗口
	if(!time) time = 1.5;
	if(!opacity) opacity = 0;
	if(isNaN(icon)===false){
		switch (icon){
			case 0:icon='error';break;
			case 1:icon='succeed';break;
			case 2:icon='warning';break;
			default: icon='warning';
		}
	}
	art.dialog.through({
		time: time,
		icon: icon,
		lock:true,
		opacity:opacity,
		content: content
	});
}

function closeWin(time){ //关闭弹出窗口
	if(!time) time = 0;
	setTimeout("art.dialog.close()",time);
}

function selectChange(id){
	$('#'+id+'').submit();
}

/**
 * 全选checkbox,注意：标识checkbox id固定为为check_box
 * @param string name 列表check名称,如 uid[]
 */
function selectall(name) {
	if ($("#check_box").attr("checked")==false) {
		$("input[name='"+name+"']").each(function() {
			this.checked=false;
		});
	} else {
		$("input[name='"+name+"']").each(function() {
			this.checked=true;
		});
	}
}


$(function(){
	$('.sub_pos').click(function(){
		var txt = $(this).html();
		var win = art.dialog.top;
		win.document.getElementById('sub_pos').innerHTML = " >> "+txt;
	})
})

function sound(sound){ //背景提示音乐
	$('bgsound').attr('src','/Public/Media/'+sound+'.mp3');
}

$(function(){
	$('.input-text').active();
	$('textarea').active();
})
