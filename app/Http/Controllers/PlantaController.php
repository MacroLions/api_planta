<?php

namespace App\Http\Controllers;
use App\Models\Planta;
use Laravel\Lumen\Routing\Controller as BaseController;

class PlantaController extends BaseController
{
    function getAll(){
       $registros =  Planta::all();
       return response()->json($registros, 200);
    }

    function getById($id){
        $planta =  Planta::find($id);
        return response()->json($planta, 200);
     }
    function agregarPlanta($id,$nombre){
        //Request $request
        $planta = new Planta();
        if($id != -1){
            $planta = Planta::find($id);
        }
        //$planta->plan_id = $request->plan_id;
        $planta->plan_nombre = $nombre;
        $planta->save();
        return response()->json($planta,200);
    }
    function borrarPlanta($id){
        $planta = Planta::find($id);

        if(isset($planta)){
            $planta->delete();
        }else{
            return response()->json("Planta no encontrada",200);
        }
        

        return response()->json("Planta borrada!", 200);
    }
}
