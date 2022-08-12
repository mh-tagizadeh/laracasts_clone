<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelTrait;

class RequestCourse extends Model
{
    use HasFactory, SoftDeletes, ModelTrait;


    protected $fillable = [
        'title', 'description', 'message_for_admin', 'offer_price', 'teacher_id', 'category_id'
    ];
}
