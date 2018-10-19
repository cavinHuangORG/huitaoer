<?php
/**
 * 值得买模型
 * @authors yehao (1002142102@qq.com)
 * @date    2015-08-27 17:09:42
 * @version $Id$
 */
class mod_worth{
	/**
	 * [worth_list 主题列表]
	 * @param  array   $where [查询条件]
	 * @param  string  $order [排序字段]
	 * @param  integer $start [开始记录位置]
	 * @param  integer  $size  [数据行数]
	 * @return array         [返回主题列表]
	 */
	public static function worth_list($where,$order='start desc',$start=0,$size=PAGE)
	{
		global $_webset,$_timestamp;
		//组合条件
		$intkeys=array();
		$strkeys=array();
		$randkeys=array();
		$likekeys=array('title'=>'keyword','descr'=>'keyword');
		$search=getwheres($intkeys,$strkeys,$randkeys,$likekeys,'');
		//处理条件
		isset($search['wherearr']['time'])?$where[]=$search['wherearr']['time']:'';
		//处理条件
		!empty($where)?$wherestr[]='('.implode(' AND ',$where).')':'';
		unset($where);		
		isset($search['wherearr']['title'])?$wherestr[]=$search['wherearr']['title']:'';
		isset($search['wherearr']['desc'])?$wherestr[]=$search['wherearr']['descr']:'';
		isset($search['wherearr']['start'])?$wherestr[]=$search['wherearr']['start']:'';
		$wherestr=!empty($wherestr)?implode(' AND ',$wherestr):'1';
		$sql='select SQL_CALC_FOUND_ROWS * from '.tname('worth')." where $wherestr order by $order limit ".$start*$size.",$size";//读取数据
		lib_database::rquery($sql);
		$data=array();
		while($row=lib_database::fetch_one())
		{
			$data[]=$row;
		}
		$output = array();
		$total=lib_database::get_one('SELECT FOUND_ROWS() as rows');//计算行数
		$output['total'] = $total['rows'];
		$output['data'] = $data;
		//分页url
		$urls=array();
		foreach ($search['urls'] as $key=>$value){
			$url=explode('=',$value);
			$urls[$url[0]]=$url[1];
		}
		$output['urls'] = $urls;
		$output['url']=implode('&',$search['urls']);
		$output['url']=!empty($output['url'])?'&'.$output['url']:'';
		return $output;
	}

	/**
	 * [get_worth 根据主题id获取主题数据]
	 * @param  integer $wid [主题id]
	 * @return array       [主题数据]
	 */
	public static function get_worth($wid=0)
	{
		$sql='select * from '.tname('worth').' where wid=\''.$wid.'\'';
		return lib_database::get_one($sql);
	}

	/**
	 * [add_worth 添加主题]
	 * @param array $worth [主题数据]
	 */
	public static function add_worth($worth=array())
	{
		if($worth['wid']!='')
		{
			$where='wid='.$worth['wid'];
			unset($worth['wid']);
			return lib_database::update('worth',$worth,$where);
		}
		else
		{
			unset($worth['wid']);
			return lib_database::insert('worth',array_keys($worth),$worth);
		}
	}
	/**
	 * [add_worth 删除主题]
	 * @param int $worth [影响的行数]
	 */
	public static function del_worth($wid=0)
	{
		//删除图片
		lib_database::rquery('select pic from '.tname('worth').' where wid in ('.$wid.')');
		while ($value=lib_database::fetch_one()){
			if(!empty($value['pic']) && check_img($value['pic'])){
				@unlink(PATH_ROOT.$value['pic']);
				@unlink(PATH_ROOT.$value['pic'].'_290x190.jpg');
			}
		}
		if(is_array($wid))
		{
			$where='wid in('.implode(',', $wid).')';
		}
		else
		{
			$where='wid='.$wid;
		}
		return lib_database::delete('worth',$where);
	}

	/**
	 * [add_worth 删除主题商品]
	 * @param int $worth [影响的行数]
	 */
	public static function del_goods($id=0)
	{
		//删除图片
		lib_database::rquery('select pic from '.tname('goods').' where id in ('.$id.')');
		while ($value=lib_database::fetch_one()){
			if(!empty($value['pic']) && check_img($value['pic'])){
				@unlink(PATH_ROOT.$value['pic']);
				@unlink(PATH_ROOT.$value['pic'].'_290x190.jpg');
			}
		}
		if(is_array($id))
		{
			$where='id in('.implode(',', $id).')';
		}
		else
		{
			$where='id='.$id;
		}
		return lib_database::delete('goods',$where);
	}

	/**
	 * [get_worth 根据主题id获取商品数据]
	 * @param  integer $wid [主题id]
	 * @return array       [商品数据]
	 */
	public static function get_goods($wid=0)
	{
		$sql='select * from '.tname('goods').' where wid='.$wid.' order by sort ASC';
		$query = lib_database::rquery($sql);
		$data=array();
		while ($rt = lib_database::fetch_one())
		{
			$data[] = $rt;
		}
		return $data;
	}

}