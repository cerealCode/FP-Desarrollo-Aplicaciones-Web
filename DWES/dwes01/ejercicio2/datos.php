<?php
/**
 * Ejercicio 3 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernández Vidal
 */

require_once 'b.php';

// Inicializar variables
$minCopias = null;
$generos = [];
$datos = [];
$errores = [];

// Lista de géneros válidos
$generosValidos = ['fantasia', 'ciencia_ficcion', 'misterio', 'terror', 'romance', 'aventura'];

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar copias mínimas
    if (!empty($_POST['copias'])) {
        if (!is_numeric($_POST['copias'])) {
            $errores['copias'] = "El número de copias debe ser un valor numérico.";
        } elseif ($_POST['copias'] < 0) {
            $errores['copias'] = "El número de copias no puede ser negativo.";
        } else {
            $minCopias = (int)$_POST['copias'];
        }
    }
    
    // Validar géneros seleccionados
    if (isset($_POST['generos'])) {
        if (!is_array($_POST['generos'])) {
            $errores['generos'] = "Formato de géneros inválido.";
        } else {
            // Validar cada género seleccionado
            foreach ($_POST['generos'] as $genero) {
                if (!in_array($genero, $generosValidos)) {
                    $errores['generos'] = "Uno o más géneros seleccionados no son válidos.";
                    break;
                }
            }
            if (!isset($errores['generos'])) {
                $generos = array_map('strtolower', $_POST['generos']);
            }
        }
    }

    // Si no hay errores, proceder con la búsqueda
    if (empty($errores)) {
        $datos = filtrarLibros($minCopias, $generos);
    }
}

// Si es la primera carga o hay errores, cargar todos los libros
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !empty($errores)) {
    $datos = filtrarLibros();
}

// Incluir la página principal que mostrará los resultados
include 'index.php';
?>