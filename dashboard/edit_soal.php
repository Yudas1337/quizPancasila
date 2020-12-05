<?php
require_once __DIR__ . "/../templates/navbar.php";
if (isset($_GET['idSoal'])) {
    $idSoal = abs(intval($_GET['idSoal']));
    $query = "SELECT * FROM qz_soal WHERE idSoal = '$idSoal'";
    $cek = $init->tampil($query)[0];
    $num = $init->hitung($query);
    if ($num < 1) {
        echo "<script>alert('data tidak valid')</script>";
        echo "<script>document.location='index.php'</script>";
        exit;
    }
    $query2 = "SELECT * FROM qz_jawaban WHERE idSoal = '$idSoal'";
    $jawaban_a = $init->tampil($query2)[0];
    $jawaban_b = $init->tampil($query2)[1];
    $jawaban_c = $init->tampil($query2)[2];
    $jawaban_d = $init->tampil($query2)[3];
} else {
    echo "<script>alert('parameter tidak valid')</script>";
    echo "<script>document.location='index.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Edit Soal</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST" enctype="multipart/form-data">
                    <thead>
                        <tr>
                            <td>Isi Soal</td>
                            <td>
                                <div class="form-group">

                                    <textarea type="text" name="isiSoal" autocomplete="off" class="form-control"><?= $cek['isiSoal'] ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban A</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_a" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_a'] : $jawaban_a['uraian'] ?></textarea>
                                    <input hidden type="text" name="abjad_a" class="form-control" value="A">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban B</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_b" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_b'] : $jawaban_b['uraian'] ?></textarea>
                                    <input hidden type="text" name="abjad_b" class="form-control" value="B">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban C</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_c" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_c'] : $jawaban_c['uraian'] ?></textarea>
                                    <input hidden type="text" name="abjad_c" class="form-control" value="C">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban D</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_d" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_d'] : $jawaban_d['uraian'] ?></textarea>
                                    <input hidden type="text" name="abjad_d" class="form-control" value="D">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kunci Jawaban</td>
                            <td>
                                <div class="form-group">
                                    <select name="kunci_jwb" class="form-control">
                                        <?php $kunci = $cek['kunci_jwb']; ?>
                                        <option value="A" <?= $data = ($cek == "A") ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= $data = ($cek == "B") ? 'selected' : '' ?>>B</option>
                                        <option value="C" <?= $data = ($cek == "C") ? 'selected' : '' ?>>C</option>
                                        <option value="D" <?= $data = ($cek == "D") ? 'selected' : '' ?>>D</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Soal</td>
                            <td>
                                <div class="form-group">

                                    <input type="number" name="nilaiSoal" class="form-control" placeholder="200" value="<?= $cek['nilaiSoal']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto Soal <p class="text-danger">* jika soal terdapat foto<br><br>Ekstensi : JPG PNG JPEG</p>
                            </td>
                            <td>
                                <div class="form-group">
                                    <?php if (!$cek['fotoSoal']) : ?>
                                        <img src="<?= $init->base_url('assets/img/noimage.jpg') ?>" width="200" height="200"></ <?php endif; ?> <?php if ($cek['fotoSoal']) : ?> <img src="<?= $init->base_url('assets/img/soal/' . $cek['fotoSoal']) ?>" width="200" height="200">
                                    <?php endif; ?>
                                    <br><br>
                                    <input type="file" name="fotoSoal" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status soal
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="radio" id="radio1" name="status" value="1" <?= $data = ($cek['status'] === "1") ? 'checked' : '' ?>>
                                    <label for="radio1">Aktif</label>
                                    <input type="radio" id="radio2" name="status" value="0" <?= $data = ($cek['status'] === "0") ? 'checked' : '' ?>>
                                    <label for="radio1">Tidak Aktif</label>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
                            </td>
                        </tr>
                    </thead>
                </form>

            </table>
        </div>
    </div>

</body>

</html>

<?php
require_once __DIR__ . "/../templates/footer.php";

if (isset($_POST['submit'])) {
    if ($init->editSoal($_POST) > 0) {
        echo "<script>alert('berhasil Edit Soal')</script>";
        echo "<script>document.location='list_soal.php'</script>";
    }
}

?>