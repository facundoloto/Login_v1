
let boton=document.getElementById("mostrar")
boton.click=true;
let terminos=document.getElementById("terms")
terminos.checked="false"
let registro=document.getElementById("SignUp")
terminos.addEventListener("click",function check(){
if (terminos.checked==true) {
registro.active
}
else{
registro.disable
}
}
)
let tipo = document.getElementById("contraseña");
boton.addEventListener("click",
	function mostrar(){
		if(boton.click==true){
			tipo.type = "text"; //cambia a texto el input
			boton.click=false;
		}else{
			tipo.type = "password"; //si se apreta de vuelta vuelve a input password
			boton.click=true;
		}
    }
    )
