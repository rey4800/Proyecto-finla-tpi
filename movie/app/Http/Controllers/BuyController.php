<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Pelicula;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Funcion para obtener todos los registros de compras
    public function index()
    {
        $compras = buy::all();
        return view('registros.compras')->with('compras',$compras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Funciin para obtener los datos de una pelicula y mostrar para comprar
    public function create($id)
    {

        $pelicula = Pelicula::findOrFail($id);

        return view('buy.create', compact('pelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Funcion para insertar una compra de la pelicula
    public function store(Request $request, $id)
    {

       $buy = request()->except('_token');

       $id_user  = auth()->user()->id;
       $email = auth()->user()->email;

       $buy['user_id'] = $id_user;
       $buy['pelicula_id'] = $id;
       $buy['email'] = $email;
       $buy['created_at'] = date('Y-m-d h:i:s', time());

       
        $pelicula = Pelicula::findOrFail($id);
        compact('pelicula');
        $valorStock = $pelicula->stock - $buy['cantidad'];


//condicional para restar de la parte de compras el stock de la peliculas
        if($valorStock == 0){

            $datosNuevos['stock'] = $valorStock;
            $datosNuevos['disponivilidad'] = "no";
            Pelicula::where('id','=' ,$id)->update($datosNuevos);
           Buy::insert($buy);

           return redirect('/peliculas/'); 


        }else{

            $datosNuevos['stock'] = $valorStock;
            Pelicula::where('id','=' ,$id)->update($datosNuevos);
           Buy::insert($buy);

           return redirect('/peliculas/' . $id); 
        }

         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buy $buy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        //
    }
}
