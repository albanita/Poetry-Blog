<?php

require_once './Models/GestorDB.php';

class newsController {
    
    public function index(){
        require_once './Views/news/index.php';
    }
    
    public function add(){
        if(isset($_GET)){
            $error = new errorController();
            $email = $_GET['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error ->showError("Adresa de email nu este valabila. Va rugam sa reincercati!");
            }
            else{
                $gbd = new GestorDB();
                $ok = $gbd::addFallower($email);
                if($ok){
                    $notification = new notificationController();
                    $notification ->show("Ati fost abonat cu succes. De acum veti primi notificari pe aceasta adresa $email de fiecare data cand autorul va publica o poezie noua");
                }
                else{
                    $error ->showError("Ne pare rau. A aparut o problema si nu v-am putut inregistra. Va rugam sa contactati administradorul. S-ar prea putea sa fiti deja inregistrat.");
                }
            }
        }
    }
    
    public function delete(){
        if(isset($_GET)){
            $email = $_GET['email'];
            $error = new errorController();
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error ->showError("Adresa de email nu este valabila. Va rugam sa reincercati!");
            }
            else{
                $gbd = new GestorDB();
                $ok = $gbd::deleteFallower($email);
                if($ok){
                    $notification = new notificationController();
                    $notification ->show("Ati fost sters cu succes. De acum nu veti mai primi notificari pe aceasta adresa $email, cand autorul va publica o poezie noua");
                }
                else{
                    $error ->showError("Ne pare rau. A aparut o problema. Va rugam sa contactati administradorul. Probabil nu sunteti inregistrat cu adresa $email");
                }
            }
        }
    }
    
}
