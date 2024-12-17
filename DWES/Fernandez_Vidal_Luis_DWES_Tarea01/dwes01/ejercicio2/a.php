<?php
/**
 * Función para cargar datos desde archivos CSV
 * @param string $nombreArchivo Nombre del archivo CSV a leer
 * @param array &$datos Array por referencia donde se guardarán los datos
 * @return array|false Array de datos o false si falla
 */
function cargarCSV(string $nombreArchivo, array &$datos): array|false {
    // Abrir archivo en modo lectura
    $r = fopen($nombreArchivo, 'r');

    if ($r !== false) { //Comprobamos que es resource
        $headers = null;
        
        // Leer linea por linea el archivo CSV
        while (($linea = fgetcsv($r)) !== false) {
            if (!$headers) {
                $headers = $linea; // Cargar la primera fila como headers
                continue;
            }
            // Combinar headers con valores para crear array asociativo
            $datos[] = array_combine($headers, $linea);   
        }
        fclose($r);
    } else {
        return false;
    }   
    return $datos;  
      
}