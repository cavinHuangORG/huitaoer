<?php include(PATH_TPL."/public/header.tpl.php"); ?>
<form method="POST" action="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>" >
<div class="box-content">
	<div class="top_box">
	采集说明：自动采集为触发式采集,网站有访问才触发采集,每触发一次,等待《间隔时间》分钟后会再次触发采集;
	<br />
	时间设置：时间格式为24小时制,只填写小时部分,如:开始时间13点,就填13;结束时间为20点,就填写20;</div>
	<div class="">
		间隔时间：<input type="text" name="autotime[interval]" value="<?=$autotime[0];?>">（分钟制）<br /><br />
		开始时间：<input type="text" name="autotime[staer]" value="<?=$autotime[1];?>">（小时制）<br /><br />
	    结束时间：<input type="text" name="autotime[end]" value="<?=$autotime[2];?>">（小时制）
	</div>
	<br />
	<div class="box-footer">
	    <div class="box-footer-inner">
	    	<input type="hidden" name="sets" value="sets">
	        <input type="submit" name="baseset" value="设置">
	    </div>
	</div>
</div>
</form>
<?php include(PATH_TPL."/public/footer.tpl.php");?>