<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends BaseModel
{
    use HasFactory;

    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'id' , 'user_id', 'team_id', 'plan_id', 'transactoin_id', 'start_at', 'ends_at'
    ];

}
