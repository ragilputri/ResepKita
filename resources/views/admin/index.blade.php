@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('name', 'Dashboard')

@section('content')

<!-- ============================================================== -->
<!-- Sales Cards  -->
<!-- ============================================================== -->
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <a href="/">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">Dashboard</h6>
            </div>
            </a>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="{{url('admin/kategori')}}">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-tag-multiple"></i></h1>
                <h6 class="text-white">Kategori</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <a href="{{url ('admin/kategori/galeri') }}">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                <h6 class="text-white">Kategori Galeri</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="{{url('admin/user-list')}}">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                <h6 class="text-white">Users</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="{{url('admin/resep')}}">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                <h6 class="text-white">Resep</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
    <a href="{{url('admin/resep/create')}}">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-plus-box"></i></h1>
                <h6 class="text-white">Add Resep</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
    <a href="{{url('admin/kategori/create')}}">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                <h6 class="text-white">Kategori Create</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-monitor"></i></h1>
                <h6 class="text-white">Landing Page</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <a href="{{url('login')}}" target="_blank">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-logout"></i></h1>
                <h6 class="text-white">Logout</h6>
            </div>
        </div>
        </a>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Site Analysis</h4>
                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-user mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">2540</h5>
                                    <small class="font-light">Total Users</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-plus mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">120</h5>
                                    <small class="font-light">New Users</small>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-cart-plus mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">656</h5>
                                    <small class="font-light">Total Shop</small>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-tag mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">9540</h5>
                                    <small class="font-light">Total Orders</small>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-table mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">100</h5>
                                    <small class="font-light">Pending Orders</small>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-globe mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1">8540</h5>
                                    <small class="font-light">Online Orders</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->

    <!-- column -->


</div>
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->

@stop
