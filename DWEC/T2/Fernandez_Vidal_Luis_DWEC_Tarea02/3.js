function browserFuncionalidades(){

    if ('bluetooth' in navigator){
        document.write("Tiene bluetooth");
    } else {
        document.write("No tiene bluetooth")
    }

    if ('geolocation' in navigator){
        document.write("Tiene geolocalizacion");
    } else {
        document.write("No tiene geolocalizacion")
    }
}