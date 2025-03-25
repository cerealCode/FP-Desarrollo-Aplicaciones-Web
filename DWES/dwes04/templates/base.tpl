<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title|default:"Gestión de Libros"}</title>
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
    <header>
        <h1>{$headerTitle|default:$title|default:"Gestión de Libros"}</h1>
        <nav>
            <a href="index.php">Inicio</a> | 
            <a href="index.php?accion=nuevo_libro_form_LFV">Nuevo Libro</a>
        </nav>
    </header>
    
    <main>
        {if isset($mensaje)}
            <div class="{if isset($error)}error{else}success{/if}">
                {$mensaje}
            </div>
        {/if}
        
        {block name=content}{/block}
    </main>
    
</body>
</html>