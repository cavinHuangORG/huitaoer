$(function(){
	// 分类图标


	// 分类鼠标移入移出效果
	$('.category .content a').hover(function(){
		var _this = $(this).index();
		if (_this == 0) {
			var this_y = 3 + 'px';
		} else {
			var this_y = _this * -38 + 'px';
		}
		$(this).find('i').css({'background-position':'-40px '+ this_y});
	},function(){
		var _this = $(this).index();
		if (_this == 0) {
			var this_y = 3 + 'px';
		} else {
			var this_y = _this * -38 + 'px';
		}
		$(this).find('i').css({'background-position':'0 '+ this_y});
	})

	$('.right_ad a img').hover(function(){
		$(this).stop().animate({'left':'-10px'}, 300);
	},function(){
		$(this).stop().animate({'left':'0'}, 300);
	})

	$.each($('.container .tag li'), function(k, v) {
		 var this_y = k * -43 + 'px';
		 $('.container .tag li').eq(k).css({'background-position':'0 ' + this_y});
	});

	//----------------banner轮换图----------------------
	$('.index_banner .num li:eq(0)').addClass('this');
	var s = 0;
	var time = 4000;
	function banRoll (){	
		//小圆点变色
		s++;
		s = (s == $('.index_banner .num li').length)?0:s;
		$(".index_banner .num li").eq(s).addClass("this").siblings().removeClass();
		
		//淡入淡出
		$(".index_banner .imgbox li").eq(s).fadeIn(500,0).siblings().fadeOut(500,0);	
	}
	var banRolls = setInterval(banRoll,time);
	
	$(".index_banner .num li").hover(function(){
		//清理定时器
		clearInterval(banRolls);
		c = $(this).index();
		$(this).addClass("this").siblings().removeClass();
		$(".index_banner .imgbox li").eq(c).fadeIn(500,0).siblings().stop().fadeOut(500,0);	
	},function(){
		banRolls = setInterval(banRoll,time);
	})
	
	// ------------------商品列表效果-------------------
	$('.goods_list ul li').hover(function(){
		$(this).find('.collect').show()
		$(this).find('.go').show();
		$(this).find('.web p').hide();
	},function(){
		$(this).find('.collect').hide()
		$(this).find('.go').hide();
		$(this).find('.web p').show();
	})

	// 倒计时定时器
    setInterval(backTime, 1000);
    setInterval(backTime2, 1000);

	/**
     * [backTime 倒计时]
     */
    function backTime(){
      // 循环时间容器
      jQuery.each(jQuery('.settime'), function() {
        if(this.getAttribute("endTime") == ''){
          jQuery(this).html('即将开始!');
          return;
        }
        // 获取结束时间
        var endTime = this.getAttribute("endTime");
        // 获取当前时间
        var _time = Date.parse(new Date()) / 1000;
        // 计算当前和结束的时间差
        var lag = endTime - _time;
        // 判断时间差是否大于0
        if (lag > 0) {
           // 计算天
           var day = Math.floor((lag / 3600) / 24);
           // 计算时
           var hour = Math.floor((lag / 3600) % 24);
           // 计算分
           var minite = Math.floor((lag / 60) % 60);
           // 计算秒
           var second = Math.floor(lag % 60);  
           // 输出时间
           jQuery(this).html((hour < 10 ? '<b>0' + hour + "</b>" : '<b>'+hour+'</b>') + "时" + (minite < 10 ? '<b>0' + minite + "</b>" : '<b>'+minite+'</b>') + "分" + (second < 10 ? '<b>0' + second + "</b>" : '<b>'+second+'</b>') + "秒");
        }else{
          // 输出结束
          jQuery(this).html('<b>00</b>时<b>00</b>分<b>00</b>秒');
        }
      });
    }


    function backTime2(){
      // 循环时间容器
      jQuery.each(jQuery('.goods_list .settime'), function() {
        if(this.getAttribute("endTime") == ''){
          jQuery(this).html('即将开始!');
          return;
        }
        // 获取结束时间
        var endTime = this.getAttribute("endTime");
        // 获取当前时间
        var _time = Date.parse(new Date()) / 1000;
        // 计算当前和结束的时间差
        var lag = endTime - _time;
        // 判断时间差是否大于0
        if (lag > 0) {
           // 计算天
           var day = Math.floor((lag / 3600) / 24);
           // 计算时
           var hour = Math.floor((lag / 3600) % 24);
           // 计算分
           var minite = Math.floor((lag / 60) % 60);
           // 计算秒
           var second = Math.floor(lag % 60);  
           // 输出时间
           jQuery(this).html(day + '天' + (hour < 10 ? '<b>0' + hour + "</b>" : '<b>'+hour+'</b>') + "时" + (minite < 10 ? '<b>0' + minite + "</b>" : '<b>'+minite+'</b>') + "分" + (second < 10 ? '<b>0' + second + "</b>" : '<b>'+second+'</b>') + "秒");
        }else{
          // 输出结束
          jQuery(this).html('<b>00</b>天<b>00</b>时<b>00</b>分<b>00</b>秒');
        }
      });
    }
})