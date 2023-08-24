@php
    use App\Models\Pembayaran;
@endphp

@extends('layouts.master')

@section('title')
    Create Pembayaran
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Create Mahasiswa </h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li> <a href="{{ '/' }}"> Data Master </a> </li>
            <li> <a href="{{ '/pembayaran' }}"> Pembayaran </a> </li>
            <li class="active"> Create Pembayaran </li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Pembayaran</h3>
        </div>
        <form action="{{ url('pembayaran') }}" class="panel-body form-horizontal" method="post"
            enctype="multipart/form-data">
            @csrf
            <!--Kode Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="kode">Kode</label>
                <div class="col-md-9">
                    <input type="text" id="kode" class="form-control" placeholder="Kode" name="kode"
                        value="{{ Pembayaran::generateKodePembayaran() }}" readonly>
                </div>
            </div>
            <!--NIM Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nim">NIM</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="text" id="nim" class="form-control" placeholder="NIM" name="nim"
                            autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" id="btnCari"><i class="fa fa-search"></i>
                                Cari</button>
                        </span>
                    </div>
                </div>
            </div>
            <!--Nama Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Nama</label>
                <div class="col-md-9">
                    <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama"
                        autocomplete="off" readonly>
                </div>
            </div>
            <!--Jurusan Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="jurusan">Jurusan</label>
                <div class="col-md-9">
                    <input type="text" id="jurusan" class="form-control" placeholder="Jurusan" name="jurusan"
                        autocomplete="off" readonly>
                </div>
            </div>
            <!--UKT Input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="ukt">UKT</label>
                <div class="col-md-9">
                    <input type="text" id="ukt" class="form-control" placeholder="UKT" name="ukt"
                        autocomplete="off" readonly>
                </div>
            </div>

            <div class="panel-footer text-right">
                <a href="{{ '/pembayaran' }}" class="btn btn-dark">
                    <i class="fa fa-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
        <!--===================================================-->
        <!-- END BASIC FORM ELEMENTS -->
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nimInput = document.getElementById('nim');
            var namaInput = document.getElementById('nama');
            var jurusanInput = document.getElementById('jurusan');
            var uktInput = document.getElementById('ukt');
            var btnCari = document.getElementById('btnCari');

            btnCari.addEventListener('click', function() {
                fetch('/mahasiswa/search/' + nimInput.value)
                    .then(response => response.json())
                    .then(data => {
                        if (data.mahasiswa) {
                            namaInput.value = data.mahasiswa.nama;
                            jurusanInput.value = data.mahasiswa.jurusan;
                            uktInput.value = data.mahasiswa.ukt;
                        } else {
                            namaInput.value = '';
                            jurusanInput.value = '';
                            uktInput.value = '';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endsection
