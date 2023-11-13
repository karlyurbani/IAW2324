function calcular_dolar() {
    var dolar = document.getElementById("dolar").value;
    var total = dolar*0.93;
    document.getElementById("resultado").innerHTML = total + "€";
    
}
function calcular_euro() {
    var euro = document.getElementById("euro").value;
    var total = euro*1.07;
    document.getElementById("resultado").innerHTML = total + "$";
    
}