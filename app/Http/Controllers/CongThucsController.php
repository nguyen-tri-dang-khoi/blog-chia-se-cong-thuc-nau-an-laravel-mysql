<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CongThuc;
use App\LoaiCongThuc;
use App\User;
use App\BinhLuan;
use DB;

class CongThucsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function index()
    {
        //
        $loaicongthucs = LoaiCongThuc::where('da_xoa',0)->get();
        $congthucs = DB::table('congthucs')
                ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
                ->join('admins','congthucs.admin_id','=','admins.id')
                ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
                ->get();
        return view('products',compact('loaicongthucs'),compact('congthucs'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_recipe(){
        $user = User::find(Auth::user()->id);
        $congthucs = DB::table('congthucs')
                ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
                ->join('admins','congthucs.admin_id','=','admins.id')
                ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
                ->get();
        return view('recipe',compact('congthucs'),compact('user'));   
    }
    public function recipe_detail($id){
        $user = User::find(Auth::user()->id);
        $binhluans = DB::table('binhluans')
        ->join('users','binhluans.user_id','=','users.id')
        ->join('congthucs','binhluans.cong_thuc_id','=','congthucs.id')
        ->where('congthucs.id','=',''.$id)
        ->select('binhluans.noi_dung_binh_luan','users.name','users.photo','binhluans.thoi_gian_binh_luan')
        ->orderByRaw('binhluans.thoi_gian_binh_luan ASC')
        ->get();
        $congthucs = DB::table('congthucs')
        ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
        ->join('admins','congthucs.admin_id','=','admins.id')
        ->where('congthucs.id','=',''.$id)
        ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
        ->get();
        return view('recipe_detail')
        ->with(compact('congthucs'))
        ->with(compact('user'))
        ->with(compact('binhluans'));   
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
        $congthuc = new CongThuc;
        $congthuc->admin_id = Auth::guard('admin')->user()->id;
        $congthuc->ten_cong_thuc = $request->ten_cong_thuc;
        $congthuc->loai_cong_thuc_id = $request->phan_loai_cong_thuc;
        $congthuc->mo_ta_cong_thuc = $request->mo_ta_cong_thuc;
        if ($request->hasFile('uploadfile')) {
            $image = $request->file('uploadfile');
            $ten_file = time().'.'.$image->getClientOriginalExtension();
            $vi_tri_luu_tru = public_path('/img-cong-thuc-storage');
            $image->move($vi_tri_luu_tru, $ten_file);
            $congthuc->hinh_anh = $ten_file;
        }
        $congthuc->save();
        $id = DB::getPdo()->lastInsertId();
        $congthuc2 = DB::table('congthucs')
        ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
        ->join('admins','congthucs.admin_id','=','admins.id')
        ->where('congthucs.id','=',''.$id)
        ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
        ->get();
        $kq = $congthuc2[0];
        return response()->json(compact('kq'));
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
        $congthuc = CongThuc::find($id);
        $congthuc->admin_id = Auth::guard('admin')->user()->id;
        $congthuc->ten_cong_thuc = $request->ten_cong_thuc;
        $congthuc->loai_cong_thuc_id = $request->phan_loai_cong_thuc;
        $congthuc->mo_ta_cong_thuc = $request->mo_ta_cong_thuc;
        if($request->hasFile('uploadfile')){
            $path = public_path().'/img-cong-thuc-storage'."/";
            $old = $path.$congthuc->hinh_anh;
            unlink($old);
            $image = $request->file('uploadfile');
            $ten_file = time().'.'.$image->getClientOriginalExtension();
            $vi_tri_luu_tru = public_path('/img-cong-thuc-storage');
            $image->move($vi_tri_luu_tru, $ten_file);
            $congthuc->hinh_anh = $ten_file;
        }
        $congthuc->save();
        $congthuc2 = DB::table('congthucs')
        ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
        ->join('admins','congthucs.admin_id','=','admins.id')
        ->where('congthucs.id','=',$id)
        ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
        ->get();
        $kq = $congthuc2[0];
        return response()->json(compact('kq'));
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
        $congthuc = CongThuc::find($id);
        $path = public_path().'/img-cong-thuc-storage'."/";
        $old = $path.$congthuc->hinh_anh;
        unlink($old);
        $congthuc2 = DB::table('congthucs')
        ->join('loaicongthucs','congthucs.loai_cong_thuc_id','=','loaicongthucs.id')
        ->join('admins','congthucs.admin_id','=','admins.id')
        ->where('congthucs.id','=',$id)
        ->select('congthucs.id','congthucs.ten_cong_thuc','congthucs.mo_ta_cong_thuc','loaicongthucs.id as loai_ct_id','loaicongthucs.ten_loai_cong_thuc','admins.name','congthucs.hinh_anh','congthucs.ngay_dang')
        ->get();
        $kq = $congthuc2[0];
        $congthuc->delete();
        return response()->json(compact('kq'));
    }
}
