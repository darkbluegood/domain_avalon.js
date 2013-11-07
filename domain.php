<?

	//$soucedata = file_get_contents('http://pandavip.www.net.cn/check/check_ac1.cgi?domain='.$_GET['domain'].'.com');
//$soucedata = file_get_contents('http://pandavip.www.net.cn/check/check_ac1.cgi?domain='.$_GET['domain'].'.net');
	$soucedata = file_get_contents('http://pandavip.www.net.cn/check/check_ac1.cgi?domain='.$_GET['domain'].'.cn');

	$soucedata1 = substr($soucedata,2,-3);

	$newdata = explode("|",$soucedata1);

	if($newdata[3] == "Domain name is available"){
		$newdata[3] = "未注册!!!!!!";
		$newdata[4] = "green";
	}

	if($newdata[3] == "Domain name is not available cachehit" || $newdata[3] == "Domain name is not available"){
		$newdata[3] = "已注册!";
		$newdata[4] = "red";
	}

	echo json_encode($newdata);


?>