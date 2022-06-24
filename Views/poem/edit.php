<script>
    window.onload = function(){
        var pozaExemplu = document.getElementById("pozaExemplu");
        var chDeletePoza = document.getElementById("chDeletePoza");
    };
    
    function hidePoza(){
        if(pozaExemplu.hidden == false){
            pozaExemplu.hidden = true;
        }
        else{
            pozaExemplu.hidden = false;
        }
        
        return false;
    }
</script>

<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
            <strong>Editati poezia: </strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?=base_url?>poem/update&id=<?=$poem->id?>" enctype="multipart/form-data">

                    <div class="mt-2">
                        <input type="text" class="form-control" id="numePoezie" name="numePoezie" required value="<?=$poem->titlu?>">
                        <!--<strong class="text-danger">Acest titlu mai exista odata!</strong> <!--aviz-->
                    </div>

                    <div class="mt-2">
                        <label for="poza">Alegeti o poza pentru poezie: </label>
                        <input type="file" name="poza">
                    </div>
                    
                    <?php if($poem->poza != null || $poem->poza != ''): ?>
                    <div class="mt-2" id="pozaExemplu">
                        <img src="<?=image_root.$poem->titlu.".jpg"?>" class="rounded mb-2" style="width: 25%;" alt="Poza poezie">
                    </div>
                    <label for="pozaExemplu">Sterge poza</label>
                    <input type="checkbox" id="chDeletePoza" name="chDeletePoza" onclick="hidePoza();">
                    <?php endif; ?>
                    
                    <br><br>

                    <label for="carte">Alegeti cartea: </label>
                    <select name="carte" required>
                        <option value="<?=$poem->idCarte?>" selected><?=$selectedBookName?></option>
                        <?php while($book = $books->fetch_object()): ?>
                            <option value="<?=$book->id?>"><?=$book->titlu?></option>
                        <?php endwhile; ?>
                    </select>

                    <div class="mt-2">
                        <textarea class="form-control" style="height: 350px;" id="floatingTextarea" name="versuri" required><?=$poem->continut?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Salveaza Poezia</button>
                </form>
            </div>
        </div>
    </div>
</section>