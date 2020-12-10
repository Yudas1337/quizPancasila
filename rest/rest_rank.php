<?php
require_once __DIR__ . "/RestController.php";
if (isset($_POST['idUser']) && isset($_POST['skor'])) {

    $rest->restRank();
}
