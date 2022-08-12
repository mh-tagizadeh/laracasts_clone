<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Plan extends Model
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'title', 'description', 'current_price', 'duration', 'status'
    ];

    public function plan_payments()
    {
        return $this->morphMany(Subscription::class, 'planable');
    }
}
