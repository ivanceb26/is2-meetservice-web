<?php

$cod = $_POST['cod'];
$description = $_POST['description'];
$name = $_POST['name'];
$category = $_POST['category'];
$city = $_POST['city'];
$tel = $_POST['telephone'];
$address = $_POST['address'];
$email = $_POST['email'];
$webpage = $_POST['webpage'];

require_once 'servicedao.php';
$db = new serviceDao();

if ($db->isServiceExist($cod)) {

    echo(" Este servicio ya existe!");
} else {

    if ($db->insertService($cod, $description, $name, $category, $city, $tel, $address, $email, $webpage)) {
        echo(" El servicio fue agregado a la Base de Datos correctamente.");
		$resultado[]=array("respond"=>"1");
    } else {
        echo(" ha ocurrido un error.");
		$resultado[]=array("respond"=>"0");
    }
}


echo json_encode($resultado);
?>



