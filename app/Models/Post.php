<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';

    protected $fillable=['title_post', 'slug', 'body', 'categorys_id', 'picture_post', 'is_active', 'views'];

    protected $hidden=[];

    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorys_id', 'id');
    }
}
