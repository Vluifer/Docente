<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/DAOUsuario.php';
$listar_usuarios = @$_SESSION["listar_usuarios"];
$listar_usuarios  = unserialize($listar_usuarios);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <table border="1" class="mx-auto mt-4 table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Cedula</th>
                    <th class="text-center">Clave</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Email</th>
                    <th class="text-center" colspan="2">Acciòn</th>
                </tr>
            </thead>
            <?php
            $listar = DAOUsuario::listar_usuario();
            if (count($listar) == 0) {
                echo "No esxiste usuario que mostrar";
                exit();
            }
            foreach ($listar as $indice => $usuario) {
            ?>
                <tr>
                    <td><?= $usuario->cedula ?></td>
                    <td><?= $usuario->clave ?></td>
                    <td><?= $usuario->nombre ?></td>
                    <td><?= $usuario->telefono ?></td>
                    <td><?= $usuario->email ?></td>
                    <td class="text-center"><a href="editar.php?clave=<?= @$usuario->id ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a></td>
                    <td class="text-center"><a href="eliminar.php?id=<?= @$usuario->id ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                </tr>

            <?php
            }
            ?>
        </table>

        <br />
        <hr />
        <span class="text-center"><?= @$_REQUEST['msg'] ?></span>
    </div>

</body>
</html>