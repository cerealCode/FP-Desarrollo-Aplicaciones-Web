<?php
/* Smarty version 5.4.3, created on 2025-03-25 03:04:03
  from 'file:lista_libros.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e20f13d55498_43289433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '692de92e77661c0b59ca8f56ec95dbcacc1d2bf4' => 
    array (
      0 => 'lista_libros.tpl',
      1 => 1742845594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e20f13d55498_43289433 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\dwes04_LUIS\\templates';
?><!DOCTYPE html>
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

    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <div class="error">
            <?php echo $_smarty_tpl->getValue('error');?>

        </div>
    <?php }?>

    <form method="post" action="index.php">
        <label for="orden">Ordenar por:</label>
        <select name="orden" id="orden">
            <option value="fecha_creacion" <?php if ((true && ($_smarty_tpl->hasVariable('orden') && null !== ($_smarty_tpl->getValue('orden') ?? null))) && $_smarty_tpl->getValue('orden') == 'fecha_creacion') {?>selected<?php }?>>Fecha de Creación</option>
            <option value="fecha_actualizacion" <?php if ((true && ($_smarty_tpl->hasVariable('orden') && null !== ($_smarty_tpl->getValue('orden') ?? null))) && $_smarty_tpl->getValue('orden') == 'fecha_actualizacion') {?>selected<?php }?>>Fecha de Actualización</option>
        </select>
        <button type="submit">Ordenar</button>
    </form>

    <?php if ((true && ($_smarty_tpl->hasVariable('numerosAleatorios') && null !== ($_smarty_tpl->getValue('numerosAleatorios') ?? null)))) {?>
        <div>
            <p>Números aleatorios:</p>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('numerosAleatorios'), 'numero');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('numero')->value) {
$foreach0DoElse = false;
?>
                <span style="font-size:24px;"><?php echo $_smarty_tpl->getValue('numero');?>
 </span>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    <?php }?>

    <p><a href="index.php?accion=nuevo_libro_form_LFV">Añadir Nuevo Libro</a></p>

    <?php if ((true && ($_smarty_tpl->hasVariable('libros') && null !== ($_smarty_tpl->getValue('libros') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('libros')) > 0) {?>
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
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('libros'), 'libro');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('libro')->value) {
$foreach1DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getIsbn();?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getTitulo();?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getAutor();?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getAnioPublicacion();?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getPaginas();?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('libro')->getEjemplaresDisponibles();?>
</td>
                        <td>
                            <form method="post" action="index.php?accion=borrar_libro_LFV">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('libro')->getId();?>
">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay libros disponibles.</p>
    <?php }?>
</body>
</html><?php }
}
