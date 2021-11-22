var validacion = (function(){    //funcion patron modulo para validar el registro de cada usuario
   
    return {    
        multi: function() {
            let name = document.querySelector("#name").value;
            let email = document.querySelector("#email").value;
            let pass = document.querySelector("#password").value;
            let Rtpass = document.querySelector("#password_confirmation").value;
            

            

            if(name != "" && email != "" && pass != "" && Rtpass != "" ){//si el nombre,email,pasword y  repetir  paswoird  no estan vacios se puede oprimir  el  boton   registrar
                document.querySelector("#registrar").disabled=false;

            }if(name == ""){//si el  nombre esta  vacio
                document.querySelector("#mensaje1").style.display = "block";
                document.querySelector("#registrar").disabled=true;
            }else if(name != ""){//si  el  nombre  no esta  vacio
                document.querySelector("#mensaje1").style.display = "none";
            }
            if(email == ""){//si el email   esta vacio
                document.querySelector("#mensaje2").style.display = "block";
                document.querySelector("#registrar").disabled=true;
            }else if(email != ""){//si el email  no esta vacio
                document.querySelector("#mensaje2").style.display = "none";
            }if(pass == ""){//si el password  esta vacio
                document.querySelector("#mensaje3").style.display = "block";
                document.querySelector("#registrar").disabled=true;
            }else if(pass != ""){//si el password no esta  vacio
                document.querySelector("#mensaje3").style.display = "none";
                if(pass.length < 8){//validacion  por si  la contraseña tiene menos  de   8  digitos
                    document.querySelector("#mensaje5").style.display = "block";
                    document.querySelector("#mensaje5").innerHTML = "Ingrese una contraseña con 8 digitos"
                    document.querySelector("#registrar").disabled=true;
                }else if(pass.length >= 8){//si  la   contraseña tiene 8 digitos es  aceptable
                    document.querySelector("#mensaje5").style.display = "none";
                }
            }
            if(Rtpass == ""){//si en  repetir  contraseña esta  vacio
                document.querySelector("#mensaje4").style.display = "block";
                document.querySelector("#registrar").disabled=true;
            }else if(Rtpass != ""){//si  repetir contraseña  no esta vacio
                document.querySelector("#mensaje4").style.display = "none";
                if(Rtpass != pass){//si  la  contraseña es diferente  de repetir contraseña
                    document.querySelector("#mensaje6").style.display = "block";
                    document.querySelector("#mensaje6").innerHTML = "No coinciden la contraseñas"
                    document.querySelector("#registrar").disabled=true;
                }else if(Rtpass == pass){//si repetir  contraseña es igual a  la contraseña anterior   puesta por  el usuario
                    document.querySelector("#mensaje6").style.display = "none";
                }

                
            }
            


            
        }
    }

})();