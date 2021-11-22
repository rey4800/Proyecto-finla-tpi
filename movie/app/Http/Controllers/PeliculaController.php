<?php

namespace App\Http\Controllers;

use App\Like;
use App\Pelicula;
use App\Rentada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion  para llevar los datos de las peliculas a la vista index de la carpeta peliculas
    public function index()
    {
        $peliculas = Pelicula::all();
      return view('pelicula.index')->with('peliculas',$peliculas);
        
    }

     //Para mostrar todas las peliculas en el index 
    public function index2(Request $request)
    {


        $query = $request->get('buscar');

        if($query != null){

            

            if($query==1){

                $pelicula = Pelicula::all();
                $peliculas = Pelicula::orderBy('likes','desc')->get();
                return view('home' , compact('peliculas'));
    
            }elseif($query==2){

                $peliculas = Pelicula::where('disponivilidad','LIKE','%si%')
                ->orderBy('likes','desc')
                ->orderBy('titulo','asc')
                ->get();
    
                return view('home' , compact('peliculas'), compact('query'));

            }elseif($query==3){

                $peliculas = Pelicula::where('disponivilidad','LIKE','%no%')
                ->orderBy('likes','desc')
                ->orderBy('titulo','asc')
                ->get();
    
                return view('home' , compact('peliculas'), compact('query'));
    

            }else{


                $peliculas = Pelicula::where('titulo','LIKE','%' . $query . '%')
                ->orderBy('likes','desc')
                ->orderBy('titulo','asc')
                ->get();
    
                return view('home' , compact('peliculas'), compact('query'));

            }
        

        }


        
        $pelicula = Pelicula::all();
       $peliculas = Pelicula::orderBy('likes','desc')->get();

    
        return view('home' , compact('peliculas'));

       // return view('home')->with('peliculas',$peliculas);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //funcion para que lleva a la vista create.blade.php que esta en la carpeta peliculas
    public function create()
    {
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //funcion para insertar peliculas en la base de datos
    public function store(Request $request)
    {
        $request->validate(['imagen'=>'required|image|mimes:jpeg,png,svg,gif|max:4024']);

        $peliculas = new Pelicula();

                $imagen = request()->file('imagen');
                $rutaGuardarImg = 'imagen/';
                $imagenPelicula = date('YmdHis'). ".".$imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImg,$imagenPelicula);
                $rutaGuardarImg = $rutaGuardarImg."/". $imagenPelicula;
              
        
        $peliculas->titulo = $request->get("titulo");
        $peliculas->descripcion = $request->get("descripcion");
        $peliculas->imagen = $rutaGuardarImg;
        $peliculas->stock = $request->get("stock");
        $peliculas->precio_al = $request->get("precio_al");
        $peliculas->precio_com = $request->get("precio_com");
        $peliculas->disponivilidad = $request->get("disponivilidad");
        $peliculas->likes = 0;
        $peliculas->save();

        return redirect('/peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Funcion que muestra los detalles de una pelicula
    public function show($id)//
    {


        if(Auth::check() ==null){


            $pelicula = Pelicula::find($id);
        
            return view('pelicula.pelicula')->with('pelicula',$pelicula);

        }else{


            $id_user  = auth()->user()->id;

            //para ver si tiene los  likes
        $bandera= Like::where('user_id',$id_user)
                        ->where('pelicula_id',$id)
                        ->get()->count();
            //para ver si esta alquilada
          $bandera2 = Rentada::where('user_id',$id_user)
                        ->where('pelicula_id',$id)
                        ->get()->count();
            //para ver si tiene  multa
             $multa = Rentada::where('user_id',$id_user)
                        ->where('multa', 'si')
                        ->get()->count();

        //obtener  la  informacion de la pelicula de la fecha de entrega
          $peli = Rentada::where('user_id',$id_user)
                        ->where('pelicula_id',$id)
                        ->get();
                        compact('peli'); 

     

                
                        
        $pelicula = Pelicula::find($id);

        $fecha = null;
        //for each que  se  encarga de recorrer todos los  registros de fecha

        foreach ($peli as $pelic) {
            $fecha = $pelic->fecha_f;
         
        }
        
            
        $pelicula['fecha_f'] = $fecha;
        $pelicula['multas'] = $multa;
        $pelicula ['bandera'] = $bandera;
        $pelicula['banderas'] = $bandera2;
      
       
        
        
       return view('pelicula.pelicula')->with('pelicula',$pelicula);


        }
    
        
        
      // return view('pelicula.pelicula',compact($pelicula));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //funcion para llevar los datos de una pelicula a la vista edit.blade.php
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        return view('pelicula.edit')->with('pelicula',$pelicula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     //funcion para actualizar los datos de una pelicula
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate(['imagen'=>'required|image|mimes:jpeg,png,svg,gif|max:4024']);
        $peli =$request->all();

        if($imagen = request()->file('imagen')){
        $rutaGuardarImg = 'imagen/';
        $imagenPelicula = date('YmdHis'). ".".$imagen->getClientOriginalExtension();
        $imagen->move($rutaGuardarImg,$imagenPelicula);
        $rutaGuardarImg = $rutaGuardarImg."/". $imagenPelicula;
            $peli['imagen'] = $rutaGuardarImg;

    }else{
        unset($peli['imagen']);
    }
            $pelicula->update($peli);

            return redirect('/peliculas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     //funcion para eliminar los datos de una pelicula
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();
        return redirect('/peliculas');
    }


    //funcion para quitar una pelicula de las peliculas disponibles
    public function quitar( $id)
    {


        $datosNuevos['disponivilidad'] = "no";

      Pelicula::where('id','=' ,$id)->update($datosNuevos);

        return redirect('/peliculas');
    }



    public function like($pelicula){
    


       $id  = auth()->user()->id;

       $bandera = Like::where('user_id',$id)
                        ->where('pelicula_id',$pelicula)
                        ->get()->count();

        $numlike = Pelicula::findOrFail($pelicula);

        compact($numlike);
        $Valorlikes = $numlike->likes;

        
             if($bandera== 0){//si el usuario no ha dado like a la pelicula agregar un like al registro
                

                            $datos['user_id'] = $id;
                            $datos['pelicula_id'] = $pelicula;
                            $datos['liked'] = 'like';
                     
                           Like::insert($datos);

                           
                            $Valorlikes++;
                            $datosNuevos['likes'] = $Valorlikes;

                            Pelicula::where('id','=' ,$pelicula)->update($datosNuevos);

                           return redirect('/peliculas/' . $pelicula);
                            
                 }else{//caso contrario quitar like

                    Like::where('user_id',$id)
                        ->where('pelicula_id',$pelicula)
                        ->delete();


                          $Valorlikes--;

                          $datosNuevos['likes'] = $Valorlikes;

                          Pelicula::where('id','=' ,$pelicula)->update($datosNuevos);

                        return redirect('/peliculas/' . $pelicula);
                 }

       

    }

}
