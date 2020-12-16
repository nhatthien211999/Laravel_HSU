<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Tag;
use App\Models\Cart_Tag;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts =  Cart::all()->sortByDesc('created_at');
        return view('carts.index',compact('carts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //chi tiết từng đơn hàng

        $tags = $cart->tags;

        $user = $cart->user;

        $profile = $user->profile;

        // dd($cart->tags);
        //1 cart - n tag
        // foreach($cart->tags as $tag){
        //     echo $tag->pivot->quantity;
        // }

        return view('cart-tags.show',compact('tags','user','profile','cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //Xóa đơn hàng
        $cart->tags()->detach();
        $cart->delete();
        return redirect(route('carts.index'))->with('message','Xóa đơn hàng thành công');
    }

    public function indexShopCart(User $user)
    {
        // lấy all đơn hàng của user

        $carts = Cart::all()->where('user_id',$user->id);
        // dd($user->carts);

        
        return view('carts.show', compact('user','carts'));
    }
 

    public function createCart(User $user)
    {
        //tạo cart
        $tags = Tag::all();
        return view('carts.create', compact('user','tags'));
    }

    public function storeCart(Request $request ,User $user)
    {
        Cart::create([
            'user_id' => $user->id,
            'body' => $request->body,
            'title' => 0
        ]);

        return redirect()->back()->with('message','Tạo đơn hàng thành công');
    }

    public function search(Request $request)
    {
        $cart = Cart::all();

        $carts = $cart->where('created_at','>=',$request->from.' 00:00:00')
                    ->where('created_at','<=',$request->to.' 23:59:59');
        return view('carts.index',compact('carts'));
    }
    public function filter()
    {
        $carts =  Cart::all()->sortByDesc('title');
        return view('carts.index',compact('carts'));
    }
    public function isLive(Cart $cart)
    {
        if($cart->title == 0)
        {
            $cart->update([
                'title' => 1
            ]);
        }
        else
        {
            $cart->update([
                'title' => 0
            ]);
        }
        return redirect(route('carts.index'))->with('message','Cập nhập trạng thái thành công');
    }
}
