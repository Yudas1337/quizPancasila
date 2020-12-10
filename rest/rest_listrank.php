<?php
require_once __DIR__ . "/RestController.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $rest->rest_listrank();
}
