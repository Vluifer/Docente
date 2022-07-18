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
                                <td><input type="number" name="cedula" id="cedula"></td>
                            </tr>
                            <tr>
                                <th>Clave:</th>
                                <td><input type="password" name="clave" id="clave"></td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td class="none"><input type="text" name="nombre" id="nombre"></td>
                            </tr>
                            <tr>
                                <th>Telefono:</th>
                                <td><input type="tel" name="telefono" id="telefono" maxlength="10"  pattern="[0-9]+"></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><input type="email" name="email" id="email"></td>
                            </tr>
                            <tr><td class="none" colspan="3"><hr></td></tr>
                            <tr>
                                <td style="text-align:center">
                                <input type="submit" name="enviar" value="Guardar"/> &nbsp;&nbsp;
                                <a href="../usuario/listar.php" name="regresar" value="regresar" >Regresar</a>
                                </td>
                            </tr>
                        </table>               
            </form>
            <br/>
            <hr/>
            <span><?= @$_REQUEST['msg'] ?></span>
    </body>
</html>
