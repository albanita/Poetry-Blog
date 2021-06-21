<?php
require_once 'assets/includes/db_conection.php';
require_once 'assets/includes/gestorBD.php';
    
    $id = $_GET['id'];
    $res=deleteComment($db, $id);
    if($res)
    {
        header("Location: announcement.php?mesaj=Comentariul a fost sters cu succes din baza de date.");
    }
    else
    {
        header("Location: error.php?mesaj=A aparut o eroare si comentariul probabil nu s-a stres.");
    }
?>