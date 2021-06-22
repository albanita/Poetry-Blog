<?php
    // used for user registration
    require_once 'assets/includes/db_conection.php';
    $utilizator = $_POST['numeUtilizator'];
    $parola = $_POST['parola'];
    $reParola = $_POST['reParola'];
    $email = $_POST['email'];
    if($parola != $reParola)
    {
        header("Location: signup.php");
        session_start();
        $_SESSION['eroare'] = "Nu ati rescris bine parola. Va rugam sa reincercati.";
        die();
    }

    $safePassword = password_hash($parola, PASSWORD_BCRYPT, ['cost' => 4]);
    $insert_sql = "insert into autor values (null, '$utilizator', '$safePassword', '$email', '', '')";
    $insert=mysqli_query($db, $insert_sql);
    header("Location: connect.php");
?>