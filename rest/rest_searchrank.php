<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['search'])) {

    $rest->rest_searchrank();
}
