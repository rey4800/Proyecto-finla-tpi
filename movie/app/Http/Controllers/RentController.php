<?php

namespace App\Http\Controllers;

use App\Pelicula;
use App\Rent;
use App\Rentada;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquileres = Rent::all();
        return view('registros.alquileres')->with('alquileres',$alquileres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
       
        $pelicula =Pelicula::findOrFail($id);

        return view('rent.create', compact('pelicula'));

     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        
        $rent = request()->except('_token');
        $id_user  = auth()->user()->id;//toma el dato del usuario cuando esta autentificado
        $email = auth()->user()->email;//toma el dato  email
        $fecha_actual  = date('Y-m-d');//toma el dato fecha actual
        $fechaFinal = date('Y-m-d',strtotime($fecha_actual."+ 7 days"));//toma  el dato fecha y le suma  7  dias

       $pelicula = Pelicula::findOrFail($id);
       compact('pelicula');

       $valorStock = $pelicula->stock -1;


       //Preparando la consulta para insertar

       $rent['user_id']=$id_user ;
       $rent['email']= $email;
       $rent['pelicula_id']= $id;
       $rent['titulo'] = $pelicula->titulo;
       $rent['cantidad'] = 1;
       $rent['fecha_i'] = $fecha_actual;
       $rent['multa'] = "no";
       $rent['fecha_f'] = $fechaFinal;

       $rentada['user_id']=$id_user ;
       $rentada['pelicula_id']= $id;
       $rentada['titulo'] = $pelicula->titulo;
       $rentada['precio_al'] = $pelicula->precio_al;
       $rentada['fecha_i'] = $fecha_actual;
       $rentada['multa'] = "no";
       $rentada['rentada'] = "si";
       $rentada['fecha_f'] = $fechaFinal;


    if($valorStock == 0){//si el valor del stock de la pelicula es cero


        $datosNuevos['stock'] = $valorStock;
        $datosNuevos['disponivilidad'] = "no";//Agregamos disponibilidad no
        Pelicula::where('id','=' ,$id)->update($datosNuevos);
        Rentada::insert($rentada);
        Rent::insert($rentada);
       
        return redirect('/peliculas/'); 

    }else{//caso contrario solo insertamos en nuevo valor del stock a la pelicula

        
        $datosNuevos['stock'] = $valorStock;
        Pelicula::where('id','=' ,$id)->update($datosNuevos);

        Rent::insert($rent);
        Rentada::insert($rentada);
        return redirect('/peliculas/' . $id); 

        }


       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent, $id)//funcion  que sirve para ver que  usuarios  tienen multa.
    {

        $pelicula =Pelicula::findOrFail($id);

        $id_user  = auth()->user()->id;
        $multa = Rentada::where('user_id',$id_user)
        ->where('multa', 'si')
        ->get();

       

        return view('rent.show',compact('pelicula'))->with('multa',$multa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */

     //FUNCION PAARA INSERTAR PELICULA ALQUILADA Y POR QUIEN
    public function update(Request $request, $id)
    {
    
        //prparamos los datos para insertar los nuevos datos a las tablas correspondientes
        $id_user  = auth()->user()->id;
        $fecha_actual  = date('Y-m-d');
        $pelicula = Pelicula::findOrFail($id);
       compact('pelicula');
       $valorStock = $pelicula->stock;

       //preparamos las comsultas de cada tabla
        $peli = Rentada::where('user_id',$id_user)
        ->where('pelicula_id',$id)
        ->get();
       compact('peli');

       $pelicula = Rent::where('user_id',$id_user)
       ->where('pelicula_id',$id)
       ->get();
       compact('pelicula');

       $fecha_final =null;


        foreach ($peli as $pelic) {
            $fecha_final = $pelic->fecha_f;
        }


            if($fecha_actual <= $fecha_final){//Si  la fecha entrega es menor o igual  a  la fecha final entonces  no le pone  multa


                $datosNuevosRent['fecha_e'] = $fecha_actual;
                $datosNuevosRent['multa'] = 'no';
                $datosNuevosRent['monto_multa'] = "0";
                $datosNuevos['stock'] = $valorStock + 1;

                Pelicula::where('id','=' ,$id)->update($datosNuevos);

                Rentada::where('user_id', '=' , $id_user)
                        ->where('pelicula_id', '=' , $id)
                        ->delete();


                        Rent::where('user_id',$id_user)
                         ->where('pelicula_id',$id)
                         ->where('fecha_f' , '=' , $fecha_final)
                        ->update($datosNuevosRent);

                        return redirect('/peliculas/' . $id); 

            }else{//si la fecha de entrega es mayor a la fecha estipulada aplicar multa

               

                $datosNuevosRent['fecha_e'] = $fecha_actual;
                $datosNuevosRent['multa'] = 'si';
                $datosNuevosRent['monto_multa'] = 50.99;
                $datosNuevos['stock'] = $valorStock + 1;

                $datosRenta['multa']= 'si';
                $datosRenta['fecha_e']= $fecha_actual;
                $datosRenta['monto_multa']= 50.99;
             

                Pelicula::where('id','=' ,$id)->update($datosNuevos);

                
                Rentada::where('user_id', $id_user)
                        ->where('pelicula_id', $id)
                        ->update($datosRenta);
               
            
                
                Rent::where('user_id',$id_user)
                         ->where('pelicula_id',$id)
                         ->where('fecha_f'  , $fecha_final)
                        ->update($datosNuevosRent);



                return redirect('/peliculas/' . $id); 

            }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */

     //Funcion para eliminar una pelicula alquilada por un usuario
    public function destroy(Rent $rent ,$id)
    {

        
        
        $id_user  = auth()->user()->id;
        Rentada::where('user_id', '=' , $id_user)
        ->where('multa', '=' , 'si')
        ->delete();


      //En la tabla de registro notificamos que ya se pago la multa
        $datosNuevosRent['multa'] = 'pagada';
        $datosNuevosRent['monto_multa'] = 50.00;
           
        Rent::where('user_id',$id_user)
        ->where('multa','si')
       ->update($datosNuevosRent);
        
       return redirect('/peliculas/' . $id); 
    }

}
