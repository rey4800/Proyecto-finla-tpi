@extends('layouts.navbar')

@section('contenido')
    


@section('contenidoPrincipal')
<div class="container" >
    
    <form action="{{url('peliculas/'.$pelicula->id.'/cancelar')}}" method="get">
        @csrf
        {{method_field('DELETE')}}
       <button type="submit" class="btn btn-primary"  name="devolver" id="devolver">Pagar todas las multas</button>
       </form>


    <table id="peliculas" class="table table-dark table-striped mt-4" >
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Precio de Alquiler</th>
                <th scope="col">Fecha Limite de Entrega</th>
                <th scope="col">Fecha en la que fue Entregada</th>
                <th scope="col">Multa</th>
                <th scope="col">Monto</th>    
              
            </tr>
            <tbody>
                @foreach($multa as $multa)
                <tr>
                    <td>{{$multa->titulo}}</td>
                    <td>{{$multa->precio_al}}</td>
                    <td>{{$multa->fecha_f}}</td>
                    <td>{{$multa->fecha_e}}</td>
                    <td>{{$multa->multa}}</td>
                    <td>{{$multa->monto_multa}}</td>

                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>

@endsection


@endsection
