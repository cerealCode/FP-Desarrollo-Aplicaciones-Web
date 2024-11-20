function multiplicarChar() {
  let stringOriginal, caracterARepetir, numeroRepeticiones;
  
  do {
      stringOriginal = prompt("Introduce una frase");
      caracterARepetir = prompt("¿Qué caracter quieres repetir?");
      numeroRepeticiones = parseInt(prompt("¿Cuántas veces quieres repetirlo?"));

      if (stringOriginal == "" || caracterARepetir == "") alert("Debe rellenar todos los campos");
      if (isNaN(numeroRepeticiones)) alert("El número de repeticiones debe ser un número válido");

  } while (
      stringOriginal == "" || 
      caracterARepetir == "" || 
      isNaN(numeroRepeticiones) ||
      numeroRepeticiones < 0
  );

  let resultado = "";

  for (let i = 0; i < stringOriginal.length; i++) {
      if (stringOriginal[i] === caracterARepetir) {
          if (caracterARepetir === 0) stringOriginal[i] = "";
          // En lugar de repeat(), usamos un bucle for para repetir el carácter
          for (let j = 0; j < numeroRepeticiones; j++) {
              resultado += caracterARepetir;
          }
      } else {
          resultado += stringOriginal[i];
      }
  }

  document.write(`La frase final es ${resultado}.`);
}