<?php

require_once 'citydao.php';
$db = new cityDao();
$resultado = $db->queryCityAll();
echo json_encode($resultado);
?>



