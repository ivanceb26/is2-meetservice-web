<?php
$attrib = $_POST['attrib'];
$query=$_POST['query'];


require_once 'servicedao.php';

$db = new serviceDao();

if($query==='ALL'){
	$resultado = $db->queryServiceAll();
}
if($query==='BYUSER' ){
	$resultado = $db->queryServiceByUserCod($attrib);
}
echo json_encode($resultado);
?>



