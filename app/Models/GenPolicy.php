<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenPolicy extends Model
{
    protected $table = 'gen_policies';
    protected $fillable = [
        'title',
        'pdf_files',
    ];

    protected $casts = [
        'pdf_files' => 'array',
    ];
}
