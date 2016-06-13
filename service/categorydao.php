<?php

class categoryDao {

    private $db;

    // constructor

    function __construct() {
        require_once 'connectbd.php';
        // connecting to database

        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * agregar nuevo usuario
     */
    public function insertCategory($cod, $description, $name) {

        $result = mysql_query("INSERT INTO CATEGORY(cod, description, name)
            VALUES('$cod', '$description' ,'$name')");


        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    public function updateCategory($cod, $description, $name) {

        $result = mysql_query("UPDATE SERVICE SET cod=$cod , description=$description ,
            name=$name  WHERE cod=$cod");
        // check for successful store

        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Verificar si el usuario ya existe por el username
     */
    public function isCategoryExist($cod) {

        $result = mysql_query("SELECT cod FROM CATEGORY WHERE cod = '$cod'");

        $num_rows = mysql_num_rows($result); //numero de filas retornadas

        if ($num_rows > 0) {

            // el servicio existe 

            return true;
        } else {
            // no existe
            return false;
        }
    }

    public function deleteService($cod) {
        $result = mysql_query("DELETE FROM CATEGORY WHERE cod=$cod");
    }

    public function queryCategoryAll() {
        $result = mysql_query("SELECT * FROM category");
        $temp_array = array();
        $return_array = array();
        while ($obj = mysql_fetch_object($result)) {
            foreach ($obj as $key => $value) {
                $tmp_array[$key] = $value;
            }
            $return_array[] = $tmp_array;
        }
        return $return_array;
    }

    public function queryCategoryByCode($cod) {
        $result = mysql_query("SELECT * FROM category WHERE cod='$cod' ");
        $temp_array = array();
        $return_array = array();
        while ($obj = mssql_fetch_object($result)) {
            foreach ($obj as $key => $value) {
                $tmp_array[$key] = $value;
            }
            $return_array[] = $tmp_array;
        }
        return $return_array;
    }

}

?>
