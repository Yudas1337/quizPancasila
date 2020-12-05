<?php
require_once __DIR__ . "/../functions.php";

if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda tidak punya akses!')</script>";
    echo "<script>document.location='/quizPancasila/index.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $init->base_url('assets/css/bootstrap.min.css') ?>">
</head>
<header>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <a href="<?= $init->base_url('dashboard/') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                Master
            </a>
            <div class="dropdown-menu">
                <a href="<?= $init->base_url('dashboard/siswa.php') ?>" class="dropdown-item">Data Soal</a>
            </div>
            <div class="dropdown-menu">
                <a href="<?= $init->base_url('dashboard/siswa.php') ?>" class="dropdown-item">Data Admin</a>
            </div>
        </li>

        <li class="nav-item">
            <a href="<?= $init->base_url('dashboard/logout.php') ?>" class="nav-link" onclick="return confirm('apa yakin akan logout?')">Logout</a>
        </li>

    </ul>


</header>

<body>