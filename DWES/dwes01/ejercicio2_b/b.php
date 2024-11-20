<?php
/**
 * Ejercicio 2 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernandez Vidal
 */

require_once 'a.php';


function filtrarLibros(?int $minCopias = null, ?string $genero = null): array {
    
$datos = []; // Array donde se cargarán los datos de los archivos

cargarCSV($datos, 'datos1.csv');
cargarCSV($datos, 'datos2.csv');
    
    
    // Aplicar filtros TODO COMBINAR AMBOS FILTROS
    return array_filter($datos, function($libro) use ($minCopias, $genero) {
        // Si se especifica minCopias, filtrar por copias vendidas
        if ($minCopias !== null) {
            $copias = (int)str_replace(',', '', $libro['Copias Vendidas']);
            if ($copias < $minCopias) {
                return false;
            }
        }
        
        // Si se especifica género, filtrar por género
        if ($genero !== null && $libro['Género'] !== $genero) {
            return false;
        }
        
        return true;
    });
}
