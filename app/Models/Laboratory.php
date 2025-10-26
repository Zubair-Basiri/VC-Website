<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $table = 'laboratories';
    protected $fillable = [
        'title',
        'description',
        'info',
        'link',
    ];
}
