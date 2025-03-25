<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Listado de Libros</h1>

    {if isset($error)}
        <div class="error">
            {$error}
        </div>
    {/if}

    <form method="post" action="index.php">
        <label for="orden">Ordenar por:</label>
        <select name="orden" id="orden">
            <option value="fecha_creacion" {if isset($orden) && $orden == 'fecha_creacion'}selected{/if}>Fecha de Creación</option>
            <option value="fecha_actualizacion" {if isset($orden) && $orden == 'fecha_actualizacion'}selected{/if}>Fecha de Actualización</option>
        </select>
        <button type="submit">Ordenar</button>
    </form>

    {if isset($numerosAleatorios)}
        <div>
            <p>Números aleatorios:</p>
            {foreach from=$numerosAleatorios item=numero}
                <span style="font-size:24px;">{$numero} </span>
            {/foreach}
        </div>
    {/if}

    <p><a href="index.php?accion=nuevo_libro_form_LFV">Añadir Nuevo Libro</a></p>

    {if isset($libros) && count($libros) > 0}
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Páginas</th>
                    <th>Ejemplares</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$libros item=libro}
                    <tr>
                        <td>{$libro->getIsbn()}</td>
                        <td>{$libro->getTitulo()}</td>
                        <td>{$libro->getAutor()}</td>
                        <td>{$libro->getAnioPublicacion()}</td>
                        <td>{$libro->getPaginas()}</td>
                        <td>{$libro->getEjemplaresDisponibles()}</td>
                        <td>
                            <form method="post" action="index.php?accion=borrar_libro_LFV">
                                <input type="hidden" name="id" value="{$libro->getId()}">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>No hay libros disponibles.</p>
    {/if}
</body>
</html>