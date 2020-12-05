<?php
require_once __DIR__ . "/../templates/navbar.php";

    $querySoal = "select * from qz_soal";
    $soal = $init->tampil($querySoal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $init->base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Font Awesome -->
    <link href="<?= $init->base_url('assets/fontawesome/css/fontawesome.css') ?>" rel="stylesheet">
    <link href="<?= $init->base_url('assets/fontawesome/css/brands.css') ?>" rel="stylesheet">
    <link href="<?= $init->base_url('assets/fontawesome/css/solid.css') ?>" rel="stylesheet">

    <title>quizPancasila | List Soal</title>
</head>
<body>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h3>:: List Soal</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Soal</th>
                <th scope="col">Kunci</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($soal as $so): ?>
                <tr>
                <th scope="row"><?= $no ?></th>
                    <td><?= $so['isiSoal'] ?></td>
                    <td><?= $so['kunci_jwb'] ?></td>
                    <td><?= $so['fotoSoal'] ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></button> |
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php $no++;endforeach ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
    
</body>
</html>

<?php
require_once __DIR__ . "/../templates/footer.php" ?>