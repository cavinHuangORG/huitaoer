<?php
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @common.act.php
 * =================================================
*/
if(!defined('PATH_ROOT')){
	exit('Access Denied');
}
$where=array();
$sort=request('sort','');
//当前导航
$nid=isset($_nav[MODNAME.'/'.ACTNAME]['id'])?$_nav[MODNAME.'/'.ACTNAME]['id']:0;
!empty($nid) && $where[]='channel='.$nid;
// print_r(MODNAME.'/'.ACTNAME);exit();
$where[]='status=1';
//当前分类
$cat=intval(request('cat',0));
//产品列表
$start = intval(request('start',0));
//判断是否显示过期商品
if($_webset['base_showover']!=1){
	$where[]='end>'.$_timestamp;
}
//是否显示明日预告
if($_webset['base_tomorrow']!=1){
	$where[]='start<'.strtotime('tomorrow');
}
$where[]='channel!='.brandNid();//是否是品牌
if ($_webset['site_tpl']=='kuihuo') {
	$PAGE=PAGE+6;
}else{
	$PAGE=PAGE;
}
$result=goodslist($where,goodsorder($sort),$start,$PAGE);
$goodslist=array();
if (!empty($result))
{
	if(in_array($sort,array('new','hot'))){
		$result['urls']['sort']=$sort;
	}
	$page_url=u('goods',ACTNAME,$result['urls']);
	$pages=get_page_number_list($result['total'], $start,$PAGE);
	$goodslist=$result['data'];
	preg_match('/pid:\s+\"(.*?)\"/',$_webset['taoke_dianjin'],$pid);
	foreach ($goodslist as $key => $value) {
		if(!empty($value['coupon_url'])) {
			$activityId = getDiscountUrl($value['coupon_url']);
			$goodslist[$key]['coupon_url'] = 'https://uland.taobao.com/coupon/edetail?activityId='.$activityId.'&pid='.$pid[1].'&itemId='.$value['num_iid'].'&src=wysd_lqtui';
		}
	}
}
//分类
$catlist=getgoodscat();
$goodscat=!empty($cat)?$catlist['cid_'.$cat]['title']:'';



?>