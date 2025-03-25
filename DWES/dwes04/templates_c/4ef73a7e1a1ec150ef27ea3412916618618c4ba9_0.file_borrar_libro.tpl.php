<?php
/* Smarty version 5.4.3, created on 2025-03-25 00:32:58
  from 'file:borrar_libro.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e1ebaae315a8_60370110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ef73a7e1a1ec150ef27ea3412916618618c4ba9' => 
    array (
      0 => 'borrar_libro.tpl',
      1 => 1742846023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e1ebaae315a8_60370110 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\dwes04\\templates';
?><!DOCTYPE html>
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
    
    <?php if ((true && ($_smarty_tpl->hasVariable('libro') && null !== ($_smarty_tpl->getValue('libro') ?? null)))) {?>
        <div>
            <p>¿Estás seguro de que deseas eliminar el siguiente libro?</p>
            <p><strong>Título:</strong> <?php echo $_smarty_tpl->getValue('libro')->getTitulo();?>
</p>
            <p><strong>Autor:</strong> <?php echo $_smarty_tpl->getValue('libro')->getAutor();?>
</p>
            <p><strong>ISBN:</strong> <?php echo $_smarty_tpl->getValue('libro')->getIsbn();?>
</p>
        </div>
        
        <form method="post" action="index.php?accion=borrar_libro_LFV">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('libro')->getId();?>
">
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
    <?php } else { ?>
        <p>No se ha especificado el libro a eliminar.</p>
        <a href="index.php">Volver al listado</a>
    <?php }?>
</body>
</html><?php }
}
