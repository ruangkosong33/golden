<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table='videos';

    protected $fillable=['title_video', 'slug', 'link', 'picture_video'];

    protected $hidden=[];
}
