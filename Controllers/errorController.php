<?php

class errorController{
    
    public function index() {
        echo "<h1>Page not found!</h1>";
    }
    
    public function showError($message){
        require_once './Views/error/show.php';
    }
    
}
