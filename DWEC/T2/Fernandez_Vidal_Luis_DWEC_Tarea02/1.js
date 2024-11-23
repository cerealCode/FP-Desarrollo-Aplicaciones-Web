function generadorLoteria() {
    // Genera un numero del 0 al 9 para cada variable del número ganador
    //Utilizamos Math.random para generar un número aleatorio entre 0 y 0,999...y lo multiplicamos por 10
    //Usamos Math.floor para redondear a la baja el número generado por Math.random y obtener un entero de un sólo digito
    let decenasMillar = Math.floor(Math.random() * 10);
    let millares = Math.floor(Math.random() * 10);
    let centenas = Math.floor(Math.random() * 10);
    let decenas = Math.floor(Math.random() * 10);
    let unidades = Math.floor(Math.random() * 10);
    //Genera el reintegro
    let reintegro = Math.floor(Math.random() * 100);
    
    // Inicializamos la variable resultado a cadena vacia y le concatenamos los valores anteriores forzando el casteo a string
    let numeroGanador = "" + decenasMillar + millares + centenas + decenas + unidades;
    document.write(`<p style="font-size: 30px;">El décimo ganador ha sido: <strong>${numeroGanador}</strong>. El reintegro es el número <strong>${reintegro}</strong>.</p>`);
    document.write(`<img src="img/loteria.jpeg">`);

}


