<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\list.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @list.act.php
 * =================================================
*/
$where=array();
//分类
$catlist=getgoodscat();
$cat=request('cat','');
$keyword=request('keyword');
//排序
$sort='';
$g_sort=request('sort','');
if(!empty($g_sort)){
	$g_sort=='discount' && $sort='`discount` ASC';
	$g_sort=='hot' && $sort='`fav` DESC';
	$g_sort=='top' && $sort='`volume` desc';
	$g_sort=='jx' && $sort='`coupon_give` desc';
	$g_sort=='isrec' && $sort='`isrec` desc';
}else{
	$sort='`start` desc,`isrec` desc';
}
//页数
$start = intval(request('start',0));
$page=empty($start)?1:ceil($start/20)+1;
$where=array('channel!='.brandNid(),'start<'.strtotime('tomorrow'));

//判断是否显示过期商品
if($_webset['base_showover']!=1){
	$where[]='end>'.$_timestamp;
}
$result=goodslist($where,$sort,$start,20);
$goods=array();
if (!empty($result))
{
	$count=$result['total'];
	$num=ceil($count/20);
	$pages=get_page_number_list($result['total'], $start,20);
	$goods=$result['data'];
	if ($_webset['mtaoke_dianjin']) {
		preg_match('/pid:\s+\"(.*?)\"/',$_webset['mtaoke_dianjin'],$pid);
	}else{
		preg_match('/pid:\s+\"(.*?)\"/',$_webset['taoke_dianjin'],$pid);
	}
	foreach ($goods as $key=>$value){
		if(!empty($value['coupon_url'])) {
			$activityId = getDiscountUrl($value['coupon_url']);
			$goods[$key]['mcoupon_url'] = 'https://uland.taobao.com/coupon/edetail?activityId='.$activityId.'&pid='.$pid[1].'&itemId='.$value['num_iid'].'&src=wysd_lqtui';
		}
	}
}
if($_isajax){
	if(empty($goods)){
		echo json_encode(array('isover'=>true));
		exit();
	}
	$today=strtotime('today');
	if(!empty($goods)){
		foreach ($goods as $key=>$value){
			$goods[$key]['url_format']=u('wap','jump',array('iid'=>$value['num_iid']));
			$goods[$key]['pic']=get_img($value['pic'],'290');
			if(!empty($value['coupon_url'])) {
				$goods[$key]['promotion_price'] = $value['promotion_price']-$value['coupon_money'];
				$goods[$key]['is_quan']=1;
			}
			if($value['start']>$today){
				$goods[$key]['is_new']=1;
			}else{
				$goods[$key]['is_new']=0;
			}
		}
	}
	echo json_encode(array('isover'=>false,'num'=>$num,'allnum'=>$allnum,'sort'=>$g_sort,'cat'=>$cat,'goods'=>$goods));
	exit();
}else{
	require tpl_extend(WAP_TPL.'/list.tpl.php');
}
/* End of file list.act.php */
/* Location: E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\list.act.php */