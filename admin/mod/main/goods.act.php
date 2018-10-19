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
$ops=array('add','badd','over','list','blist');
$op=request('op','list',$ops);
//商品列表
if($op=='list'){
	$start = intval(request('start',0));
	$result=goodslist(array('status=1','channel!='.brandNid()),'',$start,30);
	$goodslist=array();
	if (!empty($result))
	{
		$page_url='?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op.'&'.$result['url'];
		$pages=get_page_number_list($result['total'], $start, 30);
		$goodslist=$result['data'];
	}
}
//过期列表
elseif ($op=='over'){
	$start = intval(request('start',0));
	$result=goodslist(array('status=1','end<'.$_timestamp,'channel!='.brandNid()),'`start` DESC',$start,30);
	$goodslist=array();
	if (!empty($result))
	{
		$page_url='?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op.'&'.$result['url'];
		$pages=get_page_number_list($result['total'], $start, 30);
		$goodslist=$result['data'];
	}
}
//品牌宝贝
elseif ($op=='blist'){
	$start = intval(request('start',0));
	$bid=request('bid',0);
	$where[]='status=1';
	$where[]='channel='.brandNid();
	!empty($bid) && $where[]='cat='.$bid;
	$result=goodslist($where,'',$start,30);
	$goodslist=array();
	if (!empty($result))
	{
		$page_url='?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op.'&'.$result['url'];
		$pages=get_page_number_list($result['total'], $start, 30);
		$goodslist=$result['data'];
	}
}
//添加代码
elseif ($op=='add'){
	$good=request('good',array());
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
		if (!empty($good['coupon_url'])) {
			$good['mcoupon_url'] = coupons($good['coupon_url']);
		}		
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
		$gourl=request('gourl','?mod=main&ac=goods');
		show_message('操作成功','操作成功',$gourl);
	}
	if(!empty($id)){
		$good=getgood($id);
	}
}
//品牌宝贝
elseif ($op=='badd'){
	$good=request('good',array());
	$id=request('id','');
	$bid=request('bid',0);
	if(!empty($good)){
		if(empty($good['cat'])){
			show_message('系统提示','请选择所属品牌',-1);
		}
		if(empty($good['title'])){
			show_message('系统提示','请填写宝贝名称',-1);
		}
		if(empty($good['num_iid'])){
			show_message('系统提示','请填写宝贝ID',-1);
		}
		if(empty($good['pic'])){
			show_message('系统提示','请上传宝贝图片',-1);
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
		//处理时间，验证时间
		$good['start']=strtotime($good['start']);
		$good['end']=strtotime($good['end']);
		if($good['end']<=$good['start'] || $good['end']<$_timestamp){
			show_message('系统提示','活动时间有误',"-1");
		}
		//判断有没有
		if(goodCheck($good['num_iid']) && empty($good['id'])){
			show_message('系统提示','宝贝已经存在',"-1");
		}
		//计算折扣
		$good['discount']=sprintf("%.2f",$good['promotion_price']/$good['price'])*10;
		//保存
		$good['status']=1;
		goodAdd($good);
		show_message('操作成功','操作成功','?mod='.MODNAME.'&ac='.ACTNAME.'&op='.$op);
	}
	if(!empty($id)){
		$good=getgood($id);
	}elseif (!empty($bid)){
		$good['cat']=$bid;
	}
}
/* End of file goods.act.php */
/* Location: D:\website\taobaoke\jiu2\admin\mod\goods\goods.act.php */