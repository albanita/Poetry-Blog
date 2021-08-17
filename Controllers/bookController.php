<?php
require_once 'vendor/autoload.php';
require_once 'vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';

require_once './Models/GestorDB.php';
require_once './Models/Book.php';

class bookController{
    
    public function show(){
        if(isset($_GET)){
            $id_book = $_GET['id'];
            $bookName = $_GET['name'];
        }
            $gbd = new GestorDB();
            $poems = $gbd::getPoemsByBook($id_book);
            
            require_once './Views/book/show.php';
    }
    
    public function add(){
        require_once './Views/book/add.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $bookName = isset($_POST['numeCarte']) ? $_POST['numeCarte'] : false;
            $photoDir = '';
            if(!isset($_POST['faraPoza'])){
                $photo = $_FILES['poza'];
                $photoDir = "./assets/imagini/" . $bookName . '.jpg';
                move_uploaded_file($photo['tmp_name'], $photoDir);
            }
            
            $book = new Book(null, $bookName, $photoDir);
            $gbd = new GestorDB();
            $add = $gbd::addBook($book);
            if($add){
                Utils::redirect(base_url);
            }
            else{
                $error = new errorController();
                $error ->showError("A aparut o eroare si nu s-a putut adauga cartea.");
            }
        }
    }
    
}