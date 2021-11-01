<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends BaseModel
{
    use HasFactory;

    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'uuid', 'first_name', 'last_name', 'username', 'slug', 'description', 'user_id', 'phone_number', 'address',
    ];

}
