@extends('layout')


@section('contenidoPrincipal')
<div class="row vh-100 row-cols-1 row-cols-md-2 g-1 m-0" style="width: 100%;" >
    <!-------------------------------- Parte izquierda ---------------------------------------->
    <div class="col m-0" style="  background-image: linear-gradient(35deg,#000000,#2b2e53,#2F3F80,#161569,#5A4894,#A950A1,#FF7CAE);
                background-size: 500%;">
        <div class="row row-vh-100 row-cols-md-vh-50 g-1  align-items-center h-100" >
            <div class="text-center">
                
               
                <a href="{{route('home')}}"><h1 class="text-center text-white "> TV MOVIE</h1></a>
            </div>   
        </div>
    </div>
    <!-------------------------------- parte derecha ---------------------------------------->
    <div class="col m-0" style=" background: url(img/4.jpg) no-repeat;
    background-size: cover;">
        <div class="row  row-vh-100 row-cols-md-vh-50 g-1 align-items-center justify-content-center h-100">
                <div class="col-8 col-md-6 text  ">
                    <div class="text-center">
                        <img class="mb-3 text-center" src="img/lg.png" style="width: 40%;">
                    </div>
                    
                    <div class="border bg-white ">
                        
                        <div style="background-color: rgba(59,168,231,255);">
                            <h3 class="text-center p-3 text-white">LOGIN</h3>
                        </div>
                        <!--------------------formulario----------------------------->
                        <form class="m-2" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Correo</label>
                                <input class="form-control" type="email" id = "email" name="email" placeholder="Email" oninput="validacion.multi()">
                                
                            </div>
                            <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje1">
                                Rellena el campo 
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input class="form-control" type="password" id="password"  name="password" placeholder="Contraseña" oninput="validacion.multi()">
                            </div >
                            <div class="alert alert-danger mb-1 "  style="display:block" role="alert" id="mensaje2">
                                Rellena el campo
                            </div>
                            @error('message')
                                <p class="border border-danger border-3 rounded text-danger"> {{$message}}</p>
                            @enderror
                            <div class="d-grid gap-2 col-5 mx-auto text-white">
                                <input class="btn btn-info text-white" type="submit" id="login" value="INICIAR SESION" disabled ><br>
                            </div>
                            <hr>
                            <div class="text-center">
                                <p>¿No eres miembro?  <a href="{{route('register.index')}}">¡Regístrese ahora!</a> </p>
                            </div>
                        </form>
                    </div>
                </div>  
        </div>
    </div>
</div>

<script  src="{{ asset('js/login.js') }}"></script>


@endsection