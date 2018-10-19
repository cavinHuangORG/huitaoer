<?php include(PATH_TPL."/public/header.tpl.php");?>
<div class="box-content">
	<div class="table">
		<div id="notice"></div>
		<div id="schedule"><b></b><span></span></div>
	</div>
	<!--//采集-->
	<script type="text/javascript">
		var datainfo=<?=json_encode(array('status'=>1,'channel'=>worthNid(),'addtime'=>$_timestamp));?>;//补全数据
		<?=system::worths_jsgather(); ?>
	</script>
</div>
<div class="box-footer">
    <div class="box-footer-inner">
    	<input type="button" value="开始采集" name="start">
    </div>
</div>
<?php include(PATH_TPL."/public/footer.tpl.php");?>