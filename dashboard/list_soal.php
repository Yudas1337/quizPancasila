<?php
require_once __DIR__ . "/../templates/navbar.php";

    $querySoal = "select * from qz_soal";
    $soal = $init->tampil($querySoal);

    if (isset($_POST['submit'])) {
        echo $data = ($init->statusSoal($_POST) > 0) ? '' : '';
    }
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
    <link rel="stylesheet" type="text/css" href="<?= $init->base_url('assets/plugins/datatables2/css/dataTables.bootstrap4.css') ?>" />
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
                <a class="btn btn-success btn-sm" href="<?= $init->base_url('dashboard/tambah_soal.php') ?>"><i class="fas fa-plus"></i> Tambah</a>
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
                        <?php
                        if($so['status'] == 1){
                            echo '<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalStatus"><i class="fas fa-eye-slash"></i></button>';
                        }else{
                            echo '<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modalStatus"><i class="fas fa-eye"></i></button>';
                        }
                        ?>
                    </td>
                </tr>

                <!-- Modal -->
                    <div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form method="POST" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Soal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <input type="hidden" name="idSoal" value="<?= $so['idSoal']?>">
                                <input type="hidden" name="status" value="<?= $so['status']?>">
                                <?php
                                if($so['status'] == 1){
                                    echo 'Apakah anda ingin menyembunyikan soal ini ?';
                                }else{
                                    echo 'Apakah anda ingin menampilkan soal ini ?';
                                }
                                ?>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="submit" name="submit" class="btn btn-primary">Ya</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                    </div>
                <!-- End Modal -->
                <?php $no++;endforeach ?>
            </tbody>
            
            </div>
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

            // Modal
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
    </script>
    <!-- End Data Tables -->

</body>

</html>

<?php
require_once __DIR__ . "/../templates/footer.php" ?>