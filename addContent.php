<?php
    require_once 'assets/includes/cabecera.php';
    // used to add or edit a poem (the content, that means photo, verses, title and the book the poem belongs to) 
    // and then calls saveContent.php to store the new or updated data in the database
?>
    <!--add/edit-->
            <script type="text/javascript" src="./assets/js/jQuerry.js"></script>
            <script type="text/javascript" src="./assets/js/titleValidation.js"></script>
                    <h1>Adaugă</h1>
                    <form action="saveContent.php" method="POST" id="editeaza" enctype="multipart/form-data">
                        <label for="titlu">Titlu:</label>
                        <input type="text" name="titlu" id="titlu" ></input>
                        <p id="atentiePoezie" hidden style="color: red;">Mai ai o poezie cu acest titlu!</p>
                        <br>
                        <br>
                        <label for="carte">Carte:</label>
                        <select name="carte" required >
                            <option value="-" selected disabled>Alege</option>
                            <?php
                                $carti = bookList($db);
                                if($carti):
                                    while($carte = mysqli_fetch_assoc($carti)):
                            ?>
                                        <option value=<?= $carte['id'] ?>><?= $carte['titlu'] ?></option>
                            <?php
                                    endwhile;
                                endif;
                            ?>
                        </select>
                        <br>
                        <br>
                        <label for="poza">Poză:</label>
                        <input type="file" value="Poză" name="poza">
                        <br>
                        <br>
                        <label for="continut">Continut:</label>
                        <textarea name="continut" cols="50" rows="20"></textarea>
                        <input type="submit" class="buton" value="Salvează">
                    </form>
                    <!--end add/edit-->
<?php
    require_once 'assets/includes/pie.php';
?>