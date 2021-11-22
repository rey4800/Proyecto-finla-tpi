@extends('layout')
@section('linkyscrip')
<style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
            
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: linear-gradient(35deg,#000000,#2b2e53,#2F3F80,#161569,#5A4894,#A950A1,#FF7CAE);
                background-size: 500%;
                display: grid;
                min-height: 100vh;
                grid-template-rows: auto 1fr auto ;
            }
            .navbar:hover {
                background-color: black;
            }
            .a{
                margin-right: 15px ;
                font-family: street2_medium;
                font-size: 18px;
                font-style: normal;
                text-decoration: none;
                text-transform: none;
                line-height: 20px;
                letter-spacing: 0px;
                
            }
           
        </style>

@endsection

@section('navbar')
    <div class="navbar  sticky-top navbar-light"  style="width:100%; height:70px;display:flex;">
      <div class="px-6" style="float:center">
        <a href="{{route('home')}}"><h3 class="text-white" >TVMOVIE</h3></a>
        
      </div>
      <div class="px-4 " style="float: right;">
        <nav class="text-white px-3">
        @if(auth()->check())
            <span><a class="a text-sm text-red underline">Bienvenido <b>{{auth()->user()->name}}</b></a></span>
            @if(auth()->user()->role == 'admin')
              <span><a href="../peliculas" class="a text-sm text-red underline">administrar peliculas</a></span>
              <span><a href="{{route('compras.index')}}" class="a text-sm text-red underline">registro de compras</a></span>
              <span><a href="{{route('alquileres.index')}}" class="a text-sm text-red underline">registro de alquileres</a></span> 
            @endif
            <span><a href="{{route('login.destroy')}}" class="a text-sm text-red underline">Cerrar sesion</a></span>
              

          @else
          <span><a href="{{route('register.index')}}" class="a text-sm text-red underline">Suscribete</a></span>
          <span><a href="{{route('login.index')}}" class="a text-sm text-red underline">Iniciar sesión</a></span>
        @endif
        </nav>
      </div>  
    </div>
@endsection



@section('contenidoPrincipal')



<div class="container my-5 ">
  <div class="row m-0 bg-dark">
    <div class="col-md-4 p-0">
      <img src="../{{$pelicula->imagen}}" style="width:100%;" >
      <div class="row px-3 pt-5 pb-4">
        <div class="col-8">@include('pelicula.like') </div>
        <div class="col-4 text-white">
        <p class="card-text ">{{$pelicula->likes}}
        <!-- icono temporal-->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
          </svg>
        
        </p>
        </div>
        
      </div>
    </div>
    <div class="col-md-8  p-0 bg-dark text-white">
      <div class="row w-100 p-3 text-center">
          <h2 class="text-white"> TITULO: {{$pelicula->titulo}}</h2>
      </div>
      <div class="row px-3 pb-2">
        <h5><b>DESCRIPCION:</b> {{$pelicula->descripcion}}</h5>
      </div>
      <div class="row px-3 pb-2 ">
        <div class="col-7"><h5><b>PRECIO DE VENTA:</b> ${{$pelicula->precio_com}}</h5></div>
        <div class="col-5">@include('pelicula.compra') </div>
      </div>
      <div class="row px-3 pb-2">
        <div class="col-7"><h5><b>PRECIO DE RENTA:</b> ${{$pelicula->precio_al}}</h5></div>
        <div class="col-5">@include('pelicula.rentar')   </div>
      </div>
      
    </div> 
  </div>
</div>



@endsection
@section('footer')
    <footer class="bg-light text-center text-lg-start text-white ">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: black;">
                © 2020 Copyright: TVMOVIE
                
            </div>
            <!-- Copyright -->
    </footer>
@endsection

