<?php

session_start();

$user="";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
if (isset($_COOKIE["admin"]))
    {
        $user=$_COOKIE["admin"];
    }
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Essence</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light" id="navCont" style="height: 100px;background-color: #AC7088;">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <h6 id="por" style="font-weight: 400;  margin-left:50px; border-radius: 25px; padding: 15px; background: white;"><?= $user;?></h6>
                <div class="navbar-nav p-lg-0" style="margin-left: 65%; padding-top: 3%;">
                    <button id="btnDodajForma" type="button"  class="btn btn-success" data-toggle="modal" data-target="#dodajForma">Dodaj parfem</button>
                    <button id="btnIzmeniForma" type="button" class="btn btn-success"  data-toggle="modal" data-target="#izmeniForma">Izmeni parfem</button>
                    <button id="btnObrisiForma" type="button" class="btn btn-success"  data-toggle="modal" data-target="#obrisiForma">Obrisi parfem</button>
                    <br><br>
                </div>
            </div>
        </nav>

    <section class="section" id="pretraga" style="padding-top: 40px">
        <div class="container" style="margin-top: 10px">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <div class="row" style="margin-top: 0%;">
                            
                            <img src="assets/css/l.png" style="width: 50%; margin-left: 80px; margin-bottom: 10px;">
                            <label for="pretraziTip">Tip</lbel>
                            <select class="form-control" id="pretraziTip"  style="width:350px" onchange="pretraga()"></select>
                            <label for="pretraziCenu">Cena</label>
                            <select class="form-control" id="pretraziCenu" onchange="pretraga()">
                                <option value="asc">Rastući poredak</option>
                                <option value="desc">Opadajući poredak</option>
                            </select>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        
        <div class="tab" id="parfemi" style="padding-top: 10px; width: 50%; margin: auto; text-align: center;"></div>
    </section>

    <footer class="footer"  style="margin-top: -300px">
            <div class="footer row" style="width:99%">
                <img src="assets/css/z.png"style="width:20%; margin-buttom: 10px; margin-left: 40px;" onclick="vratiZenskeParfeme()">
                <img src="assets/css/m.png"style="width:20%; margin-buttom: 10px; margin-left: 825px;" onclick="vratiMuskeParfeme()">
                
            </div>
        </footer>
        
        

<!-------------------------------------------- DODAJ --------------------------------------------------->
    <div class="modal fade" id="dodajForma" role="dialog">
        <div class="modal-dialog" style="border-radius: 500px !important">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#AC7088;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="background-color:#F2EBE9">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <label for="dodajBrend">Brend</label>
                                        <select name="dodajBrend" id="dodajBrend" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="dodajNaziv">Naziv</label>
                                        <input type="text" id="dodajNaziv" class="form-control" require>
                                        
                                        <label for="dodajTip">Tip</label>
                                        <select name="dodajTip" id="dodajTip" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="dodajCenu">Cena</label>
                                        <input type="number" id="dodajCenu" class="form-control" require>
                                        
                                        <label for="dodajKolicinu">Kolicina</label>
                                        <input type="number" id="dodajKolicinu" class="form-control" require>

                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px;">
                                    <br>
                                    <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: #AC7088;" onclick="dodaj()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ IZMENI -------------------------------->
    <div class="modal fade" id="izmeniForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#AC7088">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="background-color:#F2EBE9">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="izmeniParfem">Parfem</label>
                                        <select name="izmeniParfem" id="izmeniParfem" style="border: 1px solid black" class="form-control"> </select><br>

                                        <label for="izmeniCenu">Cena</label>
                                        <input type="izmeniCenu" class="form-control" id="izmeniCenu">

                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: #AC7088;" onclick="izmeni()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!----------------------------------- OBRISI -------------------------------------------------------->
    <div class="modal fade" id="obrisiForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#AC7088">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"  style="background-color:#F2EBE9">
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="obrisiParfem">Parfem</label>
                                        <select name="obrisiParfem" id="obrisiParfem" style="border: 1px solid black" class="form-control"> </select><br>

                                    </div>
                                    <div class="col-md-4"  style="width: 90%; margin: auto;">
                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: #AC7088;" onclick="obrisi()">Obrisi</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>
        
        function vratiTipove() {
            $.ajax({
                url: 'vratiTipove.php',
                success: function (data) {
                    $("#dodajTip").html(data);
                }
            })
        }
        
        function vratiBrendove() {
            $.ajax({
                url: 'vratiBrendove.php',
                success: function (data) {
                    $("#dodajBrend").html(data);
                }
            })
        }

        function vratiParfeme() {
            $.ajax({
                url: 'vratiParfeme.php',
                success: function (data) {
                    $("#izmeniParfem").html(data);
                    $("#obrisiParfem").html(data);
                }
            })
        }

        function vratiTipoveZaPretragu() {
            $.ajax({
                url: 'vratiTipove.php',
                success: function (data) {
                     let tipovi = "<option value='svi'>Svi</option>" + data; 
                    $("#pretraziTip").html(tipovi);
                }
            })
        }

        
        function pretraga() {
            
            let tip = $("#pretraziTip").val();
            let cena = $("#pretraziCenu").val();
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#parfemi").html(data);
                }
            })
        }

        function ucitaj() {
            
            let tip = "svi";
            let cena = "asc";
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#parfemi").html(data);
                }
            })
        }

        ucitaj();
        vratiTipoveZaPretragu();
        vratiBrendove();
        vratiParfeme();
        vratiTipove();
   
   
        
        function dodaj() {
            let naziv = $("#dodajNaziv").val();
            let kolicina = $("#dodajKolicinu").val();
            let cena = $("#dodajCenu").val();
            let tip = $("#dodajTip").val();
            let brend = $("#dodajBrend").val();
            
            $.ajax({
                url: 'dodaj.php',
                method: 'post',
                data: {
                    naziv: naziv,
                    kolicina: kolicina,
                    cena: cena,
                    tip: tip,
                    brend: brend
                },
                success: function (data) {
                    vratiParfeme();
                    ucitaj();
                }
            })
        }

        function izmeni() {
            let nazivParfema = $("#izmeniParfem").val();
            let cena = $("#izmeniCenu").val();
            $.ajax({
                url: 'izmeni.php',
                method: 'post',
                data: {
                    nazivParfema: nazivParfema,
                    cena: cena
                },
                success: function (data) {
                    vratiParfeme();
                    ucitaj();
                }
            })
        }

        function obrisi() {
            let nazivParfema = $("#obrisiParfem").val();
            $.ajax({
                url: 'obrisi.php',
                method: 'post',
                data: {
                    nazivParfema: nazivParfema
                },
                success: function (data) {
                    vratiParfeme();
                    ucitaj();
                }
            })
        }

        function vratiMuskeParfeme() {
            
            let tip = "2";
            let cena = "asc";
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#parfemi").html(data);
                }
            })
        }

        function vratiZenskeParfeme() {
            
            let tip = "1";
            let cena = "asc";
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#parfemi").html(data);
                }
            })
        }



    </script>
  </body>
</html>