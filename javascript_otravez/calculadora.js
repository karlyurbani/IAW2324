function sumar(){
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x+y;
}
function restar(){
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x-y;
}
function multiplicar(){
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x*y;
}
function dividir(){
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    if (y!=0){
        return x/y;    
    }
        return "No es posible dividir por 0"
    }
function potencia(){
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x(Math.pow());
}