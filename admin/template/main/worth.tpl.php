<?php include(PATH_TPL."/public/header.tpl.php");?>
<?php $active[$op]='class="active"'; ?>
<?php if($op=='worth_list' || $op=='goods_list' || $op=='worth_add'|| $op=='goods_add'){ ?>
<ul class="nav">
	<li <?=$active['wlist'];?>><a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=worth_list">主题列表</a></li>
	<li <?=$active['glist'];?>><a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=goods_list">商品列表</a></li>
	<li <?=$active['wadd'];?>><a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=worth_add">添加主题</a></li>
</ul>
<?php } ?>

<div class="box-content">
	<?php if($op=='worth_list'){ 
		include(PATH_TPL.'/'.MODNAME.'/worth/worth_list.tpl.php');
	 }elseif($op=='worth_add'){ 
		 include(PATH_TPL.'/'.MODNAME.'/worth/worth_add.tpl.php');
	}elseif($op=='goods_list'){ 
		 include(PATH_TPL.'/'.MODNAME.'/worth/goods_list.tpl.php');
	 }elseif($op=='goods_add'){ 
		 include(PATH_TPL.'/'.MODNAME.'/worth/goods_add.tpl.php');
	 } ?>
</div>
<?php include(PATH_TPL."/public/footer.tpl.php");?>