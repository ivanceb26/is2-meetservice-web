<?php

class userDao {

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
    
    public function login($user,$passw){

	$result=mysql_query("SELECT * FROM user WHERE user='$user' AND password='$passw' "); 
	$count = mysql_num_rows($result);

	/*como el usuario debe ser unico cuenta el numero de ocurrencias con esos datos*/


		if ($count==1){
                    //echo "exitoso";
		return true;

		}else{
                    //echo "fallido";
		return false;

		}
	}

    

    /**
     * agregar nuevo usuario
     */
    public function insertUser($username, $password, $name, $lastname, $document, $tel, $address, $email, $profession) {

        $result = mysql_query("INSERT INTO user(user, password, name, lastname, document, 
            telephone, address, email, profesion) VALUES('$username', '$password' ,'$name', '$lastname', '$document',
                '$tel', '$address', '$email', '$profession')");
        // check for successful store

        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    public function updateUser($username, $password, $name, $lastname, $document, $tel, $address, $email, $profession) {

        $result = mysql_query("UPDATE user SET user=$username , password=$password ,
            name=$name , lastname=$lastname , document=$document , 
            telephone=$tel , address=$address , email=$email , profesion=$profession WHERE user=$username");
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
    public function isUserExist($username) {

        $result = mysql_query("SELECT user from user WHERE username = '$username'");

        $num_rows = mysql_num_rows($result); //numero de filas retornadas

        if ($num_rows > 0) {

            // el usuario existe 

            return true;
        } else {
            // no existe
            return false;
        }
    }

    public function deleteUser($username) {
        $result = mysql_query("DELETE FROM user WHERE USER=$username");
    }
    
    public function queryAllUser(){
        $result = mysql_query("SELECT * FROM user");
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
    
    public function queryUserByUser($user){
        $result = mysql_query("SELECT * FROM user WHERE user='$user' ");
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
    
    public function queryUserByEmail($email){
        $result = mysql_query("SELECT * FROM user WHERE email='$email' ");
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
