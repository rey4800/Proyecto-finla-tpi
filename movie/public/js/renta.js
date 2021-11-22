

var validacion = (function(){  //objeto patron modulo   
   
    return {    
        multi2: function() {//funcion para verificar que los campos no esten vacios
    
            let nombre = document.querySelector("#nombre").value;
            let tarjeta = document.querySelector("#tarjeta").value;
            let mes = document.querySelector("#mes").value;
            let anio = document.querySelector("#anio").value;
            let cvv = document.querySelector("#cvv").value;


            if (nombre!= "" && tarjeta != "" && mes != "Mes" && anio != "Año" && cvv != ""){//si el nombre,numero de tarjeta, el mes, el año y   el  codigo de  seguridad  no estan  vacios
                document.querySelector("#comprar").disabled=false;
            }if(nombre == ""){//si el nombre  de   la  tarjeta  esta vacio
                document.querySelector("#mensaje1").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(nombre != ""){//si el nombre  de   la  tarjeta  no esta vacio
                document.querySelector("#mensaje1").style.display = "none";
            }
            if(tarjeta == ""){//si el numero  de   la  tarjeta  esta vacio
                document.querySelector("#mensaje2").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(tarjeta != ""){//si el numero  de   la  tarjeta no esta vacio
                document.querySelector("#mensaje2").style.display = "none";
            }if(mes == ""){//si el mes  de   la  tarjeta  esta vacio
                document.querySelector("#mensaje3").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(mes != "Mes"){//si el mes  de   la  tarjeta no  esta vacio
                document.querySelector("#mensaje3").style.display = "none";
            }if(anio == ""){//si el año  de   la  tarjeta  esta vacio
                document.querySelector("#mensaje4").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(anio != "Año"){//si el año  de   la  tarjeta no esta vacio
                document.querySelector("#mensaje4").style.display = "none";
            }if(cvv == ""){//si el codigo de seguridad  de   la  tarjeta  esta vacio
                document.querySelector("#mensaje5").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(cvv != ""){//si el codigo  de seguridad  de   la  tarjeta  no esta vacio
                document.querySelector("#mensaje5").style.display = "none";
            }
            
        }
    }

})();