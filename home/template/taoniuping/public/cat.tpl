<!--//分类-->
<?php 
if(empty($catlist)){
	$catlist=getgoodscat();
}
$active['cat_'.$cat]="on";
?>
<div id="subnav"><div class="area w1200">
	<a href="<?=u(MODNAME,ACTNAME);?>" class="<?=$active['cat_0'];?>">全部</a>
	<?php foreach ($catlist as $key=>$value){ ?>
    <a href="<?=u(MODNAME,ACTNAME,array('cat'=>$value['id']));?>" title="<?=$value['title'];?>" class="<?=$active['cat_'.$value['id']];?>"><?=$value['title'];?></a>
    <?php } ?>
</div></div>