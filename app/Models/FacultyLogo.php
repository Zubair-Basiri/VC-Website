<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyLogo extends Model
{
    protected $table = 'faculty_logos';
    protected $fillable = [
        'faculty',
        'logo'
    ];
}
