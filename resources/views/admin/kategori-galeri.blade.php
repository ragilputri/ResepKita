@extends('layout.layout')
@section('title', 'Admin Kategori')

@section('name', 'Kategori Galeri')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/kategori')}}">Kategori</a></li>
<li class="breadcrumb-item active" aria-current="page">Kategori Galeri</li>
@stop

@section('content')
<div class="row el-element-overlay">
    @foreach($data_kategori as $row)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('images/'.$row->gambar_sampul) }}"
                        alt="img" />
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                            <li class="el-item"><a
                                    class="btn default btn-outline image-popup-vertical-fit el-link"
                                    href="{{ asset('images/'.$row->gambar_sampul) }}"><i
                                        class="mdi mdi-magnify-plus"></i></a></li>
                            <li class="el-item"><a class="btn default btn-outline el-link"
                                    href="{{url ('admin/kategori/table/'.$row->id) }}"><i class="mdi mdi-file-document"></i> 20</a></li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h4 class="mb-0">{{$row->nama_kategori}}</h4> <span class="text-muted">{{$row->keterangan}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop
