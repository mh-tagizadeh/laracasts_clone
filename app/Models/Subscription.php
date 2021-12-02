<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Subscription extends Model
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'id' , 'user_id', 'planable_id', 'planable_type','transactoin_id', 'start_at', 'ends_at'
    ];

    public function planable()
    {
        return $this->morphTo();
    }
}
