<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\coupons.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @coupons.act.php
 * =================================================
*/
//参数
$coupon_url=request('coupon_url');
$iid=request('iid');
if(empty($coupon_url) || empty($iid)){
	header('location:'.u('index','index'));
	exit();
}
$good=getiidgood($iid);
require tpl_extend(WAP_TPL.'/coupons.tpl.php');
/* End of file coupons.act.php */
/* Location: E:\wwwroot\taobaoke\xuanyu\extend\wap\mod\coupons.act.php */