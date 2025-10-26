<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalLibrary extends Model
{
    protected $table = 'digital_libraries';
    protected $fillable = [
        'title',
        'description',
        'info',
        'link',
    ];
}
