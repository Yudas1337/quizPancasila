<?php
require_once __DIR__ . "/configuration.php";

class fungsi extends Config
{
    private $Base_url = "http://localhost/quizPancasila/";
    private $ekstensi = array('jpg', 'jpeg', 'png', 'gif', 'svg');

    function __construct()
    {
        parent::__construct();
    }

    public function base_url($url = null)
    {
        return $this->Base_url . $url;
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

    public function statusSoal()
    {
        $idSoal = $_POST['idSoal'];
        $status = $_POST['status'];

        ($status == 1) ? $statusBaru = 0 : $statusBaru = 1;

        $sql = "update qz_soal set status='{$statusBaru}' where idSoal='{$idSoal}'";
        $this->db->query($sql);

        header('location: '.$this->base_url('dashboard/list_soal.php'));
    }
}

$init = new fungsi();
