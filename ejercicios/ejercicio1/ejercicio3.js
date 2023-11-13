function comprobacion(dni) {
    var numero = dni.substr(0,dni.length-1);
    var letr = dni.substr(dni.length-1,1);
    numero = numero % 23;
    var letra='TRWAGMYFPDXBNJZSQVHLCKET';
    letra=letra.substring(numero,numero+1);
   if (letra!=letr.toUpperCase()) {
       return false;
           }
   else{
       return true;
    }
   }