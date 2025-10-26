<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicStaffPublication extends Model
{
    protected $table = 'academic_staff_publications';
    protected $fillable = [
        'title',
        'lecturer',
        'faculty',
        'category',
        'file',
    ];
}
