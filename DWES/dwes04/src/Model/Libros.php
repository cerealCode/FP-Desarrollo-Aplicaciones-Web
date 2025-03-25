<?php

namespace Cerealcode\Dwes04\Model;

/**
 * Clase para manejar operaciones sobre conjuntos de libros.
 */
class Libros
{
    /**
     * Listar todos los libros
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @param bool $ordenarPorCreacion Si es true, ordena por fecha_creacion descendente, 
     *                                 si es false, por fecha_actualizacion descendente
     * @return array|false|int Array de instancias de Libro, o false/-1 en caso de error
     */
    public static function listarLFV(\PDO $pdo, bool $ordenarPorCreacion = false) 
    {
        try {
            // Ordenar por fecha creación o actualización según el parámetro
            $campoOrden = $ordenarPorCreacion ? 'fecha_creacion' : 'fecha_actualizacion';
            
            // Preparar la consulta SQL para todos los libros
            $sql = "SELECT id FROM libros ORDER BY {$campoOrden} DESC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            // Si hay resultados, los procesamos
            if ($stmt->rowCount() > 0) {
                $libros = [];
                
                // Recorrer los resultados y crear instancias de Libro usando el método estático
                //TODO REVISAR METODO ESTATICO RESCATAR: VEDEIO 18.02 Min 18
                while ($datos = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $libro = Libro::rescatar($pdo, $datos['id']);
                    
                    if ($libro) {
                        $libros[] = $libro;
                    }
                }
                
                return $libros;
            }
            
            return []; // No se encontraron libros
        } catch (\PDOException $e) {
            return -1; 
        }
    }
}