<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CrudDownload extends Model
{
use HasFactory;


protected $fillable = [
'name',
'category',
'link'
];
}