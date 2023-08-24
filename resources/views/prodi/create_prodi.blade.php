@extends('layouts.master')

@section('title')
    Create Prodi
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Create Prodi </h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Data Master</a></li>
            <li><a href="{{ route('prodi.index') }}">Prodi</a></li>
            <li class="active">Create Prodi</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Prodi</h3>
        </div>
        <form action="{{ route('prodi.store') }}" class="panel-body form-horizontal" method="post">
            @csrf
            <!--Text Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="demo-text-input">Kode</label>
                <div class="col-md-9">
                    <input type="number" id="demo-text-input" class="form-control" placeholder="Number" name="kode"
                        value="{{ Session::get('kode') }}" autocomplete="off" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="demo-text-input">Jurusan</label>
                <div class="col-md-9">
                    <input type="text" id="demo-text-input" class="form-control" placeholder="Text" name="jurusan"
                        value="{{ Session::get('jurusan') }}" autocomplete="off">
                </div>
            </div>
            <div class="panel-footer text-right">
                <a href="{{ route('prodi.index') }}" class="btn btn-dark">
                    <i class="fa fa-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection
