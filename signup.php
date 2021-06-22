<?php require_once 'assets/includes/cabecera.php'; ?>
    <!-- used by the user to insert its data for the sign up and then calls register.php to store the data in the DB -->
    <p>
        Cu formularul de mai jos, va veti inregistra numele de utilizator si parola pe acest blog.
        <?php
            if(isset($_SESSION['eroare'])):
        ?>
            <?=$_SESSION['eroare'];?>
        <?php
            unset($_SESSION['eroare']);
            endif;
        ?>
    </p>

    

    <form action="register.php" class="formular" method="POST">

        <label for="email">Adresa de email: </label>
        <input type="email" name="email">

        <label for="numeUtilizator">Numele de utilizator: </label>
        <input type="text" name="numeUtilizator">

        <label for="parola">Parola: </label>
        <input type="password" name="parola">

        <label for="reParola">Rescrieti parola: </label>
        <input type="password" name="reParola">

        <input type="submit" value="Inregistrare" class="buton">
    </form>

<?php require_once 'assets/includes/pie.php';?>