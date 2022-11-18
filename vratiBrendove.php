<?php

require 'konekcija.php';
require "models/brend.php";

$brendovi = Brend::vratiBrendove($conn);

foreach ($brendovi as $brend) {
?>
<option value="<?= $brend->brendId ?>"><?= $brend->nazivBrenda?></option>
<?php
}