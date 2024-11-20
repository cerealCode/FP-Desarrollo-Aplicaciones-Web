<?php
/**
 * Ejercicio 2 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernandez Vidal
 */
function cargarCSV(array &$datos, string $nombreArchivo): bool {
        $r = fopen($nombreArchivo, 'r');

        if ($r === false) { // Es resource
            return false;
        }

        $headers = null;

        while (($linea = fgetcsv($r)) !== false) {
            if (!$headers) {
                $headers = $linea; // Cargar la primera fila como headers
            } else {
                $datos[] = array_combine($headers, $linea); // Combinar arrays
            }
        }
        fclose($r);
        return true;        
} 
    

                  
                


