<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\model\Cart;


class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag','category_id','price','quatity','description','image','isLive'
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
