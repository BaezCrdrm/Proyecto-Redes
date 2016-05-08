function evUsuarios(li){
    var hidden = document.getElementById("hiddenSelection");
    
    switch (li.id) {
        case "u1":
            hidden.value = "1";
            break;
        
        case "u2":
            hidden.value = "2";
            break;
    }
}