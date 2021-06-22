<?php
    require_once 'assets/includes/cabecera.php';
    $message = $_GET['mesaj']
    // returns a visual announcement, with an image, showing a message on the screen
?>
    <div class="aviz">
        <p>
            <img src="assets/imagini/ok.png" alt="ok" height="250px" width="250px">
            <?=$message?>
        </p>
    </div>
<?php
    require_once 'assets/includes/pie.php';
?>