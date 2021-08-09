<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'category_id'
    ];


    public function category_parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function category_child()
    {
        return $this->hasMany(Category::class);
    }
}
