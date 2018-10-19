<?php
/**
 * 自动采集模型
 * 
 */
class mod_autogather{

	public static function setautogather($fileurl){	
		$file=fopen($fileurl, "w");
		fwrite($file, time());
		fclose($file);
		$domain = urlencode($_SERVER['HTTP_HOST']);
		$gatherurl = 'http://api.zhaohaodan.com/Port/xuanYuGather/domain/'.$domain;	
		mod_autogather::autogoods($gatherurl,$domain);
	}
	public static function autogoods($gatherurl,$domain){
		global $_webset,$_timestamp;
		$gatherdata=json_decode(curl($gatherurl),true);
		$xycat = array('1'=>6,'2'=>7,'3'=>8,'4'=>9,'5'=>10,'6'=>11,'7'=>12,'8'=>13,'9'=>14,'10'=>15);
		if (!empty($gatherdata)) {
			foreach ($gatherdata['goods'] as $key => $value) {
				if ($value['channel']<10) {
					$channel = 2;
				}elseif ($value['channel']<20) {
					$channel = 3;
				}else{
					$channel = 4;
				}
				if (($value['promotion_price']-$value['coupon_money'])<10) {
					$channel = 2;
				}elseif (($value['promotion_price']-$value['coupon_money'])<20) {
					$channel = 3;
				}else{
					$channel = 4;
				}
				
				$addtime= $_timestamp;
				if (empty($value[$rule['start']])) {
					$start = $_timestamp;
				}
				if(!empty($_webset['base_showday']) && $_webset['base_showday']>0){
					$end=$_webset['base_showday']*3600*24+$start;
				}
				$insertgoods[]='replace into '.tname('goods').'(`title`,`channel`, `cat`, `price`, `promotion_price`, `discount`, `volume`,`nick`,`seller_id`, `site`, `num_iid`, `pic`, `taopic`,`taopicl`,`coupon_url`,`mcoupon_url`,`coupon_money`, `isrec`,`addtime`, `start`, `end`,`status`,`remark`) VALUES  (
					\''.str_replace("'","\'",strip_tags($value['title'])).'\',\''.$channel.'\',\''.$xycat[$value['cat']].'\',\''.$value['price'].'\',\''.$value['promotion_price'].'\',\''.$value['discount'].'\',\''.$value['volume'].'\',\''.$value['nick'].'\',\''.$value['seller_id'].'\',\''.$value['site'].'\',\''.$value['num_iid'].'\',\''.$value['pic'].'\',\''.$value['taopic'].'\',\''.$value['taopicl'].'\',\''.$value['coupon_url'].'\',\''.$value['mcoupon_url'].'\',\''.$value['coupon_money'].'\',\''.$value['isrec'].'\',\''.$addtime.'\',\''.$start.'\',\''.$end.'\',\'1\',\''.str_replace("'","\'",$value['remark']).'\');';
				$curl = 'http://api.zhaohaodan.com/Port/setGoodsGatherLog/iid/'.$value['num_iid'].'/type/2/domain/'.urlencode($domain);
				curl($curl);
			}
			mod_autogather::autoinsertdata($insertgoods);
		}
	}

	//自动采集数据插入数据库中
	public static function autoinsertdata($data=array()) {
	    foreach ($data as $key => $value) {
	    	lib_database::wquery($value);
	    }
	}
}