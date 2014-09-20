<?php

$str_content="MMC Number,Login,email,Name,Address\n";

foreach($users as $user){
	$user = $user['User'];
	$data=array($user["card_number"],$user["login"],
			$user["email"],$user["first_name"]." ".$user["last_name"],
			"\"".str_replace("\"","''",$user["address"])."\"");
	$str_content.=join(",",$data)."\n";
}

// *** DISPLAY:
// ************
header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=\"MMC_User_List.csv\"");

echo("\xef\xbb\xbf");
echo($str_content."\n");
