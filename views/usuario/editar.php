<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/DAOUsuario.php';
$clave = @$_GET["clave"];
if (!isset($clave)) {
    header("Location: listar.php");
    exit;
}

$listar = DAOUsuario::listar_usuario_by_id($clave);

$usuario = @$_SESSION["usuario"];
$usuario  = @unserialize($usuario);
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
            <?php
            foreach ($listar as $attribes => $usuario) {
            ?>
                <tr>
                    <th>Cedula:</th>
                    <td><input type="number" name="cedula" value="<?= @$usuario->cedula ?>" id="cedula"></td>
                    <td><input type="hidden" name="id" value="<?= @$usuario->id ?>" id="id" readonly></td>
                </tr>
                <tr>
                    <th>Clave:</th>
                    <td><input type="password" name="clave" id="clave" value="<?= @$usuario->clave ?>"></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td class="none"><input type="text" name="nombre" id="nombre" value="<?= @$usuario->nombre ?>"></td>
                </tr>
                <tr>
                    <th>Telefono:</th>
                    <td class="none"><input type="text" name="telefono" id="telefono" value="<?= @$usuario->telefono ?>"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email" id="email" value="<?= @$usuario->email ?>"></td>
                </tr>
                <tr>
                    <td class="none" colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <input type="submit" name="enviar" value="Editar" id="editar" />&nbsp;&nbsp;
                        <a href="../usuario/listar.php" name="regresar" value="regresar" >regresar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
    <br />
    <hr />
    <span><?= @$_REQUEST['msg'] ?></span>
</body>

</html>