<?php
    require_once 'assets/includes/db_conection.php';
    if(isset($_POST) && isset($_FILES))
    {
        $titlu = $_POST['titlu'];
        $carte = $_POST['carte'];
        $poza = $_FILES['poza'];
        
        $ruta = '';
        if($poza['name'] != '')
        {
            $ruta = "./assets/imagini/$titlu.jpg";
            move_uploaded_file($poza['tmp_name'], $ruta);
        }
        $continut = addslashes("\n".$_POST['continut']); // escape caractere ' si "; defapt adauga \' si \"
        
        $sql = "insert into poezie values(null, '$titlu', '$carte', '$ruta', '$continut', CURDATE())";
        mysqli_query($db, $sql);
    }
    header("Location: index.php");
?>