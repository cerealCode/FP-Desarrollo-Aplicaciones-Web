<?php
// Carga el autoloader de Composer y la clase Peticion
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Peticion.php';

// Configuración de la base de datos
$dbConfig = [
    'host' => 'localhost',
    'dbname' => 'libros',
    'user' => 'root',
    'password' => ''
];

// Conexión a la base de datos
try {
    $pdo = new PDO(
        "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8mb4",
        $dbConfig['user'],
        $dbConfig['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Configuración de Smarty
$smarty = new Smarty\Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Instancia de Peticion
$peticion = new Peticion();

// Obtener la acción a realizar (o usar la acción por defecto)
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

// Importar la clase del controlador
use Cerealcode\Dwes04\Controller\ControladorLFV;

// Enrutamiento de acciones
switch ($accion) {
    case 'nuevo_libro_form_LFV':
        ControladorLFV::nuevoLibroForm($peticion, $pdo, $smarty);
        break;
    case 'crear_libro_LFV':
        ControladorLFV::crearLibro($peticion, $pdo, $smarty);
        break;
    case 'borrar_libro_LFV':
        ControladorLFV::borrarLibro($peticion, $pdo, $smarty);
        break;
    case 'default':
    default:
        ControladorLFV::controladorPorDefecto($peticion, $pdo, $smarty);
        break;
}