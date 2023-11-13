

function calcularMasa(){
    var altura = parseFloat(document.getElementById("altura").value);
    var peso = parseFloat(document.getElementById("peso").value);
        indice = (peso / Math.pow(altura, 2));

}

if (indice<18.5){
    return "Su IMC es bajo";
}

else if (indice=18.5 && 24.9){
    document.getElementById('resultado') = "Su IMC es normal";
}

else if (indice>25.0 && 29.9){
    return "Su indice es superior al normal";
}

else if  (indice> 30.00){
    return "Usted esta obeso";
}