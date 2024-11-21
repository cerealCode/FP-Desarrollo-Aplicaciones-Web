function generadorLoteria() {
    // Genera un numero del 0 al 9 para cada variable del número ganador
    let decenasMillar = Math.floor(Math.random() * 10);
    let millares = Math.floor(Math.random() * 10);
    let centenas = Math.floor(Math.random() * 10);
    let decenas = Math.floor(Math.random() * 10);
    let unidades = Math.floor(Math.random() * 10);
    //Genera el reintegro
    let reintegro = Math.floor(Math.random() * 100);
    

    let resultado = "" + decenasMillar + millares + centenas + decenas + unidades;
    document.write(`<p style="font-size: 30px;">El décimo ganador ha sido: <strong>${resultado}</strong>. El reintegro es el número <strong>${reintegro}</strong>.</p>`);
    document.write(`<img src="img/loteria.jpeg">`);

}


