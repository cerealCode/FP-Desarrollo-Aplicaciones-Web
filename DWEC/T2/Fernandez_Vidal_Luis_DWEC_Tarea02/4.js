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
    // TODO SALIR SI CANCELA
    let fechaUsuario;
    do {
        alert("Te veo melancólico, a ver si te animas calculando el tiempo desde el estreno de Star Wars a la fecha que elijas. Por favor usa este formato dd//mm//aaaa");
        dia = parseInt(prompt("Dime qué día del mes (1-31):"));
        if (dia === null) {
            alert("Operación cancelada");
            // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page; // Salir de la función si se cancela
        }
        mes = parseInt(prompt("Dime qué mes del año (1-12):"));
        if (mes === null) {
            alert("Operación cancelada");
            // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page; // Salir de la función si se cancela
        }
        anyo = parseInt(prompt("Dime qué año:"));
        if (anyo === null) {
            alert("Operación cancelada");
            // window.location.href: Directly redirects to a specific index page
      // history.back(): Goes back to the previous page in the browser history
      // window.history.go(-1): Similar to history.back(), goes back one page; // Salir de la función si se cancela
          }

        // Creamos la fecha introducida por el usuario
        fechaUsuario = new Date(anyo, mes - 1, dia);

        // Validaciones de entrada de datos del usuario
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
    let semanasTranscurridas = Math.floor(diasTranscurridos / 7);

    // Mostramos los resultados con Template String
    document.write(`<p style="font-size: 30px;">Han pasado ${diasTranscurridos} días desde el estreno de Star Wars.</p>`);
    document.write(`<p style="font-size: 30px;">Han pasado ${semanasTranscurridas} semanas desde el estreno de Star Wars.</p>`);
    document.write(`<p style="font-size: 30px;">Han pasado ${anyosTranscurridos} años desde el estreno de Star Wars.</p>`);
    document.write(`<p style="font-size: 30px;">Sí, ya ha pasado tanto tiempo, a lo mejor no era la mejor forma de animarte.</p>`);
    document.write(`<img src="img/star.jpeg" style="width: 25%;">`);
}
