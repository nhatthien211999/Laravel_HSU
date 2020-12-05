<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','body'
    ];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'category','article_id','tag_id');
    }
}
