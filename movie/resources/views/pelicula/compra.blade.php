
<!--- Validamos que este con una sesion activa-->
@if (Auth::check() ==null)<!-- si no lo esta que los mande al login-->


<form action="{{url('/login')}}" method='get'>
    <button type="submit" class="btn btn-success" name="comprar" value="comprar" id="comprar">Comprar</button>
 
</form>

    
@else<!-- si este es falso que los mande a la compra-->
    

        <form action="{{url('peliculas/'.$pelicula->id.'/buy')}}" method='get'>
            @csrf
         
            <button type="submit" class="btn btn-success" name="comprar" value="comprar" id="comprar">Comprar</button>
            </form>
    
    

@endif

