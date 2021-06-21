<?php
require_once 'assets/includes/db_conection.php';
require_once 'assets/includes/gestorBD.php';

    $titlu = $_POST['numePoezie'];
    $poezie = getPoemByTitle($db, $titlu);
    if($poezie != null)
    {
        $id = $poezie['id'];
        header("Location: poem.php?id=$id");
    }
    else{
        header("Location: error.php?mesaj=Poezia cu titlul $titlu nu există. Ne pare rau.");
    }
?>