<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		D:\website\taobaoke\jiu2\admin\mod\seting\base.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @base.act.php
 * =================================================
*/
if(submitcheck('baseset')){
	$base=request('base',array());
	system::webset($base);
	show_message('操作成功','设置成功','-1');
}
/* End of file base.act.php */
/* Location: D:\website\taobaoke\jiu2\admin\mod\seting\base.act.php */