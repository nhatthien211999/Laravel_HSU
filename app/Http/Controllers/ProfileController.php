<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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
    public function create(User $user)
    {
        return view('profiles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function destroy($id)
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

    public function createUserProfile(User $user)
    {
        return view('profiles.create',compact('user'));
    }


    public function storeUserProfile(Request $request, User $user)
    {
        if($request->hasFile('avatar')){

            $filename = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('images',$filename,'public');   

            Profile::create([                    
                'full_name' => $request->full_name,
                'address' => $request->address,
                'avatar' => $filename,
                'birthday' => $request->birthday,
                'user_id' => $user->id
                ]);
        }
        else
        {
            Profile::create([                    
                'full_name' => $request->full_name,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'user_id' => $user->id
                ]);
        }
        return redirect(route('users.show', compact('user')))->with('message','Tạo profile thành công');
    }
    


    public function uploadAvatar($request,$profile){

        if($request->hasFile('avatar')){

            $filename = $request->file('avatar')->getClientOriginalName();

            $request->avatar->storeAs('images',$filename,'public');
            $profile->update(['avatar'=>$filename]);           
        }

        
    }




}
