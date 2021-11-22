
var validacion = (function(){   //objeto patron modulo  
   
    return {    //Tood lo que va aqui es publico
        multi: function() {//funcion para verificar campos vacios y ver que las password se han iguales
    
            let email = document.querySelector("#email").value;
            let pass = document.querySelector("#password").value;

            if (email != "" && pass != ""){
                document.querySelector("#login").disabled=false;
            }if(email == ""){
                document.querySelector("#mensaje1").style.display = "block";
                document.querySelector("#login").disabled=true;
            }else if(email != ""){
                document.querySelector("#mensaje1").style.display = "none";
            }
            if(pass == ""){
                document.querySelector("#mensaje2").style.display = "block";
                document.querySelector("#login").disabled=true;
            }else if(pass != ""){
                document.querySelector("#mensaje2").style.display = "none";
            }
            
        }
    }

})();