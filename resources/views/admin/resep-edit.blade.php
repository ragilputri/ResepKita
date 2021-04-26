@extends('layout.layout')
@section('title', 'Admin Resep')

@section('name', 'Edit Resep')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/resep')}}">Resep</a></li>
<li class="breadcrumb-item active" aria-current="page">Create Resep</li>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{url ('admin/resep/update/'.$data_resep->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            @csrf
                <p>
                    <label>Nama Resep</label><br>
                    <input type="text" name="nama_resep" class="form-control" placeholder="Nama resep" value="{{$data_resep->nama_resep}}">
                </p>
                <p>
                    <label>Kategori</label><br>
                    <select name="kategori" class="form-control">
                    <option selected disabled>Kategori Resep</option>
                    @foreach($data_kategori as $row)
                        <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                    @endforeach
                    </select>
                </p>
                <p>
                    <label>Gambar Sampul</label><br>
                    @if($data_resep->gambar)
                        <img id="gambar" src="{{ asset('images/'.$data_resep->gambar) }}" height="70"><br>
                        <br>
                    @endif
                    <input class="form-control" id="formFile" type="file" name="gambar" value="{{$data_resep->gambar}}"><br>
                </p>
                <p>
                    <label>Alat dan Bahan</label><br>
                    <textarea name="alat_bahan" class="form-control" placeholder="Alat dan bahan" rows="10">{!! nl2br($data_resep->alat_bahan) !!}</textarea>
                </p>
                <p>
                    <label>Step</label><br>
                    <textarea name="step" class="form-control" rows="12">{!! nl2br($data_resep->step) !!}</textarea>
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
