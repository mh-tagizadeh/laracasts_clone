<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Image extends Model
{
    use HasFactory, ModelTrait;


    protected $fillable = [
        'url', 
        'imageable_id',
        'imageable_type'
    ];


}
