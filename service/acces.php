
<?php

/*LOGIN*/

$usuario = $_POST['user'];
$passw = $_POST['password'];


require_once 'userdao.php';
$db = new userDao();

	if($db->login($usuario,$passw)){

	$resultado[]=array("logstatus"=>"1");
	}else{
	$resultado[]=array("logstatus"=>"0");
	}

echo json_encode($resultado);

?>
