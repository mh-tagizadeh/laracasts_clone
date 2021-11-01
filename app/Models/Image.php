<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends BaseModel
{
    use HasFactory;


    public function __construct()
    {
        parent::__construct($this);
    }


    protected $fillable = [
        'url', 
        'imageable_id',
        'imageable_type'
    ];


}
