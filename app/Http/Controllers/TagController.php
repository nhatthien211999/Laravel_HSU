<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {


        $tag->update([
            'tag' => $request->tag,
            'price' => $request->price,
            'quatity' => $request->quatity,
            'description' => $request->description

        ]);
        return redirect(route('categories.show',$tag->category_id))->with('message','Update seccessful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function storeUser(Request $request, Category $category)
    {
        Tag::create([                    
        'tag' => $request->tag,
        'category_id' => $category->id,
        'price' => $request->price,
        'quatity' => $request->quatity,
        'description' => $request->description,
        ]);
        return redirect(route('categories.show', compact('category')))->with('message','Successful Tag Creation');
    }
    
    public function createUser(Category $category)
    {
        return view('categories.create', compact('category'));
    }
}
