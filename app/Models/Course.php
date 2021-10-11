<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'sku', 'title', 'slug', 'description', 
        'teacher_id','state','price', 'sale_price', 'published_at', 'category_id'
    ];


    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}
