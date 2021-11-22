

@extends('layouts.navbar')

@section('contenido')
    
<div class="container bg-white p-6 my-3  ">
  <div class="row text-center">
    <h2>COMPRAR PELICULA</h2>
  </div>
  <div class="row">
    <div class="col-md-4 g-6">
      <h4><u>Detalles de la Pelicula</u></h4>
      <div class="form-group mb-3">
        <label ><b>Titulo de la Pelicula: </b>{{$pelicula->titulo}}</label><br>
        <label ><b>Precio de la Pelicula: </b>${{$pelicula->precio_com}}</label><br>
        <label ><b>Disponibles: </b>{{$pelicula->stock}}</label><br>
      </div>
      <img src="{{asset($pelicula->imagen)}}" class='w-100'>
    </div>
    <div class="col-md-4">
      <!--campos ocultos para hacer las validaciones-->
      <div class="form-group col-md-1">
        <input type="hidden" class="form-control" id="stock" name="stock" value="{{$pelicula->stock}}">
      </div>
      <div class="form-group col-md-1">
        <input type="hidden" class="form-control" id="precio" name="precio" value="{{$pelicula->precio_com}}">
      </div>
       <!--Formulario -->
      <form action="{{url('/peliculas/'.$pelicula->id.'/buy')}}" method="post">
        @csrf
          <div class="form-row m-3">

            <div class="input-group col-md-4">  
              <span class="input-group-text">Cantidad que desea comprar</span>
              <input type="number"   class="form-control" id="cantidad" name="cantidad" oninput="validacion.multi()" value="1">
            </div>
  <!--div oculto para hacer las validaciones-->
            <div class="alert alert-danger mt-3"  style="display:none" role="alert" id="mensajeCantidad">
              La cantidad no puede superar el stock
            </div>
             <!--div oculto para hacer las validaciones-->
            <div class="alert alert-danger mt-3"  style="display:none" role="alert" id="mensajeCantidad2">
              La cantidad no puede ser menor de 1
            </div>
            <br><h5><u>Informacion de Pago</u></h5><br>

            <div class="input-group mb-3">
              <span class="input-group-text">Total</span>
              <input readonly="readonly" type="text" class="form-control" id="total" name="total" placeholder="" value="{{$pelicula->precio_com}}">
            </div><br>

            <div class="form-group ">
              <label for="nombre">Propietario de la tarjeta</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Carlos" oninput="validacion.multi2()">
            </div>
             <!--div oculto para hacer las validaciones-->
            <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje1"  >
              Rellena el campo 
            </div><br>
            
          <div class="form-group ">
            <label for="tarjeta">Número de Tarjeta</label>
            <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="0000-0000-0000-00000" oninput="validacion.multi2()">
          </div>
           <!--div oculto para hacer las validaciones-->
          <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje2"  >
              Rellena el campo 
          </div><br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Fecha de Vencimiento</label>
            </div>
            <div class="form-group col-md-4">
              <select id="mes"  class="form-control" oninput="validacion.multi2()">
                <option selected>Mes</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
             <!--div oculto para hacer las validaciones-->
            <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje3"  >
              Rellena el campo 
            </div><br>

            <div class="form-group col-md-4">
              <select id="anio"  class="form-control" oninput="validacion.multi2()">
                <option selected>Año</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
              </select>
            </div>
             <!--div oculto para hacer las validaciones-->
            <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje4"  >
              Rellena el campo 
            </div><br>

            <div class="form-group col-md-2">
              <label for="cvv">CVV</label>
              <input type="number" step="000" class="form-control" id="cvv" oninput="validacion.multi2()">
            </div>
          </div><br>
           <!--div oculto para hacer las validaciones-->
          <div class="alert alert-danger mb-2"  style="display:block" role="alert" id="mensaje5"  >
              Rellena el campo 
          </div><br>

          <button disabled type="submit"  class="btn btn-primary" id="comprar"  onclick="return confirm('Quieres Realizar la compra?')">Realizar Compra</button>
          </div>
        </form>
    </div>
    <div class="col-md-4">
      <div class="text-center"><h4><u>Terminos y condiciones</u></h4></div>
      
    </div>
    
  </div>
  <div class="row"></div>
</div>




<script  src="{{ asset('js/compras.js') }}"></script>



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


