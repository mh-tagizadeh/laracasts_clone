<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends BaseModel
{
    use HasFactory;


    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'title', 'slug', 'description', 'price', 'sale_price', 'subscription_duration_in_months'
    ];
}
