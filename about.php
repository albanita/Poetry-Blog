<?php
    require_once 'assets/includes/cabecera.php';
?>
                        <?php
                            $autor = getAutor($db);
                        ?>
                        <!--Despre mine-->
                        <div>
                            <h1>Despre mine</h1>
                            <div id="pozaRel">
                                <img src="<?= $autor['poza']; ?>" alt="Profil" height="40%" width="40%" />
                            </div>
                            <div id="pozaRel">
                                <strong>Profilul meu de facebook: </strong>
                                <a href="https://www.facebook.com/daniela.banita.58"><img src="assets/imagini/facebook.png" height="5%" width="5%"></a>
                            </div>
                            <div>
                                <p id="text">
                                    <?= "\r\n".$autor['despre']; ?>
                                </p>
                            </div>

                            <?php if(isset($_SESSION['user'])): ?>
                                <form action="editPersonalData.php" method="POST" id="btnEditare" enctype="multipart/form-data">
                                    <input type="submit" value="Editează"  class="buton">
                                </form>
                            <?php endif; ?>
                        </div> <!--fin despre mine-->
<?php
    require_once 'assets/includes/pie.php';
?>