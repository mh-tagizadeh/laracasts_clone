<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    use HasFactory;
    
    public function __construct()
    {
        parent::__construct($this);
    }

    protected $fillable = [
        'sku', 'title', 'slug', 'description', 
        'teacher_id','state','price', 'sale_price', 'published_at', 'category_id'
    ];
}
