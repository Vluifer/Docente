<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/models/Docente.php'; 
/**
 * Description of DAODocente
 *
 * @author LuiferV
 */
class DAODocente {
   public static function agregar_docente($docente) {
        try {
           return $docente->save();
        } catch (Exception $error) {
            throw new Exception("El docente que esta agregando posiblemente existe");        
        }
    }
    
    public static function buscar_docente($id) {
         try {
            $docente = Docente::find($id);
            return $docente;   
        } catch (Exception $error) {
        throw new Exception("Error al consultar docente con el identificador: $id");
        }
    }
    
    public static function eliminar_docente($id) {
        try {
            $docente = Docente::find_by_id($id);
	        $docente->delete();
            return $docente;
        } catch (\Throwable $th) {
            throw new Exception("Error al tratar de eliminar este usuario");
        }
    }
    
    public static function modificar_docente($docente) 
    {
        $sql = "UPDATE docentes
        SET  id = '$docente->id',  id_usuario = '$docente->id_usuario', nombre = '$docente->nombre', apellido = '$docente->apellido',
         email = '$docente->email', telefono = '$docente->telefono', blog = '$docente->blog', profesional = '$docente->profesional', escalaron = '$docente->escalaron',
         idioma = '$docente->idioma', anios_experiencia = '$docente->anios_experiencia', area_trabajo = '$docente->area_trabajo' 
         WHERE id  =$docente->id";
        $result = Docente::find_by_sql($sql);
        return $result;
    }
    
    public static function listar_docente() {
        return Docente::all();
    }
    
    public static function listar_docente_by_name($nombre) {
        return Docente::find_by_name($nombre);
    }

    public static function listar_docente_by_id($id)
    {
        $sql = "SELECT `id`, `id_usuario`, `nombre`, `apellido`, `email`, `telefono`, `blog`, `profesional`, `escalaron`,
        `idioma`, `anios_experiencia`, `area_trabajo` FROM `docentes` WHERE id = {$id}";
        $result = Docente::find_by_sql($sql);
        return $result;
    }
}
