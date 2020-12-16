<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $tags = Tag::all()->sortByDesc('created_at');
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //tạo SP 
    public function create()
    {
        $categories = Category::all();

        return view('tags.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tag' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'required',
            'price' => 'required',
            'quatity' => 'required',
            'description' => 'required'
        ];

        $messages = [
           'tag.required' => 'Vui lòng nhập SP',
           'tag.max' => 'Tên SP không quá 255 ký tự',
           'image.required' => 'Vui lòng chọn ảnh',
           'price.required' => 'Vui lòng nhập giá SP',
           'quatity.required' => 'Vui lòng nhập số lượng SP',
           'description.required' => 'Vui lòng nhập mô tả SP'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('tagImages',$filename,'public'); 
            Tag::create([                    
                'tag' => $request->tag,
                'category_id' => $request->category_id,
                'image' => $filename,
                'price' => $request->price,
                'quatity' => $request->quatity,
                'description' => $request->description,
                'isLive' => 1
                ]);
        }
        else{
            Tag::create([                    
                'tag' => $request->tag,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quatity' => $request->quatity,
                'description' => $request->description,
                'isLive' => 1
                ]);
        }

        return redirect(route('tags.index'))->with('message','Successful Tag Creation');
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
        $rules = [
            'tag' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'quatity' => 'required',
            'description' => 'required'
        ];

        $messages = [
           'tag.required' => 'Vui lòng nhập SP',
           'tag.max' => 'Tên SP không quá 255 ký tự',
           'image.required' => 'Vui lòng chọn ảnh',
           'price.required' => 'Vui lòng nhập giá SP',
           'quatity.required' => 'Vui lòng nhập số lượng SP',
           'description.required' => 'Vui lòng nhập mô tả SP'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $tag->update([
            'tag' => $request->tag,
            'price' => $request->price,
            'quatity' => $request->quatity,
            'description' => $request->description

        ]);
        $this->uploadAvatar($request,$tag);

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
        $tag->update([
            'isLive' => 0
        ]);

        return redirect()->back()->with('message','Deleted Successfully');
    }


    //tạo SP theo danh mục
    public function createTag(Category $category)
    {
        return view('categories.create', compact('category'));
    }

    public function storeTag(Request $request, Category $category)
    {
        $rules = [
            'tag' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'quatity' => 'required',
            'description' => 'required'
        ];

        $messages = [
           'tag.required' => 'Vui lòng nhập SP',
           'tag.max' => 'Tên SP không quá 255 ký tự',
           'image.required' => 'Vui lòng chọn ảnh',
           'price.required' => 'Vui lòng nhập giá SP',
           'quatity.required' => 'Vui lòng nhập số lượng SP',
           'description.required' => 'Vui lòng nhập mô tả SP'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('tagImages',$filename,'public'); 
            Tag::create([                    
                'tag' => $request->tag,
                'category_id' => $category->id,
                'image' => $filename,
                'price' => $request->price,
                'quatity' => $request->quatity,
                'description' => $request->description,
                'isLive' => 1
                ]);
        }
        else{
            Tag::create([                    
                'tag' => $request->tag,
                'category_id' => $category->id,
                'price' => $request->price,
                'quatity' => $request->quatity,
                'description' => $request->description,
                'isLive' => 1
                ]);
        }

        return redirect(route('categories.show', compact('category')))->with('message','Successful Tag Creation');
    }
    

    public function uploadAvatar($request,$tag){
        
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $this->deleteOldImage($tag);
            $request->image->storeAs('tagImages',$filename,'public');
            $tag->update(['image' => $filename]);
            
        }

        
    }

    protected function deleteOldImage($tag){

        if($tag->image !== null){

            Storage::delete('public/tagImages/'.$tag->image);

        }
    }
}
