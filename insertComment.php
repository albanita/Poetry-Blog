<?php
require_once 'assets/includes/db_conection.php';
require_once 'assets/includes/gestorBD.php';

require_once 'assets/PHPMailer-master/src/PHPMailer.php';
require_once 'assets/PHPMailer-master/src/SMTP.php';
require_once 'assets/PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST))
    {
        $idPoezie=$_POST['idPoezie'];
        $idCarte = $_POST['idCarte'];
        $nume = $_POST['nume'];
        $comentariu = $_POST['comentariu'];

        $sql = "insert into comentariu values (null, '$idPoezie', '$idCarte', '$nume', '$comentariu', CURDATE(), false)";
        $result=mysqli_query($db, $sql);
        if($result)
        {
            $autor = getAutor($db);
            sendMessage($nume, $idPoezie, $autor['email']);
        }
        else
        {
            header("Location: error.php?mesaj=A aparut o eroare. Posibil ca comentariul sa nu fi fost adaugat. Ne pare rau.");
        }
    }

    function sendMessage($nume, $idPoezie, $emailAutor)
    {
        /*$link = "http://localhost/BlogPoeziiMami/poezie.php?id=$idPoezie";*/
        $link = "http://blog-poezii-danab.rf.gd/poezie.php?id=$idPoezie";
        $message = "Aveti un comentariu nou de la $nume pe blog. Va rugam sa accesati link-ul urmator pentru a-l vizualiza: $link \r\n Totodata, va rugam sa nu raspundeti la acest mesaj.";
        $mail = new PHPMailer;
        $mail -> isSMTP();
        $mail -> SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "email@email.com";
        $mail->Password = "password";
        $mail->setFrom('poeziidb@gmail.com', 'Comentariu nou');
        $mail->addReplyTo('poeziidb@gmail.com', 'Comentariu nou');
        $mail->addAddress("$emailAutor", 'Daniela');
        $mail->Subject =  "Aveti un comentariu nou de la $nume";
        $mail -> isHTML(true);
        $mail -> Body = '<p>'.$message.'</p>';
        $mail->AltBody = $message;
        if (!$mail->send()) {
            header("Location: eroare.php?mesaj=A aparut o eroare. Posibil ca comentariul sa nu fi fost adaugat. Ne pare rau. Daca eroarea persista, va rugam sa contactati administradorul. Va multumim!");
        }
        else
        {
            header("Location: aviz.php?mesaj=Comentariul dumneavoastra a fost adaugat cu succes si este in asteptare ca autorul sa-l valideze, pentru ca acesta sa apara public. Va multumim pentru intelegere.");
        }
    }

?>