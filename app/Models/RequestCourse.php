<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestCourse extends BaseModel
{
    use HasFactory, SoftDeletes;


    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'title', 'description', 'description_for_admin', 'offer_price', 'teacher_id', 'category_id'
    ];
}
