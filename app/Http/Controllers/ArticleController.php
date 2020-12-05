<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $acticle =  Article::all();

        return('acticles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
    public function show(Article $article)
    {
        //chi tiết từng đơn hàng

        $acticle = $article->tags;
        dd($acticle);
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
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }

    public function indexShopCart(User $user)
    {
        // lấy all đơn hàng của user

        $articles = Article::all()->where('user_id',$user->id);

        // dd($articles);

        
        return view('articles.show', compact('user','articles'));
    }
    // public function showTag(User $user, Article $acticle)
    // {
        
        
    //     return view('articles.show', compact('user','article'));
    // }

    public function createArticle(User $user)
    {
        $tags = Tag::all();
        return view('articles.create', compact('user','tags'));
    }

    public function storeArticle(Request $request ,User $user)
    {
        // dd($request);
        $article = Article::create([
            'user_id' => $user->id,
            'body' => $request->body,
            'title' => 0
        ]);
        
        $article->tags()->attach($request->tag_id,['total_quatity' => $request->quatity, 'total_price' => 20]);

        return redirect()->back();
    }
}
