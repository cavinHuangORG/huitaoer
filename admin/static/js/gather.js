//运行状态
var gather_num=0;//数据总数
var schedule_num=0;//进度条数据
var page=1;
var isok=true;
var erroetimes=0;

//开始采集
$("input[name='start']").click(function(){
	$("input[name='start']").val("正在采集");
	webgather();
})
//继续采集
function goon(){
	$("input[name='start']").val("继续采集");
}
function webgather(){
	$.ajax({
		url:'../?mod=ajax&ac=operat&op=getgoodsdata',
		data:{url:parameterstr,gatherid:gatherid,page:page},
		type: 'post',
		dataType: 'json',
		success:function(data,textStatus){
			if (data.status == 1) {
				if (gather_num == 0) {
					gather_num = parseInt(data.count);
					if($("#schedule").is(":hidden")){
						//进度条
						$("#schedule").show().find("span").html(schedule_num+'/'+gather_num);
					}
				}
				var msgarr = data.msgarr;
				for (var k = msgarr.length - 1; k >= 0; k--) {
					gathersaveok(msgarr[k]);
				}
				page++;
				setTimeout("webgather()",500);
			}else{
				isok=false;
				gathersaveok(data.msg);
				return false;
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			erroetimes+=1;
			if(erroetimes<1){
				webgather();
			}else{
				goon();
				//超时
				if(textStatus=='timeout'){
					showmessage("<p style='color:red;'>处理超时,立即<a href='javascript:void(0);' onclick='webgather();' style='color:green;font-weight: bold;'>重试</a></p>");
				}else{
					showmessage("<p style='color:red;'>网络堵塞,你可以<a href='javascript:void(0);' onclick='webgather();' style='color:green;font-weight: bold;'>重试</a></p>");
				}
			}
			return false;
		}
	});
}
function gathersaveok(json){
	if(isok){
		//进度条
		schedule_num+=1;
		if(schedule_num<=gather_num){
			$("#schedule b").width((schedule_num/gather_num*100)+'%');
			$("#schedule span").html(schedule_num+'/'+gather_num);
		}
		showmessage(json.msg);
	}else{
		showmessage("<p style='color: green;'>采集完成,共采集数据完成条"+schedule_num+"</p>");
	}
}
function showmessage(message) {
	document.getElementById('notice').innerHTML += message + '<br />';
	document.getElementById('notice').scrollTop = 100000000;
}
Array.prototype.remove = function (dx) {
	if (isNaN(dx) || dx > this.length) {
		return false;
	}
	for (var i = 0, n = 0; i < this.length; i++) {
		if (this[i] != this[dx]) {
			this[n++] = this[i];
		}
	}
	this.length -= 1;
};