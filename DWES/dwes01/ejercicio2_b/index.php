<?php

/**
 * Ejercicio 3 - Desarrollo Web en Entorno Servidor
 * @author Luis Fernández Vidal
 */

require_once 'b.php';
require_once 'a.php';

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

    <div class="instructions">
        <h2>Instrucciones de uso</h2>
        <p>Este formulario permite filtrar libros en nuestra tabla según los siguientes criterios:</p>
        <ul>
            <li><strong>Copias mínimas vendidas:</strong> Introduce un número para filtrar libros que hayan vendido al menos esa cantidad de copias.</li>
            <li><strong>Géneros:</strong> Selecciona uno o más géneros para filtrar los libros.</li>

        </ul>
    </div>

    <form action="datos.php" method="POST">
        <div class="form-group">
            <label for="copias">Copias mínimas vendidas:</label>
            <input type="text" id="copias" name="copias" placeholder="Ej: 1000000">
        </div>

        <div class="form-group" method="POST">
            <label>Géneros (selección múltiple):</label>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" id="fantasia" name="generos[]" value="fantasia">
                    <label for="fantasia">Fantasía</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="ciencia_ficcion" name="generos[]" value="ciencia_ficcion">
                    <label for="ciencia_ficcion">Ciencia Ficción</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="misterio" name="generos[]" value="misterio">
                    <label for="misterio">Misterio</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="terror" name="generos[]" value="terror">
                    <label for="terror">Terror</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="romance" name="generos[]" value="romance">
                    <label for="romance">Romance</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="aventura" name="generos[]" value="aventura">
                    <label for="aventura">Aventura</label>
                </div>
            </div>
        </div>

        <button type="submit">Buscar Libros</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Copias Vendidas</th>
                <th>Género</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $libro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($libro['Título']); ?></td>
                    <td><?php echo htmlspecialchars($libro['Autor']); ?></td>
                    <td><?php echo htmlspecialchars($libro['Copias Vendidas']); ?></td>
                    <td><?php echo htmlspecialchars($libro['Género']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>