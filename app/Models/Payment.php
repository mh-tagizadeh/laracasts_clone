<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'id' ,'user_id', 'transaction_id', 'planable_type', 'planable_id'
    ];


    public function planable()
    {
        return $this->morphTo();
    }
}
