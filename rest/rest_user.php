<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['idUser'])) {

    $rest->restUser();
}