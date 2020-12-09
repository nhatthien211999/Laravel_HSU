<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_id','title','body','quantity'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('total_quatity','total_price');
    }
    
    public function cart_tags()
    {
        return $this->hasMany(Cart_Tag::class);
    }
}
