<?php include(PATH_TPL."/public/header.tpl.php");?>
<!--//START-->
<form method="post" action="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>">
	<!--//网站设置->基本设置-->
	<div class="box-content">
	<table class="table-font"><tbody>
        <tr>
            <th>商品生成AppKey：</th>
            <td><input type="text" class="textinput w60" name="goods[base_appkey]" value="<?=$_webset['base_appkey'];?>"></td>
        </tr>
		<tr>
            <th class="w120">产品加载背景图：</th>
            <td>
            	<input type="text" class="textinput w270" name="goods[site_goodlogo]" value="<?=$_webset['site_goodlogo'];?>">
            	<input id="fileupload" type="file" name="goodspic" action="../?mod=ajax&ac=operat&op=ajaxfile">
            	<script type="text/javascript">
				ajaxFileUpload("fileupload",'site_goodlogo');
				</script>
				<p>
				<span class="tip" style="margin-left:0px">默认模板尺寸290*190, <a href="http://bbs.52jscn.com" class="red" target="_blank">付费制作</a></span>
				</p>
            </td>
        </tr>
        <tr>
            <th>商品每页数量：</th>
            <td><input type="text" class="textinput w60" name="goods[base_goodspagenum]" value="<?=$_webset['base_goodspagenum'];?>">&nbsp;个</td>
        </tr>
        <tr>
            <th>商品展示时间：</th>
            <td><input type="text" class="textinput w60" name="goods[base_showday]" value="<?=$_webset['base_showday'];?>">&nbsp;天</td>
        </tr>
        <tr>
            <th>列表明日预告：</th>
            <td>
            	<input type="radio" name="goods[base_tomorrow]" value="1" id="base_tomorrow_1">
            		<label for="base_tomorrow_1" class="mr10">显示</label>
            	<input type="radio" name="goods[base_tomorrow]" value="0" id="base_tomorrow_0">
            		<label for="base_tomorrow_0" class="mr10">不显示</label>
            	<script type="text/javascript">
	         	$("#base_tomorrow_"+<?=intval($_webset['base_tomorrow']);?>).attr("checked","checked");
	         	</script>
            </td>
        </tr>
        <tr>
            <th>明日预告跳转：</th>
            <td>
            	<input type="radio" name="goods[base_tomorrow_jump]" value="1" id="base_tomorrow_jump_1">
            		<label for="base_tomorrow_jump_1" class="mr10">开启</label>
            	<input type="radio" name="goods[base_tomorrow_jump]" value="0" id="base_tomorrow_jump_0">
            		<label for="base_tomorrow_jump_0" class="mr10">关闭</label>
            	<script type="text/javascript">
	         	$("#base_tomorrow_jump_"+<?=intval($_webset['base_tomorrow_jump']);?>).attr("checked","checked");
	         	</script>
            </td>
        </tr>
        <tr>
            <th>是否显示过期产品：</th>
            <td>
            	<input type="radio" name="goods[base_showover]" value="1" id="base_showover_1">
            		<label for="base_showover_1" class="mr10">是</label>
            	<input type="radio" name="goods[base_showover]" value="0" id="base_showover_0">
            		<label for="base_showover_0" class="mr10">否</label>
            	<script type="text/javascript">
	         	$("#base_showover_"+<?=intval($_webset['base_showover']);?>).attr("checked","checked");
	         	</script>
            </td>
        </tr>
        <tr>
            <th>是否显示过期兑换：</th>
            <td>
                <input type="radio" name="goods[base_cash]" value="1" id="base_cash_1">
                    <label for="base_cash_1" class="mr10">是</label>
                <input type="radio" name="goods[base_cash]" value="0" id="base_cash_0">
                    <label for="base_cash_0" class="mr10">否</label>
                <script type="text/javascript">
                $("#base_cash_"+<?=intval($_webset['base_cash']);?>).attr("checked","checked");
                </script>
            </td>
        </tr>
        <tr>
            <th>删除过期产品：</th>
            <td>
            	<input type="radio" name="goods[base_autoDel]" value="1" id="base_autoDel_1">
            		<label for="base_autoDel_1" class="mr10">是</label>
            	<input type="radio" name="goods[base_autoDel]" value="0" id="base_autoDel_0">
            		<label for="base_autoDel_0" class="mr10">否</label>
            	<script type="text/javascript">
	         	$("#base_autoDel_"+<?=intval($_webset['base_autoDel']);?>).attr("checked","checked");
	         	</script>
            </td>
        </tr>        
        <tr>
            <th>商品评价：</th>
            <td>
            	<input type="radio" name="goods[base_isComment]" value="1" id="base_isComment_1">
            		<label for="base_isComment_1" class="mr10">开启</label>
            	<input type="radio" name="goods[base_isComment]" value="0" id="base_isComment_0">
            		<label for="base_isComment_0" class="mr10">关闭</label>
            	<script type="text/javascript">
	         	$("#base_isComment_"+<?=intval($_webset['base_isComment']);?>).attr("checked","checked");
	         	</script>
        	</td>
        </tr>
        <tr>
            <th>评论每页数量：</th>
            <td><input type="text" class="textinput w60" name="goods[base_commentpagenum]" value="<?=$_webset['base_commentpagenum'];?>">&nbsp;条</td>
        </tr>         
	</tbody></table>
	<div class="box-footer">
        <div class="box-footer-inner">
        	<input type="hidden" name="formhash" value="<?=formhash();?>">
        	<input type="submit" name="goodsset" value="保存更改">
        </div>
    </div>
	</div>
</form>
<!--//END-->
<?php include(PATH_TPL."/public/footer.tpl.php");?>