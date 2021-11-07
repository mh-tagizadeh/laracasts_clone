<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Teacher extends Model
{
    use HasFactory, ModelTrait;


    protected $fillable = [
        'uuid', 'first_name', 'last_name', 'username', 'slug', 'description', 'user_id', 'phone_number', 'address',
    ];

}
