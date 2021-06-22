<?php
// used to delete a book from the database by an id given in the query string, given by GET method
require_once 'assets/includes/db_conection.php';
    $id = $_GET['id'];
    $pozaCarte = $_GET['pozaCarte'];
    
    $sql_rutaPozaPoezie = "select poza from poezie where idCarte = '$id'";
    $poze=mysqli_query($db, $sql_rutaPozaPoezie);
    if(!empty($poze))
    {
        while($poza = mysqli_fetch_assoc($poze))
        {
            unlink($poza['poza']);
        }
    }

    $deletePoezie = "delete from poezie where idCarte = '$id'";
    mysqli_query($db, $deletePoezie);

    if($pozaCarte != '')
    {
        unlink($pozaCarte);
    }

    $deleteCarte = "delete from carte where id = '$id'";
    mysqli_query($db, $deleteCarte);

    header("Location: index.php");
?>