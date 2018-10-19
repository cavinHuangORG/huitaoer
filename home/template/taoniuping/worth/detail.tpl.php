<?php if(isMobile()): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="renderer" content="webkit">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta id="vp" name="viewport" content="width=device-width, user-scalable=no,maximum-scale=1.0,initial-scale=1">
<meta name="keywords" content="<?=$_webset['site_metakeyword'];?>">
<meta name="description" content="<?=$_webset['site_metadescrip'];?>">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="Shortcut Icon" href="/favicon.ico">
<link rel="Bookmark" href="/favicon.ico">
<link rel="apple-touch-icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?=PATH_TPL?>/static/css/worth.css" />
<title><?=$woth['title']?></title>
</head>
<body>
<a class="header" href="/m/">
    <div class="header-left">这篇棒棒的攻略来自<span>凑贝网</span></div>
    <div class="header-right"></div>
</a>
<div class="post-content">
    <div class="wrapper wrapper-cover">
        <div class="cover">
            <img src="<?=$worth['pic']?>" alt="" class="hoverZoomLink">
        </div>
    </div>
    <div class="wrapper wrapper-main">
        <div class="post">
            <div class="td">
                <h1 class="title"><?=$worth['title']?></h1>
                <div class="post-info">
                    <p><i class="info-icon like-icon"></i><span><?=$worth['like_num']?> 喜欢</span></p>
                    <p><i class="info-icon share-icon"></i><span><?=$worth['share_num']?> 分享</span></p>
                </div>
            </div>
            <hr class="fancy-line"/>
            <div class="contentz">
                <p>&nbsp;<?=$worth['descr']?></p>
                <?php foreach($data as $k=>$goods):?>
                <p class="item-title"><span class="ititle-serial"><?=$k;?></span><span class="ititle"><?=$goods['title'];?></span></p>
                <p><?=$goods['remark'];?><img src="<?=$goods['pic'];?>" alt="" /></p>
                <p>
                	<div class="item-info">
	                	<p class="item-info-price"><span style="font-family: arial;">￥<?=$goods['promotion_price']?></span></p>
	                	<p class="item-like-info"><?=$goods['volume']?>人喜欢</p>
	                	<a class="item-info-link" <?=gogood($goods['num_iid']);?> ><span>查看详情</span></a>
                	</div>
                </p>
                <?php endforeach;?>
			</div>
        </div>
    </div>
</div>
<a href="/m/" class="download-content download-content-sm">
    <div class="wrapper download-banner">
        <img class="app-download" src="<?=PATH_TPL?>/static/images/app_download.png"/>
        <img class="app-icon" src="<?=PATH_TPL?>/static/images/app_icon.png"/>
    </div>
</a>
<!--微信弹框提示-->
<div id="share-tip" style="display: none; position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.7);z-index: 1000000;">
    <div id="share-tip-bg" style="border-radius:0 0 15px 15px;position: relative;z-index: 1000001;margin: 0 10px;max-width: 700px;text-align: center;background: #fff;height: 123px;">
        <img id="share-tip-android" style="width: 300px;height: 122.5px;margin: 0 auto;" src="<?=PATH_TPL?>/static/images/wechat_tip_android.png">
        <img id="share-tip-ios" style="width: 300px;height: 122.5px;margin: 0 auto;" src="<?=PATH_TPL?>/static/images/wechat_tip_ios.png">
    </div>
