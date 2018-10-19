<?php include(PATH_TPL."/header.tpl.php");?>
<script type="text/javascript" src='./static/js/jQuery.dotdotdot.js?<?=time()?>'></script>
<style>
	body{
		background-color: white !important;
	}
	.banner-wrapper img{
	    width: 100%;
	}
	.reco-list {
	    width: 1024px;
	}
	.load-tip {
	    width: 100%;
	    text-align: center;
	    clear: both;
	    display: block;
	    height: 76px;
	    border-radius: 6px;
	    background: #fff;
	    border: solid #dedede 1px;
	    line-height: 76px;
	    margin: 10 auto;
	    margin-bottom: 30px;
	    cursor: pointer;
	    font-size: 16px;
	}
	a{
		color: #39442e;
	}
	.wrapper {
	    width:980px; margin:0 auto; zoom:1
	}	
	.wrapper h3 {
	    font-size: 18px;
	    font-weight: 400;
	    padding-bottom: 20px;
	    color: #333;
	}
	.post-item {
	    width: 310px;
	    height: 346px;
	    border-radius: 6px;
	    border: solid #dedede thin;
	    float: left;
	    margin-bottom: 30px;
	    background: #fff;
	    margin-right: 22px;
	     -webkit-transition: all .5s ease 0s;
	    -moz-transition: all .5s ease 0s;
	    -o-transition: all .5s ease 0s
	}
	.post-item .pitem {
	    position: relative;
	    display: block;
	    width: 100%;
	    height: 100%;
	}
	.post-item .pitem-cover {
	    height: 142px;
	}
	.post-item .new-flag {
	    position: absolute;
	    left: 0;
	    top: 0;
	    width: 57px;
	    height: 56px;
	    background: url(<?=PATH_TPL;?>/static/images/icon_tag_new.png);
	    background-size: 100% 100%;
	}
	.post-item .pitem-title {
	    font-size: 18px;
	    padding: 15px;
	    color: #333;
	    line-height: 25px;
	    overflow:hidden;
	    text-overflow:ellipsis;
	    white-space:nowrap;
	}
	.post-item .pitem-content {
	    font-size: 14px;
	    color: #888;
	    height: 80px;
	    padding: 15px;
	    padding-top: 0;
	    line-height: 21px;
	}
	.post-item .pitem-info {
	    position: absolute;
	    bottom: 0;
	    left: 0;
	    padding: 15px;
	}
	.post-item .info-item {
	    float: left;
	    height: 17px;
	    margin-right: 15px;
	}
	.post-item .info-item i {
	    display: block;
	    width: 18px;
	    height: 17px;
	    float: left;
	}
	.login-modals .modal-close, .login-modals .login-icon-weibo, .login-modals .login-icon-qq, .login-modals .login-icon-wechat, .icon-like, .icon-like.active, .icon-share, .icon-comment, .icon-weixin, .icon-qzone, .icon-qq, .icon-weibo, .back-top-post .bt-qr-code, .back-top-post .bt-button, .back-top-post .bt-button:hover {
    	background-image: url(<?=PATH_TPL;?>/static/images/detail_z.png);
	}
	.icon-share {
	    background-position: -147px -388px;
	}
	.icon-share {
	    margin-top: -3px;
	    background-repeat: no-repeat;
	}
	.icon-comment {
	    background-position: -147px -408px;
	}
	.icon-like {
	    background-position: -147px -348px;
	}
	.post-item .info-item span {
	    font-size: 14px;
	    line-height: 18px;
	    color: #333;
	    display: block;
	    padding: 0;
	    margin: -1px 0 0 24px;
	}
	.back-top-post {
	    display: none;
	    width: 163px;
	    height: 353px;
	    cursor: pointer;
	}

	.sticky {
	    position: fixed;
	    left: 50%;
	    margin-left: 452px;
	    bottom: 115px;
	    z-index: 100;
	    border-top: 0;
	    display: block;
	}
	.back-top-post .bt-qr-code {
	    background-position: 0px -576px;
	}
	.back-top-post .bt-qr-code {
	    width: 165px;
	    height: 284px;
	    background-repeat: no-repeat;
	}
	.back-top-post .bt-button {
	    width: 61px;
	    height: 60px;
	    margin-left: 54px;
	    background-repeat: no-repeat;
	}
	.back-top-post .bt-button {
	    background-position: -104px -863px;
	}
	.post-item:hover {
	    -webkit-transition: all .5s ease 0s;
	    -moz-transition: all .5s ease 0s;
	    -o-transition: all .5s ease 0s;
	    -moz-transform: translate(0px,-5px);
	    -webkit-transform: translate(0px,-5px);
	    -o-transform: translate(0px,-5px);
	    -ms-transform: translate(0px,-5px);
	    transform: translate(0px,-5px);
	    -webkit-box-shadow: 0 5px 10px rgba(67,72,84,.3);
	    -moz-box-shadow: 0 5px 10px rgba(67,72,84,.3);
	    -o-box-shadow: 0 5px 10px rgba(67,72,84,.3);
	    box-shadow: 0 5px 10px rgba(67,72,84,.3)
	
	}

