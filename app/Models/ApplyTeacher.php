<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyTeacher extends BaseModel 
{
    use HasFactory, SoftDeletes;

    public function __construct()
    {
        parent::__construct($this);
    }

    protected $fillable = [
        'first_name', 'last_name', 'username',  'description', 'user_id', 'phone_number', 'address', 'documents', 
    ];

}
