<?php
    require_once 'assets/includes/cabecera.php';
    // used to show on screen the data of a book by querry string parameters like titlu (means title) and poza (wich means photo) that stores the location of the photo inside the server
?>
    <!--book-->
                    <div>
                        <?php
                            $titluCarte = $_GET['titlu'];
                            $carte = getBook($db, $titluCarte);
                            $poza = $carte['poza'];
                            $poezii = poemsListFromBook($db, $titluCarte);
                        ?>
                        <h1><?=$titluCarte?></h1>
                        <?php if($poza != ''): ?>
                            <div id="pozaRel">
                                <img src="<?= $poza ?>" alt="S-a intamplat o eroare si s-a sters poza de profil" height="250px" width="250px" />
                            </div>
                        <?php endif; ?>
                        
                        <?php
                            if(!empty($poezii)):
                                while($poezie = mysqli_fetch_assoc($poezii)):
                        ?>
                            <article>
                                <p id="titlu"><a href="poem.php?id=<?= $poezie['id'] ?>"><?= $poezie['titlu'] ?></a></p>
                                <p id="detalii"><?= $poezie['dataAdaugare'] ?> | <?= $titluCarte ?></p>
                                <p id="parte"><?= substr($poezie['continut'], 0, 50).'...' ?></p>
                            </article>
                        <?php
                                endwhile;
                            endif;
                        ?>

                        <?php if(isset($_SESSION['user'])):
                            // if the author is online, you can remove the book if she wishes
                            ?>
                            <div>
                                <a href="deleteBook.php?id=<?=$carte['id']?>&pozaCarte=<?=$poza?>" class="buton-rosu">Sterge cartea</a>
                            </div>
                        <?php endif; ?>
                        
                        
                    </div> <!--end book-->
<?php
    require_once 'assets/includes/pie.php';
?>