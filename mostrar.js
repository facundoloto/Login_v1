let boton=document.getElementById("mostrar")
boton.checked=false;
let tipo = document.getElementById("contraseña");
boton.addEventListener("click",
	function mostrar(){
		if(boton.checked==true){
			tipo.type = "text"; //cambia a texto el input
		}else{
			tipo.type = "password"; //si se apreta de vuelta vuelve a input password
		}
    }

)