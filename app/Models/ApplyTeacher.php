<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ModelTrait;

class ApplyTeacher extends Model
{
    use HasFactory ,SoftDeletes, ModelTrait;

    protected $fillable = [
        'first_name', 'last_name', 'username',  'description', 'user_id', 'phone_number', 'address', 'documents', 
    ];

}
