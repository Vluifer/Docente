<?php
session_start();
include_once '../../models/Docente.php';
$docente= @$_SESSION["docente"];
$docente  = @unserialize($docente);

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
            <th>Codigo:</th>
            <td class="none"><input type="number" name="id" id="id" requerid></td>
        </tr>
        <tr>
            <th>Cedula:</th>
            <td class="none"><input type="number" name="idusuario" id="ididusuario" value="<?= @$docente->id_usuario?>" readonly></td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td class="none"><input type="text" name="nombre" id="nombre" value="<?= @$docente->nombre?>" requerid></td>
        </tr>
        <tr>
            <th>Apellido:</th>
            <td class="none"><input type="text" name="apellido" id="apellido" value="<?= @$docente->apellido?>" readonly></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><input type="email" name="email" id="email" value="<?= @$docente->email?>" readonly></td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td><input type="tel" name="telefono" id="telefono" maxlength="10" pattern="[0-9]+"value="<?= @$docente->telefono?>" readonly ></td>
        </tr>
        <tr>
            <th>Blog:</th>
            <td class="none"><input type="text" name="blog" id="blog" value="<?= @$docente->blog?>" readonly></td>
        </tr>
        <tr>
            <th>Profesional:</th>
            <td class="none"><input type="text" name="profesional" id="profesional" value="<?= @$docente->profesional?>" readonly></td>
        </tr>
        <tr>
            <th>Escalaron:</th>
            <td class="none"><input type="text" name="escalaron" id="escalaron" value="<?= @$docente->escalaron?>" readonly></td>
        </tr>
        <tr>
            <th>Idioma:</th>
            <td class="none"><input type="text" name="idioma" id="idioma" value="<?= @$docente->idioma?>" readonly></td>
        </tr>
        <tr>
            <th>Años de experiencia:</th>
            <td class="none"><input type="text" name="anios_experiencia" id="anios_experiencia" value="<?= @$docente->anios_experiencia?>" readonly ></td>
        </tr>
        <tr>
            <th>Area de trabajo:</th>
            <td class="none"><input type="text" name="area_trabajo" id="area_trabajo" value="<?= @$docente->area_trabajo?>" readonly></td>
        </tr>
        <tr>
            <td class="none" colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
                <input type="hidden" name="pagina" value="Buscar">
                <input type="submit" name="enviar" value="Buscar" /> &nbsp;&nbsp;
                <a href="../docente/listar.php" name="regresar" value="regresar" >regresar</a>
            </td>
        </tr>
    </table>
</form>
<br />
<hr />
<span><?= @$_REQUEST['msg'] ?></span>
    </body>
</html>
