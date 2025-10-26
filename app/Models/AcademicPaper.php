<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPaper extends Model
{
    protected $table = 'academic_papers';
    protected $fillable = [
        'title',
        'master_bachelor',
        'category',
        'file'
    ];
}
