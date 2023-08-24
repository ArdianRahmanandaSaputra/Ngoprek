@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Dashboard</h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/prodi') }}">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Prodi</h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <h2>{{ $totalProdi }}</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/mahasiswa') }}">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Mahasiswa</h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <h2>{{ $totalMahasiswa }}</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
