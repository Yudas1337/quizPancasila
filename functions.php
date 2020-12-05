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

        $indexSoal     = trim(htmlspecialchars($_POST['indexSoal']));
        $abjad1       = trim(htmlspecialchars($_POST['abjad_a']));
        $abjad2       = trim(htmlspecialchars($_POST['abjad_b']));
        $abjad3       = trim(htmlspecialchars($_POST['abjad_c']));
        $abjad4       = trim(htmlspecialchars($_POST['abjad_d']));

        $jawaban = array($abjad1 => $uraian1, $abjad2 => $uraian2, $abjad3 => $uraian3, $abjad4 => $uraian4);


        if (!empty($_FILES['fotoSoal']['name'])) {
            $fotoSoal = time() . $_FILES['fotoSoal']['name'];
            $path_foto = $_FILES['fotoSoal']['tmp_name'];
            $pecah = explode(".", $fotoSoal);
            $end = strtolower(end($pecah));

            if (in_array($end, $this->ekstensi)) {
                move_uploaded_file($path_foto, "../assets/img/soal/" . $fotoSoal);
                $this->db->query("INSERT INTO qz_soal VALUES(NULL,'$isiSoal','$kunci_jwb','$fotoSoal','$nilaiSoal','$status','$waktu') ");
            } else {
                echo "<script>
                swal('Whoopz!','Ekstensi Gambar Tidak Valid','error')</script>";
            }
        } else {
            $this->db->query("INSERT INTO qz_soal VALUES(NULL,'$isiSoal','$kunci_jwb',NULL,'$nilaiSoal','$status','$waktu') ");
        }

        foreach ($jawaban as $index => $value) {
            $this->db->query("INSERT INTO qz_jawaban VALUES(NULL,'$indexSoal','$value','$index')");
        }

        return true;
    }
}

$init = new fungsi();
