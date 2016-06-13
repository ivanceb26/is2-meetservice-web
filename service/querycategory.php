<?php

require_once 'categorydao.php';
$db = new categoryDao();
$resultado = $db->queryCategoryAll();
echo json_encode($resultado);
?>



