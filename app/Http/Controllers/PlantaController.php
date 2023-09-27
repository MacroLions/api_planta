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
}
