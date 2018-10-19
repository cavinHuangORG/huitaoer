<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
	<title></title>
	<link href="<?=WAP_TPL_PATH;?>/static/css/amazeui.css" rel="stylesheet"/>
	<script src="static/js/jquery-2.1.1.min.js"></script>
	<script src="<?=WAP_TPL_PATH;?>/static/js/amazeui.min.js"></script>
	<script src="<?=WAP_TPL_PATH;?>/static/js/fastclick.js"></script>
	<script type="text/javascript">
		var weixinobj = {
			is_weixin:function(){
				var ua = navigator.userAgent.toLowerCase();
				if (ua.match(/MicroMessenger/i) == "micromessenger" || ua.match(/qq\//i) == "qq/") {
					return true;
				} else {
					return false;
				}
			},
			is_ios:function () {
				var ua = navigator.userAgent.toLowerCase();
				if (ua.match(/iphone/i) == "iphone" || ua.match(/ipad/i) == "ipad") {
					return true;
				} else {
					return false;
				}
			},
			wxexe:function(){
				var e=this;
				if(e.is_ios()){
					$("#taowords_box_android").hide();
				}else{
					$("#taowords_box_ios").hide();
				}
			},
			init:function(){
				document.addEventListener("selectionchange", function(e) {
					if(window.getSelection().anchorNode.parentNode.id == 'copy_key_ios' && document.getElementById('copy_key_ios').innerText != window.getSelection()){ 
						var key = document.getElementById('copy_key_ios');
						window.getSelection().selectAllChildren(key);
					}
				},false);
				var e = this;
				if (e.is_weixin()) e.wxexe(); 
			}
		};
		$(function(){
			weixinobj.init();
		});
	</script>
</head>
<body>
	<div class="wrap">
		<div class="detail_new cf">
			<div class="trial_detail cf">
				<div class="tao-code-header yhj">
					<div class="text-left text ng-scope">
						<h3 class="ng-scope" style="text-align: center;"><span class="ng-binding" style="display:inline-block;"><?=$good['title']?></span></h3>
					</div>
				</div>
			</div>
			<div class="app_detail cf">
				<div class="appicon">
					<span id="deling">
						领券后可以享受<i class="am-text-warning"><?=$good['promotion_price']-$good['coupon_money']?>元</i>超值优惠
					</span>
					<img src="<?=get_img($good['pic'],'310');?>" id="image" alt="<?=$good['title']?>" style="border:1px dotted #d99900;margin-top: 5px;" />
				</div>
				<div id="taowords_box_ios" class="copykeyword cf">
					<div class="copykeyword cf">
						<div class="copy" id="parent">
							<span id="copy_key_ios"><?=$copy_key?></span>
						</div>
					</div>
					<p class="msg">
						<span id="deling"><i class="am-text-danger">长按虚线框</i> 全选<i class="am-text-danger">拷贝</i>淘口令</span>
					</p>
				</div>
				<div id="taowords_box_android">
					<div style="padding: 0px 20%;">
						<input readonly class="am-form-field am-input-lg" id="copy_key_android" type="text" autofocus="autofocus" value="<?=$copy_key?>"></div>
					<p class="msg">
						<span id="deling"><i class="am-text-danger">长按虚线框</i> 全选<i class="am-text-danger">拷贝</i>淘口令</span>
					</p>
				</div>
				<p class="msg2">
					<span id="deling">
						复制完成后，打开<i class="am-text-warning">手机淘宝</i><br>即可<br><i class="am-text-warning">领券并购买</i>
					</span>
				</p>
			</div>
			<div class="abort">
				<a href="/wap">返回<?=$_webset['site_name']?></a>
			</div>
		</div>
	</div>
</body>
</html>