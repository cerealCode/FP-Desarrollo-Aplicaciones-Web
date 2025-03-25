<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
    </style>
</head>
<body>
    <h1>Eliminar Libro</h1>
    
    {if isset($libro)}
        <div>
            <p>¿Estás seguro de que deseas eliminar el siguiente libro?</p>
            <p><strong>Título:</strong> {$libro->getTitulo()}</p>
            <p><strong>Autor:</strong> {$libro->getAutor()}</p>
            <p><strong>ISBN:</strong> {$libro->getIsbn()}</p>
        </div>
        
        <form method="post" action="index.php?accion=borrar_libro_LFV">
            <input type="hidden" name="id" value="{$libro->getId()}">
            <div>
                <label>
                    <input type="checkbox" name="confirmar" value="1" required>
                    Confirmo que deseo eliminar este libro
                </label>
            </div>
            <div style="margin-top: 10px;">
                <button type="submit">Eliminar Libro</button>
                <a href="index.php">Cancelar</a>
            </div>
        </form>
    {else}
        <p>No se ha especificado el libro a eliminar.</p>
        <a href="index.php">Volver al listado</a>
    {/if}
</body>
</html>