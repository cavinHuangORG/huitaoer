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
//明日预告
function tomorrow_goods($sort,$start,$num=PAGE,$where_arr=array()){
	global $_timestamp,$_webset;
	$sort=goodsorder($sort);
	if(!empty($where_arr['site']))//判断天猫或者淘宝来源
	{
		// print_r($where_arr);exit;
		$where[] = "site='{$where_arr['site']}'";
	}

	if(!empty($where_arr['pro_price']))//判断价格区间
	{
		$price = '';
		$Number = array('0','20','50','100','200','500');
		switch ($where_arr['pro_price']) {
			case 'pro_price_1':
				$price = "promotion_price between {$Number[0]} and {$Number[1]}";
				break;
			case 'pro_price_2':
				$price = "promotion_price between {$Number[1]} and {$Number[2]}";
				break;
			case 'pro_price_3':
				$price = "promotion_price between {$Number[2]} and {$Number[3]}";
				break;
			case 'pro_price_4':
				$price = "promotion_price between {$Number[3]} and {$Number[4]}";
				break;
			case 'pro_price_5':
				$price = "promotion_price between {$Number[4]} and {$Number[5]}";
				break;
			case 'pro_price_6':
				$price = "promotion_price >= {$Number[5]}";
				break;
		}
		$where[] = $price;
	}
	$where[]='status=1';
	$where[]='start>='.strtotime('tomorrow');
	$where[]='start<'.strtotime('tomorrow')+3600*24;
	$result=goodslist($where,$sort,$start,$num);
	$goodslist=array();
	if (!empty($result))
	{
		if(in_array($sort,array('new','hot'))){
			$result['urls']['sort']=$sort;
		}
		$page_url=u('index','tomorrow',$result['urls']);
		$pages=get_page_number_list($result['total'], $start,$num);
		$goodslist=$result['data'];
		return array('pages'=>$pages,'page_url'=>$page_url,'data'=>$goodslist);
	}
	return array();
}
?>