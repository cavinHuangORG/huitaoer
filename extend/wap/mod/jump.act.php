<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\jump.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @jump.act.php
 * =================================================
*/
//参数
$iid=request('iid',0);
$click_url=request('click_url');
//爱淘宝
if(empty($iid)){
	header('location:'.u('index','index'));
	exit();
}
$good=getiidgood($iid);
preg_match('/pid:\s+\"(.*?)\"/',$_webset['taoke_dianjin'],$pid);
$pid=$pid[1];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($user_agent, 'MicroMessenger') != false &&  $_webset['tb_ison']==1) {
	if(!empty($good['coupon_url'])) {
		$activityId = getDiscountUrl($good['coupon_url']);
		$good['url'] = 'https://uland.taobao.com/coupon/edetail?activityId='.$activityId.'&pid='.$pid.'&itemId='.$good['num_iid'].'&src=wysd_lqtui';
	}else{
		$good['url'] = 'http://item.taobao.com/item.htm?id='.$iid;
	}

	$tklData = mod_goodstkl::get_goodstkl($good['num_iid']);
	if (!empty($tklData['tklkey']) && $tklData['addtime']>$good['start'] && $tklData['addtime']<$good['end']) {
		$copy_key = $tklData['tklkey'];
	}else{
		$copy_key = gettklkey($good);
		$addData = array(
			'iid'	=>	$good['num_iid'],
			'tklkey'=>	$copy_key,
			'addtime'=>	$_timestamp,
			);
		if (!empty($tklData['tklkey'])) {
			$addData['id']=$tklData['id'];
		}
		mod_goodstkl::add_goodstkl($addData);
	}
	require tpl_extend(WAP_TPL.'/weixin.tpl.php');
	die;
}
if ($good['qq_url']!='') {
	header('location:'. $good['qq_url']);
	exit();
}
$click_url='http://item.taobao.com/item.htm?id='.$iid;
require tpl_extend(WAP_TPL.'/jump.tpl.php');
/* End of file jump.act.php */
/* Location: E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\jump.act.php */