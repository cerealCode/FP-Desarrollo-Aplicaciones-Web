<?php
/**
 * Ejercicio 2 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernandez Vidal
 */

require_once 'a.php';

function filtrarLibros(?int $minCopias = null, ?array $generos = []): array {
    $datos = []; // Array donde se cargarán los datos de los archivos

    cargarCSV($datos, 'datos1.csv');
    cargarCSV($datos, 'datos2.csv');
    
    return array_filter($datos, function($libro) use ($minCopias, $generos) {
        // Filtrar por copias vendidas si se especifica
        if ($minCopias !== null) {
            $copias = (int)str_replace([',', '.'], '', $libro['Copias Vendidas']);
            if ($copias < $minCopias) {
                return false;
            }
        }
        
        // Filtrar por géneros si hay géneros seleccionados
        if (!empty($generos)) {
            $generoLibro = strtolower(str_replace(
                ['á', 'é', 'í', 'ó', 'ú', ' ', 'Ciencia Ficción'], 
                ['a', 'e', 'i', 'o', 'u', '_', 'ciencia_ficcion'], 
                $libro['Género']
            ));
            
            return in_array($generoLibro, $generos);
        }
        
        return true;
    });
}