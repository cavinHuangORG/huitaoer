<?php webtitle();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-dns-prefetch-control" content="on"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta content="telephone=no" name="format-detection"/>
	<meta name="full-screen" content="yes"/>
	<meta name="x5-fullscreen" content="true"/>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>

	<title><?=$_webset['site_title'];?></title>
	<meta name="keywords" content="<?=$_webset['site_metakeyword'];?>" />
	<meta name="description" content="<?=$_webset['site_metadescrip'];?>" />

	<link href="/extend/wap/template/lequtui/static/css/wap.css?t1" rel="stylesheet"/>
	<link href="/extend/wap/template/lequtui/static/css/mui.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/extend/wap/template/lequtui/static/css/jquery.mobile-1.4.5.css">
	<script src="/static/js/jquery-1.10.2.min.js"></script>
	<script src="/static/layer/layer.js"></script>
	<!-- Swiper -->
	<link href="//cdn.bootcss.com/Swiper/3.3.1/css/swiper.min.css" rel="stylesheet">
	<script src="//cdn.bootcss.com/jquery-mobile/1.4.5/jquery.mobile.min.js"></script>
	<script src="//cdn.bootcss.com/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
</head>
<body>
<div id="load-more">
	<div class="main-title clearfix">
		<?php if(ACTNAME=='detail'){ ?>
			<span class="mui-action-menu mui-pull-left returns" rel="external" onclick="location.href='<?=$gourl?>'">&#xe600;</span>
		<?php }else{ ?>
			<a class="mui-action-menu mui-pull-left main-icon" href="javascript:void(0)"></a>
		<?php } ?>				
		<h1 class="mui-title main-title-text"><?=$_webset['site_name'];?></h1>
		<a href="/" rel="external" class="main-home cnzzCounter"></a>
	</div>