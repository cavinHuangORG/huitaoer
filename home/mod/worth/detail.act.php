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
//获取url中的主题id
$wid=intval(request('wid',0));
//获取主题数据
$worth=mod_worth::get_worth($wid);
//获取主题对应的商品数据
$data=mod_worth::get_goods($wid);