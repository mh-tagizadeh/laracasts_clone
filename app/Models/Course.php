<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'sku', 'title', 'slug', 'description', 
        'teacher_id','state','price', 'sale_price', 'published_at'
    ];


    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
