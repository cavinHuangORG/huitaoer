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
ignore_user_abort(true); 
set_time_limit(0);
//自动采集
$fileurl=PATH_DATA.'/auto.lock';
$autotime=explode(',',$_webset['autotime']);
$H=date('H',time());
if (!empty($autotime)) {
	if ($autotime[1]<=$H&&$autotime[2]>$H) {
		if(file_exists($fileurl)){
			$rfile = fopen($fileurl, "r");
			$gathertime= fread($rfile,filesize($fileurl));
			fclose($rfile);
			if ($gathertime > (time()-($autotime[0]*60)) ) {
				echo "已采集,等待".$autotime[0]."分钟后采集!";
				die;
			}else{
				mod_autogather::setautogather($fileurl);
			}			
		}else{
			mod_autogather::setautogather($fileurl);
		}
	}	
}
die;