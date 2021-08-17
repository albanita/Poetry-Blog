<?php 
if(isset($_GET)){
    $id = $_GET['id'];
    $idBook = $_GET['idBook'];
}
?>
<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
        <p class="text-primary h2">Adaugati un comentariu</p>
        <strong>Mai jos puteti scrie comentariul dumneavoastră. Va rog sa introduceti numele dumneavoastră si apoi comentariul, in locurile unde aceasta e indicat, apoi apasati pe butonul albastru de mai jos.</strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?= base_url ?>comment/save&idPoem=<?=$id?>&idBook=<?=$idBook?>">
                    <div class="mt-2">
                        <input type="text" class="form-control" id="nume" name="name" placeholder="Numele dumneavoastră" required>
                    </div>
                    <div class="mt-2">
                        <textarea class="form-control" name="comment" style="height: 223px;" placeholder="Comentariul dumneavoastră..." required id="floatingTextarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Comentează</button>
                </form>
            </div>
        </div>
    </div>
</section>