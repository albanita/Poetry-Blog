<?php
    require_once 'assets/includes/cabecera.php';
    // used by the author to log in with her username and password then calls login.php with the POST method
?>

    <p>
        Aici se poate conecta doar autorul Daniela Baniță. Dacă doriți mai multe detalii, vă rugăm 
        să contactați <a href="mailto:alinbanita@gmail.com">administradorul</a> paginii. Vă mulțumim
        pentru înțelegere.
        <?php if(isset($_SESSION['eroare'])): ?>
            <?=$_SESSION['eroare'];?>
        <?php 
            unset($_SESSION['eroare']);
            endif;
        ?>
    </p>
    <form action="login.php" method="POST" id="comentariu">
        <label for="nume">Nume Utilizator:</label>
        <input type="text" name="nume">
        <label for="parola">Parolă:</label>
        <input type="password" name="parola">
        <input type="submit" value="Conectare" class="buton">
    </form>

<?php
    require_once 'assets/includes/pie.php';
?>