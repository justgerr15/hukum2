<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CrudNews extends Model
{
use HasFactory;


protected $table = 'crud_news';


protected $fillable = [
'date',
'image',
'title',
'main',
];
}