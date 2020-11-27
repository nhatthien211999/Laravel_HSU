<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.showUser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return view('users.showUser')->with('message','Successful..!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd($user->profiles);
        return view("users.showEachUser", compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("users.editUser", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {   
        $user->update([
            $user->name = $request->name,
            $user->email = $request->email,
        ]);

        if($request->full_name||$request->address||$request->avatar||$request->birthday){
                $user->profiles->update([
                    'full_name' => $request->full_name,
                    'address' => $request->address,
                    'birthday' => $request->birthday,
                    ]);
                $this->uploadAvatar($request,$user->profiles);
        }

        return redirect(route('users.show',compact('user')))->with('message','successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->profiles !== null){
            $user->profiles->where('user_id', $user->id)->delete();
        }

        $user->delete();

        return redirect()->back()->with('message','Deleted Successfully');
    }


    public function uploadAvatar($request,$profile){
        
        if($request->hasFile('avatar')){

            $filename = $request->image->getClientOriginalName();
            $this->deleteOldImage($profile);
            $request->avatar->stroreAs('avatar',$filename,'public');
            $profile->update(['avatar' => $filename]);
            
        }

        
    }

    protected function deleteOldImage($profile){
        if($profile->avatar !== null){

            Storage::delete('public/images/'.$profile->avatar);

        }
    }
}
