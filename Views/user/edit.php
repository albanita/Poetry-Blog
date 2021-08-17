<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
            <strong class="text-primary h2">Editati datele personale: </strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?=base_url?>user/save" enctype="multipart/form-data">
                    <div class="mt-2">
                        <label for="poza">Schibati poza de profil: </label>
                        <input type="file" name="poza">
                        <label for="faraPoza">Nu mai vreau poza de profil</label>
                        <?php if($user->getPhoto() == null || $user->getPhoto() == ''): ?>
                        <input type="checkbox" checked name="faraPoza">
                        <?php else: ?>
                        <input type="checkbox" name="faraPoza">
                        <?php endif; ?>
                    </div>

                    <div class="mt-2">
                        <textarea class="form-control" style="height: 350px;" id="floatingTextarea" name="despre" placeholder="Despre mine..."><?=$user->getAbout()?></textarea>
                    </div>

                    <div class="mt-2">
                        <label for="email">Email: </label>
                        <input type="email" name="email" value="<?=$user->getEmail()?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Schimba Date Personale</button>
                </form>
            </div>
        </div>
    </div>
</section>