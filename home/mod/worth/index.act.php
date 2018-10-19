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
// //  // echo (111);
// // 	// $page = intval(request('page',0))-1;
// 	$where[]='start<='.$_timestamp;
// // 	// print_r($where);
// 	echo "string";
// 	$dataarr=mod_worth::worth_list($where,'start desc',0,30);
// 	print_r($dataarr);
// exit;
//获取值得买主题列表
if (request('ajax',0) ==1) {
	$start = intval(request('start',0));
	$page = intval(request('page',0))-1;
	$where[]='start<='.$_timestamp;
	$dataarr=mod_worth::worth_list($where,'start desc',$page,30);
	foreach ($dataarr['data'] as $key => $value) {
		if ($dataarr['data'][$key]['start']>=strtotime('today')&&$dataarr[$key]['start']<strtotime('+1 day')) {
			$dataarr['data'][$key]['news']=true;
		}
		$dataarr['data'][$key]['url']=u('worth','detail',array('wid'=>$dataarr['data'][$key]['wid']));
	}
	// print_r($dataarr);
	echo json_encode($dataarr);
	exit;
}