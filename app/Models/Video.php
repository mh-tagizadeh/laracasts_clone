<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;


    /**
     * Get the parent videoable model (course or lesson).
     */
    public function videoable()
    {
        return $this->morphTo();
    }
}
