<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['emailUser']) && isset($_POST['passUser'])) {

    $rest->restLogin();
}