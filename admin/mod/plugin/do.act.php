<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		E:\wwwroot\taobaoke\xuanyu\admin\mod\plugin\do.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @do.act.php
 * =================================================
*/
$identifier=request('identifier');
$pmod=request('pmod');
if(empty($identifier) || empty($pmod)){
	show_message('系统提示','操作错误',-1);
	exit();
}
$_plugin_url='?mod='.MODNAME.'&ac='.ACTNAME.'&identifier='.$identifier;
define('PATH_PLUGIN', PATH_ROOT.'plugin/'.$identifier.'/');
//资源目录
define('PATH_STATIC', '../plugin/'.$identifier.'/static/');
//调用数据
include PATH_PLUGIN.'admin/mod/'.$pmod.'.act.php';
include PATH_PLUGIN.'admin/template/'.$pmod.'.tpl.php';
exit();
/* End of file do.act.php */
/* Location: E:\wwwroot\taobaoke\xuanyu\admin\mod\plugin\do.act.php */