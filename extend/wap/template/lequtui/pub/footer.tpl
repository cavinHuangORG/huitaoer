<nav id="new-left-menu">
	<div class="mask" id="menu-mask">
		<div class="menu-content">
			<div class="find-wrapper clearfix">
				<form data-ajax="false" method="get" style="position: relative">
					<input type="hidden" name="mod" value="wap">
					<input type="hidden" name="ac" value="index">
					<div class="l-border"></div>
					<div class="border-btm clearfix">
						<div class="input-wrapper">
							<input autocomplete="off" type="text" name="keyword" placeholder="搜索商品"></div>
						<div class="search-btn-wrapper">
							<button type="submit" class="cnzzCounter"></button>
						</div>
					</div>
					<div class="r-border"></div>
				</form>
			</div>
			<ul class="main-cat">
				<li class="cat-item mm-nolistview">
					<a rel="external" href="<?=u(MODNAME,'index');?>" class="cnzzCounter">
						<span class="icon index"></span>
						首页<span class="arrow"></span>
					</a>
				</li>
				<?php foreach ($catlist as $key=>$value){ ?>
					<li class="cat-item">
						<a rel="external" href="<?=u(MODNAME,'list',array('cat'=>$value['id']));?>" class="cnzzCounter">
							<span class="icon cid<?=$value['id']?>"></span><?=$value['title']?><span class="arrow"></span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<div class="toTop">&#xe601;</div>
<script type="text/javascript" src="/static/js/jquery.lazyload.js"></script>
<script type="text/javascript">
//图片异步加载
$("img.lazy").lazyload({threshold:200,failure_limit:30});
</script>
<script type="text/javascript" charset="utf-8">
	var bindEvent=function()
	{
		$(".goods-list").on("click",".QtkSelfClick",function(){
			var url=$(this).attr("data-qtk-url");
			var ua = navigator.userAgent.toLowerCase();
			window.location.href = url;
		});
	}
	$(document).one("pagecreate", function(){
		bindEvent();
	});
	$(document).ready(function () {
		var menu = $("#new-left-menu");
		var menuHeight = $("#menu-mask").height();
		var windowHeight = $(window).height();
		$(menu).find(".mask").css("height", (menuHeight > windowHeight ? menuHeight : windowHeight) + "px");
		$(menu).find(".menu-content").css("height", (menuHeight > windowHeight ? menuHeight : windowHeight) + "px");

		$(window).resize(function () {
			$(menu).find(".mask").css("height", (menuHeight > windowHeight ? menuHeight : windowHeight) + "px");
			$(menu).find(".menu-content").css("height", (menuHeight > windowHeight ? menuHeight : windowHeight) + "px");
		});

		$(".main-icon").click(function () {
			$(menu).css("z-index", 100);
			$(menu).addClass("opened-menu");
			$(menu).animate({left: 0}, 0.4);
		});
		$(document).on("click", ".opened-menu .mask", function (e) {
			if (!$(e.target).is(".opened-menu .mask")) {
				return true;
			}
			$(menu).removeClass("opened-menu");
			$(menu).css("left", -1 * $(window).width());
		});

		$(".toTop").click(function(){
			$("body,html").animate({scrollTop:0},1000);
		});		
		$(window).scroll(function () {
			if ($(window).scrollTop() > 500) {
				$(".toTop").fadeIn(1500);
			}
			else {
				$(".toTop").fadeOut(1500);
			}
		});
	});
</script>
</body>
</html>