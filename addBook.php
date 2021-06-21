<?php
    require_once 'assets/includes/cabecera.php';
?>

    <h1>Adaugă o carte</h1>
    <form action="saveBook.php" method="POST" id="editeaza" enctype="multipart/form-data">
        <label for="nume">Numele Cărții</label>
        <input type="text" name="nume">
        <br>
        <br>
        <label for="poza">Poză:</label>
        <input type="file" value="Poză" name="poza">
        <input type="submit" class="buton" value="Adaugă">
    </form>

<?php
    require_once 'assets/includes/pie.php';
?>