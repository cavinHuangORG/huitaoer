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
//后台导航
require PATH_APP.'/lib/comm/parse_menu.php';
parse_menu::main_menu();
$menu=parse_menu::$main_menu;
$sub_menu=parse_menu::$sub_menu;
//扩展导航
$tplarr=getDir(PATH_ROOT.'extend/');
foreach ($tplarr as $k=>$val){
	$extend_app_config=PATH_ROOT.'extend/'.$val.'/admin/config/inc_admin_menu.php';
	if(file_exists($extend_app_config)){
		$exchange=$val;
		parse_menu::$menu_file=$extend_app_config;
		parse_menu::main_menu();
		$menu=parse_menu::$main_menu;
		$sub_menu=parse_menu::$sub_menu;
	}
}
?>