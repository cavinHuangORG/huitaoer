<div class="container w1200 bc">
	<!-- 主体内容 -->
    <div class="goods_list">
        <ul>
            <?php foreach ($goodslist as $key=>$value):?>
            <li>
                <div class="img_box">
                    <a <?=gogood($value['num_iid']);?> title="<?=$value['title'];?>">
                        <img src="<?=DEF_GD_LOGO;?>" data-original="<?=get_img($value['pic'],'310');?>" title="<?=$value['title'];?>" alt="<?=$value['title'];?>"  class="lazy bc">
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