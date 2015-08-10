<?php
require_once "Database.php";

/**
*
*/
class Tarea
{

    public function select($id = NULL)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $query = "SELECT * FROM usuarios";
        try {
            $result = $mysqli->query($query);

        } catch (Exception $e) {
            return $e->errorMessage();
        }
        $response = array();
        foreach ($result as $usuarios) {
            /*echo $usuarios['nombre'] . ' , ' .
                 $usuarios['apellido'] . " , " .
                 $usuarios['usuario'] . " , " .
                 $usuarios['dni']. " , " .
                 $usuarios['sexo']. " , " .
                 $usuarios['imagen'];
            echo "<br /><br />";
*/          $response[]=$usuarios;
        }
        return $response;
    }
    public function insert($param1,$param2,$param3,$param4)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $query = $mysqli->prepare("INSERT INTO usuarios (nombre,
apellido,
usuario,
dni) VALUES (?, ?, ?, ?)");
        $query->bind_param('ssss', $param1,$param2,$param3,$param4);

        
        try {
            $result = $mysqli->query($query);

        } catch (Exception $e) {
            return $e->errorMessage();
        }
        return $result;
    }
}