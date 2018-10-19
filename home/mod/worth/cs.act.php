<?php 
	
	phpinfo();
	error_reporting(E_ALL);

	echo "string";
	$opts = array('http' => array('method'=>'GET',
	'header'=>"User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0\r\n".
	"Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8\r\n".
	"Accept-Encoding:gzip, deflate, sdch Accept-Language:zh-CN,zh;q=0.8\r\n".
	"Pragma:no-cache\r\n".
	"Cache-Control:no-cache\r\n".
	"Connection:keep-alive\r\n".
	"Cookie:1c868293e34fc605f34bbc19444e1873\r\n" ));
	print_r($opts);
	$context = stream_context_create($opts); 
	$data = file_get_contents('https://rate.taobao.com/feedRateList.htm?callback=&userNumId=214607717&auctionNumId=520062001813&currentPageNum=1', false, $context); 
	echo $data; 
	exit;

// //curl请求函数
// function curl($url, $postFields = null)
// {
// 	if(!function_exists('curl_init')){
// 		exit('php.ini php_curl must is Allow! ');
// 	}
//https://rate.taobao.com/feedRateList.htm?callback=&userNumId=214607717&auctionNumId=520062001813&currentPageNum=1
// 	$ch = curl_init();
// 	$headers=array();
// 	$headers[]='User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0';
// 	$headers[]='Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
// 	$headers[]='Accept-Encoding:gzip, deflate, sdch';
// 	$headers[]='Accept-Language:zh-CN,zh;q=0.8';
// 	$headers[]='Pragma:no-cache';
// 	$headers[]='Cache-Control:no-cache';
// 	$headers[]='Connection:keep-alive';

// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// 	curl_setopt($ch, CURLOPT_URL, $url);
// 	curl_setopt($ch, CURLOPT_HEADER, false);
// 	curl_setopt($ch, CURLOPT_FAILONERROR, true);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	//ssl
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	// curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'TLSv1');
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
	// curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
	// curl_setopt($ch, CURLOPT_COOKIE,'cookie2=1c868293e34fc605f34bbc19444e1873');
// 	if (is_array($postFields) && 0 < count($postFields))
// 	{
// 		$postBodyString = "";
// 		foreach ($postFields as $k => $v)
// 		{
// 			$postBodyString .= "$k=" . urlencode($v) . "&";
// 		}
// 		unset($k, $v);
// 		curl_setopt($ch, CURLOPT_POST, true);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
// 	}
// 	curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate,sdch');
// 	$reponse = curl_exec($ch);
// 	if ($reponse === false){
// 		exit(curl_error($ch));
// 	}
// 	else{
// 		$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// 		if (200 !== $httpStatusCode){
// 			exit($reponse.'&nbsp;code:'.$httpStatusCode);
// 		}
// 	}
// 	curl_close($ch);
// 	return $reponse;
// }
// 	function get_taobao_comment($type,$iid,$sid=0){
// 	//$contentarr=get_cache('goods','taobao_comment_'.$iid);
// 	if(empty($contentarr)){
// 		$contentarr=array('total'=>0,'list'=>array());
// 		if($type=='tmall'){
// 			$url='https://rate.tmall.com/list_detail_rate.htm?itemId='.$iid.'&sellerId='.$sid.'&currentPage=1&content=1&callback=';
// 		}elseif ($type=='taobao'){
// 			//判断有无sid
// 			if(empty($sid)){
// 				$sid=get_seller_id($iid);
// 			}
// 			if(empty($sid)){
// 				return $contentarr;
// 			}
// 			$url='https://rate.taobao.com/feedRateList.htm?callback=&userNumId='.$sid.'&auctionNumId='.$iid.'&currentPageNum=1';
// 			$url2='https://orate.alicdn.com/detailCommon.htm?callback=&userNumId='.$sid.'&auctionNumId='.$iid;
// 			//计算总数
// 			$totalcontent=curl($url2);
// 			$totalcontent=iconv('gbk','utf-8',$totalcontent);
// 			preg_match('/\((.*?)\)/',$totalcontent,$totaldata);
// 			$totalcontent=$totaldata[1];
// 			$totalcontent=json_decode($totalcontent,true);
// 			if(isset($totalcontent['data']['count']['total'])){
// 				$contentarr['total']=$totalcontent['data']['count']['total'];
// 			}
// 			if(empty($contentarr['total'])){
// 				return $contentarr;
// 			}
// 		}
// 		$content=curl($url);
// 		if(!function_exists('iconv')){
// 			exit('iconv is not found');
// 		}
// 		$content=iconv('gbk','utf-8',$content);
// 		if($type=='taobao'){
// 			preg_match('/\((.*?)\)/',$content,$data);
// 			$content=$data[1];
// 		}else{
// 			$content='{'.$content.'}';
// 		}
// 		$content=json_decode($content,true);
// 		if($type=='tmall' && isset($content['rateDetail']['rateList']) && !empty($content['rateDetail']['rateList']) && is_array($content['rateDetail']['rateList'])){
// 			$contentarr['total']=$content['rateDetail']['rateCount']['total'];
// 			foreach ($content['rateDetail']['rateList'] as $key=>$value){
// 				preg_match('/b_(.*?_\d+)\.gif/',$value['displayRatePic'],$RateSum);
// 				$contentarr['list'][]=array(
// 				'UserNick'=>$value['displayUserNick'],
// 				'Content'=>$value['rateContent'],
// 				'Date'=>$value['rateDate'],
// 				'RateSum'=>$RateSum[1],
// 				'tamllSweetLevel'=>$value['tamllSweetLevel'],
// 				);
// 			}
// 		}elseif ($type=='taobao' && isset($content['comments']) && !empty($content['comments']) && is_array($content['comments'])){
// 			foreach ($content['comments'] as $key=>$value){
// 				preg_match('/b_(.*?_\d+)\.gif/',$value['user']['displayRatePic'],$RateSum);
// 				$contentarr['list'][]=array(
// 				'UserNick'=>$value['user']['nick'],
// 				'Content'=>$value['content'],
// 				'Date'=>$value['date'],
// 				'RateSum'=>$RateSum[1],
// 				'tamllSweetLevel'=>0,
// 				);
// 			}
// 		}
// 		set_cache('goods','taobao_comment_'.$iid,$contentarr);
// 	}
// 	return $contentarr;
// }

?>