<?php
    require_once 'assets/includes/db_conection.php';
    require_once 'assets/includes/gestorBD.php';

    if(isset($_SESSION['user'])){
        $poezii = listPoemsTitle($db);
        echo $poezii;
    }
    else{
        header("Location: error.php?mesaj=Nu aveți dreptul să accesați aceste informații!");
    }

?>