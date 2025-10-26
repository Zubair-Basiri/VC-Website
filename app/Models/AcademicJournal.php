<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicJournal extends Model
{
    protected $table = 'academic_journals';
    protected $fillable = [
        'title',
        'description',
        'info',
        'link',
    ];
}
