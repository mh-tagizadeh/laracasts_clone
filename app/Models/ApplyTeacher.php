<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyTeacher extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name', 'last_name', 'username',  'description', 'user_id', 'phone_number', 'address', 'documents', 'status_answer'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
