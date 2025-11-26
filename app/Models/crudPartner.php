<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudPartner extends Model
{
    protected $table = 'partners';

    protected $fillable = [
        'image',
    ];
}
