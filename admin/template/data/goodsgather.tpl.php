<?php include(PATH_TPL."/public/header.tpl.php");?>
<?php $active[$op]='class="active"'; ?>
<ul class="nav">
	<li <?=$active['list'];?>><a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=list">采集规则</a></li>
	<li <?=$active['addgather'];?>><a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=addgather">添加规则</a></li>
</ul>
<p class="line"></p>
<?php if(request('op','list')=='list'){ ?>
<div class="box-content">
	<div class="top_box">采集规则说明： 以下采集产品均为本公司客服从各大导购平台,淘宝,淘宝优站等平台进行 佣金评估,产品性价比评估等精心筛选而来！</div>
	<div class="table">
		<table class="admin-tb">
		<tbody>
		<tr>
			<th width="200">规则名</th>
			<th width="100">采集地址</th>
			<th width="100">数据格式</th>
			<th width="161">操作</th>
		</tr>
		<?php foreach ($gatherlist as $key=>$value){ ?>
		<tr>
			<td class="text-left"><?=$value['title'];?></td>
			<td class="text-center"><?=$value['url'];?></td>
			<td class="text-center"><?=$value['datatype'];?></td>
			<td class="text-center">
				[<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=do&id=<?=$value['id'];?>">采集</a>]&nbsp;&nbsp;
				[<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=addgather&id=<?=$value['id'];?>">修改</a>]
			</td>
		</tr>
		<?php } ?>                               
		</tbody></table>
	</div>
</div>
<?php }elseif(request('op')=='addgather'){ ?>
<form method="post" action="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=addgather">
<div class="box-content">
	<table class="table-font">
		<tbody>
			<tr>
				<th class="w120">规则名称：</th>
				<td><input type="text" class="textinput w270" name="gather[title]" value="<?=$gather['title'];?>"></td>
			</tr>
			<tr>
				<th class="w120">采集地址：</th>
				<td><input type="text" class="textinput w270" name="gather[url]" value="<?=$gather['url'];?>"></td>
			</tr>
			<tr>
				<th class="w120">每次采集条数：</th>
				<td><input type="text" class="textinput w60" name="gather[pagesize]" value="<?=$gather['pagesize'];?>"></td>
			</tr>
			
			<tr>
				<th class="w120">数据格式：</th>
				<td>
					<select name="good[datatype]">
						<option value="json">json</option>
					</select>
				</td>
			</tr>
			<tr>
				<th class="w120">商品页码配置：</th>
				<td><input type="text" class="textinput w80" name="gather[page]" value="<?=$gather['page'];?>"></td>
			</tr>
			<tr>
				<th class="w120">商品总数：</th>
				<td><input type="text" class="textinput w80" name="gather[goodscount]" value="<?=$gather['goodscount'];?>"></td>
			</tr>
			<tr>
				<th class="w120">商品集合名称：</th>
				<td><input type="text" class="textinput w80" name="gather[goodsdata]" value="<?=$gather['goodsdata'];?>"></td>
			</tr>
			<tr>
				<th class="w120" style="vertical-align: top;">商品列数据配置：</th>
				<td>
				<ul style="width: 300px;height: 200px;border: 1px #D8D8D8 solid;padding: 10px 20px;overflow-y: auto;float:left;">
					<?php foreach ($goodscolumn as $key=>$value){ ?>
						<li class="mt10">
							<span class="w60" style="display: inline-block;"><?=$value?></span>：
							<input type="text" class="textinput w80 ml5" name="gather[rule][<?=$key?>]" value="<?=$gather['rule'][$key];?>">
						</li>
					<?php } ?>
				</ul>
				</td>
			</tr>
			<tr>
				<th class="w120" style="vertical-align: top;">商品分类数据配置：</th>
				<td>
				<ul style="width: 300px;height: 200px;border: 1px #D8D8D8 solid;padding: 10px 20px;overflow-y: auto;float:left;">
					<?php foreach ($catlist as $key=>$value){ ?>
						<li class="mt10">
							<span class="w60" style="display: inline-block;"><?=$value['title']?></span>：
							<input type="text" class="textinput w80 ml5" name="gather[cat][<?=$value['id']?>]" value="<?=$gather['cat'][$value['id']];?>">
						</li>
					<?php } ?>
				</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="box-footer">
	<div class="box-footer-inner">
		<input type="hidden" name="gather[id]" value="<?=$gather['id'];?>">
		<input type="submit" value="添加">
	</div>
</div>
</form>
<?php }elseif(request('op')=='do'){ ?>
<script>
	var parameterstr='<?=$gather["url"];?>';
	var gatherid='<?=$gather["id"];?>';
</script>
<div class="box-content">
	<div class="table">
		<div id="notice"></div>
		<div id="schedule"><b></b><span></span></div>
	</div>
</div>
<div class="box-footer">
	<div class="box-footer-inner">
		<input type="button" value="开始采集" name="start">
	</div>
</div>
<script src="static/js/gather.js" type="text/javascript"></script>
<?php } ?>
<?php include(PATH_TPL."/public/footer.tpl.php");?>