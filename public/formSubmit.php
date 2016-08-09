<?php

require_once dirname(__FILE__) . '/../src/bootstrap.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $controller = new \webdev\src\ContactController($_POST);
        $id = $controller->contact();
        if (!$id) {
            throw new Exception("Can't save contact!");
        }
        else {
            echo json_encode(['status' => 'OK', 'id' => $id]);
        }
    }
} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo json_encode(['FAIL', $e->getMessage()]);
}
