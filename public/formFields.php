<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

$dummyFields = [
    ['name' => 'name', 'label' => 'first name'],
    ['name' => 'surname', 'label' => 'surname'],
    ['name' => 'email', 'label' => 'email address']
];

echo json_encode($dummyFields);
