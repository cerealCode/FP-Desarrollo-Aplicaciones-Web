<?php

/**
 * Ejercicio 3 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernández Vidal
 */

require_once 'b.php';
require_once 'a.php';
if (!isset($datos)) {
    $datos = filtrarLibros();
}

?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <title>Buscador de Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .errores {
            background-color: #ffdddd;
            border: 1px solid #ff0000;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .instrucciones {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table thead th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
            color: #555;
            border-bottom: 2px solid #ddd;
        }

        table tbody tr:hover {
            background-color: #f9f9f9;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Buscador de Libros</h1>

    <div class="instrucciones">
        <h2>Instrucciones de uso</h2>
        <p>Este formulario permite filtrar libros en nuestra tabla según los siguientes criterios:</p>
        <ul>
            <li><strong>Copias mínimas vendidas:</strong> Introduce un número para filtrar libros que hayan vendido al
                menos esa cantidad de copias.</li>
            <li><strong>Géneros:</strong> Selecciona uno o más géneros para filtrar los libros.</li>

        </ul>
    </div>
    <!--Formulario para el filtrado por número de copias y checkbox de selección múltiple para géneros-->
    <form action="datos.php" method="POST"> <!--TODO: KEEP CHECKBOXES SELECTION AND BE ABLE TO REFILTER-->
        <div class="form-group"> 
            <label for="copias">Copias mínimas vendidas:</label>
            <input type="text" id="copias" name="copias" placeholder="Ej: 1000000">
        </div>

        <div class="form-group">
            <label>Géneros (selección múltiple):</label>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" id="fantasia" name="generos[]" value="Fantasía">
                    <label for="fantasia">Fantasía</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="ciencia_ficcion" name="generos[]" value="Ciencia Ficción">
                    <label for="ciencia_ficcion">Ciencia Ficción</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="misterio" name="generos[]" value="Misterio">
                    <label for="misterio">Misterio</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="terror" name="generos[]" value="Terror">
                    <label for="terror">Terror</label>
                </div>
            </div>
        </div>

        <button type="submit">Buscar Libros</button>
    </form>
    <!--Muestra los posibles errores almacenados en el array $errores-->
    <?php if (!empty($errores)): ?>
        <div class="errores">
            <h3>Se han producido los siguientes errores:</h3>
            <ul>
                <!--Si hay errores en $errores, recorre el array y muestra los mensajes de error-->
                <?php foreach ($errores as $key => $value): ?>
                    <li><?php echo htmlspecialchars($value); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <?php
            if (!empty($datos) && is_array($datos) && count($datos) > 0):
                $headers = reset($datos); 
                if (!empty($headers)):
                    foreach (array_keys($headers) as $header):
            ?>
                        <th><?php echo htmlspecialchars($header); ?></th>
            <?php
                    endforeach;
                endif;
            endif;
            ?>
        </thead>
        <tbody>
            <?php if (!empty($datos) && is_array($datos)): ?>
                <?php foreach ($datos as $linea): ?>
                    <tr>
                        <?php foreach ($linea as $value): ?>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No se encontraron libros.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</body>

</html>