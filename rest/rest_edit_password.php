<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['passUser']) && isset($_POST['idUser'])) {

    $rest->restEditPassword();
}