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
        $acticle =  Cart::all();

        return('carts.index');
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
        $cart->delete();
        return redirect()->back();
    }

    public function indexShopCart(User $user)
    {
        // lấy all đơn hàng của user

        $carts = Cart::all()->where('user_id',$user->id);

        // dd($carts);

        
        return view('carts.show', compact('user','carts'));
    }
 

    public function createCart(User $user)
    {
        $tags = Tag::all();
        return view('carts.create', compact('user','tags'));
    }

    public function storeCart(Request $request ,User $user)
    {
        // dd($request);
        $cart = Cart::create([
            'user_id' => $user->id,
            'body' => $request->body,
            'title' => 0
        ]);
        
        $cart->tags()->attach($request->tag_id,['total_quatity' => $request->quatity, 'total_price' => 20]);

        return redirect()->back();
    }
}
