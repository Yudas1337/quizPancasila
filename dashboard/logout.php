<?php

require_once __DIR__ . "/../functions.php";

if (isset($_SESSION['qz_admin'])) {

    $init->logout();
} else {
    echo "<script>alert('anda tidak punya akses!')</script>";
    exit;
}
