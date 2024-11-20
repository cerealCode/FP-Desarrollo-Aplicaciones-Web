function generadorLoteria() {
    // Genera un numero del 0 al 9 para cada variable
    let decenasMillar = Math.floor(Math.random() * 10);
    let millares = Math.floor(Math.random() * 10);
    let centenas = Math.floor(Math.random() * 10);
    let decenas = Math.floor(Math.random() * 10);
    let unidades = Math.floor(Math.random() * 10);
    

    return resultado = "" + decenasMillar + millares + centenas + decenas + unidades;
}
let numeroGanador = generadorLoteria();
let reintegro = Math.floor(Math.random() * 100);
document.write(`El décimo ganador ha sido: ${numeroGanador}. El reintegro es el número ${reintegro}.`);
