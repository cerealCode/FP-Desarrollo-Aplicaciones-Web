<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Libro</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
    </style>
</head>
<body>
    
    <h1>Añadir Nuevo Libro</h1>
    
    <form method="post" action="index.php?accion=crear_libro_LFV">
        <div class="form-group">
            <label for="isbn">ISBN (13 dígitos):</label>
            <input type="text" id="isbn" name="isbn" required>
        </div>
        
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
        </div>
        
        <div class="form-group">
            <label for="anio_publicacion">Año de Publicación:</label>
            <input type="number" id="anio_publicacion" name="anio_publicacion" min="1" max="{$smarty.now|date_format:'%Y'}" required>
        </div>
        
        <div class="form-group">
            <label for="paginas">Número de Páginas:</label>
            <input type="number" id="paginas" name="paginas" min="0" required>
        </div>
        
        <div class="form-group">
            <label for="ejemplares_disponibles">Ejemplares Disponibles:</label>
            <input type="number" id="ejemplares_disponibles" name="ejemplares_disponibles" min="0" required>
        </div>
        
        <div class="form-group">
            <button type="submit">Guardar Libro</button>
            <a href="index.php">Cancelar</a>
        </div>
    </form>
</body>
</html>