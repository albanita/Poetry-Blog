<?php
    // this is the error page
    require_once 'assets/includes/cabecera.php';

    $error = $_GET['mesaj'];
?>
    <div class="eroare">
        <p>
            A apărut o eroare!
            <img src="assets/imagini/error.png" alt="eroare">
            <?=$error;?>
        </p>
    </div>
<?php
    require_once 'assets/includes/pie.php';
?>