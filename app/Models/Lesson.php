<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends BaseModel
{
    use HasFactory;


    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'title', 'slug', 'description', 'course_id', 'lesson_number',
    ];
}
