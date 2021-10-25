<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' , 'user_id', 'team_id', 'plan_id', 'transactoin_id', 'start_at', 'ends_at'
    ];
}
