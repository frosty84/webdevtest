<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

//get current config
$config = load_config();
//load db config
load_propel_config(getenv('ENVIRONMENT'));

	$dummyFields = 	[
						['name' => 'name', 'label' => 'first name'],
						['name' => 'surname', 'label' => 'surname'],
						['name' => 'email', 'label' => 'email address']
					];
	
	echo json_encode($dummyFields);
