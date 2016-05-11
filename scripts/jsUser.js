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

function btnUsEsp(inp, id)
{
    if(inp.value=="Borrar")
    {
        document.getElementById("hiddenAction").value = "Eliminar";        
    }
    else {
        document.getElementById("hiddenAction").value = "Detalles";
    }
    
    document.getElementById("hiddenCuenta").value = document.getElementById(id).innerHTML;
}