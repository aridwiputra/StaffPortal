<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staffId';
    protected $fillable = [
        'email', 'phone', 'password', 'position',
    ];
}
