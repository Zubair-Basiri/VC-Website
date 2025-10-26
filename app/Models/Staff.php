<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
        'name',
        'position',
        'description',
        'email',
        'academic_profile',
    ];
}
