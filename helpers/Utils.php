<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

require_once './Models/GestorDB.php';
class Utils {
    
    public static function getBooks(){
        $gbd = new GestorDB();
        $books = $gbd::getAllBooks();
        return $books;
    }
    
    // better use this than header(), to make redirections, because I don't want to enconter another errors like "The header was sent..."
    public static function redirect($url){
        echo '<script type="text/javascript">';
        //echo 'window.location.href="'.$url.'";';
        echo 'window.location.replace("'.$url.'");';
        echo '</script>';
    }
    
    // sends the given message with given subject, to emilDest given and then shows a notification with $messageOK content or en error with $messageError content
    public static function sendEmail($subject, $emailDest = array(), $message, $messageOK=null, $messageError=null, $replyTo = null) {
        $mail = new PHPMailer(true);
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'poeziidb@gmail.com';
            $mail->Password = 'yhjgbpepfivhmjhs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            $mail->setFrom('poeziidb@gmail.com', 'Blog Poezii');
            
            foreach ($emailDest as $dest) {
                $mail->addAddress($dest);
            }
            
            if($replyTo != null){
                $mail->addReplyTo($replyTo, 'Administrator');
            }
            
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = $message;
            
            $sent = $mail->send();
            if($sent & $messageOK != null){
                $notification = new notificationController();
                $notification->show($messageOK);
            }
        } catch (Exception $e) {
            $error = new errorController();
            if($messageError != null){
                $error ->showError("$messageError \nContactati administradorul si raportati acest mesaj: \n"
                    . "<u>Mailer Error: {$mail->ErrorInfo}</u>"
                    . "\nVa multumim si ne pare rau de neplacerea creata. \nO zi buna!");
            }
            else{
                $error ->showError("Contactati administradorul si raportati acest mesaj: \n"
                    . "<u>Mailer Error: {$mail->ErrorInfo}</u>"
                    . "\nVa multumim si ne pare rau de neplacerea creata. \nO zi buna!");
            }
        }
    }
    
    public static function openSession($name){
        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = $name;
        }
    }
    
    public static function userLogedIn(){
        return isset($_SESSION['user']);
    }
    
    public static function closeSession(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            $_SESSION['user'] = null;
        }
    }
    
    
    private static function generateRandomString(){
        $collection = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $result = str_shuffle($collection);
        return $result;
    }
    public static function createCookie($name, $daysNumber){
        $value = self::generateRandomString();
        $expires = time() + 60*60*24 * $daysNumber;
        $path = "/";
        $domain = "";
        $secure = false;
        $httponly = false;

        if(!isset($_COOKIE[$name])){
            setcookie($name, $value, $expires, $path, $domain, $secure, $httponly);
        }
    }
}