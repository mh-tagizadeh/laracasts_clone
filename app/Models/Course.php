<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Course extends Model 
{
    use HasFactory, ModelTrait;
    

    protected $fillable = [
        'sku', 'title', 'slug', 'description', 
        'teacher_id','state','price', 'sale_price', 'published_at', 'category_id'
    ];
}
