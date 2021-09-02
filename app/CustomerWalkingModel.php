<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerWalkingModel extends Model
{

    protected $table = 'customer_walking';

    public function floor()
    {
        return $this->belongsTo('App\FloorModel', 'floor_id', 'id');
    }

    public function floor_units()
    {
        return $this->belongsTo('App\FloorUnitsModel', 'floor_units_id', 'id');
    }

}
