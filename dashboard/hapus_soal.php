<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['idSoal'])) {
    $id = abs(intval($_GET['idSoal']));
    $hitung = $init->hitung("SELECT * FROM qz_soal WHERE idSoal = '$id'");
    if ($hitung > 0) {
        echo $data = ($init->statusSoal($id)) ? '' : '';
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='list_soal.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='list_soal.php'</script>";
    exit;
}
