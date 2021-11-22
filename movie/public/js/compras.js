

var validacion = (function(){//funcion patron modulo

    let valor3 = 0;

    return {

         multi: function() {//Funcion para verificar que la cantidad de compras no supere el stock
    
            let valor = parseFloat(document.querySelector("#cantidad").value);//selecionamos el input que   se  llama cantidad
            let valor2 = parseFloat(document.querySelector("#stock").value);
            
            
            
            if(valor>valor2){//condicion para comparar si la cantidad  es  mayor  que el stock
            
            document.querySelector("#mensajeCantidad").style.display = "block";
            document.querySelector("#comprar").disabled=true;
            
            
            }else if(valor<=valor2 && valor>=1){//
            
                document.querySelector("#mensajeCantidad").style.display = "none";
                document.querySelector("#mensajeCantidad2").style.display = "none";
                document.querySelector("#comprar").disabled=false;
            
                try {
            
                    let b = parseFloat(document.querySelector("#cantidad").value);
                    let a = parseFloat(document.querySelector("#precio").value);
                    
            
                    document.querySelector("#total").value = a*b;
                   
                } catch (error) {
                    
                    
                }
                
            
            }else {
                document.querySelector("#mensajeCantidad2").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }
            
            
        },
        multi2: function() {//Funcion para verificar los campos vacios
    
            let nombre = document.querySelector("#nombre").value;
            let tarjeta = document.querySelector("#tarjeta").value;
            let mes = document.querySelector("#mes").value;
            let anio = document.querySelector("#anio").value;
            let cvv = document.querySelector("#cvv").value;


            if (nombre!= "" && tarjeta != "" && mes != "Mes" && anio != "Año" && cvv != ""){//condicion  para comparar el  combobox
                document.querySelector("#comprar").disabled=false;
            }if(nombre == ""){//ei el input esta  vacio
                document.querySelector("#mensaje1").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(nombre != ""){//si el input   no esta vacio
                document.querySelector("#mensaje1").style.display = "none";
            }
            if(tarjeta == ""){//si el input de  numero de tarjeta  esta vacio
                document.querySelector("#mensaje2").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(tarjeta != ""){//si  el  input de numero de  tarjeta nno esta  vacio
                document.querySelector("#mensaje2").style.display = "none";
            }if(mes == ""){//si el commbobox de la fecha de vencimiento mes  esta vacio
                document.querySelector("#mensaje3").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(mes != "Mes"){//si el  combo  box  de  la fecha de vencimiento mes no esta vacio
                document.querySelector("#mensaje3").style.display = "none";
            }if(anio == ""){//si la fecha  de vencimiento año esta  vacio
                document.querySelector("#mensaje4").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(anio != "Año"){//si la fecha  de vencimiento  año no esta vacio
                document.querySelector("#mensaje4").style.display = "none";
            }if(cvv == ""){//si  el  codigo de seguridad de  la tarjeta esta vacio
                document.querySelector("#mensaje5").style.display = "block";
                document.querySelector("#comprar").disabled=true;
            }else if(cvv != ""){//si el codigo de seguridad de la tarjeta  no esta vacio
                document.querySelector("#mensaje5").style.display = "none";
            }
            
        }
    }
    

}());





