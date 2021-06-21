<?php
require_once 'assets/includes/db_conection.php';
    if(isset($_POST))
    {
        $email = $_POST['email'];
        $poza = $_FILES['poza'];
        $despre = $_POST['despre'];

        $ruta = "./assets/imagini/profil.jpg";
        if($poza['name'] != '')
        {
            unlink($ruta);
            move_uploaded_file($poza['tmp_name'], $ruta);

            $sql3 = "update autor set poza = '$ruta'";
            mysqli_query($db, $sql3);
        }

        $sql1 = "update autor set email = '$email'";
        mysqli_query($db, $sql1);

        $sql2 = "update autor set despre = '$despre'";
        mysqli_query($db, $sql2);

        mysqli_close($db);
    }
    header("Location: about.php");
?>