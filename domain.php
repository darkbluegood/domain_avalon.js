<?

	$soucedata = file_get_contents('http://pandavip.www.net.cn/check/check_ac1.cgi?domain='.$_GET['domain'].'.'.$_GET['type']);

	$soucedata1 = substr($soucedata,2,-3);

	$newdata = explode("|",$soucedata1);

	if($newdata[3] == "Domain name is available"){
		$newdata[3] = "未注册!!!!!!";
		$newdata[4] = "green";
	}

	if($newdata[3] == "Domain name is invalid"){
		$newdata[3] = "无效的!!!!";
		$newdata[4] = "red";
	}

	if($newdata[3] == "Domain name is not available cachehit" || $newdata[3] == "Domain name is not available" || $newdata[3] == "Domain exists" || $newdata[3] == "In Use"){
		$newdata[3] = "已注册!";
		$newdata[4] = "red";
	}

	if(stripos($newdata[3],"Error in response from Server")){
		$newdata[3] = "请求超时!!!";
		$newdata[4] = "red";
	}

	echo json_encode($newdata);


?>
