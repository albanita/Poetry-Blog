<script>
    window.onload = function(){
        var email = window.document.getElementById("emailFallow");
        var btnSave = window.document.getElementById("btnSave");
        var btnDelete = window.document.getElementById("btnDelete");
        
        /*console.log(email);
        console.log(btnSave);
        console.log(btnDelete);*/
        
        btnSave.onclick = function(){
            btnSave.href = btnSave.href+email.value;
        }
        
        btnDelete.onclick = function(){
            btnDelete.href = btnDelete.href + email.value;
        }
    }
</script>

<!--page content-->
<section class="py-5 mt-2 mb-5">
    <div class="container myBorderStyle mt-5 pb-2 bg-white">
        <div class="col-12">
            <div class="form-floating mt-5">
                <p class="mt-1 mb-1">
                <p class="text-primary h2">Urmareste blogul</p>
                <strong>Daca doriti sa fiti la curent cu noile poezii pe care autorul le publica, va rugam sa introduceti mai jos adresa dumneavoastra de email si apasati pe butonul verde. <br><br></strong>
                <strong>Daca nu mai doriti sa urmatiti blogul si sa fiti la curent cu ultimele publicari, introduceti adresa dumneavoastra de email, pe care primiti notificarile, si apasati pe butonul rosu.</strong>
                <!--<strong><br><br>Pentru orice alta neclaritate, <a href="<?=base_url?>contact/index">contactati administratorul.</a></strong>-->
                </p>
                <input type="email" class="form-control" id="emailFallow" placeholder="name@example.com">
                <a href="<?=base_url?>news/add&email=" id="btnSave" type="input" class="btn btn-success mt-2 mb-2">Urmareste blogul</a>
                <a href="<?=base_url?>news/delete&email=" id="btnDelete" type="input" class="btn btn-danger mt-2 mb-2">Nu mai urmari blogul</a>
            </div>
        </div>
    </div>
</section>
<!--end page content-->