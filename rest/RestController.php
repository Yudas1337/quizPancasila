<?php
require_once __DIR__ . "/../configuration.php";
class RestController extends Config
{

    function __construct()
    {
        parent::__construct();
    }

    public function restSoal()
    {
        $sql = $this->db->query("SELECT * FROM qz_soal WHERE statusSoal = 1 ORDER BY rand()");
        $sql2 = $this->db->query("SELECT * FROM qz_jawaban JOIN qz_soal ON qz_jawaban.idSoal = qz_soal.idSoal WHERE qz_soal.statusSoal = 1");
        $arr_soal = array();
        $arr_jawaban = array();
        while ($data = $sql->fetch_object()) {
            array_push($arr_soal, array(
                'idSoal' => $data->idSoal,
                'isiSoal' => $data->isiSoal,
                'kunci_jwb' => $data->kunci_jwb,
                'fotoSoal' => (!$data->fotoSoal) ? '' : $data->fotoSoal,
                'nilaiSoal' => $data->nilaiSoal,
                'statusSoal' => $data->statusSoal
            ));
        }

        while ($data = $sql2->fetch_object()) {
            array_push($arr_jawaban, array(
                'idJawaban' => $data->idJawaban,
                'idSoal'    => $data->idSoal,
                'uraian'    => $data->uraian,
                'abjad'     => $data->abjad
            ));
        }

        echo json_encode(array(
            'value'     => 1,
            'question'  => $arr_soal,
            'answer'    => $arr_jawaban
        ));

        $this->db->close();
    }

    public function restDaftar()
    {
        $waktu = date("Y-m-d H:i:s");
        $response = array("isError" => FALSE);
        $avatar = array('avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png');

        $namaUser       = trim(htmlspecialchars($_POST['namaUser']));
        $emailUser      = trim(htmlspecialchars($_POST['emailUser']));
        $hpUser         = trim(htmlspecialchars($_POST['hpUser']));
        $passUser       = trim(htmlspecialchars($_POST['passUser']));

        $hitungpass = strlen($passUser);
        $rand_avatar = array_rand($avatar);

        if ($hitungpass < 6) {
            $response["isError"]   = TRUE;
            $response["message"]   = "Password Minimal 6 Karakter";
            echo json_encode($response);
        } else {
            $encrypt_password = password_hash($passUser, PASSWORD_DEFAULT);

            $sql    = $this->db->query("SELECT emailUser from qz_user WHERE emailUser = '$emailUser'")->num_rows;

            if ($sql > 0) {
                $response["isError"]   = TRUE;
                $response["message"]   = "Akun Telah Terdaftar";

                echo json_encode($response);
            } else {

                $this->db->query("INSERT INTO qz_user VALUES (NULL,'$namaUser','$hpUser','$emailUser','$encrypt_password','$avatar[$rand_avatar]','$waktu','$waktu',NULL,'1')");

                $response["value"]   = 1;
                $response["isError"] = FALSE;
                $response["message"] = "Berhasil Daftar Akun!";

                echo json_encode($response);
            }
        }



        $this->db->close();
    }

    public function restLogin()
    {
        $response = array("isError" => FALSE);

        $emailUser      = trim(htmlspecialchars($_POST['emailUser']));
        $passUser       = trim(htmlspecialchars($_POST['passUser']));

        // sanitize sql injection
        $emailUser = $this->db->real_escape_string($emailUser);
        $passUser  = $this->db->real_escape_string($passUser);

        $sql = $this->db->query("SELECT * FROM qz_user WHERE emailUser = '$emailUser'");
        $hitung = $sql->num_rows;
        $fetch = $sql->fetch_object();

        if ($hitung > 0) {

            if (password_verify($passUser, $fetch->passUser)) {

                $response["isError"] = FALSE;
                $response["message"] = "Berhasil Login Akun!";

                $response["namaUser"] = $fetch->namaUser;
                $response["idUser"] = $fetch->idUser;

                echo json_encode($response);
            } else {
                $response["isError"]   = TRUE;
                $response["message"]   = "Email atau Password tidak cocok !";


                echo json_encode($response);
            }
        } else {

            $response["isError"]   = TRUE;
            $response["message"]   = "Akun tidak Ditemukan !";


            echo json_encode($response);
        }
    }
}

$rest = new RestController;
