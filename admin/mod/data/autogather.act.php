<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		D:\website\taobaoke\jiu2\admin\mod\data\brandgather.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @brandgather.act.php
 * =================================================
*/
$sets=request('sets');
$autotime=request('autotime');
if (empty($sets)) {
	$autotime=explode(',',$_webset['autotime']);
}else{
	$base=array('autotime'=>implode(',',$autotime));
	system::webset($base);
	$gourl=request('gourl','?mod=data&ac=autogather');
	show_message('设置成功','设置成功',$gourl);
}