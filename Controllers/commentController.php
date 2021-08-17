<?php

require_once 'vendor/autoload.php';
require_once './Models/Comment.php';
require_once './Models/GestorDB.php';

class commentController {
    
    public function add(){
        require_once './Views/comment/show.php';
    }
    
    public function save(){
        if(isset($_POST) && isset($_GET)){
            $idPoem = $_GET['idPoem'];
            $idBook = $_GET['idBook'];
            $name = $_POST['name'];
            $comm = $_POST['comment'];
            
            $comment = new Comment(null, $idPoem, $idBook, $name, $comm, null, false);
            $gbd = new GestorDB();
            $save = $gbd::insertComment($comment);
            if($save){
                $notification = new notificationController();
                $notification->show("Comentariul a fost adaugat cu succes. Acesta va fi vizibil doar cand autorul il va valida.");
                $message = "Aveti un comentariu nou de la $name. Accesati link-ul urmator pentru a-l vedea, dar nu uitati ca trebuie sa aveti o sesiune deschisa: ".base_url."poem/show&id=$idPoem";
                $emailAutor = $gbd::getAutorEmail();
                
                $emails = array();
                array_push($emails, $emailAutor);
                
                Utils::sendEmail("Comentariu nou", $emails, $message);
            }
            else{
                $error = new errorController();
                $error->showError("A aparut o eroare si nu s-a putut adauga comentariul. Ne pare rau.");
            }
        }
    }
    
    public function validate(){
        if(isset($_GET)){
            $id = $_GET['id'];
            $gbd = new GestorDB();
            $ok = $gbd::validateComment($id);
            if($ok){
                Utils::redirect(base_url);
            }
            else{
                $error = new errorController();
                $error->showError("A aparut o eroare");
            }
        }
        
    }
    
    public function delete(){
        if(isset($_GET)){
            $id = $_GET['id'];
            $gbd = new GestorDB();
            $ok = $gbd::deleteComment($id);
            if($ok){
                Utils::redirect(base_url);
            }
            else{
                $error = new errorController();
                $error->showError("A aparut o eroare");
            }
        }
        
    }
    
}
