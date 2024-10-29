<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    use HasFactory;

    protected $fillable=[
        'hotel_id',
        'name',
        'description',
        'image',
        'status',
    ];

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }


}
