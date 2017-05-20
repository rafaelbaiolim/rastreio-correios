<?php

require_once 'rastreio.class.php';
require_once 'filereader.class.php';

$fileReaderObj = new FileReader('codigos.json');
$codigos = $fileReaderObj->getContent();
$rastreioObj = new Rastreio($codigos);
$listRastreio = $rastreioObj->getListHtml();