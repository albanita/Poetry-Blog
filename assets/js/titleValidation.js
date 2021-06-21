window.onload = function(){
    var titlu = document.getElementById("titlu");
    var atentiePoezie = document.getElementById("atentiePoezie");
    
    /*console.log(titlu);
    console.log(atentie);*/
    var poezii=[];

    $.ajax('listPoemsTitle.php', {
        datatype: 'text',
        success: (text) => {
            text = text.toUpperCase();
            poezii = text.split("|");
            poezii.shift();
            poezii.shift();
            //console.log(poezii);
        },
        error: function(){
            alert("ERROR");
        }
    });

    titlu.onkeyup = function() {
        validate();
    }

    function validate(){
        if(poezii.includes(titlu.value.trim().toUpperCase())){
            titlu.style.backgroundColor = "red";
            atentiePoezie.hidden = false;
        }
        else if(poezii.includes(titlu.value.trim().toUpperCase()) === false){
            titlu.style.backgroundColor = "white";
            atentiePoezie.hidden = true;
        }
    }
}

