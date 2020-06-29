<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assement;
use Response;
use Validator;

class AssementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    $validator= Validator::make ($request->all(),[

      'nombre_usuario'=>'required',
      'comentario'=>'required',
      
    ]);
    if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
     }
     else{
            $assement= new Assement();
            $assement->nombre_usuario =$request->nombre_usuario;
            $assement->comentario =$request->comentario;
            $assement->save();
      return response()->json($assement);
   
  }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
      $id = $request->id;
       $assement= Assement::findOrFail($request->id);
   return response()->json($assement);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

$validator= Validator::make ($request->all(),[

      'comentario'=>'required',
      'id'=>'required',
       
    ]);
if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
  }
  else{

     $assement = Assement::findOrFail($request->id);
        $assement->comentario =$request->comentario;
        $assement->save();
     return response()->json($assement);
  }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    

$assement=Assement::find($request->id)->delete();

 $respuesta = array('id' => $request->id );
 return response()->json($respuesta);


    }
}
