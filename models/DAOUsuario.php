<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Docente.php'; 

/**
 * Description of DAOUsuario
 *
 * @author LuiferV
 */
class DAOUsuario
{
    public static function agregar_usuario($usuario)
    {
        try {
            return $usuario->save();
        } catch (Exception $error) {
            throw new Exception("El usuario que esta agregando posiblemente existe");
        }
    }

    public static function buscar_usuario($cedula)
    {
        try {
            $usuario = Usuario::find($cedula);
            return $usuario;
        } catch (Exception $error) {
            throw new Exception("Error al consultar usuario con el identificador: $cedula");
        }
    }

    public static function eliminar_usuario($id)
    {
        try {
            $usuario = Usuario::find_by_id($id);
	        $usuario->delete();
            return $usuario;
        } catch (Exception $error) {
            return $error->getMessage();
        }
        
    }

    public static function modificar_usuario($usuario)
    {

        $sql = "UPDATE usuarios 
        SET cedula = '$usuario->cedula', clave = '$usuario->clave', nombre = '$usuario->nombre',
        telefono = '$usuario->telefono', email = '$usuario->email'
        WHERE id = $usuario->id";
        $result = Usuario::find_by_sql($sql);
        return $result;
    }

    public static function listar_usuario()
    {
        return Usuario::all();
    }

    public static function listar_usuario_by_name($nombre)
    {
        return Usuario::find_by_name($nombre);
    }

    public static function listar_usuario_by_id($clave)
    {
        $sql = "SELECT `id`, `cedula`, `clave`, `nombre`, `telefono`, `email` FROM `usuarios` WHERE id = {$clave}";
        $result = Usuario::find_by_sql($sql);
        return $result;
    }
}
