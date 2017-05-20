<?php

require_once 'filereader.class.php';
$resp = array("ok" => false);
$postdata = file_get_contents("php://input");

if(empty($postdata)){
	echo json_encode($resp);
	exit;
}

$request = json_decode($postdata,true);

foreach($request as $codigo => $tag){
	if($request[$codigo] == null){
		unset($request[$codigo]);
	}
}

$fileReaderObj = new FileReader('codigos.json');
$result = $fileReaderObj->updateContent(json_encode($request,JSON_PRETTY_PRINT));
if($result){
	$resp["ok"] = true;
}

echo json_encode($resp);
