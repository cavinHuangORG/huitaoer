<?php 
//分类
$catlist=getCatList('worth');
//导航频道
$goodnav=navList();
include(PATH_TPL."/public/timepicker.tpl"); 
?>
<div class="table">
  	<form method="GET">
  	<div class="th">
             
              <input type="text" class="textinput w70 timepicker" name="startbg" placeholder="开始时间" value="<?=request('startbg','');?>">
              &nbsp;-&nbsp;
              <input type="text" class="textinput w70 timepicker" name="startend" placeholder="开始时间" value="<?=request('startend','');?>">  
              <input type="text" name="keyword" value="<?=request('keyword','');?>" placeholder="标题/简介">
              <input type="hidden" name="mod" value="<?=MODNAME;?>">
              <input type="hidden" name="ac" value="<?=ACTNAME;?>">
               <input type="hidden" name="op" value="<?=$op;?>">
              <input type="submit" value="搜索">
    </div>
    </form>
</div>

<form method="POST" action="?mod=public&ac=del" onsubmit="return confirmdel();">
    <div class="table">
        <table class="admin-tb">
          <tbody>
            <tr>
            	<th width="10" class="text-center">
            		<input type="checkbox" class="allbox" onclick="checkAll($(this),$('.checkbox'));">
            	</th>
            	<th width="220" class="text-center" >主题图片</th>
              <th width="420" class="text-center" >主题名称</th>        
            	<th class="text-center">添加时间</th>
            	<th class="text-center">分享次数</th>
            	<th class="text-center">收藏次数</th>
            	<th class="text-center">排序</th>
              <th class="text-center">操作</th>
            </tr>
            <?php foreach ($worthlist as $key=>$value){ ?>
            <tr id="data_<?=$value['wid'];?>">
            	<td class="text-center">
            		<input type="checkbox" name="id[]" value="<?=$value['wid'];?>" class="checkbox" onclick="checkoption($('.allbox'));">
            	</td>        	
            	<td class="text-center">
            		<img onerror="this.onerror=null;this.src='<?=DEF_GD_LOGO;?>'" src="<?=get_img($value['pic'],'290');?>" style="width:200px;margin:2px auto;">
            	</td> 
              <td class="text-center"><?=$value['title']?></td>
              <td class="text-center"><?=date('m-d H:i',$value['addtime']);?><br/></td>      
              <td class="text-center"><?=$value['share_num']?></td>
            	<td class="text-center"><?=$value['like_num'];?></td>
              <td class="text-center">
                <input type="text" class="w30 text-center" type="" value="<?=$value['sort'];?>" onblur="changesort($(this),'<?=$value['wid'];?>','worth');">
              </td>     	
              <td class="text-center">
                [<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=worth_add&wid=<?=$value['wid'];?>">修改</a>]&nbsp;
                	
                [<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=worth_del&wid=<?=$value['wid'];?>">删除</a>]&nbsp;
                
             		[<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=goods_list&wid=<?=$value['wid'];?>">列表</a>]&nbsp;
                
                [<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=goods_add&wid=<?=$value['wid'];?>">添加商品</a>]&nbsp;
                  <?php } ?>               
                </td>
            </tr>    
          </tbody>
        </table>
    </div>
    <div class="box-footer">
    	<?php include(PATH_TPL."/public/pages.tpl");?>        
	    <div class="box-footer-inner">
	    	<input type="hidden" name="op" value="worth">
	    	<input type="hidden" name="gomod" value="<?=MODNAME;?>">
    		<input type="hidden" name="goac" value="<?=ACTNAME;?>">
    		<input type="hidden" name="goop" value="<?=$op;?>">
	        <input type="submit" value="删除">
	    </div>
	</div>
</form>