<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at', 'active'];


   
    public function flightdata()
    {
        return $this->hasMany(FlightData::class);
    }

    

}
