<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeDatabase extends Model
{
    protected $table = 'free_databases';
    protected $fillable = [
        'title',
        'description',
        'info',
        'link',
    ];
}
