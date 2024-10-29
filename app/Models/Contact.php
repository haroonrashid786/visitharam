<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'country_code',
        'adults',
        'kids',
        'nights_in_madina',
        'nights_in_makkah',
        'number_of_days',
        'email_checkbox',
        'message',
        'type',
    ];
}
