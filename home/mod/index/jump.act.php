<?php
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @jump.act.php
 * =================================================
*/
if(!defined('PATH_ROOT')){
	exit('Access Denied');
}
//参数
$iid=request('iid',0);
$op=request('op','');
$click_url=request('click_url');
//爱淘宝
if(empty($iid)){
	header('location:'.u('index','index'));
	exit();
}
$good=getiidgood($iid);
if ($good['qq_url']!='') {
	header('location:'. $good['qq_url']);
	exit();
}
preg_match('/pid:\s+\"(.*?)\"/',$_webset['taoke_dianjin'],$pid);
$pid=$pid[1];
$click_url='http://item.taobao.com/item.htm?id='.$iid;
?>