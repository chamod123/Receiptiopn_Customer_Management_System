<?php

namespace App\Http\Controllers;

use App\FloorUnitsModel;
use Illuminate\Http\Request;

class FloorController extends Controller
{

    public function searchUnitByFloor($floor_id){
        $floor_units = FloorUnitsModel::where('floor_id','=',$floor_id)
            ->get();
        return $floor_units;
    }
}
