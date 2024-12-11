<?php
require_once 'a.php';
/**
 * Función para filtrar libros según criterios de copias y géneros
 * @param int|null $minCopias Número mínimo de copias vendidas
 * @param array|null $generos Géneros a filtrar
 * @return array Libros filtrados
 */
function filtrarLibros(?int $minCopias = null, ?array $generos = []): array {
    $datos = []; // Array donde se cargarán los datos de los archivos
    // Cargar datos de ambos CSV
    cargarCSV('datos1.csv', $datos);
    cargarCSV('datos2.csv', $datos);
    
    // Filtrar libros usando array_filter con función anónima
    $librosFiltrados = array_filter($datos, function($libro) use ($minCopias, $generos) {
        // Filtrar por número mínimo de copias
        if ($minCopias !== null) {
            $copias = (int)str_replace([',', '.'], '', $libro['Copias Vendidas']);
            if ($copias < $minCopias) {
                return false;
            }
        }
        
        // Filtrar por géneros
        if (!empty($generos)) {
            $generoLibro = $libro['Género'];           
            return in_array($generoLibro, $generos);
        }
        
        return true;
    });

    return $librosFiltrados;
}