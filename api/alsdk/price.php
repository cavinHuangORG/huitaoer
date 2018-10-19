<?php
	/*获取淘宝手机端优惠*/
	$callback=$_GET['callback'];
	$iid=$_GET['iid'];
	include "TopSdk.php";
	$client = new TopClient("23186030","f2b26e5abf86138af5dea4dc217ac927");
	$req = new TaeItemsListRequest;
	$client->format='json';
	$req->setFields('price');
	$req->setNumIids($iid);
	$resp = $client->execute($req);
	echo $callback.'('.$resp['items']['x_item'][0]['price_wap'].')';
?>