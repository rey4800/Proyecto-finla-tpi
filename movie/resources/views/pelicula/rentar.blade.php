@if (Auth::check() ==null)


<form action="{{url('/login')}}" method='get'>
    <button type="submit" class="btn btn-info" name="alquilar" value="alquilar" id="alquilar">Alquilar</button>
 
</form>

    
@else



@if ($pelicula->multas <= 0)

            @if ($pelicula->banderas<=0)

                  <form action="{{url('peliculas/'.$pelicula->id.'/rent')}}" method='get'>
                     @csrf
             
                    <button type="submit" class="btn btn-info" name="alquilar" id="alquilar">Alquilar</button>
                    </form>
    
            @else

            <form action="{{url('peliculas/'.$pelicula->id.'/regresar')}}" method="get">
                @csrf
            <button type="submit" class="btn btn-warning" id="alquilar">Pelicula Alquilada</button>
            <br><br><br>
            <label for="" class="form-label">Devolver antes de: </label>
            <br><label class="p-1 mb-3 bg-danger text-white"  >{{$pelicula->fecha_f}}</label><br>
             <button type="submit" class="btn btn-primary"  name="devolver" id="devolver">Regresar Pelicula</button>
            </form>
            <br>
    
            @endif
    
    @else

    @if ($pelicula->banderas>0)
            <form action="{{url('peliculas/'.$pelicula->id.'/regresar')}}" method="get">
             @csrf
             <button type="submit" class="btn btn-warning" id="alquilar">Pelicula Alquilada</button>
            <br><br><br>
             <label for="" class="form-label">Devolver antes de: </label>
             <br><label class="p-1 mb-3 bg-danger text-white"  >{{$pelicula->fecha_f}}</label><br>
             <button type="submit" class="btn btn-primary"  name="devolver" id="devolver">Regresar Pelicula</button>
            </form>
            <br>

            <h4>Para volver a alquilar debe pagar las multas</h4>
            <br>
             <form action="{{url('peliculas/'.$pelicula->id.'/multas')}}" method="get">
                 @csrf
                <label for="" class="form-label">Pagar Multa por retraso en devolver la Pelicula: </label>
                <button type="submit" class="btn btn-primary"  name="devolver" id="devolver">Pagar Multas</button>
                </form>
            <br>

                
            @else

            <h4>Para volver a alquilar debe pagar las multas</h4>
            <br>
             <form action="{{url('peliculas/'.$pelicula->id.'/multas')}}" method="get">
                 @csrf
                <label for="" class="form-label">Pagar Multa por retraso en devolver la Pelicula: </label>
                <button type="submit" class="btn btn-primary"  name="devolver" id="devolver">Pagar Multas</button>
                </form>
            <br>
                
            @endif

    
@endif

@endif


