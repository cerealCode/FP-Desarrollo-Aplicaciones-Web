function calculoTetraedro() {
    let altura, area, volumen, lado;
    do { 
     lado = parseFloat(prompt("Dime la longitud del lado del tetraedro"));
} while(isNaN(lado))
    


    altura = lado * (Math.sqrt(6)/3);
    area = Math.pow(lado, 2) * Math.sqrt(3);
    volumen = Math.pow(lado, 3) * (Math.sqrt(2) / 12);

    document.write(`La altura es  ${altura}. El area es  ${area}. El volumen es  ${volumen}`); //TODO Add <p> to format all document.write

}