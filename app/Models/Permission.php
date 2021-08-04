<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'role_id'
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
