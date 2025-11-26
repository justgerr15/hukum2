<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudSlider extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
        'head',
        'title',
        'description',
        'button1',
        'link1',
        'button2',
        'link2',
        'img'
    ];
}
