<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $table = 'grants';
    protected $fillable = [
        'title',
        'description',
    ];
}
