<?php
require_once 'assets/includes/db_conection.php';
require_once 'assets/includes/gestorBD.php';

    //deletes a comment from the database with an id given by the GET method and if succeeded or not, shows a message depending on the result
    
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