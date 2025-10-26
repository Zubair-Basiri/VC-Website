<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = 'seminars';
    protected $fillable = [
        'title',
        'description',
    ];
}
