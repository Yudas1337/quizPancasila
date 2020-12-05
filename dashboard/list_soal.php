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

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('assets/plugins/datatables2/css/dataTables.bootstrap4.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('assets/plugins/fixedheader/css/fixedHeader.bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('assets/plugins/responsive/css/responsive.bootstrap.min.css') ?>">
    <!-- End Datatables -->

    <title>quizPancasila | List Soal</title>
</head>
<body>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h3>:: List Soal</h3>
        </div>
        <div class="col-md-4 text-right">
            <button class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> Tambah</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Soal</th>
                <th scope="col">Kunci</th>
                <th scope="col">Nilai</th>
                <th scope="col">Status</th>
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
                    <td><?= $so['nilaiSoal'] ?></td>
                    <td>
                        <?php if($so['status'] == 1){
                            echo '<span class="badge badge-success">Aktif</span>';
                        }else{
                            echo '<span class="badge badge-danger">Non-aktif</span>';
                        } ?>
                    </td>
                    <td><img src="<?= $init->base_url('assets/img/soal/'.$so['fotoSoal']) ?>" alt=""></td>
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

    <!-- Bootstrap -->
    <script src="<?= $init->base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Data Tables -->
    <script type="text/javascript" src="<?= $init->base_url('assets/plugins/datatables2/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= $init->base_url('assets/plugins/datatables2/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/plugins/fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/plugins/responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/plugins/responsive/js/responsive.bootstrap.min.js') ?>"></script>

    <script>
            // Datatable
            var table = $('#datatable').DataTable( {
                responsive: true
            });
            new $.fn.dataTable.FixedHeader( table );
    </script>
    <!-- End Data Tables -->
    
</body>
</html>

<?php
require_once __DIR__ . "/../templates/footer.php" ?>