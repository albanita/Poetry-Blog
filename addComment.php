<?php
require_once 'assets/includes/cabecera.php';
// used to insert the data of a comment of a poem and then calls insertComment.php to sore it into the database
?>

<?php 
    $idCarte = $_GET['idCarte'];
    $id = $_GET['id'];
?>
    <!--add a comment-->
    <form action="insertComment.php" class="formular" method="POST" id="comentariu">
            <input type="hidden" name="idCarte" value="<?=$idCarte?>" >
            <input type="hidden" name="idPoezie" value="<?=$id?>" >
            <label for="nume">Nume: </label>
            <input type="text" name="nume" placeholder="Numele dumneavoastră">
            <label for="comentariu">Comentariu: </label>
            <textarea name="comentariu" cols="30" rows="10" placeholder="Comentariul dumneavoastră"></textarea>
            <input type="submit" class="buton" value="Comentează">
        </form>
<?php
require_once 'assets/includes/pie.php';
?>