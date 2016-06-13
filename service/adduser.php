<?php

$username = $_POST['user'];
$password = $_POST['password'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$document = $_POST['document'];
$tel = $_POST['telephone'];
$address = $_POST['address'];
$email = $_POST['email'];
$profession = $_POST['profession'];

require_once 'userdao.php';
$db = new userDao();

if ($db->isuserexist($username)) {

    //echo(" Este usuario ya existe ingrese otro diferente!");
} else {

    if ($db->insertUser($username, $password, $name, $lastname, $document, $tel, $address, $email, $profession)) {
        //echo(" El usuario fue agregado a la Base de Datos correctamente.");
		$resultado[]=array("respond"=>"1");
    } else {
        //echo(" ha ocurrido un error.");
		$resultado[]=array("respond"=>"0");
    }
}

echo json_encode($resultado);
?>



