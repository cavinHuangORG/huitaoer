<?php
	/*手机特惠*/
	$callback=$_GET['callback'];
	$iid=$_GET['iid'];
	include 'TopSdk.php';
	date_default_timezone_set('Asia/Shanghai');
	$client = new TopClient('23186030','f2b26e5abf86138af5dea4dc217ac927');
	$req = new TaeItemsListRequest;
	$client->format='json';
	$req->setFields('price');
	$req->setNumIids($iid);
	$wap_price = $client->execute($req);
	/*图片列表*/
	$req = new TaeItemDetailGetRequest;
	$req->setFields('itemInfo');
	$req->setOpenIid($wap_price['items']['x_item'][0]['open_iid']);
	$pics = $client->execute($req);
	$retdata=array(
		'pic'=>$pics['data']['item_info']['pics']['string'][0],
		'pics'=>$pics['data']['item_info']['pics']['string'],
		'price_wap'=>$wap_price['items']['x_item'][0]['price_wap']
	);
	echo $callback.'('.json_encode($retdata).')';
?>