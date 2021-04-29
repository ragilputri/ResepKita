@extends('layout.layout')
@section('title', 'Admin Resep')

@section('name', 'Resep')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/resep')}}">Resep</a></li>
@stop

@section('content')
@if ($message = Session::get('sukses'))
	<div class="alert alert-success alert-block">
	<button type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
	<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
	<strong>{{ $message }}</strong>
	</div>
@endif

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tabel Resep</h5><br>
        <div class="ms-auto p-2 bd-highlight">
            <form action="#" class="d-flex" method="GET">
                @csrf
                <table>
                    <tr>
                        <td>
                            <input class="form-control me-2" type="search" id="myInput" name="search" placeholder="Search..." aria-label="Search" style="width:250px;">
                        </td>
                        <td>
                            <button type="submit" value="1" name="btn"  class="btn btn-outline-info">Search</button>
                        </td>
                    </tr>
                </table>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
            </script>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Penulis</th>
                        <th>Nama Resep</th>
                        <th>slug</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Alat dan Bahan</th>
                        <th>Step</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                @foreach($data_resep as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->nama_resep}}</td>
                        <td>{{$row->slug}}</td>
                        <td>{{$row->nama_kategori}}</td>
                        <td><img src="{{ asset('images/'.$row->gambar) }}" height="100" width="150"></td>
                        <td>{!! nl2br($row->alat_bahan) !!}</td>
                        <td>{!! nl2br($row->step) !!}</td>
                        <td>
                            <a href="{{url ('admin/resep/edit/'.$row->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{url ('admin/resep/delete/'.$row->id) }}" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $data_resep -> appends(Request::all()) -> links() }}
        </div>
    </div>
</div>
@stop
