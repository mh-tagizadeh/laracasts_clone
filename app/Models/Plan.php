<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Plan extends Model 
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'title', 'slug', 'description', 'current_price', 'duration', 'status'
    ];
}
