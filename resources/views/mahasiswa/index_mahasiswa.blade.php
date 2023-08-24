@extends('layouts.master')

@section('title')
    Mahasiswa
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Mahasiswa</h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Data Master</a></li>
            <li class="active">Mahasiswa</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Mahasiswa</h3>
        </div>
        <div class="panel-body">
            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-pink"><i class="fa fa-plus"></i> Add Mahasiswa</a>
            </div>
            <table id="demo-dt-basic" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>UKT</th>
                        <th width='15%'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->ukt }}</td>
                            <td>
                                <a href="{{ route('mahasiswa.edit', $item->nim) }}" class="btn btn-warning"
                                    style="margin-right: 5px;"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-success" data-toggle="modal"
                                    data-target="#fotoModal{{ $item->nim }}"><i class="fa fa-eye"></i></button>
                                <a href="#" class="btn btn-danger"
                                    onclick="event.preventDefault(); if (confirm('Yakin Menghapus Data??')) { document.getElementById('delete-form-{{ $item->nim }}').submit(); }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form-{{ $item->nim }}"
                                    action="{{ route('mahasiswa.destroy', $item->nim) }}" method="post"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @includeIf('mahasiswa.view')
        </div>
    </div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#demo-dt-basic');
    </script>
@endsection
