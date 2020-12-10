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
        $sql = $this->db->query("SELECT * FROM qz_soal WHERE statusSoal = 1 ORDER BY rand() LIMIT 20");
        $arr_soal = array();
        while ($data = $sql->fetch_object()) {
            array_push($arr_soal, array(
                'idSoal' => $data->idSoal,
                'isiSoal' => $data->isiSoal,
                'opsi_a'   => $data->opsi_a,
                'opsi_b'   => $data->opsi_b,
                'opsi_c'   => $data->opsi_c,
                'opsi_d'   => $data->opsi_d,
                'kunci_jwb' => $data->kunci_jwb,
                'fotoSoal' => (!$data->fotoSoal) ? '' : $data->fotoSoal,
                'nilaiSoal' => $data->nilaiSoal,
                'statusSoal' => $data->statusSoal
            ));
        }

        echo json_encode(array(
            'value'     => 1,
            'question'  => $arr_soal,
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

    public function restRank()
    {
        $waktu = date("Y-m-d H:i:s");
        $response = array("isError" => FALSE);

        $idUser         = trim(htmlspecialchars($_POST['idUser']));
        $skor           = trim(htmlspecialchars($_POST['skor']));

        $sql = $this->db->query("SELECT * FROM qz_rank WHERE idUser = '$idUser'");
        $fetch = $sql->fetch_object();
        $hitung = $sql->num_rows;

        if ($hitung > 0) {
            if ($skor > $fetch->skor_akhir) {
                 $this->db->query("UPDATE qz_rank SET updated_at = '$waktu' , skor_akhir = '$skor' , skor_tertinggi = '$skor' WHERE idUser = '$idUser'");
            } else {
                 $this->db->query("UPDATE qz_rank SET updated_at = '$waktu' , skor_akhir = '$skor' WHERE idUser = '$idUser'");
            }
            $response["value"]   = 1;
            $response["isError"] = FALSE;
            $response["message"] = "Berhasil Fetch Data";
            echo json_encode($response);
        } else {
             $this->db->query("INSERT INTO qz_rank VALUES (NULL,'$idUser','$skor','$skor','$waktu')");
            $response["value"]   = 1;
            $response["isError"] = FALSE;
            $response["message"] = "Berhasil Fetch Data";
            echo json_encode($response);
        }
    }
    
    public function restUser()
    {
        $response = array("isError" => FALSE);
        
        $idUser         = trim(htmlspecialchars($_POST['idUser']));
        $sql = $this->db->query("SELECT * FROM qz_user WHERE idUser = '$idUser'");
        $fetch = $sql->fetch_object();
        $hitung = $sql->num_rows;
        
        if($hitung > 0) {
            
            $response["isError"] = FALSE;
            $response["message"] = "Berhasil Ambil User";
            $response["idUser"] = $fetch->idUser;
            $response["namaUser"] = $fetch->namaUser;
            $response["hpUser"] = $fetch->hpUser;
            $response["emailUser"] = $fetch->emailUser;
            $response["fotoUser"] = $fetch->fotoUser;
            
            echo json_encode($response);
        }
        else {
            $response["isError"] = TRUE;
            $response["message"] = "Gagal Ambil User";
            
            echo json_encode($response);
        }
    }
    
    public function rest_listrank()
    {
        
    $sql = $this->db->query("SELECT * FROM qz_rank JOIN qz_user ON qz_rank.idUser = qz_user.idUser ORDER BY skor_tertinggi DESC LIMIT 50");
        $arr = array();
        $index = 1;
        while ($data = $sql->fetch_object()) {
            array_push($arr, array(
                'index'     => $index,
                'namaUser'  => $data->namaUser,
                'fotoUser'  => $data->fotoUser,
                'skorUser'  => $data->skor_tertinggi 
            ));
            $index++;
        }

        echo json_encode(array(
            'value'     => 1,
            'ranking'  => $arr,
        ));

        $this->db->close();
        
    }
    
    public function rest_searchrank()
    {
        $search = trim(htmlspecialchars($_POST['search']));
        
    $sql = $this->db->query("SELECT * FROM qz_rank JOIN qz_user ON qz_rank.idUser = qz_user.idUser WHERE qz_user.namaUser LIKE '%$search%' ORDER BY skor_tertinggi DESC LIMIT 50");
        $arr = array();
        $index = 1;
        while ($data = $sql->fetch_object()) {
            array_push($arr, array(
                'index'     => $index,
                'namaUser'  => $data->namaUser,
                'fotoUser'  => $data->fotoUser,
                'skorUser'  => $data->skor_tertinggi 
            ));
            $index++;
        }

        echo json_encode(array(
            'value'     => 1,
            'ranking'  => $arr,
        ));

        $this->db->close();
        
    }
    
    public function restEditProfil()
    {
        $idUser         = trim(htmlspecialchars($_POST['idUser']));
        $namaUser       = trim(htmlspecialchars($_POST['namaUser']));
        $emailUser      = trim(htmlspecialchars($_POST['emailUser']));
        $hpUser         = trim(htmlspecialchars($_POST['hpUser']));
        
        $sql = $this->db->query("SELECT * FROM qz_user WHERE emailUser = '$emailUser'");
        $hitung = $sql->num_rows;
        $fetch = $sql->fetch_object();
        
        if($hitung > 0){
            if($idUser != $fetch->idUser){
                    $response["isError"] = TRUE;
                    $response["message"] = "Gagal! Email telah dipakai!";
                    echo json_encode($response);
                    die;
            }
        } else{
            $update = $this->db->query("UPDATE qz_user SET namaUser = '$namaUser', hpUser='$hpUser', emailUser='$emailUser' WHERE idUser='$idUser'");
        }
        
        if($update) {
            $response["isError"] = FALSE;
            $response["message"] = "Berhasil Edit Akun!";

            echo json_encode($response);
        }else {
            $response["isError"] = TRUE;
            $response["message"] = "Gagal Edit Akun!";

            echo json_encode($response);
        }

                
    }
    
    public function restEditPassword()
    {
        $response = array("isError" => FALSE);
        
        $idUser         = trim(htmlspecialchars($_POST['idUser']));
        $passUser       = trim(htmlspecialchars($_POST['passUser']));
        
        $hitungpass = strlen($passUser);

        if ($hitungpass < 6) {
            $response["isError"]   = TRUE;
            $response["message"]   = "Password Minimal 6 Karakter";
            echo json_encode($response);
        } else {
            $encrypt_password = password_hash($passUser, PASSWORD_DEFAULT);

            $sql    = $this->db->query("UPDATE qz_user SET passUser = '$encrypt_password' WHERE idUser = '$idUser'");

            if($sql) {
                $response["isError"] = FALSE;
                $response["message"] = "Berhasil Edit Password!";
    
                echo json_encode($response);
            }else {
                $response["isError"] = TRUE;
                $response["message"] = "Gagal Edit Password!";
    
                echo json_encode($response);
            }
        }



        $this->db->close();

                
    }
}

$rest = new RestController;
