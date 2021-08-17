<!--page content-->
<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
        <p class="text-primary h2">Inregistrare</p>
        <strong>Introduceti datele mai jos pentru a va inregistra. Pentru mai multe informatii, va rugam sa <a href="<?=base_url?>contact/index">contactati administratorul paginii.</a> Multumim pentru intelegere!</strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form action="<?=base_url?>user/register" method="POST">
                    <div class="mt-2">
                        <label for="usrName" class="form-label">Nume cont</label>
                        <input type="text" name="usrName" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mt-2">
                        <label for="pass1" class="form-label">Parola</label>
                        <input type="password" class="form-control" id="pass1" name="pass1">
                    </div>
                    <div class="mt-2">
                        <label for="pass2" class="form-label">Rescrieti Parola</label>
                        <input type="password" class="form-control" id="pass2" name="pass2">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Inregistrare</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--end page content-->