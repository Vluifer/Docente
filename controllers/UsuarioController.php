<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/Docente/models/Usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/Docente/models/DAOUsuario.php';


/**
 * Description of UsuarioController
 *
 * @author LuiferV
 */

class UsuarioController
{
    public function recuperarAccion()
    {
        $enviar = @$_REQUEST["enviar"];
        switch (@$enviar) {
            case "Guardar":
                $this->guardarUsuario();
                break;
            case "Buscar":
                $this->buscarUsuario();
                break;
            case "Editar":
                $this->editar();
                break;
            case "Eliminar":
                $this->eliminar();
                break;
            default:
                break;
        }
    }

    public function guardarUsuario()
    {
        //recuperar los campos 
        $cedula = $_REQUEST["cedula"];
        $clave = $_REQUEST["clave"];
        $nombre = $_REQUEST["nombre"];
        $telefono = $_REQUEST["telefono"];
        $email = $_REQUEST["email"];

        $usuario = new Usuario();
        $usuario->cedula = $cedula;
        $usuario->clave = $clave;
        $usuario->nombre = $nombre;
        $usuario->telefono = $telefono;
        $usuario->email = $email;


        try {
            $result = DAOUsuario::agregar_usuario($usuario);
            header("Location: ../views/usuario/agregar.php?msg=Usuario Agregado con exito");
            exit;
        } catch (Exception $error) {
            header("Location: ../views/usuario/agregar.php?msg=" . $error->getMessage());
            exit;
        }
    }


    public function buscarUsuario()
    {
        $cedula = $_REQUEST["cedula"];
        $pagina = $_REQUEST["pagina"];
        try {
            $usuario = DAOUsuario::buscar_usuario($cedula);
            $usuario = serialize($usuario);
            $_SESSION["usuario"] = $usuario;
            header("Location: ../views/usuario/$pagina.php");
            exit;
        } catch (Exception $error) {
            unset($_SESSION["usuario"]);
            header("Location: ../views/usuario/$pagina.php?msg=" . $error->getMessage());
            exit;
        }
    }

    public function editar()
    {
        $cedula = $_REQUEST["cedula"];
        $clave = $_REQUEST["clave"];
        $nombre = $_REQUEST["nombre"];
        $telefono = $_REQUEST["telefono"];
        $email = $_REQUEST["email"];
        $id = $_REQUEST["id"];

        $usuario = @$_SESSION["usuario"];
        $usuario = @unserialize($usuario);

        $usuario->cedula = $cedula;
        $usuario->clave = $clave;
        $usuario->nombre = $nombre;
        $usuario->telefono = $telefono;
        $usuario->email = $email;
        $usuario->id = $id;
        $result = DAOUsuario::modificar_usuario($usuario);

        if ($result == false) {
            unset($_SESSION["usuario"]);
            header("Location: ../views/usuario/editar.php?clave=" . $id . "&msg=Usuario editado con exito");
            exit;
        } else {
            unset($_SESSION["usuario"]);
            header("Location: ../views/usuario/editar.php?clave=" . $id . "&msg=El usuario no pude ser editado");
            exit;
        }
    }

    public function eliminar()
    {
        $id = $_REQUEST["id"];
        $resp = DAOUsuario::eliminar_usuario($id);
        $respError = explode(",", $resp);
        $error = isset($respError[0]) ? 1 : 0;
        if ($error == 0) {
            unset($_SESSION["usuario"]);
            header("Location: ../views/usuario/listar.php?msg=Usuario eliminado con exito");
            exit;
        } else {
            unset($_SESSION["usuario"]);
            header("Location: ../views/usuario/listar.php?msg=Error al tratar de elimanr un usuario");
            exit;
        }
    }
}

$usuariocontrolador = new UsuarioController();
$usuariocontrolador->recuperarAccion();
