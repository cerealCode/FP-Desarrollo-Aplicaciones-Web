function multiplicarChar() {
    // Declaramos las variables
    let stringOriginal, caracterARepetir, numeroRepeticiones;
  
    // Pedimos las variables al usuario con validaciones en un bucle do-while
    do {
      stringOriginal = prompt("Introduce una frase:");
      caracterARepetir = prompt("¿Qué caracter quieres repetir?");
      numeroRepeticiones = parseInt(prompt("¿Cuántas veces quieres repetirlo?"), 10);
  
      //Mensajes de alerta si los datos no cumplen las validaciones
      if (stringOriginal === "" || caracterARepetir === "") {
        alert("Debe rellenar todos los campos.");
      }
      if (isNaN(numeroRepeticiones)) {
        alert("El número de repeticiones debe ser un número válido.");
      }
      if (caracterARepetir.length !== 1) {
        alert("Debe introducir un solo carácter a repetir.");
      }
      if (numeroRepeticiones < 0) {
        alert("El número de repeticiones no puede ser negativo.");
      }
      // Validaciones de entrada
    } while (
      stringOriginal === "" || 
      caracterARepetir === "" || 
      isNaN(numeroRepeticiones) ||
      caracterARepetir.length !== 1 || 
      numeroRepeticiones < 0
    );
  
    // Construcción del resultado
    let resultado = "";
  
    for (let i = 0; i < stringOriginal.length; i++) {
      // Comprobamos si el carácter actual coincide con el carácter a repetir
      if (stringOriginal.charAt(i) === caracterARepetir) {
        // Si numeroRepeticiones es 0, omitimos el carácter
        if (numeroRepeticiones === 0) {
          continue;
        }
        // Repetimos el carácter el número de veces especificado
        for (let j = 0; j < numeroRepeticiones; j++) {
          resultado += caracterARepetir;
        }
      } else {
        // Agregamos el carácter actual si no coincide con caracterARepetir
        resultado += stringOriginal.charAt(i);
      }
    }
  
    // Mostramos el resultado al usuario
    document.write(`<p style="font-size: 30px ;">La frase final es: <strong>${resultado}</strong></p>`);
    document.write(`<img src="img/abc.jpg">`);
  }
  