<?php

require_once 'vendor/autoload.php';
require_once './Models/Poem.php';
require_once './Models/GestorDB.php';
require_once 'vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';

class poemController {

    public function index() {
        require_once './Views/poem/poemList.php';
    }

    public function list() {
        $gbd = new GestorDB();

        $recordsPerPage = 6;
        $pagination = new Zebra_Pagination();

        $numPoems = $gbd::countPoems();

        $pagination->records($numPoems);

        $pagination->records_per_page($recordsPerPage);

        $page = $pagination->get_page();
        $start_here = (($page - 1) * $recordsPerPage);
        $poems = $gbd::getAllPoems($start_here, $recordsPerPage);
        require_once './Views/poem/poemList.php';
    }

    public function show() {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $gbd = new GestorDB();
            $poem = $gbd::getPoemById($id);
            if($poem == null){
                $error = new errorController();
                $error->showError("Nu s-a putut gasi poezia. Ne pare rau.");
            }
            else{
                $comments = $gbd::getComments($id);
                require_once './Views/poem/show.php';
            }
        }
    }

    public function search() {
        if (isset($_GET)) {
            $title = $_GET['title'];
            $gbd = new GestorDB();
            $poem = $gbd::getPoemByTitle($title);
            if ($poem == null) {
                $error = new errorController();
                $error->showError("Poezia cu titlul <u>$title</u>, nu exista!");
            } else {
                $comments = $gbd::getComments($poem->id);
                require_once './Views/poem/show.php';
            }
        }
    }

    public function add() {
        $books = Utils::getBooks();
        require_once './Views/poem/add.php';
    }

    public function save() {
        if (isset($_POST)) {
            $poem = $this->extractPoemData();
            $gbd = new GestorDB();
            if ($poem != null) {
                $save = $gbd::savePoem($poem);
                if (!$save) {
                    $error = new errorController();
                    $error->showError("A aparut o eroare si nu s-a putut adauga poezia!");
                } else {
                    $abonati = $gbd::getAllFallowers();
                    if($abonati != null){
                        $lastId = $gbd::lastPoemId();
                        $emails = array();
                        while($abonat = $abonati->fetch_object()){
                            $email = $abonat->email;
                            array_push($emails, $email);
                        }
                        Utils::sendEmail("Poezie noua", $emails, "Autorul Daniela Banita a adaugat o poezie noua pe blog. Accesati link-ul urmator pentru a citi: ".base_url."poem/show&id=$lastId");
                    }
                    Utils::redirect(base_url);
                }
            }
            else{
                Utils::redirect(base_url);
            }
        }
    }

    public function delete() {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $gbd = new GestorDB();
            $poem = $gbd::getPoemById($id);
            if ($poem->poza != null || $poem->poza != '') {
                unlink($poem->poza);
            }
            $gbd::deletePoem($id);
            Utils::redirect(base_url);
        }
    }

    public function edit() {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $gbd = new GestorDB();
            $poem = $gbd::getPoemById($id);
            $books = Utils::getBooks();
            $selectedBookName = $gbd::getBookName($poem);
            require_once './Views/poem/edit.php';
        }
    }

    public function update() {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $gbd = new GestorDB();

            if (isset($_POST)) {
                $poem = $this->extractPoemData();
                $poem->setId($id);
                $save = $gbd::updatePoem($poem);
                if (!$save) {
                    $error = new errorController();
                    $error->showError("A aparut o eroare si nu s-a putut actualiza poezia!");
                } else {
                    Utils::redirect(base_url);
                }
            }
        }
    }

    // extract the data of a poem like title, verses, book wich the poem belongs to, and photo, with the POST method
    // in order to use this, $_POST must be set before
    private function extractPoemData() {
        $poemName = isset($_POST['numePoezie']) ? $_POST['numePoezie'] : false;
        $photoDir = null;
        
        
        /*if (!isset($_POST['faraPoza'])) {
            $photo = $_FILES['poza'];
            $photoDir = "./assets/imagini/" . $poemName . '.jpg';
            move_uploaded_file($photo['tmp_name'], $photoDir);
        }*/
        
        if(isset($_FILES['poza'])){
            if($_FILES['poza']['size'] > 0){
                $photo = $_FILES['poza'];
                $photoDir = "./assets/imagini/" . $poemName . '.jpg';
                move_uploaded_file($photo['tmp_name'], $photoDir);
            }
        }
        
        
        $idBook = isset($_POST['carte']) ? $_POST['carte'] : false;
        $verses = isset($_POST['versuri']) ? addslashes("\n" . $_POST['versuri']) : false;
        if ($poemName && $idBook && $verses) {
            $poem = new Poem(null, $poemName, $idBook, $photoDir, $verses, null);
            return $poem;
        } else {
            return null;
        }
    }
    
    public function getAllTitles(){
        $gbd = new GestorDB();
        $titles = $gbd::getAllPoemTitles();
        echo $titles;
    }

}
