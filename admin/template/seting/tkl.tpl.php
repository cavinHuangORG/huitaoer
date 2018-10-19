<?php include(PATH_TPL."/public/header.tpl.php");?>
<!--//START-->
<form method="post" action="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>">
	<!--//网站设置->基本设置-->
	<div class="box-content">
	<table class="table-font"><tbody>
		<tr>
            <th class="w120">是否开启淘口令：</th>
            <td>
	         	<input type="radio" name="base[tb_ison]" value="1" id="tb_ison_1">
	         		<label for="tb_ison_1" class="mr10">开启</label>
	         	<input type="radio" name="base[tb_ison]" value="0" id="tb_ison_0">
	         		<label for="tb_ison_0" class="mr10">关闭</label>
	         	<script type="text/javascript">
	         	$("#tb_ison_"+<?=intval($_webset['tb_ison']);?>).attr("checked","checked");
	         	</script>
	        </td>
        </tr>
        <tr>
            <th>淘口令AppKey：</th>
            <td>
                <input type="text" class="textinput w360" name="base[tb_appkey]" value="<?=$_webset['tb_appkey'];?>">
            </td>
        </tr>
        <tr>
            <th>淘口令AppSecret：</th>
            <td>
            	<input type="text" class="textinput w360" name="base[tb_appsecret]" value="<?=$_webset['tb_appsecret'];?>">
            </td>
        </tr>             
	</tbody></table>
	<div class="box-footer">
        <div class="box-footer-inner">
        	<input type="hidden" name="formhash" value="<?=formhash();?>">
        	<input type="submit" name="baseset" value="保存更改">
        </div>
    </div>
	</div>
</form>
<!--//END-->
<?php include(PATH_TPL."/public/footer.tpl.php");?>