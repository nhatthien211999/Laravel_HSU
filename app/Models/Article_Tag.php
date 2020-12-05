<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id','tag_id','total_quatity','total_price'
    ];
}
