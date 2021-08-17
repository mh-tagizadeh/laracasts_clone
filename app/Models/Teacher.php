<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    protected $fillable = [
        'uuid', 'first_name', 'last_name', 'username', 'slug', 'description', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
