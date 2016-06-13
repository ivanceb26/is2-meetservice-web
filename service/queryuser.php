
<?php

/*LOGIN*/
$query = $_POST['query'];
$user = $_POST['user'];
$passw = $_POST['password'];


require_once 'userdao.php';
$db = new userDao();
if($query === "LOGIN"){
	if($db->login($user,$passw)){

	$resultado[]=array("logstatus"=>"1");
	}else{
	$resultado[]=array("logstatus"=>"0");
	}
}
if($query === "USER"){
	$resultado = $db->queryUserByUser($user);
}
echo json_encode($resultado);

?>
