<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Lesson extends Model
{
    use HasFactory, ModelTrait;


    protected $fillable = [
        'title', 'description', 'course_id', 'lesson_number',
    ];
}
