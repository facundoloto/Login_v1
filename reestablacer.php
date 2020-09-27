<?php 
include ("conexion.php");
include("send.php");
 $email=$_POST["user"];
$active_User=false;
$sql="select*from registrarse where email='$email'";//busca los registro en base el usuario ingresado,esto es para que la contraseña que se valide sea la de ese usuario y no la de otro
$consulta= $connection->prepare($sql);//$connection es el objeto de la clase conexion,el metodo prepare guarda una consulta
$consulta->execute(); //la consulta se guarda en la variable consulta y herede los metodos de la objeto conection,execute ejecuta la cosnsulta
$resultado=$consulta->fetchAll();//resultado es una variable y fetch all lo que hace es guardar todos los indices y datos de la consulta
$array_num = count($resultado);
for ($i = 0; $i < $array_num; ++$i){ //for recore el usuario y contraseña que se ingreso
if($email==$resultado[$i]['email']){ //primero registra si el usuario es el correcto
  $active_User=true; //usuario encontrado pasa al siguiente if
}
//primer if
else{
  $active_User=false;
}

}

//if con banderas para saber si se activo el usuario y contraseña
if($active_User==true){
    sendPassword($email,1223);
 echo "se envio un correo para reestablecer la contraseña";
 
}
else{
  echo "este email no esta asociado a ninguna cuenta";
}



?>