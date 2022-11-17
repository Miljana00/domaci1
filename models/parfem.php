<?php


class Parfem{

   public $parfemId;
   public $nazivParfema;
   public $kolicina;
   public $cena;
   public $brendId;
   public $tipId;
  
    public function __construct($parfemId=null, $nazivParfema=null, $kolicina=null, $cena=null, $brendId=null, $tipId=null)
    {
        $this->parfemId = $parfemId;
        $this->nazivParfema=$nazivParfema;
        $this->kolicina=$kolicina;
        $this->cena=$cena;
        $this->brendId=$brendId;
        $this->tipId=$tipId;
    }

    public static function pretraga($tipId, $cena, mysqli $conn)
    {
        $query = "SELECT * FROM parfem p join tip t on p.tipId = t.tipId join brend b on b.brendId = p.brendId";
        if($tipId != "svi"){
            $query .= " WHERE p.tipId = " . $tipId;
        }
        $query.= " ORDER BY p.cena " . $cena;
        $rs = $conn->query($query);
        $parfemi = [];
        while($parfem = $rs->fetch_object()){
            $parfemi[] = $parfem;
        }
        return $parfemi;
    }

    public static function vrati(mysqli $conn)
    {
        $query= "SELECT * FROM parfem p join tip t on p.tipId = t.tipId join brend b on b.brendId = p.brendId";
        $rs = $conn->query($query);
        $parfemi = [];
        while($parfem = $rs->fetch_object()){
            $parfemi[] = $parfem;
        }
        return $parfemi;
    }

    public static function dodaj($nazivParfema, $kolicina, $cena, $brendId, $tipId, mysqli $conn)
    {
        $query = "INSERT INTO parfem VALUES(null, '$nazivParfema' , '$kolicina', '$cena', '$brendId', '$tipId')";
        return $conn->query($query);
    }

    public static function izmeni($parfemId, $cena1, mysqli $conn)
    {
        $cena=floatval($cena1);
        $query = "UPDATE parfem SET cena = '$cena' WHERE parfemId = '$parfemId'";
        return $conn->query($query);
    }

    public static function obrisi($parfemId, mysqli $conn)
    {
        $query = "DELETE FROM parfem WHERE parfemId = $parfemId";
        return $conn->query($query);
    }
}