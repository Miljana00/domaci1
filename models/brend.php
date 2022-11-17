<?php

class Brend{

    public $brendId;
    public $nazivBrenda;

    public function __construct($brendId=null,$nazivBrenda=null)
    {
        $this->brendId = $brendId;
        $this->nazivBrenda=$nazivBrenda;
    }

    public static function vratiBrendove(mysqli $conn)
    {
        $sql = "SELECT * FROM brend";
        $rs = $conn->query($sql);
        $brendovi = [];

        while($brend = $rs->fetch_object()){
            $brendovi[] = $brend;
        }
        return $brendovi;
    }

}

