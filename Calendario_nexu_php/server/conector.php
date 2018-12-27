<?php

class ConectorBD {

    private $host;
    private $user;
    private $password;
    private $conexion;
    private $db;

    function __construct($host, $user, $password,$db) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    function initConexion() {
        ini_set('max_execution_time', 10000000000);
        $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db;", $this->user, $this->password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SET NAMES 'utf8'";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
         try {
            if (!$this->conexion) {
                echo "¡No jabon no te has conectado todavía!";
            }
        } catch (Exception $ex) {
            echo $ex;
        }
        return $this->conexion;
    }

    function newTable($nombre_tbl, $campos) {
        $sql = 'CREATE TABLE ' . $nombre_tbl . ' (';
        $length_array = count($campos);
        $i = 1;
        foreach ($campos as $key => $value) {
            $sql .= $key . ' ' . $value;
            if ($i != $length_array) {
                $sql .= ', ';
            } else {
                $sql .= ');';
            }
            $i++;
        }
        return $this->ejecutarQuery($sql);
    }

    function ejecutarQuery($query) { 
        return $this->initConexion()->prepare($query);
    }
  

    function cerrarConexion() {
        $this->conexion->close();
    }

    function nuevaRestriccion($tabla, $restriccion) {
        $sql = 'ALTER TABLE ' . $tabla . ' ' . $restriccion;
        return $this->ejecutarQuery($sql);
    }

    function nuevaRelacion($from_tbl, $to_tbl, $from_field, $to_field) {
        $sql = 'ALTER TABLE ' . $from_tbl . ' ADD FOREIGN KEY (' . $from_field . ') REFERENCES ' . $to_tbl . '(' . $to_field . ');';
        return $this->ejecutarQuery($sql);
    }

    function insertData($tabla, $data) {
        $sql = 'INSERT INTO ' . $tabla . ' (';
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= $key;
            if ($i < count($data)) {
                $sql .= ', ';
            } else
                $sql .= ')';
            $i++;
        }
        $sql .= ' VALUES (';
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= "'".$value."'";
            if ($i < count($data)) {
                $sql .= ', ';
            } else
                $sql .= ');';
            $i++;
        }
         //echo $sql;
        return $this->ejecutarQuery($sql);
    }

    function getConexion() {
        return $this->conexion;
    }

    function actualizarRegistro($tabla, $data, $condicion) {
        $sql = 'UPDATE ' . $tabla . ' SET ';
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .=  $key . '=' . "'".$value."'";
            if ($i < sizeof($data)) {
                $sql .= ', ';
            } else
                $sql .= ' WHERE ' . $condicion . ';';
            $i++;
        }
         
     return $this->ejecutarQuery($sql);
    }

    function eliminarRegistro($tabla, $condicion) {
        $sql = "DELETE FROM " . $tabla . " WHERE " . $condicion . ";";
        return $this->ejecutarQuery($sql);
    }

    function consultar($tablas, $campos, $condicion = "") {
        $sql = "SELECT ";
        $ultima_key = end(array_keys($campos));
        foreach ($campos as $key => $value) {
            $sql .= $value;
            if ($key != $ultima_key) {
                $sql .= ", ";
            } else
                $sql .= " FROM ";
        }

        $ultima_key = end(array_keys($tablas));
        foreach ($tablas as $key => $value) {
            $sql .= $value;
            if ($key != $ultima_key) {
                $sql .= ", ";
            } else
                $sql .= " ";
        }

        if ($condicion == "") {
            $sql .= ";";
        } else {
            $sql .= $condicion . ";";
        }
        
        return $this->ejecutarQuery($sql);
    }

}

?>
