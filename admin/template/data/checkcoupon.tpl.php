<?php include(PATH_TPL."/public/header.tpl.php");?>
<p class="line"></p>
<div class="box-content">
	<div class="table">
		<div id="notice"></div>
		<div id="schedule"><b></b><span></span></div>
	</div>
</div>
<div class="box-footer">
    <div class="box-footer-inner">
    	<input type="button" value="开始检测" id="start">
    </div>
</div>
<!--//检测-->
<script type="text/javascript">
	var gather_num = <?php echo $jc_num; ?>;
	var xb = 0;
	$('#start').click(function(){
		$("#schedule").show().find("span").html(xb+'/'+gather_num);
		good(xb);
	});
	function good(key){
		var url = <?php echo $urljson; ?>;
		if (url == null) {
			document.getElementById('notice').innerHTML += '没有数据!<br />';
			return false;
		}
		$.ajax({
			url: "/?mod=ajax&ac=check&op=coupon",
			data:{id:url[key].id,'url':url[key].url},
			type: 'POST',
			dataType: 'json',
			success: function (json) {
	        	xb++;
				document.getElementById('notice').innerHTML += json.msg+'<br />';
				document.getElementById('notice').scrollTop = 100000000;
				if(xb<=gather_num){
					$("#schedule b").width((xb/gather_num*100)+'%');
					$("#schedule span").html(xb+'/'+gather_num);
				}
				if (url[xb]!='' && url[xb]!=undefined && url[xb]!=null) {
					good(xb);
				}else{
					document.getElementById('notice').innerHTML += '检测完成!<br />';
					document.getElementById('notice').scrollTop = 100000000;
				}
	        }
		});
	}
</script>
<?php include(PATH_TPL."/public/footer.tpl.php");?>