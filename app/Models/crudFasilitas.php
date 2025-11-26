<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudFasilitas extends Model
{
    protected $table = 'facilities'; // nama tabel di database

    protected $fillable = [
        'type',
        'title',
        'description',
        'image',
    ];
}
