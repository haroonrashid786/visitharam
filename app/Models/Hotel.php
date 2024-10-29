<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'type',
        'description',
        'status',
    ];


    public function hotelfacility()
    {
        return $this->hasMany(HotelFacility::class);
    }
    public function media()
    {
        return $this->hasMany(HotelMedia::class, 'hotel_id', 'id');
    }

}
