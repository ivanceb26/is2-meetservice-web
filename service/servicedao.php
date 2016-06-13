<?php

class serviceDao {

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
    public function insertService($cod, $description, $name, $category, $city, $tel, $address, $email, $webpage) {

        $result = mysql_query("INSERT INTO service(cod, description, name, category, city, 
            telephone, address, email, webpage) VALUES('$cod', '$description' ,'$name', '$category', '$city',
                '$tel', '$address', '$email', '$webpage')");


        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    public function updateService($cod, $description, $name, $category, $city, $tel, $address, $email, $webpage) {

        $result = mysql_query("UPDATE service SET cod=$cod , description=$description ,
            name=$name , category=$category , city=$city , 
            telephone=$tel , address=$address , email=$email , webpage=$webpage WHERE cod=$cod");
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
    public function isServiceExist($cod) {

        $result = mysql_query("SELECT cod FROM service WHERE cod = '$cod'");

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
        $result = mysql_query("DELETE FROM service WHERE cod=$cod");
    }

	public function queryServiceByName($name){
        $result = mysql_query("SELECT * FROM service WHERE name='$name' ");
		$temp_array = array();
		$return_array = array();
		while($obj = mysql_fetch_object($result)){
			foreach($obj as $key => $value) {
				$tmp_array[$key]=$value;                               
			}
			$return_array[]=$tmp_array;
		}
        return $return_array;
    }
	
	public function queryServiceByUserCod($usercod){
        $result = mysql_query("SELECT * FROM service WHERE usercod='$usercod' ");
		$temp_array = array();
		$return_array = array();
		while($obj = mysql_fetch_object($result)){
			foreach($obj as $key => $value) {
				$tmp_array[$key]=$value;                               
			}
			$return_array[]=$tmp_array;
		}
        return $return_array;
    }
	
	public function queryServiceByCod($cod){
        $result = mysql_query("SELECT * FROM service WHERE cod='$cod' ");
		$temp_array = array();
		$return_array = array();
		while($obj = mysql_fetch_object($result)){
			foreach($obj as $key => $value) {
				$tmp_array[$key]=$value;                               
			}
			$return_array[]=$tmp_array;
		}
        return $return_array;
    }
	
	public function queryServiceByCategory($category){
        $result = mysql_query("SELECT * FROM service WHERE category='$category' ");
		$temp_array = array();
		$return_array = array();
		while($obj = mysql_fetch_object($result)){
			foreach($obj as $key => $value) {
				$tmp_array[$key]=$value;                               
			}
			$return_array[]=$tmp_array;
		}
        return $return_array;
    }
	
	
	
	public function queryServiceAll(){
        $result = mysql_query("SELECT * FROM service");
		$temp_array = array();
		$return_array = array();
		while($obj = mysql_fetch_object($result)){
			foreach($obj as $key => $value) {
				$tmp_array[$key]=$value;                               
			}
			$return_array[]=$tmp_array;
		}
        return $return_array;
    }
	
}

?>
