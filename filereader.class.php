<?php 

class FileReader{
	private $fileName = array();
	protected $filePath = '';
	private $content;
	
	function __construct($fileName, $filePath ='') {
		$this->fileName = $fileName;
		if($filePath == ''){
			$filePath = $_SERVER['DOCUMENT_ROOT'];
		}
	}

	public function getContent(){
		return @json_decode(file_get_contents($this->filePath.$this->fileName,true));
	}

	
}
