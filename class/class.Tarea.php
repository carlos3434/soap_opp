<?php

/**
*
*/
class Tarea
{

    public function select($id = NULL)
    { 
        $return = array();
        $db = Database::getInstance(); 
        $mysqli = $db->getConnection(); 
        $query = "SELECT * FROM tareas ";
        if ($id != NULL) { 
            $query .= " WHERE id = '$id' "; 
        }
        $query .= " ORDER BY created_at DESC";
        try {
            $result = $mysqli->query($query);
        } catch (Exception $e) {
            return $e->errorMessage();
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data = array(
                    'asunto' => $row->asunto,
                    'actividad' => $row->actividad,
                    'requerimiento' => $row->requerimiento,
                    'serie_deco' => $row->serie_deco,
                    'serie_tarjeta' => $row->serie_tarjeta,
                    'telefono_origen' => $row->telefono_origen
                );
                array_push($return, $data);
            }
        }
        $result->free();
        return $return;
    }
    public function insert(
        $asunto,
        $actividad,
        $requerimiento,
        $serieDeco,
        $serieTarjeta,
        $telefonoOrigen
    )
    {
        $db = Database::getInstance();

        $mysqli = $db->getConnection();

        $query = $mysqli->prepare(
            "INSERT INTO tareas (asunto,
          actividad, requerimiento, serie_deco, serie_tarjeta, telefono_origen)
          VALUES (?, ?, ?, ?, ?, ?)"
        );
        $query->bind_param(
            'ssssss',
            $asunto,
            $actividad,
            $requerimiento,
            $serieDeco,
            $serieTarjeta,
            $telefonoOrigen
        );

        try {
            $return = $mysqli->query($query);

        } catch (Exception $e) {
            return $e->errorMessage();
        }
        return $return;
    }
    public function test( $par){
        return $par.'asnajnsajkn';
    }
}
