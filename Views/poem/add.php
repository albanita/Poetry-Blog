<script>
    window.onload = function(){
        var title = window.document.getElementById("numePoezie");
        var warning = window.document.getElementById("warning");
        
        var titles = [];
        
        $.ajax('<?=base_url?>poem/getAllTitles', {
            datatype: 'text',
            success: (text) => {
                text = text.toUpperCase();
                titles = text.split("|");
                titles.shift();
                titles.shift();
                //console.log(titles);
            },
            error: function(){
                alert("ERROR!!");
            }
        });
        
        title.onkeyup = function(){
            verify();
        };
        
        function verify(){
            if(titles.includes(title.value.trim().toUpperCase())){
                warning.hidden = false;
            }
            else{
                warning.hidden = true;
            }
        };
    };
</script>

<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <p class="mt-4 mb-1">
            <strong>Introduceti mai jos o poezie noua: </strong>
        </p>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?=base_url?>poem/save" enctype="multipart/form-data">

                    <div class="mt-2">
                        <input type="text" class="form-control" id="numePoezie" name="numePoezie" placeholder="Numele poeziei" required>
                        <strong id="warning" hidden class="text-danger">Poezie cu acest titlu, mai exista odata!</strong>
                    </div>

                    <div class="mt-2">
                        <label for="poza">Alegeti o poza pentru poezie: </label>
                        <input type="file" name="poza">
                        <label for="faraPoza">Nu vreau poza</label>
                        <input type="checkbox" name="faraPoza">
                    </div>

                    <label for="carte">Alegeti cartea: </label>
                    <select name="carte" required>
                        <option value="-" selected disabled>Alege</option>
                        <?php while($book = $books->fetch_object()): ?>
                            <option value="<?=$book->id?>"><?=$book->titlu?></option>
                        <?php endwhile; ?>
                    </select>

                    <div class="mt-2">
                        <textarea class="form-control" style="height: 350px;" placeholder="Versuri" id="floatingTextarea" name="versuri" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Adauga Poezie</button>
                </form>
            </div>
        </div>
    </div>
</section>