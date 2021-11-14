<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\ModelTrait;

class Link extends Model
{
    use HasFactory;
    use HasApiTokens;
    use ModelTrait;

    protected $fillable = [
        'id', 'payment_id' 
    ];
}
