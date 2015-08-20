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
    public function insert( $data )
    {
        $db = Database::getInstance();

        $mysqli = $db->getConnection();

        $asunto = $data['asunto'];
        $actividad = $data['actividad'];
        $requerimiento = $data['requerimiento'];
        $serieDeco = $data['serieDeco'];
        $serieTarjeta = $data['serieTarjeta'];
        $telefonoOrigen = $data['telefonoOrigen'];
        if ($asunto <>'' && $actividad <>'' && $requerimiento <>'' &&
            $serieDeco <>'' && $serieTarjeta <>'' && $telefonoOrigen<>'') {

            $query = "INSERT INTO tareas (asunto,actividad, requerimiento,
                serie_deco, serie_tarjeta, telefono_origen, estado,created_at,
                usuario_created_at)
              VALUES ( '$asunto','$actividad','$requerimiento',
                '$serieDeco','$serieTarjeta','$telefonoOrigen',1, now(),666)";

            try {
                $return = $mysqli->query($query);

            } catch (Exception $e) {
                //return $e->errorMessage();
                return '0';
            }

            if ($mysqli->affected_rows > 0) {
                //INSERT SUCCESS
                return '1';
            } else {
                //INSERT FAILED
                return '0';
            }
        } else {
            return '0';
        }
    }
}
