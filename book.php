<?php
    require_once 'assets/includes/cabecera.php';
?>
    <!--carte-->
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

                        <?php if(isset($_SESSION['user'])): ?>
                            <div>
                                <a href="deleteBook.php?id=<?=$carte['id']?>&pozaCarte=<?=$poza?>" class="buton-rosu">Sterge cartea</a>
                            </div>
                        <?php endif; ?>
                        
                        
                    </div> <!--fin volum-->
<?php
    require_once 'assets/includes/pie.php';
?>