<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'description_for_admin', 'offer_price', 'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
