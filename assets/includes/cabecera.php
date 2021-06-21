<?php
    require_once 'db_conection.php';
    require_once 'gestorBD.php';
?>
<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="utf-8"/>
        <title>Poezii Daniela Baniță</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 375px) and (orientation: portrait)" href="./assets/css/responsive.css">
        <link rel="icon" href="assets/imagini/icon.png">
    </head>

    <!--body-->
    <body>
        <div id="container">


            <header class="cabecera">
                <!--logotip-->
                <div id="logotip">
                    <h1>Poezii Daniela Baniță</h1>
                    <h4>
                        <?php if(isset($_SESSION['user'])): ?>
                            Bun venit Daniela!
                        <?php endif; ?>
                    </h4>
                </div>

                <div class="clearfix"></div>
                <form action="searchPoem.php" method="POST" id="cautare">
                    <label for="numePoezie">Titlul Poeziei:</label>
                    <input type="text" name="numePoezie"/>
                    <input type="submit" value="Caută poezia" class="buton">
                </form>
                <div class="clearfix"></div>
    
                <!--meniu-->
                <nav id="meniu">
                    <ul>
                        <li><a href="index.php">Acasă</a></li>
                        <li><a href="about.php">Despre mine</a></li>
                        <!--<li><a href="listaCarti.php">Din cartea...</a>-->
                        <li><a href="index.php">Din cartea...</a>
                            <ul id="dinCartea">
                                <?php if(isset($_SESSION['user'])): ?>
                                    <li><a href="addBook.php">Adaugă o carte</a></li>
                                <?php endif; ?>
                                <?php
                                    $carti = bookNames($db);
                                    if(!empty($carti)):
                                        while($carte = mysqli_fetch_assoc($carti)):
                                ?>
                                    <li><a href="book.php?titlu=<?= $carte['titlu'] ?>"><?= $carte['titlu'] ?></a></li>
                                <?php
                                        endwhile;
                                    endif;
                                ?>
                            </ul>
                        </li>
                        <li><a href="testimony.php">Mărturia mea</a></li>
                        <?php if(!isset($_SESSION['user'])): ?>
                            <li><a href="connect.php">Conectați-vă</a></li>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user'])): ?>
                            <li><a href="disconnect.php">Deconectare</a></li>
                            <li><a href="addContent.php">Adaugă</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </header>
    
            <div class="clearfix"></div>
            
    
            <!--principal-->
            <div id="principal">
                <section>