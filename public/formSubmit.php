<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

//get current config
$config = load_config();
//load db config
load_propel_config(getenv('ENVIRONMENT'));

try {
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$controller = new \webdev\src\ContactController($_POST);
		if(!$controller->contact()){
			throw new Exception("Can't save contact!");
		}
		echo json_encode(['OK']);
	}
}
catch (Exception $e){
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	echo json_encode(['FAIL', $e->getMessage()]);
}
