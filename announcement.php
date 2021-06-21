<?php
    require_once 'assets/includes/cabecera.php';
    $mesaj = $_GET['mesaj']
?>
    <div class="aviz">
        <p>
            <img src="assets/imagini/ok.png" alt="ok" height="250px" width="250px">
            <?=$mesaj?>
        </p>
    </div>
<?php
    require_once 'assets/includes/pie.php';
?>