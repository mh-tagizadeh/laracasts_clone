<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyTeacher extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'first_name', 'last_name', 'username',  'description', 'user_id', 'phone_number', 'address', 'documents', 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
