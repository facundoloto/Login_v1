<?php
include ("conexion.php");
include("send.php");
if(empty($_POST["name"]||$_POST["user"])||empty($_POST["password"])){ //avisa si un campo esta vacio si esta vacio no ejecuta ningun codigo
echo "usuario o contraseña no ingresados";
}
else{



$name=$_POST["name"];
$usuario=$_POST["user"];
$contraseña=$_POST["password"];
$activo_User=false; //banderas que van a validar si el nombre o el correo ya esta utilizado
$activo_Name=false;

$sql="select*from registrarse";//llama todos los registros 
$consulta= $connection->prepare($sql);//$connection es el objeto de la clase conexion,el metodo prepare guarda una consulta
$consulta->execute(); //la consulta se guarda en la variable consulta y herede los metodos de la objeto conection,execute ejecuta la cosnsulta
$resultado=$consulta->fetchAll();//resultado es una variable y fetch all lo que hace es guardar todos los indices y datos de la consulta
$array_num = count($resultado);
for ($i = 0; $i < $array_num; $i++){ //for recorre el array con las columnas y valores
if($name==$resultado[$i]['name']){
  $activo_Name=true; //si un nombre ya esta registrado se activa la bandera
  }
 
  else{
    $activo_Name=false;
  }
   //segundo if
  if($usuario==$resultado[$i]['email']){ //si el email ya esta registrado se activa la bandera
    $activo_User=true;
}
else{
    $activo_User=false;
  }
  
//primer if

}




if($activo_Name==true){ //valida si se encontro usuario si no se encontro pasa por el segundo if
 echo "usuario identico ";
  }
else{

if($activo_User==true){ //si se enctro email identico no guarda el registro
echo "email ya usado";
}
      
else{
//este el else se activa si el usuario y email no estan utilizados con esto guarda el nuevo usuario
$consulta=$connection->prepare("insert into registrarse (name,email,password) values (?,?,?);");
$resultado=$consulta->execute([$name,$usuario,$contraseña]);
if ($resultado==TRUE) { //si se ejecuto es true
echo "se registro el usuario";
sendEmail($usuario,$name,$contraseña);
echo "<script>windows.history.go(-1)</script>";
}
else{
echo "Error ".$name."".$usuario."".$contraseña;

}

}
}
}


/*}*/



?>