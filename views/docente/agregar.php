<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/Docente/models/Usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/Docente/models/DAOUsuario.php';

$result = DAOUsuario::listar_usuario();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="../../controllers/DocenteController.php" method="POST">

        <table>
            <tr>
                <th>Cedula:</th>
                <td>
                    <select name="id_usuario" id="id_usuario">
                        <option value="0"></option>
                        <?php
                        foreach ($result as $data => $usuario) { ?>
                            <option value="<?= $usuario->cedula?>"><?= $usuario->cedula ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td><input type="text" name="nombre" id="nombre"></td>
            </tr>
            <tr>
                <th>Apellido:</th>
                <td><input type="text" name="apellido" id="apellido"></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <th>Telefono:</th>
                <td><input type="tel" name="telefono" id="telefono" maxlength="10" pattern="[0-9]+"></td>
            </tr>
            <tr>
                <th>Blog:</th>
                <td><input type="text" name="blog" id="blog"></td>
            </tr>
            <tr>
                <th>Profesional:</th>
                <td><input type="text" name="profesional" id="profesional"></td>
            </tr>
            <tr>
                <th>Escalaron:</th>
                <td><input type="text" name="escalaron" id="escalaron"></td>
            </tr>
            <tr>
                <th>Idioma:</th>
                <td><input type="text" name="idioma" id="idioma"></td>
            </tr>
            <tr>
                <th>Años de experiencia:</th>
                <td><input type="text" name="anios_experiencia" id="anios_experiencia"></td>
            </tr>
            <tr>
                <th>Area de trabajo:</th>
                <td><input type="text" name="area_trabajo" id="area_trabajo"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <input type="submit" name="enviar" value="Guardar" /> &nbsp;&nbsp;
                    <a href="../docente/listar.php" name="regresar" value="regresar">regresar</a>
                </td>
            </tr>
        </table>
    </form>
    <br />
    <hr />
    <span><?= @$_REQUEST['msg'] ?></span>
</body>

</html>