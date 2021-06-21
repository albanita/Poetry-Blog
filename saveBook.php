<?php
require_once 'assets/includes/db_conection.php';
    if(isset($_POST) && isset($_FILES))
    {
        $nume = $_POST['nume'];
        $poza = $_FILES['poza'];
        $ruta = "";

        
        if($poza['name'] != '')
        {
            $ruta = "./assets/imagini/$nume.jpg";
            move_uploaded_file($poza['tmp_name'], $ruta);
        }
        $sql = "insert into carte values (null, '$nume', '$ruta')";
        mysqli_query($db, $sql);
    }
    header("Location: index.php");
?>