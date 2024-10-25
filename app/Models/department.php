<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = [
        'd_code',
        'd_name',
        'status',
    ];

    protected $primaryKey = 'id';

}
