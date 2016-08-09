<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

$dummyFields = [];

$fields = getFields();

foreach ($fields as $field) {
    $dummyFields[] = ['name' => $field->getName(), 'label' => $field->getLabel()];
}

echo json_encode($dummyFields);
