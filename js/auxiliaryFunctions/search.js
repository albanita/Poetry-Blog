
window.onload = function(){
    var title = window.document.getElementById("title");
    var button = window.document.getElementById("btn");

    /*console.log(title);
    console.log(button);*/
    
    button.onclick = function(){
        button.href = button.href + title.value;
    }
}

