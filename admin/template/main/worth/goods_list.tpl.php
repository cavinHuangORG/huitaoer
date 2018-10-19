<?php 
//分类
$catlist=getCatList('goods');
//导航频道
$goodnav=navList();
include(PATH_TPL."/public/timepicker.tpl"); ?>
<div class="table">
  	<form method="GET">
  	<div class="th">
             <select name="cat">
          	   <option value="">分类</option>
          	   <?php foreach ($catlist as $key=>$value){ ?>
               <option value="<?=$value['id'];?>" <?php if(request('cat','')==$value['id']){ ?>selected<?php } ?>>
               		<?=str_pad('',$value['level']-1,"-=",STR_PAD_LEFT);?><?=$value['title'];?>
               </option>
               <?php } ?>
              </select>
              <input type="text" class="textinput w70 timepicker" name="startbg" placeholder="开始时间" value="<?=request('startbg','');?>">
              &nbsp;-&nbsp;
              <input type="text" class="textinput w70 timepicker" name="startend" placeholder="开始时间" value="<?=request('startend','');?>">   
              <input type="text" name="keyword" value="<?=request('keyword','');?>" placeholder="ID/标题/卖家昵称">
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
        	<th width="55">宝贝图片</th>
            <th width="200">宝贝名称</th>        
        	<th width="50" class="text-center">现/原价</th>
        	<th width="50">佣金</th>
        	<th width="30" class="text-center">卖家</th>
        	<th width="50" class="text-center">频道</th>
        	<th width="50" class="text-center">分类</th>
        	<th width="25" class="text-center">推荐</th>
        	<th width="25" class="text-center">包邮</th>        	
        	<th width="25" class="text-center">排序</th>        	
        	<th width="100">活动时间</th>
            <th width="100" class="text-center">操作</th>
        </tr>
        <?php foreach ($goodslist as $key=>$value){ ?>
        <tr id="data_<?=$value['id'];?>">
        	<td class="text-center">
        		<input type="checkbox" name="id[]" value="<?=$value['id'];?>" class="checkbox" onclick="checkoption($('.allbox'));">
        	</td>        	
        	<td class="text-center">
        		<img onerror="this.onerror=null;this.src='<?=DEF_GD_LOGO;?>'" src="<?=get_img($value['pic'],'290');?>" style="width:50px;margin:2px auto;">
        	</td>
            <td>
            	<img src="static/images/<?=$value['site'];?>.ico" style="vertical-align: middle;">
            	<a href="http://item.taobao.com/item.htm?id=<?=$value['num_iid'];?>" target="_blank">
            	<?=$value['title'];?>
            	</a>
            	<b style="color:red">[<?=$value['nick'];?>]</b>
            </td>
        	<td class="text-center"><?=$value['promotion_price'];?>/<?=$value['price'];?></td>
        	<td class="text-center">
        	<?php if(!empty($value['commission'])){ ?>
        	<?=$value['commission'];?>/<?=$value['commission_rate']/100;?>%
        	<?php }else{ ?>
        	--
        	<?php } ?>
        	</td>
        	<td class="text-center">
        		<a target="_blank" href="http://amos.alicdn.com/msg.aw?v=2&uid=<?=urlencode($value['nick']);?>&site=cntaobao&s=1&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=urlencode($value['nick']);?>&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息"></a>
        	</td>
        	<td class="text-center"><?=$goodnav[$value['channel']]['name'];?></td>
        	<td class="text-center"><?=$catlist['cid_'.$value['cat']]['title'];?></td>
        	<td class="text-center">
        		<?php if($value['isrec']==1){ ?>
        		<a href="javascript:;" title="点击设置" onclick="setgoodsstatus('<?=$value['id'];?>','isrec')">
        			<img src="static/images/tick.gif" id="isrec_<?=$value['id'];?>" status="<?=$value['isrec'];?>"></a>
        		<?php }else{ ?>
        		<a href="javascript:;" title="点击设置" onclick="setgoodsstatus('<?=$value['id'];?>','isrec')">
        			<img src="static/images/cross.gif" id="isrec_<?=$value['id'];?>" status="<?=$value['isrec'];?>"></a>
        		<?php } ?>	
        	</td>
        	<td class="text-center">
        		<?php if($value['ispost']==1){ ?>
        		<a href="javascript:;" title="点击设置" onclick="setgoodsstatus('<?=$value['id'];?>','ispost')">
        			<img src="static/images/tick.gif" id="ispost_<?=$value['id'];?>" status="<?=$value['ispost'];?>"></a>
        		<?php }else{ ?>
        		<a href="javascript:;" title="点击设置" onclick="setgoodsstatus('<?=$value['id'];?>','ispost')">
        			<img src="static/images/cross.gif" id="ispost_<?=$value['id'];?>" status="<?=$value['ispost'];?>"></a>
        		<?php } ?>
        	</td>
        	<td class="text-center">
        		<input type="text" class="w30 text-center" value="<?=$value['sort'];?>" onblur="changesort($(this),'<?=$value['id'];?>','goods');">
        	</td>
        	<td class="text-center"><?=date('m-d H:i',$value['start']);?><br/><?=date('m-d H:i',$value['end']);?></td>        	
        	<td class="text-center">
        		<?php if($value['status']==1){ ?>
            	[<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=goods_add&id=<?=$value['id'];?>">修改</a>]&nbsp;
            	[<a href="?mod=<?=MODNAME;?>&ac=<?=ACTNAME;?>&op=goods_del&id=<?=$value['id'];?>">移除</a>]&nbsp;
            	<?php } ?>
           
            </td>
        </tr>
        <?php } ?>
        </tbody></table>
    </div>
    <div class="box-footer">
    	<?php include(PATH_TPL."/public/pages.tpl");?>        
	    <div class="box-footer-inner">
	    	<input type="hidden" name="op" value="goods">
	    	<input type="hidden" name="gomod" value="<?=MODNAME;?>">
    		<input type="hidden" name="goac" value="<?=ACTNAME;?>">
    		<input type="hidden" name="goop" value="<?=$op;?>">
	        <input type="submit" value="删除">
	    </div>
	</div>
</form>