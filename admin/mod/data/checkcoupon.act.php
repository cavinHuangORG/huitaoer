<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		D:\website\taobaoke\jiu2\admin\mod\data\checkcoupon.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @checkcoupon.act.php
 * =================================================
*/
$wherestr = 'coupon_cktime<'.(time()-3600).' and status=1 and end>'.$_timestamp.' and (coupon_url<>\'\' or mcoupon_url<>\'\')';
$goods = getcoupongoods($wherestr);
$jc_num = 0;
foreach ($goods as $key => $value) {
	if($value['coupon_url']){
		$url=$value['coupon_url'];
	}else{
		$url=$value['mcoupon_url'];
	}
	$jc_num++;
	$urlArr[] = array('url'=>base64_encode($url),'id'=>$value['id']);
}
$urljson = json_encode($urlArr);
$urljson = empty($urljson)?'':$urljson;
/* End of file checkcoupon.act.php */
/* Location: D:\website\taobaoke\jiu2\admin\mod\data\checkcoupon.act.php */