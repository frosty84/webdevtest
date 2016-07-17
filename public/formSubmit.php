<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

//get current config
$config = load_config();
//load db config
load_propel_config(getenv('ENVIRONMENT'));

try {
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$contact = new \db\Contact();
		if(!empty($_POST['name'])){
			$contact->setName($_POST['name']);
		}
		if(!empty($_POST['surname'])) {
			$contact->setSurname($_POST['surname']);
		}
		if(!empty($_POST['email'])){
			$contact->setEmail($_POST['email']);
		}
		$contact->setCreatedAt(date("Y-m-d H:i:s"));
		$contact->save();
		echo json_encode(['OK']);
	}
}
catch (Exception $e){
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	echo json_encode(['FAIL', $e->getMessage()]);
}
