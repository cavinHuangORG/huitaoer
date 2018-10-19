<?php include(PATH_TPL."/public/header.tpl.php");?>
<?php include(PATH_PLUGIN.'/admin/template/menu.tpl');?>
<div class="box-content">
<?php if($op=='list'){ ?>
<form method="POST" action="<?=$_plugin_url;?>&pmod=adset&op=del" onsubmit="return confirmdel();">
	<div class="table">
	    <table class="admin-tb">
	    <tbody>
	    <tr>
	    	<th width="60" class="text-center">
	    		<input type="checkbox" name="all" class="allbox" onclick="checkAll($(this),$('.checkbox'));" >
	    	</th>
	        <th width="100">名字</th>
	        <th width="100">图片</th>
	        <th width="200">说明</th>
	        <th width="100">操作</th>
	    </tr>
	    <?php if(empty($qzone_slides)){ ?>
	    <tr><td colspan="5"  class="text-center">暂无数据,<a href="<?=$_plugin_url;?>&pmod=adset&op=add">立即添加广告</a></td></tr>
	    <?php } ?>
	    <?php foreach ($qzone_slides as $key=>$value){ ?>
		<tr>
	        <td class="text-center">
	        	<input type="checkbox" name="id[]" value="<?=$value['id'];?>" class="checkbox" onclick="checkoption($('.allbox'));">
	        </td>
	        <td class="text-center"><?=$value['title'];?></td>
	        <td class="text-center"><?=$value['pic'];?></td>
	        <td class="text-center"><?=$value['remark'];?></td>
	        <td class="text-center">
	        	[<a href="<?=$_plugin_url;?>&pmod=adset&op=add&id=<?=$value['id'];?>">修改</a>]&nbsp;&nbsp;
	        </td>
	    </tr>
	    <?php } ?>                               
	    </tbody></table>
	</div>
	<div class="box-footer">
	    <div class="box-footer-inner">
	   		<input type="hidden" name="gomod" value="<?=MODNAME;?>">
	    	<input type="hidden" name="goac" value="<?=ACTNAME;?>">
	    	<input type="hidden" name="goop" value="<?=$op;?>">
			<input type="hidden" name="op" value="advertise">
	        <input type="submit" value="删除">
	        <input type="button" value="添加广告" onclick="location.href='<?=$_plugin_url;?>&pmod=adset&op=add'">
	    </div>
	</div>
</form>
<?php }elseif($op=='add'){ ?>
<form method="post" action="<?=$_plugin_url;?>&pmod=adset&op=add">
    <table class="table-font"><tbody>
        <tr>
            <th class="w120">广告标题：</th>
            <td><input type="text" class="textinput w270" name="slides[title]" value="<?=$slides['title'];?>"></td>
        </tr>
        <tr>
            <th class="w120">链接：</th>
            <td><input type="text" class="textinput w270" name="slides[url]" value="<?=$slides['url'];?>"></td>
        </tr>
        <tr>
            <th class="w120">图片：</th>
            <td>
            	<input type="text" class="textinput w270" name="slides[pic]" id="adpic" value="<?=$slides['pic'];?>">
            	<input id="fileupload" type="file" name="adpic" action="../?mod=ajax&ac=operat&op=ajaxfile"> 
				<script type="text/javascript">
				ajaxFileUpload("fileupload",'setadpic');
				</script>
            </td>
        </tr>
        <tr>
            <th class="w120" style="vertical-align: top;">备注：</th>
            <td>
            	<textarea name="slides[remark]" cols="40" rows="5" style="width:270px; height:60px;"><?=$slides['remark'];?></textarea>
            </td>
        </tr>
    </tbody></table>
	<div class="box-footer">
	    <div class="box-footer-inner">
	    	<input type="hidden" name="slides[id]" value="<?=$slides['id'];?>">
	    	<input type="hidden" name="formhash" value="<?=formhash();?>">
	    	<input type="submit" name="slidesAdd" value="添加">
	    </div>
	</div>
</form>
<?php } ?>
</div>
<?php include(PATH_TPL."/public/footer.tpl.php");?>