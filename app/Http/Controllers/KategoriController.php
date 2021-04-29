<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Session;

class KategoriController extends Controller
{
    public function list(){
        $data_kategori = Kategori::paginate(5);
        return view('admin.kategori-list')
                ->with('data_kategori',$data_kategori);
    }

    public function create(){
        return view('admin.kategori-create');
    }

    public function save(Request $request){
        $imgName = $request->gambar_sampul->getClientOriginalName() . '-' . $request->gambar_sampul->extension();
        $request->gambar_sampul->move(public_path('images'), $imgName);
        $slug = Str::slug($request->nama_kategori);

        $data_kategori = Kategori::create([
            "nama_kategori"=>$request->input("nama_kategori"),
            "keterangan"=>$request->input("keterangan"),
            "slug"=>$slug,
            "gambar_sampul"=>$imgName,
        ]);

        if($data_kategori){
            Session::flash('sukses','Sukses Menyimpan Data');
            return redirect(url('admin/kategori'))
                    ->with("data_kategori",$data_kategori);
        }else{
            Session::flash('gagal','Gagal Menyimpan Data');
            return redirect(url('admin/kategori'));
        }
    }

    public function edit($id){
        $data_kategori = Kategori::find($id);

        return view('admin.kategori-edit')
                ->with('data_kategori',$data_kategori);
    }

    public function update($id, request $request){
        $data_kategori = Kategori::find($id);
        $slug = Str::slug($request->nama_kategori);

        $data_kategori->nama_kategori = $request->input("nama_kategori");
        $data_kategori->keterangan = $request->input("keterangan");
        $data_kategori->slug = $slug;

        if($request->file('gambar_sampul') == ""){
            $data_kategori->gambar_sampul = $data_kategori->gambar_sampul;
        }else{
            $imgName = $request->gambar_sampul->getClientOriginalName() . '-' . $request->gambar_sampul->extension();
            $request->gambar_sampul->move(public_path('images'), $imgName);

            $data_kategori->gambar_sampul = $imgName;
        }

        $data_kategori->save();
        if($data_kategori){
            Session::flash('sukses','Sukses Memperbarui Data');
            return redirect(url('admin/kategori'))
                    ->with("data_kategori",$data_kategori);
        }else{
            Session::flash('gagal','Gagal Memperbarui Data');
            return redirect(url('admin/kategori'));
        }
    }

    public function delete($id){
        $data_kategori = Kategori::find($id);

        $data_kategori -> delete();

        if($data_kategori){
            Session::flash('sukses','Sukses Menghapus Data');
            return redirect(url('admin/kategori'))
                    ->with("data_kategori",$data_kategori);
        }else{
            Session::flash('gagal','Gagal Menghapus Data');
            return redirect(url('admin/kategori'));
        }

    }

    public function galeri(){
        $data_kategori = Kategori::all();

        $count = DB::table('resep')
        ->join('kategori','resep.kategori_id','=','kategori.id')
        ->select('resep.kategori_id', DB::raw('COUNT(resep.id) as total'))
        ->groupBy('resep.kategori_id','kategori.id')
        ->get();

        return view('admin.kategori-galeri')
                ->with('count',$count)
                ->with('data_kategori',$data_kategori);
    }

    public function kat_table($id){
        $data_kategori = Kategori::find($id);
        $data_resep = DB::table('resep')
        ->join('kategori','resep.kategori_id','=','kategori.id')
        ->leftjoin('users','resep.user_id','=','users.id')
        ->where('resep.kategori_id','=',$id)
        ->select('users.name','kategori.*','resep.*')
        ->paginate(5);

        return view('admin.kategori-table')

                ->with('data_resep',$data_resep)
                ->with('data_kategori',$data_kategori);
    }
}
