

@if (Auth::check() ==null)


<form action="{{url('/login')}}" method='get'>
  

    <button type="submit" class="btn btn-outline-light" name="like" value="like">Me gusta</button>
</form>

    
@else
    

    @if ($pelicula->bandera<=0)

        <form action="{{url('peliculas/'.$pelicula->id.'/like')}}" method='get'>
            @csrf

            <button type="submit" class="btn btn-outline-light" name="like" value="like">Me gusta</button>
            </form>
    
        @else

            <form action="{{url('peliculas/'.$pelicula->id.'/like')}}" method='get'>
            @csrf
            <button type="submit" class="btn btn-light" name="like" value="like"> Quitar me gusta</button>
            </form>
    
    @endif


@endif


    


