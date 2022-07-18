<?php
session_start();
include_once '../../models/Docente.php';
require_once  '../../models/DAODocente.php';

$docente = @$_SESSION["docente"];
$docente  = @unserialize($docente);


if (@$_SESSION["docente"] == null) {
    $usuario = null;
}

$id = @$_GET["id"];


$listar = DAODocente::listar_docente_by_id($id);

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
        <?php
            foreach ($listar as $attribes => $docente) {
            ?>
            <tr>
                    <th>codigo:</th>
                    <td><input type="number" name="id" id="id" value="<?= @$docente->id?>" readonly></td>
                </tr>
                <tr>
                    <th>Cedula:</th>
                    <td class="none"><input type="number" name="id_usuario" id="id_usuario" value="<?= @$docente->id_usuario?>" readonly></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td class="none"><input type="text" name="nombre" id="nombre" value="<?= @$docente->nombre?>"></td>
                </tr>
                <tr>
                    <th>Apellido:</th>
                    <td class="none"><input type="text" name="apellido" id="apellido" value="<?= @$docente->apellido?>"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email" id="email" value="<?= @$docente->email?>"></td>
                </tr>
                <tr>
                    <th>Telefono:</th>
                    <td><input type="tel" name="telefono" id="telefono" value="<?= @$docente->telefono?>"></td>
                </tr>
                <tr>
                    <th>Blog:</th>
                    <td class="none"><input type="text" name="blog" id="blog" value="<?= @$docente->blog?>"></td>
                </tr>
                <tr>
                    <th>Profesional:</th>
                    <td class="none"><input type="text" name="profesional" id="profesional" value="<?= @$docente->profesional?>"></td>
                </tr>
                <tr>
                    <th>Escalaron:</th>
                    <td class="none"><input type="text" name="escalaron" id="escalaron" value="<?= @$docente->escalaron?>"></td>
                </tr>
                <tr>
                    <th>Idioma:</th>
                    <td class="none"><input type="text" name="idioma" id="idioma" value="<?= @$docente->idioma?>"></td>
                </tr>
                <tr>
                    <th>Años de experiencia:</th>
                    <td class="none"><input type="text" name="anios_experiencia" id="anios_experiencia" value="<?= @$docente->anios_experiencia?>"></td>
                </tr>
                <tr>
                    <th>Area de trabajo:</th>
                    <td class="none"><input type="text" name="area_trabajo" id="area_trabajo" value="<?= @$docente->area_trabajo?>"></td>
                </tr>
                <tr>
                    <td class="none" colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        <input type="submit" name="enviar" value="Editar" id="editar" />&nbsp;&nbsp;
                        <a href="../docente/listar.php" name="regresar" value="regresar" >regresar</a>
                    </td>
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
