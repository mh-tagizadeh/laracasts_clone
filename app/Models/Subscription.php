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


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function team() {
        // todo : create Team model and migration database
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
}
