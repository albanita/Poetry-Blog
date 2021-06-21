<?php require_once 'assets/includes/cabecera.php'; ?>
                    <!--toate poeziile-->
                    <div>
                        <!-- <h1>Ultimele postări</h1> -->
                        <h1>Toate poeziile</h1>
                        <?php
                            //$poezii = ultimele4Poezii($db);
                            $poezii = getAllPoems($db);
                            if(!empty($poezii)):
                                while($poezie = mysqli_fetch_assoc($poezii)):
                                    $nume = collectionName($db, $poezie['idCarte']);
                                    $num = mysqli_fetch_assoc($nume);
                        ?>
                            <article>
                                <p id="titlu"><a href="poem.php?id=<?= $poezie['id'] ?>"><?= $poezie['titlu'] ?></a></p>
                                <p id="detalii"> <?= $poezie['dataAdaugare'] ?> | <?= $num['titlu'] ?> </p>
                                <p id="parte"><?= substr($poezie['continut'], 0, 50).'...' ?></p>
                            </article>
                        <?php
                                endwhile;
                            endif;
                        ?>
                        
                    </div> <!--fin toate poeziile-->

<?php
    require_once 'assets/includes/pie.php';
?>