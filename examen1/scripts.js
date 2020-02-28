function mostrarFoto13(){
    document.getElementById("foto").style.display = "block";
}
    

function ocultarFoto13(){
    document.getElementById("foto").style.display = "none";
}

function validarTelefono13(){
    var telefono;
    telefono = document.getElementById("telefono").value;
    var digtel = new Array();
    var tel = telefono.length;
    var flagDigitos = false;
    var flagCaracteres = false;

    if(tel < 9){
        flagDigitos = true;
        digtel.push("El telefono debe tener exactamente 10 digitos");
    }
    var caracteres = 0;
    for (var i=0; i<tel; i++){
        if ((telefono.charCodeAt(i) >= 48) && (telefono.charCodeAt(i) <= 57)) caracteres++;
    }
    if (caracteres != 10){
        flagCaracteres = true;
        digtel.push("El telefono debe sólo contener numeros del 0 al 9");
    }

    if(!flagDigitos && !flagCaracteres){
        document.getElementById("msg").innerHTML="";
        digtel.push("El telefono ingresado es correcto");
    }else{
        imprimirErrores(digtel);
    }
}

function imprimirErrores(errores){
    //borramos todos lo errores impresos anteriormente si es que existen
    var listaErrores = document.getElementById("msg");
    listaErrores.innerHTML = "";

    //leemos el arreglo errores y por cada uno de sus elementos creamos un elemento li que añadimos al tag ul que representa o muestra la lista de errores
    errores.forEach(function (error){
        var li = document.createElement("li");
        li.innerHTML = "<span class = 'error'>"+error+"</span>";
        listaErrores.appendChild(li);
    });
}


