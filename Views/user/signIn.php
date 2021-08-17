<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
        <p class="text-primary h2">Conectati-va</p>
        <strong>Aici se poate conecta doar autorul Daniela Banita. Pentru mai multe informatii, va rugam sa <a href="<?=base_url?>contact/index">contactati administratorul paginii.</a> Multumim pentru intelegere!</strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?=base_url?>user/logIn">
                    <div class="mt-2">
                        <label for="usrName" class="form-label">Nume cont</label>
                        <input type="text" class="form-control" name="usrName" id="email">
                    </div>
                    <div class="mt-2">
                        <label for="password" class="form-label">Parola</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Conectati-va</button>
                </form>
            </div>
        </div>
    </div>
</section>