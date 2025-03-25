<?php
/* Smarty version 5.4.3, created on 2025-03-25 00:32:42
  from 'file:resultado_operacion.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e1eb9af385e9_64096965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fde3a141837997fd43c50353cbbade73e878d7a9' => 
    array (
      0 => 'resultado_operacion.tpl',
      1 => 1742846168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e1eb9af385e9_64096965 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\dwes04\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->getValue('titulo') ?? null)===null||$tmp==='' ? "Resultado de la Operación" ?? null : $tmp);?>
</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1><?php echo (($tmp = $_smarty_tpl->getValue('titulo') ?? null)===null||$tmp==='' ? "Resultado de la Operación" ?? null : $tmp);?>
</h1>
    <div class="<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>error<?php } else { ?>success<?php }?>">
        <p><?php echo $_smarty_tpl->getValue('mensaje');?>
</p>
    </div>
    
    <p><a href="index.php">Volver al listado</a></p>
</body>
</html><?php }
}
