<?php
    require_once 'assets/includes/cabecera.php';

    $eroare = $_GET['mesaj'];
?>
    <div class="eroare">
        <p>
            A apărut o eroare!
            <img src="assets/imagini/error.png" alt="eroare">
            <?=$eroare;?>
        </p>
    </div>
<?php
    require_once 'assets/includes/pie.php';
?>