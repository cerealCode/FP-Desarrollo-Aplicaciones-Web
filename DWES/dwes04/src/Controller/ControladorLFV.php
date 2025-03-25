<?php
namespace Cerealcode\Dwes04\Controller;

use Cerealcode\Dwes04\Model\Libro;
use Cerealcode\Dwes04\Model\Libros;
use \Peticion;
use Smarty\Smarty; 

/**
 * Controlador principal para la gestión de libros
 */
class ControladorLFV
{
    /**
     * Controlador por defecto que muestra un listado de libros
     * 
     * @param Peticion $peticion Objeto para manejar los parámetros de la petición
     * @param \PDO $pdo Conexión a la base de datos
     * @param Smarty $smarty Motor de plantillas
     */
    public static function controladorPorDefecto(Peticion $peticion, \PDO $pdo, Smarty $smarty)
    {
        // Tiene dos comportamientos diferentes según si se reciben datos por POST o no
        
        // Comprobar si se han recibido datos por POST
        if ($peticion->isPost() && $peticion->has('orden')) {
            // Caso B: Se recibe el orden por POST
            try {
                $orden = $peticion->getUnsafeString('orden');
                
                // Validar que el orden recibido sea válido (fecha_creacion o fecha_actualizacion)
                if ($orden === 'fecha_creacion' || $orden === 'fecha_actualizacion') {
                    // Obtener los libros en el orden indicado
                    $libros = Libros::listarLFV($pdo, $orden === 'fecha_creacion');
                    $smarty->assign('orden', $orden);
                } else {
                    // Si el orden no es válido, mostrar mensaje de error y usar orden predeterminado
                    $smarty->assign('error', 'El orden indicado no es válido');
                    $libros = Libros::listarLFV($pdo, false); // Por defecto, orden por fecha de actualización
                    $smarty->assign('orden', 'fecha_actualizacion');
                }
            } catch (\Exception $e) {
                // Error al procesar el parámetro
                $smarty->assign('error', 'Error al procesar los parámetros: ' . $e->getMessage());
                $libros = Libros::listarLFV($pdo, false);
                $smarty->assign('orden', 'fecha_actualizacion');
            }
        } else {
            // Caso A: No se reciben datos por POST o son incorrectos
            // Mostrar libros ordenados por fecha de actualización
            $libros = Libros::listarLFV($pdo, false);
            $smarty->assign('orden', 'fecha_actualizacion');
            
        }
        
        // Asignar los libros a la plantilla
        $smarty->assign('libros', $libros);
        
        // Mostrar la plantilla con el listado de libros
        $smarty->display('lista_libros.tpl');
    }
    
    /**
     * Muestra el formulario para crear un nuevo libro
     * 
     * @param Peticion $peticion Objeto para manejar los parámetros de la petición
     * @param \PDO $pdo Conexión a la base de datos
     * @param Smarty $smarty Motor de plantillas
     */
    public static function nuevoLibroForm($peticion, $pdo, $smarty)
    {
        // Asignar título de la página
        $smarty->assign('title', 'Nuevo Libro');
        $smarty->assign('headerTitle', 'Añadir un Nuevo Libro');
        
        // Mostrar el formulario para añadir un nuevo libro
        $smarty->display('nuevo_libro.tpl');
    }
    
