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
        $sql = $this->db->query("SELECT * FROM qz_soal JOIN qz_jawaban ON qz_soal.idSoal = qz_jawaban.idSoal WHERE qz_soal.statusSoal = 1");
        $arr = array();

        while ($data = $sql->fetch_object()) {

            array_push($arr, array(
                'idSoal' => $data->idSoal,
                'isiSoal' => $data->isiSoal,
                'kunci_jwb' => $data->kunci_jwb,
                'fotoSoal' => (!$data->fotoSoal) ? '' : $data->fotoSoal,
                'nilaiSoal' => $data->nilaiSoal,
                'statusSoal' => $data->statusSoal,
                'jawaban' => array(
                    'idJawaban' => $data->idJawaban,
                    'idSoal'    => $data->idSoal,
                    'uraian'    => $data->uraian,
                    'abjad'     => $data->abjad
                )
            ));
        }

        echo json_encode(array(
            'value' => 1,
            'result' => $arr
        ));

        $this->db->close();
    }
}

$rest = new RestController;
