@extends('layout.layout')
@section('title', 'Admin Kategori')

@section('name', 'Kategori')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/kategori')}}">Kategori</a></li>
<li class="breadcrumb-item"><a href="{{url ('admin/kategori/galeri') }}">Kategori Galeri</a></li>
<li class="breadcrumb-item active" aria-current="page">Kategori Resep {{$data_kategori->nama_kategori}}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tabel Resep Kategori {{$data_kategori->nama_kategori}}</h5><br>
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
                        <th>Gambar</th>
                        <th>Alat dan Bahan</th>
                        <th>Step</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($data_resep as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->nama_resep}}</td>
                        <td><img src="{{ asset('images/'.$row->gambar) }}" height="100" width="150"></td>
                        <td>{!! nl2br($row->alat_bahan) !!}</td>
                        <td>{!! nl2br($row->step) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
