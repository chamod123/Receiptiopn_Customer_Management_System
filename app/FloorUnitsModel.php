<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloorUnitsModel extends Model
{
    protected $table = 'floor_units';

    public function floor()
    {
        return $this->belongsTo('App\FloorModel', 'floor_id', 'id');
    }
}
