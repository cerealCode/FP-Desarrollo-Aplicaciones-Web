<?php

namespace Cerealcode\Dwes04\Model;



/**
 * Clase que representa un libro en la base de datos.
 * Implementa la interfaz IGuardableLFV para operaciones de persistencia.
 */
class Libro implements IGuardableLFV
{
    // Atributos privados correspondientes a columnas de la tabla
    private ?int $id = null;
    private ?string $isbn;
    private ?string $titulo;
    private ?string $autor;
    private ?int $anio_publicacion;
    private ?int $paginas;
    private ?int $ejemplares_disponibles;

    //TODO REVIEW DATE DATA TYPE FORO: https://educacionadistancia.juntadeandalucia.es/formacionprofesional/mod/forum/discuss.php?d=24973
    private ?string $fecha_creacion;
    private ?string $fecha_actualizacion;

     /**
     * Obtiene el ID del libro
     * @return int|null ID del libro o null si no está establecido
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtiene la fecha de creación del libro
     * @return string|null Fecha de creación o null si no está establecida
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Obtiene la fecha de actualización del libro
     * @return string|null Fecha de actualización o null si no está establecida
     */
    public function getFechaActualizacion()
    {
        return $this->fecha_actualizacion;
    }

    /**
     * Obtiene el ISBN del libro
     * @return string|null ISBN del libro o null si no está establecido
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Establece el ISBN del libro
     * @param string $isbn Nuevo ISBN del libro
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * Obtiene el título del libro
     * @return string|null Título del libro o null si no está establecido
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Establece el título del libro
     * @param string $titulo Nuevo título del libro
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Obtiene el autor del libro
     * @return string|null Autor del libro o null si no está establecido
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Establece el autor del libro
     * @param string $autor Nuevo autor del libro
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * Obtiene el año de publicación del libro
     * @return int|null Año de publicación o null si no está establecido
     */
    public function getAnioPublicacion()
    {
        return $this->anio_publicacion;
    }

    /**
     * Establece el año de publicación del libro
     * @param int $anio_publicacion Nuevo año de publicación
     */
    public function setAnioPublicacion($anio_publicacion)
    {
        $this->anio_publicacion = $anio_publicacion;
    }

    /**
     * Obtiene el número de páginas del libro
     * @return int|null Número de páginas o null si no está establecido
     */
    public function getPaginas()
    {
        return $this->paginas;
    }

    /**
     * Establece el número de páginas del libro
     * @param int $paginas Nuevo número de páginas
     */
    public function setPaginas($paginas)
    {
        $this->paginas = $paginas;
    }

    /**
     * Obtiene el número de ejemplares disponibles
     * @return int|null Ejemplares disponibles o null si no está establecido
     */
    public function getEjemplaresDisponibles()
    {
        return $this->ejemplares_disponibles;
    }

    /**
     * Establece el número de ejemplares disponibles
     * @param int $ejemplares_disponibles Nuevo número de ejemplares
     */
    public function setEjemplaresDisponibles($ejemplares_disponibles)
    {
        $this->ejemplares_disponibles = $ejemplares_disponibles;
    }

    /**
     * Método para guardar un libro en la base de datos.
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @return int|false Número de filas creadas, o false/-1 si hay error
     */
    public function guardar(\PDO $pdo)
    {
        try {
            $stmt = $pdo->prepare("INSERT INTO libros(isbn, titulo, autor, anio_publicacion, paginas, ejemplares_disponibles) VALUES (:isbn, :titulo, :autor, :anio_publicacion, :paginas, :ejemplares)");

            $stmt->bindParam(':isbn', $this->isbn);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':autor', $this->autor);
            $stmt->bindParam(':anio_publicacion', $this->anio_publicacion);
            $stmt->bindParam(':paginas', $this->paginas);
            $stmt->bindParam(':ejemplares', $this->ejemplares_disponibles);
            
            $resultado = $stmt->execute();

            $rowCount = $stmt->rowCount();
            
            // Si se insertó correctamente, guardamos el ID
            if ($rowCount > 0) {
                $this->id = $pdo->lastInsertId();
            }
           
            return $rowCount;

        } catch (\PDOException $e) {
            // False para que coincida con la interfaz
            return false;
        }
    }

    /**
     * Rescata un libro de la base de datos por su ID.
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @param int|string $id Identificador del libro a rescatar
     * @return Libro|null|false El libro rescatado o null/false/-1/-2 en caso de error
     */
    public static function rescatar(\PDO $pdo, $id) 
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM libros WHERE id = :id");
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                // Obtener los datos del libro
                $datos = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                // Crear una nueva instancia de Libro y llenar sus atributos
                $libro = new Libro();
                
                // Accedemos a los atributos privados
                $libro->id = $datos['id'];
                $libro->isbn = $datos['isbn'];
                $libro->titulo = $datos['titulo'];
                $libro->autor = $datos['autor'];
                $libro->anio_publicacion = $datos['anio_publicacion'];
                $libro->paginas = $datos['paginas'];
                $libro->ejemplares_disponibles = $datos['ejemplares_disponibles'];
                $libro->fecha_creacion = $datos['fecha_creacion'];
                $libro->fecha_actualizacion = $datos['fecha_actualizacion'];
                
                return $libro;
            }
            
            return null; 
        } catch (\PDOException $e) {
            return false; 
        }
    }

    /**
     * Borra un libro de la base de datos por su ID.
     * 
     * @param \PDO $pdo Conexión a la base de datos
     * @param int|string $id Identificador del libro a borrar
     * @return string|false Número de filas eliminadas con texto adicional, o false/-1 en caso de error
     */
    public static function borrar(\PDO $pdo, $id)
    {
        try {
            $stmt = $pdo->prepare("DELETE FROM libros WHERE id = :id");
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            
            // Obtener el número de filas eliminadas
            $filasEliminadas = $stmt->rowCount();
            
            // Devolver el numero de filas eliminadas
            return $filasEliminadas;
        } catch (\PDOException $e) {
            return false;
        }
    }
}