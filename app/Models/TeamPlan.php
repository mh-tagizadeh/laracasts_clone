<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPlan extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title', 'slug', 'description', 'current_price', 'status', 'duration', 'max_member'
    ];

    public function plan_payments()
    {
        return $this->morphMany(Payment::class, 'planable');
    }
}
