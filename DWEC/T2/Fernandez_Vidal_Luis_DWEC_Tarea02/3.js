function browserFuncionalidades(){

// TODO Añadir comentarios y embellecer la salida (punto o enter entre respuestas)

    if ('bluetooth' in navigator){
        document.write("<p style='font-size: 30px ;'>Tiene Bluetooth!!</p>");
        document.write("<img src='img/party.jpg'>");
    } else {
        document.write("<p style='font-size: 30px ;'>No tiene Bluetooth..</p>")
        document.write("<img src='img/sad.jpg' style='width: 25%;'>");
    }

    if ('geolocation' in navigator){
        document.write("<p style='font-size: 30px ;'>Tiene Geolocalización!!</p>");
        document.write("<img src='img/party.jpg'>");
    } else {
        document.write("<p style='font-size: 30px ;'>No tiene Geolocalizacion..</p>")
        document.write("<img src='img/sad.jpg'>");
    }
}