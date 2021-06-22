<?php
    require_once 'assets/includes/cabecera.php';
    // when the author is logged in, she can change its personal data and then calls savePersonalData.php to store the updated data in the database
?>

                    <?php
                        $autor = getAutor($db);
                    ?>
                    <form action="savePersonalData.php" class="formular" enctype="multipart/form-data" method="POST">
                        <label for="email">Email: </label>
                        <input type="email" name="email" value="<?= $autor['email']; ?>">

                        <br>
                        <br>

                        <label for="poza">Poza: </label>
                        <input type="file" name="poza">

                        <br>
                        <br>

                        <label for="despre">Continut despre: </label>
                        <textarea name="despre" cols="30" rows="10"><?=$autor['despre'];?></textarea>

                        <input type="submit" value="Salvează"  class="buton">
                    </form>

<?php
    require_once 'assets/includes/pie.php';
?>