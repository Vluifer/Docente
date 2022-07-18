<?php
session_start();
require_once '../../models/Docente.php';
require_once  '../../models/DAODocente.php';
$listar_usuarios = @$_SESSION["listar_usuarios"];
$listar_usuarios  = unserialize($listar_usuarios);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <div class="container"> 
        <table border= "1" class="mx-auto mt-4 table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Codigo</th>
                    <th class="text-center">Cedula</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Blog</th>
                    <th class="text-center">Profesional</th>
                    <th class="text-center">Escalaron</th>
                    <th class="text-center">Idioma</th>
                    <th class="text-center">Años de experiencia</th>
                    <th class="text-center">Area de trabajo</th>
                </tr>
            </thead>
            <?php
            $listar = DAODocente::listar_docente();
            if (count($listar) == 0) {
                echo "No esxiste usuario que mostrar";
                exit();
            }
            foreach ($listar as $indice => $docente) {
            ?>
                <tr>
                    <td><?= $docente->id ?></td>
                    <td><?= $docente->id_usuario ?></td>
                    <td><?= $docente->nombre ?></td>
                    <td><?= $docente->apellido ?></td>
                    <td><?= $docente->email ?></td>
                    <td><?= $docente->telefono ?></td>
                    <td><?= $docente->blog ?></td>
                    <td><?= $docente->profesional ?></td>
                    <td><?= $docente->escalaron ?></td>
                    <td><?= $docente->idioma ?></td>
                    <td><?= $docente->anios_experiencia ?></td>
                    <td><?= $docente->area_trabajo ?></td>
                    <td><a class="text-center" href="editar.php?id=<?= @$docente->id ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> </a></td>
                    <td><a class="text-center" href="eliminar.php?id=<?= @$docente->id ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <span><?= @$_REQUEST['msg'] ?></span>
    </div>
</body>

</html>