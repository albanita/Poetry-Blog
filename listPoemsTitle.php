<?php
    require_once 'assets/includes/db_conection.php';
    require_once 'assets/includes/gestorBD.php';
    // used to verify if the title of a poem is repeated. This one is used in assets/js/titleValidation.js, in the AJAX method 
    if(isset($_SESSION['user'])){
        $poems = listPoemsTitle($db);
        echo $poems;
    }

?>