<?php 
include("conexion.php");
$email=$_POST['user'];
$new_Password=$_POST['password'];

$consulta=$connection->prepare("update registrarse set password='$new_Password' where email='$email';");
$resultado=$consulta->execute();
if ($resultado==TRUE) { //si se ejecuto es true
echo "se cambio el usuario "."<a href='index.hmtl'></a>";
}
else{
echo "Error ";

}





?>