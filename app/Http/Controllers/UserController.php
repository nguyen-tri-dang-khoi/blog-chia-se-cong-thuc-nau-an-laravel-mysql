<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
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
    public function display()
    {
        $user = User::find(Auth::user()->id);
        return view('accounts',compact('user'));
    }
    public function display_user()
    {
        $user = User::find(Auth::user()->id);
        return view('user_detail',compact('user'));
    }
    public function edit_user(){
        $user = User::find(Auth::user()->id);
        return view('user_edit_profile',compact('user'));
        
    }
    public function register_user(){
        return view('auth.register');
    }
    public function login_user(){
        return view('auth.login_user');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload_image(Request $request){
        $user = User::find(Auth::user()->id);
        $img_current = $user->photo;
        if ($request->hasFile('uploadfile')) {
            $image = $request->file('uploadfile');
            if($img_current != 'image.jpg'){
                $path = public_path().'/img-admin'."/";
                $old = $path.$img_current;
                unlink($old);
            }
            $ten_file = time().'.'.$image->getClientOriginalExtension();
            $vi_tri_luu_tru = public_path('/img-admin');
            $image->move($vi_tri_luu_tru, $ten_file);
            $user->photo = $ten_file;
            $user->save();
        }
        return response()->json($user);
    }
    public function upload_profile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->birth = $request->birth;
        $user->save();
    }
    public function delete_account(){
        $user = User::find(Auth::user()->id);
        $user->is_delete = 1;
        $user->save();
        return response()->json($user);
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
}
