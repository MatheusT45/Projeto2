<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedUser extends Model
{
    protected $fillable = [
        'name', 'email', 'tipo'
    ];
}
