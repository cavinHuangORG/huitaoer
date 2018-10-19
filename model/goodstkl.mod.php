<?php
/**
 * 商品淘口令模型
 * @authors wangchaun (214328307@qq.com)
 * @date    2016-12-22 10:25:00
 * @version $Id$
 */
class mod_goodstkl{
	/**
	 * [get_goodstkl 根据iid获取淘口令数据]
	 * @param  integer $iid [商品iid]
	 */
	public static function get_goodstkl($iid)
	{
		$sql='select * from '.tname('goods_tkl').' where iid='.$iid;
		return lib_database::get_one($sql);
	}

	/**
	 * [add_goodstkl 添加淘口令]
	 * @param array $data [数据]
	 */
	public static function add_goodstkl($data=array())
	{
		if($data['id']!='')
		{
			$where='id='.$data['id'];
			unset($data['id']);
			return lib_database::update('goods_tkl',$data,$where);
		}
		else
		{
			unset($data['id']);
			return lib_database::insert('goods_tkl',array_keys($data),$data);
		}
	}
}