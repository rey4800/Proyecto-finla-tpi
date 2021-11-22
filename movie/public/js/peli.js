var validacion = (function(){   //objeto patron modulo   
   
    return {    
        multi: function() {//funcion para verificar que los campos no esten vacios
         
            let titulo = document.querySelector("#titulo").value;
            let descripcion = document.querySelector("#descripcion").value;
            let stock = parseInt(document.querySelector("#stock").value);
            let p_alquiler = parseInt(document.querySelector("#precio_al").value);
            let p_compra = parseInt(document.querySelector("#precio_com").value);
           
            if(titulo != "" && descripcion != "" && (stock != "" && stock >= 1) && (p_alquiler != "" && p_alquiler >= 1) && (p_compra != "" && p_compra >= 1 ) ){
                document.querySelector("#guardar").disabled=false;
            }if(titulo == "" ){
                document.querySelector("#mensaje1").style.display = "block";
                document.querySelector("#guardar").disabled=true;
            }else if(titulo != "" ){
                document.querySelector("#mensaje1").style.display = "none";
            }if(descripcion == ""){
                document.querySelector("#mensaje2").style.display = "block";
                document.querySelector("#guardar").disabled=true;
            }else if(descripcion != ""){
                document.querySelector("#mensaje2").style.display = "none";
            }if(stock == "" && stock < 1){
                document.querySelector("#mensaje3").style.display = "block";
                document.querySelector("#guardar").disabled=true;
            }else if(stock != "" && stock >= 1){
                document.querySelector("#mensaje3").style.display = "none";
            }if(p_alquiler == "" && p_alquiler < 1 ){
                document.querySelector("#mensaje4").style.display = "block";
                document.querySelector("#guardar").disabled=true;
            }else if(p_alquiler != "" && p_alquiler >= 1){
                document.querySelector("#mensaje4").style.display = "none";
            }if(p_compra == "" && p_compra < 1){
                document.querySelector("#mensaje5").style.display = "block";
                document.querySelector("#guardar").disabled=true;
            }else if(p_compra != "" && p_compra >= 1 ){
                document.querySelector("#mensaje5").style.display = "none";
            }
            
            
            
        }
    }

})();