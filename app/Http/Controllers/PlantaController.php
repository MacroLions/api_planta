<?php

namespace App\Http\Controllers;
use App\Models\Planta;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PlantaController extends BaseController
{
    //Esto nos devolverá todas las plantas
    function getAll(){
       $registros =  Planta::all();
       return response()->json($registros, 200);
    }

    //Este solo una planta por id
    function getById($id){
        $planta =  Planta::find($id);
        return response()->json($planta, 200);
     }

    // Este agregará o editará una planta
    function agregarPlanta(Request $request, $id = -1){
        //Request $request
        $planta = new Planta();
        if($id != -1){
            $planta = Planta::find($id);
        }
        //$planta->plan_id = $request->plan_id;
        $planta->plan_nombre = $request->nombre;
        $planta->save();
        return response()->json($planta,200);
    }
    //Este borrará una planta
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
