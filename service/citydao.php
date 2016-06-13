<?php

class cityDao {

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
    public function insertCity($name) {

        $result = mysql_query("INSERT INTO CITY(name) VALUES('$name')");


        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Verificar si el usuario ya existe por el username
     */
    public function isCityExist($name) {

        $result = mysql_query("SELECT name FROM city WHERE name = '$name'");

        $num_rows = mysql_num_rows($result); //numero de filas retornadas

        if ($num_rows > 0) {

            // el servicio existe 

            return true;
        } else {
            // no existe
            return false;
        }
    }

    public function deleteService($name) {
        $result = mysql_query("DELETE FROM city WHERE name=$name");
    }

    public function queryCityByName($city) {
        $result = mysql_query("SELECT * FROM city WHERE name='$city' ");

        while ($row = mysql_fetch_array($result)) {
            echo $row['name'];
            $retunrarray[]=array("name"=>$row['name']);
           
        }
         //echo json_encode($retunrarray);
        return $retunrarray;
    }

    public function queryCityAll() {
        $result = mysql_query("SELECT * FROM city");

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

    

}

?>
