<?php
/**
 * ============================================================================
 * 版权所有  网悦时代，并保留所有权利。
 * 网站地址: http://soft.wangyue.cc；
 * ----------------------------------------------------------------------------
 * 这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
if( !file_exists(dirname(__FILE__) . "/data/install.lock") )
{
	header("Location:install/index.php");
	exit();
}
require './library/init.php';
require PATH_APP.'/common.inc.php';
//调用
require execute_mod(MODNAME,ACTNAME);
if(!defined('IS_EXTEND') && !defined('IS_PLUGIN')){
	require tpl_mod(MODNAME,ACTNAME);
}