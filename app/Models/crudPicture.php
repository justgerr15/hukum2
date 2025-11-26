<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudPicture extends Model
{
    protected $table = 'pictures';

    protected $fillable = [
        'image',
    ];
}
