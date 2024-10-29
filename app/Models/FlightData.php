<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightData extends Model
{
    use HasFactory;

    protected $fillable=[
        'flight_id',
        'flight_name',
        'baggage ',
        'flight_type',
        'price',
        'image',
        'status',
    ];

    public function flight() {
        return $this->belongsTo(Flight::class, 'flight_id');
    }
    

}
