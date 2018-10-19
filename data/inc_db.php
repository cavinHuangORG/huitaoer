<?php
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @inc_config.php
 * =================================================
*/
if(!defined('PATH_ROOT')){
	exit('Access Denied');
}
define('COOKIE_DOMAIN', '.52jscn.com'); //正式环境中如果要考虑二级域名问题的应该用 .xxx.com
define('COOKIE_PATH', '/');
define('URL', 'http://demo.52jscn.com/');
// --------------------------  CONFIG CONFIG  --------------------------- //
$GLOBALS['config']['db_host']['master'] = 'localhost';
$GLOBALS['config']['db_host']['slave']['0'] = 'localhost';
$GLOBALS['config']['db_user'] = 'root';
$GLOBALS['config']['db_name'] = 'demo';
$GLOBALS['config']['db_pass'] = '52jscn.com';
$GLOBALS['config']['db_pre'] = 'pre_';
$GLOBALS['config']['cookie_pre'] = 'EhP6Pgj#82yb';
$GLOBALS['config']['cookie_pwd'] = 'reFG5Tp#dxmT';


// -------------------  THE END  -------------------- //

?>