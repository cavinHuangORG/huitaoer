<?php
$num=PAGE;
//专题
if(is_dir(PATH_ROOT.'extend/album/')){
	//调用方法
	include PATH_ROOT.'extend/album/lib/common.fun.php';
	$index_album=get_index_album();
	if(intval($index_album['num'])>0){
		$num-=1;
	}
}
$catlist=getgoodscat();
//今日特惠
$sort=request('sort','');
$goods=index_goods($sort,request('start',0),$num);
$pages=$goods['pages'];
$page_url=$goods['page_url'];
//所属分类
$cat=intval(request('cat',0));
$goodscat=!empty($cat)?$catlist['cid_'.$cat]['title']:'';
//友情链接
$link=footerlink();
include(PATH_TPL."/header.tpl.php");
?>
<style type="text/css">
    .w1200{width:1200px}
</style>
<?php
	if (time() > strtotime('10:00')){
		$every_time = strtotime('10:00') + 60*60*24;
	}else{
		$every_time = strtotime('10:00');
	}
?>

<!-- banner -->
<!--
    <div class="index_banner">
        <div class="w1200 bc clearfix">

        <div class="category fl">
            <div class="content">
                <?php foreach ($catlist as $key=>$value):?>
                <a href="<?=u('index','index',array('cat'=>$value['id']));?>" class="cat_<?php echo $value['id']?> <?php if(request('cat') == $value['id']):?>this<?php endif?>" title="<?=$value['title'];?>">
                    <i></i><span><?=$value['title'];?></span>
                </a>
                <?php endforeach ?>
            </div>
        </div>

        <div class="right_ad fr">
            <?=A(999998);?>
            <?=A(999999);?>
        </div>
    </div>

    <ul class="imgbox">
        <?php foreach($_ad['ad_1'] as $v):?>
            <li><a href="<?php echo $v['url']?>" style="background:url(<?php echo $v['pic']?>) center no-repeat;" title="<?php echo $v['title']?>"></a></li>
        <?php endforeach?>
    </ul>
    <ul class="num">
        <?php foreach($_ad['ad_1'] as $v):?>
            <li></li>
        <?php endforeach?>
    </ul>
</div>
-->
<div class="container w1200 bc">
	<!-- 主体内容 -->
	<div class="clearfix">
	<p>&nbsp;</p>
		<table width="1200" border="0" align="center">
  <tr>
    <td><div data-title="QQ369077460" class="dmbox" style="zoom:1;background-color:#FFFFFF;border:dashed #808080 1px;padding:4px 0px;">  <div class="dmbd" style="height:17px;overflow:hidden;zoom:1;padding:4px 0px;">    <div class="dmt" style="color:#505050;float:left;width:auto;overflow:hidden;zoom:1;text-indent:15px;"> <img style="width:auto;" src="http://gdp.alicdn.com/imgextra/i1/2546029780/TB2pVf5cVXXXXcmXpXXXXXXXXXX-2546029780.gif" />  淘白菜温馨提示：</div>    <div class="dmc" style="margin-left:10px;color:#FF0000;height:18px;zoom:1;float:left;overflow:hidden;">      <marquee width="800" scrollamount="2" >      <span class="dmg" style="padding-left:13px;cursor:pointer;"> <img style="width:auto;" src="http://gdp.alicdn.com/imgextra/i2/2546029780/TB2ysf_cVXXXXa5XpXXXXXXXXXX-2546029780.gif" /> <a style="color:#505050;text-decoration:none;" target="_blank" title="发货时间：每天下午3点半截单，3点半前付款的订单当天发出，3点半后的订单第二天发，晚上8点填写快递单号，也就是更新发货状态！">发货时间：每天下午3点半截单，3点半前付款的订单当天发出，3点半后的订单第二天发，晚上8点填写快递单号，也就是更新发货状态！</a> </span>      </marquee>    </div>  </div></div></td>
  </tr>
</table>
<p>&nbsp;</p>
		</ul>
		<!-- <div class="time fr clearfix mr50">
			<div class="fl tr w150 mt20">
				<p class="f18">每天 10:00 上新</p>
				<span class="f14">距更新还有</span>
			</div>
			<p class="settime fl" endTime="<?php echo $every_time?>">
				<b>00</b>时<b>00</b>分<b>00</b>秒
			</p>
		</div> -->
	</div>

    <div class="goods_list">
        <ul>
            <?php foreach ($goods['data'] as $key=>$value):?>
            <li>
                <div class="img_box">
                    <a <?=gogood($value['num_iid']);?> title="<?=$value['title'];?>">
                        <img src="<?=DEF_GD_LOGO;?>" data-original="<?=get_img($value['pic'],'290');?>" title="<?=$value['title'];?>" alt="<?=$value['title'];?>"  class="lazy bc">
                    </a>
                    <?php if(time() < ($value['start'] + 60*60*24)):?>
                        <div class="new"></div>
                    <?php elseif($value['volume'] > 1000):?>
                        <div class="hot"></div>
                    <?php endif?>
                    <div class="collect" onclick="goodsfav('<?=$value['id'];?>')"></div>
                </div>
                <div class="clearfix">
                    <a <?=gogood($value['num_iid']);?> title="<?=$value['title'];?>" class="title fl"><?=$value['title'];?></a>
                    <span class="fr yshou mt8 mr5">已售
                        <?php if ($value['volume'] > 9999):?>
                            <?php echo number_format($value['volume'] / 10000,1) . 'w'?>
                        <?php else:?>
                            <?php echo $value['volume']?>
                        <?php endif?>
                    </span>
                </div>
                
                <div class="info clearfix">
                    <div class="price fl mr10">
                        <span> ¥</span>
                        <b><?=trim_last0(($value['promotion_price']-$value['coupon_money']));?></b>
                    </div>
                    <div class="zekou fl">
                        <span>¥<?=number_format($value['price'],1);?><br /><i>（<?=number_format($value['discount'],1);?>折）</i></span>
                    </div>
                    <div class="web fr mt20">
                        <?php if($value['site'] == 'taobao'):?>
                            <p class="tb"></p>
                        <?php else:?>
                            <p class="tm"></p>
                        <?php endif?>

                        <?php if($value['start']>$_timestamp){ ?>
                        <a <?=gogood($value['num_iid']);?> class="go fr" style="background:#1eb925">即将开始</a>
                        <?php }elseif ($value['end']<$_timestamp){ ?>
                        <a <?=gogood($value['num_iid']);?> class="go fr" style="background:#cccccc">已结束</a>
                        <?php }else{ ?>
                        <a <?=gogood($value['num_iid']);?> class="go fr">去抢购</a>
                        <?php } ?>
                    </div>
                </div>
                <?php if (!empty($value['coupon_url'])): ?>
                    <div class="quanhoujiage"></div>
                    <a href="<?=$value['coupon_url']?>" target="_blank">
                        <span class="qg-img-tag"><em><?=$value['coupon_money']?>元</em></span>
                    </a>
                <?php endif ?>
            </li>
            <?php endforeach?>
        </ul>
        <!--//分页-->
        <?php include(PATH_TPL."/public/pages.tpl");?>
    </div>
</div>
<?php include(PATH_TPL."/footer.tpl.php");?>