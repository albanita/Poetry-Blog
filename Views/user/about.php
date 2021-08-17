<!--page content-->
<section class="py-4 mt-2 mb-5">
    <div class="container myBorderStyle pb-2 bg-white">
        <div class="d-flex justify-content-center mt-3">
            <img src="<?=image_root?>profil.jpg" style="height: 20%;" class="img-fluid" alt="Poza de profil">
        </div>
        
        <p class="text" name="despre" style="white-space: pre-line">
            <?=$autor->getAbout()?>
        </p>
        
        <div class="text-center">
            <p><a href="https://www.facebook.com/daniela.banita.58"><strong>Contul meu de facebook: </strong><img src="<?=image_root?>facebook.svg" style="width: 5%; height: 5%;" alt="Link facebook"></a></p>
        </div>
        <?php if(isset($_SESSION['user'])): ?>
        <a href="<?=base_url?>user/edit" class="btn btn-success">Editeaza Continutul</a>
        <?php endif; ?>
    </div>
</section>
<!--end page content-->