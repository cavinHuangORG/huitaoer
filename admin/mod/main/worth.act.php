<?php if(!defined('PATH_ROOT')){exit('Access Denied');}
/**
 * =================================================
 * @版权所有  网悦时代，并保留所有权利。
 * @网站地址: http://soft.wangyue.cc；
 * -------------------------------------------------
 * @这是一个商业软件！您只能在得到官方的授权才可对程序代码进行修改
 * @使用；不允许对程序代码以任何形式任何目的的再发布。
 * @package		D:\website\taobaoke\jiu2\admin\mod\goods\goods.act.php
 * @author		bank
 * @link		http://bbs.52jscn.com
 * @goods.act.php
 * =================================================
*/
$ops=array('worth_add','goods_add','worth_list','goods_list','worth_del','goods_del');
$op=request('op','worth_list',$ops);
//主题列表
if($op=='worth_list'){
	$start = intval(request('start',0));
	$startbg=request('startbg');
	$startend=request('startend');
	if(!empty($startbg))
	{
		$wherestr[]='start>='.strtotime($startbg);
	}
	if(!empty($startend))
	{
		$wherestr[]='start<='.strtotime($startend);
	}
	$result=mod_worth::worth_list($wherestr,'addtime desc',$start,30);
	$worthlist=array();
	if (!empty($result))
	{
		$page_url='?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op.'&'.$result['url'];
		$pages=get_page_number_list($result['total'], $start, 30);
		$worthlist=$result['data'];
	}
}
//商品列表
elseif ($op=='goods_list'){
	$start = intval(request('start',0));
	$wid = intval(request('wid',0));
	$startbg=request('startbg');
	$startend=request('startend');	
	if(!empty($startbg))
	{
		$wherestr[]='start>='.strtotime($startbg);
	}
	if(!empty($startend))
	{
		$wherestr[]='start<='.strtotime($startend);
	}
	if ($wid==0) {
		$wherestr[]='wid<>0';
	}else{
		$wherestr[]='wid='.$wid;
	}
	$result=goodslist($wherestr,'`start` DESC',$start,30);
	$goodslist=array();
	if (!empty($result))
	{
		$page_url='?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op.'&'.$result['url'];
		$pages=get_page_number_list($result['total'], $start, 30);
		$goodslist=$result['data'];
	}
}
//添加主题
elseif ($op=='worth_add'){
	$worth=request('worth',array());
	$wid=request('wid','');
	if(!empty($worth)){
		if(empty($worth['title'])){
			show_message('系统提示','请填写主题名称',-1);
		}
		if(empty($worth['descr'])){
			show_message('系统提示','请填写主题描述',-1);
		}
		if(empty($worth['pic']) && empty($worth['pic'])){
			show_message('系统提示','请上传主题图片',-1);
		}
		if(empty($worth['start'])){
			show_message('系统提示','请填写开始时间',-1);
		}
		//处理时间，验证时间
		$worth['start']=strtotime($worth['start']);
		if($worth['start']<=time()){
			show_message('系统提示','开始时间有误',-1);
		}
		if (empty($worth['addtime'])) {
			$worth['addtime']=time();
		}
		mod_worth::add_worth($worth);
		//跳转位置
		$gourl=request('gourl','?mod=main&ac=worth');
		show_message('操作成功','操作成功',$gourl);
	}
	if(!empty($wid)){
		$worth=mod_worth::get_worth($wid);
	}
}

//添加商品
elseif ($op=='goods_add'){
	$good=request('good',array());
	$wid=request('wid','');
	$id=request('id','');

	if(!empty($good)){
		if(empty($good['title'])){
			show_message('系统提示','请填写宝贝名称',-1);
		}
		if(empty($good['num_iid'])){
			show_message('系统提示','请填写宝贝ID',-1);
		}
		if(empty($good['pic']) && empty($good['taopic'])){
			show_message('系统提示','请上传宝贝图片',-1);
		}
		if(empty($good['pic']) && !empty($good['taopic'])){
			$good['pic']=$good['taopic'];
		}
		if(empty($good['price'])){
			show_message('系统提示','请填写宝贝价格',-1);
		}
		if(empty($good['promotion_price'])){
			show_message('系统提示','请填写宝贝促销价格',-1);
		}
		if(empty($good['nick'])){
			show_message('系统提示','请填写买家昵称',-1);
		}
		if(empty($good['ispost']))
		{
			$good['ispost']=-1;
		}
		if(empty($good['isvip']))
		{
			$good['isvip']=-1;
		}
		if(empty($good['ispaigai']))
		{
			$good['ispaigai']=-1;
		}
		if(empty($good['isrec']))
		{
			$good['isrec']=-1;
		}
		//处理时间，验证时间
		$good['start']=strtotime($good['start']);
		$good['end']=strtotime($good['end']);
		if($good['end']<=$good['start']){
			show_message('系统提示','活动时间有误',-1);
		}
		//判断有没有
		if(goodCheck($good['num_iid']) && empty($good['id'])){
			show_message('系统提示','宝贝已经存在',-1);
		}
		//计算折扣
		$good['discount']=sprintf("%.2f",$good['promotion_price']/$good['price'])*10;
		//保存
		$good['status']=1;
		goodAdd($good);
		//跳转位置
		$gourl=request('gourl','?mod=main&ac=worth&op=goods_list');
		show_message('操作成功','操作成功',$gourl);
	}
	if(!empty($wid)){
		$good['wid']=$wid;
	}	
	if(!empty($id)){
		$good=getgood($id);
	}
}
//删除主题
elseif ($op=='worth_del'){
	$wid = intval(request('wid',0));		
	$result=mod_worth::del_worth($wid);
	//跳转位置
	$gourl=request('gourl','?mod=main&ac=worth&op=worth_list');
	if ($result>0)
	{
		show_message('删除成功','删除成功',$gourl);
	}else{
		show_message('删除失败','删除失败',$gourl);
	}
}
//删除商品
elseif ($op=='goods_del'){
	$id = intval(request('id',0));		
	$result=mod_worth::del_goods($id);
	//跳转位置
	$gourl=request('gourl','?mod=main&ac=worth&op=goods_list');
	if ($result>0)
	{
		show_message('删除成功','删除成功',$gourl);
	}else{
		show_message('删除失败','删除失败',$gourl);
	}
}