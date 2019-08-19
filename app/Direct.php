<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direct extends Model
{
    protected $table = 'direct';
    
    protected $fillable = [
        'id',
        'shorturl',
        'longurl'
    ];
}
