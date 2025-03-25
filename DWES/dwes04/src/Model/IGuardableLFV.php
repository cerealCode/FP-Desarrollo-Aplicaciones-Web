<?php 

namespace Cerealcode\Dwes04\Model;

//TODO IMPORTANT REQUIRE AUTOLOAD TO LOAD BD CONNECTION

/**
 * Interfaz para los métodos guardar, rescatar y borrar de la BBDD
 */

 interface IGuardableLFV {

    /**
     * Método para guardar un objeto en la base de datos.
     * Recibe como parametro la PDO
     * @param \PDO $pdo Conexión a la base de datos
     * @return mixed Resultado de la operación de guardado
     */
     public function guardar(\PDO $pdo);

     
      /**
     * Método para rescatar un objeto de la base de datos por su ID.
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @param int|string $id Identificador de clave primaria
     * @return mixed Devuelve el libro o error
     */
     public static function rescatar(\PDO $pdo, $id);

     /**
     * Método para borrar un objeto de la base de datos por su ID.
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @param int|string $id CLave primaria BBDD: ID 
     * @return mixed Resultado de la operación de borrado (TODO HACeR CON ROWCOUNT)
     */
    public static function borrar(\PDO $pdo, $id);
 }