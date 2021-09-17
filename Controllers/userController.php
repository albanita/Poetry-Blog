<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userController
 *
 * @author Alin
 */

require_once './Models/GestorDB.php';
require_once './Models/Autor.php';

class userController {
    
    public function testimony(){
        require_once './Views/user/testimony.php';
    }
    
    public function signIn(){
        require_once './Views/user/signIn.php';
    }
    
    public function logIn(){
        if(isset($_POST)){
            $usrName = $_POST['usrName'];
            $password = $_POST['password'];
            $gbd = new GestorDB();
            
            $autor = $gbd::getAutor($usrName, $password);
            if($autor != false){
                Utils::openSession($autor->getUserName());
                Utils::redirect(base_url);
            }
            else{
                $error = new errorController();
                $error->showError("Nume de utilizator sau parola introduse gresit!");
            }
        }
    }
    
    public function logOut(){
        Utils::closeSession();
        Utils::redirect(base_url);
    }
    
    public function about(){
        $gbd = new GestorDB();
        $autor = $gbd::getAutorInfo();
        require_once './Views/user/about.php';
    }
    
    // uncomment this method to make registration page available
    /*public function signUp(){
        require_once 'views/user/register.php';
    }*/
    
    public function register(){
        if(isset($_POST)){
            $error = new errorController();
            $usrName = $_POST['usrName'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1 != $pass2){
                $error->showError("Nu ai repetat corect parola. Apasa acest <a href='".base_url."user/signUp'>link</a>, pentru a incerca din nou.");
            }
            else{
                $gbd = new GestorDB();
                $add = $gbd::addAutor($usrName, $pass1);
                if($add){
                    $success = new notificationController();
                    $success->show("Inregistrare completata cu succes. Acum puteti deschide o sesiune accesand butonul conectati-va din meniu.");
                }
                else{
                    $error->showError("A aparut o eroare si nu v-ati putut inregistra. Raportati aceasta eroare administratorului!");
                }
            }
        }
    }
    
    public function edit(){
        $gbd = new GestorDB();
        $user = $gbd::getAutorInfo();
        require_once './Views/user/edit.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $photoDir = '';
            if (!isset($_POST['faraPoza'])) {
                $photo = $_FILES['poza'];
                $photoDir = "./assets/imagini/profil.jpg";
                move_uploaded_file($photo['tmp_name'], $photoDir);
            }
            else{
                unlink("./assets/imagini/profil.jpg");
            }
            $about = isset($_POST['despre']) ? $_POST['despre'] : false;
            
            $gbd = new GestorDB();
            $autor = $gbd::getAutorInfo();
            
            $autor->setEmail($email);
            $autor->setPhoto($photoDir);
            $autor->setAbout($about);
            
            $update = $gbd::updateAutor($autor);
            
            if($update){
                Utils::redirect(base_url."user/about");
            }
            else{
                $error = new errorController();
                $error ->showError("A aparut o eroare si nu s-au putut actualiza datele personale.");
            }
        }
    }
    
}
