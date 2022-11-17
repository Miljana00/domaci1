<?php

class Tip {

    public $tipId;
    public $nazivTipa;

    public function __construct($tipId=null,$nazivTipa=null)
    {
        $this->tipId = $tipId;
        $this->nazivTipa=$nazivTipa;
    }

    public static function vratiTipove(mysqli $conn)
    {
        $query = "SELECT * FROM tip";
        $rs = $conn->query($query);
        $tipovi = [];
        while($tip = $rs->fetch_object()){
            $tipovi[] = $tip;
        }
        return $tipovi;
    }

}

