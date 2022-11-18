<?php
include 'konekcija.php';
require "models/parfem.php";

$tip = trim($_GET['tip']);
$cena = trim($_GET['cena']);

$parfemi = Parfem::pretraga($tip, $cena, $conn);

?>
    <table class="table">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Kolicina</th>
                <th>Cena</th>
            </tr>
        </thead>
    <tbody>

<?php

foreach ($parfemi as $parfem) {
    ?>
    <tr>
        <?php
        if($parfem->tipId=="1"){
            ?>  
             <td><?= "&#9792" . " " . $parfem->nazivBrenda . " " . $parfem->nazivParfema ?></td> 
             <?php
        }else{
            ?>   
            <td><?= "&#9794" . " " . $parfem->nazivBrenda . " " . $parfem->nazivParfema ?></td> 
            <?php
        }
        ?>   
        <td><?= $parfem->kolicina . " ml"?></td>
        <td><?= $parfem->cena . " din"?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