</style>
<div class="banner-wrapper">
	<img src="/static/images/bg_banner_home.jpg">
</div>
<div class="wrapper clearfix_f" style="margin-top:50px">
	<h3 >攻略精选</h3>
	<ul class="reco-list" id="reco-list"></ul>
	<div class="load-tip" id="next" style="display: block;">
        <a href="javascript:;">点击加载更多</a>
    </div>
</div>
<script type="text/javascript">
	var page=1;
	function load_data()
	{
		$.get('?mod=ajax&ac=operat&op=getworth',{page:page},function(data){
			var uobj=$('#reco-list');
			var html='';
			if(data.data.length<=0)
			{
				$('#next>a').html('已经到底啦！！');
				return;
			}
			for (var i = 0; i <data.data.length; i++) {
				html='<li class="post-item"><a href="'+data.data[i].url+'" class="pitem" target="_blank"><img data-original="'+data.data[i].pic+'" src="static/images/default.gif" class="pitem-cover lazy" style="border-radius: 6px 6px 0 0;width: 100%;">';
				if(data.data[i].news)
				{
					html+='<div class="new-flag flag-1011215">';
				}
				html+='</div><div class="pitem-title">'+data.data[i].title+'</div><div class="pitem-content ellipsis"><p>'+data.data[i].descr+'</p></div><div class="pitem-event-cover" data-id="1011215" data-url="'+data.data[i].url+'"></div><ul class="pitem-info"><li class="info-item"><i class="info-icon icon-like" data-id="'+data.data[i].wid+'"></i><span>'+data.data[i].like_num+'</span></li><li class="info-item"><i class="info-icon icon-comment"></i><span>'+data.data[i].comment_num+'</span></li><li class="info-item"><i class="info-icon icon-share"></i><span>'+data.data[i].share_num+'</span></li></ul></a></li>';
				uobj.html(uobj.html()+html);
				$("img.lazy").lazyload({skip_invisible:false,effect : "fadeIn",failurelimit:10});
				$(".ellipsis").dotdotdot({height:80}).removeClass('ellipsis');

			}
			$('#next>a').html('点击加载更多');
		},'json');
		page++;
	}
	$(function(){
		load_data();
		$('#next>a').click(function(){
			load_data();
			return false;
		});
		$(window).scroll(function () {
		    if ($(document).scrollTop() + $(window).height() >= $(document).height()) {
		        load_data();
		    }
		});
		function initBackTop() {
	        var n = function() {
	            var n = $(window).scrollTop();
	            n > 200 ? $(".back-top-post").addClass("sticky") : $(".back-top-post").removeClass("sticky")
	        };
	        $(".bt-button").click(function(n) {
	            return n.preventDefault(),
	            $("html, body").animate({
	                scrollTop: 0
	            },
	            300, "swing"),
	            !1
	        }),
	        n(),
	        $(window).scroll(function() {
	            n()
	        })
	    }
        initBackTop();
	})
</script>
<?php include(PATH_TPL."/footer.tpl.php"); ?>