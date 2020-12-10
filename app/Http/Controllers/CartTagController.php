<?php

namespace App\Http\Controllers;
use App\models\Cart;
use App\Models\Tag;
use Illuminate\Http\Request;

class CartTagController extends Controller
{
    public function destroy(Cart $cart, Tag $tag)
    {
        $cart->tags()->detach($tag->id);

        return redirect(route('carts.show',$cart->id))->with('message','Xóa sản phẩm trong đơn hàng thành công...');
    }

    public function createCartTag(Cart $cart)
    {
        $tags = Tag::all();
        return view('cart-tags.create', compact('cart','tags'));
    }

    public function storeCartTag(Request $request ,Cart $cart)
    {
        $islive = false;
        $tag = Tag::find($request->tag_id);
        $price = $tag->price;   
        $total_price = $request->total*$price;
        
       foreach($cart->tags as $t){
           
        if($request->tag_id == $t->pivot->tag_id){

            $total_pri = $t->pivot->total_price + $total_price;
            $total_qua = $t->pivot->total_quatity + $request->total;
            $cart->tags()->updateExistingPivot($tag->id,['total_quatity' => $total_qua, 'total_price' => $total_pri]);
            $islive = true;
            break;   
        }
       }


        if(!$islive){           
            $cart->tags()->attach($tag->id,['total_quatity' => $request->total, 'total_price' => $total_price]);
        }


        return redirect(route('carts.show',$cart->id))->with('message','Thêm sản phẩm thành công...');
    }
}
