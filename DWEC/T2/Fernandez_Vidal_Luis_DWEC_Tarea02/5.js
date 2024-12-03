function calculoTetraedro() {
    let altura, area, volumen, lado;
    //Pedimos al usuario la longitud del lado
    do { 
     lado = parseFloat(prompt("Dime la longitud del lado del tetraedro"));
     if (lado === null) {
        alert("Operación cancelada");
        // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page; // Salir de la función si se cancela
      }
      if (isNaN(lado)) alert("La longitud del lado debe ser un número")
    } while(isNaN(lado))
    

    //Hacemos los calculos usando los metodos de raiz cuadrada y potencia del objeto Math
    //Usamos el método toFixed del objeto Number para redondear a dos digitos los decimales
    altura = lado * (Math.sqrt(6)/3).toFixed(2);
    area = Math.pow(lado, 2) * Math.sqrt(3).toFixed(2);
    volumen = (Math.pow(lado, 3) * (Math.sqrt(2) / 12)).toFixed(2);

    //Hacemos la salida de datos concatenando para no usar template strings
    document.write("<p>La altura es <strong>" + altura + "</strong></p>" + 
                    "<p>El area es <strong>" + area + "</strong></p>" + 
                    "<p>El volumen es <strong>" + volumen + "</strong></p>"); 
    document.write(`<img src="img/calculo.jpg"">`);

}