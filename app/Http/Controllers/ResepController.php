<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Resep;
use App\Kategori;
use Session;

class ResepController extends Controller
{
    public function list(){
        $data_resep = DB::table('resep')
        ->leftjoin('kategori','resep.kategori_id','=','kategori.id')
        ->leftjoin('users','resep.user_id','=','users.id')
        ->select('users.name','kategori.*','resep.*')
        ->paginate(5);
        return view('admin.resep-list')
        ->with('data_resep',$data_resep);
    }

    public function create(){
        $data_kategori = Kategori::all();

        return view('admin.resep-create')
                ->with('data_kategori',$data_kategori);
    }

    public function save(request $request){
        $imgName = $request->gambar->getClientOriginalName() . '-' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imgName);
        $slug = Str::slug($request->nama_resep);

        $data_resep = Resep::create([
            "nama_resep"=>$request->input("nama_resep"),
            "kategori_id"=>$request->input("kategori_id"),
            "alat_bahan"=>$request->input("alat_bahan"),
            "step"=>$request->input("step"),
            "slug"=>$slug,
            "gambar"=>$imgName,
            "user_id"=>'1',
        ]);

        if($data_resep){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/resep'))
                    ->with("data_resep",$data_resep);
        }else{
            Session::flash('gagal','Gagal Menyimpan Data');
            return redirect(url('admin/resep'));
        }
    }

    public function edit($id){
        $data_resep = Resep::find($id);
        $data_kategori = Kategori::all();

        return view('admin.resep-edit')
        ->with('data_kategori',$data_kategori)
        ->with('data_resep',$data_resep);

    }

    public function update($id, request $request){
        $data_resep = Resep::find($id);
        $slug = Str::slug($request->nama_resep);

        // tinggal id kategori
        $data_resep->nama_resep = $request->input("nama_resep");
        $data_resep->alat_bahan = $request->input("alat_bahan");
        $data_resep->step = $request->input("step");
        $data_resep->slug = $slug;

        if($request->file('gamabr') == ""){
            $data_resep->gambar = $data_resep->gambar;
        }else{
            $imgName = $request->gambar->getClientOriginalName() . '-' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imgName);
            $data_resep->gambar = $imgName;
        }

        $data_resep->save();

        if($data_resep){
            Session::flash('sukses','Sukses Memperbarui Data');
            return redirect(url('admin/resep'))
                    ->with("data_resep",$data_resep);
        }else{
            Session::flash('gagal','Gagal Memperbarui Data');
            return redirect(url('admin/resep'));
        }
    }

    public function delete($id){
        $data_resep=Resep::find($id);

        $data_resep->delete();

        if($data_resep){
            Session::flash('sukses','Sukses Menghapus Data');
            return redirect(url('admin/resep'))
                    ->with("data_resep",$data_resep);
        }else{
            Session::flash('gagal','Gagal Menghapus Data');
            return redirect(url('admin/resep'));
        }
    }
}
