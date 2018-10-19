    <script type="text/javascript">
<?=system::getgoods_js(); ?>
var check_img_url='';
<?=system::get_goodsimg_js();?>
</script>
<?php 
//分类
$catlist=getgoodscat();
//导航频道
$goodnav=navList();
include(PATH_TPL."/public/timepicker.tpl");
$worth['start']=empty($worth['start'])? 0:date("Y-m-d H:i:s", $worth['start']); 
$worth['like_num']=empty($worth['like_num'])? rand(1,1000):$worth['like_num']; 
$worth['share_num']=empty($worth['share_num'])? rand(1,1000):$worth['share_num']; 
$worth['comment_num']=empty($worth['comment_num'])? rand(1,1000):$worth['comment_num']; 
$worth['sort']=empty($worth['sort'])? 0:$worth['sort']; 
?>
<form method="post" action="?mod=main&ac=worth&op=worth_add">
    <table class="table-font"><tbody>
         <tr>
            <th class="w120"></th>
            <td><input hidden="hidden" type="text" class="textinput w70" name="worth[wid]" value="<?=$worth['wid'];?>"></td>
        </tr>
        <tr>
            <th class="w120">标题：</th>
            <td><input type="text" class="textinput w70" name="worth[title]" value="<?=$worth['title'];?>"></td>
        </tr>
        <tr>
            <th class="w120">描述：</th>
            <td><input type="text" class="textinput w270" name="worth[descr]" value="<?=$worth['descr'];?>"></td>
        </tr>
         <tr>
            <th class="w120">图片：</th>
            <td>
                
                <input type="text" class="textinput w270" name="worth[pic]" value="<?=$worth['pic'];?>">
                <input id="fileupload" type="file" name="worthpic" action="../?mod=ajax&ac=operat&op=ajaxfile"> 
                <script type="text/javascript">
                    ajaxFileUpload("fileupload",'setworthpic');
                </script>
                
            </td>
        </tr>        
        <tr>
            <th class="w120">开始时间：</th>
            <td> <input type="text" class="textinput w70 timepicker" name="worth[start]" placeholder="开始时间" value="<?=$worth['start'];?>"></td>
        </tr>
        <tr>
            <th class="w120">喜欢数量：</th>
            <td><input type="text" class="text" name="worth[like_num]" value="<?=$worth['like_num'];?>"></td>
        </tr>  
        <tr>
            <th class="w120">分享数量：</th>
            <td><input type="text" class="text" name="worth[share_num]" value="<?=$worth['share_num'];?>"></td>
        </tr>
        <tr>
            <th class="w120">评论数量：</th>
            <td><input type="text" class="text" name="worth[comment_num]" value="<?=$worth['comment_num'];?>"></td>
        </tr>        
        <tr>
            <th>排序：</th>
            <td><input type="text" class="textinput" name="worth[sort]" value="<?=$worth['sort'];?>"></td>
        </tr>
       </tr>
         <tr hidden="hidden">
            <th>添加时间</th>
            <td><input type="text" class="textinput" name="worth[addtime]" value="<?=$worth['addtime'];?>"></td>
        </tr>
    </tbody></table>
     <div class="img">
        <img src="<?php if(!empty($worth['pic'])){ ?><?=get_img($worth['pic'],290);?><?php }else{ ?><?=DEF_GD_LOGO;?><?php } ?>" style="max-width:290px;">
     </div>
	<div class="box-footer">
	    <div class="box-footer-inner">
	    	<input type="submit" value="添加">
	    </div>
	</div>
</form>