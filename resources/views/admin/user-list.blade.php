@extends('layout.layout')
@section('title', 'Admin User-List')

@section('name', 'User-List')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('admin/user-list')}}">User</a></li>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tabel User</h5><br>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                @foreach($data_user as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->photo}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $data_user -> appends(Request::all()) -> links() }}
        </div>
    </div>
</div>
@stop
