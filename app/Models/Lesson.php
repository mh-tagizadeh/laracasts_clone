<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'course_id', 'lesson_number',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