</div>
</body>
</html>
<?php else:?>
<?php include(PATH_TPL."/header.tpl.php"); ?>
<style type="text/css">
	body{
		background-color: white !important;
	}
	.wrapper {
	    width:980px; margin:0 auto; zoom:1
	}
	.main-content {
	    margin-top: 50px;
	    overflow: hidden;
	}
	.content-left {
	    float: left;
	    width: 600px;
	}
	.content-right {
	    float: left;
    	margin-left: 100px;
	}
	.post-content {
	    max-width: 700px;
	    min-width: 300px;
	    border-radius: 10px;
	    background: #fff;
	}
	.fw {
	    width: 100%;
	}
	.post-content .cover {
	    margin-bottom: 22px;
	}
	.post-content .cover img {
	    width: 100%;
	}
	.contentz img {
	    width: 100%;
	    margin-top: 10px;
	    margin-bottom: 10px;
	}
	.wrapper-main {
	    margin-bottom: 30px;
	}
	.post {
	    color: #777e83;
	}
	.post .td {
	    position: relative;
	    margin-bottom: 18px;
	    margin-top: -12px;
	}
	.post .title {
	    color: #2f323b;
	    margin-top: 10px;
	    margin-bottom: 10px;
	    font-size: 26px;
	    line-height: 40px;
	    font-weight:bold;
	}
	.td-post-info {
	    text-align: left;
	    position: relative;
	    margin-top: 30px;
	}
	.post .date {
	    float: right;
	    font-size: 14px;
	    color: #777e83;
	}
	.post-content-footer {
	    text-align: left;
	    height: 47px;
	    position: relative;
	    padding-bottom: 7px;
	    border-bottom: #dedede solid thin;
	}
	.info-item {
	    float: left;
	    height: 17px;
	    margin-right: 25px;
	}
	.item-info:before {
	    content: '';
	    display: block;
	    background: #d8d8d8;
	    width: 4px;
	    height: 90%;
	    position: absolute;
	    top: 5%;
	}
	.info-item i {
	    display: inline-block;
	    width: 18px;
	    height: 17px;
	    vertical-align: middle;
	}

	.sticky {
	    position: fixed;
	    left: 50%;
	    margin-left: 100px;
	    bottom: 115px;
	    z-index: 100;
	    border-top: 0;
	    display: block;
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
.info-item span {
    font-size: 14px;
    line-height: 17px;
    margin-left: 5px;
    color: #333;
    vertical-align: middle;
}
.fancy-line {
    border: 0;
    color: #333;
    border-bottom: 1px solid #e0e0e0;
    margin-top: 56px;
    margin-bottom: 30px;
}
.contentz {
    word-wrap: break-word;
    margin-bottom: 40px;
    padding-bottom: 0;
    font-size: 18px;
    color: #333;
    line-height: 31px;
}
.contentz p{
    word-wrap: break-word;
    padding-bottom: 0;
    font-size: 18px;
    color: #333;
    font-family: "Microsoft YaHei";
}
.contentz h3 {
    font-size: 18px;
    color: #333;
    line-height: 1.6;
    margin-top: 10px;
    margin-bottom: 10px;
}
.ititle-serial {
    width: 24px;
    height: 24px;
    background: #f96e57;
    font-size: 14px;
    line-height: 24px;
    text-align: center;
    border-radius: 13px;
    display: inline-block;
    font-weight: 700;
    color: #fff;
    margin-right: 7px;
    margin-top: 3px;
    position: absolute;
}
.ititle {
    font-size: 18px;
    font-weight: 700;
    line-height: 28px;
    display: inline-block;
    padding-top: 1px;
    margin-left: 30px;
}

.item-info {
    height: 43px;
    display: block;
    margin-bottom: 40px;
    clear: both;
    width: 100%;
    position: relative;
}
.item-info .item-info-price {
    display: block;
    color: #f84e4e;
    margin-right: 20px;
    line-height: 1.3;
    font-size: 18px;
    padding-left: 11px;
    float: none;
    height: auto;
    font-weight: 400;
}
.item-info .item-info-link {
    display: table;
    width: 100px;
    text-align: center;
    font-size: 16px;
    border: solid thin #ff897d;
    margin-top: -40px;
    float: right;
    height: 32px;
    line-height: 32px;
    border-radius: 32px;
}
.item-info .item-like-info {
    display: block;
    color: #8e8e93;
    margin-right: 20px;
    line-height: 1.5;
    font-size: 14px;
    padding-left: 11px;
}
.item-info-link {
    float: left!important;
    margin-left: 150px!important;
}
.item-info .item-info-link span {
    display: table-cell;
    vertical-align: middle;
    color: #f7554d;
    font-size: 15px;
}
.share-list {
    position: relative;
    float: right;
    bottom: -7px;
    right: 0;
    padding: 0 0 6px;
    line-height: 34px;
    white-space: nowrap;
}
.share-list span {
    display: inline-block;
    float: left;
    font-size: 16px;
    color: #333;
}
.share-item {
    float: right;
    width: 50px;
    height: 34px;
}
.share-item a {
    display: block;
    width: 34px;
    height: 34px;
    float: right;
    cursor: pointer;
}
.icon-qq {
    background-position: -131px -502px;
}
.icon-qzone {
    background-position: -131px -465px;
}
.icon-weibo {
    background-position: -131px -539px;
}
.icon-weixin {
    background-position: -131px -428px;
}
.post-info {
    position: relative;
    float: left;
    bottom: 0;
    left: 0;
    padding: 15px 15px 15px 0;
}

</style>
<div class="wrapper main-content">
        <div class="content-left">
            <div class="post-content">
                <div class="fw wrapper-cover">
                    <div class="cover">
                        <img src="<?=get_img($worth['pic'])?>" alt="" class="hoverZoomLink"><p></p>
                    </div>
                </div>
                <div class="fw wrapper-main">
                    <div class="post">
                        <div class="td">
                            <h1 class="title"><?=$worth['title']?></h1>
                            <div class="td-post-info">
                                <ul class="post-info il-block">
                                    <li class="info-item"><i class="info-icon icon-like" data-id="<?=$worth['wid']?>" style="cursor: pointer;"></i><span><?=$worth['like_num']?></span></li>
                                    <li class="info-item"><i class="info-icon icon-comment"></i><span><?=$worth['comment_num']?></span></li>
                                    <li class="info-item"><i class="info-icon icon-share"></i><span><?=$worth['share_num']?></span></li>
                                </ul>
                                <div class="date il-block"><?=date('m月d日 ',$worth['addtime']).$xinqi[date('N',$worth['addtime'])];?></div>
                            </div>
                        </div>
                        <hr class="fancy-line">
                        <div class="contentz">
                        	<p><?=$worth['descr']?></p>
                        	<?php foreach($data as $k=>$goods):?>
							<h3 class="item-title"><span class="ititle-serial"><?=$k+1;?></span><span class="ititle"><?=$goods['title']?></span></h3>
							<p><?=$goods['remark']?><img class="goodsimg" src="<?=get_img($goods['pic'])?>" alt=""></p>
							<div class="item-info">
								<p class="item-info-price"><span style="font-family: arial;">￥<?=$goods['promotion_price']?></span></p>
								<p class="item-like-info"><?=$goods['volume']?>人喜欢</p>
								<a class="item-info-link" <?=gogood($goods['num_iid']);?> ><span>查看详情</span></a>
							</div>
							<?php endforeach;?>
                        </div>
                    </div>
                    <div class="post-content-footer">
                        <ul class="post-info">
                            
                            <li class="info-item"><i class="info-icon icon-like" data-id="<?=$worth['wid']?>" style="cursor: pointer;"></i><span><?=$worth['like_num']?></span></li>
                            
                            <li class="info-item"><i class="info-icon icon-comment"></i><span><?=$worth['comment_num']?></span></li>
                            <li class="info-item"><i class="info-icon icon-share"></i><span><?=$worth['share_num']?></span></li>
                        </ul>
                        <ul class="share-list"><span>分享到</span>
                            <li class="share-item"><a class="share-icon icon-qq" href="http://connect.qq.com/widget/shareqq/index.html?url=<?=urlencode(u('worth','detail',array('wid'=>$worth['wid'])))?>&title=<?=$worth['title']?>&pics=<?=$worth['pic']?>" target="_blank"></a></li>
                            <li class="share-item"><a class="share-icon icon-qzone" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?=urlencode(u('worth','detail',array('wid'=>$worth['wid'])))?>&title=<?=$worth['title']?>&<?=$worth['pic']?>" target="_blank"></a></li>
                            <li class="share-item"><a class="share-icon icon-weibo" href="http://service.weibo.com/share/share.php?searchPic=true&appkey=85632651&style=number&type=button&url=<?=urlencode(u('worth','detail',array('wid'=>$worth['wid'])))?>&title=<?=$worth['title']?>&pic=<?=$worth['pic']?>&language=zh_cn" target="_blank"></a></li>
                            <li class="share-item"><a class="share-icon icon-weixin"></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-right">
             <?=A(9996);?>
        </div>
        <div class="back-top-post">
            <div class="bt-qr-code"></div>
            <div class="bt-button"></div>
        </div>
    </div>
    <div class="modals-backdrop" style="position: fixed;z-index: 111111;background: rgba(0,0,0,.5);position: fixed;top: 0;right: 0;bottom: 0;left: 0;display: none;"></div>
    <div class="modal weixin-modal" style="padding: 58px 93px 38px;width: 225px;text-align: center;box-shadow: 0 3px 7px rgba(0,0,0,.3);position: fixed;top: 170px; left: 746px; display: none;z-index: 111111;background-color: #fff;border-radius: 10px;"><div id="code" style="height: 142px;width: 100%;margin-bottom: 38px;"><img src="http://bshare.optimix.asia/barCode?site=weixin&url=<?=urlencode(u('worth','detail',array('wid'=>$worth['wid'])))?>" width="142" height="142"></canvas></div><p style="font-size: 16px;">使用微信扫描上方二维码</p><p style="font-size: 16px;">打开网页后点击右上角分享按钮</p></div>
<script>
	$(function(){
		function initBackTop() {
	        var n = function() {
	            var n = $(window).scrollTop();
	            console.info(n);
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
        $('a.icon-weixin').click(function(){
        	$('.weixin-modal').show();
        	$('.modals-backdrop').show();
        });
        $('.modals-backdrop').click(function(){
        	$('.weixin-modal').hide();
        	$(this).hide();
        });
	});
</script>
<?php include(PATH_TPL."/footer.tpl.php"); ?>
<?php endif;?>