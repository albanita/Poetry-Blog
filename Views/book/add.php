<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
        <p class="text-primary h2">Adauga o carte</p>
        <strong>Scrieti mai jos numele cartii care doriti sa o adaugati si apasati pe butonul albastru.</strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?=base_url?>book/save" enctype="multipart/form-data">
                    <div class="mt-2">
                        <input type="text" class="form-control" name="numeCarte" required id="numeCarte" placeholder="Numele cartii">
                    </div>
                    <div class="mt-2">
                        <label for="poza">Alegeti o poza pentru carte: </label>
                        <input type="file" name="poza">
                        <label for="faraPoza">Nu vreau poza</label>
                        <input type="checkbox" checked name="faraPoza">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Adauga Carte</button>
                </form>
            </div>
        </div>
    </div>
</section>