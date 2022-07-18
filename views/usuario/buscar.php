<?php
session_start();
/* require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Usuario.php'; */
include_once '../../models/Usuario.php';
$usuario= @$_SESSION["usuario"];
$usuario  = @unserialize($usuario);

/* $id = @$_GET["id"];

if (!isset($id)) {
    header("Location: buscar.php");
    exit;
} */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <form action="../../controllers/UsuarioController.php" method="POST">
              <table>
                 <tr>
                     <th>Cedula:</th>
                     <td><input type="number" name="cedula" id="cedula" value="<?= @$usuario->cedula?>" required></td>
                 </tr>
                 <tr>
                     <th>Clave:</th>
                     <td><input type="password" name="clave" id="clave" value="<?= @$usuario->clave?>" readonly></td>
                 </tr>
                 <tr>
                     <th>Nombre:</th>
                     <td class="none"><input type="text" name="nombre" id="nombre" value="<?= @$usuario->nombre?>" readonly></td>
                 </tr>
                 <tr>
                     <th>Telefono:</th>
                     <td class="none"><input type="text" name="telefono" id="telefono" value="<?= @$usuario->telefono?>" readonly></td>
                 </tr>
                 <tr>
                     <th>Email:</th>
                     <td><input type="email" name="email" id="email" value="<?= @$usuario->email?>" readonly></td>
                 </tr>
                 <tr><td class="none" colspan="3"><hr></td></tr>
                 <tr>
                     <td style="text-align:center">
                     <input type="hidden" name="pagina" value="Buscar">
                     <input type="submit" name="enviar" value="Buscar"/> &nbsp;&nbsp;
                     <a href="../usuario/listar.php" name="regresar" value="regresar" >regresar</a>
                     </td>
                 </tr>
             </table>               
 </form>
 <br/>
 <hr/>
 <span><?= @$_REQUEST['msg'] ?></span>
    </body>
</html>
