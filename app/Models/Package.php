<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at', 'active'];


    public function media()
    {
        return $this->hasMany(PackageMedia::class, 'package_id', 'id');
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

}
