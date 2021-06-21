<?php
    require_once 'assets/includes/cabecera.php';
?>
     <!--poezie-->
     <div>
                        <?php
                            $id = $_GET['id'];
                            $poezie = getPoemID($db, $id);
                            $titlu = $poezie['titlu'];
                        ?>
                        <h1><?= $titlu ?></h1>

                        <?php
                            if($poezie['poza'] != ''): 
                        ?>
                                <div id="pozaRel">
                                    <img src="<?= $poezie['poza'] ?>" alt="" height="40%" width="40%" />
                                </div>
                            <?php endif; ?>
                            
                        <div>
                            <p id="versuri">
                                <?= "\r\n".$poezie['continut']; ?>
                            </p>

                            <div id="versuri">
                                <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v8.0" nonce="qMA1Ys6c"></script>
<div class="fb-share-button" data-href="http://blog-poezii-danab.rf.gd/poem.php?id=<?=$id?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fblog-poezii-danab.rf.gd%2Fpoezie.php%3Fid&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Distribuie</a></div>
                             </div>

                            <?php if(isset($_SESSION['user'])): ?>
                            <a href="deleteContent.php?id=<?=$id;?>" class="buton-rosu">Sterge</a>
                            <a href="changeContent.php?id=<?=$id;?>" class="buton-albastru">Editează</a>
                            <?php endif;?>
                        </div>

                        
                        <!--sectia de comentarii-->
                            <!--comentarii anterioare-->
                            <?php 
                                $comentariiVizibile = getVisibleComments($db, $id);
                                $comentariiNOVizibile = getInvizibleComments($db, $id);
                            ?>

                            <?php if(!empty($comentariiVizibile)): 
                                    while($comentariu = mysqli_fetch_assoc($comentariiVizibile)):
                                        $nume = $comentariu['nume'];
                                        $cont = $comentariu['comentariu'];
                                        $dataAdaugare = $comentariu['dataAdaugare'];
                            ?>
                                <!-- vizibile -->
                                <div id="comentarii">
                                    <div>
                                        <label for="nume">Nume: <?=$nume;?></label>
                                        <br>
                                        <p id="text">
                                            <?=$cont;?>
                                        </p>
                                        <p>
                                            Data: <?=$dataAdaugare;?>
                                        </p>
                                    </div>
                                </div>
                            <?php 
                                    endwhile;
                                endif; 
                            ?>

                            <?php if(isset($_SESSION['user'])): ?>

                                <?php if(!empty($comentariiNOVizibile)): 
                                        while($comentariu = mysqli_fetch_assoc($comentariiNOVizibile)):
                                            $nume = $comentariu['nume'];
                                            $cont = $comentariu['comentariu'];
                                            $dataAdaugare = $comentariu['dataAdaugare'];
                                            $id = $comentariu['id'];
                                ?>
                                <!-- NO vizibile -->
                                    <div id="comentarii">
                                        <div>
                                            <label for="nume">Nume: <?=$nume;?></label>
                                            <br>
                                            <p id="text">
                                                <?=$cont;?>
                                            </p>
                                            <p>
                                                Data: <?=$dataAdaugare;?>
                                            </p>
                                            
                                        </div>
                                    </div>
                                <a href="deleteComment.php?id=<?=$id?>" class="buton-rosu">Sterge Comentariul</a>
                                <a href="setCommentVisible.php?id=<?=$id?>" class="buton-verde">Valideaza Comentariul</a>
                                    <?php 
                                            endwhile;
                                        endif; 
                                    ?>
                            <?php endif; ?>
                            
                        <?php if(!isset($_SESSION['user'])): ?>
                                <a href="addComment.php?idCarte=<?=$poezie['idCarte']?>&id=<?=$id;?>" class="buton-albastru">Adaugă un Comentariu</a>
                        <?php endif; ?>
                    </div> <!--fin poezie-->
<?php
    require_once 'assets/includes/pie.php';
?>