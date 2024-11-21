function calculoTetraedro() {
    let altura, area, volumen, lado;
    do { 
     lado = parseFloat(prompt("Dime la longitud del lado del tetraedro"));
} while(isNaN(lado))
    


    altura = lado * (Math.sqrt(6)/3).toFixed(2);
    area = Math.pow(lado, 2) * Math.sqrt(3).toFixed(2);
    volumen = Math.pow(lado, 3) * (Math.sqrt(2) / 12).toFixed(2);

    document.write(`<p>La altura es <strong>${altura}</strong></p> 
                    <p>El area es <strong>${area}</strong></p>
                    <p>El volumen es <strong>${volumen}</strong></p>`); 
    document.write(`<img src="img/calculo.jpg"">`);

}