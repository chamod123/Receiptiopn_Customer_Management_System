<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
