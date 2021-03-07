<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use DB;
use Carbon\Carbon;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $admin = new Admin;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->birth = $request->birth;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $img_current = $admin->photo;
        if ($request->hasFile('uploadfile')) {
            $image = $request->file('uploadfile');
            $ten_file = time().'.'.$image->getClientOriginalExtension();
            $vi_tri_luu_tru = public_path('/img-admin');
            $image->move($vi_tri_luu_tru, $ten_file);
            $admin->photo = $ten_file;
        }
        $admin->is_supper = $request->is_supper;
        $admin->day_account_created = $dt->toDateTimeString();
        $admin->save();
        return response()->json($admin);
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
    public function display()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        return view('accounts',compact('admin'));
    }
    public function list_admin()
    {
        if(Auth::guard('admin')->user()->is_supper == 1){
            $admins = DB::table('admins')->where('is_delete',0)->where('is_supper',0)->get();
            return view('admins',compact('admins')); // ten blade view, ket qua tra ve
        }
        return view('not_super_admin');
    }
    public function display_admin()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        return view('user_detail',compact('admin'));
    }
    public function edit_admin(){
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        return view('user_edit_profile',compact('admin'));
        
    }
    public function register_admin(){
        return view('register_user');
    }
    public function login_admin(){
        return view('auth.login');
    }
    public function upload_image(Request $request){
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $img_current = $admin->photo;
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
            $admin->photo = $ten_file;
            $admin->save();
        }
        return response()->json($admin);
    }
    public function upload_profile(Request $request){
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->email= $request->email;
        $admin->password = Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->birth = $request->birth;
        $admin->save();
    }
    public function list_account(){

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
        $admin = Admin::find($id);
        $img_current = $admin->photo;
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
            $admin->photo = $ten_file;
        }
        $admin->name = $request->name;
        $admin->email= $request->email;
        $admin->password = Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->birth = $request->birth;
        $admin->is_supper = $request->is_supper;
        $admin->save();
        return response()->json($admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $path = public_path().'/img-admin'."/";
        $old = $path.$admin->photo;
        unlink($old);
        $admin->is_delete = 1;
        $admin->email = "";
        $admin->password = "";
        $admin->save();
        return response()->json($admin);
    }
}