    /**
     * Procesa la creación de un nuevo libro
     * 
     * @param Peticion $peticion Objeto para manejar los parámetros de la petición
     * @param \PDO $pdo Conexión a la base de datos
     * @param Smarty $smarty Motor de plantillas
     */
    public static function crearLibro($peticion, $pdo, $smarty)
    {
        // Validar datos recibidos sin usar la clase Peticion o filter_input
        $errores = [];
        
        // Verificar que todos los campos obligatorios están presentes (NOT NULL)
        $camposRequeridos = ['isbn', 'titulo', 'autor', 'anio_publicacion', 'paginas', 'ejemplares_disponibles'];
        foreach ($camposRequeridos as $campo) {
            if (!isset($_POST[$campo]) || trim($_POST[$campo]) === '') {
                $errores[] = "El campo '{$campo}' es obligatorio.";
            }
        }
        
        // Si no hay errores en los campos obligatorios, validar formatos y rangos
        if (empty($errores)) {
            // Validar ISBN (13 dígitos numéricos)
            if (!preg_match('/^\d{13}$/', $_POST['isbn'])) {
                $errores[] = "El ISBN debe contener exactamente 13 dígitos numéricos.";
            }
            
            // Validar año de publicación (mayor que 0 y menor o igual al año actual)
            $anioActual = date('Y');
            if (!is_numeric($_POST['anio_publicacion']) || 
                (int)$_POST['anio_publicacion'] <= 0 || 
                (int)$_POST['anio_publicacion'] > $anioActual) {
                $errores[] = "El año de publicación debe ser un número mayor que 0 y menor o igual a {$anioActual}.";
            }
            
            // Validar páginas (entero mayor o igual a 0)
            if (!is_numeric($_POST['paginas']) || (int)$_POST['paginas'] < 0) {
                $errores[] = "El número de páginas debe ser un número entero mayor o igual a 0.";
            }
            
            // Validar ejemplares disponibles (entero mayor o igual a 0)
            if (!is_numeric($_POST['ejemplares_disponibles']) || (int)$_POST['ejemplares_disponibles'] < 0) {
                $errores[] = "El número de ejemplares disponibles debe ser un número entero mayor o igual a 0.";
            }
        }
        
        // Si hay errores, mostrarlos
        if (!empty($errores)) {
            $smarty->assign('titulo', 'Error al Crear Libro');
            $smarty->assign('mensaje', 'Se encontraron los siguientes errores:<br>' . implode('<br>', $errores));
            $smarty->assign('error', true);
            $smarty->display('resultado_operacion.tpl');
            return;
        }
        
        // Si no hay errores, crear el libro
        try {
            $libro = new Libro();
            $libro->setIsbn($_POST['isbn']);
            $libro->setTitulo($_POST['titulo']);
            $libro->setAutor($_POST['autor']);
            $libro->setAnioPublicacion((int)$_POST['anio_publicacion']);
            $libro->setPaginas((int)$_POST['paginas']);
            $libro->setEjemplaresDisponibles((int)$_POST['ejemplares_disponibles']);
            
            // Intentar guardar el libro
            $resultado = $libro->guardar($pdo);
            
            if ($resultado) {
                $smarty->assign('titulo', 'Libro Creado');
                $smarty->assign('mensaje', 'El libro se ha creado correctamente con ID: ' . $libro->getId());
                $smarty->display('resultado_operacion.tpl');
            } else {
                $smarty->assign('titulo', 'Error al Crear Libro');
                $smarty->assign('mensaje', 'No se pudo guardar el libro en la base de datos.');
                $smarty->assign('error', true);
                $smarty->display('resultado_operacion.tpl');
            }
        } catch (\Exception $e) {
            $smarty->assign('titulo', 'Error al Crear Libro');
            $smarty->assign('mensaje', 'Ha ocurrido un error: ' . $e->getMessage());
            $smarty->assign('error', true);
            $smarty->display('resultado_operacion.tpl');
        }
    }
    
    /**
     * Maneja la eliminación de un libro
     * 
     * @param Peticion $peticion Objeto para manejar los parámetros de la petición
     * @param \PDO $pdo Conexión a la base de datos
     * @param Smarty $smarty Motor de plantillas
     */
    public static function borrarLibro($peticion, $pdo, $smarty)
    {
        $smarty->assign('title', 'Eliminar Libro');
        
        try {
            // Comprobar si existe el ID del libro
            if ($peticion->has('id')) {
                $id = $peticion->getInt('id');
                
                // Obtener el libro
                $libro = Libro::rescatar($pdo, $id);
                
                if ($libro) {
                    // Comprobar si es una confirmación
                    if ($peticion->has('confirmar')) {
                        // Proceder a eliminar el libro
                        $resultado = Libro::borrar($pdo, $id);
                        
                        if ($resultado) {
                            $smarty->assign('titulo', 'Libro Eliminado');
                            $smarty->assign('mensaje', 'El libro se ha eliminado correctamente.');
                            $smarty->display('resultado_operacion.tpl');
                        } else {
                            $smarty->assign('titulo', 'Error al Eliminar');
                            $smarty->assign('mensaje', 'No se pudo eliminar el libro de la base de datos.');
                            $smarty->assign('error', true);
                            $smarty->display('resultado_operacion.tpl');
                        }
                    } else {
                        // Mostrar formulario de confirmación
                        $smarty->assign('libro', $libro);
                        $smarty->display('borrar_libro.tpl');
                    }
                } else {
                    // El libro no existe
                    $smarty->assign('titulo', 'Error al Eliminar');
                    $smarty->assign('mensaje', 'El libro no existe o ya ha sido eliminado.');
                    $smarty->assign('error', true);
                    $smarty->display('resultado_operacion.tpl');
                }
            } else {
                $smarty->assign('titulo', 'Error al Eliminar');
                $smarty->assign('mensaje', 'No se ha especificado el libro a eliminar.');
                $smarty->assign('error', true);
                $smarty->display('resultado_operacion.tpl');
            }
            
        } catch (\Exception $e) {
            $smarty->assign('titulo', 'Error al Eliminar');
            $smarty->assign('mensaje', 'Ha ocurrido un error: ' . $e->getMessage());
            $smarty->assign('error', true);
            $smarty->display('resultado_operacion.tpl');
        }
    }
}