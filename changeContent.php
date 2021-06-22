<?php
    require_once 'assets/includes/cabecera.php';
    // used to change the content of a poem like title, photo, verses, and then calls saveChangedContent.php to commit the changes in the database
?>
    <?php
        $poezie = getPoemByID($db, $_GET['id']);
        $titlu = $poezie['titlu'];
        $poza = $poezie['poza'];
        $continut = $poezie['continut'];
        $id=$_GET['id'];
    ?>

<form action="saveChangedContent.php" method="POST" class="formular" enctype="multipart/form-data">
        <label for="titlu">Titlu: </label>
        <input type="text" name="titlu" value="<?=$titlu?>"/>

        <br>
        <br>

        <label for="poza">Poza: </label>
        <input type="file" name="poza" value="<?=$poza?>"/>

        <input type="text" name="id" value="<?=$id?>" hidden>

        <?php if($poza != ''): ?>
            <br>
            <br>
            <p>Daca doriti sa stergeti poza si sa nu mai adaugati nici o alta poza, bifati urmatoarea casuta:</p>
            <label for="stergePoza">Stergeti poza?</label>
            <input type="checkbox" name="stergePoza">
        <?php endif; ?>

        <br>
        <br>

        <label for="continut">Continut: </label>
        <textarea name="continut" cols="30" rows="10"><?=$continut?></textarea>

        <input type="submit" value="Salvare" class="buton">
    </form>
<?php
    require_once 'assets/includes/pie.php';
?>