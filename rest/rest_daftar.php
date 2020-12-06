<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['namaUser']) && isset($_POST['hpUser']) && isset($_POST['emailUser']) && isset($_POST['passUser'])) {

    $rest->restDaftar();
}
