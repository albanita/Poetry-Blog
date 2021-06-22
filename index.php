<?php require_once 'assets/includes/cabecera.php'; ?>
                    <!--all the poems-->
                    <!--the index.php shows all the poems stored in the database-->
                    <div>
                        <h1>Toate poeziile</h1>
                        <?php
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
                        
                    </div> <!--end all poems-->

<?php
    require_once 'assets/includes/pie.php';
?>