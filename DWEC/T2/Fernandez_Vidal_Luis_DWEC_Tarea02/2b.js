function cifrarMensaje() {

  let mensaje, clave;

  // Pedir mensaje y clave, mostrando alertas si están vacíos y salir si cancela
  do {
    mensaje = prompt("Introduzca el mensaje a cifrar:");
    if (mensaje === null) {
      alert("Operación cancelada");
      return; // Salir de la función si se cancela
    }
    if (!mensaje) alert("El mensaje no puede estar vacío."); //Informar al usuario que el emnsaje no puede estar vacio

    clave = prompt("Elija la palabra clave para cifrar el mensaje:");
    if (clave === null) {
      alert("Operación cancelada");
      return; // Salir de la función si se cancela
    }
    if (!clave) alert("La clave no puede estar vacía."); //Informar al usuario que la clave no puede estar vacia
  } while (!mensaje || !clave);

  // Convertir clave a mayúsculas y declarar claveRepetida y mensajeCifrado como string vacions para luego apender
  clave = clave.toUpperCase();
  let claveRepetida = ""
  let mensajeCifrado = ""

  // Generar clave repetida
  let j = 0;
  for (let i = 0; i < mensaje.length; i++) {
    claveRepetida += clave.charAt(j);
    j++;
    if (j >= clave.length) {
      j = 0;
    }
  }

  //TODO REVISAR CIFRADO https://educacionadistancia.juntadeandalucia.es/formacionprofesional/mod/forum/discuss.php?d=10662
  // Cifrar el mensaje pasando a ASCII
  // Recorremos con bucle for mensaje y clave repetida
for (let i = 0; i < mensaje.length; i++) {
    // Obtener códigos ASCII del carácter del mensaje y de la clave repetida
    let codigoMensaje = mensaje.charCodeAt(i);
    let codigoClave = claveRepetida.charCodeAt(i);

    // Solo cifrar letras
    if (codigoMensaje >= 65 && codigoMensaje <= 90) {
        // Mayúsculas
        mensajeCifrado += String.fromCharCode(((codigoMensaje - 65 + (codigoClave - 65)) % 26) + 65);
    } else if (codigoMensaje >= 97 && codigoMensaje <= 122) {
        // Minúsculas
        mensajeCifrado += String.fromCharCode(((codigoMensaje - 97 + (codigoClave - 65)) % 26) + 97);
    } else {
        // Otros caracteres permanecen iguales
        mensajeCifrado += mensaje.charAt(i);
    }
}

console.log("Mensaje cifrado:", mensajeCifrado);



  // Mostrar resultados con Template Strings
  
  document.write(`
    <p style="font-size: 20px;">Mensaje: ${mensaje}</p>
    <p style="font-size: 20px;">Clave: ${clave}</p>
    <p style="font-size: 20px;">Clave Repetida: ${claveRepetida}</p>
    <p style="font-size: 20px;">Mensaje Encriptado: ${mensajeCifrado}</p>
  `);
  document.write(`<img src="img/carmen.webp" style="width: 25%;">`);

}
