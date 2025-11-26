<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudVisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misis'; // optional jika sesuai konvensi Laravel
    protected $fillable = ['judul', 'isi'];
}
