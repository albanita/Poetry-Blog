<?php

require_once 'assets/includes/db_conection.php';
    if(isset($_POST) && isset($_FILES))
    {
        $titlu = $_POST['titlu'];
        $id = $_POST['id'];
        $continut = addslashes("\n".$_POST['continut']); // escape caractere ' si "; defapt adauga \' si \"
        $poza = $_FILES['poza'];

        $stergePoza = $_POST['stergePoza'];
        
        $ruta = "./assets/imagini/$titlu.jpg";
        if($poza['name'] != '')
        {
            unlink($ruta);
            move_uploaded_file($poza['tmp_name'], $ruta);
        }
        if($stergePoza)
        {
            unlink($ruta);
            $ruta='';
        }
        
        $sql1 = "update poezie set poza = '$ruta' where id = '$id'";
        mysqli_query($db, $sql1);

        $sql2 = "update poezie set titlu = '$titlu' where id = '$id'";
        mysqli_query($db, $sql2);
        
        
        $sql3 = "update poezie set continut = '$continut' where id = '$id'";
        mysqli_query($db, $sql3);
    }
    header("Location: poem.php?id=$id");
?>