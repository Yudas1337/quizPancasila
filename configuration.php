<?php
session_start();
class Config
{

    private $server         = "localhost";
    private $user           = "root";
    private $pass           = "";
    private $database       = "db_quiz";
    protected $db;

    function __construct()
    {
        $this->connect_database();
    }

    protected function connect_database()
    {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->database);

        if (!$this->db) {
            die("Gagal terhubung ke Database! " . $this->db->connect_error());
        }
    }
}
