<?php
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @index.act.php
 * =================================================
*/
if(!defined('PATH_ROOT')){
	exit('Access Denied');
}
//今日优惠
function index_goods($sort,$start,$num=PAGE,$where_arr=array()){
	global $_timestamp,$_webset;
	//品牌团id
	$nid=brandNid();
	$order=goodsorder($sort);
	$where[]='status=1';
	$where[]='channel!='.$nid;
	date_default_timezone_set("PRC");
	$date_start = strtotime(date("Y-m-d"));//当天0点
	$date_end = strtotime(date('Y-m-d',strtotime('+1 day')));//当天24点

	//判断是否显示过期商品
	if($_webset['base_showover']!=1){
		$where[]='end>'.$_timestamp;
	}
	//是否显示明日预告
	if($_webset['base_tomorrow']!=1){
		$where[]='start<'.strtotime('tomorrow');
	}
	$result=goodslist($where,$order,$start,$num);
	$goodslist=array();
	if (!empty($result))
	{
		if(in_array($sort,array('new','hot','promotion_price'))){
			$result['urls']['sort']=$sort;
		}
		$page_url=u('index','index',$result['urls']);
		$pages=get_page_number_list($result['total'], $start,$num);
		$goodslist=$result['data'];
		/*获取今日跟新数据*/
		$Num_update = 0;
		preg_match('/pid:\s+\"(.*?)\"/',$_webset['taoke_dianjin'],$pid);
		foreach ($goodslist as $key => $value) {
			if(!empty($value['coupon_url'])) {
				$activityId = getDiscountUrl($value['coupon_url']);
				$goodslist[$key]['coupon_url'] = 'https://uland.taobao.com/coupon/edetail?activityId='.$activityId.'&pid='.$pid[1].'&itemId='.$value['num_iid'].'&src=wysd_lqtui';
			}
			if($value['start'] >= $date_start && $value['start'] <= $date_end )
			{
				$Num_update+=1;

			}
		}
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']))
		{
			echo (json_encode(array('goods_data' => $goodslist)));
		
		}
		return array('pages'=>$pages,'page_url'=>$page_url,'data'=>$goodslist,'Num_update'=>$Num_update);
	}
	return array();
}
//友情链接
function footerlink(){
	return system::getlink();
}
?>