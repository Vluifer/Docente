<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Docente.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/DAODocente.php';

/**
 * Description of DocenteController
 *
 * @author LuiferV
 */
class DocenteController
{

    public function recuperarAccion()
    {
        $enviar = @$_REQUEST["enviar"];
        switch (@$enviar) {
            case "Guardar":
                $this->guardarDocente();
                break;
            case "Buscar":
                 $this->buscarDocente();
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

    public function guardarDocente()
    {
        $id_usuario = $_REQUEST["id_usuario"];
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $email = $_REQUEST["email"];
        $telefono = $_REQUEST["telefono"];
        $blog = $_REQUEST["blog"];
        $profesional = $_REQUEST["profesional"];
        $escalaron = $_REQUEST["escalaron"];
        $idioma = $_REQUEST["idioma"];
        $anios_experiencia = $_REQUEST["anios_experiencia"];
        $area_trabajo = $_REQUEST["area_trabajo"];


        $docente = new Docente();
        $docente->id_usuario = $id_usuario;
        $docente->nombre = $nombre;
        $docente->apellido = $apellido;
        $docente->email = $email;
        $docente->telefono = $telefono;
        $docente->blog = $blog;
        $docente->profesional = $profesional;
        $docente->escalaron = $escalaron;
        $docente->idioma = $idioma;
        $docente->anios_experiencia = $anios_experiencia;
        $docente->area_trabajo = $area_trabajo;

        try {
            $result = DAODocente::agregar_docente($docente);
            header("Location: ../views/docente/agregar.php?msg=Usuario Agregado con exito");
            exit;
        } catch (Exception $error) {
            header("Location: ../views/docente/agregar.php?msg=" . $error->getMessage());
            exit;
        }
    }

    
    public function buscarDocente()
    {
        $id = $_REQUEST["id"];
        $pagina = $_REQUEST["pagina"];
        try {
            $docente = DAODocente::buscar_docente($id);
            $docente = serialize($docente);
            $_SESSION["docente"] = $docente;
            header("Location: ../views/docente/$pagina.php?msg=Usuario encontrado");
            exit;
        } catch (\Throwable $error) {
            unset($_SESSION["usuario"]);
            header("Location: ../views/docente/buscar.php?msg=" . $error->getMessage());
            exit;
        }
    }

    public function editar()
    {
        $id = $_REQUEST["id"];
        $id_usuario = $_REQUEST["id_usuario"];
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $email = $_REQUEST["email"];
        $telefono = $_REQUEST["telefono"];
        $blog = $_REQUEST["blog"];
        $profesional = $_REQUEST["profesional"];
        $escalaron = $_REQUEST["escalaron"];
        $idioma = $_REQUEST["idioma"];
        $anios_experiencia = $_REQUEST["anios_experiencia"];
        $area_trabajo = $_REQUEST["area_trabajo"];

        $docente = @$_SESSION["docente"];
        $docente = @unserialize($docente);

        $docente->id=$id;
        $docente->id_usuario = $id_usuario;
        $docente->nombre = $nombre;
        $docente->apellido = $apellido;
        $docente->email = $email;
        $docente->telefono = $telefono;
        $docente->blog = $blog;
        $docente->profesional = $profesional;
        $docente->escalaron = $escalaron;
        $docente->idioma = $idioma;
        $docente->anios_experiencia = $anios_experiencia;
        $docente->area_trabajo = $area_trabajo;
        $result = DAODocente::modificar_docente($docente);

        if ($result == false) {
            unset($_SESSION["docente"]);
            header("Location: ../views/docente/editar.php?id=" . $id . "&msg=Usuario editado con exito");

            exit;
        } else {
            unset($_SESSION["docente"]);
            header("Location: ../views/docente/editar.php?id=" . $id . "&msg=El usuario no pude ser editado");
            exit;
        }
    }

    public function eliminar()
    {
        $id = $_REQUEST["id"];
        DAODocente::eliminar_docente($id);

        if (true) {
            unset($_SESSION["usuario"]);
            header("Location: ../views/docente/listar.php?msg=Usuario eliminado con exito");
            exit;
        } else {
            unset($_SESSION["usuario"]);
            header("Location: ../views/docente/eliminar.php?msg=Usuario no pudo ser eliminado");
            exit;
        }
    }
}

$docentecontroller = new DocenteController();
$docentecontroller->recuperarAccion();
