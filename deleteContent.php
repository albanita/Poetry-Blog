<?php
require_once 'assets/includes/db_conection.php';
    // deletes a poem with its comments from the database by an id given by GET method, and then goes to index.php  
    $id = $_GET['id'];

    $sqlTitluPoezie = "select titlu from poezie where id = '$id'";
    $res = mysqli_query($db, $sqlTitluPoezie);
    $titlu = mysqli_fetch_assoc($res)['titlu'];

    $ruta = "./assets/imagini/$titlu.jpg";
    unlink($ruta);

    $sql = "delete from poezie where id = '$id'";
    
    mysqli_query($db, $sql);

    $sqlDeleteComentariu = "delete from comentariu where idPoezie = '$id'";
    mysqli_query($db, $sqlDeleteComentariu);

    header("Location: index.php");
?>