<?php

require_once 'rastreio.class.php';
require_once 'filereader.class.php';

$fileReaderObj = new FileReader('codigos.json');
$codigos = $fileReaderObj->getContent();
$rastreioObj = new Rastreio($codigos);
$listRastreio = $rastreioObj->getListHtml();
$resp = array();
$resp['html'] = $listRastreio;
$resp['ok'] = true;
echo json_encode($resp);