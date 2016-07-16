<?php
	$dummyFields = 	[
						['name' => 'name', 'label' => 'first name'],
						['name' => 'surname', 'label' => 'surname'],
						['name' => 'email', 'label' => 'email address']
					];
	
	echo json_encode($dummyFields);