<?php
    require_once 'assets/includes/db_conection.php';
    require_once 'assets/includes/gestorBD.php';

    // makes a comment visible given its id by the GET method
    
    $id = $_GET['id'];
    $res = setCommentVisible($db, $id);
    if($res)
    {
        header("Location: announcement.php?mesaj=Comentariul a fost validat cu succes si de acum va fi vizibil pentru oricine");
    }
    else
    {
        header("Location: error.php?mesaj=A apartu o eroare si comentariul nu a fost validat. Ne pare rau.");
    }
?>