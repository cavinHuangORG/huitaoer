<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		E:\wwwroot\taobaoke\xuanyu\extend\wap\lib\common.fun.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @common.fun.php
 * =================================================
*/
function get_wap_tpl(){
	//读取模板
	$tplarr=getDir(PATH_EXTEND.'/template/');
	foreach ($tplarr as $k=>$val){
		$tpl[$val]=$val;
	}
	return $tpl;
}
/* End of file common.fun.php */
/* Location: E:\wwwroot\taobaoke\xuanyu\extend\wap\lib\common.fun.php */