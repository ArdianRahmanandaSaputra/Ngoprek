@php
    use App\Models\Mahasiswa;
@endphp

@extends('layouts.master')

@section('title')
    Create Mahasiswa
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Create Mahasiswa</h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Data Master</a></li>
            <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
            <li class="active">Create Mahasiswa</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Mahasiswa</h3>
        </div>
        <form action="{{ route('mahasiswa.store') }}" class="panel-body form-horizontal" method="post" enctype="multipart/form-data">
            @csrf
            <!--Text Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nim">NIM</label>
                <div class="col-md-9">
                    <input type="text" id="nim" class="form-control" placeholder="NIM" name="nim" value="{{ Mahasiswa::generateNIM() }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="demo-text-input">Nama</label>
                <div class="col-md-9">
                    <input type="text" id="demo-text-input" class="form-control" placeholder="Text" name="nama" value="{{ Session::get('nama') }}" autocomplete="off">
                </div>
            </div>
            <!--Combobox Input-->
            <div class="form-group">
                <label for="jurusan" class="col-md-3 control-label">Jurusan</label>
                <div class="col-md-9">
                    <select id="jurusan" class="form-control" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->jurusan }}">{{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--Image Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="foto">Foto</label>
                <div class="col-md-9">
                    <input type="file" id="foto" class="form-control" name="foto">
                </div>
            </div>
            <!--UKT Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="ukt">UKT</label>
                <div class="col-md-9">
                    <input type="text" id="ukt" class="form-control" placeholder="UKT" name="ukt" value="{{ Session::get('ukt') }}" autocomplete="off">
                </div>
            </div>

            <div class="panel-footer text-right">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-dark">
                    <i class="fa fa-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection
