<!--page content-->
<section class="py-5 mt-2 mb-5 text-center card-text">
    <div class="container myBorderStyle bg-white">
        <p class="poemTitle"><?=$poem->titlu?></p>
        <div class="text-center">
            <?php if($poem->poza != null || $poem->poza != ''): ?>
            <img src="<?=image_root.$poem->titlu.".jpg"?>" class="rounded mb-2" style="width: 25%;" alt="Poza poezie">
            <?php endif; ?>
            <p class="poemVerses">
                <?=$poem->continut?>
            </p>
        </div>
        
        
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v8.0" nonce="qMA1Ys6c"></script>
<div class="fb-share-button" data-href="<?=base_url?>poem/show&id=<?=$poem->id?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fblog-poezii-danab.rf.gd%2Fpoezie.php%3Fid&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Distribuie</a></div>
        
        <div class="container text-right">
            <?php if(!Utils::userLogedIn()): ?>
            <!--user not logged in-->
            <a href="<?=base_url?>comment/add&id=<?=$poem->id?>&idBook=<?=$poem->idCarte?>"><button type="button" class="btn btn-primary mb-3">Adauga un comentariu</button></a>
            <!--end user not logged in-->
            <?php endif; ?>

            <?php if(Utils::userLogedIn()): ?>
            <!--user logged in-->
            <a href="<?=base_url?>poem/edit&id=<?=$poem->id?>"><button type="button" class="btn btn-info mb-3">Editeaza poezia</button></a>
            <a href="<?=base_url?>poem/delete&id=<?=$poem->id?>"><button type="button" class="btn btn-danger mb-3">Sterge poezia</button></a>
            <!--end user logged in-->
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if($comments -> num_rows > 0): ?>
    <!--comments list-->
    <p class="h1 text-primary text-center">Comentarii</p>
    
    <?php while($comm = $comments->fetch_object()): ?>
        <?php if($comm->vizibil): ?>
        <!--visible comment-->
        <section class="card-text mb-5">
            <div class="container myBorderStyle bg-white">
                <p>Nume: <?=$comm->nume?></p>
                <p>Data adaugare: <?=$comm->dataAdaugare?></p>
                <p>Comentariu: <br></p>
                <p><?=$comm->comentariu?></p>
            </div>
        </section>
        <!--end visible comment-->
        <?php endif; ?>
        
        <!--invisible comment-->
        <?php if(!$comm->vizibil && Utils::userLogedIn()): ?>
        <section class="card-text mb-5">
            <div class="container myBorderStyle bg-white">
                <p>Nume: <?=$comm->nume?></p>
                <p>Data adaugare: <?=$comm->dataAdaugare?></p>
                <p>Comentariu: <br></p>
                <p><?=$comm->comentariu?></p>
                <!--user loggen in-->
                <div class="container text-right">
                    <a href="<?=base_url?>comment/validate&id=<?=$comm->id?>"><button type="button" class="btn btn-success mb-3">Salveaza comentariul</button></a>
                    <a href="<?=base_url?>comment/delete&id=<?=$comm->id?>"><button type="button" class="btn btn-danger mb-3">Sterge comentariul</button></a>
                </div>
                <!--end user logged in-->
            </div>
        </section>
        <!--end invisible comment-->
        <?php endif; ?>
        
    <?php endwhile; ?>
    <!--end comments list-->
<?php endif; ?>

<!--end page content-->