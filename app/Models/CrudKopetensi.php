<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudKopetensi extends Model
{
    protected $table = 'competences';

    protected $fillable = [
        'id',
        'type',
        'image',
        'title',
        'description'
    ];

    public $incrementing = false;  
}

