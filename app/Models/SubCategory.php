<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category_id',
        'slug',
        'status',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $slug = Str::slug($blog->name);
            $originalSlug = $slug;
            $counter = 1;

            // Check if the slug already exists
            while (static::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$counter}";
                $counter++;
            }

            $blog->slug = $slug;
        });
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }




}
