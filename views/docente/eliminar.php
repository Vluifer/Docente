<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Docente.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/DAODocente.php';
$docente = @$_SESSION["docente"];
$docente = @unserialize($docente);        

$id = $_GET['id'];

$result = DAODocente::listar_docente_by_id($id)

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
    <form action="../../controllers/DocenteController.php" method="POST">
        <table>
        <?php
       foreach ($result as $attribes => $docente) {
        ?>
            <tr>
                    <th>codigo:</th>
                    <td<input type="number" name="id" id="id" value="<?= @$docente->id?>" readonly></td>
                    <td><input type="hidden" name="id" value="<?= @$docente->id ?>" id="id" readonly></td>
                </tr>
                <tr>
                    <th>Cedula:</th>
                    <td class="none"><input type="number" name="idusuario" id="idusuario" value="<?= @$docente->id_usuario?>" readonly></td>
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
                    <td><input type="tel" name="telefono" id="telefono" maxlength="10" pattern="[0-9]+"value="<?= @$docente->telefono?>"></td>
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
                <td style="text-align:center">

                        <input type="submit" name="enviar" value="Eliminar" id="eliminar" />&nbsp;&nbsp;
                        <a href="../docente/listar.php" name="regresar" value="regresar" >regresar</a>
                    
                </td>
                
            </table>
            <?php
       }
        ?>
        </form>
        <span><?= @$_REQUEST['msg'] ?></span>
    </body>
</html>
