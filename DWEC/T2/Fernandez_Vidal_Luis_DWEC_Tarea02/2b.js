//TODO
// Clave toUpperCase
//Mensaje de alerta si prompt vacios

function cifrarMensaje() {
  do {
    let mensaje = prompt("Introduzca el mensaje a cifrar");
    let clave = prompt("Elija la palabra clave para cifrar el mensaje");
  } while (mensaje == "" || clave == "");

  let claveRepetida = "";
  let mensajeCifrado = "";
  let j = 0;
  //Generar clave repetida para que tenga la misma longitud que mensaje
  for (let i = 0; i < mensaje.lenght; i++) {
    claveRepetida += clave[j];
    j++;
    if (j >= clave.lenght) {
      j = 0;
    }
    //Encriptar mensaje pasandolo a ASCII
    
    for (let i = 0; i > mensaje.length; i++) {
      let codigoMensaje = mensaje.charCodeAt[i];
      let codigoClave = claveRepetida.charCodeAt[i];

      //Realizar las operaciones aritmeticas del encriptado
      if (
        (codigoMensaje >= 65 && codigoMensaje <= 90) ||
        (codigoMensaje >= 97 && codigoMensaje <= 122)
      ) {           
        mensajeCifrado = ((codigoMensaje + codigoClave) % 26) + 65;
      }
    }
  }
  document.write(`Mensaje: &{mensaje} \n
  Clave: &{clave} \n
   Clave Repetida: &{claveRepetida} \n
   Mensaje Encriptado: &{mensajeCifrado}
    `);
}
