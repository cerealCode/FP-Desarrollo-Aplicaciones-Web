function cifrarMensaje() {
  let mensaje, clave;

  do {
    mensaje = prompt("Introduzca el mensaje a cifrar:");
    if (mensaje === null) {
      // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page
    if (!mensaje) alert("El mensaje no puede estar vacío.");
    }

    

    clave = prompt("Elija la palabra clave para cifrar el mensaje:");
    if (clave === null) {
      alert("Operación cancelada");
      // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page;
    }
    if (!clave) alert("La clave no puede estar vacía.");
  } while (!mensaje || !clave);

  //Pasamos la variable clave a mayusculas para que el cifrado sea consistente
  clave = clave.toUpperCase();
  //Declaramos las variables como Strings vacias para luego apender
  let claveRepetida = "";
  let mensajeCifrado = "";

  // Generar clave repetida
  //Empezamos j como index 0
  let j = 0;
  //Recorremos la string clave con un for y apendemos el caracter en el index j 
  for (let i = 0; i < mensaje.length; i++) {
    claveRepetida += clave.charAt(j);
    //Cuando j supera la longitud de la clave, j se resetea a 0 usando modulus para que j = 0
    j = (j + 1) % clave.length;
  }

  // Cifrar el mensaje paso a paso
for (let i = 0; i < mensaje.length; i++) {
  // Convertir carácter del mensaje a código ASCII
  let codigoMensaje = mensaje.charCodeAt(i);
  
  // Convertir carácter de clave repetida a código ASCII
  let codigoClave = claveRepetida.charCodeAt(i);
 
  // Filtrar solo caracteres alfabéticos (mayúsculas y minúsculas)
  if ((codigoMensaje >= 65 && codigoMensaje <= 90) || 
      (codigoMensaje >= 97 && codigoMensaje <= 122)) {
    
    // Determinar base ASCII según sea mayúscula o minúscula
    let base = codigoMensaje >= 65 && codigoMensaje <= 90 ? 65 : 97;
    
    // Aplicar fórmula de cifrado explicada en el ejercicio
    let nuevoCaracter = String.fromCharCode(
      ((codigoMensaje - base + codigoClave - base) % 26) + base
    );
    
    // Añadir carácter cifrado
    mensajeCifrado += nuevoCaracter;
  } else {
    // Mantener caracteres no alfabéticos sin cambios
    mensajeCifrado += mensaje.charAt(i);
  }
 }

  // Mostrar resultados
  document.write(`
    <p style="font-size: 20px;">Mensaje: ${mensaje}</p>
    <p style="font-size: 20px;">Clave: ${clave}</p>
    <p style="font-size: 20px;">Clave Repetida: ${claveRepetida}</p>
    <p style="font-size: 20px;">Mensaje Encriptado: ${mensajeCifrado}</p>
  `);
  document.write(`<img src="img/carmen.webp" style="width: 25%;">`);
}