<?php 
require_once 'b.php';

// Variables iniciales
$minCopias = null;
$generos = [];
$errores = [];

// Procesar envío de formulario
//Verifica que los datos se han enviado a traés del formulario se ha enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar número de copias
    if (!empty($_POST['copias'])) {
        //Valida que $minCopias es un número mayor a 0
        if (!is_numeric($_POST['copias'])) {
            $errores['copias'] = "El número de copias debe ser un valor numérico.";
        } elseif ($_POST['copias'] < 0) {
            $errores['copias'] = "El número de copias no puede ser negativo.";
        } else {
            //Castea el numero introducido a integer
            $minCopias = (int)$_POST['copias'];
        }
    }

    // Géneros aceptados para el filtrado
    $generosValidos = ['Fantasía', 'Ciencia Ficción', 'Misterio', 'Terror'];

    //Verifica que los datos se han enviado a traés del formulario se ha enviado via POST
    if (isset($_POST['generos'])) {
        //Verifica que los datos se han recibido en un array
        if (!is_array($_POST['generos'])) {
            $errores['generos'] = "Formato de géneros inválido.";
        } else {
            //Recorre el array $
            foreach ($_POST['generos'] as $genero) {
                if (!in_array($genero, $generosValidos)) {
                    $errores['generos'] = "Uno o más géneros seleccionados no son válidos.";
                }
            }
            //Si no se a producido nigún error $generos el array enviado desde el formulario
            if (!isset($errores['generos'])) {
                $generos = $_POST['generos'];
            }
        }
    }

    // Si no hay errores, filtrar datos
    if (empty($errores)) {
        $datos = filtrarLibros($minCopias, $generos);
    }
}

// Cargar todos los libros en la carga inicial
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $datos = filtrarLibros();
}

// Incluir página principal para mostrar resultados
include 'index.php';