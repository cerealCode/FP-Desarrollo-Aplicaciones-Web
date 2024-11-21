function calcularFechaStarWars() {
    let dia, semana, mes, anyo;
    const fechaEstrenoStar = Date("07, 11, 1977");
    
    do {
        alert("Te veo melancólico, así que vamos a calcular el tiempo que ha pasado desde la fecha de estreno de Star Wars a otra fecha")
        dia = parseInt(prompt("Dime qué dia del mes con un valor numérico"));
        mes = parseInt(prompt("Dime qué mes del año con un valor numérico"));
        anyo = parseInt(prompt("Dime qué año con un valor numérico"));

    } while(
        date.getDate() !== dia ||
        date.getMonth() !== month - 1 ||
        date.getFullYear() !== year
        
        
    )
    let fechaUsuario = new Date(dia, mes -1, anyo)
    
    



    
    document.write(`<p style="font-size: 30px ;"> Han Pasado desde la fecha de estro de Star Wars</p>`);
    document.write(`<img src="img/star.jpeg" style="width: 25%;">`);


}