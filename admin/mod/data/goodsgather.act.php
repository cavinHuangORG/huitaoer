<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		D:\website\taobaoke\jiu2\admin\mod\data\goodsgather.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @goodsgather.act.php
 * =================================================
*/
$ops=array('list','addgather','do');
$op=request('op','list',$ops);
//系统分类
$catlist=getgoodscat();
//商品列
$goodscolumn=getgoodscolumn();
if($op=='list'){
	$gatherlist=getgather();
}elseif ($op=='addgather'){
	//添加采集规则
	$gather=request('gather');
	if(!empty($gather)){
		addgather($gather);
		show_message('操作成功','添加规则成功','?mod='.MODNAME.'&ac='.ACTNAME);
	}else{
		$id=request('id');
		$gather=array();
		if(!empty($id)){
			$gather=getgather($id);
		}
	}
}
//采集
elseif ($op=='do'){
	$id=request('id');
	$gather=getgather($id);
	if (stripos($gather['url'],'haodan') == true) {
		$domain = urlencode($_SERVER['HTTP_HOST']);
		$gather["url"].='/domain/'.$domain.'/pagesize/'.$gather["pagesize"];
	}else{
		$gather["url"].='&'.$gather["page"].'=';
	}
}
/* End of file goodsgather.act.php */
/* Location: D:\website\taobaoke\jiu2\admin\mod\data\goodsgather.act.php */