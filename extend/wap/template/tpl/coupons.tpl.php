<?php require tpl_extend(WAP_TPL.'/pub/header.tpl');?>
<style>
	* {
	    padding: 0px;
	    margin: 0px;
	    border: 0 none;
	}
	.index2_head {
	    overflow: inherit;
	    z-index: 200;
	    position: fixed;
	    top: 0px;
	    width: 100%;
	    height: 44px;
	}
	.cat_frame{
		width: 100%;
		height: 250px;
		margin-top: -10px;
	}
.item-wrap {
    height: 100%;
}
.item-wrap .item-detail {
    border-bottom: 1px dashed #c7c7c7;
    padding: 4%;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
    display: block;
}
.item-wrap .item-detail .pic {
    width: 36%;
    float: left;
}
.item-wrap .item-detail .pic img {
    width: 100%;
    border: 1px solid #c6c6c6;
}
.item-wrap .item-detail .item-content {
    width: 64%;
    height: 100%;
    float: left;
    padding: 0 3%;
    box-sizing: border-box;
}
.item-content .title {
    overflow: hidden;
    font-size: .5rem;
    line-height: .7rem;
    height: 1.5rem;
}
.item-content .title span {
    overflow: hidden;
    font-size: .5rem;
    height: 1.5rem;
    line-height: .8rem;
    color: #333;
}
.item-content .tags {
    height: 25px;
    overflow: hidden;
    line-height: 1rem;
    margin-top: .5rem;
}
.tmallTag {
    width: 17px;
    height: 17px;
}
.byTag {
    background: 0 0;
    font-size: 12px;
    line-height: 16px;
    height: 16px;
    padding: 0 2px;
    border: 1px solid #f40;
    color: #f40;
}
.tags .tag {
    float: left;
    margin: 0 2px;
}
.tags .dealNum {
    float: right;
    color: #9b9b9b;
    top: -.08rem;
    position: relative;
}
.item-content .price-origin {
    height: 20px;
    line-height: 20px;
    font-size: 12px;
    margin: 1px 0;
}
.price-origin .origin {
    color: #333;
    font-size: .5rem;
}
.item-content .discount {
    height: 25px;
    line-height: 1rem;
    font-size: .5rem;
    margin: 5px 0 0;
}
.item-content .discount .img-tag {
    vertical-align: middle;
    width: 52px;
}
.item-content .discount .sale {
    font-size: 1.2rem;
    vertical-align: middle;
    color: #f40;
    margin-left: .2rem;
}
.item-content .discount .sale em {
    font-size: .5rem;
    font-style: normal;
    display: inline-block;
    width: .7rem;
    text-align: center;
}
.item-content .gotb{
	display: inline-block;
	font-size: 14px;
	color: #f40;
	float: right;
}
</style>
<iframe class="cat_frame" scrolling="no"  src="<?=$coupon_url?>" ></iframe>
<div class="item-wrap">
	<a <?=gogood($good['num_iid']);?> class="item-detail">
		<div class="pic">
			<img src="<?=get_img($good['pic'],'300');?>"></div>
		<div class="item-content">
			<div class="title">
				<span><?=$good['title'];?></span>
			</div>
			<div class="tags">
				<span class="tmallTag tag">
					<img src="/static/images/<?=$good['site'];?>.png" alt=""></span>
				<span class="byTag tag">包邮</span>
				<span class="dealNum"><?=$good['volume'];?>笔成交</span>
			</div>
			<div class="price-origin">
				<span class="origin">现价：¥<?=$good['promotion_price'];?></span>
			</div>
			<div class="discount">
				<img class="img-tag" src="/static/images/quanh.png">
				<span class="sale"> <em>¥</em>
					<?=$good['promotion_price']-$good['coupon_money'];?>
				</span>
			</div>
			<span class="gotb">点击购买</span>
		</div>
	</a>
</div>
<?php require tpl_extend(WAP_TPL.'/pub/footer.tpl');?>