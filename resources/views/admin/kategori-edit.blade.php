@extends('layout.layout')
@section('title', 'Admin Kategori')

@section('name', 'Edit Kategori')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/kategori')}}">Kategori</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{url ('admin/kategori/update/'.$data_kategori->id ) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            @csrf
                <p>
                    <label>Nama Kategori</label><br>
                    <input type="text" name="nama_kategori" class="form-control" value="{{$data_kategori->nama_kategori}}">
                </p>
                <p>
                    <label>Keterangan</label><br>
                    <textarea name="keterangan" class="form-control">{{$data_kategori->keterangan}}</textarea>
                </p>
                <p>
                    <label>Gambar Sampul</label><br>
                    @if($data_kategori->gambar_sampul)
                        <img id="gambar_sampul" src="{{ asset('images/'.$data_kategori->gambar_sampul) }}" height="70"><br>
                        <br>
                    @endif
                    <input class="form-control" id="formFile" type="file" name="gambar_sampul" value="{{$data_kategori->gambar_sampul}}"><br>
                </p>
                <p>
                    <input type="submit" name="tombol-add" value="Simpan" class="btn btn-primary">
                </p>
            </div>
            </form>
        </div>
    </div>
</div>
@stop
