var area, departamento;

function generaFormAlta(areas, deps)
{
    var sel1 = document.createElement("select");
    sel1.id = "sel1";
    sel1.setAttribute("onchange", "selArea(this)");
    
    for (var index = 0; index < areas.length; index++) {
        var opt = document.createElement("option");
        var txtNode = document.createTextNode(areas[index][1]);
        opt.appendChild(txtNode);
        opt.value = areas[index][0];
        
        sel1.appendChild(opt);   
    }
    var sel2 = document.createElement("select");
    sel2.id = "sel2";
    
    //Cambiar. La caja es temporal
    var inp = document.createElement("input");
    inp.id = "subDom";
    
    //Terminar padre
    var padre = document.createElement("form");
    padre.appendChild(sel1);
    padre.appendChild(sel2);
    padre.appendChild(inp);
    
    document.getElementById("content").appendChild(padre);
    area = areas;
    departamento = deps;
    document.getElementById("sel1").selectedIndex = -1;
}


//Terminar
function selArea(option)
{
    //alert(option.value);
    var deptos = document.getElementById("sel2");
    while(deptos.hasChildNodes())
    {
        deptos.removeChild(deptos.firstChild);
    }
    for (var index = 0; index < departamento.length; index++) {
        if (option.value == departamento[index][2]) {
            var opt = document.createElement("option");
            var txtNode = document.createTextNode(departamento[index][1]);
            opt.appendChild(txtNode);
            opt.value = departamento[index][2];
            
            deptos.appendChild(opt);
        }
    }    
    var txtBox = document.getElementById("subDom");        
    txtBox.value = areas[document.getElementById("sel1").selectedIndex][2];
}