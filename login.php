<?php
require_once 'assets/includes/db_conection.php';
    $user = $_POST['nume'];
    $pass = $_POST['parola'];

    /*var_dump($user);
    die();*/

    $sql = "select parola from autor where numeUtilizator = '$user'";
    $res = mysqli_query($db, $sql);
    $safePassword = mysqli_fetch_assoc($res);
    $passOK = password_verify($pass, $safePassword['parola']);
    session_start();
    if($passOK)
    {
        $_SESSION['user'] = $user;
        header("Location: index.php");
    }
    else
    {
        $_SESSION['eroare'] = "Nume de utlizator sau parola gresita.";
        header("Location: connect.php");
    }
    
?>