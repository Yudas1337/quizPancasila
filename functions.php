<?php
require_once __DIR__ . "/configuration.php";

class fungsi extends Config
{
    private $Base_url = "http://localhost/quizPancasila/";
    private $ekstensi = array('jpg', 'jpeg', 'png');

    function __construct()
    {
        parent::__construct();
    }

    public function base_url($url = null)
    {
        return $this->Base_url . $url;
    }

    public function hitung($query)
    {
        $sql = $this->db->query($query);
        return $sql->num_rows;
    }

    public function logout()
    {
        $_SESSION['qz_admin'] = FALSE;
        unset($_SESSION['idAdmin']);
        unset($_SESSION['namaAdmin']);
        unset($_SESSION['username']);
        unset($_SESSION['fotoAdmin']);

        session_destroy();

        echo "<script>document.location='/quizPancasila/index.php'</script>";
    }

    public function tampil($query)
    {
        $sql = $this->db->query($query);
        $arr = array();
        while ($row = $sql->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function statusSoal($id)
    {
        $get = $this->db->query("SELECT * FROM qz_soal WHERE idSoal = '$id'")->fetch_object();
        $status = $get->statusSoal;

        ($status == 1) ? $statusBaru = 0 : $statusBaru = 1;

        header('location: ' . $this->base_url('dashboard/list_soal.php'));

        return $this->db->query("UPDATE qz_soal SET statusSoal = '$statusBaru' WHERE idSoal = '$id'");
    }
    public function tambahSoal()
    {
        $required = array("isiSoal", "uraian_a", "uraian_b", "uraian_c", "uraian_d", "kunci_jwb", "nilaiSoal", "status");

        foreach ($required as $input) {

            if (empty($_POST[$input])) {
                die("<script>alert('{$input} Tidak Boleh Kosong')</script>");
            }
        }
        $waktu = date("Y-m-d H:i:s");
        $isiSoal        = trim(htmlspecialchars($_POST['isiSoal']));
        $uraian1       = trim(htmlspecialchars($_POST['uraian_a']));
        $uraian2       = trim(htmlspecialchars($_POST['uraian_b']));
        $uraian3       = trim(htmlspecialchars($_POST['uraian_c']));
        $uraian4       = trim(htmlspecialchars($_POST['uraian_d']));
        $kunci_jwb      = trim(htmlspecialchars($_POST['kunci_jwb']));
        $nilaiSoal      = trim(htmlspecialchars($_POST['nilaiSoal']));

        $status         = trim(htmlspecialchars($_POST['status']));
        ($status == "nol") ? $status = 0 : $status = 1;

        if (!empty($_FILES['fotoSoal']['name'])) {
            $fotoSoal = time() . $_FILES['fotoSoal']['name'];
            $path_foto = $_FILES['fotoSoal']['tmp_name'];
            $pecah = explode(".", $fotoSoal);
            $end = strtolower(end($pecah));

            if (in_array($end, $this->ekstensi)) {
                move_uploaded_file($path_foto, "../assets/img/soal/" . $fotoSoal);
                $this->db->query("INSERT INTO qz_soal VALUES(NULL,'$isiSoal','$uraian1','$uraian2','$uraian3','$uraian4','$kunci_jwb','$fotoSoal','$nilaiSoal','$status','$waktu') ");
            } else {
                echo "<script>('Ekstensi Gambar Tidak Valid')</script>";
            }
        } else {
            $this->db->query("INSERT INTO qz_soal VALUES(NULL,'$isiSoal','$uraian1','$uraian2','$uraian3','$uraian4','$kunci_jwb',NULL,'$nilaiSoal','$status','$waktu') ");
        }

        return true;
    }

    public function editSoal($id)
    {


        $required = array("isiSoal", "uraian_a", "uraian_b", "uraian_c", "uraian_d", "kunci_jwb", "nilaiSoal", "status");

        foreach ($required as $input) {

            if (empty($_POST[$input])) {
                die("<script>alert('{$input} Tidak Boleh Kosong')</script>");
            }
        }
        $waktu = date("Y-m-d H:i:s");
        $isiSoal        = trim(htmlspecialchars($_POST['isiSoal']));
        $uraian1       = trim(htmlspecialchars($_POST['uraian_a']));
        $uraian2       = trim(htmlspecialchars($_POST['uraian_b']));
        $uraian3       = trim(htmlspecialchars($_POST['uraian_c']));
        $uraian4       = trim(htmlspecialchars($_POST['uraian_d']));
        $kunci_jwb      = trim(htmlspecialchars($_POST['kunci_jwb']));
        $nilaiSoal      = trim(htmlspecialchars($_POST['nilaiSoal']));
        $status         = trim(htmlspecialchars($_POST['status']));
        ($status == "nol") ? $status = 0 : $status = 1;


        if (!empty($_FILES['fotoSoal']['name'])) {
            $fotoSoal = time() . $_FILES['fotoSoal']['name'];
            $path_foto = $_FILES['fotoSoal']['tmp_name'];
            $pecah = explode(".", $fotoSoal);
            $end = strtolower(end($pecah));

            if (in_array($end, $this->ekstensi)) {
                $query = $this->db->query("SELECT * FROM qz_soal WHERE idSoal = '$id' ")->fetch_object();
                $foto_lama = $query->fotoSoal;
                move_uploaded_file($path_foto, "../assets/img/soal/" . $fotoSoal);
                if ($foto_lama !== "noimage.jpg") {
                    unlink("../assets/img/soal/" . $foto_lama);
                }
                $this->db->query("UPDATE qz_soal SET opsi_a = '$uraian1' , opsi_b = '$uraian2' , opsi_c = '$uraian3' , opsi_d = '$uraian4',isiSoal = '$isiSoal', kunci_jwb = '$kunci_jwb' , fotoSoal = '$fotoSoal' , nilaiSoal = '$nilaiSoal' , statusSoal = '$status' , created_at = '$waktu' WHERE idSoal = '$id'");
            } else {
                echo "<script>('Ekstensi Gambar Tidak Valid')</script>";
            }
        } else {
            $this->db->query("UPDATE qz_soal SET opsi_a = '$uraian1' , opsi_b = '$uraian2' , opsi_c = '$uraian3' , opsi_d = '$uraian4', isiSoal = '$isiSoal', kunci_jwb = '$kunci_jwb' , nilaiSoal = '$nilaiSoal' , statusSoal = '$status' , created_at = '$waktu' WHERE idSoal = '$id'");
        }

        return true;
    }
}

$init = new fungsi();
