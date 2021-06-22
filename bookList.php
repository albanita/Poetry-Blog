<?php require_once 'assets/includes/cabecera.php'; ?>
<!--shows on the screen the list of all the books (their title and photo) stored in the database, giving the opportunity to access a book by clicking on its title-->
                    <!--book list-->
                    <div>
                        <h1>Cărți</h1>
                        <?php
                            $carti = bookList($db);
                            if(!empty($carti)):
                                while($carte = mysqli_fetch_assoc($carti)):
                                    $titlu = $carte['titlu'];
                                    $rutaPoza = $carte['poza'];
                        ?>
                            <article>
                                <p id="titlu"><a href="book.php?titlu=<?= $titlu ?>"><?= $titlu ?></a></p>
                                <div id="pozaRel">
                                    <img src="<?= $rutaPoza ?>" alt="S-a intamplat o eroare si s-a sters poza" height="250px" width="250px" />
                                </div>
                            </article>
                        <?php
                                endwhile;
                            endif;
                        ?>
                        
                    </div> <!--end book list-->

<?php
    require_once 'assets/includes/pie.php';
?>