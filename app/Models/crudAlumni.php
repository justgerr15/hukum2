<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudAlumni extends Model
{
    protected $table = 'alumnis';

    protected $fillable = [
        'name',
        'jobs',
        'description',
        'image', // tambahkan ini supaya gambar bisa tersimpan
    ];
}
