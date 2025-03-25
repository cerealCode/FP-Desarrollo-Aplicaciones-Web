<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$titulo|default:"Resultado de la Operación"}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>{$titulo|default:"Resultado de la Operación"}</h1>
    <div class="{if isset($error)}error{else}success{/if}">
        <p>{$mensaje}</p>
    </div>
    
    <p><a href="index.php">Volver al listado</a></p>
</body>
</html>