<?php
include ("conexion.php");
$usuario;
$contraseña;
$activo_User=false; //bandera que se ativa cuando el usuario es encontrado
$activo_Pass=false;//bandera que se activa para saber si se activa la contraseña
if(empty($_POST["user"])||empty($_POST["password"])){ //avisa si un campo esta vacio si esta vacio no ejecuta ningun codigo
echo "usuario o contraseña no ingresados";
}
else{
  $usuario=$_POST["user"];
  $contraseña=$_POST["password"];

try{
$sql="select*from registrarse where email='$usuario'";//busca los registro en base el usuario ingresado,esto es para que la contraseña que se valide sea la de ese usuario y no la de otro
$consulta= $connection->prepare($sql);//$connection es el objeto de la clase conexion,el metodo prepare guarda una consulta
$consulta->execute(); //la consulta se guarda en la variable consulta y herede los metodos de la objeto conection,execute ejecuta la cosnsulta
$resultado=$consulta->fetchAll();//resultado es una variable y fetch all lo que hace es guardar todos los indices y datos de la consulta
$array_num = count($resultado);
for ($i = 0; $i < $array_num; ++$i){ //for recore el usuario y contraseña que se ingreso
if($usuario==$resultado[$i]['email']){ //primero registra si el usuario es el correcto
  $activo_User=true; //usuario encontrado pasa al siguiente if
  if($contraseña==$resultado[$i]['password']){ // y si es verdadero compara contraseña del formulario coincide con la del usuario
    $activo_Pass=true; //contraseña encontrada
  }
  //segundo if
  else{
    $activo_Pass=false;
  }
}
//primer if
else{
  $activo_User=false;
}

}

//if con banderas para saber si se activo el usuario y contraseña
if($activo_User==true){
  if($activo_Pass==true){
    header("location:bienvenido.html");//si el usuario y contraseña es correcta se envia al inicio de la pagina
  }
  else{
    echo "contraseña incorrecta";
  }
}
else{
  echo "usuario incorrecto";
}

}
catch(Exception $e){
echo "no se encontro usuario";
}




}
/*foreach($resultado as $name){
 if($usuario==$name['usuario']){
   echo $usuario;
 }
  /*$sql="select*from login where usuario='$usuario'";
  $consulta= $connection->prepare($sql);
  $consulta->execute();
  $comparar=$consulta->fetchAll();
  foreach($comparar as $validar){
  echo $validar['usuario'];
  echo $validar['contraseña'];
  }
  /*if($contraseña==$name['contraseña']){
    $activo=true;
  header("location:bienvenido.html");
  }*/
 

?>


