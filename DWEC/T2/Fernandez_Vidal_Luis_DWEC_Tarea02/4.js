function calcularFechaStarWars() {
    let dia, mes, anyo;

    // Fecha de estreno de Star Wars
    const fechaEstrenoStarWars = new Date(1977, 10, 7);

    // Función auxiliar para validar fecha
    function esFechaValida(dia, mes, anyo) {
        let fecha = new Date(anyo, mes - 1, dia);
        return fecha.getDate() === dia &&
               fecha.getMonth() === mes - 1 &&
               fecha.getFullYear() === anyo;
    }

    // Pedimos al usuario que introduzca una fecha
    let fechaUsuario;
    do {
        alert("Vamos a calcular el tiempo desde el estreno de Star Wars a la fecha que elijas.");
        dia = parseInt(prompt("Dime qué día del mes (1-31):"));
        mes = parseInt(prompt("Dime qué mes del año (1-12):"));
        anyo = parseInt(prompt("Dime qué año:"));

        // Creamos la fecha introducida por el usuario
        fechaUsuario = new Date(anyo, mes - 1, dia);

        // Validaciones
        if (isNaN(dia) || isNaN(mes) || isNaN(anyo) ||
            dia < 1 || dia > 31 ||
            mes < 1 || mes > 12) {
            alert("Por favor, introduce valores válidos para día, mes y año.");
        } else if (!esFechaValida(dia, mes, anyo)) {
            alert("La fecha introducida no es válida.");
        }
    } while (
        isNaN(dia) || isNaN(mes) || isNaN(anyo) ||
        dia < 1 || dia > 31 ||
        mes < 1 || mes > 12 ||
        !esFechaValida(dia, mes, anyo)
    );

    // Calculamos la diferencia en milisegundos
    let milisegundosTranscurridos = fechaUsuario - fechaEstrenoStarWars;

    // Convertimos a días, años y semanas
    let diasTranscurridos = Math.floor(milisegundosTranscurridos / (1000 * 60 * 60 * 24));
    let anyosTranscurridos = Math.floor(diasTranscurridos / 365.25);
    let semanasTranscurridas = diasTranscurridos / 7;

    // Mostramos los resultados
    document.write(`<p style="font-size: 30px;">Han pasado ${diasTranscurridos} días desde el estreno de Star Wars.</p>`);
    document.write(`<p style="font-size: 30px;">Han pasado ${Math.floor(semanasTranscurridas)} semanas desde el estreno de Star Wars.</p>`);
    document.write(`<p style="font-size: 30px;">Han pasado ${anyosTranscurridos} años desde el estreno de Star Wars.</p>`);
    document.write(`<img src="img/star.jpeg" style="width: 25%;">`);
}
