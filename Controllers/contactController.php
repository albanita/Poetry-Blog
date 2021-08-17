<?php

class contactController {
    
    public function index(){
        require_once './Views/contact/admin.php';
    }
    
    public function send(){
        if(isset($_POST)){
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            $emails = array();
            array_push($emails, email_admin);
            
            Utils::sendEmail("Mesaj nou pe blog poezii", $emails, $message, "Mesjul a fost trimis cu succes. Asteptati ca Alin sa va raspunda la adresa $email.", "Ne pare rau. A aparut o eroare", $email);
        }
    }
    
}
