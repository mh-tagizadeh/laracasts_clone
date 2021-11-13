<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Plan extends Model 
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'title', 'slug', 'description', 'current_price', 'subscription_duration_in_months', 'is_active', 'is_team', 'max_member'
    ];
}
