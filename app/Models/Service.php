<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable=[
        'package_id',
        'hotel_id',
        'name',
        'image',
        'status',
    ];

    public function package() {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }


}
