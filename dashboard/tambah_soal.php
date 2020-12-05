<?php
require_once __DIR__ . "/../templates/navbar.php";
$index = $init->hitung("SELECT * FROM qz_soal");
$index++;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Tambah Soal</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST" enctype="multipart/form-data">
                    <thead>
                        <tr hidden>
                            <td>Index Soal</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" readonly class="form-control" name="indexSoal" value="<?= $index ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Isi Soal</td>
                            <td>
                                <div class="form-group">

                                    <textarea type="text" name="isiSoal" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['isiSoal'] : '' ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban A</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_a" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_a'] : '' ?></textarea>
                                    <input hidden type="text" name="abjad_a" class="form-control" value="A">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban B</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_b" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_b'] : '' ?></textarea>
                                    <input hidden type="text" name="abjad_b" class="form-control" value="B">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban C</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_c" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_c'] : '' ?></textarea>
                                    <input hidden type="text" name="abjad_c" class="form-control" value="C">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jawaban D</td>
                            <td>
                                <div class="form-group">
                                    <textarea type="text" name="uraian_d" autocomplete="off" class="form-control"><?= $data = (isset($_POST['submit'])) ? $_POST['uraian_d'] : '' ?></textarea>
                                    <input hidden type="text" name="abjad_d" class="form-control" value="D">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kunci Jawaban</td>
                            <td>
                                <div class="form-group">
                                    <select name="kunci_jwb" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="A" <?= $data = (!empty($_POST['kunci_jwb']) && $_POST['kunci_jwb'] === "A") ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= $data = (!empty($_POST['kunci_jwb']) && $_POST['kunci_jwb'] === "B") ? 'selected' : '' ?>>B</option>
                                        <option value="C" <?= $data = (!empty($_POST['kunci_jwb']) && $_POST['kunci_jwb'] === "C") ? 'selected' : '' ?>>C</option>
                                        <option value="D" <?= $data = (!empty($_POST['kunci_jwb']) && $_POST['kunci_jwb'] === "D") ? 'selected' : '' ?>>D</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Soal</td>
                            <td>
                                <div class="form-group">

                                    <input type="number" name="nilaiSoal" class="form-control" placeholder="200" value="<?= $data = (isset($_POST['submit'])) ? $_POST['nilaiSoal'] : '' ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto Soal <p class="text-danger">* jika soal terdapat foto<br><br>Ekstensi : JPG PNG JPEG</p>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="file" name="fotoSoal" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status soal
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="radio" id="radio1" name="status" value="1" <?= $data = (!empty($_POST['status']) && $_POST['status'] === "1") ? 'checked' : '' ?>>
                                    <label for="radio1">Aktif</label>
                                    <input type="radio" id="radio2" name="status" value="0" <?= $data = (!empty($_POST['status']) && $_POST['status'] === "0") ? 'checked' : '' ?>>
                                    <label for="radio1">Tidak Aktif</label>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
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
    if ($init->tambahSoal($_POST) > 0) {
        echo "<script>alert('berhasil tambah Soal')</script>";
        echo "<script>document.location='list_soal.php'</script>";
    }
}

?>