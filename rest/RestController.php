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
}

$rest = new RestController;
